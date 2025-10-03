<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\LoanRepaymentSchedule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Loan::with(['user'])->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    $color = match ($data->status) {
                        'pending' => 'badge bg-warning text-dark',   // Yellow (waiting)
                        'review' => 'badge bg-secondary',           // Gray (under review)
                        'approved' => 'badge bg-primary',             // Blue (approved)
                        'disbursed' => 'badge bg-info text-dark',      // Light blue (money given)
                        'repayment' => 'badge bg-light text-dark',   // Custom: Purple for active repayment
                        'overdue' => 'badge bg-danger',              // Red (missed deadline)
                        'completed' => 'badge bg-success',             // Green (loan paid off)
                        'rejected' => 'badge bg-dark',                // Black/dark red
                        default => 'badge bg-light text-dark',     // Light gray fallback
                    };

                    return '<span class="'.$color.'">'.ucfirst($data->status).'</span>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="action-wrapper">
                     <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View" onclick="window.location.href=\''.route('loans.show', $data->id).'\'">
                        <i class="material-symbols-outlined fs-16 text-primary">visibility</i>
                        </button>
                        
                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" onclick="deleteRecord(event,'.$data->id.')"><i class="material-symbols-outlined fs-16 text-danger">delete</i></button>
                    </div>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.layouts.loans.index');
    }

    // <a type="button" href="'.route('loans.edit', $data->id).'" class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"><i class="material-symbols-outlined fs-16 text-body">edit</i></a>

    public function show(string $id)
    {
        $data = Loan::with(['user', 'loanPackage', 'repaymentType', 'applicantInformations', 'loanDocuments', 'loanRepaymentSchedules'])->findOrFail($id);

        // dd($data->toArray());
        return view('backend.layouts.loans.show', compact('data'));
    }

    public function destroy(string $id)
    {
        $data = Loan::find($id);
        if (! $data) {
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }
        if ($data->status != 'pending') {
            return response()->json(['warning' => true, 'message' => 'Item can not be deleted as it is not in pending status.']);
        }
        $data->delete();

        return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
    }

    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:approved,rejected,review,completed,disbursed,overdue,repayment',
            'review_note' => 'required_if:status,review|max:255',
        ]);

        try {
            $loan = Loan::findOrFail($id);

            // 🚫 Restrict status changes after disbursed/repayment
            if (in_array($loan->status, ['disbursed', 'repayment', 'overdue', 'completed'])) {
                // Allowed only these forward transitions
                $allowedStatuses = ['repayment', 'overdue', 'completed'];
                if (! in_array($validatedData['status'], $allowedStatuses)) {
                    return redirect()->back()->with('error', 'You cannot change the status of a disbursed loan back to '.$validatedData['status']);
                }
            }

            // Normal status update
            $loan->status = $validatedData['status'];

            // Handle review
            if ($validatedData['status'] == 'review') {
                $loan->review_note = $validatedData['review_note'] ?? null;
            }

            // Handle disbursed → generate schedule
            if ($validatedData['status'] === 'disbursed') {
                // Prevent duplicate disbursement
                if ($loan->loanRepaymentSchedules()->count() > 0) {
                    return redirect()->back()->with('error', 'Repayment schedule already created for this loan.');
                }

                $loan->loan_issue_date = now();
                $loan->start_date = now();
                // $loan->end_date = now()->addDays($loan->frequency_in_days * $loan->repayment_cycle_count);
                $loan->status = 'repayment';
                $loan->save();

                for ($i = 1; $i <= $loan->repayment_cycle_count; $i++) {
                    LoanRepaymentSchedule::create([
                        'loan_id' => $loan->id,
                        'installment_no' => $i,
                        'amount' => round($loan->total_amount / $loan->repayment_cycle_count, 2),
                        'due_date' => now()->addDays($loan->frequency_in_days * $i),
                        'status' => 'pending',
                    ]);
                }
            }

            $loan->save();

            return redirect()->back()->with('success', 'Loan Status updated successfully.');
        } catch (Exception $e) {
            Log::error('LoanController::updateStatus '.$e->getMessage());

            return redirect()->back()->with('error', 'Loan Failed to update status.');
        }
    }

    
}

<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\LoanRepaymentSchedule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus($id)
    {
        // dd($id);
        // $validatedData = $request->validate([
        //     'status' => 'required|in:pending,paid,overdue,rescheduled', //'pending', 'paid', 'partial', 'overdue', 'rescheduled'
        // ]);

        try {

            $loanRepaymentSchedule = LoanRepaymentSchedule::with(['loan', 'loan.user'])->findOrFail($id);
            DB::beginTransaction();
            if ($loanRepaymentSchedule->status === 'paid') {
                return redirect()->back()->with('info', 'This installment is already marked as paid.');
            }
            $loanRepaymentSchedule->status = 'paid';
            $loanRepaymentSchedule->paid_at = now();
            $loanRepaymentSchedule->paid_amount = $loanRepaymentSchedule->amount;
            $loanRepaymentSchedule->save();
            $user = $loanRepaymentSchedule->loan->user;

            // Send notification to user
            if (method_exists(Helper::class, 'sendLoanNotification')) {
                Helper::sendLoanNotification(
                    $user, 'Loan Repayment Paid', null,
                    'Your installment #'.$loanRepaymentSchedule->installment_no.' for loan "'.$loanRepaymentSchedule->loan->loan_purpose.'" has been marked as paid.',
                    'paid_repayment', null
                );
            } else {
                Log::warning('Helper::sendLoanNotification method does not exist.');
            }
            DB::commit();

            return redirect()->back()->with('success', 'Loan Repayment Schedule Status updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('RepaymentController::updateStatus '.$e->getMessage());

            return redirect()->back()->with('error', 'Loan Repayment Schedule Failed to update status.');
        }
    }
}

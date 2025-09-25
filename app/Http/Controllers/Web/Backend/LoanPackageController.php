<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\LoanPackage;
use App\Models\RepaymentType;
use App\Models\PackageRepaymentCycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class LoanPackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LoanPackage::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($data) {
                    $status = '<div class="form-check form-switch">';
                    $status .= '<input onclick="changeStatus(event,' . $data->id . ')" type="checkbox" class="form-check-input" style="border-radius: 25rem;width:40px" name="status"';
                    if ($data->status == 'active') {
                        $status .= ' checked';
                    }
                    $status .= '>'; 
                    $status .= '</div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="action-wrapper">
                        <a type="button" href="' . route('loan_packages.edit', $data->id) . '" class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"><i class="material-symbols-outlined fs-16 text-body">edit</i></a>
                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" onclick="deleteRecord(event,' . $data->id . ')"><i class="material-symbols-outlined fs-16 text-danger">delete</i></button>
                    </div>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('backend.layouts.loan_package.index');
    }

    public function create()
    {
        $repaymentTypes = RepaymentType::where('status','active')->get();
        return view('backend.layouts.loan_package.create', compact('repaymentTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'origination_fee' => 'required|numeric|min:0',
            'service_fee' => 'required|numeric|min:0',
            'descriptions' => 'nullable|string',
            'status' => 'required|in:active,inactive',

            // Optional associations
            'repayment_type_ids' => 'nullable|array',
            'repayment_type_ids.*' => 'exists:repayment_types,id',
            'cycles' => 'nullable|array',
            'cycles.*.repayment_type_id' => 'required_with:cycles|exists:repayment_types,id',
            'cycles.*.installment_no' => 'required_with:cycles|integer|min:1',
            'cycles.*.installment_amount' => 'required_with:cycles|numeric|min:0',
            'cycles.*.status' => 'nullable|in:active,inactive',
        ]);
        try {
            $package = LoanPackage::create($validated);

            if (!empty($validated['cycles'])) {
                foreach ($validated['cycles'] as $cycle) {
                    PackageRepaymentCycle::create([
                        'loan_package_id' => $package->id,
                        'repayment_type_id' => $cycle['repayment_type_id'],
                        'installment_no' => $cycle['installment_no'],
                        'installment_amount' => $cycle['installment_amount'],
                        'status' => $cycle['status'] ?? 'active',
                    ]);
                }
            }

            return redirect()->route('loan_packages.index')->with('success','Loan package created successfully');
        } catch (\Throwable $e) {
            Log::error('LoanPackageController@store: '.$e->getMessage());
            return back()->with('error','Failed to create loan package')->withInput();
        }
    }

    public function edit(string $id)
    {
        $data = LoanPackage::findOrFail($id);
        $repaymentTypes = RepaymentType::where('status','active')->get();
        $cycles = PackageRepaymentCycle::where('loan_package_id', $id)->get();
        return view('backend.layouts.loan_package.edit', compact('data','repaymentTypes','cycles'));
    }

    public function show(string $id)
    {
        $data = LoanPackage::findOrFail($id);
        $cycles = PackageRepaymentCycle::with('repaymentType')
            ->where('loan_package_id', $id)
            ->orderBy('installment_no')
            ->get();
        return view('backend.layouts.loan_package.show', compact('data','cycles'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'origination_fee' => 'required|numeric|min:0',
            'service_fee' => 'required|numeric|min:0',
            'descriptions' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $data = LoanPackage::findOrFail($id);
            $data->update($validated);
            return redirect()->route('loan_packages.index')->with('success','Loan package updated successfully');
        } catch (\Throwable $e) {
            Log::error('LoanPackageController@update: '.$e->getMessage());
            return back()->with('error','Failed to update loan package')->withInput();
        }
    }

    public function destroy(string $id)
    {
        $data = LoanPackage::find($id);
        if (!$data) {
            return response()->json(['success'=>false,'message'=>'Item not found.'],404);
        }
        $data->delete();
        return response()->json(['success'=>true,'message'=>'Item deleted successfully.']);
    }

    public function status(Request $request, $id)
    {
        $data = LoanPackage::find($id);
        if (!$data) {
            return response()->json(['success'=>false,'message'=>'Item not found.'],404);
        }
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        return response()->json(['success'=>true,'message'=>'Item status changed successfully.']);
    }
}



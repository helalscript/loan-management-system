<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\PackageRepaymentCycle;
use App\Models\LoanPackage;
use App\Models\RepaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class PackageRepaymentCycleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PackageRepaymentCycle::with(['loanPackage', 'repaymentType'])->latest();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('package_name', function ($data) {
                    return $data->loanPackage->name ?? 'N/A';
                })
                ->addColumn('repayment_type', function ($data) {
                    return $data->repaymentType->name ?? 'N/A';
                })
                ->addColumn('status', function ($data) {
                    $status = '<div class="form-check form-switch">';
                    $status .= '<input onclick="changeStatus(event,' . $data->id . ')" type="checkbox" class="form-check-input" style="border-radius: 25rem;width:40px" name="status"';
                    if ($data->status == 'active') { $status .= ' checked'; }
                    $status .= '>';
                    $status .= '</div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="action-wrapper">
                        <a type="button" href="' . route('package_cycles.edit', $data->id) . '" class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"><i class="material-symbols-outlined fs-16 text-body">edit</i></a>
                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" onclick="deleteRecord(event,' . $data->id . ')"><i class="material-symbols-outlined fs-16 text-danger">delete</i></button>
                    </div>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('backend.layouts.package_cycle.index');
    }

    public function create()
    {
        $packages = LoanPackage::where('status', 'active')->get();
        $repaymentTypes = RepaymentType::where('status', 'active')->get();
        return view('backend.layouts.package_cycle.create', compact('packages', 'repaymentTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'loan_package_id' => 'required|exists:loan_packages,id',
            'repayment_type_id' => 'required|exists:repayment_types,id',
            'cycles' => 'required|array|min:1',
            'cycles.*.installment_no' => 'required|integer|min:1',
            'cycles.*.installment_amount' => 'required|numeric|min:0',
        ]);

        try {
            $package = LoanPackage::findOrFail($validated['loan_package_id']);
            $repaymentType = RepaymentType::findOrFail($validated['repayment_type_id']);
            
            // Allow multiple cycles per package and repayment type

            // Calculate total amount from cycles
            $totalCycleAmount = array_sum(array_column($validated['cycles'], 'installment_amount'));
            $packageTotal = $package->amount + $package->origination_fee + $package->service_fee;
            
            if ($totalCycleAmount > $packageTotal) {
                return back()->with('error', 'Total cycle amount ($' . number_format($totalCycleAmount, 2) . ') cannot exceed package total ($' . number_format($packageTotal, 2) . ')')->withInput();
            }

            // Create cycles
            foreach ($validated['cycles'] as $cycle) {
                PackageRepaymentCycle::create([
                    'loan_package_id' => $package->id,
                    'repayment_type_id' => $repaymentType->id,
                    'installment_no' => $cycle['installment_no'],
                    'installment_amount' => $cycle['installment_amount'],
                    'status' => 'active',
                ]);
            }

            return redirect()->route('package_cycles.index')->with('success', 'Repayment cycles created successfully');
        } catch (\Throwable $e) {
            Log::error('PackageRepaymentCycleController@store: ' . $e->getMessage());
            return back()->with('error', 'Failed to create cycles')->withInput();
        }
    }

    public function edit(string $id)
    {
        $data = PackageRepaymentCycle::with(['loanPackage', 'repaymentType'])->findOrFail($id);
        $packages = LoanPackage::where('status', 'active')->get();
        $repaymentTypes = RepaymentType::where('status', 'active')->get();
        
        // Get all cycles for this package and repayment type
        $cycles = PackageRepaymentCycle::where('loan_package_id', $data->loan_package_id)
            ->where('repayment_type_id', $data->repayment_type_id)
            ->orderBy('installment_no')
            ->get();
            
        return view('backend.layouts.package_cycle.edit', compact('data', 'packages', 'repaymentTypes', 'cycles'));
    }

    public function editByPackage(Request $request)
    {
        $packageId = $request->get('package_id');
        $repaymentTypeId = $request->get('repayment_type_id');
        
        if (!$packageId || !$repaymentTypeId) {
            return redirect()->route('package_cycles.index')->with('error', 'Package and Repayment Type required');
        }
        
        $package = LoanPackage::findOrFail($packageId);
        $repaymentType = RepaymentType::findOrFail($repaymentTypeId);
        $packages = LoanPackage::where('status', 'active')->get();
        $repaymentTypes = RepaymentType::where('status', 'active')->get();
        
        // Get all cycles for this package and repayment type
        $cycles = PackageRepaymentCycle::where('loan_package_id', $packageId)
            ->where('repayment_type_id', $repaymentTypeId)
            ->orderBy('installment_no')
            ->get();
            
        $data = (object) [
            'loan_package_id' => $packageId,
            'repayment_type_id' => $repaymentTypeId,
            'loanPackage' => $package,
            'repaymentType' => $repaymentType
        ];
            
        return view('backend.layouts.package_cycle.edit', compact('data', 'packages', 'repaymentTypes', 'cycles'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'loan_package_id' => 'required|exists:loan_packages,id',
            'repayment_type_id' => 'required|exists:repayment_types,id',
            'cycles' => 'required|array|min:1',
            'cycles.*.id' => 'nullable|exists:package_repayment_cycles,id',
            'cycles.*.installment_no' => 'required|integer|min:1',
            'cycles.*.installment_amount' => 'required|numeric|min:0',
        ]);

        try {
            $package = LoanPackage::findOrFail($validated['loan_package_id']);
            $repaymentType = RepaymentType::findOrFail($validated['repayment_type_id']);
            
            // Calculate total amount from cycles
            $totalCycleAmount = array_sum(array_column($validated['cycles'], 'installment_amount'));
            $packageTotal = $package->amount + $package->origination_fee + $package->service_fee;
            
            if ($totalCycleAmount > $packageTotal) {
                return back()->with('error', 'Total cycle amount ($' . number_format($totalCycleAmount, 2) . ') cannot exceed package total ($' . number_format($packageTotal, 2) . ')')->withInput();
            }

            // Update existing cycles and create new ones
            foreach ($validated['cycles'] as $cycleData) {
                if (isset($cycleData['id']) && $cycleData['id']) {
                    // Update existing cycle
                    PackageRepaymentCycle::where('id', $cycleData['id'])
                        ->update([
                            'installment_no' => $cycleData['installment_no'],
                            'installment_amount' => $cycleData['installment_amount'],
                        ]);
                } else {
                    // Create new cycle
                    PackageRepaymentCycle::create([
                        'loan_package_id' => $package->id,
                        'repayment_type_id' => $repaymentType->id,
                        'installment_no' => $cycleData['installment_no'],
                        'installment_amount' => $cycleData['installment_amount'],
                        'status' => 'active',
                    ]);
                }
            }

            return redirect()->route('package_cycles.index')->with('success', 'Repayment cycles updated successfully');
        } catch (\Throwable $e) {
            Log::error('PackageRepaymentCycleController@update: ' . $e->getMessage());
            return back()->with('error', 'Failed to update cycles')->withInput();
        }
    }

    public function destroy(string $id)
    {
        $data = PackageRepaymentCycle::find($id);
        if (!$data) { return response()->json(['success'=>false,'message'=>'Item not found.'],404); }
        $data->delete();
        return response()->json(['success'=>true,'message'=>'Item deleted successfully.']);
    }

    public function status(Request $request, $id)
    {
        $data = PackageRepaymentCycle::find($id);
        if (!$data) { return response()->json(['success'=>false,'message'=>'Item not found.'],404); }
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        return response()->json(['success'=>true,'message'=>'Status changed']);
    }
}

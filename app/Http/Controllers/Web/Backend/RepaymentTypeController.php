<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\RepaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class RepaymentTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RepaymentType::latest();
            return DataTables::of($data)
                ->addIndexColumn()
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
                        <a type="button" href="' . route('repayment_types.edit', $data->id) . '" class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"><i class="material-symbols-outlined fs-16 text-body">edit</i></a>
                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" onclick="deleteRecord(event,' . $data->id . ')"><i class="material-symbols-outlined fs-16 text-danger">delete</i></button>
                    </div>';
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        return view('backend.layouts.repayment_type.index');
    }

    public function create()
    {
        return view('backend.layouts.repayment_type.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'duration_in_days' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        try {
            RepaymentType::create($validated);
            return redirect()->route('repayment_types.index')->with('success','Repayment type created');
        } catch (\Throwable $e) {
            Log::error('RepaymentTypeController@store: '.$e->getMessage());
            return back()->with('error','Failed to create')->withInput();
        }
    }

    public function edit(string $id)
    {
        $data = RepaymentType::findOrFail($id);
        return view('backend.layouts.repayment_type.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'duration_in_days' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ]);
        try {
            $data = RepaymentType::findOrFail($id);
            $data->update($validated);
            return redirect()->route('repayment_types.index')->with('success','Updated successfully');
        } catch (\Throwable $e) {
            Log::error('RepaymentTypeController@update: '.$e->getMessage());
            return back()->with('error','Failed to update')->withInput();
        }
    }

    public function destroy(string $id)
    {
        $data = RepaymentType::find($id);
        if (!$data) { return response()->json(['success'=>false,'message'=>'Item not found.'],404); }
        $data->delete();
        return response()->json(['success'=>true,'message'=>'Item deleted successfully.']);
    }

    public function status(Request $request, $id)
    {
        $data = RepaymentType::find($id);
        if (!$data) { return response()->json(['success'=>false,'message'=>'Item not found.'],404); }
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        return response()->json(['success'=>true,'message'=>'Status changed']);
    }
}



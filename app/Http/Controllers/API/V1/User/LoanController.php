<?php

namespace App\Http\Controllers\API\V1\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Services\API\V1\User\LoanService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoanController extends Controller
{
    protected $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $loans = $this->loanService->index($request);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $loans, true);
        } catch (Exception $e) {
            Log::error('LoanController::index'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); //this is for debugging
        $validatedData = $request->validate([
            'package_id' => 'required|exists:loan_packages,id',
            'repayment_type_id' => 'required|exists:repayment_types,id',

            'pay_schedule' => 'required|date:Y-m-d',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'brithday' => 'required|date:Y-m-d',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'secondary_first_name' => 'nullable|string|max:255',
            'secondary_last_name' => 'nullable|string|max:255',
            'secondary_email' => 'nullable|email|max:255',
            'secondary_phone' => 'nullable|string|max:20',
            'secondary_brithday' => 'nullable|date:Y-m-d',
            'secondary_street_address' => 'nullable|string|max:255',
            'secondary_city' => 'nullable|string|max:255',
            'secondary_state' => 'nullable|string|max:255',
            'secondary_zip_code' => 'nullable|string|max:255',
            'income_source' => 'nullable|json',
            'repayment_method' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|file|mimes:jpeg,jpg,png,gif,webp,pdf,txt,doc,docx|max:5120',
            'agreed_terms' => 'required|boolean',
        ]);
        // dd($validatedData); // this is for debugging
        try {
            $loan = $this->loanService->store($validatedData);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $loan);
        } catch (Exception $e) {
            Log::error('LoanController::store'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $loan = $this->loanService->show($id);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $loan);
        } catch (Exception $e) {
            Log::error('LoanController::show'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
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
}

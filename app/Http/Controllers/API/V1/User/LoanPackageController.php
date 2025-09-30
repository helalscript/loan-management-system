<?php

namespace App\Http\Controllers\API\V1\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Services\API\V1\User\LoanPackageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoanPackageController extends Controller
{
    protected $loanPackageService;

    public function __construct(LoanPackageService $loanPackageService)
    {
        $this->loanPackageService = $loanPackageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $packages = $this->loanPackageService->index($request);
            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $packages, true);
        } catch (Exception $e) {
            Log::error('PackageController::index'.$e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $package = $this->loanPackageService->show($id);
            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $package);
        } catch (Exception $e) {
            Log::error('PackageController::show'.$e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getRepaymentTypes(int $id)
    {
        try {
            $repaymentTypes = $this->loanPackageService->getRepaymentTypes($id);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $repaymentTypes);
        } catch (Exception $e) {
            Log::error('LoanController::getRepaymentTypes'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    
}

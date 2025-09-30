<?php

namespace App\Services\API\V1\User;

use App\Models\LoanPackage;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoanPackageService
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Fetch all resources.
     *
     * @return mixed
     */
    public function index($request)
    {
        try {
            $per_page = $request->per_page ?? 25;

            $packages = LoanPackage::where('status', 'active')
                // ->with(['packageRepaymentCycles.repaymentType'])
                ->paginate($per_page);

            // Transform repayment cycles grouped by repayment_type_id
            // $packages->getCollection()->transform(function ($package) {
            //     $package->repayment_cycles_grouped = $package->packageRepaymentCycles
            //         ->groupBy('repayment_type_id')
            //         ->map(function ($cycles) {
            //             return $cycles->values();
            //         });
            //     return $package;
            // });

            return $packages;
        } catch (Exception $e) {
            Log::error('PackageService::index '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Display a specific resource.
     *
     * @return mixed
     */
    public function show(int $id)
    {
        try {
            $loanPackage = LoanPackage::find($id);
            if (! $loanPackage) {
                throw new Exception('Package not found', 404);
            }

            return $loanPackage;
        } catch (Exception $e) {
            Log::error('PackageService::show'.$e->getMessage());
            throw $e;
        }
    }

    public function getRepaymentTypes($id)
    {
        try {
            $loanPackage = LoanPackage::with([
                'packageRepaymentCycles.repaymentType',
            ])->findOrFail($id);

            $repaymentTypes = $loanPackage->packageRepaymentCycles
                ->groupBy('repayment_type_id')
                ->map(function ($cycles) {
                    $repaymentType = $cycles->first()->repaymentType;

                    return [
                        'id' => $repaymentType->id,
                        'name' => $repaymentType->name,
                        'duration_in_days' => $repaymentType->duration_in_days ,
                        'cycles' => $cycles->map(function ($cycle) {
                            return [
                                'installment_no' => $cycle->installment_no,
                                'installment_amount' => $cycle->installment_amount,
                            ];
                        })->values(),
                    ];
                })->values();

            return [
                'id' => $loanPackage->id,
                'name' => $loanPackage->name,
                'repayment_types' => $repaymentTypes,
            ];
        } catch (\Exception $e) {
            Log::error('LoanService::getRepaymentTypes '.$e->getMessage());
            throw $e;
        }
    }
}

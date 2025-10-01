<?php

namespace App\Services\API\V1\User;

use App\Helpers\Helper;
use App\Models\ApplicantInformation;
use App\Models\Loan;
use App\Models\LoanDocument;
use App\Models\LoanPackage;
use App\Models\RepaymentType;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoanService
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
            $loans = Loan::where('user_id', $this->user->id)
                ->paginate($per_page);

            return $loans;

        } catch (Exception $e) {
            Log::error('LoanService::index'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Store a new resource.
     *
     * @return mixed
     */
    public function store(array $validatedData)
    {
        try {
            $package = LoanPackage::find($validatedData['package_id']);
            $repaymentType = RepaymentType::find($validatedData['repayment_type_id']);
            if (! $package) {
                throw new Exception('Package or Repayment Type not found', 404);
            }
            DB::beginTransaction();
            $loan = Loan::create([
                'user_id' => $this->user->id,
                'loan_package_id' => $validatedData['package_id'],

                'principal_amount' => $package?->amount,
                'service_fee_amount' => $package?->service_fee,
                'origination_fee_amount' => $package?->origination_fee,
                'total_amount' => $package->amount + $package->service_fee + $package->origination_fee,

                'repayment_type_id' => $validatedData['repayment_type_id'],
                'frequency' => $repaymentType?->name,
                'frequency_in_days' => $repaymentType?->duration_in_days,
                'repayment_cycle_count' => 2, //in future this will be dynamic

                'pay_schedule' => $validatedData['pay_schedule']?? null,
                'income_sources' => json_encode($validatedData['income_source'] ?? null),
                'repayment_method' => $validatedData['repayment_method'] ?? null,
                'agreed_terms' => $validatedData['agreed_terms'] ?? null,

            ]);

            // applicant_informations main
            if (isset($validatedData['first_name'])) {
                $applicantInformationMain = ApplicantInformation::create([
                    'loan_id' => $loan->id,
                    'first_name' => $validatedData['first_name'] ?? null,
                    'last_name' => $validatedData['last_name'] ?? null,
                    'email' => $validatedData['email'] ?? null,
                    'phone' => $validatedData['phone'] ?? null,
                    'brithday' => $validatedData['brithday'] ?? null,
                    'street_address' => $validatedData['street_address'] ?? null,
                    'city' => $validatedData['city'] ?? null,
                    'state' => $validatedData['state'] ?? null,
                    'zip' => $validatedData['zip_code'] ?? null,
                    'information_type' => 'main',
                ]);
            }

            // applicant_informations secondary
            if (isset($validatedData['secondary_first_name'])) {
                $applicantInformationSecondary = ApplicantInformation::create([
                    'loan_id' => $loan->id,
                    'first_name' => $validatedData['secondary_first_name'] ?? null,
                    'last_name' => $validatedData['secondary_last_name'] ?? null,
                    'email' => $validatedData['secondary_email'] ?? null,
                    'phone' => $validatedData['secondary_phone'] ?? null,
                    'brithday' => $validatedData['secondary_brithday'] ?? null,
                    'street_address' => $validatedData['secondary_street_address'] ?? null,
                    'city' => $validatedData['secondary_city'] ?? null,
                    'state' => $validatedData['secondary_state'] ?? null,
                    'zip' => $validatedData['secondary_zip_code'] ?? null,
                    'information_type' => 'secondary',
                ]);
            }

            // Upload documents
            if (isset($validatedData['documents']) && count($validatedData['documents']) > 0) {
                foreach ($validatedData['documents'] as $document) {
                    $filePath = Helper::fileUpload($document, 'loan_documents', time().'_'.getFileName($document));
                    $documents = LoanDocument::create([
                        'loan_id' => $loan->id,
                        'uploaded_by' => 'user',
                        // 'title' => ,
                        'file_path' => $filePath,
                    ]);
                }
            }
            DB::commit();

            return $loan->load('applicantInformations', 'loanDocuments','loanPackage');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('LoanService::store'.$e->getMessage());
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

        } catch (Exception $e) {
            Log::error('LoanService::show'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Update a specific resource.
     *
     * @return mixed
     */
    public function update(int $id, array $validatedData)
    {
        try {

        } catch (Exception $e) {
            Log::error('LoanService::update'.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a specific resource.
     *
     * @return mixed
     */
    public function destroy(int $id)
    {
        try {
            // Logic to delete a specific resource
        } catch (Exception $e) {
            Log::error('LoanService::destroy'.$e->getMessage());
            throw $e;
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\LoanPackage;
use App\Models\PackageRepaymentCycle;
use App\Models\RepaymentType;
use Illuminate\Database\Seeder;

class LoanPackageSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure repayment types exist
        $repayBiWeekly = RepaymentType::firstOrCreate(
            ['name' => 'Bi-Weekly'],
            ['duration_in_days' => 14, 'status' => 'active']
        );

        $repayWeekly = RepaymentType::firstOrCreate(
            ['name' => 'Weekly'],
            ['duration_in_days' => 7, 'status' => 'active']
        );

        /*
         |--------------------------------------------------------------------------
         | Loan $50 Package
         |--------------------------------------------------------------------------
         */
        $pkg50 = LoanPackage::updateOrCreate(
            ['name' => 'Loan $50'],
            [
                'amount' => 50,
                'origination_fee' => 10,
                'service_fee' => 12,
                'descriptions' => 'All loans have a $10 origination fee.
                No interest EVER.
                Fees don’t change after approval.
                For the $50 loan choice, there is a $12 service fee for all loans.
                For the $100 loan choice, there is a $35 service fee for all loans.
                Fees don\'t change after approval.',
                'status' => 'active',
            ]
        );

        // Total repay = 72 (=> 36 + 36)
        foreach ([$repayWeekly, $repayBiWeekly] as $repayType) {
            for ($i = 1; $i <= 2; $i++) {
                PackageRepaymentCycle::updateOrCreate(
                    [
                        'loan_package_id' => $pkg50->id,
                        'repayment_type_id' => $repayType->id,
                        'installment_no' => $i,
                    ],
                    [
                        'installment_amount' => 36,
                        'status' => 'active',
                    ]
                );
            }
        }

        /*
         |--------------------------------------------------------------------------
         | Loan $100 Package
         |--------------------------------------------------------------------------
         */
        $pkg100 = LoanPackage::updateOrCreate(
            ['name' => 'Loan $100'],
            [
                'amount' => 100,
                'origination_fee' => 10,
                'service_fee' => 35,
                'descriptions' => 'All loans have a $10 origination fee.
                No interest EVER.
                Fees don’t change after approval.
                For the $50 loan choice, there is a $12 service fee for all loans.
                For the $100 loan choice, there is a $35 service fee for all loans.
                Fees don\'t change after approval.',
                'status' => 'active',
            ]
        );

        // Total repay = 145 (=> 72.5 + 72.5)
        foreach ([$repayWeekly, $repayBiWeekly] as $repayType) {
            for ($i = 1; $i <= 2; $i++) {
                PackageRepaymentCycle::updateOrCreate(
                    [
                        'loan_package_id' => $pkg100->id,
                        'repayment_type_id' => $repayType->id,
                        'installment_no' => $i,
                    ],
                    [
                        'installment_amount' => 72.50,
                        'status' => 'active',
                    ]
                );
            }
        }
    }
}


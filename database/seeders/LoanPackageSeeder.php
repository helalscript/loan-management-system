<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoanPackage;
use App\Models\RepaymentType;
use App\Models\PackageRepaymentCycle;

class LoanPackageSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure a 15-day repayment type exists
        $repay15 = RepaymentType::firstOrCreate(
            ['name' => '15 days'],
            ['duration_in_days' => 15, 'status' => 'active']
        );

        // $50 package: origination $10, service $12 (per screenshot copy)
        $pkg50 = LoanPackage::updateOrCreate(
            ['name' => '$50'],
            [
                'amount' => 50,
                'origination_fee' => 10,
                'service_fee' => 12,
                'descriptions' => 'No interest. Fees don\'t change after approval.',
                'status' => 'active',
            ]
        );

        PackageRepaymentCycle::updateOrCreate(
            [
                'loan_package_id' => $pkg50->id,
                'repayment_type_id' => $repay15->id,
                'installment_no' => 1,
            ],
            [
                'installment_amount' => 50,
                'status' => 'active',
            ]
        );

        // $100 package: origination $10, service $35 (per screenshot copy)
        $pkg100 = LoanPackage::updateOrCreate(
            ['name' => '$100'],
            [
                'amount' => 100,
                'origination_fee' => 10,
                'service_fee' => 35,
                'descriptions' => 'No interest. Fees don\'t change after approval.',
                'status' => 'active',
            ]
        );

        PackageRepaymentCycle::updateOrCreate(
            [
                'loan_package_id' => $pkg100->id,
                'repayment_type_id' => $repay15->id,
                'installment_no' => 1,
            ],
            [
                'installment_amount' => 100,
                'status' => 'active',
            ]
        );
    }
}



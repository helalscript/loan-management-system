<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageRepaymentCycle extends Model
{
    use HasFactory;

    protected $table = 'package_repayment_cycles';

    protected $fillable = [
        'loan_package_id',
        'repayment_type_id',
        'installment_no',
        'installment_amount',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_package_id' => 'integer',
        'repayment_type_id' => 'integer',
        'installment_no' => 'integer',
        'installment_amount' => 'decimal:2',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loanPackage()
    {
        return $this->belongsTo(LoanPackage::class);
    }

    public function repaymentType()
    {
        return $this->belongsTo(RepaymentType::class);
    }
}

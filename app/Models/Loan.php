<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'user_id',
        'loan_package_id',
        'repayment_type_id',
        'principal_amount',
        'service_fee_amount',
        'total_amount',
        'frequency',
        'start_date',
        'loan_issue_date',
        'payment_close_date',
        'agreed_privacy_policy',
        'agreed_terms',
        'review_note',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'loan_package_id' => 'integer',
        'repayment_type_id' => 'integer',
        'principal_amount' => 'decimal:2',
        'service_fee_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'frequency' => 'string',
        'start_date' => 'date',
        'loan_issue_date' => 'date',
        'payment_close_date' => 'date',
        'agreed_privacy_policy' => 'boolean',
        'agreed_terms' => 'boolean',
        'review_note' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loanPackage()
    {
        return $this->belongsTo(LoanPackage::class);
    }

    public function repaymentType()
    {
        return $this->belongsTo(RepaymentType::class);
    }
}

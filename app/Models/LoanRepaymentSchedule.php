<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanRepaymentSchedule extends Model
{
    use HasFactory;

    protected $table = 'loan_repayment_schedules';

    protected $fillable = [
        'loan_id',
        'installment_no',
        'amount',
        'due_date',
        'paid_amount',
        'penalty_amount',
        'interest_rate',
        'paid_at',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'installment_no' => 'integer',
        'amount' => 'decimal:2',
        'due_date' => 'date',
        'paid_amount' => 'decimal:2',
        'penalty_amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'paid_at' => 'datetime',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function penalties()
    {
        return $this->hasMany(LoanPenalty::class, 'loan_repayment_schedule_id');
    }
}

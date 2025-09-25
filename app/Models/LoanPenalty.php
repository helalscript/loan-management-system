<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanPenalty extends Model
{
    use HasFactory;

    protected $table = 'loan_penalties';

    protected $fillable = [
        'loan_repayment_schedule_id',
        'penalty_type',
        'amount',
        'reason',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_repayment_schedule_id' => 'integer',
        'penalty_type' => 'string',
        'amount' => 'decimal:2',
        'reason' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function schedule()
    {
        return $this->belongsTo(LoanRepaymentSchedule::class, 'loan_repayment_schedule_id');
    }
}

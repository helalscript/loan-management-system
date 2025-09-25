<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeSource extends Model
{
    use HasFactory;

    protected $table = 'income_sources';

    protected $fillable = [
        'loan_id',
        'type',
        'sub_type',
        'job_title',
        'start_month',
        'start_year',
        'annual_income',
        'additional_compensation',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'type' => 'string',
        'sub_type' => 'string',
        'job_title' => 'string',
        'start_month' => 'integer',
        'start_year' => 'integer',
        'annual_income' => 'decimal:2',
        'additional_compensation' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}

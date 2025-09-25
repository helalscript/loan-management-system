<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'repayment_methods';

    protected $fillable = [
        'loan_id',
        'method',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'method' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}

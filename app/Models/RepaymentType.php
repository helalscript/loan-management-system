<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepaymentType extends Model
{
    use HasFactory;

    protected $table = 'repayment_types';

    protected $fillable = [
        'name',
        'duration_in_days',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'duration_in_days' => 'integer',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

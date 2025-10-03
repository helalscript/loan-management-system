<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPackage extends Model
{
    use HasFactory;

    protected $table = 'loan_packages';

    protected $fillable = [
        'name',
        'amount',
        'origination_fee',
        'service_fee',
        'descriptions',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'amount' => 'decimal:2',
        'origination_fee' => 'decimal:2',
        'service_fee' => 'decimal:2',
        'descriptions' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function packageRepaymentCycles()
    {
        return $this->hasMany(PackageRepaymentCycle::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'status',
    ];

    protected $casts = [
        'unique_id' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function overviews()
    {
        return $this->hasMany(Overview::class);
    }

    public function proProfiles()
    {
        return $this->hasMany(ProProfile::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'location',
        'name',
        'refer_number',
        'current_job',
        'experience_year',
        'qualification',
        'work_preference',
        'linkedin_profile',
        'rating',
    ];

    protected $casts = [
        'candidate_id' => 'integer',
        'location' => 'string',
        'name' => 'string',
        'refer_number' => 'string',
        'current_job' => 'string',
        'experience_year' => 'string',
        'qualification' => 'string',
        'work_preference' => 'string',
        'linkedin_profile' => 'string',
        'rating' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}

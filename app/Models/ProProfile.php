<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'screening_date',
        'insights',
        'flexibility', // If the DB really has this column name
        'motivation',
        'career_goals',
        'key_strengths',
        'observations',
        'culture_fit',
        'salary_expectations',
        'notice_period',
        'status',
    ];

    protected $casts = [
        'candidate_id' => 'integer',
        'screening_date' => 'date',
        'insights' => 'string',
        'flexibility' => 'string',
        'motivation' => 'string',
        'career_goals' => 'string',
        'key_strengths' => 'array',  // JSON stored as array
        'observations' => 'array',  // JSON stored as array
        'culture_fit' => 'string',
        'salary_expectations' => 'string',
        'notice_period' => 'string',
        'status' => 'string',
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

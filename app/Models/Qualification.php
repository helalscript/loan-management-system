<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'degree',
        'institution',
        'duration',
        'graduation_date',
    ];

    protected $casts = [
        'candidate_id' => 'integer',
        'degree' => 'string',
        'institution' => 'string',
        'duration' => 'date',
        'graduation_date' => 'date',
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

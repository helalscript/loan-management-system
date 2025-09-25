<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDocument extends Model
{
    use HasFactory;

    protected $table = 'loan_documents';

    protected $fillable = [
        'loan_id',
        'uploaded_by',
        'title',
        'file_path',
        'status',
        'review_note',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'uploaded_by' => 'string',
        'title' => 'string',
        'file_path' => 'string',
        'status' => 'string',
        'review_note' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}

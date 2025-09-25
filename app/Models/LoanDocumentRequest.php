<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDocumentRequest extends Model
{
    use HasFactory;

    protected $table = 'loan_document_requests';

    protected $fillable = [
        'loan_id',
        'title',
        'description',
        'requested_by',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'loan_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'requested_by' => 'integer',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}

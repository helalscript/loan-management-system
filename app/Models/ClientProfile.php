<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProfile extends Model
{
    protected $table = 'client_profiles';

    protected $fillable = [
        'user_id',
        'company_title',
        'contact_person_name',
        'description',
        'email',
        'phone',
        'address',
        'website',
        'logo',
        'status',
    ];
    protected $casts = [
        'user_id' => 'integer',
        'company_title' => 'string',
        'contact_person_name' => 'string',
        'description' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'website' => 'string',
        'logo' => 'string',
        'status' => 'string',
    ];
}

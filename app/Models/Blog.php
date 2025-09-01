<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'author',
        'tags',
        'status',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'thumbnail' => 'string',
        'author' => 'string',
        'tags' => 'json',
        'status' => 'string',
    ];

}

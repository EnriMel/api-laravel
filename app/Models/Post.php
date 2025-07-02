<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'is_draft',
        'published_at'
    ];

    protected $casts = [
        'is_draft'     => 'boolean',
        'published_at' => 'date',
    ];
}

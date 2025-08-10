<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use phpDocumentor\Reflection\Types\Boolean;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'is_draft',
        'published_at'
    ];

    protected $casts =  [
        'isDraft'      => 'boolean',
        'published_at' => 'date'
    ];
}

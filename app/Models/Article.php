<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_article';

    protected $fillable = [
        'title',
        'slug',
        'author',
        'summary',
        'content',
        'image',
        'published',
        'published_at'
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime'
    ];
}

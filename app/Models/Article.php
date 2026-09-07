<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'date_formatted',
        'read_time',
        'author',
        'author_role',
        'excerpt',
        'highlights',
        'content',
        'tags',
        'is_published',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'tags' => 'array',
            'is_published' => 'boolean',
            'views' => 'integer',
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'category',
        'date_formatted',
        'read_time',
        'author_id',
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

    public function categoryRel(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function authorRel(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function getCategoryTitleAttribute(): string
    {
        return $this->categoryRel?->name ?? ($this->category ?: 'Artikel');
    }

    public function getAuthorNameAttribute(): string
    {
        return $this->authorRel?->name ?? ($this->author ?: 'Akuntan Indonesia .ID');
    }

    public function getAuthorRoleTitleAttribute(): string
    {
        return $this->authorRel?->role ?? ($this->author_role ?: 'Akuntan & Konsultan Perpajakan Resmi');
    }

    public function getAuthorBioTextAttribute(): string
    {
        return $this->authorRel?->bio ?: 'Praktisi akuntansi profesional dan Kuasa Hukum Resmi Pengadilan Pajak Republik Indonesia berizin resmi Kementerian Keuangan RI. Berpengalaman luas dalam restrukturisasi pembukuan, pendampingan SP2DK, tax planning, dan mitigasi sengketa perpajakan korporasi.';
    }

    public function getAuthorAvatarUrlAttribute(): string
    {
        if ($this->authorRel) {
            return $this->authorRel->avatar_url;
        }

        // Check if author name matches Hendra Setiyawan
        if ($this->author && stripos($this->author, 'Hendra') !== false) {
            return asset('images/owner-hendra-setiyawan.png');
        }

        return asset('images/mascot-standing.png');
    }
}

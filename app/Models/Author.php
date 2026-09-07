<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'avatar',
        'email',
        'phone',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the avatar URL or fallback to the mascot image.
     */
    public function getAvatarUrlAttribute(): string
    {
        if (! empty($this->avatar)) {
            if (str_starts_with($this->avatar, 'http://') || str_starts_with($this->avatar, 'https://')) {
                return $this->avatar;
            }

            if (str_starts_with($this->avatar, 'images/')) {
                return asset($this->avatar);
            }

            return asset('storage/'.$this->avatar);
        }

        return asset('images/mascot-standing.png');
    }
}

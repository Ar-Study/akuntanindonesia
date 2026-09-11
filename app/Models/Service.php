<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_label',
        'badge',
        'color',
        'icon',
        'subtitle',
        'desc',
        'price_note',
        'features',
        'points',
        'mascot_tip',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'points' => 'array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getEffectiveDescriptionAttribute(): ?string
    {
        return $this->desc ?: $this->subtitle;
    }

    public function getEffectivePointsAttribute(): array
    {
        if (! empty($this->points) && is_array($this->points)) {
            return $this->points;
        }

        if (! empty($this->features) && is_array($this->features)) {
            return $this->features;
        }

        return [];
    }
}

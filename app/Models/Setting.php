<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    /**
     * Get a setting value by key with optional default.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        if (! $setting || $setting->value === null) {
            return $default;
        }

        if ($setting->type === 'json' || is_array($default)) {
            $decoded = json_decode($setting->value, true);

            return json_last_error() === JSON_ERROR_NONE ? $decoded : $setting->value;
        }

        if ($setting->type === 'boolean') {
            return filter_var($setting->value, FILTER_VALIDATE_BOOLEAN);
        }

        return $setting->value;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, mixed $value, string $group = 'general', ?string $type = null): self
    {
        if (is_array($value)) {
            $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $type = $type ?? 'json';
        } elseif (is_bool($value)) {
            $value = $value ? '1' : '0';
            $type = $type ?? 'boolean';
        } else {
            $type = $type ?? 'text';
        }

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'type' => $type,
            ]
        );
    }

    /**
     * Get all settings in a specific group as an associative array.
     */
    public static function getGroup(string $group): array
    {
        $settings = static::where('group', $group)->get();
        $results = [];

        foreach ($settings as $setting) {
            if ($setting->type === 'json') {
                $decoded = json_decode($setting->value, true);
                $results[$setting->key] = json_last_error() === JSON_ERROR_NONE ? $decoded : $setting->value;
            } elseif ($setting->type === 'boolean') {
                $results[$setting->key] = filter_var($setting->value, FILTER_VALIDATE_BOOLEAN);
            } else {
                $results[$setting->key] = $setting->value;
            }
        }

        return $results;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'telepon',
        'bisnis',
        'kebutuhan',
        'pesan',
        'status',
        'admin_notes',
    ];
}

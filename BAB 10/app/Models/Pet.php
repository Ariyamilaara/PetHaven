<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    // Menambahkan properti $fillable untuk mencegah mass-assignment exception
    protected $fillable = [
        'name',
        'type',
        'duration',
        'notes',
    ];
}

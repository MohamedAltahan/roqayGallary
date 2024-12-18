<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'status'];

    protected $casts = [
        'status' => 'boolean',
        'name' => 'array',
        'description' => 'array',
    ];
}

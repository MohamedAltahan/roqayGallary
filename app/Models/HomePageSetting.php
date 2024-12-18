<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    public $translatable = ['sub_title'];

    protected $fillable = ['group', 'name', 'payload'];

    protected $casts = [
        'payload' => 'array',
    ];
}

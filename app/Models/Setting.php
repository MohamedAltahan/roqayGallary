<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory;


    protected $fillable = [
        'site_name',
        'contact_email',
        'contact_address',
        'contact_phone',
        'banner_at_home',
        'site_description'
    ];
    protected $casts = [
        'contact_address' => 'array',
        'site_description' => 'array'
    ];
}

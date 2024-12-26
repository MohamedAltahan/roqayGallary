<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'images_group_key',];

    public function design()
    {
        return $this->belongsTo(Design::class, 'images_group_key', 'images_group_key');
    }
}

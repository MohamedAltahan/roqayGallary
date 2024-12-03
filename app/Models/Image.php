<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'images_group_key', 'at_home'];

    public function design()
    {
        return $this->belongsTo(Design::class, 'images_group_key', 'images_group_key');
    }
}

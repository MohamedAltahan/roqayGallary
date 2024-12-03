<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'description', 'long_description', 'status', 'thumbnail', 'title', 'images_group_key'];

    protected $casts = [
        'description' => 'array',
        'long_description' => 'array',
        'name' => 'array',
        'title' => 'array',
    ];

    // relations
    public function images()
    {
        return $this->hasMany(Image::class, 'images_group_key', 'images_group_key')->limit(4);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'design_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

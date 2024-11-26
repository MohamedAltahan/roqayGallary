<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'description', 'status', 'thumbnail', 'title'];

    protected $casts = [
        'description' => 'array'
    ];
    // relations
    public function images()
    {
        return $this->hasMany(Image::class, 'design_id', 'id');
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

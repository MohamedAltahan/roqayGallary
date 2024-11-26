<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'slug', 'icon', 'status', 'created_at', 'updated_at'];

    // relations
    public function design()
    {
        return $this->hasOne(Design::class, 'category_id', 'id');
    }
}

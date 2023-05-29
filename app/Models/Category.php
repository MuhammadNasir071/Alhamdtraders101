<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'image', 'parent_id', 'lavel', 'created_at'];

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}

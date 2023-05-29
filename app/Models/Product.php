<?php

namespace App\Models;

use App\Models\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [ 'name', 'category_id', 'shipping_type_id', 'min_price', 'max_price',
                            'weight_unit', 'details', 'availablity', 'created_at'];



    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shippingType()
    {
        return $this->belongsTo(ShippingType::class);
    }

    public function allCategory()
    {
        return $this->belongsTo(Category::class)->where('level', 1);
    }
}

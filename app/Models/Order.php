<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['product_id', 'name', 'email', 'contact', 'country', 'city', 'state', 'appartment',
                            'quantity', 'total_price', 'postal_code', 'address', 'status'];


    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}

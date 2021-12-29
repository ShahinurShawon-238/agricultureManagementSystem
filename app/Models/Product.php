<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'seller_name',
        'city',
        'address',
        'number',
        'product_name',
        'product_details',
        'product_price',
        'discount',
        'quantity',
        'product_image',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'customer_id', 'id');
    }
}

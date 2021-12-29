<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'product_id',
        'address',
        'payment_method',
        'totalAmount',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}

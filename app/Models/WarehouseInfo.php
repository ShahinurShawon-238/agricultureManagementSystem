<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseInfo extends Model
{
    use HasFactory;
    protected $fillable=[
        'warehouse_place_id',
        'info',
    ];
    public function place(){
        return $this->belongsTo(WarehousePlace::class, 'warehouse_place_id', 'id');
    }
}

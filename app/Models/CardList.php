<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use HasFactory;
    protected $fillable=[
        'card_details_id',
        'list',
    ];
    public function details(){
        return $this->belongsTo(CardDetails::class, 'card_details_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'image',
    ];
    public function list()
    {
        return $this->hasMany(CardList::class);
    }
}

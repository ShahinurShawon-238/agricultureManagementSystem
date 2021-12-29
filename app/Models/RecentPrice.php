<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentPrice extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'dhakaKg',
        'dhakaQuintal',
        'chittagongKg',
        'chittagongQuintal',
        'khulnaKg',
        'khulnaQuintal',
        'rajshahiKg',
        'rajshahiQuintal',
        'rangpurKg',
        'rangpurQuintal',
        'sylhetKg',
        'sylhetQuintal',
        'barishalKg',
        'barishalQuintal',
    ];
}

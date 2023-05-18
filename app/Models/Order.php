<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'products',
        'quantities',
        'totalCost',
        'user_id'
    ];

    protected $casts = [
        'products' => 'array',
        'quantities' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

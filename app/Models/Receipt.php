<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shipping_address', 'items'];

    protected $casts = [
        'items' => 'array'
    ];
}

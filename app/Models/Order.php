<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        'user_name',
        'user_id',
        'restaurant',
        'restaurant_id',
        'orders',
        'order_cash',
        'post_cash',
        'discount_code',
        'address_id',
        'state'
    ];

}

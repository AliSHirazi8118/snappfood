<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory,SoftDeletes ;

    public $fillable = [
        'food_name',
        'material',
        'price',
        'food_cat_id',
        'food_cat',
        'image',
        'discount',
        'food_party',
    ];
}

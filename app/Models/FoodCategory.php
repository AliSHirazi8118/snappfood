<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodCategory extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        'food_categories',
        'food_count',
        'restaurant_id'
    ];
}

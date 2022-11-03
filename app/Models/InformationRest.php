<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationRest extends Model
{
    use HasFactory;

    public $fillable = [
        'rest_name',
        'rest_type',
        'food_type',
        'address',
        'phone',
        'account_number',
        'post_cash',
        'work_times',
        'image',
        'state'
    ];

}

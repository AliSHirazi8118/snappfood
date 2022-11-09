<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformationRest extends Model
{
    use HasFactory,SoftDeletes;

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurnt extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        'restaurnt_categories',
        'description',
        'count'
    ];



}

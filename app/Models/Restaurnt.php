<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurnt extends Model
{
    use HasFactory;

    public $fillable = [
        'restaurnt_categories',
        'description',
        'count'
    ];



}

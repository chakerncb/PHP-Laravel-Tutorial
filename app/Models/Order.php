<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_ar',
        'name_en',
        'name_fr',
        'category',
        'description_ar',
        'description_en',
        'description_fr',
        'image',
        'views',
        'created_at',
        'updated_at',
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];  

    

}



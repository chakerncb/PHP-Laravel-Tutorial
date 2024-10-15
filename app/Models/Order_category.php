<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_category extends Model
{
    use HasFactory;
    protected $table = 'order_catg';

    protected $fillable = [
        'id',
        'name',
    ];
}

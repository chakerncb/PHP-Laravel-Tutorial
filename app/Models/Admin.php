<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

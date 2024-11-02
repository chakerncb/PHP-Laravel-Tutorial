<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomAthificationController extends Controller
{
    //

    public function adult(){
        return view('customAuth.index');
    }

    // public function user(){
    //     return view('customAuth.user');
    // }

    // public function admin(){
    //     return view('customAuth.admin');
    // }
}

<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /*

    public function index() {
        return ('this is algeria {ROUTING WITH CONTROLLER}');
    }  */

    public function index() {
        return view('index');
    }

    public function resume () {
        return view('front.resume');
    }

    public function contact () {
        return view('front.contact');
    }

    public function projects () {
        return view('front.projects');
    }
}

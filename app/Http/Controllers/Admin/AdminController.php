<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    // the method __construct() is make the middeleware applied to all the methods in this controller
    public function __construct() {
        $this->middleware('auth') ->except('showUsers'); // except() to make the method showUsers() not applied to the middleware
    }
    public function adminPanel() {
        return ('this is admin panel');
    }

    public function showUsers() {
        return ('this is admin panel users');
    }
}

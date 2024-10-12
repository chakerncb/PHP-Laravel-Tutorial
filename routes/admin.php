<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 // to make the routes in this file worked you should add this line in RouteServiceProvider.php :
      // protected $namespace = 'App\Http\Controllers';
   // Or 
   //(the best way) you can add this two lines in RouteServiceProvider.php :
      // Route::namespace('App\Http\Controllers')
      // ->group(base_path('routes/admin.php'));

 Route::get ('/admin' , function () {
    return ('this is admin panel');
 });


 Route::get('/panel' , 'App\Http\Controllers\Admin\AdminController@adminPanel');
 Route::get('/users1' , 'App\Http\Controllers\Admin\AdminController@showUsers');


 
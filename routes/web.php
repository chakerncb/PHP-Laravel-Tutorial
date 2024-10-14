<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers;

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

 Auth::routes(['verify' => true]);
 Route::get('/' , 'App\Http\Controllers\Front\UserController@index') -> name('index');
 Route::get('/resume' , 'App\Http\Controllers\Front\UserController@resume') -> name('resume');
 Route::get('/contact' , 'App\Http\Controllers\Front\UserController@contact') -> name('contact');
 Route::get('/projects' , 'App\Http\Controllers\Front\UserController@projects') -> name('projects');
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) -> middleware('verified') -> name('home');

 Route::get('fillables' , 'App\Http\Controllers\CrudController@getorders');


 Route::group(['prefix' => 'table'] , function (){

    Route::get('insert' , 'App\Http\Controllers\CrudController@insert');


 });
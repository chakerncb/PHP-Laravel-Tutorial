<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Mcamara\LaravelLocalization\LanguageNegotiator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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



Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {

	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

  Auth::routes(['verify' => true]); // this will add the email verification routes
  Route::get('/' , 'App\Http\Controllers\Front\UserController@index') -> name('index');
  Route::get('/resume' , 'App\Http\Controllers\Front\UserController@resume') -> name('resume');
  Route::get('/contact' , 'App\Http\Controllers\Front\UserController@contact') -> name('contact');
  Route::get('/projects' , 'App\Http\Controllers\Front\UserController@projects') -> name('projects');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) -> middleware('verified') -> name('home');
 

  Route::group(['prefix' => 'order'] , function () {
 
     Route::get('show' , 'App\Http\Controllers\OrderController@getAllOrders');
     Route::get('create' , 'App\Http\Controllers\OrderController@create');  
     Route::post('store' , 'App\Http\Controllers\OrderController@store') -> name('orders.store');
     Route::get('edit/{order_id}' , 'App\Http\Controllers\OrderController@edit') -> name('orders.edit');
       Route::post('update/{order_id}' , 'App\Http\Controllers\OrderController@update') -> name('orders.update');  
 
       Route::get('details/{order_id}' , 'App\Http\Controllers\OrderController@OrderDetails') -> name('orders.details');
       Route::get('delete/{order_id}' , 'App\Http\Controllers\OrderController@delete') -> name('orders.delete');

    });



    /////////////////////////////  ajax routes  ///////////////////////////////////////

      
        




 });

 Route::group(['prefix' => 'product'] , function (){

   Route::get('create' , 'App\Http\Controllers\ProductController@create');
   Route::post('store' , 'App\Http\Controllers\ProductController@store') -> name('product.store');
   Route::get('show' , 'App\Http\Controllers\ProductController@getAllProducts') -> name('product.show'); 
   Route::Post('delete' , 'App\Http\Controllers\ProductController@delete') -> name('product.delete');
   Route::get('edit/{product_id}' , 'App\Http\Controllers\ProductController@edit') -> name('product.edit');
   Route::post('update' , 'App\Http\Controllers\ProductController@update') -> name('product.update');

});
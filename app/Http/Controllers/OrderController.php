<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use app\Models\Order;
use app\Models\Order_category;
use Validator;

class OrderController extends Controller
{
    //

    public function create () {
        $ord_catg = App\Models\Order_category::pluck('name');
       return view('front.orders', compact('ord_catg'));

       // using pulck method

       // $ord_catg = App\Models\Order_category::pluck('name');
   }


   public function store (Request $request) {

    // validate the request

    $validator = Validator::make($request -> all(), [
        'name' => 'required|unique:orders,name',
        'category' => 'required',
        'description' => 'required|max:255|min:10',
    ]);

    // if validation fails return the errors
       if ($validator -> fails()) {
           return $validator -> errors() -> first();
       }



    //
     App\Models\Order::create([
        'name' => $request -> name,
        'category' => $request -> category,
        'description' => $request -> description,
    ]);

    return 'Order created successfully';

}

}

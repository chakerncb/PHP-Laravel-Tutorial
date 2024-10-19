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

    $Rules = [
        'name' => 'required|unique:orders,name',
        'category' => 'required',
        'description' => 'required|max:255|min:10',
    ];
    
      $messages = [
           // custom error messages (on arabic)

                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود مسبقا',
                'category.required' => 'التصنيف مطلوب',
                'description.required' => 'الوصف مطلوب',
                'description.max' => 'الوصف يجب ان لا يتجاوز 255 حرف',
                'description.min' => 'الوصف يجب ان لا يقل عن 10 حروف',


      ];

      $validator = Validator::make($request -> all(), $Rules, $messages);

    // if validation fails return the errors
       if ($validator -> fails()) {
           return redirect()->back()->withErrors($validator)->withInput($request -> all());
       }




    //
     App\Models\Order::create([
        'name' => $request -> name,
        'category' => $request -> category,
        'description' => $request -> description,
    ]);

    return redirect()->back()->with('success', 'تم اضافة الطلب بنجاح');

}

}

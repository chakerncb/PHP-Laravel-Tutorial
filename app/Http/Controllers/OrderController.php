<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use app\Models\Order;
use app\Models\Order_category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Validator;

class OrderController extends Controller
{
    //

    public function create () {
        $ord_catg = app\Models\Order_category::pluck('name_'.LaravelLocalization::getCurrentLocale());
       return view('front.orders.orders', compact('ord_catg'));
   }


   public function store (OrderRequest $request) {

    // validate the request

    // $Rules = [
    //     'name' => 'required|unique:orders,name',
    //     'category' => 'required',
    //     'description' => 'required|max:255|min:10',
    // ];
    
    //   $messages = [
    //        // custom error messages (on arabic)

    //             'name.required' => __('messages.name_required'),
    //             'name.unique' => __('messages.name_uniqe'),
    //             'category.required' => __('messages.category_required'),
    //             'description.required' => __('messages.description_required'),
    //             'description.min' => __('messages.description_min'),
    //             'description.max' => __('messages.description_max'),
    //             'description' => __('messages.description'),


    //   ];

    //   $validator = Validator::make($request -> all(), $Rules, $messages);

    // // if validation fails return the errors
    //    if ($validator -> fails()) {
    //        return redirect()->back()->withErrors($validator)->withInput($request -> all());
    //    }




    //
    app\Models\Order::create([
        'name' => $request -> name,
        'category' => $request -> category,
        'description' => $request -> description,
    ]);

    return redirect()->back()->with('success', 'تم اضافة الطلب بنجاح');

}

  
   public function getAllOrders () {
       $orders = app\Models\Order::select(
                   'id',
                   'name_'.LaravelLocalization::getCurrentLocale().' as name',
                   'category',
                   'description_'.LaravelLocalization::getCurrentLocale().' as description'
           )->get();

          return view('front.orders.index', compact('orders'));
   }

   public function edit ($order_id) {
      //  App\Models\Order::findOrFail($order_id);  // check if the order_id is exist in the database and give an error if not.
     $id =  App\Models\Order::find($order_id);  

        if(!$id) {
            return redirect()->back();
            }  // if the order_id is not exist in the database redirect back to the previous page.

            $ord_catg = app\Models\Order_category::pluck('name_'.LaravelLocalization::getCurrentLocale());
            $order = App\Models\Order::select(
                    'id',
                    'name_ar',
                    'name_en',
                    'name_fr',
                    'category',
                    'description_ar',
                    'description_en',
                    'description_fr'

             )->find($order_id);

        return view('front.orders.edit', compact('order'));


}

  
   public function update($order_id , OrderRequest $request) {

    // validate the request in the order request file

    // check if the order_id is exist in the database and give an error if not.

    $order =  App\Models\Order::find($order_id);

    if(!$order) {
        return redirect()->back();
        }  // if the order_id is not exist in the database redirect back to the previous page.

    // update the order

    //  $order -> update($request -> all()); // update all the fields in the order table

    $order -> update([
        'name_ar' => $request -> name_ar,
        'name_en' => $request -> name_en,
        'name_fr' => $request -> name_fr,
        'category' => $request -> category,
        'description_ar' => $request -> description_ar,
        'description_en' => $request -> description_en,
        'description_fr' => $request -> description_fr,
    ]);

    return redirect()->back()->with(['success' => 'تم تعديل الطلب بنجاح']);

   }
}
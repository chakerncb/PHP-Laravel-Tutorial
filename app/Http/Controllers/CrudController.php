<?php

namespace App\Http\Controllers;
use App;
use app\Models\Order;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function __construct() {
        $this -> middleware('auth');
    }

    public function getorders (){
      //  $orders = App\Models\Order::select('id', 'name')->get();
        $orders = App\Models\Order::all();
        return response() -> json($orders);
    }

    public function insert () {
        
        App\Models\Order::create([
            'name' => 'Order 3',
            'category' => 'app',
            'description' => 'Description 3',
        ]);

    }
}

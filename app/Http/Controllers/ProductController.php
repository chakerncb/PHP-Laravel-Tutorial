<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Traits\ImageTraits;
use Illuminate\Http\Request;
use App;

class ProductController extends Controller
{
    use ImageTraits;
    
    public function create() {
        return view('front.products.create');
    }

    public function store(ProductRequest $request) {
   
        $filename = $this -> saveImage($request -> image , 'images/products');

        app\Models\Product::create([
            'name' => $request -> name,
            'price' => $request -> price,
            'description' => $request -> description,
            'image' => $filename,

           
        ]);

        return redirect() -> back() -> with(['success' => 'Product created successfully']);
    }

    public function getAllProducts() {
        $products = app\Models\Product::select(
                'id',
                'name',
                'price',
                'description',
                'image'
        ) -> get();
        
        return view('front.products.index', compact('products'));
    }

}

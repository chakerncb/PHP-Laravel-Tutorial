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

       $product = app\Models\Product::create([
            'name' => $request -> name,
            'price' => $request -> price,
            'description' => $request -> description,
            'image' => $filename,

           
        ]);

        // return redirect() -> back() -> with(['success' => 'Product created successfully']);)

        if(!$product) {
            return response() -> json(
                [
                    'status' => false,
                    'message' => 'Product not created'
                ]
            );
        }
         else{

        return response() -> json(
            [
                'status' => true,
                'message' => 'Product created successfully'
            ]
        );
    }
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

    public function delete(Request $request) {
        $product_id = $request -> product_id;
        $product = app\Models\Product::find($product_id);
        if(!$product) {
            return response() -> json(
                [
                    'status' => false,
                    'message' => 'Product not found'
                ]
            );
        } else {
            $product -> delete();
            return response() -> json(
                [
                    'status' => true,
                    'message' => 'Product deleted successfully',
                    'product_id' => $product_id
                ]
            );
        }       
    }

    

}

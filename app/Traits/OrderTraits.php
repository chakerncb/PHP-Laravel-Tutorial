<?php 

namespace App\Traits;


Trait OrderTraits {

   function saveImage($image_request , $image_path) {
        $file_extension = $image_request -> getClientOriginalExtension(); 
        $file_name = time().'.'.$file_extension; 
        $path = $image_path;
        $image_request -> move($path , $file_name);
        
        return $file_name;
       }

}
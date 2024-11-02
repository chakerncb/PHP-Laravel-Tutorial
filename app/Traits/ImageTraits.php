<?php 

namespace App\Traits;


Trait ImageTraits {

   function saveImage($image_request , $image_path) {

      if($image_request != null) {
         $file_extension = $image_request -> getClientOriginalExtension(); 
         $file_name = time().'.'.$file_extension; 
         $path = $image_path;
         $image_request -> move($path , $file_name);
      }
      else {
         $file_name = 'no-image.png';
      }
       
        
        return $file_name;
       }

}
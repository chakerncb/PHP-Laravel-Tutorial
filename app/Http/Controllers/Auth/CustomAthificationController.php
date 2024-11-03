<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CustomAthificationController extends Controller
{
    //

    public function adult(){
        return view('customAuth.index');
    }

    public function user(){
        return view('customAuth.user');
    }

    public function admin(){
        return view('customAuth.admin');
    }

    public function adminLogin(){
        return view('customAuth.login');
    }

    public function CheckAdminLogin(Request $request){
        // $this->validate($request , [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        if(Auth::guard('admin')->attempt(['email' => $request -> email, 'password' => $request -> password])){
            return redirect() -> intended('/admin');
        }
        return back() -> withInput($request -> only('email'));
       
    }
}

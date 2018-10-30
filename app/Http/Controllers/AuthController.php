<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules=[
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ];
        $messages=[
            'email.exists' => 'Invalid Email Id',
        ];
        $validator=Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $messages = $validator->messages();
                return redirect()->back()->withErrors($messages);
        } else {
            $credentials = $request->only('email','password');
	    	if (Auth::attempt($credentials)) {
	          $response = [
	                'id' => Auth::user()->id,
	                'name' => Auth::user()->name,
	                'email' => Auth::user()->email,
	                'phone' => Auth::user()->phone,
	                'role'=>Auth::user()->role
	            ];
	        	if(Auth::user()->role=="admin")
	        		{
	        			return redirect("admin/admin_home")->with(['userid'=>[Auth::user()->id]]);
	        		}
	        		else{
	        			return redirect("employee/employee_home")->with(['userid'=>[Auth::user()->id]]);
	        		}
	   		} 
	   		else {        
                return redirect()->back()->withErrors(['password'=>['Wrong Password']]);
	    	}
        }
    }
}

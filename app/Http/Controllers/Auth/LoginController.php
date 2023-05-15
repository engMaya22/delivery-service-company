<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
    
      $this->data['headline'] = 'Login';
      return view('login.form',$this->data);
    }

    public function authenticate(LoginRequest $request){
      $data = $request->only('email','password');
      if(Auth::guard('manager')->attempt($data)){
        return redirect()->intended('dashboard');
      }
      return back()->withInput($request->only('email', 'password'))->withErrors([
        'email' => 'Invalid email or password.',
      ]);
    }
    
    public function logout(){
        Auth::guard('manager')->logout();
        // return redirect()->route('login');
        return view('index');
    }
    
}

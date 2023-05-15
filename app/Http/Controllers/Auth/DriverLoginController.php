<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverLoginRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverLoginController extends Controller
{
    public function login(){
    
        $this->data['headline'] = 'Login Driver';
        return view('login.driver-login',$this->data);
      }
  
      public function authenticate(DriverLoginRequest $request){
        $data = $request->only('name','id_number');
        $driver =  Driver::where('id_number',$data['id_number'])->where('name',$data['name'])->first();
        if($driver)
        {
         $loginResult = auth()->guard('driver')->login($driver);
         return redirect()->route('dashboard');
        }
    
        return back()->withInput($request->only('name', 'id number'))->withErrors([
          'email' => 'Invalid name or id number.',
        ]);
      }
      
      public function logout(){
          Auth::guard('driver')->logout();
          // return redirect()->route('login');
          return view('index');
      }


}

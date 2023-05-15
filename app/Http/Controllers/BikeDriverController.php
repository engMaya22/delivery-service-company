<?php

namespace App\Http\Controllers;

use App\Models\BikeDriver;
use Illuminate\Http\Request;
use PDO;

class BikeDriverController extends Controller
{
    public function index(){
        $this->data['reports'] = BikeDriver::with('driver','bike')->get();
        return view('bike-driver',$this->data);
    }
}

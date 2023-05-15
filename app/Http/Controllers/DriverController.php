<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Mail\SendToManagerMail;
use App\Models\Bike;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['drivers'] = Driver::all();
        return view('drivers.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']   = 'create';
        $this->data['headline'] = 'Add New Driver';
        return view('drivers.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $data = $request->validated();
        $driver = new Driver();
        $driver->name  = $request->name;
        $driver->birthday  = $request->birthday;
        $driver->id_number  = $request->id_number;
        if ($request->has('image')) {
            $file = $request->file('image');
            $name = rand(1, 10) . rand(1, 10) . rand(1, 10) . $file->getClientOriginalName();
            $extension = $file->extension();
            $file->storeAs('public/drivers', $name);
            $driver->image = 'drivers' . '/' . $name;
        }
        $driver->save();
        Session::flash('Driver Added Successfully');
        
        return redirect()->to('drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['driver'] = Driver::findOrFail($id);
        return view('drivers.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['driver'] = Driver::find($id);
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update '.$this->data['driver']->name. ' Driver';
        return view('drivers.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $driver->name  = @$request->name;
        $driver->birthday  = @$request->birthday;
        $driver->id_number  = @$request->id_number;
        if ($request->has('image')) {
            $file = $request->file('image');
            $name = rand(1, 10) . rand(1, 10) . rand(1, 10) . $file->getClientOriginalName();
            $extension = $file->extension();
            $file->storeAs('public/drivers', $name);
            $driver->image = 'drivers' . '/' . $name;
        }
        $driver->save();
        Session::flash('Driver updated successfully');
        
        return redirect()->to('drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Driver::find($id)->delete() ) {
            Session::flash('message', 'Driver removed successfully');
        }
        return redirect()->to('drivers');
    }

    public function left($bikeId){
        
        $currentDriver = auth()->guard('driver')->user();
        $bike = Bike::find($bikeId);
        if($bike->status == Bike::IDLE)
        {   Session::flash('Driver Is Idle !');
            return redirect('bikes');
        }
        
        $bike->status = Bike::IDLE;
        $bike->save();
        $driverBikes = $currentDriver->bikes;
        if( $driverBikes->contains('id',$bike->id)){
            $currentDriver->bikes()->updateExistingPivot($bike->id, array('departure_time' => now()));
        }else{
            $currentDriver->bikes()->attach($bike->id, array('departure_time' => now()));

        }
        $driver = $currentDriver->name;
        $action = "left";
        Mail::to('eng.maya.esmaeel1@gmail.com')->send(new SendToManagerMail($driver , $action));
        return redirect('bikes');
    }
    
    public function arrived($bikeId){
        $currentDriver =  auth()->guard('driver')->user();
        $bike = Bike::find($bikeId);
        if($bike->status != Bike::IDLE)
        {
            Session::flash('Driver Isnot Idle !');
            return redirect('bikes');
        }
        $bike->status = Bike::AVAILABLE;
        $bike->save();
        $currentDriver->bikes()->updateExistingPivot($bike->id, array('arrival_time' => now()));
        $driver = $currentDriver->name;
        $action = "arrived";
        Mail::to('eng.maya.esmaeel1@gmail.com')->send(new SendToManagerMail($driver , $action));
        return redirect('bikes');
    }
}

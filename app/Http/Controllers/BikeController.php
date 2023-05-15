<?php

namespace App\Http\Controllers;

use App\Http\Requests\BikeRequest;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['bikes'] = Bike::all();
        return view('bikes.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['mode']   = 'create';
        $this->data['headline'] = 'Add New Bike';
        return view('bikes.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BikeRequest $request)
    {
        $data = $request->validated();
        if(Bike::create($data)){
            Session::flash('Bike Added Successfully');
        }
        return redirect()->to('bikes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['bike'] = Bike::findOrFail($id);
        return view('bikes.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['bike'] = Bike::find($id);
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update Bike';
        return view('bikes.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BikeRequest $request, $id)
    {
        $bike = Bike::findOrFail($id);
        if($bike->update($request->validated())){
            Session::flash('Bike updated successfully');
        }
        return redirect()->to('bikes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Bike::find($id)->delete() ) {
            Session::flash('message', 'Bike removed successfully');
        }
        
        return redirect()->to('bikes');
    }

  
}

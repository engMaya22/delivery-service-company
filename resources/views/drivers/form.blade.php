@extends('layout.main')

@section('main_content')
	<h2> {{ $headline }} </h2>
	
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
	    </div>
	    <div class="card-body">
	    	<div class="row justify-content-md-center">
	    		<div class="col-md-12">
	    			@if($mode == 'edit')
	    				{!! Form::model($driver, [ 'route' => ['drivers.update', $driver->id], 'method' => 'put' ,'enctype'=>"multipart/form-data" ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'drivers.store', 'method' => 'post','enctype'=>"multipart/form-data" ]) !!}	
	    			@endif
					  <div class="form-group row">
					    <label for="name" class="col-sm-2 text-right col-form-label">Name <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      {{ Form::text('name', NULL, [ 'class'=>'form-control', 'id' => 'name', 'placeholder' => 'Name' ]) }}
                          <span class="text-danger">
                            {{$errors->first('name')}}
                          </span>
                        </div>
					  </div>

					  <div class="form-group row">
					    <label for="image" class="col-sm-2 text-right col-form-label">Image <span class="text-danger">*</span>  </label>
					    <div class="col-sm-9">
					      {{ Form::file('image', [ 'class'=>'form-control', 'id' => 'image', 'placeholder' => 'Image' ]) }}
                          <span class="text-danger">
                            {{$errors->first('image')}}
                          </span>
                        </div>
					  </div>


					  <div class="form-group row">
					    <label for="birthday" class="col-sm-2 text-right col-form-label">Birthday <span class="text-danger">*</span>  </label>
					    <div class="col-sm-9">
					      {{ Form::date('birthday', NULL, [ 'class'=>'form-control', 'id' => 'birthday', 'placeholder' => 'Birthday' ]) }}
                          <span class="text-danger">
                            {{$errors->first('birthday')}}
                          </span>
                        </div>
					  </div>

					 
					  
					  <div class="form-group row">
					    <label for="id_number" class="col-sm-2 text-right col-form-label">ID Number<span class="text-danger">*</span></label>
					    <div class="col-sm-5">
					      {{ Form::number('id_number', NULL, [ 'class'=>'form-control', 'id' => 'id_number', 'placeholder' => 'ID Number' ]) }}
                          <span class="text-danger">
                            {{$errors->first('id_number')}}
                          </span>
                        </div>
					  </div>

					  <div class="form-group row mt-4">
					    <label for="price" class="col-sm-2 text-right col-form-label"></label>
					    <div class="col-sm-5">
					      <button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-save"></i> Submit</button>	
					    </div>
					  </div>
					  
					{!! Form::close() !!}
	    		</div>
	    	</div>
	    </div>
	</div>
@stop
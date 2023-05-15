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
	    				{!! Form::model($bike, [ 'route' => ['bikes.update', $bike->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'bikes.store', 'method' => 'post' ]) !!}	
	    			@endif
					  <div class="form-group row">
					    <label for="type" class="col-sm-2 text-right col-form-label">Type <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      {{ Form::text('type', NULL, [ 'class'=>'form-control', 'id' => 'type', 'placeholder' => 'Type' ]) }}
                          <span class="text-danger">
                            {{$errors->first('type')}}
                          </span>
                        </div>
					  </div>

					  <div class="form-group row">
					    <label for="description" class="col-sm-2 text-right col-form-label">Description <span class="text-danger">*</span>  </label>
					    <div class="col-sm-9">
					      {{ Form::textarea('description', NULL, [ 'class'=>'form-control', 'id' => 'description', 'placeholder' => 'Description' ]) }}
                          <span class="text-danger">
                            {{$errors->first('description')}}
                          </span>
                        </div>
					  </div>

					  <div class="form-group row">
					    <label for="status" class="col-sm-2 text-right col-form-label">Status <span class="text-danger">*</span> </label>
					    <div class="col-sm-5">
					      {{ Form::select('status', [ ['1' => 'available', '2' => 'idle'] ]) }}
                          <span class="text-danger">
                            {{$errors->first('status')}}
                          </span>
                        </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="number" class="col-sm-2 text-right col-form-label">Number<span class="text-danger">*</span></label>
					    <div class="col-sm-5">
					      {{ Form::number('number', NULL, [ 'class'=>'form-control', 'id' => 'number', 'placeholder' => 'Number' ]) }}
                          <span class="text-danger">
                            {{$errors->first('number')}}
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
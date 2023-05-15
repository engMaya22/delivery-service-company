@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<a class="btn btn-primary" href="{{ route('drivers.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> the driver </h6>
	    </div>
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-8">
	    			<table class="table table-borderless table-striped">
			      	<tr>
			      		<th class="text-right">Name:</th>
			      		<td> {{ $driver->name }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">ID Number : </th>
			      		<td> {{ $driver->id_number }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Image: </th>
			      		<td><img src= "/storage/{{$driver->image}}"  alt="driver image" width="100" height="100"> </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Birthday : </th>
			      		<td>  {{$driver->birthday}}</td>
			      	</tr>
				     </table>
	    		</div>
	    	</div>

	    </div>
	  </div>

@stop
 
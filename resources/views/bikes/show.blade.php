@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<a class="btn btn-primary" href="{{ route('bikes.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> the bike </h6>
	    </div>
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-8">
	    			<table class="table table-borderless table-striped">
			      	<tr>
			      		<th class="text-right">Type:</th>
			      		<td> {{ $bike->type }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Number : </th>
			      		<td> {{ $bike->number }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Description: </th>
			      		<td> {{ $bike->description }} </td>
			      	</tr>
			      	<tr>
			      		<th class="text-right">Status : </th>
			      		<td> {{ $bike->status == 1 ? 'available' : 'idle'  }} </td>
			      	</tr>
				     </table>
	    		</div>
	    	</div>

	    </div>
	  </div>

@stop
 
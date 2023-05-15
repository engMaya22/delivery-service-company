@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Drivers </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('drivers.create') }}"> <i class="fa fa-plus"></i> New Driver </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">Drivers</h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              {{-- <th>ID</th> --}}
	              <th>Name</th>
	              <th>Birthday</th>
	              <th>ID Number</th>
	              <th>Image</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
					{{-- <th>ID</th> --}}
	                <th>Name</th>
	                <th>Birthday</th>
	                <th>ID Number</th>
	                <th>Image</th>
					<th class="text-right">Actions</th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach ($drivers as $driver)
		            <tr>
		              {{-- <td> {{ $driver->id }} </td> --}}
		              <td> {{ $driver->name }} </td>
		              <td> {{ $driver->birthday }} </td>
		              <td> {{ $driver->id_number }} </td>
		              <td> <img src= "/storage/{{$driver->image}}"  alt="driver image" width="50" height="50"> </td>
		              <td class="text-right">
		              	
		              	<form method="POST" action=" {{ route('drivers.destroy', ['driver' => $driver->id]) }} ">
		              		<a class="btn btn-primary btn-sm" href="{{ route('drivers.show', ['driver' => $driver->id]) }}"> 
			              	 	<i class="fa fa-eye"></i> 
			              	</a>
			              	<a class="btn btn-primary btn-sm" href="{{ route('drivers.edit', ['driver' => $driver->id]) }}"> 
			              	 	<i class="fa fa-edit"></i> 
			              	</a>
		              		@csrf
		              		@method('DELETE')
		              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
		              			<i class="fa fa-trash"></i>  
		              		</button>	
		              	</form>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>


@stop
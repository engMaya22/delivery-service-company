@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Bikes </h2>		
		</div>
		@if(Auth::guard('manager')->check())
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('bikes.create') }}"> <i class="fa fa-plus"></i> New Bike </a>
		</div>
		@endif
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">Bikes</h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>ID</th>
	              <th>Type</th>
	              <th>Number</th>
	              <th>Description</th>
	              <th>Status</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
					<th>ID</th>
					<th>Type</th>
					<th>Number</th>
					<th>Description</th>
					<th>Status</th>
					<th class="text-right">Actions</th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach ($bikes as $bike)
		            <tr>
		              <td> {{ $bike->id }} </td>
		              <td> {{ $bike->type }} </td>
		              <td> {{ $bike->number }} </td>
		              <td> {{ $bike->description }} </td>
		              <td> {{ $bike->status == 1 ? 'available' : 'idle' }} </td>
		              <td class="text-right">
							<div  class="row" >
								 <div class="col-md-6">
									<form  method="POST" action=" {{ route('driver-left', ['bikeId' => $bike->id]) }} ">
										@csrf
										<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-info btn-sm" > 
											leave
										</button>	
									</form>
								 </div>
								 <div  class="col-md-6">
									<form   method="POST" action=" {{ route('driver-arrived', ['bikeId' => $bike->id]) }} ">
										@csrf
										<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-info btn-sm" > 
											arrive 
										</button>	
									</form>
								 </div>
							</div>
						
						

					
		              	
		              	<form method="POST" action=" {{ route('bikes.destroy', ['bike' => $bike->id]) }} " class="mt-1">
		              		<a class="btn btn-primary btn-sm" href="{{ route('bikes.show', ['bike' => $bike->id]) }}"> 
			              	 	<i class="fa fa-eye"></i> 
			              	</a>
			              	<a class="btn btn-primary btn-sm" href="{{ route('bikes.edit', ['bike' => $bike->id]) }}"> 
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
@extends('layout.main')

@section('main_content')

	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Bikes Drivers </h2>		
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> </h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              
	              <th>Driver Id Number</th>
	              <th>Bike Number</th>
	              <th>Departure Time</th>
	              <th>Arrival Time</th>
	             
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
					
                    <th>Driver Id Number</th>
                    <th>Bike Number</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach ($reports as $report)
		            <tr>
		              <td> {{ $report->driver->id_number }} </td>
		              <td> {{ $report->bike->number }} </td>
		              <td> {{ $report->departure_time }} </td>
                      <td> {{ $report->arrival_time }} </td>

		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>


@stop
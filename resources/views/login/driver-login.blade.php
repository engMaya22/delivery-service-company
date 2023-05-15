@extends('layout.primary')

@section('page_body')


  <div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
              <div class="col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back Driver!</h1>
                  </div>
                  {!! Form::open([ 'route' => 'driver.login.confirm', 'method' => 'post' ]) !!}
                    
                    <div class="form-group">
                    	{{ Form::text('name', NULL, [ 'class'=>'form-control form-control-user', 'id' => 'name', 'placeholder' => 'Enter Your Name' ]) }}
                        <span class="text-danger">
                            {{$errors->first('name')}}
                          </span>
                    </div>

                    <div class="form-group">
                      {{ Form::number('id_number', NULL,[ 'class'=>'form-control form-control-user', 'id' => 'id_number', 'placeholder' => 'Enter Your ID Number' ]) }}
                      <span class="text-danger">
                        {{$errors->first('id_number')}}
                      </span>
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>	

                  {!! Form::close() !!}
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>


@stop
 
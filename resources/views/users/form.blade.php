@extends('layouts.main')

@section('css')

@stop

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
            @if (session('error'))
		            <div class="alert alert-danger">
		                <button type="button" class="close" data-dismiss="alert">&times;</button>
		                {{ session('error') }}
		            </div>
		        @endif
		        @if (session('success'))
		            <div class="alert alert-success">
		                <button type="button" class="close" data-dismiss="alert">&times;</button>
		                {{ session('success') }}
		            </div>
		        @endif                
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ url('users' . (!empty($models->id) ? '/' . $models->id : '')) }}" enctype="multipart/form-data">
              @csrf
              @if (!empty($models->id))
				@method('put')
			  @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $models->name ?? old('name') }}" required autocomplete="name">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $models->email ?? old('email') }}" autocomplete="email">
                  </div>
                  <!--
                  @if (empty($models->id))
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                  </div>
                  <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Password" required autocomplete="new-password">
                  </div>
                  @endif
                  -->
                  <div class="form-group">
                    <label>Role</label>
                    <table class="table table-bordered">
                    <thead>                  
                      <tr>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                        @if (empty($models->id))
                          @foreach($roles as $value)
                            {{ Form::checkbox('roles[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}
                            <br/>
                          @endforeach
                        @else
                            @foreach($roles as $value)
                            {{ Form::checkbox('roles[]', $value->id, in_array($value->id, $userRole) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}
                            <br/>
                            @endforeach                   
                        @endif
                        </td>
                      </tr>
                    </tbody>
                    </table> 
                  </div>                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@stop

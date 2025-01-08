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
              <form role="form" method="post" action="{{ url('categorycustomer' . (!empty($models->id) ? '/' . $models->id : '')) }}" enctype="multipart/form-data">
              @csrf
              @if (!empty($models->id))
				@method('put')
			  @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Category Customer Name</label>
                    <input type="text" class="form-control" id="category_customer_name" name="category_customer_name" placeholder="Enter Category Customer Name" value="{{ $models->category_customer_name ?? old('category_customer_name') }}" required autocomplete="category_customer_name" autofocus>
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

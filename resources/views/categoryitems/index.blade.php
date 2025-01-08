@extends('layouts.main')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@stop

@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{ url('/categoryitems/create') }}" class="btn btn-primary">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>Category Items Name</th>
                  <th>Status</th>
                  <th width="220px" data-orderable="false"></th>
                </tr>
                </thead>
                <tbody>
      
                @foreach ($models as $data)
                <tr>
                  <td>{{ $inc++ }}</td>
                  <td>{{ $data->category_items_name }}</td>
                  <td>
                  @if($data->is_active == '1')
                    Active
                  @else
                    Not Active
                  @endif
                  <!-- {{ $data->is_active }} -->
                  </td>
                  <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{ url('categoryitems/' . $data->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          @if($data->is_active == '1')
                            <a class="btn btn-primary btn-sm" href="{{ url('categoryitems/' . $data->id) . '/activate'}}" hidden>
                                <!-- <i class="fas fa-folder">
                                </i> -->
                                Activate
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ url('categoryitems/' . $data->id) . '/deactivate'}}">
                                <!-- <i class="fas fa-trash">
                                </i> -->
                                Deactivate
                            </a>
                          @else
                            <a class="btn btn-primary btn-sm" href="{{ url('categoryitems/' . $data->id) . '/activate'}}">
                                <!-- <i class="fas fa-folder">
                                </i> -->
                                Activate
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ url('categoryitems/' . $data->id) . '/deactivate'}}" hidden>
                                <!-- <i class="fas fa-trash">
                                </i> -->
                                Deactivate
                            </a>
                          @endif
                          
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@stop
@section('js')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop
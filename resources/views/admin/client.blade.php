@extends('adminlte::page')

@section('title','Clients List')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client List</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addclient') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Client Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no = 1 @endphp
                    @foreach($client as $cli)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $no++ }}</td>
                        <td><a href="/admin/{{$cli->id}}/detailcli">{{ $cli->nama_client }}</a></td>
                        <td>
                              <a href="/admin/{{$cli->id}}/editcli" title="edit"><i class="fa fa-edit"></i></a>
                              <a href="/admin/delcli/{{$cli->id}}" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                              <a href="/admin/{{$cli->id}}/detailcli" title="view"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
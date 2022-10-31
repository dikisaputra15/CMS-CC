@extends('adminlte::page')

@section('title','User Management')

@section('content')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>User Management</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/adduser') }}" class="btn btn-primary">Add User</a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($user as $usr)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $no++ }}</td>
                        <td>{{ $usr->name }}</td>
                        <td>{{ $usr->email }}</td>
                        <td>{{ $usr->type }}</td>
                        <td>
                              <a href="/admin/{{$usr->id}}/edituser" class="btn btn-sm btn-warning">Edit</a>
                              <a href="/admin/hapususr/{{$usr->id}}" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-sm btn-danger">Delete</a>
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
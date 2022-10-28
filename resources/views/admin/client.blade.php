@extends('adminlte::page')

@section('title','Clients List')

@section('content')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client List</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addclient') }}" class="btn btn-primary">Add Client</a>
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
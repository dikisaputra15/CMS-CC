@extends('adminlte::page')

@section('title','Prospective Client')

@section('content')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Prospective Client</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addprospec') }}" class="btn btn-primary">Add Prospective Client</a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>Prospective Client</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($prospec as $pro)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $pro->nama_client }}</td>
                        <td>
                            <a href="/admin/{{$pro->id}}/detailpros" class="btn btn-sm btn-primary">View</a>
                            <a href="/admin/delpros/{{$pro->id}}" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-sm btn-danger">Delete</a>
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
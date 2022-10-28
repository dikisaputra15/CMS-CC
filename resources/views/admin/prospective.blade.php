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
                      <th>Client Name</th>
                      <th>Client POC</th>
                      <th>POC CC</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($prospec as $pro)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $pro->nama_client }}</td>
                        <td>{{ $pro->client_poc }}</td>
                        <td>{{ $pro->poc_cc }}</td>
                        <td>
                            <a href="/admin/{{$pro->id}}/detailpros" class="btn btn-sm btn-primary">Detail</a>
                            <form action="/admin/delpros/{{$pro->id}}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" class="btn btn-sm btn-danger d-inline" value="Delete">
                            </form>
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
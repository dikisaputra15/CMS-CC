@extends('layouts.master')

@section('title','Contract')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Contract Document</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="/admin/addcontract" class="btn btn-primary" title="Add Document"><i class="fa fa-plus"></i></a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Contract Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no = 1 @endphp
                    @foreach($contract as $ctr)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $no++ }}</td>
                        <td><a href="{{ url('document/contract/' . $ctr->path) }}" target="__blank">{{ $ctr->path }}</a></td>
                        <td><a href="/admin/delctr/{{$ctr->id}}" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@endsection


@extends('layouts.master')

@section('title','Invoice')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Invoice Document</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="/admin/addinvoice" class="btn btn-primary" title="Add Document"><i class="fa fa-plus"></i></a>
        </div>
            <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>Contract No</th>
                      <th>Client Name</th>
                      <th>Type Of Service</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($invoice as $inv)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $inv->contract_no }}</td>
                        <td>{{ $inv->client_name }}</td>
                        <td>{{ $inv->type_of_service }}</td>
                        <td><a href="{{ url('document/invoice/' . $inv->path) }}" target="__blank">{{ $inv->path }}</a></td>
                        <td><a href="/admin/delinv/{{$inv->id}}" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@endsection


@extends('layouts.master')

@section('title','Proposal')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Proposal Document</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="/admin/addprop" class="btn btn-primary" title="Add Document"><i class="fa fa-plus"></i></a>
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
                    @foreach($proposal as $prp)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $prp->contract_no }}</td>
                        <td>{{ $prp->client_name }}</td>
                        <td>{{ $prp->type_of_service }}</td>
                        <td><a href="{{ url('document/proposal/' . $prp->path) }}" target="__blank">{{ $prp->path }}</a></td>
                        <td><a href="/admin/delprp/{{$prp->id}}" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@endsection


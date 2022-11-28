@extends('layouts.master')

@section('title','Concord Service')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Service</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addservice') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajax-datatable" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Service Code</th>
                      <th>Service Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 
            </table>

    </div>
</div>
@endsection


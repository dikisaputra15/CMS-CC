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
        <p>user management page</p>
    </div>
</div>
@stop
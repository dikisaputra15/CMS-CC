@extends('adminlte::page')

@section('title','Profile')

@section('content')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Profile & Change Password</h3>
    </div>
    <div class="card-body">
    <div class="form-group row">
        <a href="{{ url('admin/changepassword') }}" class="btn btn-primary">Change Password</a>
    </div>
    <form action="{{ url('admin/profile') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-2">
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </form>
</div>
</div>
@stop
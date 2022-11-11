@extends('adminlte::page')

@section('title','Change Password')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Change Password</h3>
    </div>
    <div class="card-body">
    <form action="{{ url('admin/changepassword') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="old_password" placeholder="Old Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="new_password" placeholder="New Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="confirmnewpassword" class="col-sm-2 col-form-label">Confirm New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm New Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@stop
@extends('adminlte::page')

@section('title','Add Services')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Services</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storesrv') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="kode" class="col-md-4 col-form-label text-md-end">Services Code</label>
                            <div class="col-md-6">
                                <input id="kode" type="text" class="form-control" name="kode_services" required autocomplete="kode_services" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Service Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nama_services" required autocomplete="nama_services">
                            </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="services" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

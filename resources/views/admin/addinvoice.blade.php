@extends('adminlte::page')

@section('title','Add Invoice')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Invoice Document</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('admin/storeinvoice') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="poc_cc" class="col-md-4 col-form-label text-md-end">File Name</label>
                            <div class="col-md-6">
                                <input id="file_name" type="text" class="form-control" name="file_name" required autocomplete="file_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">File upload</label>
                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="file" required autocomplete="file">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

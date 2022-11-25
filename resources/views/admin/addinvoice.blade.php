@extends('layouts.master')

@section('title','Add Invoice')

@section('conten')

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
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Contract No</label>
                            <div class="col-md-6">
                                <input id="conractno" type="text" class="form-control" name="contract_no" required autocomplete="contract_no">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client_name" class="col-md-4 col-form-label text-md-end">Client Name</label>
                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" name="client_name" required autocomplete="client_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Type Of Service</label>
                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type_service" required autocomplete="type">
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
                                <a href="invoice" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

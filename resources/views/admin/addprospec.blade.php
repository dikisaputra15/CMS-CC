@extends('layouts.master')

@section('title','Add Prospec')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Prospective Clients</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storeprospec') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Prospective Client</label>
                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" name="client_name" required autocomplete="client_name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="tgl" required autocomplete="poc_cc" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="remark" class="col-md-4 col-form-label text-md-end">Remarks</label>
                            <div class="col-md-6">
                                <input id="remark" type="text" class="form-control" name="remark" required autocomplete="remark">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client_poc" class="col-md-4 col-form-label text-md-end">Client POC</label>
                            <div class="col-md-6">
                                <input id="client_poc" type="text" class="form-control" name="client_poc" required autocomplete="client_poc">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poc_cc" class="col-md-4 col-form-label text-md-end">POC</label>
                            <div class="col-md-6">
                                <input id="poc_cc" type="text" class="form-control" name="poc_cc" required autocomplete="poc_cc">
                            </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="prospective" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title','Add Prospec')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Prospective Clients</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/prosesupdatepros/{{ $prospec->id }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3" hidden>
                            <label for="client" class="col-md-4 col-form-label text-md-end">Id Client</label>
                            <div class="col-md-6">
                                <input id="id_client" type="text" class="form-control" value="{{ $client->id }}" name="id_client" required autocomplete="id_client" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Prospective Client Name</label>
                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" value="{{ $client->nama_client }}" name="client_name" required autocomplete="client_name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="tgl" required autocomplete="poc_cc" value="{{ $prospec->date }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="remark" class="col-md-4 col-form-label text-md-end">Remarks</label>
                            <div class="col-md-6">
                                <input id="remark" type="text" class="form-control" name="remark" required autocomplete="remark" value="{{ $prospec->remarks }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client_poc" class="col-md-4 col-form-label text-md-end">Client POC</label>
                            <div class="col-md-6">
                                <input id="client_poc" type="text" class="form-control" name="client_poc" required autocomplete="client_poc" value="{{ $prospec->client_poc }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poc_cc" class="col-md-4 col-form-label text-md-end">POC CC</label>
                            <div class="col-md-6">
                                <input id="poc_cc" type="text" class="form-control" name="poc_cc" required autocomplete="poc_cc" value="{{ $client->poc_cc }}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="/admin/prospective" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

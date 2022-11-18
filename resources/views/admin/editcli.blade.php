@extends('layouts.master')

@section('title','Edit Clients')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Clients</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/updatecli/{{ $client->id }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3">
                            <label for="nama_client" class="col-md-4 col-form-label text-md-end">Nama Client</label>
                            <div class="col-md-6">
                                <input id="nama_client" type="text" class="form-control" name="nama_client" required autocomplete="nama_client" value="{{ $client->nama_client }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client_poc" class="col-md-4 col-form-label text-md-end">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="address" value="{{ $client->address }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="remark" class="col-md-4 col-form-label text-md-end">Client Since</label>
                            <div class="col-md-6">
                                <input id="client_since" type="date" class="form-control" name="client_since" required autocomplete="client_since" value="{{ $client->client_since }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Client POC</label>
                            <div class="col-md-6">
                                <input id="client_poc" type="text" class="form-control" name="client_poc" required autocomplete="client_poc" value="{{ $client->client_poc }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Concord POC</label>
                            <div class="col-md-6">
                                <input id="concord_poc" type="text" class="form-control" name="concord_poc" required autocomplete="concord_poc" value="{{ $client->concord_poc }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">End User POC</label>
                            <div class="col-md-6">
                                <input id="enduser_poc" type="text" class="form-control" name="enduser_poc" required autocomplete="enduser_poc" value="{{ $client->end_user_poc }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">No Of Subscriber</label>
                            <div class="col-md-6">
                                <input id="no_of_subscribe" type="number" class="form-control" name="no_of_subscribe" required autocomplete="no_of_subscribe" value="{{ $client->no_of_subs }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cn" class="col-md-4 col-form-label text-md-end">Contract Number</label>
                            <div class="col-md-6">
                                <input id="c_number" type="text" class="form-control" name="c_number" required autocomplete="c_number" value="{{ $client->contract_no }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">Contract Value</label>
                            <div class="col-md-6">
                                <input id="c_value" type="number" class="form-control" name="c_value" required autocomplete="c_value" value="{{ $client->contract_value }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">List Of Subscriber</label>
                            <div class="col-md-6">
                                <textarea name="list_of_subscribe" style="height:150px; width:500px;">{{ $client->list_of_subs }}</textarea>
                            </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="../clients" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title','Add Client')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Clients</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storeclient') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Services</label>
                            <div class="col-md-6">
                                <select class="form-control" name="service_id">
                                    <option value="0">-Choose Service-</option>
                                @foreach ($service as $srv)
                                    <option value="{{ $srv->id }}">{{ $srv->nama_services }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_client" class="col-md-4 col-form-label text-md-end">Nama Client</label>
                            <div class="col-md-6">
                                <input id="nama_client" type="text" class="form-control" name="nama_client" required autocomplete="nama_client">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client_poc" class="col-md-4 col-form-label text-md-end">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poc_cc" class="col-md-4 col-form-label text-md-end">Start Date</label>
                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" required autocomplete="start_date">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Duration <small>(per month)</small></label>
                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control" name="duration" required autocomplete="duration">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="remark" class="col-md-4 col-form-label text-md-end">Client Since</label>
                            <div class="col-md-6">
                                <input id="client_since" type="date" class="form-control" name="client_since" required autocomplete="client_since">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Client POC</label>
                            <div class="col-md-6">
                                <input id="client_poc" type="text" class="form-control" name="client_poc" required autocomplete="client_poc">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Concord POC</label>
                            <div class="col-md-6">
                                <input id="concord_poc" type="text" class="form-control" name="concord_poc" required autocomplete="concord_poc">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">End User POC</label>
                            <div class="col-md-6">
                                <input id="enduser_poc" type="text" class="form-control" name="enduser_poc" required autocomplete="enduser_poc">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">No Of Subscriber</label>
                            <div class="col-md-6">
                                <input id="no_of_subscribe" type="number" class="form-control" name="no_of_subscribe" required autocomplete="no_of_subscribe">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cn" class="col-md-4 col-form-label text-md-end">Contract Number</label>
                            <div class="col-md-6">
                                <input id="c_number" type="text" class="form-control" name="c_number" required autocomplete="c_number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">Contract Value</label>
                            <div class="col-md-6">
                                <input id="c_value" type="number" class="form-control" name="c_value" required autocomplete="c_value">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">List Of Subscriber</label>
                            <div class="col-md-6">
                                <textarea name="list_of_subscribe" style="height:150px; width:500px;"></textarea>
                            </div>
                        </div>
 
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="clients" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

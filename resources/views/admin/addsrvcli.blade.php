@extends('adminlte::page')

@section('title','Add Clients Services')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Clients Services</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storesrvcli') }}">
                        @csrf

                        <div class="row mb-3" hidden>
                            <label for="id_client" class="col-md-4 col-form-label text-md-end">Id Client</label>
                            <div class="col-md-6">
                                <input id="id_client" type="text" class="form-control" name="id_client" required autocomplete="id_client" value="{{ $dt->id }}">
                            </div>
                        </div>

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

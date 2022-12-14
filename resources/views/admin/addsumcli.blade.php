@extends('layouts.master')

@section('title','Add Summary Clients')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Log History Client</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storesumcli') }}">
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
                                    @if (empty($log))
                                        <option value="{{ $srv->id }}">{{ $srv->kode_services }}</option>
                                    @elseif ($log->id_service == $srv->id)
                                        <option value="{{ $srv->id }}" selected>{{ $srv->kode_services }}</option>
                                    @else
                                        <option value="{{ $srv->id }}">{{ $srv->kode_services }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poc_cc" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" required autocomplete="date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Remarks</label>
                            <div class="col-md-6">
                                <input id="remarks" type="text" class="form-control" name="remarks" required autocomplete="remarks">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="detailcli" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

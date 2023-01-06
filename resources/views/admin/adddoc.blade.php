@extends('layouts.master')

@section('title','Add Document')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Add Identity Document</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/storedoc') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tgl_doc" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Contract No</label>
                            <div class="col-md-6">
                                <input id="conractno" type="text" class="form-control" name="contract_no" required autocomplete="contract_no">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Client Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="client_name">
                                    <option value="0">-Choose Client Name-</option>
                                @foreach ($client as $cli)
                                    <option value="{{ $cli->id }}">{{ $cli->nama_client }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Type Of Service</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_service">
                                    <option value="0">-Choose Service-</option>
                                @foreach ($service as $srv)
                                    <option value="{{ $srv->id }}">{{ $srv->nama_services }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="alldoc" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

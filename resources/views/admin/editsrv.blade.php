@extends('layouts.master')

@section('title','Edit Services')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Services</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="/admin/editsrv/{{ $service->id }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3">
                            <label for="kode" class="col-md-4 col-form-label text-md-end">Kode Services</label>
                            <div class="col-md-6">
                                <input id="kode" type="text" class="form-control" name="kode_services" value="{{ $service->kode_services }}" required autocomplete="kode_services" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Service Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nama_services" value="{{ $service->nama_services }}" required autocomplete="nama_services">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

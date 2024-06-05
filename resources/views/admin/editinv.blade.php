@extends('layouts.master')

@section('title','Edit Invoice File')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Invoice File</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ url('admin/updateinvfile') }}">
                        @csrf

                        <input type="text" class="form-control" name="id_inv" value="{{ $inv->id }}" hidden>

                        <input type="text" class="form-control" name="id_doci" value="{{ $inv->id_doci }}" hidden>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">File Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="file_type" readonly>
                                    <option value="1">Invoice</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Invoice File Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="invoice_filename" value="{{ $inv->invoice_filename }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">File upload</label>
                            <div class="col-md-6">
                                <label><a href="{{ Storage::url('document/invoice/'.$inv->path_invoice) }}" target="__blank">{{ $inv->path_invoice }}</a></label>
                                <input type="file" class="form-control" name="file_name">
                                <input type="text" class="form-control" name="old_invfile" value="{{ $inv->path_invoice }}" hidden>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="/admin/{{$inv->id_doci}}/addfile" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

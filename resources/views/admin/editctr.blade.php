@extends('layouts.master')

@section('title','Edit Contract File')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Contract File</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ url('admin/updatectrfile') }}">
                        @csrf

                        <input type="text" class="form-control" name="id_ctr" value="{{ $ctr->id }}" hidden>

                        <input type="text" class="form-control" name="id_docc" value="{{ $ctr->id_docc }}" hidden>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">File Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="file_type" readonly>
                                    <option value="2">Contract</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Contract File Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="contract_filename" value="{{ $ctr->contract_filename }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">File upload</label>
                            <div class="col-md-6">
                                <label><a href="{{ Storage::url('document/contract/'.$ctr->path_contract) }}" target="__blank">{{ $ctr->path_contract }}</a></label>
                                <input type="file" class="form-control" name="file_name">
                                <input type="text" class="form-control" name="old_ctrfile" value="{{ $ctr->path_contract }}" hidden>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="/admin/{{$ctr->id_docc}}/addfile" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

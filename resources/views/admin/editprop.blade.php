@extends('layouts.master')

@section('title','Edit Proposal File')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Proposal File</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/updatepropfile') }}">
                        @csrf

                        <input type="text" class="form-control" name="id_prop" value="{{ $prop->id }}" hidden>

                        <input type="text" class="form-control" name="id_docp" value="{{ $prop->id_docp }}" hidden>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">File Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="file_type" readonly>
                                    <option value="3">Proposal</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Proposal File Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="proposal_filename" value="{{ $prop->proposal_filename }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">File upload</label>
                            <div class="col-md-6">
                                <label><a href="{{ Storage::url('document/proposal/'.$prop->path_proposal) }}" target="__blank">{{ $prop->path_proposal }}</a></label>
                                <input type="file" class="form-control" name="file_name">
                                <input type="text" class="form-control" name="old_propfile" value="{{ $prop->path_proposal }}" hidden>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="/admin/{{$prop->id_docp}}/addfile" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

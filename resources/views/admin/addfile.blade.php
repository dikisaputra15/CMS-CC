@extends('layouts.master')

@section('title','Document')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h5>Add Document</h5>
    </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ url('admin/storefile') }}">
                        @csrf

                        <div class="row mb-3" hidden>
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">id doc</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id_doc" value="{{ $doc->id }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">File Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="file_type">
                                    <option value="0">-Choose File Type-</option>
                                    <option value="1">Invoice</option>
                                    <option value="2">Contract</option>
                                    <option value="3">Proposal</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">File Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="file_name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">File upload</label>
                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="file" required autocomplete="file">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{{ url('/admin/alldoc') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <h5>{{ $cli->nama_client }}</h5>
                    <h5>Documents</h5>
                </div>
                <div class="card-body">
                <table class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Invoice</th>
                      <th>Contract</th>
                      <th>Proposal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        @foreach($invs as $inv)
                            <tr><a href="/document/invoice/{{ $inv->path_invoice }}" target="__blank">{{ $inv->path_invoice }}</a></tr>
                        @endforeach

                        @foreach($ctrs as $ctr)
                            <tr><a href="/document/contract/{{ $ctr->path_contract }}" target="__blank">{{ $ctr->path_contract }}</a></tr>
                        @endforeach

                        @foreach($props as $prop)
                            <tr><a href="/document/proposal/{{ $prop->path_proposal }}" target="__blank">{{ $prop->path_proposal }}</a></tr>
                        @endforeach
                    </tr>
                  </tbody>
                </table>
                </div>
            </div>

</div>
@endsection

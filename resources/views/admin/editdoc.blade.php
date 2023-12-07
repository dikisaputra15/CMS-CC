@extends('layouts.master')

@section('title','Edit Document')

@section('conten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Edit Identity Document</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/updatedocident') }}">
                        @csrf

                        <input type="text" class="form-control" name="id_doc" value="{{ $doc->id }}" hidden>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tgl_doc" value="{{ $doc->tgl_doc }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Contract No</label>
                            <div class="col-md-6">
                                <input id="conractno" type="text" class="form-control" name="contract_no" required autocomplete="contract_no" value="{{ $doc->contract_no }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contract_no" class="col-md-4 col-form-label text-md-end">Contract Value</label>
                            <div class="col-md-6">
                                <input id="conractvalue" type="text" class="form-control" name="contract_value" required autocomplete="contract_value" value="{{ $doc->contract_value }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Client Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="client_name">
                                @foreach ($client as $cli)
                                    <?php if($cli->id == $doc->client_name){ ?>
                                        <option value="{{ $cli->id }}" selected>{{ $cli->nama_client }}</option>
                                    <?php }else{ ?>
                                        <option value="{{ $cli->id }}">{{ $cli->nama_client }}</option>
                                    <?php } ?>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">Type Of Service</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_service">
                                @foreach ($service as $srv)
                                    <?php if($srv->id == $doc->type_of_service){ ?>
                                        <option value="{{ $srv->id }}" selected>{{ $srv->nama_services }}</option>
                                    <?php }else{ ?>
                                        <option value="{{ $srv->id }}">{{ $srv->nama_services }}</option>
                                    <?php } ?>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="/admin/alldoc" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

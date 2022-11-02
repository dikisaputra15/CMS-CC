@extends('adminlte::page')

@section('title','Update Note')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3>Update Note</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/updatenote/{{ $note->id }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3">
                            <label for="note" class="col-md-4 col-form-label text-md-end">Notes</label>
                            <div class="col-md-6">
                                <textarea name="notes" style="height:150px; width:500px;">{{ $note->notes }}</textarea>
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

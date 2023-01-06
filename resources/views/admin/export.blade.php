@extends('layouts.master')

@section('title','NPT Form')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3 align="center">NPT FORM</h3>
    </div>
    <div class="card-body">
    <table id="ajaxExport" class="table" style="width:100%">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Contract Number</th>
                <th scope="col">Services</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">
                    Contract Value
                    <br><small>(US$/IDR)</Small>
                </th>
            </tr>
        </thead>
        
        </table>
        <br>
        <a href="{{ url('admin/exportxls') }}" class="btn btn-success" title="export excel"><i class="fa fa-file-excel"></i></a>
    </div>
</div>
@endsection

@push('service')
<script>
   $(document).ready( function () {
              $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              
              $('#ajaxExport').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/export') }}",
                columns: [
                { data: 'contract_no', name: 'contract_no' },
                { data: 'nama_services', name: 'nama_services' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'contract_value', name: 'contract_value' },
                ],
                order: [[0, 'desc']]
         });

  });         
</script>
@endpush



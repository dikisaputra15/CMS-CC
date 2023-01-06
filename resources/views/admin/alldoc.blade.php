@extends('layouts.master')

@section('title','Document')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Documents</h3>
    </div>
   
    <div class="card-body">
        <div class="form-group row">
            <a href="/admin/adddoc" class="btn btn-primary" title="Add Document"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajaxalldoc" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Client Name</th>
                      <th>Type Of Services</th>
                      <th>Invoice</th>
                      <th>Contract</th>
                      <th>Proposal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
            </table>
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
              
              $('#ajaxalldoc').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/alldoc') }}",
                columns: [
                { data: 'tgl_doc', name: 'tgl_doc' },
                { data: 'nama_client', name: 'nama_client' },
                { data: 'nama_services', name: 'nama_services' },
                {data: 'path_invoice', name: 'path_invoice', render:function(data, type, row){
                return "<a href='/document/invoice/"+ row.path_invoice +"' target='__blank'>" + row.path_invoice + "</a>"
                }},
                {data: 'path_contract', name: 'path_contract', render:function(data, type, row){
                return "<a href='/document/contract/"+ row.path_contract +"' target='__blank'>" + row.path_contract + "</a>"
                }},
                {data: 'path_proposal', name: 'path_proposal', render:function(data, type, row){
                return "<a href='/document/proposal/"+ row.path_proposal +"' target='__blank'>" + row.path_proposal + "</a>"
                }},
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
         });

         $('#ajaxInvoice').on('click','.deleteInvoice',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/delinv') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxInvoice').dataTable();
                               oTable.fnDraw(false);
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }
       });

  });         
</script>
@endpush


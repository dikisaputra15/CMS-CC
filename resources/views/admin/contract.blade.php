@extends('layouts.master')

@section('title','Contract')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Contract Document</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="/admin/addcontract" class="btn btn-primary" title="Add Document"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajaxContract" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Contract No</th>
                      <th>Contract Date</th>
                      <th>Client Name</th>
                      <th>Type Of Service</th>
                      <th>File</th>
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
              
              $('#ajaxContract').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/contract') }}",
                columns: [
                { data: 'contract_no', name: 'contract_no' },
                { data: 'tgl_contract', name: 'tgl_contract' },
                { data: 'nama_client', name: 'nama_client' },
                { data: 'nama_services', name: 'nama_services' },
                {data: 'path', name: 'path', render:function(data, type, row){
                return "<a href='/document/contract/"+ row.path_contract +"' target='__blank'>" + row.path_contract + "</a>"
                }},
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
         });

         $('#ajaxContract').on('click','.deleteContract',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/delctr') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxContract').dataTable();
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


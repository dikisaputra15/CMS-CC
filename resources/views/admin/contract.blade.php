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
            <table id="ajaxContract" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>Contract No</th>
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
                { data: 'client_name', name: 'client_name' },
                { data: 'type_of_service', name: 'type_of_service' },
                {data: 'path', name: 'path', render:function(data, type, row){
                return "<a href='/document/contract/"+ row.path +"' target='__blank'>" + row.path + "</a>"
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


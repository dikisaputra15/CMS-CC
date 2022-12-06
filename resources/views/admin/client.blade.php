@extends('layouts.master')

@section('title','Client List')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client List</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addclient') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajaxClient" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Client Name</th>
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
              
              $('#ajaxClient').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/clients') }}",
                columns: [
                {data: null,"sortable": false, 
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                },
                { data: 'nama_client', name: 'nama_client', render:function(data, type, row){
                return "<a href='/admin/"+ row.id +"/detailcli'>" + row.nama_client + "</a>"
                }},
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
         });

         $('#ajaxClient').on('click','.deleteClient',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/delcli') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxClient').dataTable();
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
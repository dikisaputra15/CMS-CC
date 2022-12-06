@extends('layouts.master')

@section('title','User Management')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>User Management</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/adduser') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajaxuser" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
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
              
              $('#ajaxuser').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/user') }}",
                columns: [
                {data: null,"sortable": false, 
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'type', name: 'type' },
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
         });

         $('#ajaxuser').on('click','.deleteUser',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/hapususr') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxuser').dataTable();
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
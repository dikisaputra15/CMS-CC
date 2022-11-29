@extends('layouts.master')

@section('title','Concord Service')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Service</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addservice') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="ajaxService" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Service Code</th>
                      <th>Service Name</th>
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
              
              $('#ajaxService').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/services') }}",
                columns: [
                {data: null,"sortable": false, 
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                },
                { data: 'kode_services', name: 'kode_services' },
                { data: 'nama_services', name: 'nama_services' },
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
         });

         $('#ajaxService').on('click','.deleteService',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/delsrv') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxService').dataTable();
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
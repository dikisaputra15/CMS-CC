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
                      <th>Contract No</th>
                      <th>Client Name</th>
                      <th>
                            <select name="service_filter" id="service_filter" class="form-control" style="width:200px;">
                                <option value="">Type Of Services</option>
                                @foreach ($service as $srv)
                                <option value="{{ $srv->id }}">{{ $srv->nama_services }}</option>
                                @endforeach
                            </select>
                      </th>
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

        fetch_data();
          
        function fetch_data(category = '')
        {
              $('#ajaxalldoc').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url:"{{ url('admin/alldoc') }}",
                  data: {
                    category:category
                  }
                },
                columns: [
                { data: 'tgl_doc', name: 'tgl_doc' },
                { data: 'contract_no', name: 'contract_no' },
                { data: 'nama_client', name: 'nama_client' },
                { data: 'nama_services', name: 'nama_services' },
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
            });
        }

        $('#service_filter').change(function(){
          var category_id = $('#service_filter').val();

          $('#ajaxalldoc').DataTable().destroy();

          fetch_data(category_id);
        });

         $('#ajaxalldoc').on('click','.deleteDoc',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/deldoc') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#ajaxalldoc').dataTable();
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


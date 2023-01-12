@extends('layouts.master')

@section('title','Document')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Documents</h3>
    </div>
   
    <div class="card-body"><br>
      <div class="row input-daterange" style="margin-left:150px;">
          <div class="col-md-4">
              <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
          </div>

          <div class="col-md-4">
              <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
          </div>

          <div class="col-md-4">
              <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
              <button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
          </div>
      </div>
      <br>

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
                           <select name="service_filter" id="service_filter" class="form-control" style="width:180px;">
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

        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
        });

        load_data()
        function load_data(from_date='', to_date='', category='')
        {
              $('#ajaxalldoc').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url:"{{ url('admin/alldoc') }}",
                  data: {
                    from_date:from_date,
                    to_date:to_date,
                    category:$('#service_filter').val()
                  }
                },
                columns: [
                { data: 'tgl_doc', name: 'tgl_doc' },
                { data: 'contract_no', name: 'contract_no' },
                { data: 'nama_client', name: 'nama_client' },
                { data: 'nama_services', name: 'nama_services' },
                {data: 'action', name: 'action', orderable: false}
                ]
            });
        }

        $('#filter').click(function(){
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if(from_date != '' &&  to_date != '')
            {
              $('#ajaxalldoc').DataTable().destroy();
              load_data(from_date, to_date);
            }
            else
            {
              alert('Both Date is required');
            }
        });

        $('#refresh').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
            $('#ajaxalldoc').DataTable().destroy();
            load_data();
        }); 

        $('#service_filter').change(function(){
            $('#ajaxalldoc').DataTable().destroy();
            load_data();
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


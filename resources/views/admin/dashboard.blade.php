@extends('layouts.master')

@section('title','Dashboard')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client Summary</h3>
    </div>
    <div class="card-body">
            <table id="dashboardTable" class="table table-valign-middle" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Clients</th>
                      <th>
                            <select name="service_filter" id="service_filter" class="form-control">
                                <option value="">All Services</option>
                                @foreach ($service as $srv)
                                <option value="{{ $srv->id }}">{{ $srv->nama_services }}</option>
                                @endforeach
                            </select>
                      </th>
                      <th>Contract Start Date</th>
                      <th>Contract End Date</th>
                      <th>
                            <select name="color_filter" id="color_filter" class="form-control">
                                <option value="0">Contract Days Remaining</option>
                                <option value="1" style="background-color:green">Green</option>
                                <option value="2" style="background-color:gray">Gray</option>
                                <option value="3" style="background-color:red">Red</option>
                                <option value="4" style="background-color:yellow">Yellow</option>
                                <option value="5" style="background-color:black">Black</option>
                            </select>
                      </th>
                      <th>CCI POC</th>
                      <th>Note</th>
                      <th>Action</th>
                    </tr>
                  </thead>

            </table>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="{{ url('admin/storenote') }}">
                    @csrf
                    <input type="text" class="form-control" name="id_detail" id="idkl" value="" hidden>
                    <label for="note" class="col-md-4 col-form-label text-md-end">Notes</label>
                    <textarea name="notes" style="height:150px; width:470px;" required></textarea>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Update Note-->
<div class="modal fade" id="updatenote" tabindex="-1" aria-labelledby="updatenote" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--FORM UPDATE Note-->
            <div class="modal-body">
                <form method="post" action="{{ url('admin/editnote') }}">
                    @csrf
                    <input type="text" class="form-control" name="id_detail" id="id_d" value="" hidden>
                    <label for="note" class="col-md-4 col-form-label text-md-end">Update Notes</label>
                    <textarea name="notes" style="height:150px; width:470px;" required></textarea>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </form>
            <!--END FORM UPDATE Note-->
            </div>
        </div>
    </div>
</div>
<!-- End Modal UPDATE Note-->
@endsection

@push('service')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    fetch_data();

    function fetch_data(category = '', color_id= '')
    {
        $('#dashboardTable').DataTable({
            "pageLength": 50,
            "ordering": false,
            processing: true,
            serverSide: true,
            ajax: {
                url:"{{ url('admin/dashboard') }}",
                data: {
                    category:category,
                    color_id:$('#color_filter').val()
                }
            },
            columns: [
                {data: null,"sortable": false,
                        render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        }
                },
                { data: 'nama_client', name: 'nama_client', render:function(data, type, row){
                return "<a href='/admin/"+ row.id_client +"/detailcli'>" + row.nama_client + "</a>"
                }},
                { data: 'nama_services', name: 'nama_services' },
                { data: 'start_date', name: 'start_date' },
                { data: 'end_dates', name: 'end_dates' },
                { data: '', render:function(data, type, row){
                    function dateFormat(date) {
                        const day = date.getDate();
                        const month = date.getMonth() + 1;
                        const year = date.getFullYear();
                        return `${year}-${month}-${day}`;
                    }
                        $tglawal = dateFormat(new Date());
                        $tglakhir = row.end_date;
                        $tgl1 = new Date($tglawal);
                        $tgl2 = new Date($tglakhir);
                        $diff = $tgl2.getTime() - $tgl1.getTime();
                        $days = $diff / (1000 * 3600 * 24);

                        if ($days > 90) {
                            var img = "<img src='/img/green.png' style='width:20px; height:20px;' alt='Image'/>";
                        }
                        else if ($days < 30 && $days >= -90) {
                            var img = "<img src='/img/gray.png' style='width:20px; height:20px;' alt='Image'/>";
                        }
                        else if ($days < 45 && $days >= 30) {
                            var img = "<img src='/img/red.png' style='width:20px; height:20px;' alt='Image'/>";
                        }
                        else if ($days <= 90 && $days >= 45) {
                            var img = "<img src='/img/yellow.png' style='width:20px; height:20px;' alt='Image'/>";
                        }
                        else {
                            var img = "<img src='/img/black.png' style='width:20px; height:20px;' alt='Image'/>";
                        }
                    return img+' '+Math.round($days);
                }},
                { data: 'concord_poc', name: 'concord_poc' },
                { data: 'notes', name: 'notes' },
                {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
        });
    }

    $('#service_filter').change(function(){
        var category_id = $('#service_filter').val();

        $('#dashboardTable').DataTable().destroy();

        fetch_data(category_id);
    });

    $('#dashboardTable').on('click','.deleteDashboard',function(){
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {
                  // AJAX request
                  $.ajax({
                     url: "{{ url('admin/deldash') }}",
                     type: 'post',
                     data: { id: id },
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");
                               var oTable = $('#dashboardTable').dataTable();
                               oTable.fnDraw(false);
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }
       });

       $('#dashboardTable').on('click','.passingID',function(){
            var ids = $(this).data('id');
            $("#idkl").val( ids );
       });

       $('#dashboardTable').on('click','.updateid',function(){
            var idupdate = $(this).data('id');
            $("#id_d").val( idupdate );
       });

       $('#color_filter').change(function(){
            $('#dashboardTable').DataTable().destroy();
            fetch_data();
        });

});
</script>
@endpush

@extends('layouts.master')

@section('title','Prospective Clients')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Prospective Client</h3>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <a href="{{ url('admin/addprospec') }}" class="btn btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
        </div>
            <table id="example" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>Prospective Client</th>
                      <th>Date</th>
                      <th>Remarks</th>
                      <th>Client POC</th>
                      <th>POC</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                         $client = "";
                         $cc = "";
                    ?>
                  <?php foreach($prospec as $pro) { 
                        $nama_client = $pro->nama_client;
                        $date = $pro->date;
                        $remarks = $pro->remarks;
                        $client_poc = $pro->client_poc;
                        $poc_cc = $pro->poc_cc;
                    ?>

                <?php 
                    if($client!=$nama_client and $cc!=$poc_cc){
                        $client = $nama_client;
                        
                ?>

                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td><?php echo $client ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $remarks ?></td>
                        <td><?php echo $client_poc ?></td>
                        <td><?php echo $poc_cc ?></td>
                        <td>
                            <a href="#" data-id="<?php echo $pro->id ?>" data-toggle="modal" data-target="#myModal" class="passingID" title="Notes"><i class="fa fa-edit"></i></a>
                            <a href="/admin/delpros/<?php echo $pro->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php }else{ ?>
                        <tr data-widget="expandable-table" aria-expanded="false">
                        <td></td>
                        <td><?php echo $pro->date ?></td>
                        <td><?php echo $pro->remarks ?></td>
                        <td><?php echo $pro->client_poc ?></td>
                        <td></td>
                        <td>
                            
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <h3>Notes</h3>
                                <form method="post" action="{{ url('admin/saveupdatepros') }}">
                                    @csrf
                                    <input type="text" class="form-control" name="id_prospective" id="idkl" value="" hidden>
                                    
                                    <label for="date" class="col-md-4 col-form-label text-md-end">Date</label>
                                    <input id="date" type="date" class="form-control" name="tgl" required autocomplete="poc_cc" value="{{ date('Y-m-d') }}">

                                    <label for="note" class="col-md-4 col-form-label text-md-end">Remarks</label>
                                    <textarea name="remark" style="height:100px; width:470px;" required></textarea>

                                    <label for="client_poc" class="col-md-4 col-form-label text-md-end">Client POC</label>
                                    <input id="client_poc" type="text" class="form-control" name="client_poc" required autocomplete="client_poc">

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                  </tbody>
            </table>
    </div>
</div>
@endsection

@push('service')
<script>
$(document).ready(function(){
    $('#example').DataTable({
        "pageLength": 25,
        "ordering": false,
    })

    $('#example').on('click','.passingID',function(){
        var ids = $(this).data('id');
        $("#idkl").val( ids );
    });
});
</script>
@endpush
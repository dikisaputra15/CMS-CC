@extends('adminlte::page')

@section('title','Dashboard')

@section('content')
<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client Summary</h3>
    </div>
    <div class="card-body">
            <table class="table table-striped table-bordered" cellspacing="0" width="150%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Client</th>
                      <th>Service</th>
                      <th>Contract </br> Start Date</th>
                      <th>Contract </br> End Date</th>
                      <th>Contract </br> Days Remaining </th>
                      <th>CCI </br> POC</th>
                      <th>Note</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($detail as $dt) {
                        $tglawal = date('Y-m-d');
                        $tglakhir = $dt->end_date;
                        $tgl1 = new DateTime($tglawal);
                        $tgl2 = new DateTime($tglakhir);
                        $interval = $tgl1->diff($tgl2);
                        $days = $interval->format('%R%a');
                  ?>       
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td><?php echo $no++ ?></td>
                            <td><a href="/admin/<?php echo $dt->id_client ?>/detailcli"><?php echo $dt->nama_client ?></a></td>
                            <td><?php echo $dt->kode_services ?></td>
                            <td><?php echo $dt->start_date ?></td>
                            <td><?php echo $dt->end_date ?></td>
                            <td>
                                <?php 
                                    if($days > 90){ ?>
                                        <img src="{{url('/img/green.png')}}" style="width:30px; height:30px;" alt="Image"/>
                                <?php
                                    }elseif($days <= 30){?>
                                        <img src="{{url('/img/black.png')}}" style="width:30px; height:30px;" alt="Image"/>
                                <?php 
                                    }elseif($days < 45 && $days >= 30){?>
                                        <img src="{{url('/img/red.png')}}" style="width:30px; height:30px;" alt="Image"/>
                                <?php 
                                    }else{?>
                                        <img src="{{url('/img/yellow.png')}}" style="width:30px; height:30px;" alt="Image"/>
                                <?php
                                    }
                                ?>
                                <?php echo $days ?>
                            </td>
                            <td><?php echo $dt->concord_poc ?></td>
                            <td><?php echo $dt->notes ?></td>
                            <td>
                                <?php 
                                    if(empty($dt->notes)){?>
                                        <button data-id="<?php echo $dt->id ?>" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm passingID">Notes</button>
                                <?php
                                    }else{?>
                                        <a href="/admin/<?php echo $dt->id ?>/editnote" class="btn btn-success btn-sm">Notes</a>
                                <?php
                                    }    
                                ?>
                                <a href="/admin/deldash/<?php echo $dt->id ?>" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Notes</h4>
                                </div>
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


                    <!-- Modal Update Barang-->
                    <div class="modal fade" id="modalUpdateBarang" tabindex="-1" aria-labelledby="modalUpdateBarang" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header"><h5 class="modal-title">Update Notes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                <!--FORM UPDATE BARANG-->
                                <form method="post" action="">
                                    @csrf
                                    <label for="note" class="col-md-4 col-form-label text-md-end">Notes</label>
                                    <textarea name="notes" style="height:150px; width:470px;" required></textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                <!--END FORM UPDATE BARANG-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Modal UPDATE Barang-->

                  </tbody>
            </table>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $(".passingID").click(function () {
        var ids = $(this).attr('data-id');
        $("#idkl").val( ids );
        $('#myModal').modal('show');
    });
</script>
@endsection
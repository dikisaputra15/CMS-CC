@extends('layouts.master')

@section('title','Dashboard')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Client Summary</h3>
    </div>
    <div class="card-body">
            <table id="example" class="table table-striped table-valign-middle" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Clients</th>
                      <th>Services</th>
                      <th>Contract Start Date</th>
                      <th>Contract End Date</th>
                      <th>Contract Days Remaining </th>
                      <th>CCI POC</th>
                      <th>Note</th>
                      <th hidden>Ket</th>
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
                            <td><?php echo date('d M Y', strtotime($dt->start_date)) ?></td>
                            <td><?php echo date('d M Y', strtotime($dt->end_date)) ?></td>
                            <td>
                                <?php 
                                    if($days > 90){ ?>
                                        <img src="{{url('/img/green.png')}}" style="width:20px; height:20px;" alt="Image"/>
                                <?php
                                    }elseif($days <= 30){?>
                                        <img src="{{url('/img/black.png')}}" style="width:20px; height:20px;" alt="Image"/>
                                <?php 
                                    }elseif($days < 45 && $days >= 30){?>
                                        <img src="{{url('/img/red.png')}}" style="width:20px; height:20px;" alt="Image"/>
                                <?php 
                                    }else{?>
                                        <img src="{{url('/img/yellow.png')}}" style="width:20px; height:20px;" alt="Image"/>
                                <?php
                                    }
                                ?>
                                <?php echo $days ?>
                            </td>
                            <td><?php echo $dt->concord_poc ?></td>
                            <td><?php echo $dt->notes ?></td>
                            <td hidden>
                                <?php 
                                    if($days > 90){
                                        echo "green";
                                    }elseif($days <= 30){
                                        echo "blackk";
                                    }elseif($days < 45 && $days >= 30){
                                        echo "red";
                                    }else{
                                        echo "yellow";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if(empty($dt->notes)){?>
                                        <a href="#" data-id="<?php echo $dt->id ?>" data-toggle="modal" data-target="#myModal" class="passingID" title="Notes"><i class="fa fa-edit"></i></a>
                                <?php
                                    }else{?>
                                        <a href="#" data-id="<?php echo $dt->id ?>" data-toggle="modal" data-target="#updatenote" class="updateid" title="Update Notes"><i class="fa fa-edit"></i></a>
                                <?php
                                    }    
                                ?>
                                <a href="/admin/deldash/<?php echo $dt->id ?>" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>

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

                  </tbody>
            </table>
    </div>
</div>
@endsection

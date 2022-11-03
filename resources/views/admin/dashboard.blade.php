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
                                        <a href="/admin/<?php echo $dt->id ?>/addnote" class="btn btn-success btn-sm">Notes</a>
                                <?php
                                    }else{?>
                                        <a href="/admin/<?php echo $dt->id ?>/editnote" class="btn btn-primary btn-sm">Update</a>
                                <?php
                                    }    
                                ?>
                                <a href="/admin/deldash/<?php echo $dt->id ?>" onclick="return confirm('Are you sure to delete this ?');" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                  </tbody>
            </table>
    </div>
</div>
@stop


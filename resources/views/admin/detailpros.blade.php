@extends('adminlte::page')

@section('title','Detail Prospective Client')

@section('content')

<x-alert></x-alert>

<?php

    foreach($detail as $data)
    {
        $id = $data->id;
        $name = $data->nama_client;
        $client_poc = $data->client_poc;
        $poc_cc = $data->poc_cc;
    }

?>

<div class="card">
    <div class="card-header bg-white">
        <h3>List Prospective Client</h3>
    </div>
    <div class="card-body">
        <a href="/admin/<?php echo $id; ?>/updatepros" class="btn btn-primary">Update</a></br></br>
            <table>
                <tr>
                    <td style="width:150px">Client Name</td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td style="width:150px">Client POC</td>
                    <td><?php echo $client_poc; ?></td>
                </tr>
                <tr>
                    <td style="width:150px">POC CC</td>
                    <td><?php echo $poc_cc; ?></td>
                </tr>
            </table></br>
        
            <table class="table table-sm" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($detail as $dt)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $dt->date }}</td>
                        <td>{{ $dt->remarks }}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@stop


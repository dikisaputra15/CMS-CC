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
                    <td style="width:170px"><h5>Prospective Client</h5></td>
                    <td><h5><?php echo $name; ?></h5></td>
                </tr>
            </table></br>
        
            <table class="table table-sm" style="width:100%">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Remarks</th>
                      <th>Client POC</th>
                      <th>POC</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($detail as $dt)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $dt->date }}</td>
                        <td>{{ $dt->remarks }}</td>
                        <td>{{ $dt->client_poc }}</td>
                        <td>{{ $dt->poc_cc }}</td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
    </div>
</div>
@stop


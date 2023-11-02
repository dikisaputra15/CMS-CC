@extends('layouts.master')

@section('title','Detail Clients')

@section('conten')

<x-alert></x-alert>
<div class="card">
    <div class="card-body">
        <h3>{{ $client->nama_client }}</h3>

        <h4 align="center">Log History Services Client</h4>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Services</th>
                    <th>Start Date</th>
                    <th>Duration <small>(Month)</small></th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1 @endphp
            @foreach($log as $dt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dt->kode_services }}</td>
                    <td>{{ $dt->start_date }}</td>
                    <td>{{ $dt->duration }}</td>
                    <td>{{ $dt->end_date }}</td>
                    <td>
                        <a href="/admin/delloghisser/{{ $dt->id }}" onclick="return confirm('Are you sure to delete this ?');" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            </br>
            <a href="/admin/<?php echo $client->id ?>/detailcli" class="btn btn-danger">Back</a>

    </div>
</div>

@endsection


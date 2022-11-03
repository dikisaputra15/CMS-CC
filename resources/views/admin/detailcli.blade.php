@extends('adminlte::page')

@section('title','Detail Clients')

@section('content')

<?php

    foreach($detail as $data)
    {
        $id = $data->id_client;
        $name = $data->nama_client;
        $client_poc = $data->client_poc;
        $cc_poc = $data->concord_poc;
        $address = $data->address;
        $client_since = $data->client_since;
        $enduser = $data->end_user_poc;
        $noofsub = $data->no_of_subs;
        $listofsub = $data->list_of_subs;
    }

?>

<x-alert></x-alert>
<div class="card">
    <div class="card-body">
        <h1><b><?php echo $name; ?></b></h1>
        <h4 align="center">Services</h4>
        <a href="/admin/<?php echo $id; ?>/addsrvcli" class="btn btn-sm btn-primary">Add Services</a>
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
            @foreach($detail as $dt)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dt->kode_services }}</td>
                    <td>{{ $dt->start_date }}</td>
                    <td>{{ $dt->duration }}</td>
                    <td>{{ $dt->end_date }}</td>
                    <td>
                        <a href="/admin/{{ $dt->id }}/editsrvcli" class="btn btn-sm btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
                <table>
                    <tr>
                        <td style="width:100px;">Address</td>
                        <td>:</td>
                        <td><?php echo $address; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Client POC</td>
                        <td>:</td>
                        <td><?php echo $client_poc; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Concord POC</td>
                        <td>:</td>
                        <td><?php echo $cc_poc; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">End User POC</td>
                        <td>:</td>
                        <td><?php echo $enduser; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Client Since</td>
                        <td>:</td>
                        <td><?php echo $client_since; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">No Of Subs</td>
                        <td>:</td>
                        <td><?php echo $noofsub; ?></td>
                    </tr>
                    <tr>
                        <td style="width:100px;">List Of Subs</td>
                        <td>:</td>
                        <td><?php echo $listofsub; ?></td>
                    </tr>
                </table>
                <br><br>
                <h4 align="center">Log History Client</h4>
                <a href="/admin/<?php echo $id; ?>/addsumcli" class="btn btn-sm btn-primary">Add Summary</a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detail2 as $dt2)
                        <tr>
                            <td>{{ $dt2->kode_services }}</td>
                            <td>{{ $dt2->date }}</td>
                            <td>{{ $dt2->remarks }}</td>
                            <td>
                                <a href="/admin/{{ $dt2->id }}/editsumcli" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
</div>

@stop


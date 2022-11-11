@extends('adminlte::page')

@section('title','Detail Clients')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<x-alert></x-alert>
<div class="card">
    <div class="card-body">
        <a href="/admin/dashboard" title="home" class="btn btn-primary"><i class="fa fa-home"></i></a>
        <br><br>
        <h4 align="center"><b>Log History Client</b></h4>
                <a href="/admin/{{ $detail3->id }}/addsumcli" class="btn btn-sm btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
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
                                <a href="/admin/{{ $dt2->id }}/editsumcli" title="Edit"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br><br>
        <h1><b>{{ $detail3->nama_client }}</b></h1>
        <h4 align="center"><b>Services</b></h4>
        <a href="/admin/{{ $detail3->id }}/addsrvcli" class="btn btn-sm btn-primary" title="Add Data"><i class="fa fa-plus"></i></a>
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
                        <a href="/admin/{{ $dt->id }}/editsrvcli" title="Edit"><i class="fa fa-edit"></i></a>
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
                        <td>{{ $detail3->address }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Client POC</td>
                        <td>:</td>
                        <td>{{ $detail3->client_poc }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Concord POC</td>
                        <td>:</td>
                        <td>{{ $detail3->concord_poc }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">End User POC</td>
                        <td>:</td>
                        <td>{{ $detail3->end_user_poc }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">Client Since</td>
                        <td>:</td>
                        <td>{{ $detail3->client_since }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">No Of Subs</td>
                        <td>:</td>
                        <td>{{ $detail3->no_of_subs }}</td>
                    </tr>
                    <tr>
                        <td style="width:100px;">List Of Subs</td>
                        <td>:</td>
                        <td>{{ $detail3->list_of_subs }}</td>
                    </tr>
                </table>
    </div>
</div>

@stop


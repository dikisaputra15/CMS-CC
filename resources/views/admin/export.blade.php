@extends('adminlte::page')

@section('title','NPT FORM')

@section('content')

<link rel="icon" type="image/png" sizes="32x32" href="{{url('/vendor/adminlte/dist/img/cc.jpg')}}">

<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3 align="center">NPT FORM</h3>
    </div>
    <div class="card-body">
    <table class="table">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Contract Number</th>
                <th scope="col">Services</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">
                    Contract Value
                    <br><small>(US$/IDR)</Small>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($view as $vw)
                <tr>
                    <td>{{ $vw->contract_no }}</td>
                    <td>{{ $vw->nama_services }}</td>
                    <td>{{ $vw->start_date }}</td>
                    <td>{{ $vw->end_date }}</td>
                    <td>{{ $vw->contract_value }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <br>
        <a href="{{ url('admin/exportxls') }}" class="btn btn-success" title="export excel"><i class="fa fa-file-excel"></i></a>
    </div>
</div>
@stop


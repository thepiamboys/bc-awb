
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Awblabel</h1></div>

<?php
require '../vendor/autoload.php';
$generator = new Picqer\Barcode\BarcodeGeneratorHtml();
?>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Airline</th>
            <th>Awbbc</th>
            <th>Awb</th>
            <th>Hawb</th>
            <th>Destination</th>
            <th>Origin</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->airline }}</td>
            <td>{{ $record->awbbc }}</td>
            <td>{{ $record->awb }}</td>
            <td>{{ $record->hawb }}</td>
            <td>{{ $record->destination }}</td>
            <td>{{ $record->origin }}</td>
            <td>{{ $record->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

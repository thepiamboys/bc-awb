@extends('layouts.report')
@section('content')
<?php
require '../vendor/autoload.php';
$generator = new Picqer\Barcode\BarcodeGeneratorHtml();
?>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th colspan="2" style="text-align: center; font-size: 20pt; border-bottom: 1px solid black; font-weight:bold">{{ $record->airline }}</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center" >
                <div style="display: flex; justify-content: center; align-items: center; height: 45px; margin: 0 auto;">
                    <?php echo $generator->getBarcode($record->awbbc, $generator::TYPE_CODE_128); ?>
                </div>
            </th>
        </tr>
        </tr>
        <tr>
            <th colspan="2" style="font-size: 12pt; text-align: center; font-size: 14pt">{{ $record->awbbc }}</th>
        </tr>
        <tr>
            <th  colspan="2" style="font-size: 12pt; border-top: 1px solid black">AIR WAYBILL NUMBER</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; font-size: 20pt; font-weight:bold"> {{ $record->awb }}</th>
        </tr>
        <tr>
            <th style="font-size: 12pt; border-right: 1px solid black; border-top: 1px solid black">DESTINATION</th>
            <th style="font-size: 12pt; border-top: 1px solid black">TOTAL NO OF PIECES</th>
        </tr>
        <tr>
            <td style="font-size: 20pt; font-weight:bold; border-right: 1px solid black;">{{ $record->destination }}</td>
            <td style="font-size: 20pt; font-weight:bold">{{ $record->total }}</td>

        </tr>
        <tr>
            <th colspan="2" style="font-size: 12pt; border-top: 1px solid black">ORIGIN STATION</th>
        </tr>
        <tr>
            <th colspan="2" style="font-size: 22px; text-align: center; font-weight:bold;">{{ $record->origin }}</th>
        </tr>
        <tr>
            <th style="font-size: 12pt; border-top: 1px solid black">HAWB NO</th>
            <td style="font-size: 12pt; border-top: 1px solid black; text-align: center; font-weight:bold">{{ $record->hawb }}</td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center" >
                <div style="display: flex; justify-content: center; align-items: center; height: 45px; margin: 0 auto;">
                    <?php echo $generator->getBarcode($record->hawb, $generator::TYPE_CODE_128); ?>
                </div>
            </th>
        </tr>
        </tr>
		<tr>
            <th colspan="2" style="text-align: center">
                <img class="img-responsive" src="{{ asset('images/logo.png') }}" width="175" height="auto" />
            </th>
		</tr>
    </tbody>
</table>
@endsection

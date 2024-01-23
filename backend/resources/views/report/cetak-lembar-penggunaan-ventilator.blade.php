<!DOCTYPE html>
<html lang="en">

@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Penggunaan Ventilator</title>

    <style>
        @page {
            size: auto;
            size: A4 portrait;
        }

        html,
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9pt;

        }

        table {
            page-break-inside: auto;
            table-layout: fixed;
            border-collapse: collapse;
            padding: .3rem;
        }

        tr,td {
            padding: .3rem;
            page-break-inside: avoid;
            page-break-after: auto;
        }
    </style>
</head>

@if (!empty($res['d1']))
    <body>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td colspan="2">
                        <strong>{!! $res['profile']->namalengkap !!}</strong><br>
                        {!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292

                    </td>
                    <td rowspan="2">
                        Nomor RM : {!! $res['d1'][0]->nocm !!} <br>
                        Nama Lengkap : {!! $res['d1'][0]->namapasien !!} {!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ?
                        '(P)' : '(L)' !!}<br>
                        Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir )) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size:16pt;"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong>
                    </td>
                </tr>
            </thead>
        </table>
        <br>


        <table width="100%" border="1">
            <tr style="text-align: center">
                <td width="5%"><b>NO</b></td>
                <td><b>TGL/JAM PEMASANGAN</b></td>
                <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
                <td><b>JUMLAH JAM PEMASANGAN</b></td>
                <td><b>NAMA TINDAKAN</b></td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110723) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110724) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110725) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110726) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110727) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110728) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110729) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110731) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110732) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110733) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110734) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110735) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110736) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110737) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110739) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110740) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110741) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110742) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110743) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110744) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110745) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110747) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110748) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110749) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110750) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110751) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110752) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110753) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110755) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110756) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110757) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110758) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110759) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110760) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">11</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110763) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110764) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110765) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">12</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110766) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110767) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110768) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110769) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">13</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110771) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110772) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110773) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">14</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110774) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110775) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110776) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110777) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">15</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110779) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110780) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 32110781) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="table-layout:fixed;border:none">
        
            <tr style="text-align: center;">
                <td colspan="4" style="border:none">DPJP</td>
                <td style="border:none"></td>
                <td colspan="4" style="border:none">RM 36 LT</td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">
                    
                    <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32110782) {!! QrCode::format('svg')->size(70)->encoding('UTF-8')->generate($item->value) !!} @endif @endforeach</div>
                </td>
                <td style="border:none"></td>
                <td colspan="4" valign="bottom" style="border:none">
                    <div id="qrcodePetugas2" style="text-align: center">
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 32110782) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
    </body>
@endif

@if (!empty($res['d2']))
    <body>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td colspan="2">
                        <strong>{!! $res['profile']->namalengkap !!}</strong><br>
                        {!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292

                    </td>
                    <td rowspan="2">
                        Nomor RM : {!! $res['d2'][0]->nocm !!} <br>
                        Nama Lengkap : {!! $res['d2'][0]->namapasien !!} {!! $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ?
                        '(P)' : '(L)' !!}<br>
                        Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir )) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size:16pt;"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong>
                    </td>
                </tr>
            </thead>
        </table>
        <br>


        <table width="100%" border="1">
            <tr style="text-align: center">
                <td width="5%"><b>NO</b></td>
                <td><b>TGL/JAM PEMASANGAN</b></td>
                <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
                <td><b>JUMLAH JAM PEMASANGAN</b></td>
                <td><b>NAMA TINDAKAN</b></td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110723) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110724) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110725) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110726) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110727) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110728) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110729) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110731) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110732) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110733) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110734) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110735) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110736) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110737) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110739) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110740) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110741) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110742) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110743) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110744) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110745) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110747) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110748) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110749) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110750) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110751) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110752) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110753) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110755) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110756) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110757) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110758) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110759) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110760) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">11</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110763) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110764) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110765) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">12</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110766) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110767) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110768) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110769) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">13</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110771) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110772) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110773) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">14</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110774) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110775) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110776) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110777) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">15</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110779) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110780) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 32110781) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="table-layout:fixed;border:none">
        
            <tr style="text-align: center;">
                <td colspan="4" style="border:none">DPJP</td>
                <td style="border:none"></td>
                <td colspan="4" style="border:none">RM 36 LT</td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">
                    
                    <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32110782) {!! QrCode::format('svg')->size(70)->encoding('UTF-8')->generate($item->value) !!} @endif @endforeach</div>
                </td>
                <td style="border:none"></td>
                <td colspan="4" valign="bottom" style="border:none">
                    <div id="qrcodePetugas2" style="text-align: center">
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 32110782) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
    </body>
@endif

@if (!empty($res['d3']))
    <body>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td colspan="2">
                        <strong>{!! $res['profile']->namalengkap !!}</strong><br>
                        {!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292

                    </td>
                    <td rowspan="2">
                        Nomor RM : {!! $res['d3'][0]->nocm !!} <br>
                        Nama Lengkap : {!! $res['d3'][0]->namapasien !!} {!! $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ?
                        '(P)' : '(L)' !!}<br>
                        Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir )) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size:16pt;"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong>
                    </td>
                </tr>
            </thead>
        </table>
        <br>


        <table width="100%" border="1">
            <tr style="text-align: center">
                <td width="5%"><b>NO</b></td>
                <td><b>TGL/JAM PEMASANGAN</b></td>
                <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
                <td><b>JUMLAH JAM PEMASANGAN</b></td>
                <td><b>NAMA TINDAKAN</b></td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110723) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110724) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110725) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110726) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110727) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110728) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110729) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110731) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110732) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110733) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110734) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110735) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110736) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110737) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110739) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110740) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110741) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110742) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110743) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110744) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110745) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110747) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110748) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110749) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110750) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110751) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110752) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110753) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110755) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110756) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110757) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110758) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110759) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110760) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">11</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110763) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110764) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110765) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">12</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110766) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110767) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110768) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110769) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">13</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110771) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110772) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110773) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">14</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110774) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110775) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110776) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110777) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">15</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110779) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110780) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 32110781) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="table-layout:fixed;border:none">
        
            <tr style="text-align: center;">
                <td colspan="4" style="border:none">DPJP</td>
                <td style="border:none"></td>
                <td colspan="4" style="border:none">RM 36 LT</td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">
                    
                    <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32110782) {!! QrCode::format('svg')->size(70)->encoding('UTF-8')->generate($item->value) !!} @endif @endforeach</div>
                </td>
                <td style="border:none"></td>
                <td colspan="4" valign="bottom" style="border:none">
                    <div id="qrcodePetugas2" style="text-align: center">
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 32110782) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
    </body>
@endif

@if (!empty($res['d4']))
    <body>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td colspan="2">
                        <strong>{!! $res['profile']->namalengkap !!}</strong><br>
                        {!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292

                    </td>
                    <td rowspan="2">
                        Nomor RM : {!! $res['d4'][0]->nocm !!} <br>
                        Nama Lengkap : {!! $res['d4'][0]->namapasien !!} {!! $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ?
                        '(P)' : '(L)' !!}<br>
                        Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir )) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size:16pt;"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong>
                    </td>
                </tr>
            </thead>
        </table>
        <br>


        <table width="100%" border="1">
            <tr style="text-align: center">
                <td width="5%"><b>NO</b></td>
                <td><b>TGL/JAM PEMASANGAN</b></td>
                <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
                <td><b>JUMLAH JAM PEMASANGAN</b></td>
                <td><b>NAMA TINDAKAN</b></td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110723) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110724) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110725) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110726) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110727) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110728) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110729) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110731) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110732) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110733) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110734) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110735) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110736) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110737) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110739) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110740) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110741) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110742) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110743) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110744) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110745) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110747) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110748) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110749) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110750) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110751) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110752) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110753) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110755) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110756) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110757) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110758) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110759) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110760) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">11</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110763) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110764) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110765) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">12</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110766) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110767) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110768) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110769) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">13</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110771) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110772) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110773) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">14</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110774) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110775) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110776) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110777) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">15</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110779) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110780) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 32110781) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="table-layout:fixed;border:none">
        
            <tr style="text-align: center;">
                <td colspan="4" style="border:none">DPJP</td>
                <td style="border:none"></td>
                <td colspan="4" style="border:none">RM 36 LT</td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">
                    
                    <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32110782) {!! QrCode::format('svg')->size(70)->encoding('UTF-8')->generate($item->value) !!} @endif @endforeach</div>
                </td>
                <td style="border:none"></td>
                <td colspan="4" valign="bottom" style="border:none">
                    <div id="qrcodePetugas2" style="text-align: center">
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 32110782) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
    </body>
@endif

@if (!empty($res['d5']))
    <body>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td colspan="2">
                        <strong>{!! $res['profile']->namalengkap !!}</strong><br>
                        {!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292

                    </td>
                    <td rowspan="2">
                        Nomor RM : {!! $res['d5'][0]->nocm !!} <br>
                        Nama Lengkap : {!! $res['d5'][0]->namapasien !!} {!! $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ?
                        '(P)' : '(L)' !!}<br>
                        Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir )) !!}

                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-size:16pt;"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong>
                    </td>
                </tr>
            </thead>
        </table>
        <br>


        <table width="100%" border="1">
            <tr style="text-align: center">
                <td width="5%"><b>NO</b></td>
                <td><b>TGL/JAM PEMASANGAN</b></td>
                <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
                <td><b>JUMLAH JAM PEMASANGAN</b></td>
                <td><b>NAMA TINDAKAN</b></td>
            </tr>
            <tr>
                <td style="text-align: center">1</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110723) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110724) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110725) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">2</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110726) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110727) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110728) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110729) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">3</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110731) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110732) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110733) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">4</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110734) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110735) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110736) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110737) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">5</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110739) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110740) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110741) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">6</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110742) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110743) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110744) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110745) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">7</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110747) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110748) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110749) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">8</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110750) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110751) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110752) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110753) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">9</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110755) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110756) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110757) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">10</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110758) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110759) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110760) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">11</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110763) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110764) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110765) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">12</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110766) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110767) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110768) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110769) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">13</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110771) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110772) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110773) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">14</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110774) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110775) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110776) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110777) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td style="text-align: center">15</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110779) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110780) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 32110781) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="table-layout:fixed;border:none">
        
            <tr style="text-align: center;">
                <td colspan="4" style="border:none">DPJP</td>
                <td style="border:none"></td>
                <td colspan="4" style="border:none">RM 36 LT</td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">
                    
                    <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32110782) {!! QrCode::format('svg')->size(70)->encoding('UTF-8')->generate($item->value) !!} @endif @endforeach</div>
                </td>
                <td style="border:none"></td>
                <td colspan="4" valign="bottom" style="border:none">
                    <div id="qrcodePetugas2" style="text-align: center">
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4" valign="bottom" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 32110782) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
    </body>
@endif
 <script>
    window.print();
 </script>
</html>
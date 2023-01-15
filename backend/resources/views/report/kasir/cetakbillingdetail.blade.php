<html>
<head>
    <meta charset="utf-8">
    <title>Billing</title>
    <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
    @if(stripos(\Request::url(), 'localhost') !== FALSE)
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else

        <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}">
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
 
</head>
<style type="text/css" media="print">
 @page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<style>
    tr td {
        padding:1px 2px 1px 2px;
    }
    .borderss{
        border-bottom: 1px solid black;
    }
    body{
        font-family: Tahoma, Geneva, sans-serif;
    }
 @page { size: A4 } .garis6 td{padding:3px !important;}
</style>
@php
if(isset($_GET['namafile'])){
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=".$_GET['namafile'].".xls");
}
$noreg = $r['noregistrasi'];
$d = App\Http\Controllers\Report\ReportController::getProfile();
@endphp
 <!-- onload="window.print()" -->
<body style="background-color: #CCCCCC" >

<div align="center">
    <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}" style="padding:25px">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="15%">
                                <p align="left">
                                    <img src="{{ asset('service/img/logo_grandmed.png') }}" style="width: 80px" border="0">
                                </p>
                            </td>
                            <td width="70%" align="center" style="padding-right:100px;">
                                <font style="font-size: 16pt;" color="#000000">RSUD H.A SULTHAN DG. RADJA</font><br>
                                <font style="font-size: 10pt;" color="#000000">Jl. Srikaya No. 17, Bulukumba, Sulawesi Selatan</font><br>
                                <font style="font-size: 10pt;" color="#000000">(0413)81292 - 08114441100, E-mail : rsudbulukumba@gmail.com</font>
                            </td>
                            <td width="15%" align="center">
                                <font style="font-size: 12pt;" color="#000000" >{{ $billing[0]->namarekanan }}</font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" style="border-top:1px solid black;">
                        <tr>
                            <td align="center">
                                <font style="font-size: 12pt;font-weight: bold" color="#000000" >BILLING</font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-top:20px">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >No. Nota</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: {{ $billing[0]->nokwitansi }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Bangsal / Kamar</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: {{ $billing[0]->namakamar }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Tgl. Perawatan</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: {{ $billing[0]->tglregistrasi }} s.d. {{ $billing[0]->tglpulang }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Nama Pasien</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: {{ $billing[0]->namapasienjk }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Alamat Pasien</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: {{ $identitas[0]->alamatlengkap }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Dokter</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" > {{ $identitas[0]->dokterpj }}</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Registrasi</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Ruang</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                        @if ('Ruang' == $ply->jenisbilling)
                            <tr>
                                <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                            </tr>
                        @endif                            
                    @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 9);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Kamar Inap : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >Rincian Biaya</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                        </tr>
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >1. Dokter Spesialis</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Dokter Spesialis' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 1);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Dokter Spesialis : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >2. Dokter Umum</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Dokter Umum' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 2);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Dokter Umum : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >3. Konsultasi</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Konsultasi' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 3);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Dokter Konsultasi : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >4. Laboratorium</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Laboratorium' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 4);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Dokter Laboratorium : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >5. Perawatan</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Perawatan' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 5);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Perawatan : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >6. Radiologi</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Radiologi' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 6);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Radiologi : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" >7. Obat & BHP</font></td>
                            <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if ('Obat & BHP' == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $totalSP = App\Http\Controllers\Report\ReportController::getTotal($billing[0]->noregistrasi, 7);
                        @endphp
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Obat & BHP : {{ number_format($totalSP['total'], 2, '.', ',') }} </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        {{-- @foreach ($pelayanan as $k) --}}
                            @if(is_null($pelayanan[0]->jenisbilling))
                                <tr>
                                    <td width="25%"><font style="font-size: 11pt;" color="#000000;" > - </font></td>
                                    <td width="75%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                                </tr>
                            @endif
                        {{-- @endforeach --}}
                        
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @foreach ($pelayanan as $ply)
                            @if (null == $ply->jenisbilling)
                                <tr>
                                    <td width="26%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                                    <td width="30%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->namaproduk }}</font></td>
                                    <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->hargasatuan }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jumlah }}</font></td>
                                    <td width="10%"><font style="font-size: 11pt;" color="#000000" >{{ $ply->jasa }}</font></td>
                                    <td width="15%"><font style="font-size: 11pt;" color="#000000" >{{ number_format($ply->total , 2, '.', ',') }}</font></td>
                                </tr>
                            @endif                            
                        @endforeach
                    </table>
                    
                    {{-- <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td width="25%"><font style="font-size: 11pt;" color="#000000;" ></font></td>
                            <td width="30%"><font style="font-size: 11pt;" color="#000000" >PPN Obat</font></td>
                            <td width="5%"><font style="font-size: 11pt;" color="#000000" >:</font></td>
                            <td width="15%"><font style="font-size: 11pt;" color="#000000" ></font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" ></font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" ></font></td>
                            <td width="15%"><font style="font-size: 11pt;" color="#000000" ></font></td>
                        </tr>
                    </table> --}}
                    {{-- <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td align="right" width="25%"><font style="font-size: 11pt;" color="#000000;" >Total Obat Bersih : </font></td>
                        </tr>
                    </table> --}}
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        @php
                            $total = App\Http\Controllers\Report\ReportController::getTotalTagihan($billing[0]->noregistrasi);
                        @endphp
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >TOTAL TAGIHAN</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: {{ number_format($total['total'] , 2, '.', ',') }}</font></td>
                        </tr>
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >PPN</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >TAGIHAN + PPN</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >DEPOSIT</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >BAYAR</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                        <tr>
                            <td width="90%"><font style="font-size: 11pt;" color="#000000;" >KEMBALI</font></td>
                            <td width="10%"><font style="font-size: 11pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding-top:20px">
                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000"; align="center">Mengetahui,</font></td>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000"></font></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000" >a/n Direktur</font></td>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000" >Bulukumba, {{ date ('d/m/Y') }}</font></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000" >Kabid Umum & Keuangan</font></td>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000" >Kasir</font></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="center"><font style="font-size: 11pt;" color="#000000" ></font></td>
                                        <td width="50%" align="center" id="qrAdmin"><font style="font-size: 11pt;" color="#000000" ></font></td>
                                    </tr>
                                    <tr>
                                        <td valign="bottom" width="25%" align="center"><font style="font-size: 11pt;" color="#000000" >( ........................ )</font></td>
                                        <td valign="bottom" width="25%" align="center"><font style="font-size: 11pt;" color="#000000" >( Admin Utama )</font></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="padding-top:20px">
                                <font style="font-size: 11pt;" color="#000000;" >NB : Mohon maaf apabila ada tagihan yang belum tertagihkan dalam perincian ini akan ditagihkan kemudian, dan apabila berlebih akan dikembalikan</font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    var baseUrl =
            {!! json_encode(url('/')) !!}
    var angular = angular.module('angularApp', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('@{{');
            $interpolateProvider.endSymbol('}}');
        }).factory('httpService', function ($http, $q) {
            return {
                get: function (url) {
                    // $("#showLoading").show()
                    var deffer = $q.defer();
                    $http.get(baseUrl + '/' + url, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    }).then(function successCallback(response) {
                        deffer.resolve(response);
                        // $("#showLoading").hide()
                    }, function errorCallback(response) {
                        deffer.reject(response);
                        // $("#showLoading").hide()
                    });
                    return deffer.promise;
                },
            }
        })
    $(function () {
        'use strict';
        $('#qrAdmin').qrcode({
            text: baseUrl + '/service/medifirst2000/report/cetak-admin?reg=' + {{ $billing[0]->noregistrasi }} ,
            height: 75,
            width: 75
        });

    })
</script>
</body>
</html>

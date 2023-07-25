<html>
<head>
    <meta charset="utf-8">
    <title>Expertise</title>
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
    .section{
        page-break-after: always;
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
<body style="background-color: white" >
@foreach ($raw as $item)
<div align="center" class="section">
    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" width="{{$pageWidth}}" style="padding-right:25px;padding-left:80px;padding-top:110px;padding-bottom:25px">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="27%" align="center" style="border-top: 3px solid black;border-left: 3px solid black;border-right: 3px solid black;padding-bottom: 20px;">
                                <font style="font-size: 12pt;" color="#000000"><b>RSUD H.A SULTHAN DG. RADJA</b></font><br>
                                <font style="font-size: 10pt;" color="#000000">JL. SERIKAYA NO. 17 BULUKUMBA 92512</font><br>
                                <font style="font-size: 10pt;" color="#000000">TELP : (0413) 81292</font>
                            </td>
                            <td width="40%" align="left" style="padding-left:5px;border-top: 3px solid black;border-bottom: 1px solid black;padding-bottom: 20px;border-right: 3px solid black;">
                                <font style="font-size: 12pt;" color="#000000">NO RM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->nocm }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">NAMA LENGKAP&nbsp;&nbsp;: {{ $item->namapasien }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">TANGGAL LAHIR&nbsp; : {{ date('d-m-Y', strtotime($item->tgllahir)) }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $item->noidentitas }}</font>
                            </td>
                            <td width="8%" align="center" style="border:1px solid black;padding-bottom: 20px;border-top: 3px solid black;border-right: 3px solid black;background-color:black">
                                <font style="font-size: 22pt; " color="white">RM</font><br>
                                <font style="font-size: 22pt;" color="white" >19</font>
                            </td>
                        </tr>
                    </table>
                    
                    <table width="100%" cellspacing="10" cellpadding="0" style="border: 3px solid black;padding-bottom: 20px;">
                        <tr >
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Tanggal / No Foto - USG </font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ date('d-m-Y H:i', strtotime($item->tanggal)) }} / {{ $item->nofoto }} </font></td>
                        </tr>
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Klinis</font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ $item->klinis }}</font></td>
                        </tr>
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Status</font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ $item->statusrad }}</font></td>
                        </tr>
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Dokter Pengirim</font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ $item->dokterpengirim == null ? $item->dokterluar : $item->dokterpengirim }}</font></td>
                        </tr>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" style="border-left: 3px solid black;border-right: 3px solid black;">
                        <tr>
                            <td style="padding-left: 20px;padding-top:20px">
                                <font style="font-size: 12pt;" color="#000000;">{!! $item->keterangan !!}</font><br><br>
                            </td>
                        </tr>
                       
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" style="border-left: 3px solid black;border-right: 3px solid black;border-bottom: 3px solid black;padding-top:150px" >
                        <tr>
                            <td style="background-color:#FFF" width="35%">
                                
                            </td>
                            <td style="background-color:#FFF" width="65%" align="center">
                                <font style="padding-right: 50px; font-size:14pt">BTK,SS</font><br>
                                <div style="padding-right: 50px; font-size:20pt" id="qrDokter{{ $item->pgid }}"></div>
                                <font style="padding-right: 50px; font-size:14pt"><u>( {{ $item->dokterrad }} )</u></font><br>
                                <font style="padding-right: 50px; font-size:14pt">Spesialis Radiologi</font><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
        </tbody>
    </table>
</div>
@endforeach
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
        var dataLoad = {!! json_encode($raw )!!};
        'use strict';
        for (let index = 0; index < dataLoad.length; index++) {
            var element = dataLoad[index];
            
            $('#qrDokter' + element.pgid).qrcode({
                text: baseUrl + '/service/medifirst2000/report/data-dokter?reg=' + element.pgid ,
                height: 75,
                width: 75
            });
        }
        

    })
    $(document).ready(function () {
        window.print();
    });
</script>
</body>
</html>

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
                            <td width="30%" align="center" style="border: 1px solid black;padding-bottom: 20px;">
                                <font style="font-size: 12pt;" color="#000000">RSUD H.A SULTHAN DG. RADJA</font><br>
                                <font style="font-size: 10pt;" color="#000000">JL. SERIKAYA NO. 17 BULUKUMBA 92512</font><br>
                                <font style="font-size: 10pt;" color="#000000">TELP : (0413) 81292</font>
                            </td>
                            <td width="40%" align="left" style="padding-left:5px;border-top: 1px solid black;border-bottom: 1px solid black;padding-bottom: 20px;">
                                <font style="font-size: 12pt;" color="#000000">NO RM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $raw->nocm }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">NAMA LENGKAP &nbsp;: {{ $raw->namapasien }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">TANGGAL LAHIR &nbsp;: {{ $raw->tgllahir }}</font><br>
                                <font style="font-size: 12pt;" color="#000000">NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $raw->noidentitas }}</font>
                            </td>
                            <td width="20%" align="center" style="border:1px solid black;padding-bottom: 20px;">
                                <font style="font-size: 22pt;" color="#000000" >RM</font><br>
                                <font style="font-size: 12pt;" color="#000000" >19</font>
                            </td>
                        </tr>
                    </table>
                    
                    <table width="100%" cellspacing="10" cellpadding="0" border="0" style="border: 3px solid black;padding-bottom: 50px;">
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Tanggal / No Foto - USG </font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ $raw->tanggal }} / {{ $raw->nofoto }} </font></td>
                        </tr>
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Klinis</font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: {{ $raw->klinis }}</font></td>
                        </tr>
                        <tr>
                            <td width="22%"><font style="font-size: 12pt;" color="#000000;" >Dokter Pengirim</font></td>
                            <td width="78%"><font style="font-size: 12pt;" color="#000000" >: </font></td>
                        </tr>
                    </table>
                    <table width="100%" height="800" cellspacing="0" cellpadding="0" border="0" style="border: 1px solid black;">
                        <tr>
                            <td width="40%">

                            </td>
                            <td width="30%">

                            </td>
                            <td width="30%" align="center">
                                <font style="font-size: 12pt;" color="#000000;" >BTK,SS</font><br>
                                <div style="text-align: center" id="qrDokter"></div>
                                <font style="font-size: 12pt;font-weight: bold;text-decoration: underline;" color="#000000;" >( {{ $raw->dokterrad }} )</font><br>
                                <font style="font-size: 12pt;font-weight: bold;font-style: italic;" color="#000000;" >Spesialis Radiologi</font><br>
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
        $('#qrDokter').qrcode({
            text: baseUrl + '/service/medifirst2000/report/data-dokter?reg=' + {{ $raw->pgid }} ,
            height: 75,
            width: 75
        });

    })
</script>
</body>
</html>

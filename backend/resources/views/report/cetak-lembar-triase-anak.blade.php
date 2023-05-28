<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Triase Gawat Darurat Anak Dan Neonatus</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        {{-- <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}"> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
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
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('service/css/style.css') }}" rel="stylesheet"> --}}
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        @page{
            size: landscape A4 !important;
            /* width:210mm;
            height:279mm; */
            margin-left:3rem;
            margin-top:1rem;
            margin-bottom:1rem;
            margin-right:1rem;
            transform:scale(72%);
        }
        table{ 
            page-break-inside:auto 
        }
        tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        }
        header{
            border:1px solid #000; 
        }
        section{
            content: '';
        }
		.rotate{
			transform: rotate(-90deg);
		}
		.text-center{
			text-align: center;
		}
		.p05{
			padding:.2rem;
		}
        body{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width:279mm;
            height:210mm;
            margin:0 auto;
			border-bottom:none;
        }
        header{
            width:100%;
            display:flex;
            justify-content:flex-start;
            /* border:1px solid #000; */
        }
        .logo{
            width:100px;
            height:auto;
            border-right:1px solid #000;
            padding:.3rem;
        }
        img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
        .kop{
            padding:.3rem;
            align-self:center;
        }
        .kop-text{
            justify-content:center;
            align-items:center;
            align-content:center;
            text-align:center;
            font-size:smaller;
        }
        .info{
            border-left:1px solid #000;
            border-right:1px solid #000;
			border-collapse:collapse;
            flex-grow:1;
            padding:.3rem;
        }
        .code{
            display:flex;
            flex-direction:column;
            font-size:34px;
            flex-basis:15%;
            padding:0;
        }
        .code div:first-child{
            width:100%;
            background:#000;
            color:#fff;
            text-align:center;
            padding:.5rem;
        }
        .code div:last-child{
            text-align:center;
            width:100%;
            padding:.5rem;
        }
        .title{
            font-size:16pt;
            font-weight:bold;
        }
        .bg-dark{
            background:#000;
            color:#fff;
            padding:.5rem;
            text-align:center;
        }
		.bordered{
			border:1px solid black;
			border-collapse:collapse;
			padding:.2rem;
			box-sizing: border-box;
		}
        .border-top{
            border-top:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-bottom{
            border-bottom:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-left{
            border-left:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-right{
            border-right:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .flex{
            display:flex;
        }
        .flex .basis50{
            flex-basis:50%;
        }
        .col-2{
            display:flex;
            flex-basis:50%;
        }
        ul li:not(nth-child(1)){
            padding:.3rem;
            }
            ul li{
            list-style:none;
        }
        .basis50 ul li:first-child{
            border-bottom:1px solid #000;
            padding:.3rem;
        }
        table {
            border:1px solid #000;
            border-collapse: collapse;
            font-size: xx-small;
            font-size: 7.5px;
        }
        tr table tr td{
            width:20px;
        }
        tr td{
            border:1px solid #000;
            border-collapse: collapse;
        }
        #content > tr td{
            width:20px;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem
        }
    </style>
</head>
<body ng-controller="cetakLembarTriaseAnak">
    <section>
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif
                </td>
                <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="4" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="4" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">06.1</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="4" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr style="border:none">
                <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;" class="bg-dark">
                    <h2>LEMBAR TRIASE GAWAT DARURAT ANAK DAN NEONATUS</h2>
                    <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small>
                </td>
            </tr>
            <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                <td rowspan="3" style="border:none;">Keluhan Utama :</td>
                <td rowspan="3" colspan="5" style="border:none;">@{{ item.obj[420445] ? item.obj['keluhan_utama'] : '' }}</td>
                <td style="border:none;">Tanggal</td>
                <td  style="border:none;" colspan="2">: @{{item.obj[420447] | toDate | date:'dd MMMM yyyy'}}</td>
                <td  style="border:none;">Pukul </td>
                <td  style="border:none;">: @{{item.obj[420447] | toDate | date:'HH:mm'}}</td>
                <td  style="border:none;">WITA</td>
            </tr>
            <tr height="8px">
                <td  style="border:none;">Tekanan Darah</td>
                <td  style="border:none;" colspan="2">: @{{ item.obj[420448] ? item.obj[420448] : '...........................................' }}</td>
                <td  style="border:none;">Saturasi Oksigen </td>
                <td  style="border:none;">: @{{ item.obj[420451] ? item.obj[420451] : '...........................................' }}</td>
            </tr>
            <tr height="8pt">
                <td  style="border:none;">Nadi</td>
                <td  style="border:none;" colspan="2">: @{{ item.obj[420449] ? item.obj[420449] : '...........................................' }}</td>
                <td  style="border:none;">Nafas </td>
                <td  style="border:none;">: @{{ item.obj[420452] ? item.obj[420452] : '...........................................' }}</td>
            </tr>
            <tr style="border:1px solid #000; border-top:none;border-bottom:none;" height="8px">
                <td  style="border:none;">Riwayat Alergi :</td>
                <td colspan="5" style="border:none;">@{{ item.obj[420446] ? item.obj['riwayat_alergi'] : '' }}</td>
                <td style="border:none;">Suhu</td>
                <td  style="border:none;" colspan="2">: @{{ item.obj[420450] ? item.obj[420450] : '...........................................' }}</td>
                <td  style="border:none;">GCS </td>
                <td  style="border:none;">: @{{ item.obj[420453] ? item.obj[420453] : '...........................................' }}</td>
                <td  style="border:none;"></td>
            </tr>
            <tr style="border:1px solid #000; border-top:none;border-bottom:none;padding:5rem;" height="8px">
                <th style="padding:1px;text-align:left;border:1px solid #000;border-top:none;border-bottom:none;" colspan="12">&nbsp;&nbsp;&nbsp;Petunjuk : Beri tanda (v) pada Kolom yang anda anggap sesuai dengan kondisi pasien</th>
            </tr>
            <tr style="border-top:none;border-bottom:none;">
                <td colspan="12" style="border-top:none">
                    <section style="padding:1px">
                        <table style="table-layout:fixed;width:100%">
                            <tr aria-colspan="12" style="font-weight:bolder;text-align:center">
                                <td colspan="3">PENGKAJIAN</td>
                                <td colspan="3" style="background-color: red;">ATS 1</td>
                                <td colspan="3" style="background-color: yellow;">ATS 2</td>
                                <td colspan="3" style="background-color:aquamarine;">ATS 3</td>
                                <td colspan="3" style="background-color: aqua;">ATS 4</td>
                                <td colspan="3">ATS 5</td>
                            </tr>
                            <tr>
                                <td colspan="3">Jalan Napas</td>
                                <td colspan="3" style="background-color: red;" valign="middle">@{{ item.obj[420454] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Obstruksi Total</td>
                                <td colspan="3" style="background-color: yellow;" valign="middle">@{{ item.obj[420459] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Obstruksi Parsial</td>
                                <td colspan="3"  style="background-color: aquamarine;"valign="middle">@{{ item.obj[420463] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Paten</td>
                                <td colspan="3" style="background-color: aqua;" valign="middle">@{{ item.obj[420466] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Paten</td>
                                <td colspan="3" valign="middle">@{{ item.obj[420469] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Paten</td>
                            </tr>
                            <tr  >
                                <td colspan="3" rowspan="2">Pernapasan</td>
                                <td colspan="3" valign="middle"style="background-color: red;" style="border:1px solid #000;border-top:none;border-bottom:none">
                                    @{{ item.obj[420455] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Henti Napas
                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;"  style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420460] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Distress Napas Berat</td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;"  style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420464] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Distress Napas Sedang</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420467] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Ada Distress Napas</td>
                                <td colspan="3" valign="middle"  style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420470] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Ada Distress Napas</td>
                            </tr >
                            <tr >
                                <td colspan="3" valign="middle" style="background-color: red;" style="border:1px solid #000;border-top:none;border-bottom:none">
                                    @{{ item.obj[420456] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} RR < 10
                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                            </tr>
                            <tr style="border-top:1px solid #000;">
                                <td colspan="3" rowspan="2">Sirkulasi</td>
                                <td colspan="3" valign="middle" style="background-color: red;" style="border:1px solid #000;border-top:none;border-bottom:none">
                                    @{{ item.obj[420457] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Henti Jantung
                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420461] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan Hemodinamik Berat</td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420465] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan Hemodinamik Sedang-ringan</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420468] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hemodinamik Stabil</td>
                                <td colspan="3" valign="middle" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420471] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hemodinamik Stabil</td>
                            </tr>
                            <tr style="border-top:none;border-bottom:none">
                                <td colspan="3" valign="middle" style="background-color: red;" style="border:1px solid #000;border-top:none;border-bottom:none">
                                    @{{ item.obj[420458] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} TD < 80
                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;" style="border:1px solid #000;border-top:none;border-bottom:none">
                                    @{{ item.obj[420462] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} HR < 60 atau > 150
                                </td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                            </tr>
                            <tr style="border-bottom:1px solid #000;">
                                <td colspan="3">GCS</td>
                                <td colspan="3" valign="middle" style="background-color: red;">
                                    @{{ item.obj[420472] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} < 9
                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;">@{{ item.obj[420473] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 9-12</td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;">@{{ item.obj[420474] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 13-15</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;">@{{ item.obj[420475] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 15</td>
                                <td colspan="3" valign="middle">@{{ item.obj[420476] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 15</td>
                            </tr>
                            <tr>
                                <td colspan="3">Nyeri</td>
                                <td colspan="3" valign="middle" style="background-color: red;">

                                </td>
                                <td colspan="3" valign="middle" style="background-color: yellow;">@{{ item.obj[420477] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Berat</td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;">@{{ item.obj[420479] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Sedang</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;">@{{ item.obj[420484] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Ringan</td>
                                <td colspan="3" valign="middle"></td>
                            </tr>
                            <tr>
                                <td colspan="3">Kondisi Mental</td>
                                <td colspan="3" valign="middle" style="background-color: red;">
                                    
                                </td>
                                <td colspan="3" valign="middle"  style="background-color: yellow;"> </td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;">@{{ item.obj[420480] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Kooperatif</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;">@{{ item.obj[420485] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kooperatif</td>
                                <td colspan="3" valign="middle">@{{ item.obj[420490] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kooperatif</td>
                            </tr>
                            <tr style="border:1px solid #000;border-top:none;border-bottom:none">
                                <td colspan="3" rowspan="4">Neonatus</td>
                                <td colspan="3" rowspan="4" valign="middle" style="background-color: red;" style="border:1px solid #000; border-top:none;border-bottom:none"></td>
                                <td colspan="3" rowspan="4" valign="middle" style="background-color: yellow;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420478] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hipotermi</td>
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420481] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Iritabel, Sulit Menyusui</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420486] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BBLR</td>
                                <td colspan="3" valign="middle" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420491] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ikterik</td>
                            </tr>
                            <tr style="border:none;">
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420482] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pucat</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420487] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ikterik Kraemer > 3, Ikterik Dalam 24 Jam Pertama, Ikterik Bertahan > 14 Hari</td>
                                <td colspan="3" valign="middle" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420492] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi Superfisial</td>
                            </tr>
                            <tr style="border:none;">
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420483] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelainan Kongenital Mayor</td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420488] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Perdarahan</td>
                                <td colspan="3" valign="middle" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420493] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Malformasi Minor</td>
                            </tr>
                            <tr style="border:none;">
                                <td colspan="3" valign="middle" style="background-color: aquamarine;" style="border:1px solid #000; border-top:none;border-bottom:none"></td>
                                <td colspan="3" valign="middle" style="background-color: aqua;" style="border:1px solid #000; border-top:none;border-bottom:none">@{{ item.obj[420489] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trauma Lahir Minor</td>
                                <td colspan="3" valign="middle" style="border:1px solid #000; border-top:none;border-bottom:none"></td>
                            </tr>
                            <tr style="text-align:center;border:1px solid #000" height="20px">
                                <th colspan="3" style="border:1px solid #000">KATEGORI ATS</th>
                                <th colspan="3" style="border:1px solid #000" valign="middle">MAXIMUM WAKTU TUNGGU</th>
                                <th colspan="3" style="border:1px solid #000" valign="middle">KETERANGAN</th>
                                <th colspan="5" style="border:1px solid #000" valign="middle">Perawat TRIASE</th>
                                <th colspan="4" style="border:1px solid #000" valign="middle">Dokter TRIASE</th>
                            </tr>
                            <tr >
                                <td>@{{ item.obj[420494] ? item.obj[420494] : '' }}</td>
                                <td colspan="2">SKALA 1</td>
                                <td colspan="3">Segera</td>
                                <td colspan="3">Rresuaitasi</td>
                                <td colspan="5" rowspan="3" style="border:1px solid #000;border-top:none;border-bottom:none"><div id="qrcodep1" style="text-align: center"></div></td>
                                <td colspan="4" rowspan="3" style="border:1px solid #000;border-top:none;border-bottom:none"><div id="qrcodep2" style="text-align: center"></div></td>
                            </tr>
                            <tr>
                                <td>@{{ item.obj[420498] ? item.obj[420498] : '' }}</td>
                                <td colspan="2">SKALA 2</td>
                                <td colspan="3">10 Menit</td>
                                <td colspan="3">Emergency/Gawat Darurat</td>
                               
                            </tr>
                            <tr>
                                <td>@{{ item.obj[420502] ? item.obj[420502] : '' }}</td>
                                <td colspan="2">SKALA 3</td>
                                <td colspan="3">120 Menit</td>
                                <td colspan="3">Tidak Darurat</td>

                            </tr>
                            <tr>
                                <td>@{{ item.obj[420506] ? item.obj[420506] : '' }}</td>
                                <td colspan="2">SKALA 4</td>
                                <td colspan="3">30 Menit</td>
                                <td colspan="3">Urgent/Darurat</td>
                                <td colspan="5" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">(@{{ item.obj[420514] ? item.obj[420514] : '..............................................................' }})
                                </td>
                                <td colspan="4" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">(@{{ item.obj[420515] ? item.obj[420515] : '..............................................................' }})</td>
                            </tr>
                            <tr>
                                <td>@{{ item.obj[420510] ? item.obj[420510] : '' }}</td>
                                <td colspan="2">SKALA 5</td>
                                <td colspan="3">60 Menit</td>
                                <td colspan="3">Semi Darurat</td>
                                <td colspan="5" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Nama dan Tanda tangan</td>
                                <td colspan="4"style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Nama dan Tanda tangan</td>
                            </tr>
                        </table>
                    </section>
                </td>
            </tr>
        </table>
    </section>
</body>
<script type="text/javascript">
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

    angular.controller('cetakLembarTriaseAnak', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: []
        }
        var dataLoad = {!! json_encode($res['d'] )!!};
        for (var i = 0; i <= dataLoad.length - 1; i++) {
            if(dataLoad[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad[i].type == "textbox") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obj[dataLoad[i].emrdfk] = chekedd
            }
            if (dataLoad[i].type == "radio") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value

            }

            if (dataLoad[i].type == "datetime") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "time") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "date") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }

            if (dataLoad[i].type == "checkboxtextbox") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                $scope.item.obj2[dataLoad[i].emrdfk] = true
            }
            if (dataLoad[i].type == "textarea") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "combobox") {
     
                var str = dataLoad[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obj[dataLoad[i].emrdfk] = res[1]
                    $('#id_'+dataLoad[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad[i].type == "combobox2") {
                var str = dataLoad[i].value
                var res = str.split("~");
                
                $scope.item.obj[dataLoad[i].emrdfk+""+1] = res[0]
                $scope.item.obj[dataLoad[i].emrdfk] = res[1]
                $('#id_'+dataLoad[i].emrdfk).html ( res[1])

            }

            if (dataLoad[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad[i].value
            }

            if (dataLoad[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad[i].value
            }

            if (dataLoad[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad[i].value
            }
            
            if (dataLoad[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad[i].value
            }

            $scope.tglemr = dataLoad[i].tgl
            
        }

        var keluhan_utama = $scope.item.obj[420445].replace(/(?:\r\n|\r|\n)/g, ', ');
        var riwayat_alergi = $scope.item.obj[420446].replace(/(?:\r\n|\r|\n)/g, ', ');

        $scope.item.obj['keluhan_utama'] = keluhan_utama;
        $scope.item.obj['riwayat_alergi'] = riwayat_alergi;

        var p1 = $scope.item.obj[420514];
        var p2 = $scope.item.obj[420515];

        if (p1 != undefined) {
            jQuery('#qrcodep1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p1
            });	
        }

        if (p2 != undefined) {
            jQuery('#qrcodep2').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p2
            });	
        }
    })
    angular.filter('toDate', function() {
        return function(items) {
            if(items != null){
                 return new Date(items);
            }
        };
    });
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
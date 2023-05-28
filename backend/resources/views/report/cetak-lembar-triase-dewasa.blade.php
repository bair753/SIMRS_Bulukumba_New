<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Triase Gawat Darurat Dewasa</title>
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
<body ng-controller="cetakLembarTriaseDewasa">
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
                <td rowspan="4" colspan="5" style="text-align:center;font-size:12px;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
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
                <td rowspan="2" style="font-size:xx-large;text-align: center;">06.2</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="4" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr style="border:none">
                <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;" class="bg-dark">
                    <h2>LEMBAR TRIASE GAWAT DARURAT DEWASA</h2>
                    <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="border-bottom:none;" rowspan="2">
                    Keluhan Utama : @{{ item.obj[420517] ? item.obj['keluhan_utama'] : '' }}

                </td>
                <td colspan="4" style="border-bottom:none">
                    Tanggal	: @{{item.obj[420517] | toDate | date:'dd MMMM yyyy'}}
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border-top:none;">Pukul	: @{{item.obj[420517] | toDate | date:'HH:mm'}} WITA</td>
            </tr>
            <tr>
                <td colspan="12">Petunjuk : Beri tanda (v) pada Kolom yang anda anggap sesuai dengan kondisi pasien</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <b>KATEGORI</b>
                </td>
                <td colspan="2" style="text-align: center">
                    <b>ATS 1</b>
                </td>
                <td colspan="2" style="text-align: center">
                    <b>ATS 2</b>
                </td>
                <td colspan="2" style="text-align: center">
                    <b>ATS 3</b>
                </td>
                <td colspan="2" style="text-align: center">
                    <b>ATS 4</b>
                </td>
                <td colspan="2" style="text-align: center"><b>ATS 5</b></td>
            </tr>
            <tr style="border:none;background-color:red;">
                <td rowspan="7" colspan="2" style="text-align:center;background-color:red;">
                    Resusitasi
                </td>
                <td colspan="2" style="border:none;background-color:red;">
                    @{{ item.obj[420518] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Henti Jantung
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420528] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Stidor Berat
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:red;">
                <td colspan="2" style="border:none;background-color:red;">
                    @{{ item.obj[420519] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Henti Nafas
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420529] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Respirasi Distress Berat
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:red;">
                <td colspan="2" style="border:none;background-color:red;">
                    @{{ item.obj[420520] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} RR < 10X/menit
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"> 
                    @{{ item.obj[420530] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} HR < 50 atau 150x/menit kulit lembab
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:red;">
                <td colspan="2" style="border:none;border-left:1px solid #000;background-color:red;">
                    @{{ item.obj[420521] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} GCS < 9
                 </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420531] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hipotensi dengan efek Hemodinamik
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;background-color:red;"></td>
                <td colspan="2" style="border:none;border-right:1px solid #000;border-left:1px solid #000;background-color:red;"></td>
                <td colspan="2" style="border:none;border-right:1px solid #000;border-left:1px solid #000;background-color:red;"></td>
                
            </tr>
            <tr style="background-color:red;">
                <td style="border:none;border-left:1px solid #000;background-color:red;" colspan="2" valign="top">
                    @{{ item.obj[420522] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Syok dengan Tekanan Sistolik < 70mmHg dan Syok Berat Pada Bayi/Anak
                </td>
                <td style="border:none;border-left:1px solid #000;"colspan="2" > @{{ item.obj[420532] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Perdarahan Berat</td>
                <td style="border:none;border-left:1px solid #000;background-color:red;"colspan="2"></td>
                <td style="border:none;border-left:1px solid #000;background-color:red;"colspan="2"></td>
                <td style="border:none;border-left:1px solid #000;background-color:red;" colspan="2"></td>
            </tr>
            <tr style="border:none;border-left:1px solid #000;background-color:red;" >
                <td colspan="2" style="border:none;border-left:1px solid #000;" >
                    @{{ item.obj[420523] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kejang Lama
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;" > @{{ item.obj[420533] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tenggelam
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;" style="border:none;border-left:1px solid #000;" ></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;" ></td>
                <td colspan="2"style="border:none;border-left:1px solid #000;border-right:1px solid #000" ></td>
            </tr>
            <tr style="border-bottom:1px solid #000;background-color:red;">
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420524] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Overdosis Obat dengan Hipoventilasi
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"> </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;border-right:1px solid #000"></td>
            </tr>
            <!-- new row  -->
            <tr style="border:none;background-color:yellow;">
                <td rowspan="8" colspan="2" style="border-bottom:none;text-align:center;" >
                    Observasi Respirasi
                </td>
                <td colspan="2" style="border:none"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420534] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pernafasan Dangkal
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Batuk Berdahak Disertai Demam dan Sesak
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                
                <td colspan="2" style="border:none"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420535] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SaO2 < 90
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Batuk Disertai Nyeri Dada dan Sesak
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420536] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas Sedang
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Batuk Darah
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas dengan Riwayat Asma
                </td>
                <td colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas dengan Riwayat Tumor Paru
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:1px solid #000;border-top:none;border-bottom:none;background-color:yellow;">
                <td rowspan="3" colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas dengan Riwayat PPOK
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:1px solid #000;border-top:none;border-bottom:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas dengan Riwayat TB Paru
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;border-bottom: 1px solid #000;background-color:yellow;">
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesak Nafas dengan Saturasi O2 90-95%
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <!-- new row  -->
            <tr style="border:none">
                <td rowspan="5" colspan="2" style="text-align:center;">
                    Tanda Vital
                </td>
                <td style="border:none">Tekanan Darah </td>
                <td style="border:none">: @{{ item.obj[420525] ? item.obj[420525] : '................' }}</td>
                <td style="border:none;border-left:1px solid #000;">Suhu </td>
                <td style="border:none;">: @{{ item.obj[420537] ? item.obj[420537] : '................' }}</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none">
                <td style="border:none">Nadi </td>
                <td style="border:none">: @{{ item.obj[420526] ? item.obj[420526] : '................' }}</td>
                <td style="border:none;border-left:1px solid #000;">Saturasi Oksigen</td>
                <td style="border:none;">: @{{ item.obj[420538] ? item.obj[420538] : '................' }}</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none">
                <td style="border:none">Nafas </td>
                <td style="border:none">: @{{ item.obj[420527] ? item.obj[420527] : '................' }}</td>
                <td style="border:none;border-left:1px solid #000;">GCS</td>
                <td style="border:none;">: @{{ item.obj[420539] ? item.obj[420539] : '................' }}</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none">
                <td colspan="2" style="border:none"></td>
                <td style="border:none;border-left:1px solid #000;">Riwayat Alergi Obat</td>
                <td style="border:none;">: @{{ item.obj[420540] ? item.obj[420540] : '................' }}</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none"></td>
                <td style="border:none;border-left:1px solid #000;">Alergi Lainnya</td>
                <td style="border:none;">: @{{ item.obj[420541] ? item.obj[420541] : '................' }}</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <!-- new row  -->
            <tr style="border:none;background-color:yellow;">
                <td rowspan="15" colspan="2" style="text-align:center;">
                    Observasi Non Respirasi
                </td>
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420542] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penurunan Kesadaran
                </td>
                <td colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hipertensi Berat
                </td>
                <td colspan="2"style="border:none;border-right:1px solid #000">@{{ item.obj[420576] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Perdarahan Ringan</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420543] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hemiperese Akut dan Penurunan Kesadaran
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Perdarahan Sedang
                </td>
                <td colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none">@{{ item.obj[420577] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Aspirasi Benda Asing Tanpa Gangguan Pernafasan</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Dada Kardiak
                </td>
                <td colspan="2" style="border:1px solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420563] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kejang Demam Pada Pas Imuno Supresif
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">@{{ item.obj[420578] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}  CKR</td>
                <td style="border:none;border-left:1px solid #000;">
                </td>
                <td style="border:none;border-left:none solid #000;">
                </td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam dengan Kelemahan
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420564] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Muntah-Muntah Menetap
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">@{{ item.obj[420580] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Iritasi Mata dengan Visusnormal</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Suspek Meningitis
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420565] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dehidrasi
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">@{{ item.obj[420581] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trauma Extermitas : Keseleo Pergelangan Kaki, Kemungkinan Fraktur, Luka Ringan, dengan Normal Tanda-Tanda Vital dan Nyeri Ringan dan Sedang</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Multipel Trauma Mayor
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420566] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cedera Kepala dengan Riwayat Pingsan
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">@{{ item.obj[420582] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Balutan Ketat Tanpa Gangguan Neuro Vascular</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Mata Kena Cairan Alkali/Asam
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420567] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Sedang Sampai Berat
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">@{{ item.obj[420583] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sendi Bengkak dan Merah</td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trauma Berat, Fracture, Amputasi
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420568] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Non Kardiak
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420550] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Minum Sedative Keracunan Kena Bisa
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420569] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Perut Tanpa Risiko Tinggi
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Hebat, KET
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420570] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cacat Extermitas
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                    @{{ item.obj[420552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gaduh Gelisah
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420571] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Extermitas Tidak Ada Sensasi
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420572] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trauma Risiko Tinggi
                </td>
                <td colspan="2"style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420573] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Stable Neonatus
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420574] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kekerasan Pada Anak
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>
            <tr style="border:none;border: bottom 1px solid #000;background-color:yellow;">
                <td colspan="2" style="border:none;border-right:1px solid #000;"></td>
                <td style="border:none" colspan="2">
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;">
                    @{{ item.obj[420575] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Stress Berat
                </td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
                <td colspan="2" style="border:none;border-left:1px solid #000;"></td>
            </tr>

             <!-- new row  -->
             <tr style="border:none;border-top:1px solid #000;background-color:aquamarine;">
                <td rowspan="6" colspan="2" style="text-align:center;">
                    Non Gawat Darurat
                </td>
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420584] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Sedang
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">@{{ item.obj[420590] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Ringan Tanpa Tanda-Tanda Resiko Tinggi</td>
            </tr>
            <tr style="border:none;border-top:none solid #000;background-color:aquamarine;">
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420585] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Mual/Diare Tanpa Dehidrasi
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">@{{ item.obj[420591] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Riwayat Penyakit Risiko Rendah Sekarang Tidak Ada Keluhan</td>
            </tr>
            <tr style="border:none;border-top:none solid #000;background-color:aquamarine;">
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420586] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri Perut Non Spesifik
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">@{{ item.obj[420592] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Keluhan Ringan Penyakit</td>
            </tr>
            <tr style="border:none;border-top:none solid #000;background-color:aquamarine;">
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420587] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trauma Dada Tanpa Nyeri Iga dan Gangguan Pernafasan
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">@{{ item.obj[420593] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Luka Kecil/Lecet</td>
            </tr>
            <tr style="border:none;border-top:none solid #000;background-color:aquamarine;">
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420588] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sukar Menelan Tanpa Gangguan Pernafasan
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
            </tr>
            <tr style="border:none;border-top:none solid #000;background-color:aquamarine;">
                <td colspan="2"style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td style="border:none" colspan="2"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none">
                    @{{ item.obj[420589] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Masalah Kesehatan Mental yang Semi Mendesak, dalam Observasi/Tidak Ada Risiko Terhadap Diri Sendiri maupun Orang Lain
                </td>
                <td colspan="2" style="border:none solid #000;border-top:none;border-bottom:none"></td>
            </tr>
            <tr>
                <td colspan="12"></td>
            </tr>
            </tr style="text-align:center;">
                <td colspan="2">Kategori ATS</td>
                <td colspan="2">MAXIMUM WAKTU TUNGGU</td>
                <td colspan="2">KETERANGAN</td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Perawat TRIASE</td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Dokter TRIASE</td>
            </tr>
            <tr>
                <td>@{{ item.obj[420594] ? item.obj[420594] : '' }}</td>
                <td>SKALA 1</td>
                <td colspan="2">Segera</td>
                <td colspan="2">Rresuaitasi</td>
                <td colspan="3" rowspan="2" style="border:1px solid #000;border-top:none;border-bottom:none"><div id="qrcodep1" style="text-align: center"></div></td>
                <td colspan="3" rowspan="2" style="border:1px solid #000;border-top:none;border-bottom:none"><div id="qrcodep2" style="text-align: center"></div></td>
            </tr>
            <tr>
                <td>@{{ item.obj[420598] ? item.obj[420598] : '' }}</td>
                <td>SKALA 2</td>
                <td colspan="2">10 Menit</td>
                <td colspan="2">Emergency/Gawat Darurat</td>
            </tr>
            <tr>
                <td>@{{ item.obj[420602] ? item.obj[420602] : '' }}</td>
                <td>SKALA 3</td>
                <td colspan="2">30 Menit</td>
                <td colspan="2">Urgent/Darurat</td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">(@{{ item.obj[420614] ? item.obj[420614] : '..............................................................' }})
                </td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">(@{{ item.obj[420615] ? item.obj[420615] : '..............................................................' }})</td>
            </tr>
            <tr>
                <td>@{{ item.obj[420606] ? item.obj[420606] : '' }}</td>
                <td>SKALA 4</td>
                <td colspan="2">60 Menit</td>
                <td colspan="2">Semi Darurat</td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Nama dan Tanda tangan</td>
                <td colspan="3"style="border:1px solid #000;border-top:none;border-bottom:none;text-align:center;">Nama dan Tanda tangan</td>
            </tr>
            <tr>
                <td>@{{ item.obj[420610] ? item.obj[420610] : '' }}</td>
                <td>SKALA 5</td>
                <td colspan="2">120 Menit</td>
                <td colspan="2">Tidak Darurat</td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
                <td colspan="3" style="border:1px solid #000;border-top:none;border-bottom:none"></td>
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

    angular.controller('cetakLembarTriaseDewasa', function ($scope, $http, httpService) {
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

        var keluhan_utama = $scope.item.obj[420516].replace(/(?:\r\n|\r|\n)/g, ', ');

        $scope.item.obj['keluhan_utama'] = keluhan_utama;

        var p1 = $scope.item.obj[420614];
        var p2 = $scope.item.obj[420615];

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
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Perkembangan Pasien Terintegrasi Rawat Jalan</title>
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
            size:A4;
            width:210mm;
            height:279mm;
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
            width:210mm
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
            width:210mm;
            height:279mm;
            margin:0 auto;
            /* border:.1rem solid rgba(0,0,0,0.35); */
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
            font-size: x-small;
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
<body ng-controller="cetakCPPTRajal">
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
                <td rowspan="4" colspan="3" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="3" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                </td>
            </tr>
            <tr style="text-align:center">
                <td >TGL/JAM</td>
                <td>PROFESI</td>
                <td colspan="3" valign="top">
                    <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                </td>
                <td colspan="2" style="border:none;border-right:1px solid #000">
                    <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                    (Instruksi ditulis dgn rinci dan jelas)
                </td>
                <td colspan="2" style="border:none;border-right:1px solid #000">
                    <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                    (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                </td>
            </tr>
            {{-- 1 --}}
            <tr style="height:150px">
                <td>@{{item.obj[421650] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421651] ? item.obj[421651] : '' }}</td>
                <td colspan="3">@{{ item.obj[421652] ? item.obj[421652] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421653] ? item.obj[421653] : '' }}
                    <br>
                    <div id="qrcodep1" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421654] ? item.obj[421654] : '' }}</td>
                <td colspan="2">@{{ item.obj[421655] ? item.obj[421655] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421656] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421657] ? item.obj[421657] : '' }}
                    <br>
                    <div id="qrcoded1" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 2 --}} 
            <tr style="height:150px" ng-show="item.obj[421658]!=undefined">
                <td>@{{item.obj[421658] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421659] ? item.obj[421659] : '' }}</td>
                <td colspan="3">@{{ item.obj[421660] ? item.obj[421660] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421661] ? item.obj[421661] : '' }}
                    <br>
                    <div id="qrcodep2" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421662] ? item.obj[421662] : '' }}</td>
                <td colspan="2">@{{ item.obj[421663] ? item.obj[421663] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421664] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421665] ? item.obj[421665] : '' }}
                    <br>
                    <div id="qrcoded2" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 3 --}}
            <tr style="height:150px" ng-show="item.obj[421666]!=undefined">
                <td>@{{item.obj[421666] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421667] ? item.obj[421667] : '' }}</td>
                <td colspan="3">@{{ item.obj[421668] ? item.obj[421668] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421669] ? item.obj[421669] : '' }}
                    <br>
                    <div id="qrcodep3" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421670] ? item.obj[421670] : '' }}</td>
                <td colspan="2">@{{ item.obj[421671] ? item.obj[421671] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421672] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421673] ? item.obj[421673] : '' }}
                    <br>
                    <div id="qrcoded3" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 4 --}}
            <tr style="height:150px" ng-show="item.obj[421674]!=undefined">
                <td>@{{item.obj[421674] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421675] ? item.obj[421675] : '' }}</td>
                <td colspan="3">@{{ item.obj[421676] ? item.obj[421676] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421677] ? item.obj[421677] : '' }}
                    <br>
                    <div id="qrcodep4" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421678] ? item.obj[421678] : '' }}</td>
                <td colspan="2">@{{ item.obj[421679] ? item.obj[421679] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421680] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421681] ? item.obj[421681] : '' }}
                    <br>
                    <div id="qrcoded4" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 5 --}}
            <tr style="height:150px" ng-show="item.obj[421682]!=undefined">
                <td>@{{item.obj[421682] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421683] ? item.obj[421683] : '' }}</td>
                <td colspan="3">@{{ item.obj[421684] ? item.obj[421684] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421685] ? item.obj[421685] : '' }}
                    <br>
                    <div id="qrcodep5" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421686] ? item.obj[421686] : '' }}</td>
                <td colspan="2">@{{ item.obj[421687] ? item.obj[421687] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421688] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421689] ? item.obj[421689] : '' }}
                    <br>
                    <div id="qrcoded5" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 6 --}}
            <tr style="height:150px" ng-show="item.obj[421690]!=undefined">
                <td>@{{item.obj[421690] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421691] ? item.obj[421691] : '' }}</td>
                <td colspan="3">@{{ item.obj[421692] ? item.obj[421692] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421693] ? item.obj[421693] : '' }}
                    <br>
                    <div id="qrcodep6" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421694] ? item.obj[421694] : '' }}</td>
                <td colspan="2">@{{ item.obj[421695] ? item.obj[421695] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421696] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421697] ? item.obj[421697] : '' }}
                    <br>
                    <div id="qrcoded6" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 7 --}}
            <tr style="height:150px" ng-show="item.obj[421698]!=undefined">
                <td>@{{item.obj[421698] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421699] ? item.obj[421699] : '' }}</td>
                <td colspan="3">@{{ item.obj[421700] ? item.obj[421700] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421701] ? item.obj[421701] : '' }}
                    <br>
                    <div id="qrcodep7" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421702] ? item.obj[421702] : '' }}</td>
                <td colspan="2">@{{ item.obj[421703] ? item.obj[421703] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421704] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421705] ? item.obj[421705] : '' }}
                    <br>
                    <div id="qrcoded7" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 8 --}}
            <tr style="height:150px" ng-show="item.obj[421706]!=undefined">
                <td>@{{item.obj[421706] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421707] ? item.obj[421707] : '' }}</td>
                <td colspan="3">@{{ item.obj[421708] ? item.obj[421708] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421709] ? item.obj[421709] : '' }}
                    <br>
                    <div id="qrcodep8" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421710] ? item.obj[421710] : '' }}</td>
                <td colspan="2">@{{ item.obj[421711] ? item.obj[421711] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421712] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421713] ? item.obj[421713] : '' }}
                    <br>
                    <div id="qrcoded8" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 9 --}}
            <tr style="height:150px" ng-show="item.obj[421714]!=undefined">
                <td>@{{item.obj[421714] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421715] ? item.obj[421715] : '' }}</td>
                <td colspan="3">@{{ item.obj[421716] ? item.obj[421716] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421717] ? item.obj[421717] : '' }}
                    <br>
                    <div id="qrcodep9" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421718] ? item.obj[421718] : '' }}</td>
                <td colspan="2">@{{ item.obj[421719] ? item.obj[421719] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421720] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421721] ? item.obj[421721] : '' }}
                    <br>
                    <div id="qrcoded9" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 10 --}}
            <tr style="height:150px" ng-show="item.obj[421722]!=undefined">
                <td>@{{item.obj[421722] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421723] ? item.obj[421723] : '' }}</td>
                <td colspan="3">@{{ item.obj[421724] ? item.obj[421724] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421725] ? item.obj[421725] : '' }}
                    <br>
                    <div id="qrcodep10" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421726] ? item.obj[421726] : '' }}</td>
                <td colspan="2">@{{ item.obj[421727] ? item.obj[421727] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421728] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421729] ? item.obj[421729] : '' }}
                    <br>
                    <div id="qrcoded10" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 11 --}}
            <tr style="height:150px" ng-show="item.obj[421730]!=undefined">
                <td>@{{item.obj[421730] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421731] ? item.obj[421731] : '' }}</td>
                <td colspan="3">@{{ item.obj[421732] ? item.obj[421732] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421733] ? item.obj[421733] : '' }}
                    <br>
                    <div id="qrcodep11" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421734] ? item.obj[421734] : '' }}</td>
                <td colspan="2">@{{ item.obj[421735] ? item.obj[421735] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421736] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421737] ? item.obj[421737] : '' }}
                    <br>
                    <div id="qrcoded11" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 12 --}}
            <tr style="height:150px" ng-show="item.obj[421738]!=undefined">
                <td>@{{item.obj[421738] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421739] ? item.obj[421739] : '' }}</td>
                <td colspan="3">@{{ item.obj[421740] ? item.obj[421740] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421741] ? item.obj[421741] : '' }}
                    <br>
                    <div id="qrcodep12" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421742] ? item.obj[421742] : '' }}</td>
                <td colspan="2">@{{ item.obj[421744] ? item.obj[421744] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421744] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421745] ? item.obj[421745] : '' }}
                    <br>
                    <div id="qrcoded12" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 13 --}}
            <tr style="height:150px" ng-show="item.obj[421746]!=undefined">
                <td>@{{item.obj[421746] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421747] ? item.obj[421747] : '' }}</td>
                <td colspan="3">@{{ item.obj[421748] ? item.obj[421748] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421749] ? item.obj[421749] : '' }}
                    <br>
                    <div id="qrcodep13" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421750] ? item.obj[421750] : '' }}</td>
                <td colspan="2">@{{ item.obj[421751] ? item.obj[421751] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421752] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421753] ? item.obj[421753] : '' }}
                    <br>
                    <div id="qrcoded13" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 14 --}}
            <tr style="height:150px" ng-show="item.obj[421754]!=undefined">
                <td>@{{item.obj[421754] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421755] ? item.obj[421755] : '' }}</td>
                <td colspan="3">@{{ item.obj[421756] ? item.obj[421756] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421757] ? item.obj[421757] : '' }}
                    <br>
                    <div id="qrcoded14" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421758] ? item.obj[421758] : '' }}</td>
                <td colspan="2">@{{ item.obj[421759] ? item.obj[421759] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421760] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421761] ? item.obj[421761] : '' }}
                    <br>
                    <div id="qrcoded14" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 15 --}}
            <tr style="height:150px" ng-show="item.obj[421762]!=undefined">
                <td>@{{item.obj[421762] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421763] ? item.obj[421763] : '' }}</td>
                <td colspan="3">@{{ item.obj[421764] ? item.obj[421764] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421765] ? item.obj[421765] : '' }}
                    <br>
                    <div id="qrcodep15" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421766] ? item.obj[421766] : '' }}</td>
                <td colspan="2">@{{ item.obj[421767] ? item.obj[421767] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421768] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421769] ? item.obj[421769] : '' }}
                    <br>
                    <div id="qrcoded15" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 16 --}}
            <tr style="height:150px" ng-show="item.obj[421770]!=undefined">
                <td>@{{item.obj[421770] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421771] ? item.obj[421771] : '' }}</td>
                <td colspan="3">@{{ item.obj[421772] ? item.obj[421772] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421773] ? item.obj[421773] : '' }}
                    <br>
                    <div id="qrcodep16" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421774] ? item.obj[421774] : '' }}</td>
                <td colspan="2">@{{ item.obj[421775] ? item.obj[421775] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421776] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421777] ? item.obj[421777] : '' }}
                    <br>
                    <div id="qrcoded16" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 17 --}}
            <tr style="height:150px" ng-show="item.obj[421778]!=undefined">
                <td>@{{item.obj[421778] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421779] ? item.obj[421779] : '' }}</td>
                <td colspan="3">@{{ item.obj[421780] ? item.obj[421780] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421781] ? item.obj[421781] : '' }}
                    <br>
                    <div id="qrcodep17" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421782] ? item.obj[421782] : '' }}</td>
                <td colspan="2">@{{ item.obj[421783] ? item.obj[421783] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421784] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421785] ? item.obj[421785] : '' }}
                    <br>
                    <div id="qrcoded17" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 18 --}}
            <tr style="height:150px" ng-show="item.obj[421786]!=undefined">
                <td>@{{item.obj[421786] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421787] ? item.obj[421787] : '' }}</td>
                <td colspan="3">@{{ item.obj[421788] ? item.obj[421788] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421789] ? item.obj[421789] : '' }}
                    <br>
                    <div id="qrcodep18" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421790] ? item.obj[421790] : '' }}</td>
                <td colspan="2">@{{ item.obj[421791] ? item.obj[421791] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421792] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421793] ? item.obj[421793] : '' }}
                    <br>
                    <div id="qrcoded18" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 19 --}}
            <tr style="height:150px" ng-show="item.obj[421794]!=undefined">
                <td>@{{item.obj[421794] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421795] ? item.obj[421795] : '' }}</td>
                <td colspan="3">@{{ item.obj[421796] ? item.obj[421796] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421797] ? item.obj[421797] : '' }}
                    <br>
                    <div id="qrcodep19" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421798] ? item.obj[421798] : '' }}</td>
                <td colspan="2">@{{ item.obj[421799] ? item.obj[421799] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421800] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421801] ? item.obj[421801] : '' }}
                    <br>
                    <div id="qrcoded19" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 20 --}}
            <tr style="height:150px" ng-show="item.obj[421802]!=undefined">
                <td>@{{item.obj[421802] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421803] ? item.obj[421803] : '' }}</td>
                <td colspan="3">@{{ item.obj[421804] ? item.obj[421804] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421805] ? item.obj[421805] : '' }}
                    <br>
                    <div id="qrcodep20" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421806] ? item.obj[421806] : '' }}</td>
                <td colspan="2">@{{ item.obj[421807] ? item.obj[421807] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421808] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421809] ? item.obj[421809] : '' }}
                    <br>
                    <div id="qrcoded20" style="text-align: right"></div>
                </td>
            </tr>
            {{-- 21 --}}
            <tr style="height:150px" ng-show="item.obj[421810]!=undefined">
                <td>@{{item.obj[421810] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[421811] ? item.obj[421811] : '' }}</td>
                <td colspan="3">@{{ item.obj[421812] ? item.obj[421812] : '' }} <br><br> 
                    Paraf : @{{ item.obj[421813] ? item.obj[421813] : '' }}
                    <br>
                    <div id="qrcodep21" style="text-align: right"></div>
                </td>
                <td colspan="2">@{{ item.obj[421814] ? item.obj[421814] : '' }}</td>
                <td colspan="2">@{{ item.obj[421815] ? item.obj[421815] : '' }} <br><br> 
                    Tanggal : @{{item.obj[421816] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[421817] ? item.obj[421817] : '' }}
                    <br>
                    <div id="qrcoded21" style="text-align: right"></div>
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

    angular.controller('cetakCPPTRajal', function ($scope, $http, httpService) {
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

        // var diagnose_pasca_operatif = $scope.item.obj[31100543].replace(/(?:\r\n|\r|\n)/g, ', ');

        // $scope.item.obj['diagnose_pasca_operatif'] = diagnose_pasca_operatif;

        var p1 = $scope.item.obj[421653];
        var d1 = $scope.item.obj[421657];

        var p2 = $scope.item.obj[421661];
        var d2 = $scope.item.obj[421665];

        var p3 = $scope.item.obj[421669];
        var d3 = $scope.item.obj[421673];

        var p4 = $scope.item.obj[421677];
        var d4 = $scope.item.obj[421681];

        var p5 = $scope.item.obj[421685];
        var d5 = $scope.item.obj[421689];

        var p6 = $scope.item.obj[421693];
        var d6 = $scope.item.obj[421697];

        var p7 = $scope.item.obj[421701];
        var d7 = $scope.item.obj[421705];

        var p8 = $scope.item.obj[421709];
        var d8 = $scope.item.obj[421713];

        var p9 = $scope.item.obj[421717];
        var d9 = $scope.item.obj[421721];

        var p10 = $scope.item.obj[421725];
        var d10 = $scope.item.obj[421729];

        var p11 = $scope.item.obj[421733];
        var d11 = $scope.item.obj[421737];

        var p12 = $scope.item.obj[421741];
        var d12 = $scope.item.obj[421745];

        var p13 = $scope.item.obj[421749];
        var d13 = $scope.item.obj[421753];

        var p14 = $scope.item.obj[421757];
        var d14 = $scope.item.obj[421761];

        var p15 = $scope.item.obj[421765];
        var d15 = $scope.item.obj[421769];

        var p16 = $scope.item.obj[421773];
        var d16 = $scope.item.obj[421777];

        var p17 = $scope.item.obj[421781];
        var d17 = $scope.item.obj[421785];

        var p18 = $scope.item.obj[421789];
        var d18 = $scope.item.obj[421793];

        var p19 = $scope.item.obj[421797];
        var d19 = $scope.item.obj[421801];

        var p20 = $scope.item.obj[421805];
        var d20 = $scope.item.obj[421809];

        var p21 = $scope.item.obj[421813];
        var d21 = $scope.item.obj[421817];

        if (p1 != undefined) {
            jQuery('#qrcodep1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p1
            });	
        }
        
        if (d1 != undefined) {
            jQuery('#qrcoded1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d1
        });
        }

        if (p2 != undefined) {
            jQuery('#qrcodep2').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p2
            });	
        }
        
        if (d2 != undefined) {
            jQuery('#qrcoded2').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d2
        });
        }

        if (p3 != undefined) {
            jQuery('#qrcodep3').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p3
            });	
        }
        
        if (d3 != undefined) {
            jQuery('#qrcoded3').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d3
        });
        }

        if (p4 != undefined) {
            jQuery('#qrcodep4').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p4
            });	
        }
        
        if (d4 != undefined) {
            jQuery('#qrcoded4').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d4
        });
        }

        if (p5 != undefined) {
            jQuery('#qrcodep5').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p5
            });	
        }
        
        if (d5 != undefined) {
            jQuery('#qrcoded5').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d5
        });
        }

        if (p6 != undefined) {
            jQuery('#qrcodep6').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p6
            });	
        }
        
        if (d6 != undefined) {
            jQuery('#qrcoded6').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d6
        });
        }

        if (p7 != undefined) {
            jQuery('#qrcodep7').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p7
            });	
        }
        
        if (d7 != undefined) {
            jQuery('#qrcoded7').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d7
        });
        }

        if (p8 != undefined) {
            jQuery('#qrcodep8').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p8
            });	
        }
        
        if (d8 != undefined) {
            jQuery('#qrcoded8').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d8
        });
        }

        if (p9 != undefined) {
            jQuery('#qrcodep9').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p9
            });	
        }
        
        if (d9 != undefined) {
            jQuery('#qrcoded9').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d9
        });
        }

        if (p10 != undefined) {
            jQuery('#qrcodep10').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p10
            });	
        }
        
        if (d10 != undefined) {
            jQuery('#qrcoded10').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d10
        });
        }

        if (p11 != undefined) {
            jQuery('#qrcodep11').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p11
            });	
        }
        
        if (d11 != undefined) {
            jQuery('#qrcoded11').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d11
        });
        }

        if (p12 != undefined) {
            jQuery('#qrcodep12').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p12
            });	
        }
        
        if (d12 != undefined) {
            jQuery('#qrcoded12').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d12
        });
        }

        if (p13 != undefined) {
            jQuery('#qrcodep13').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p13
            });	
        }
        
        if (d13 != undefined) {
            jQuery('#qrcoded13').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d13
        });
        }

        if (p14 != undefined) {
            jQuery('#qrcodep14').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p14
            });	
        }
        
        if (d14 != undefined) {
            jQuery('#qrcoded14').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d14
        });
        }

        if (p15 != undefined) {
            jQuery('#qrcodep15').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p15
            });	
        }
        
        if (d15 != undefined) {
            jQuery('#qrcoded15').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d15
        });
        }

        if (p16 != undefined) {
            jQuery('#qrcodep16').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p16
            });	
        }
        
        if (d16 != undefined) {
            jQuery('#qrcoded16').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d16
        });
        }

        if (p17 != undefined) {
            jQuery('#qrcodep17').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p17
            });	
        }
        
        if (d17 != undefined) {
            jQuery('#qrcoded17').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d17
        });
        }

        if (p18 != undefined) {
            jQuery('#qrcodep18').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p18
            });	
        }
        
        if (d18 != undefined) {
            jQuery('#qrcoded18').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d18
        });
        }

        if (p19 != undefined) {
            jQuery('#qrcodep19').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p19
            });	
        }
        
        if (d19 != undefined) {
            jQuery('#qrcoded19').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d19
        });
        }

        if (p20 != undefined) {
            jQuery('#qrcodep20').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p20
            });	
        }
        
        if (d20 != undefined) {
            jQuery('#qrcoded20').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d20
        });
        }

        if (p21 != undefined) {
            jQuery('#qrcodep21').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p21
            });	
        }
        
        if (d21 != undefined) {
            jQuery('#qrcoded21').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d21
        });
        }
    })

    angular.filter('toDate', function() {
    return function(items) {
        return new Date(items);
        };
    });
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
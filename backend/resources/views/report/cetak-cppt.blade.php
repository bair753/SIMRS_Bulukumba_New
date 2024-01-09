<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Perkembangan Pasien Terintegrasi</title>
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
            width:210mm;
            page-break-after: always;
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
<body ng-controller="cetakCPPT">
    @if (!empty($res['d1']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obj[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423051] ? item.obj[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423052] ? item.obj[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423053] ? item.obj[423053] : '' }} 
                        <br>
                        <div id="qrcodep1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423054] ? item.obj[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423055] ? item.obj[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423057] ? item.obj[423057] : '' }}
                        <br>
                        <div id="qrcoded1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obj[423058]!=undefined">
                    <td>@{{item.obj[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423059] ? item.obj[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423060] ? item.obj[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423061] ? item.obj[423061] : '' }}
                        <br>
                        <div id="qrcodep2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423062] ? item.obj[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423063] ? item.obj[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423065] ? item.obj[423065] : '' }}
                        <br>
                        <div id="qrcoded2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obj[423066]!=undefined">
                    <td>@{{item.obj[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423067] ? item.obj[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423068] ? item.obj[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423069] ? item.obj[423069] : '' }}
                        <br>
                        <div id="qrcodep3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423070] ? item.obj[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423071] ? item.obj[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423073] ? item.obj[423073] : '' }}
                        <br>
                        <div id="qrcoded3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obj[423074]!=undefined">
                    <td>@{{item.obj[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423075] ? item.obj[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423076] ? item.obj[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423077] ? item.obj[423077] : '' }}
                        <br>
                        <div id="qrcodep4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423078] ? item.obj[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423079] ? item.obj[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423081] ? item.obj[423081] : '' }}
                        <br>
                        <div id="qrcoded4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obj[423082]!=undefined">
                    <td>@{{item.obj[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423083] ? item.obj[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423084] ? item.obj[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423085] ? item.obj[423085] : '' }}
                        <br>
                        <div id="qrcodep5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423086] ? item.obj[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423087] ? item.obj[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423089] ? item.obj[423089] : '' }}
                        <br>
                        <div id="qrcoded5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obj[423090]!=undefined">
                    <td>@{{item.obj[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423091] ? item.obj[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423092] ? item.obj[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423093] ? item.obj[423093] : '' }}
                        <br>
                        <div id="qrcodep6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423094] ? item.obj[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423095] ? item.obj[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423097] ? item.obj[423097] : '' }}
                        <br>
                        <div id="qrcoded6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obj[423098]!=undefined">
                    <td>@{{item.obj[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423099] ? item.obj[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423100] ? item.obj[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423101] ? item.obj[423101] : '' }}
                        <br>
                        <div id="qrcodep7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423102] ? item.obj[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423103] ? item.obj[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423105] ? item.obj[423105] : '' }}
                        <br>
                        <div id="qrcoded7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obj[423106]!=undefined">
                    <td>@{{item.obj[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423107] ? item.obj[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423108] ? item.obj[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423109] ? item.obj[423109] : '' }}
                        <br>
                        <div id="qrcodep8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423110] ? item.obj[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423111] ? item.obj[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423113] ? item.obj[423113] : '' }}
                        <br>
                        <div id="qrcoded8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obj[423114]!=undefined">
                    <td>@{{item.obj[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423115] ? item.obj[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423116] ? item.obj[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423117] ? item.obj[423117] : '' }}
                        <br>
                        <div id="qrcodep9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423118] ? item.obj[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423119] ? item.obj[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423121] ? item.obj[423121] : '' }}
                        <br>
                        <div id="qrcoded9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obj[423122]!=undefined">
                    <td>@{{item.obj[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423123] ? item.obj[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423124] ? item.obj[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423125] ? item.obj[423125] : '' }}
                        <br>
                        <div id="qrcodep10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423126] ? item.obj[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423127] ? item.obj[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423129] ? item.obj[423129] : '' }}
                        <br>
                        <div id="qrcoded10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obj[423130]!=undefined">
                    <td>@{{item.obj[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423131] ? item.obj[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423132] ? item.obj[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423133] ? item.obj[423133] : '' }}
                        <br>
                        <div id="qrcodep11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423134] ? item.obj[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423135] ? item.obj[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423137] ? item.obj[423137] : '' }}
                        <br>
                        <div id="qrcoded11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obj[423138]!=undefined">
                    <td>@{{item.obj[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423139] ? item.obj[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423140] ? item.obj[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423141] ? item.obj[423141] : '' }}
                        <br>
                        <div id="qrcodep12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423142] ? item.obj[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423143] ? item.obj[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423145] ? item.obj[423145] : '' }}
                        <br>
                        <div id="qrcoded12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obj[423146]!=undefined">
                    <td>@{{item.obj[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423147] ? item.obj[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423148] ? item.obj[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423149] ? item.obj[423149] : '' }}
                        <br>
                        <div id="qrcodep13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423150] ? item.obj[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423151] ? item.obj[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423153] ? item.obj[423153] : '' }}
                        <br>
                        <div id="qrcoded13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obj[423154]!=undefined">
                    <td>@{{item.obj[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423155] ? item.obj[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423156] ? item.obj[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423157] ? item.obj[423157] : '' }}
                        <br>
                        <div id="qrcodep14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423158] ? item.obj[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423159] ? item.obj[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423161] ? item.obj[423161] : '' }}
                        <br>
                        <div id="qrcoded14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obj[423162]!=undefined">
                    <td>@{{item.obj[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423163] ? item.obj[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423164] ? item.obj[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423165] ? item.obj[423165] : '' }}
                        <br>
                        <div id="qrcodep15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423166] ? item.obj[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423167] ? item.obj[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423169] ? item.obj[423169] : '' }}
                        <br>
                        <div id="qrcoded15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obj[423170]!=undefined">
                    <td>@{{item.obj[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423171] ? item.obj[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423172] ? item.obj[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423173] ? item.obj[423173] : '' }}
                        <br>
                        <div id="qrcodep16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423174] ? item.obj[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423175] ? item.obj[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423177] ? item.obj[423177] : '' }}
                        <br>
                        <div id="qrcoded16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obj[423178]!=undefined">
                    <td>@{{item.obj[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423179] ? item.obj[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423180] ? item.obj[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423181] ? item.obj[423181] : '' }}
                        <br>
                        <div id="qrcodep17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423182] ? item.obj[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423183] ? item.obj[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423185] ? item.obj[423185] : '' }}
                        <br>
                        <div id="qrcoded17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obj[423186]!=undefined">
                    <td>@{{item.obj[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423187] ? item.obj[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423188] ? item.obj[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423189] ? item.obj[423189] : '' }}
                        <br>
                        <div id="qrcodep18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423190] ? item.obj[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423191] ? item.obj[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423193] ? item.obj[423193] : '' }}
                        <br>
                        <div id="qrcoded18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obj[423194]!=undefined">
                    <td>@{{item.obj[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423195] ? item.obj[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423196] ? item.obj[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423197] ? item.obj[423197] : '' }}
                        <br>
                        <div id="qrcodep19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423198] ? item.obj[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423199] ? item.obj[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423201] ? item.obj[423201] : '' }}
                        <br>
                        <div id="qrcoded19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obj[423202]!=undefined">
                    <td>@{{item.obj[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423203] ? item.obj[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423204] ? item.obj[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423205] ? item.obj[423205] : '' }}
                        <br>
                        <div id="qrcodep20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423206] ? item.obj[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423207] ? item.obj[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423209] ? item.obj[423209] : '' }}
                        <br>
                        <div id="qrcoded20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obj[423210]!=undefined">
                    <td>@{{item.obj[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obj[423211] ? item.obj[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obj[423212] ? item.obj[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obj[423213] ? item.obj[423213] : '' }}
                        <br>
                        <div id="qrcodep21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obj[423214] ? item.obj[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obj[423215] ? item.obj[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obj[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obj[423217] ? item.obj[423217] : '' }}
                        <br>
                        <div id="qrcoded21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d2']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji2[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423051] ? item.obji2[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423052] ? item.obji2[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423053] ? item.obji2[423053] : '' }} 
                        <br>
                        <div id="qrcodep2t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423054] ? item.obji2[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423055] ? item.obji2[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423057] ? item.obji2[423057] : '' }}
                        <br>
                        <div id="qrcoded2t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji2[423058]!=undefined">
                    <td>@{{item.obji2[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423059] ? item.obji2[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423060] ? item.obji2[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423061] ? item.obji2[423061] : '' }}
                        <br>
                        <div id="qrcodep2t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423062] ? item.obji2[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423063] ? item.obji2[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423065] ? item.obji2[423065] : '' }}
                        <br>
                        <div id="qrcoded2t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji2[423066]!=undefined">
                    <td>@{{item.obji2[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423067] ? item.obji2[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423068] ? item.obji2[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423069] ? item.obji2[423069] : '' }}
                        <br>
                        <div id="qrcodep2t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423070] ? item.obji2[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423071] ? item.obji2[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423073] ? item.obji2[423073] : '' }}
                        <br>
                        <div id="qrcoded2t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji2[423074]!=undefined">
                    <td>@{{item.obji2[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423075] ? item.obji2[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423076] ? item.obji2[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423077] ? item.obji2[423077] : '' }}
                        <br>
                        <div id="qrcodep2t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423078] ? item.obji2[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423079] ? item.obji2[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423081] ? item.obji2[423081] : '' }}
                        <br>
                        <div id="qrcoded2t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji2[423082]!=undefined">
                    <td>@{{item.obji2[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423083] ? item.obji2[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423084] ? item.obji2[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423085] ? item.obji2[423085] : '' }}
                        <br>
                        <div id="qrcodep2t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423086] ? item.obji2[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423087] ? item.obji2[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423089] ? item.obji2[423089] : '' }}
                        <br>
                        <div id="qrcoded2t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji2[423090]!=undefined">
                    <td>@{{item.obji2[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423091] ? item.obji2[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423092] ? item.obji2[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423093] ? item.obji2[423093] : '' }}
                        <br>
                        <div id="qrcodep2t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423094] ? item.obji2[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423095] ? item.obji2[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423097] ? item.obji2[423097] : '' }}
                        <br>
                        <div id="qrcoded2t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji2[423098]!=undefined">
                    <td>@{{item.obji2[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423099] ? item.obji2[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423100] ? item.obji2[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423101] ? item.obji2[423101] : '' }}
                        <br>
                        <div id="qrcodep2t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423102] ? item.obji2[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423103] ? item.obji2[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423105] ? item.obji2[423105] : '' }}
                        <br>
                        <div id="qrcoded2t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji2[423106]!=undefined">
                    <td>@{{item.obji2[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423107] ? item.obji2[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423108] ? item.obji2[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423109] ? item.obji2[423109] : '' }}
                        <br>
                        <div id="qrcodep2t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423110] ? item.obji2[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423111] ? item.obji2[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423113] ? item.obji2[423113] : '' }}
                        <br>
                        <div id="qrcoded2t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji2[423114]!=undefined">
                    <td>@{{item.obji2[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423115] ? item.obji2[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423116] ? item.obji2[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423117] ? item.obji2[423117] : '' }}
                        <br>
                        <div id="qrcodep2t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423118] ? item.obji2[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423119] ? item.obji2[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423121] ? item.obji2[423121] : '' }}
                        <br>
                        <div id="qrcoded2t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji2[423122]!=undefined">
                    <td>@{{item.obji2[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423123] ? item.obji2[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423124] ? item.obji2[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423125] ? item.obji2[423125] : '' }}
                        <br>
                        <div id="qrcodep2t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423126] ? item.obji2[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423127] ? item.obji2[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423129] ? item.obji2[423129] : '' }}
                        <br>
                        <div id="qrcoded2t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji2[423130]!=undefined">
                    <td>@{{item.obji2[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423131] ? item.obji2[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423132] ? item.obji2[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423133] ? item.obji2[423133] : '' }}
                        <br>
                        <div id="qrcodep2t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423134] ? item.obji2[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423135] ? item.obji2[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423137] ? item.obji2[423137] : '' }}
                        <br>
                        <div id="qrcoded2t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji2[423138]!=undefined">
                    <td>@{{item.obji2[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423139] ? item.obji2[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423140] ? item.obji2[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423141] ? item.obji2[423141] : '' }}
                        <br>
                        <div id="qrcodep2t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423142] ? item.obji2[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423143] ? item.obji2[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423145] ? item.obji2[423145] : '' }}
                        <br>
                        <div id="qrcoded2t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji2[423146]!=undefined">
                    <td>@{{item.obji2[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423147] ? item.obji2[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423148] ? item.obji2[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423149] ? item.obji2[423149] : '' }}
                        <br>
                        <div id="qrcodep2t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423150] ? item.obji2[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423151] ? item.obji2[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423153] ? item.obji2[423153] : '' }}
                        <br>
                        <div id="qrcoded2t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji2[423154]!=undefined">
                    <td>@{{item.obji2[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423155] ? item.obji2[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423156] ? item.obji2[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423157] ? item.obji2[423157] : '' }}
                        <br>
                        <div id="qrcodep2t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423158] ? item.obji2[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423159] ? item.obji2[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423161] ? item.obji2[423161] : '' }}
                        <br>
                        <div id="qrcoded2t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji2[423162]!=undefined">
                    <td>@{{item.obji2[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423163] ? item.obji2[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423164] ? item.obji2[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423165] ? item.obji2[423165] : '' }}
                        <br>
                        <div id="qrcodep2t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423166] ? item.obji2[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423167] ? item.obji2[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423169] ? item.obji2[423169] : '' }}
                        <br>
                        <div id="qrcoded2t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji2[423170]!=undefined">
                    <td>@{{item.obji2[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423171] ? item.obji2[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423172] ? item.obji2[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423173] ? item.obji2[423173] : '' }}
                        <br>
                        <div id="qrcodep2t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423174] ? item.obji2[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423175] ? item.obji2[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423177] ? item.obji2[423177] : '' }}
                        <br>
                        <div id="qrcoded2t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji2[423178]!=undefined">
                    <td>@{{item.obji2[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423179] ? item.obji2[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423180] ? item.obji2[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423181] ? item.obji2[423181] : '' }}
                        <br>
                        <div id="qrcodep2t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423182] ? item.obji2[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423183] ? item.obji2[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423185] ? item.obji2[423185] : '' }}
                        <br>
                        <div id="qrcoded2t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji2[423186]!=undefined">
                    <td>@{{item.obji2[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423187] ? item.obji2[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423188] ? item.obji2[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423189] ? item.obji2[423189] : '' }}
                        <br>
                        <div id="qrcodep2t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423190] ? item.obji2[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423191] ? item.obji2[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423193] ? item.obji2[423193] : '' }}
                        <br>
                        <div id="qrcoded2t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji2[423194]!=undefined">
                    <td>@{{item.obji2[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423195] ? item.obji2[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423196] ? item.obji2[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423197] ? item.obji2[423197] : '' }}
                        <br>
                        <div id="qrcodep2t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423198] ? item.obji2[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423199] ? item.obji2[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423201] ? item.obji2[423201] : '' }}
                        <br>
                        <div id="qrcoded2t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji2[423202]!=undefined">
                    <td>@{{item.obji2[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423203] ? item.obji2[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423204] ? item.obji2[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423205] ? item.obji2[423205] : '' }}
                        <br>
                        <div id="qrcodep2t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423206] ? item.obji2[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423207] ? item.obji2[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423209] ? item.obji2[423209] : '' }}
                        <br>
                        <div id="qrcoded2t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji2[423210]!=undefined">
                    <td>@{{item.obji2[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji2[423211] ? item.obji2[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[423212] ? item.obji2[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji2[423213] ? item.obji2[423213] : '' }}
                        <br>
                        <div id="qrcodep2t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji2[423214] ? item.obji2[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[423215] ? item.obji2[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji2[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji2[423217] ? item.obji2[423217] : '' }}
                        <br>
                        <div id="qrcoded2t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d3']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji3[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423051] ? item.obji3[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423052] ? item.obji3[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423053] ? item.obji3[423053] : '' }} 
                        <br>
                        <div id="qrcodep3t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423054] ? item.obji3[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423055] ? item.obji3[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423057] ? item.obji3[423057] : '' }}
                        <br>
                        <div id="qrcoded3t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji3[423058]!=undefined">
                    <td>@{{item.obji3[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423059] ? item.obji3[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423060] ? item.obji3[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423061] ? item.obji3[423061] : '' }}
                        <br>
                        <div id="qrcodep3t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423062] ? item.obji3[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423063] ? item.obji3[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423065] ? item.obji3[423065] : '' }}
                        <br>
                        <div id="qrcoded3t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji3[423066]!=undefined">
                    <td>@{{item.obji3[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423067] ? item.obji3[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423068] ? item.obji3[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423069] ? item.obji3[423069] : '' }}
                        <br>
                        <div id="qrcodep3t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423070] ? item.obji3[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423071] ? item.obji3[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423073] ? item.obji3[423073] : '' }}
                        <br>
                        <div id="qrcoded3t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji3[423074]!=undefined">
                    <td>@{{item.obji3[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423075] ? item.obji3[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423076] ? item.obji3[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423077] ? item.obji3[423077] : '' }}
                        <br>
                        <div id="qrcodep3t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423078] ? item.obji3[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423079] ? item.obji3[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423081] ? item.obji3[423081] : '' }}
                        <br>
                        <div id="qrcoded3t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji3[423082]!=undefined">
                    <td>@{{item.obji3[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423083] ? item.obji3[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423084] ? item.obji3[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423085] ? item.obji3[423085] : '' }}
                        <br>
                        <div id="qrcodep3t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423086] ? item.obji3[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423087] ? item.obji3[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423089] ? item.obji3[423089] : '' }}
                        <br>
                        <div id="qrcoded3t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji3[423090]!=undefined">
                    <td>@{{item.obji3[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423091] ? item.obji3[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423092] ? item.obji3[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423093] ? item.obji3[423093] : '' }}
                        <br>
                        <div id="qrcodep3t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423094] ? item.obji3[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423095] ? item.obji3[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423097] ? item.obji3[423097] : '' }}
                        <br>
                        <div id="qrcoded3t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji3[423098]!=undefined">
                    <td>@{{item.obji3[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423099] ? item.obji3[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423100] ? item.obji3[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423101] ? item.obji3[423101] : '' }}
                        <br>
                        <div id="qrcodep3t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423102] ? item.obji3[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423103] ? item.obji3[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423105] ? item.obji3[423105] : '' }}
                        <br>
                        <div id="qrcoded3t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji3[423106]!=undefined">
                    <td>@{{item.obji3[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423107] ? item.obji3[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423108] ? item.obji3[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423109] ? item.obji3[423109] : '' }}
                        <br>
                        <div id="qrcodep3t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423110] ? item.obji3[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423111] ? item.obji3[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423113] ? item.obji3[423113] : '' }}
                        <br>
                        <div id="qrcoded3t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji3[423114]!=undefined">
                    <td>@{{item.obji3[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423115] ? item.obji3[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423116] ? item.obji3[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423117] ? item.obji3[423117] : '' }}
                        <br>
                        <div id="qrcodep3t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423118] ? item.obji3[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423119] ? item.obji3[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423121] ? item.obji3[423121] : '' }}
                        <br>
                        <div id="qrcoded3t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji3[423122]!=undefined">
                    <td>@{{item.obji3[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423123] ? item.obji3[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423124] ? item.obji3[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423125] ? item.obji3[423125] : '' }}
                        <br>
                        <div id="qrcodep3t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423126] ? item.obji3[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423127] ? item.obji3[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423129] ? item.obji3[423129] : '' }}
                        <br>
                        <div id="qrcoded3t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji3[423130]!=undefined">
                    <td>@{{item.obji3[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423131] ? item.obji3[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423132] ? item.obji3[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423133] ? item.obji3[423133] : '' }}
                        <br>
                        <div id="qrcodep3t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423134] ? item.obji3[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423135] ? item.obji3[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423137] ? item.obji3[423137] : '' }}
                        <br>
                        <div id="qrcoded3t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji3[423138]!=undefined">
                    <td>@{{item.obji3[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423139] ? item.obji3[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423140] ? item.obji3[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423141] ? item.obji3[423141] : '' }}
                        <br>
                        <div id="qrcodep3t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423142] ? item.obji3[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423143] ? item.obji3[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423145] ? item.obji3[423145] : '' }}
                        <br>
                        <div id="qrcoded3t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji3[423146]!=undefined">
                    <td>@{{item.obji3[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423147] ? item.obji3[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423148] ? item.obji3[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423149] ? item.obji3[423149] : '' }}
                        <br>
                        <div id="qrcodep3t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423150] ? item.obji3[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423151] ? item.obji3[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423153] ? item.obji3[423153] : '' }}
                        <br>
                        <div id="qrcoded3t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji3[423154]!=undefined">
                    <td>@{{item.obji3[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423155] ? item.obji3[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423156] ? item.obji3[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423157] ? item.obji3[423157] : '' }}
                        <br>
                        <div id="qrcodep3t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423158] ? item.obji3[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423159] ? item.obji3[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423161] ? item.obji3[423161] : '' }}
                        <br>
                        <div id="qrcoded3t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji3[423162]!=undefined">
                    <td>@{{item.obji3[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423163] ? item.obji3[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423164] ? item.obji3[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423165] ? item.obji3[423165] : '' }}
                        <br>
                        <div id="qrcodep3t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423166] ? item.obji3[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423167] ? item.obji3[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423169] ? item.obji3[423169] : '' }}
                        <br>
                        <div id="qrcoded3t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji3[423170]!=undefined">
                    <td>@{{item.obji3[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423171] ? item.obji3[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423172] ? item.obji3[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423173] ? item.obji3[423173] : '' }}
                        <br>
                        <div id="qrcodep3t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423174] ? item.obji3[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423175] ? item.obji3[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423177] ? item.obji3[423177] : '' }}
                        <br>
                        <div id="qrcoded3t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji3[423178]!=undefined">
                    <td>@{{item.obji3[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423179] ? item.obji3[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423180] ? item.obji3[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423181] ? item.obji3[423181] : '' }}
                        <br>
                        <div id="qrcodep3t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423182] ? item.obji3[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423183] ? item.obji3[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423185] ? item.obji3[423185] : '' }}
                        <br>
                        <div id="qrcoded3t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji3[423186]!=undefined">
                    <td>@{{item.obji3[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423187] ? item.obji3[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423188] ? item.obji3[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423189] ? item.obji3[423189] : '' }}
                        <br>
                        <div id="qrcodep3t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423190] ? item.obji3[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423191] ? item.obji3[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423193] ? item.obji3[423193] : '' }}
                        <br>
                        <div id="qrcoded3t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji3[423194]!=undefined">
                    <td>@{{item.obji3[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423195] ? item.obji3[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423196] ? item.obji3[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423197] ? item.obji3[423197] : '' }}
                        <br>
                        <div id="qrcodep3t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423198] ? item.obji3[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423199] ? item.obji3[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423201] ? item.obji3[423201] : '' }}
                        <br>
                        <div id="qrcoded3t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji3[423202]!=undefined">
                    <td>@{{item.obji3[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423203] ? item.obji3[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423204] ? item.obji3[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423205] ? item.obji3[423205] : '' }}
                        <br>
                        <div id="qrcodep3t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423206] ? item.obji3[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423207] ? item.obji3[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423209] ? item.obji3[423209] : '' }}
                        <br>
                        <div id="qrcoded3t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji3[423210]!=undefined">
                    <td>@{{item.obji3[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji3[423211] ? item.obji3[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[423212] ? item.obji3[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji3[423213] ? item.obji3[423213] : '' }}
                        <br>
                        <div id="qrcodep3t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji3[423214] ? item.obji3[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[423215] ? item.obji3[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji3[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji3[423217] ? item.obji3[423217] : '' }}
                        <br>
                        <div id="qrcoded3t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d4']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji4[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423051] ? item.obji4[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423052] ? item.obji4[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423053] ? item.obji4[423053] : '' }} 
                        <br>
                        <div id="qrcodep4t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423054] ? item.obji4[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423055] ? item.obji4[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423057] ? item.obji4[423057] : '' }}
                        <br>
                        <div id="qrcoded4t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji4[423058]!=undefined">
                    <td>@{{item.obji4[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423059] ? item.obji4[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423060] ? item.obji4[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423061] ? item.obji4[423061] : '' }}
                        <br>
                        <div id="qrcodep4t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423062] ? item.obji4[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423063] ? item.obji4[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423065] ? item.obji4[423065] : '' }}
                        <br>
                        <div id="qrcoded4t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji4[423066]!=undefined">
                    <td>@{{item.obji4[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423067] ? item.obji4[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423068] ? item.obji4[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423069] ? item.obji4[423069] : '' }}
                        <br>
                        <div id="qrcodep4t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423070] ? item.obji4[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423071] ? item.obji4[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423073] ? item.obji4[423073] : '' }}
                        <br>
                        <div id="qrcoded4t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji4[423074]!=undefined">
                    <td>@{{item.obji4[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423075] ? item.obji4[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423076] ? item.obji4[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423077] ? item.obji4[423077] : '' }}
                        <br>
                        <div id="qrcodep4t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423078] ? item.obji4[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423079] ? item.obji4[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423081] ? item.obji4[423081] : '' }}
                        <br>
                        <div id="qrcoded4t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji4[423082]!=undefined">
                    <td>@{{item.obji4[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423083] ? item.obji4[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423084] ? item.obji4[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423085] ? item.obji4[423085] : '' }}
                        <br>
                        <div id="qrcodep4t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423086] ? item.obji4[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423087] ? item.obji4[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423089] ? item.obji4[423089] : '' }}
                        <br>
                        <div id="qrcoded4t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji4[423090]!=undefined">
                    <td>@{{item.obji4[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423091] ? item.obji4[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423092] ? item.obji4[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423093] ? item.obji4[423093] : '' }}
                        <br>
                        <div id="qrcodep4t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423094] ? item.obji4[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423095] ? item.obji4[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423097] ? item.obji4[423097] : '' }}
                        <br>
                        <div id="qrcoded4t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji4[423098]!=undefined">
                    <td>@{{item.obji4[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423099] ? item.obji4[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423100] ? item.obji4[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423101] ? item.obji4[423101] : '' }}
                        <br>
                        <div id="qrcodep4t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423102] ? item.obji4[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423103] ? item.obji4[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423105] ? item.obji4[423105] : '' }}
                        <br>
                        <div id="qrcoded4t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji4[423106]!=undefined">
                    <td>@{{item.obji4[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423107] ? item.obji4[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423108] ? item.obji4[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423109] ? item.obji4[423109] : '' }}
                        <br>
                        <div id="qrcodep4t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423110] ? item.obji4[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423111] ? item.obji4[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423113] ? item.obji4[423113] : '' }}
                        <br>
                        <div id="qrcoded4t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji4[423114]!=undefined">
                    <td>@{{item.obji4[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423115] ? item.obji4[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423116] ? item.obji4[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423117] ? item.obji4[423117] : '' }}
                        <br>
                        <div id="qrcodep4t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423118] ? item.obji4[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423119] ? item.obji4[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423121] ? item.obji4[423121] : '' }}
                        <br>
                        <div id="qrcoded4t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji4[423122]!=undefined">
                    <td>@{{item.obji4[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423123] ? item.obji4[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423124] ? item.obji4[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423125] ? item.obji4[423125] : '' }}
                        <br>
                        <div id="qrcodep4t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423126] ? item.obji4[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423127] ? item.obji4[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423129] ? item.obji4[423129] : '' }}
                        <br>
                        <div id="qrcoded4t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji4[423130]!=undefined">
                    <td>@{{item.obji4[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423131] ? item.obji4[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423132] ? item.obji4[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423133] ? item.obji4[423133] : '' }}
                        <br>
                        <div id="qrcodep4t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423134] ? item.obji4[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423135] ? item.obji4[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423137] ? item.obji4[423137] : '' }}
                        <br>
                        <div id="qrcoded4t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji4[423138]!=undefined">
                    <td>@{{item.obji4[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423139] ? item.obji4[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423140] ? item.obji4[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423141] ? item.obji4[423141] : '' }}
                        <br>
                        <div id="qrcodep4t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423142] ? item.obji4[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423143] ? item.obji4[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423145] ? item.obji4[423145] : '' }}
                        <br>
                        <div id="qrcoded4t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji4[423146]!=undefined">
                    <td>@{{item.obji4[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423147] ? item.obji4[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423148] ? item.obji4[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423149] ? item.obji4[423149] : '' }}
                        <br>
                        <div id="qrcodep4t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423150] ? item.obji4[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423151] ? item.obji4[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423153] ? item.obji4[423153] : '' }}
                        <br>
                        <div id="qrcoded4t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji4[423154]!=undefined">
                    <td>@{{item.obji4[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423155] ? item.obji4[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423156] ? item.obji4[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423157] ? item.obji4[423157] : '' }}
                        <br>
                        <div id="qrcodep4t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423158] ? item.obji4[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423159] ? item.obji4[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423161] ? item.obji4[423161] : '' }}
                        <br>
                        <div id="qrcoded4t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji4[423162]!=undefined">
                    <td>@{{item.obji4[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423163] ? item.obji4[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423164] ? item.obji4[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423165] ? item.obji4[423165] : '' }}
                        <br>
                        <div id="qrcodep4t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423166] ? item.obji4[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423167] ? item.obji4[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423169] ? item.obji4[423169] : '' }}
                        <br>
                        <div id="qrcoded4t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji4[423170]!=undefined">
                    <td>@{{item.obji4[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423171] ? item.obji4[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423172] ? item.obji4[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423173] ? item.obji4[423173] : '' }}
                        <br>
                        <div id="qrcodep4t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423174] ? item.obji4[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423175] ? item.obji4[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423177] ? item.obji4[423177] : '' }}
                        <br>
                        <div id="qrcoded4t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji4[423178]!=undefined">
                    <td>@{{item.obji4[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423179] ? item.obji4[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423180] ? item.obji4[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423181] ? item.obji4[423181] : '' }}
                        <br>
                        <div id="qrcodep4t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423182] ? item.obji4[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423183] ? item.obji4[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423185] ? item.obji4[423185] : '' }}
                        <br>
                        <div id="qrcoded4t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji4[423186]!=undefined">
                    <td>@{{item.obji4[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423187] ? item.obji4[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423188] ? item.obji4[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423189] ? item.obji4[423189] : '' }}
                        <br>
                        <div id="qrcodep4t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423190] ? item.obji4[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423191] ? item.obji4[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423193] ? item.obji4[423193] : '' }}
                        <br>
                        <div id="qrcoded4t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji4[423194]!=undefined">
                    <td>@{{item.obji4[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423195] ? item.obji4[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423196] ? item.obji4[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423197] ? item.obji4[423197] : '' }}
                        <br>
                        <div id="qrcodep4t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423198] ? item.obji4[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423199] ? item.obji4[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423201] ? item.obji4[423201] : '' }}
                        <br>
                        <div id="qrcoded4t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji4[423202]!=undefined">
                    <td>@{{item.obji4[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423203] ? item.obji4[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423204] ? item.obji4[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423205] ? item.obji4[423205] : '' }}
                        <br>
                        <div id="qrcodep4t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423206] ? item.obji4[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423207] ? item.obji4[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423209] ? item.obji4[423209] : '' }}
                        <br>
                        <div id="qrcoded4t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji4[423210]!=undefined">
                    <td>@{{item.obji4[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji4[423211] ? item.obji4[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[423212] ? item.obji4[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji4[423213] ? item.obji4[423213] : '' }}
                        <br>
                        <div id="qrcodep4t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji4[423214] ? item.obji4[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[423215] ? item.obji4[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji4[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji4[423217] ? item.obji4[423217] : '' }}
                        <br>
                        <div id="qrcoded4t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d5']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji5[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423051] ? item.obji5[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423052] ? item.obji5[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423053] ? item.obji5[423053] : '' }} 
                        <br>
                        <div id="qrcodep5t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423054] ? item.obji5[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423055] ? item.obji5[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423057] ? item.obji5[423057] : '' }}
                        <br>
                        <div id="qrcoded5t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji5[423058]!=undefined">
                    <td>@{{item.obji5[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423059] ? item.obji5[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423060] ? item.obji5[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423061] ? item.obji5[423061] : '' }}
                        <br>
                        <div id="qrcodep5t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423062] ? item.obji5[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423063] ? item.obji5[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423065] ? item.obji5[423065] : '' }}
                        <br>
                        <div id="qrcoded5t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji5[423066]!=undefined">
                    <td>@{{item.obji5[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423067] ? item.obji5[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423068] ? item.obji5[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423069] ? item.obji5[423069] : '' }}
                        <br>
                        <div id="qrcodep5t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423070] ? item.obji5[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423071] ? item.obji5[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423073] ? item.obji5[423073] : '' }}
                        <br>
                        <div id="qrcoded5t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji5[423074]!=undefined">
                    <td>@{{item.obji5[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423075] ? item.obji5[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423076] ? item.obji5[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423077] ? item.obji5[423077] : '' }}
                        <br>
                        <div id="qrcodep5t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423078] ? item.obji5[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423079] ? item.obji5[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423081] ? item.obji5[423081] : '' }}
                        <br>
                        <div id="qrcoded5t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji5[423082]!=undefined">
                    <td>@{{item.obji5[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423083] ? item.obji5[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423084] ? item.obji5[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423085] ? item.obji5[423085] : '' }}
                        <br>
                        <div id="qrcodep5t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423086] ? item.obji5[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423087] ? item.obji5[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423089] ? item.obji5[423089] : '' }}
                        <br>
                        <div id="qrcoded5t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji5[423090]!=undefined">
                    <td>@{{item.obji5[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423091] ? item.obji5[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423092] ? item.obji5[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423093] ? item.obji5[423093] : '' }}
                        <br>
                        <div id="qrcodep5t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423094] ? item.obji5[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423095] ? item.obji5[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423097] ? item.obji5[423097] : '' }}
                        <br>
                        <div id="qrcoded5t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji5[423098]!=undefined">
                    <td>@{{item.obji5[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423099] ? item.obji5[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423100] ? item.obji5[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423101] ? item.obji5[423101] : '' }}
                        <br>
                        <div id="qrcodep5t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423102] ? item.obji5[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423103] ? item.obji5[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423105] ? item.obji5[423105] : '' }}
                        <br>
                        <div id="qrcoded5t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji5[423106]!=undefined">
                    <td>@{{item.obji5[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423107] ? item.obji5[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423108] ? item.obji5[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423109] ? item.obji5[423109] : '' }}
                        <br>
                        <div id="qrcodep5t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423110] ? item.obji5[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423111] ? item.obji5[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423113] ? item.obji5[423113] : '' }}
                        <br>
                        <div id="qrcoded5t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji5[423114]!=undefined">
                    <td>@{{item.obji5[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423115] ? item.obji5[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423116] ? item.obji5[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423117] ? item.obji5[423117] : '' }}
                        <br>
                        <div id="qrcodep5t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423118] ? item.obji5[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423119] ? item.obji5[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423121] ? item.obji5[423121] : '' }}
                        <br>
                        <div id="qrcoded5t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji5[423122]!=undefined">
                    <td>@{{item.obji5[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423123] ? item.obji5[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423124] ? item.obji5[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423125] ? item.obji5[423125] : '' }}
                        <br>
                        <div id="qrcodep5t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423126] ? item.obji5[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423127] ? item.obji5[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423129] ? item.obji5[423129] : '' }}
                        <br>
                        <div id="qrcoded5t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji5[423130]!=undefined">
                    <td>@{{item.obji5[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423131] ? item.obji5[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423132] ? item.obji5[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423133] ? item.obji5[423133] : '' }}
                        <br>
                        <div id="qrcodep5t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423134] ? item.obji5[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423135] ? item.obji5[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423137] ? item.obji5[423137] : '' }}
                        <br>
                        <div id="qrcoded5t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji5[423138]!=undefined">
                    <td>@{{item.obji5[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423139] ? item.obji5[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423140] ? item.obji5[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423141] ? item.obji5[423141] : '' }}
                        <br>
                        <div id="qrcodep5t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423142] ? item.obji5[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423143] ? item.obji5[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423145] ? item.obji5[423145] : '' }}
                        <br>
                        <div id="qrcoded5t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji5[423146]!=undefined">
                    <td>@{{item.obji5[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423147] ? item.obji5[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423148] ? item.obji5[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423149] ? item.obji5[423149] : '' }}
                        <br>
                        <div id="qrcodep5t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423150] ? item.obji5[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423151] ? item.obji5[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423153] ? item.obji5[423153] : '' }}
                        <br>
                        <div id="qrcoded5t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji5[423154]!=undefined">
                    <td>@{{item.obji5[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423155] ? item.obji5[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423156] ? item.obji5[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423157] ? item.obji5[423157] : '' }}
                        <br>
                        <div id="qrcodep5t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423158] ? item.obji5[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423159] ? item.obji5[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423161] ? item.obji5[423161] : '' }}
                        <br>
                        <div id="qrcoded5t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji5[423162]!=undefined">
                    <td>@{{item.obji5[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423163] ? item.obji5[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423164] ? item.obji5[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423165] ? item.obji5[423165] : '' }}
                        <br>
                        <div id="qrcodep5t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423166] ? item.obji5[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423167] ? item.obji5[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423169] ? item.obji5[423169] : '' }}
                        <br>
                        <div id="qrcoded5t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji5[423170]!=undefined">
                    <td>@{{item.obji5[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423171] ? item.obji5[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423172] ? item.obji5[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423173] ? item.obji5[423173] : '' }}
                        <br>
                        <div id="qrcodep5t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423174] ? item.obji5[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423175] ? item.obji5[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423177] ? item.obji5[423177] : '' }}
                        <br>
                        <div id="qrcoded5t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji5[423178]!=undefined">
                    <td>@{{item.obji5[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423179] ? item.obji5[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423180] ? item.obji5[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423181] ? item.obji5[423181] : '' }}
                        <br>
                        <div id="qrcodep5t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423182] ? item.obji5[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423183] ? item.obji5[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423185] ? item.obji5[423185] : '' }}
                        <br>
                        <div id="qrcoded5t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji5[423186]!=undefined">
                    <td>@{{item.obji5[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423187] ? item.obji5[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423188] ? item.obji5[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423189] ? item.obji5[423189] : '' }}
                        <br>
                        <div id="qrcodep5t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423190] ? item.obji5[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423191] ? item.obji5[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423193] ? item.obji5[423193] : '' }}
                        <br>
                        <div id="qrcoded5t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji5[423194]!=undefined">
                    <td>@{{item.obji5[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423195] ? item.obji5[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423196] ? item.obji5[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423197] ? item.obji5[423197] : '' }}
                        <br>
                        <div id="qrcodep5t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423198] ? item.obji5[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423199] ? item.obji5[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423201] ? item.obji5[423201] : '' }}
                        <br>
                        <div id="qrcoded5t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji5[423202]!=undefined">
                    <td>@{{item.obji5[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423203] ? item.obji5[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423204] ? item.obji5[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423205] ? item.obji5[423205] : '' }}
                        <br>
                        <div id="qrcodep5t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423206] ? item.obji5[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423207] ? item.obji5[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423209] ? item.obji5[423209] : '' }}
                        <br>
                        <div id="qrcoded5t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji5[423210]!=undefined">
                    <td>@{{item.obji5[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji5[423211] ? item.obji5[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[423212] ? item.obji5[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji5[423213] ? item.obji5[423213] : '' }}
                        <br>
                        <div id="qrcodep5t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji5[423214] ? item.obji5[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[423215] ? item.obji5[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji5[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji5[423217] ? item.obji5[423217] : '' }}
                        <br>
                        <div id="qrcoded5t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d6']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji6[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423051] ? item.obji6[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423052] ? item.obji6[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423053] ? item.obji6[423053] : '' }} 
                        <br>
                        <div id="qrcodep6t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423054] ? item.obji6[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423055] ? item.obji6[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423057] ? item.obji6[423057] : '' }}
                        <br>
                        <div id="qrcoded6t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji6[423058]!=undefined">
                    <td>@{{item.obji6[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423059] ? item.obji6[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423060] ? item.obji6[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423061] ? item.obji6[423061] : '' }}
                        <br>
                        <div id="qrcodep6t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423062] ? item.obji6[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423063] ? item.obji6[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423065] ? item.obji6[423065] : '' }}
                        <br>
                        <div id="qrcoded6t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji6[423066]!=undefined">
                    <td>@{{item.obji6[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423067] ? item.obji6[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423068] ? item.obji6[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423069] ? item.obji6[423069] : '' }}
                        <br>
                        <div id="qrcodep6t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423070] ? item.obji6[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423071] ? item.obji6[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423073] ? item.obji6[423073] : '' }}
                        <br>
                        <div id="qrcoded6t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji6[423074]!=undefined">
                    <td>@{{item.obji6[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423075] ? item.obji6[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423076] ? item.obji6[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423077] ? item.obji6[423077] : '' }}
                        <br>
                        <div id="qrcodep6t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423078] ? item.obji6[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423079] ? item.obji6[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423081] ? item.obji6[423081] : '' }}
                        <br>
                        <div id="qrcoded6t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji6[423082]!=undefined">
                    <td>@{{item.obji6[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423083] ? item.obji6[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423084] ? item.obji6[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423085] ? item.obji6[423085] : '' }}
                        <br>
                        <div id="qrcodep6t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423086] ? item.obji6[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423087] ? item.obji6[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423089] ? item.obji6[423089] : '' }}
                        <br>
                        <div id="qrcoded6t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji6[423090]!=undefined">
                    <td>@{{item.obji6[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423091] ? item.obji6[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423092] ? item.obji6[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423093] ? item.obji6[423093] : '' }}
                        <br>
                        <div id="qrcodep6t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423094] ? item.obji6[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423095] ? item.obji6[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423097] ? item.obji6[423097] : '' }}
                        <br>
                        <div id="qrcoded6t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji6[423098]!=undefined">
                    <td>@{{item.obji6[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423099] ? item.obji6[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423100] ? item.obji6[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423101] ? item.obji6[423101] : '' }}
                        <br>
                        <div id="qrcodep6t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423102] ? item.obji6[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423103] ? item.obji6[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423105] ? item.obji6[423105] : '' }}
                        <br>
                        <div id="qrcoded6t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji6[423106]!=undefined">
                    <td>@{{item.obji6[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423107] ? item.obji6[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423108] ? item.obji6[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423109] ? item.obji6[423109] : '' }}
                        <br>
                        <div id="qrcodep6t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423110] ? item.obji6[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423111] ? item.obji6[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423113] ? item.obji6[423113] : '' }}
                        <br>
                        <div id="qrcoded6t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji6[423114]!=undefined">
                    <td>@{{item.obji6[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423115] ? item.obji6[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423116] ? item.obji6[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423117] ? item.obji6[423117] : '' }}
                        <br>
                        <div id="qrcodep6t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423118] ? item.obji6[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423119] ? item.obji6[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423121] ? item.obji6[423121] : '' }}
                        <br>
                        <div id="qrcoded6t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji6[423122]!=undefined">
                    <td>@{{item.obji6[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423123] ? item.obji6[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423124] ? item.obji6[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423125] ? item.obji6[423125] : '' }}
                        <br>
                        <div id="qrcodep6t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423126] ? item.obji6[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423127] ? item.obji6[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423129] ? item.obji6[423129] : '' }}
                        <br>
                        <div id="qrcoded6t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji6[423130]!=undefined">
                    <td>@{{item.obji6[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423131] ? item.obji6[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423132] ? item.obji6[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423133] ? item.obji6[423133] : '' }}
                        <br>
                        <div id="qrcodep6t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423134] ? item.obji6[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423135] ? item.obji6[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423137] ? item.obji6[423137] : '' }}
                        <br>
                        <div id="qrcoded6t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji6[423138]!=undefined">
                    <td>@{{item.obji6[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423139] ? item.obji6[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423140] ? item.obji6[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423141] ? item.obji6[423141] : '' }}
                        <br>
                        <div id="qrcodep6t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423142] ? item.obji6[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423143] ? item.obji6[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423145] ? item.obji6[423145] : '' }}
                        <br>
                        <div id="qrcoded6t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji6[423146]!=undefined">
                    <td>@{{item.obji6[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423147] ? item.obji6[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423148] ? item.obji6[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423149] ? item.obji6[423149] : '' }}
                        <br>
                        <div id="qrcodep6t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423150] ? item.obji6[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423151] ? item.obji6[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423153] ? item.obji6[423153] : '' }}
                        <br>
                        <div id="qrcoded6t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji6[423154]!=undefined">
                    <td>@{{item.obji6[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423155] ? item.obji6[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423156] ? item.obji6[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423157] ? item.obji6[423157] : '' }}
                        <br>
                        <div id="qrcodep6t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423158] ? item.obji6[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423159] ? item.obji6[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423161] ? item.obji6[423161] : '' }}
                        <br>
                        <div id="qrcoded6t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji6[423162]!=undefined">
                    <td>@{{item.obji6[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423163] ? item.obji6[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423164] ? item.obji6[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423165] ? item.obji6[423165] : '' }}
                        <br>
                        <div id="qrcodep6t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423166] ? item.obji6[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423167] ? item.obji6[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423169] ? item.obji6[423169] : '' }}
                        <br>
                        <div id="qrcoded6t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji6[423170]!=undefined">
                    <td>@{{item.obji6[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423171] ? item.obji6[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423172] ? item.obji6[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423173] ? item.obji6[423173] : '' }}
                        <br>
                        <div id="qrcodep6t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423174] ? item.obji6[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423175] ? item.obji6[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423177] ? item.obji6[423177] : '' }}
                        <br>
                        <div id="qrcoded6t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji6[423178]!=undefined">
                    <td>@{{item.obji6[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423179] ? item.obji6[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423180] ? item.obji6[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423181] ? item.obji6[423181] : '' }}
                        <br>
                        <div id="qrcodep6t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423182] ? item.obji6[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423183] ? item.obji6[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423185] ? item.obji6[423185] : '' }}
                        <br>
                        <div id="qrcoded6t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji6[423186]!=undefined">
                    <td>@{{item.obji6[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423187] ? item.obji6[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423188] ? item.obji6[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423189] ? item.obji6[423189] : '' }}
                        <br>
                        <div id="qrcodep6t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423190] ? item.obji6[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423191] ? item.obji6[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423193] ? item.obji6[423193] : '' }}
                        <br>
                        <div id="qrcoded6t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji6[423194]!=undefined">
                    <td>@{{item.obji6[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423195] ? item.obji6[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423196] ? item.obji6[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423197] ? item.obji6[423197] : '' }}
                        <br>
                        <div id="qrcodep6t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423198] ? item.obji6[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423199] ? item.obji6[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423201] ? item.obji6[423201] : '' }}
                        <br>
                        <div id="qrcoded6t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji6[423202]!=undefined">
                    <td>@{{item.obji6[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423203] ? item.obji6[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423204] ? item.obji6[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423205] ? item.obji6[423205] : '' }}
                        <br>
                        <div id="qrcodep6t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423206] ? item.obji6[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423207] ? item.obji6[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423209] ? item.obji6[423209] : '' }}
                        <br>
                        <div id="qrcoded6t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji6[423210]!=undefined">
                    <td>@{{item.obji6[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji6[423211] ? item.obji6[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[423212] ? item.obji6[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji6[423213] ? item.obji6[423213] : '' }}
                        <br>
                        <div id="qrcodep6t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji6[423214] ? item.obji6[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[423215] ? item.obji6[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji6[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji6[423217] ? item.obji6[423217] : '' }}
                        <br>
                        <div id="qrcoded6t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d7']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji7[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423051] ? item.obji7[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423052] ? item.obji7[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423053] ? item.obji7[423053] : '' }} 
                        <br>
                        <div id="qrcodep7t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423054] ? item.obji7[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423055] ? item.obji7[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423057] ? item.obji7[423057] : '' }}
                        <br>
                        <div id="qrcoded7t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji7[423058]!=undefined">
                    <td>@{{item.obji7[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423059] ? item.obji7[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423060] ? item.obji7[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423061] ? item.obji7[423061] : '' }}
                        <br>
                        <div id="qrcodep7t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423062] ? item.obji7[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423063] ? item.obji7[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423065] ? item.obji7[423065] : '' }}
                        <br>
                        <div id="qrcoded7t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji7[423066]!=undefined">
                    <td>@{{item.obji7[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423067] ? item.obji7[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423068] ? item.obji7[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423069] ? item.obji7[423069] : '' }}
                        <br>
                        <div id="qrcodep7t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423070] ? item.obji7[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423071] ? item.obji7[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423073] ? item.obji7[423073] : '' }}
                        <br>
                        <div id="qrcoded7t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji7[423074]!=undefined">
                    <td>@{{item.obji7[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423075] ? item.obji7[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423076] ? item.obji7[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423077] ? item.obji7[423077] : '' }}
                        <br>
                        <div id="qrcodep7t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423078] ? item.obji7[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423079] ? item.obji7[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423081] ? item.obji7[423081] : '' }}
                        <br>
                        <div id="qrcoded7t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji7[423082]!=undefined">
                    <td>@{{item.obji7[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423083] ? item.obji7[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423084] ? item.obji7[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423085] ? item.obji7[423085] : '' }}
                        <br>
                        <div id="qrcodep7t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423086] ? item.obji7[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423087] ? item.obji7[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423089] ? item.obji7[423089] : '' }}
                        <br>
                        <div id="qrcoded7t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji7[423090]!=undefined">
                    <td>@{{item.obji7[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423091] ? item.obji7[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423092] ? item.obji7[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423093] ? item.obji7[423093] : '' }}
                        <br>
                        <div id="qrcodep7t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423094] ? item.obji7[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423095] ? item.obji7[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423097] ? item.obji7[423097] : '' }}
                        <br>
                        <div id="qrcoded7t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji7[423098]!=undefined">
                    <td>@{{item.obji7[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423099] ? item.obji7[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423100] ? item.obji7[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423101] ? item.obji7[423101] : '' }}
                        <br>
                        <div id="qrcodep7t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423102] ? item.obji7[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423103] ? item.obji7[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423105] ? item.obji7[423105] : '' }}
                        <br>
                        <div id="qrcoded7t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji7[423106]!=undefined">
                    <td>@{{item.obji7[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423107] ? item.obji7[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423108] ? item.obji7[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423109] ? item.obji7[423109] : '' }}
                        <br>
                        <div id="qrcodep7t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423110] ? item.obji7[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423111] ? item.obji7[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423113] ? item.obji7[423113] : '' }}
                        <br>
                        <div id="qrcoded7t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji7[423114]!=undefined">
                    <td>@{{item.obji7[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423115] ? item.obji7[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423116] ? item.obji7[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423117] ? item.obji7[423117] : '' }}
                        <br>
                        <div id="qrcodep7t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423118] ? item.obji7[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423119] ? item.obji7[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423121] ? item.obji7[423121] : '' }}
                        <br>
                        <div id="qrcoded7t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji7[423122]!=undefined">
                    <td>@{{item.obji7[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423123] ? item.obji7[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423124] ? item.obji7[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423125] ? item.obji7[423125] : '' }}
                        <br>
                        <div id="qrcodep7t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423126] ? item.obji7[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423127] ? item.obji7[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423129] ? item.obji7[423129] : '' }}
                        <br>
                        <div id="qrcoded7t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji7[423130]!=undefined">
                    <td>@{{item.obji7[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423131] ? item.obji7[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423132] ? item.obji7[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423133] ? item.obji7[423133] : '' }}
                        <br>
                        <div id="qrcodep7t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423134] ? item.obji7[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423135] ? item.obji7[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423137] ? item.obji7[423137] : '' }}
                        <br>
                        <div id="qrcoded7t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji7[423138]!=undefined">
                    <td>@{{item.obji7[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423139] ? item.obji7[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423140] ? item.obji7[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423141] ? item.obji7[423141] : '' }}
                        <br>
                        <div id="qrcodep7t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423142] ? item.obji7[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423143] ? item.obji7[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423145] ? item.obji7[423145] : '' }}
                        <br>
                        <div id="qrcoded7t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji7[423146]!=undefined">
                    <td>@{{item.obji7[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423147] ? item.obji7[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423148] ? item.obji7[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423149] ? item.obji7[423149] : '' }}
                        <br>
                        <div id="qrcodep7t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423150] ? item.obji7[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423151] ? item.obji7[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423153] ? item.obji7[423153] : '' }}
                        <br>
                        <div id="qrcoded7t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji7[423154]!=undefined">
                    <td>@{{item.obji7[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423155] ? item.obji7[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423156] ? item.obji7[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423157] ? item.obji7[423157] : '' }}
                        <br>
                        <div id="qrcodep7t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423158] ? item.obji7[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423159] ? item.obji7[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423161] ? item.obji7[423161] : '' }}
                        <br>
                        <div id="qrcoded7t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji7[423162]!=undefined">
                    <td>@{{item.obji7[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423163] ? item.obji7[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423164] ? item.obji7[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423165] ? item.obji7[423165] : '' }}
                        <br>
                        <div id="qrcodep7t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423166] ? item.obji7[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423167] ? item.obji7[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423169] ? item.obji7[423169] : '' }}
                        <br>
                        <div id="qrcoded7t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji7[423170]!=undefined">
                    <td>@{{item.obji7[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423171] ? item.obji7[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423172] ? item.obji7[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423173] ? item.obji7[423173] : '' }}
                        <br>
                        <div id="qrcodep7t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423174] ? item.obji7[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423175] ? item.obji7[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423177] ? item.obji7[423177] : '' }}
                        <br>
                        <div id="qrcoded7t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji7[423178]!=undefined">
                    <td>@{{item.obji7[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423179] ? item.obji7[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423180] ? item.obji7[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423181] ? item.obji7[423181] : '' }}
                        <br>
                        <div id="qrcodep7t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423182] ? item.obji7[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423183] ? item.obji7[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423185] ? item.obji7[423185] : '' }}
                        <br>
                        <div id="qrcoded7t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji7[423186]!=undefined">
                    <td>@{{item.obji7[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423187] ? item.obji7[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423188] ? item.obji7[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423189] ? item.obji7[423189] : '' }}
                        <br>
                        <div id="qrcodep7t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423190] ? item.obji7[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423191] ? item.obji7[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423193] ? item.obji7[423193] : '' }}
                        <br>
                        <div id="qrcoded7t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji7[423194]!=undefined">
                    <td>@{{item.obji7[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423195] ? item.obji7[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423196] ? item.obji7[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423197] ? item.obji7[423197] : '' }}
                        <br>
                        <div id="qrcodep7t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423198] ? item.obji7[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423199] ? item.obji7[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423201] ? item.obji7[423201] : '' }}
                        <br>
                        <div id="qrcoded7t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji7[423202]!=undefined">
                    <td>@{{item.obji7[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423203] ? item.obji7[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423204] ? item.obji7[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423205] ? item.obji7[423205] : '' }}
                        <br>
                        <div id="qrcodep7t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423206] ? item.obji7[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423207] ? item.obji7[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423209] ? item.obji7[423209] : '' }}
                        <br>
                        <div id="qrcoded7t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji7[423210]!=undefined">
                    <td>@{{item.obji7[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji7[423211] ? item.obji7[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[423212] ? item.obji7[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji7[423213] ? item.obji7[423213] : '' }}
                        <br>
                        <div id="qrcodep7t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji7[423214] ? item.obji7[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[423215] ? item.obji7[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji7[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji7[423217] ? item.obji7[423217] : '' }}
                        <br>
                        <div id="qrcoded7t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d8']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji8[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423051] ? item.obji8[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423052] ? item.obji8[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423053] ? item.obji8[423053] : '' }} 
                        <br>
                        <div id="qrcodep8t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423054] ? item.obji8[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423055] ? item.obji8[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423057] ? item.obji8[423057] : '' }}
                        <br>
                        <div id="qrcoded8t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji8[423058]!=undefined">
                    <td>@{{item.obji8[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423059] ? item.obji8[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423060] ? item.obji8[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423061] ? item.obji8[423061] : '' }}
                        <br>
                        <div id="qrcodep8t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423062] ? item.obji8[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423063] ? item.obji8[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423065] ? item.obji8[423065] : '' }}
                        <br>
                        <div id="qrcoded8t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji8[423066]!=undefined">
                    <td>@{{item.obji8[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423067] ? item.obji8[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423068] ? item.obji8[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423069] ? item.obji8[423069] : '' }}
                        <br>
                        <div id="qrcodep8t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423070] ? item.obji8[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423071] ? item.obji8[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423073] ? item.obji8[423073] : '' }}
                        <br>
                        <div id="qrcoded8t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji8[423074]!=undefined">
                    <td>@{{item.obji8[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423075] ? item.obji8[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423076] ? item.obji8[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423077] ? item.obji8[423077] : '' }}
                        <br>
                        <div id="qrcodep8t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423078] ? item.obji8[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423079] ? item.obji8[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423081] ? item.obji8[423081] : '' }}
                        <br>
                        <div id="qrcoded8t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji8[423082]!=undefined">
                    <td>@{{item.obji8[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423083] ? item.obji8[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423084] ? item.obji8[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423085] ? item.obji8[423085] : '' }}
                        <br>
                        <div id="qrcodep8t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423086] ? item.obji8[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423087] ? item.obji8[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423089] ? item.obji8[423089] : '' }}
                        <br>
                        <div id="qrcoded8t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji8[423090]!=undefined">
                    <td>@{{item.obji8[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423091] ? item.obji8[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423092] ? item.obji8[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423093] ? item.obji8[423093] : '' }}
                        <br>
                        <div id="qrcodep8t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423094] ? item.obji8[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423095] ? item.obji8[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423097] ? item.obji8[423097] : '' }}
                        <br>
                        <div id="qrcoded8t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji8[423098]!=undefined">
                    <td>@{{item.obji8[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423099] ? item.obji8[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423100] ? item.obji8[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423101] ? item.obji8[423101] : '' }}
                        <br>
                        <div id="qrcodep8t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423102] ? item.obji8[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423103] ? item.obji8[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423105] ? item.obji8[423105] : '' }}
                        <br>
                        <div id="qrcoded8t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji8[423106]!=undefined">
                    <td>@{{item.obji8[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423107] ? item.obji8[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423108] ? item.obji8[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423109] ? item.obji8[423109] : '' }}
                        <br>
                        <div id="qrcodep8t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423110] ? item.obji8[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423111] ? item.obji8[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423113] ? item.obji8[423113] : '' }}
                        <br>
                        <div id="qrcoded8t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji8[423114]!=undefined">
                    <td>@{{item.obji8[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423115] ? item.obji8[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423116] ? item.obji8[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423117] ? item.obji8[423117] : '' }}
                        <br>
                        <div id="qrcodep8t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423118] ? item.obji8[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423119] ? item.obji8[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423121] ? item.obji8[423121] : '' }}
                        <br>
                        <div id="qrcoded8t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji8[423122]!=undefined">
                    <td>@{{item.obji8[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423123] ? item.obji8[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423124] ? item.obji8[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423125] ? item.obji8[423125] : '' }}
                        <br>
                        <div id="qrcodep8t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423126] ? item.obji8[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423127] ? item.obji8[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423129] ? item.obji8[423129] : '' }}
                        <br>
                        <div id="qrcoded8t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji8[423130]!=undefined">
                    <td>@{{item.obji8[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423131] ? item.obji8[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423132] ? item.obji8[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423133] ? item.obji8[423133] : '' }}
                        <br>
                        <div id="qrcodep8t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423134] ? item.obji8[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423135] ? item.obji8[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423137] ? item.obji8[423137] : '' }}
                        <br>
                        <div id="qrcoded8t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji8[423138]!=undefined">
                    <td>@{{item.obji8[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423139] ? item.obji8[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423140] ? item.obji8[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423141] ? item.obji8[423141] : '' }}
                        <br>
                        <div id="qrcodep8t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423142] ? item.obji8[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423143] ? item.obji8[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423145] ? item.obji8[423145] : '' }}
                        <br>
                        <div id="qrcoded8t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji8[423146]!=undefined">
                    <td>@{{item.obji8[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423147] ? item.obji8[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423148] ? item.obji8[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423149] ? item.obji8[423149] : '' }}
                        <br>
                        <div id="qrcodep8t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423150] ? item.obji8[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423151] ? item.obji8[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423153] ? item.obji8[423153] : '' }}
                        <br>
                        <div id="qrcoded8t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji8[423154]!=undefined">
                    <td>@{{item.obji8[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423155] ? item.obji8[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423156] ? item.obji8[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423157] ? item.obji8[423157] : '' }}
                        <br>
                        <div id="qrcodep8t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423158] ? item.obji8[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423159] ? item.obji8[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423161] ? item.obji8[423161] : '' }}
                        <br>
                        <div id="qrcoded8t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji8[423162]!=undefined">
                    <td>@{{item.obji8[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423163] ? item.obji8[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423164] ? item.obji8[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423165] ? item.obji8[423165] : '' }}
                        <br>
                        <div id="qrcodep8t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423166] ? item.obji8[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423167] ? item.obji8[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423169] ? item.obji8[423169] : '' }}
                        <br>
                        <div id="qrcoded8t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji8[423170]!=undefined">
                    <td>@{{item.obji8[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423171] ? item.obji8[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423172] ? item.obji8[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423173] ? item.obji8[423173] : '' }}
                        <br>
                        <div id="qrcodep8t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423174] ? item.obji8[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423175] ? item.obji8[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423177] ? item.obji8[423177] : '' }}
                        <br>
                        <div id="qrcoded8t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji8[423178]!=undefined">
                    <td>@{{item.obji8[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423179] ? item.obji8[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423180] ? item.obji8[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423181] ? item.obji8[423181] : '' }}
                        <br>
                        <div id="qrcodep8t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423182] ? item.obji8[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423183] ? item.obji8[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423185] ? item.obji8[423185] : '' }}
                        <br>
                        <div id="qrcoded8t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji8[423186]!=undefined">
                    <td>@{{item.obji8[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423187] ? item.obji8[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423188] ? item.obji8[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423189] ? item.obji8[423189] : '' }}
                        <br>
                        <div id="qrcodep8t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423190] ? item.obji8[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423191] ? item.obji8[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423193] ? item.obji8[423193] : '' }}
                        <br>
                        <div id="qrcoded8t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji8[423194]!=undefined">
                    <td>@{{item.obji8[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423195] ? item.obji8[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423196] ? item.obji8[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423197] ? item.obji8[423197] : '' }}
                        <br>
                        <div id="qrcodep8t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423198] ? item.obji8[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423199] ? item.obji8[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423201] ? item.obji8[423201] : '' }}
                        <br>
                        <div id="qrcoded8t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji8[423202]!=undefined">
                    <td>@{{item.obji8[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423203] ? item.obji8[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423204] ? item.obji8[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423205] ? item.obji8[423205] : '' }}
                        <br>
                        <div id="qrcodep8t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423206] ? item.obji8[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423207] ? item.obji8[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423209] ? item.obji8[423209] : '' }}
                        <br>
                        <div id="qrcoded8t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji8[423210]!=undefined">
                    <td>@{{item.obji8[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji8[423211] ? item.obji8[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[423212] ? item.obji8[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji8[423213] ? item.obji8[423213] : '' }}
                        <br>
                        <div id="qrcodep8t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji8[423214] ? item.obji8[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[423215] ? item.obji8[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji8[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji8[423217] ? item.obji8[423217] : '' }}
                        <br>
                        <div id="qrcoded8t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d9']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji9[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423051] ? item.obji9[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423052] ? item.obji9[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423053] ? item.obji9[423053] : '' }} 
                        <br>
                        <div id="qrcodep9t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423054] ? item.obji9[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423055] ? item.obji9[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423057] ? item.obji9[423057] : '' }}
                        <br>
                        <div id="qrcoded9t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji9[423058]!=undefined">
                    <td>@{{item.obji9[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423059] ? item.obji9[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423060] ? item.obji9[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423061] ? item.obji9[423061] : '' }}
                        <br>
                        <div id="qrcodep9t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423062] ? item.obji9[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423063] ? item.obji9[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423065] ? item.obji9[423065] : '' }}
                        <br>
                        <div id="qrcoded9t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji9[423066]!=undefined">
                    <td>@{{item.obji9[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423067] ? item.obji9[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423068] ? item.obji9[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423069] ? item.obji9[423069] : '' }}
                        <br>
                        <div id="qrcodep9t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423070] ? item.obji9[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423071] ? item.obji9[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423073] ? item.obji9[423073] : '' }}
                        <br>
                        <div id="qrcoded9t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji9[423074]!=undefined">
                    <td>@{{item.obji9[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423075] ? item.obji9[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423076] ? item.obji9[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423077] ? item.obji9[423077] : '' }}
                        <br>
                        <div id="qrcodep9t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423078] ? item.obji9[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423079] ? item.obji9[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423081] ? item.obji9[423081] : '' }}
                        <br>
                        <div id="qrcoded9t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji9[423082]!=undefined">
                    <td>@{{item.obji9[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423083] ? item.obji9[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423084] ? item.obji9[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423085] ? item.obji9[423085] : '' }}
                        <br>
                        <div id="qrcodep9t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423086] ? item.obji9[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423087] ? item.obji9[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423089] ? item.obji9[423089] : '' }}
                        <br>
                        <div id="qrcoded9t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji9[423090]!=undefined">
                    <td>@{{item.obji9[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423091] ? item.obji9[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423092] ? item.obji9[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423093] ? item.obji9[423093] : '' }}
                        <br>
                        <div id="qrcodep9t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423094] ? item.obji9[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423095] ? item.obji9[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423097] ? item.obji9[423097] : '' }}
                        <br>
                        <div id="qrcodedt96" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji9[423098]!=undefined">
                    <td>@{{item.obji9[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423099] ? item.obji9[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423100] ? item.obji9[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423101] ? item.obji9[423101] : '' }}
                        <br>
                        <div id="qrcodep9t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423102] ? item.obji9[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423103] ? item.obji9[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423105] ? item.obji9[423105] : '' }}
                        <br>
                        <div id="qrcoded9t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji9[423106]!=undefined">
                    <td>@{{item.obji9[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423107] ? item.obji9[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423108] ? item.obji9[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423109] ? item.obji9[423109] : '' }}
                        <br>
                        <div id="qrcodep9t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423110] ? item.obji9[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423111] ? item.obji9[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423113] ? item.obji9[423113] : '' }}
                        <br>
                        <div id="qrcoded9t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji9[423114]!=undefined">
                    <td>@{{item.obji9[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423115] ? item.obji9[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423116] ? item.obji9[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423117] ? item.obji9[423117] : '' }}
                        <br>
                        <div id="qrcodep9t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423118] ? item.obji9[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423119] ? item.obji9[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423121] ? item.obji9[423121] : '' }}
                        <br>
                        <div id="qrcoded9t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji9[423122]!=undefined">
                    <td>@{{item.obji9[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423123] ? item.obji9[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423124] ? item.obji9[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423125] ? item.obji9[423125] : '' }}
                        <br>
                        <div id="qrcodep9t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423126] ? item.obji9[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423127] ? item.obji9[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423129] ? item.obji9[423129] : '' }}
                        <br>
                        <div id="qrcoded9t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji9[423130]!=undefined">
                    <td>@{{item.obji9[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423131] ? item.obji9[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423132] ? item.obji9[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423133] ? item.obji9[423133] : '' }}
                        <br>
                        <div id="qrcodep9t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423134] ? item.obji9[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423135] ? item.obji9[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423137] ? item.obji9[423137] : '' }}
                        <br>
                        <div id="qrcoded9t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji9[423138]!=undefined">
                    <td>@{{item.obji9[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423139] ? item.obji9[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423140] ? item.obji9[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423141] ? item.obji9[423141] : '' }}
                        <br>
                        <div id="qrcodep9t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423142] ? item.obji9[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423143] ? item.obji9[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423145] ? item.obji9[423145] : '' }}
                        <br>
                        <div id="qrcoded9t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji9[423146]!=undefined">
                    <td>@{{item.obji9[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423147] ? item.obji9[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423148] ? item.obji9[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423149] ? item.obji9[423149] : '' }}
                        <br>
                        <div id="qrcodep9t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423150] ? item.obji9[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423151] ? item.obji9[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423153] ? item.obji9[423153] : '' }}
                        <br>
                        <div id="qrcoded9t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji9[423154]!=undefined">
                    <td>@{{item.obji9[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423155] ? item.obji9[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423156] ? item.obji9[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423157] ? item.obji9[423157] : '' }}
                        <br>
                        <div id="qrcodep9t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423158] ? item.obji9[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423159] ? item.obji9[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423161] ? item.obji9[423161] : '' }}
                        <br>
                        <div id="qrcoded9t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji9[423162]!=undefined">
                    <td>@{{item.obji9[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423163] ? item.obji9[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423164] ? item.obji9[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423165] ? item.obji9[423165] : '' }}
                        <br>
                        <div id="qrcodep9t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423166] ? item.obji9[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423167] ? item.obji9[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423169] ? item.obji9[423169] : '' }}
                        <br>
                        <div id="qrcoded9t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji9[423170]!=undefined">
                    <td>@{{item.obji9[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423171] ? item.obji9[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423172] ? item.obji9[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423173] ? item.obji9[423173] : '' }}
                        <br>
                        <div id="qrcodep9t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423174] ? item.obji9[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423175] ? item.obji9[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423177] ? item.obji9[423177] : '' }}
                        <br>
                        <div id="qrcoded9t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji9[423178]!=undefined">
                    <td>@{{item.obji9[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423179] ? item.obji9[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423180] ? item.obji9[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423181] ? item.obji9[423181] : '' }}
                        <br>
                        <div id="qrcodep9t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423182] ? item.obji9[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423183] ? item.obji9[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423185] ? item.obji9[423185] : '' }}
                        <br>
                        <div id="qrcoded9t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji9[423186]!=undefined">
                    <td>@{{item.obji9[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423187] ? item.obji9[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423188] ? item.obji9[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423189] ? item.obji9[423189] : '' }}
                        <br>
                        <div id="qrcodep9t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423190] ? item.obji9[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423191] ? item.obji9[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423193] ? item.obji9[423193] : '' }}
                        <br>
                        <div id="qrcoded9t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji9[423194]!=undefined">
                    <td>@{{item.obji9[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423195] ? item.obji9[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423196] ? item.obji9[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423197] ? item.obji9[423197] : '' }}
                        <br>
                        <div id="qrcodep9t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423198] ? item.obji9[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423199] ? item.obji9[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423201] ? item.obji9[423201] : '' }}
                        <br>
                        <div id="qrcoded9t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji9[423202]!=undefined">
                    <td>@{{item.obji9[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423203] ? item.obji9[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423204] ? item.obji9[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423205] ? item.obji9[423205] : '' }}
                        <br>
                        <div id="qrcodep9t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423206] ? item.obji9[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423207] ? item.obji9[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423209] ? item.obji9[423209] : '' }}
                        <br>
                        <div id="qrcoded9t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji9[423210]!=undefined">
                    <td>@{{item.obji9[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji9[423211] ? item.obji9[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[423212] ? item.obji9[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji9[423213] ? item.obji9[423213] : '' }}
                        <br>
                        <div id="qrcodep9t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji9[423214] ? item.obji9[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[423215] ? item.obji9[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji9[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji9[423217] ? item.obji9[423217] : '' }}
                        <br>
                        <div id="qrcoded9t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d10']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji10[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423051] ? item.obji10[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423052] ? item.obji10[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423053] ? item.obji10[423053] : '' }} 
                        <br>
                        <div id="qrcodep10t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423054] ? item.obji10[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423055] ? item.obji10[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423057] ? item.obji10[423057] : '' }}
                        <br>
                        <div id="qrcoded10t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji10[423058]!=undefined">
                    <td>@{{item.obji10[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423059] ? item.obji10[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423060] ? item.obji10[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423061] ? item.obji10[423061] : '' }}
                        <br>
                        <div id="qrcodep10t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423062] ? item.obji10[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423063] ? item.obji10[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423065] ? item.obji10[423065] : '' }}
                        <br>
                        <div id="qrcoded10t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji10[423066]!=undefined">
                    <td>@{{item.obji10[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423067] ? item.obji10[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423068] ? item.obji10[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423069] ? item.obji10[423069] : '' }}
                        <br>
                        <div id="qrcodep10t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423070] ? item.obji10[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423071] ? item.obji10[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423073] ? item.obji10[423073] : '' }}
                        <br>
                        <div id="qrcoded10t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji10[423074]!=undefined">
                    <td>@{{item.obji10[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423075] ? item.obji10[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423076] ? item.obji10[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423077] ? item.obji10[423077] : '' }}
                        <br>
                        <div id="qrcodep10t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423078] ? item.obji10[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423079] ? item.obji10[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423081] ? item.obji10[423081] : '' }}
                        <br>
                        <div id="qrcoded10t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji10[423082]!=undefined">
                    <td>@{{item.obji10[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423083] ? item.obji10[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423084] ? item.obji10[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423085] ? item.obji10[423085] : '' }}
                        <br>
                        <div id="qrcodep10t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423086] ? item.obji10[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423087] ? item.obji10[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423089] ? item.obji10[423089] : '' }}
                        <br>
                        <div id="qrcoded10t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji10[423090]!=undefined">
                    <td>@{{item.obji10[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423091] ? item.obji10[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423092] ? item.obji10[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423093] ? item.obji10[423093] : '' }}
                        <br>
                        <div id="qrcodep10t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423094] ? item.obji10[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423095] ? item.obji10[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423097] ? item.obji10[423097] : '' }}
                        <br>
                        <div id="qrcoded10t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji10[423098]!=undefined">
                    <td>@{{item.obji10[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423099] ? item.obji10[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423100] ? item.obji10[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423101] ? item.obji10[423101] : '' }}
                        <br>
                        <div id="qrcodep10t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423102] ? item.obji10[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423103] ? item.obji10[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423105] ? item.obji10[423105] : '' }}
                        <br>
                        <div id="qrcoded10t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji10[423106]!=undefined">
                    <td>@{{item.obji10[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423107] ? item.obji10[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423108] ? item.obji10[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423109] ? item.obji10[423109] : '' }}
                        <br>
                        <div id="qrcodep10t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423110] ? item.obji10[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423111] ? item.obji10[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423113] ? item.obji10[423113] : '' }}
                        <br>
                        <div id="qrcoded10t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji10[423114]!=undefined">
                    <td>@{{item.obji10[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423115] ? item.obji10[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423116] ? item.obji10[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423117] ? item.obji10[423117] : '' }}
                        <br>
                        <div id="qrcodep10t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423118] ? item.obji10[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423119] ? item.obji10[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423121] ? item.obji10[423121] : '' }}
                        <br>
                        <div id="qrcoded10t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji10[423122]!=undefined">
                    <td>@{{item.obji10[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423123] ? item.obji10[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423124] ? item.obji10[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423125] ? item.obji10[423125] : '' }}
                        <br>
                        <div id="qrcodep10t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423126] ? item.obji10[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423127] ? item.obji10[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423129] ? item.obji10[423129] : '' }}
                        <br>
                        <div id="qrcoded10t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji10[423130]!=undefined">
                    <td>@{{item.obji10[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423131] ? item.obji10[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423132] ? item.obji10[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423133] ? item.obji10[423133] : '' }}
                        <br>
                        <div id="qrcodep10t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423134] ? item.obji10[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423135] ? item.obji10[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423137] ? item.obji10[423137] : '' }}
                        <br>
                        <div id="qrcoded10t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji10[423138]!=undefined">
                    <td>@{{item.obji10[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423139] ? item.obji10[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423140] ? item.obji10[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423141] ? item.obji10[423141] : '' }}
                        <br>
                        <div id="qrcodep10t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423142] ? item.obji10[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423143] ? item.obji10[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423145] ? item.obji10[423145] : '' }}
                        <br>
                        <div id="qrcoded10t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji10[423146]!=undefined">
                    <td>@{{item.obji10[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423147] ? item.obji10[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423148] ? item.obji10[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423149] ? item.obji10[423149] : '' }}
                        <br>
                        <div id="qrcodep10t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423150] ? item.obji10[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423151] ? item.obji10[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423153] ? item.obji10[423153] : '' }}
                        <br>
                        <div id="qrcoded10t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji10[423154]!=undefined">
                    <td>@{{item.obji10[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423155] ? item.obji10[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423156] ? item.obji10[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423157] ? item.obji10[423157] : '' }}
                        <br>
                        <div id="qrcodep10t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423158] ? item.obji10[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423159] ? item.obji10[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423161] ? item.obji10[423161] : '' }}
                        <br>
                        <div id="qrcoded10t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji10[423162]!=undefined">
                    <td>@{{item.obji10[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423163] ? item.obji10[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423164] ? item.obji10[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423165] ? item.obji10[423165] : '' }}
                        <br>
                        <div id="qrcodep10t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423166] ? item.obji10[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423167] ? item.obji10[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423169] ? item.obji10[423169] : '' }}
                        <br>
                        <div id="qrcoded10t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji10[423170]!=undefined">
                    <td>@{{item.obji10[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423171] ? item.obji10[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423172] ? item.obji10[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423173] ? item.obji10[423173] : '' }}
                        <br>
                        <div id="qrcodep10t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423174] ? item.obji10[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423175] ? item.obji10[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423177] ? item.obji10[423177] : '' }}
                        <br>
                        <div id="qrcoded10t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji10[423178]!=undefined">
                    <td>@{{item.obji10[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423179] ? item.obji10[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423180] ? item.obji10[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423181] ? item.obji10[423181] : '' }}
                        <br>
                        <div id="qrcodep10t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423182] ? item.obji10[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423183] ? item.obji10[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423185] ? item.obji10[423185] : '' }}
                        <br>
                        <div id="qrcoded10t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji10[423186]!=undefined">
                    <td>@{{item.obji10[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423187] ? item.obji10[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423188] ? item.obji10[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423189] ? item.obji10[423189] : '' }}
                        <br>
                        <div id="qrcodep10t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423190] ? item.obji10[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423191] ? item.obji10[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423193] ? item.obji10[423193] : '' }}
                        <br>
                        <div id="qrcoded10t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji10[423194]!=undefined">
                    <td>@{{item.obji10[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423195] ? item.obji10[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423196] ? item.obji10[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423197] ? item.obji10[423197] : '' }}
                        <br>
                        <div id="qrcodep10t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423198] ? item.obji10[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423199] ? item.obji10[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423201] ? item.obji10[423201] : '' }}
                        <br>
                        <div id="qrcoded10t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji10[423202]!=undefined">
                    <td>@{{item.obji10[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423203] ? item.obji10[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423204] ? item.obji10[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423205] ? item.obji10[423205] : '' }}
                        <br>
                        <div id="qrcodep10t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423206] ? item.obji10[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423207] ? item.obji10[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423209] ? item.obji10[423209] : '' }}
                        <br>
                        <div id="qrcoded10t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji10[423210]!=undefined">
                    <td>@{{item.obji10[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji10[423211] ? item.obji10[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[423212] ? item.obji10[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji10[423213] ? item.obji10[423213] : '' }}
                        <br>
                        <div id="qrcodep10t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji10[423214] ? item.obji10[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[423215] ? item.obji10[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji10[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji10[423217] ? item.obji10[423217] : '' }}
                        <br>
                        <div id="qrcoded10t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d11']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji11[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423051] ? item.obji11[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423052] ? item.obji11[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423053] ? item.obji11[423053] : '' }} 
                        <br>
                        <div id="qrcodep11t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423054] ? item.obji11[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423055] ? item.obji11[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423057] ? item.obji11[423057] : '' }}
                        <br>
                        <div id="qrcoded11t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji11[423058]!=undefined">
                    <td>@{{item.obji11[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423059] ? item.obji11[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423060] ? item.obji11[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423061] ? item.obji11[423061] : '' }}
                        <br>
                        <div id="qrcodep11t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423062] ? item.obji11[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423063] ? item.obji11[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423065] ? item.obji11[423065] : '' }}
                        <br>
                        <div id="qrcoded11t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji11[423066]!=undefined">
                    <td>@{{item.obji11[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423067] ? item.obji11[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423068] ? item.obji11[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423069] ? item.obji11[423069] : '' }}
                        <br>
                        <div id="qrcodep11t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423070] ? item.obji11[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423071] ? item.obji11[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423073] ? item.obji11[423073] : '' }}
                        <br>
                        <div id="qrcoded11t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji11[423074]!=undefined">
                    <td>@{{item.obji11[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423075] ? item.obji11[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423076] ? item.obji11[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423077] ? item.obji11[423077] : '' }}
                        <br>
                        <div id="qrcodep11t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423078] ? item.obji11[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423079] ? item.obji11[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423081] ? item.obji11[423081] : '' }}
                        <br>
                        <div id="qrcoded11t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji11[423082]!=undefined">
                    <td>@{{item.obji11[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423083] ? item.obji11[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423084] ? item.obji11[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423085] ? item.obji11[423085] : '' }}
                        <br>
                        <div id="qrcodep11t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423086] ? item.obji11[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423087] ? item.obji11[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423089] ? item.obji11[423089] : '' }}
                        <br>
                        <div id="qrcoded11t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji11[423090]!=undefined">
                    <td>@{{item.obji11[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423091] ? item.obji11[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423092] ? item.obji11[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423093] ? item.obji11[423093] : '' }}
                        <br>
                        <div id="qrcodep11t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423094] ? item.obji11[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423095] ? item.obji11[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423097] ? item.obji11[423097] : '' }}
                        <br>
                        <div id="qrcoded11t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji11[423098]!=undefined">
                    <td>@{{item.obji11[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423099] ? item.obji11[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423100] ? item.obji11[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423101] ? item.obji11[423101] : '' }}
                        <br>
                        <div id="qrcodep11t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423102] ? item.obji11[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423103] ? item.obji11[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423105] ? item.obji11[423105] : '' }}
                        <br>
                        <div id="qrcoded11t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji11[423106]!=undefined">
                    <td>@{{item.obji11[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423107] ? item.obji11[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423108] ? item.obji11[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423109] ? item.obji11[423109] : '' }}
                        <br>
                        <div id="qrcodep11t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423110] ? item.obji11[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423111] ? item.obji11[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423113] ? item.obji11[423113] : '' }}
                        <br>
                        <div id="qrcoded11t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji11[423114]!=undefined">
                    <td>@{{item.obji11[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423115] ? item.obji11[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423116] ? item.obji11[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423117] ? item.obji11[423117] : '' }}
                        <br>
                        <div id="qrcodep11t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423118] ? item.obji11[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423119] ? item.obji11[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423121] ? item.obji11[423121] : '' }}
                        <br>
                        <div id="qrcoded11t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji11[423122]!=undefined">
                    <td>@{{item.obji11[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423123] ? item.obji11[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423124] ? item.obji11[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423125] ? item.obji11[423125] : '' }}
                        <br>
                        <div id="qrcodep11t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423126] ? item.obji11[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423127] ? item.obji11[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423129] ? item.obji11[423129] : '' }}
                        <br>
                        <div id="qrcoded11t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji11[423130]!=undefined">
                    <td>@{{item.obji11[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423131] ? item.obji11[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423132] ? item.obji11[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423133] ? item.obji11[423133] : '' }}
                        <br>
                        <div id="qrcodep11t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423134] ? item.obji11[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423135] ? item.obji11[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423137] ? item.obji11[423137] : '' }}
                        <br>
                        <div id="qrcoded11t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji11[423138]!=undefined">
                    <td>@{{item.obji11[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423139] ? item.obji11[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423140] ? item.obji11[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423141] ? item.obji11[423141] : '' }}
                        <br>
                        <div id="qrcodep11t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423142] ? item.obji11[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423143] ? item.obji11[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423145] ? item.obji11[423145] : '' }}
                        <br>
                        <div id="qrcoded11t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji11[423146]!=undefined">
                    <td>@{{item.obji11[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423147] ? item.obji11[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423148] ? item.obji11[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423149] ? item.obji11[423149] : '' }}
                        <br>
                        <div id="qrcodep11t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423150] ? item.obji11[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423151] ? item.obji11[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423153] ? item.obji11[423153] : '' }}
                        <br>
                        <div id="qrcoded11t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji11[423154]!=undefined">
                    <td>@{{item.obji11[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423155] ? item.obji11[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423156] ? item.obji11[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423157] ? item.obji11[423157] : '' }}
                        <br>
                        <div id="qrcodep11t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423158] ? item.obji11[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423159] ? item.obji11[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423161] ? item.obji11[423161] : '' }}
                        <br>
                        <div id="qrcoded11t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji11[423162]!=undefined">
                    <td>@{{item.obji11[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423163] ? item.obji11[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423164] ? item.obji11[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423165] ? item.obji11[423165] : '' }}
                        <br>
                        <div id="qrcodep11t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423166] ? item.obji11[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423167] ? item.obji11[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423169] ? item.obji11[423169] : '' }}
                        <br>
                        <div id="qrcoded11t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji11[423170]!=undefined">
                    <td>@{{item.obji11[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423171] ? item.obji11[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423172] ? item.obji11[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423173] ? item.obji11[423173] : '' }}
                        <br>
                        <div id="qrcodep11t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423174] ? item.obji11[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423175] ? item.obji11[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423177] ? item.obji11[423177] : '' }}
                        <br>
                        <div id="qrcoded11t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji11[423178]!=undefined">
                    <td>@{{item.obji11[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423179] ? item.obji11[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423180] ? item.obji11[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423181] ? item.obji11[423181] : '' }}
                        <br>
                        <div id="qrcodep11t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423182] ? item.obji11[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423183] ? item.obji11[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423185] ? item.obji11[423185] : '' }}
                        <br>
                        <div id="qrcoded11t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji11[423186]!=undefined">
                    <td>@{{item.obji11[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423187] ? item.obji11[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423188] ? item.obji11[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423189] ? item.obji11[423189] : '' }}
                        <br>
                        <div id="qrcodep11t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423190] ? item.obji11[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423191] ? item.obji11[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423193] ? item.obji11[423193] : '' }}
                        <br>
                        <div id="qrcoded11t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji11[423194]!=undefined">
                    <td>@{{item.obji11[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423195] ? item.obji11[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423196] ? item.obji11[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423197] ? item.obji11[423197] : '' }}
                        <br>
                        <div id="qrcodep11t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423198] ? item.obji11[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423199] ? item.obji11[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423201] ? item.obji11[423201] : '' }}
                        <br>
                        <div id="qrcoded11t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji11[423202]!=undefined">
                    <td>@{{item.obji11[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423203] ? item.obji11[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423204] ? item.obji11[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423205] ? item.obji11[423205] : '' }}
                        <br>
                        <div id="qrcodep11t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423206] ? item.obji11[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423207] ? item.obji11[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423209] ? item.obji11[423209] : '' }}
                        <br>
                        <div id="qrcoded11t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji11[423210]!=undefined">
                    <td>@{{item.obji11[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji11[423211] ? item.obji11[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[423212] ? item.obji11[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji11[423213] ? item.obji11[423213] : '' }}
                        <br>
                        <div id="qrcodep11t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji11[423214] ? item.obji11[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[423215] ? item.obji11[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji11[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji11[423217] ? item.obji11[423217] : '' }}
                        <br>
                        <div id="qrcoded11t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d12']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji12[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423051] ? item.obji12[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423052] ? item.obji12[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423053] ? item.obji12[423053] : '' }} 
                        <br>
                        <div id="qrcodep12t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423054] ? item.obji12[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423055] ? item.obji12[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423057] ? item.obji12[423057] : '' }}
                        <br>
                        <div id="qrcoded12t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji12[423058]!=undefined">
                    <td>@{{item.obji12[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423059] ? item.obji12[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423060] ? item.obji12[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423061] ? item.obji12[423061] : '' }}
                        <br>
                        <div id="qrcodep12t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423062] ? item.obji12[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423063] ? item.obji12[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423065] ? item.obji12[423065] : '' }}
                        <br>
                        <div id="qrcoded12t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji12[423066]!=undefined">
                    <td>@{{item.obji12[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423067] ? item.obji12[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423068] ? item.obji12[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423069] ? item.obji12[423069] : '' }}
                        <br>
                        <div id="qrcodep12t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423070] ? item.obji12[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423071] ? item.obji12[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423073] ? item.obji12[423073] : '' }}
                        <br>
                        <div id="qrcoded12t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji12[423074]!=undefined">
                    <td>@{{item.obji12[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423075] ? item.obji12[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423076] ? item.obji12[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423077] ? item.obji12[423077] : '' }}
                        <br>
                        <div id="qrcodep12t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423078] ? item.obji12[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423079] ? item.obji12[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423081] ? item.obji12[423081] : '' }}
                        <br>
                        <div id="qrcoded12t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji12[423082]!=undefined">
                    <td>@{{item.obji12[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423083] ? item.obji12[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423084] ? item.obji12[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423085] ? item.obji12[423085] : '' }}
                        <br>
                        <div id="qrcodep12t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423086] ? item.obji12[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423087] ? item.obji12[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423089] ? item.obji12[423089] : '' }}
                        <br>
                        <div id="qrcoded12t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji12[423090]!=undefined">
                    <td>@{{item.obji12[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423091] ? item.obji12[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423092] ? item.obji12[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423093] ? item.obji12[423093] : '' }}
                        <br>
                        <div id="qrcodep12t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423094] ? item.obji12[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423095] ? item.obji12[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423097] ? item.obji12[423097] : '' }}
                        <br>
                        <div id="qrcoded12t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji12[423098]!=undefined">
                    <td>@{{item.obji12[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423099] ? item.obji12[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423100] ? item.obji12[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423101] ? item.obji12[423101] : '' }}
                        <br>
                        <div id="qrcodep12t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423102] ? item.obji12[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423103] ? item.obji12[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423105] ? item.obji12[423105] : '' }}
                        <br>
                        <div id="qrcoded12t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji12[423106]!=undefined">
                    <td>@{{item.obji12[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423107] ? item.obji12[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423108] ? item.obji12[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423109] ? item.obji12[423109] : '' }}
                        <br>
                        <div id="qrcodep12t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423110] ? item.obji12[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423111] ? item.obji12[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423113] ? item.obji12[423113] : '' }}
                        <br>
                        <div id="qrcoded12t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji12[423114]!=undefined">
                    <td>@{{item.obji12[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423115] ? item.obji12[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423116] ? item.obji12[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423117] ? item.obji12[423117] : '' }}
                        <br>
                        <div id="qrcodep12t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423118] ? item.obji12[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423119] ? item.obji12[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423121] ? item.obji12[423121] : '' }}
                        <br>
                        <div id="qrcoded12t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji12[423122]!=undefined">
                    <td>@{{item.obji12[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423123] ? item.obji12[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423124] ? item.obji12[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423125] ? item.obji12[423125] : '' }}
                        <br>
                        <div id="qrcodep12t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423126] ? item.obji12[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423127] ? item.obji12[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423129] ? item.obji12[423129] : '' }}
                        <br>
                        <div id="qrcoded12t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji12[423130]!=undefined">
                    <td>@{{item.obji12[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423131] ? item.obji12[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423132] ? item.obji12[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423133] ? item.obji12[423133] : '' }}
                        <br>
                        <div id="qrcodep12t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423134] ? item.obji12[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423135] ? item.obji12[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423137] ? item.obji12[423137] : '' }}
                        <br>
                        <div id="qrcoded12t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji12[423138]!=undefined">
                    <td>@{{item.obji12[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423139] ? item.obji12[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423140] ? item.obji12[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423141] ? item.obji12[423141] : '' }}
                        <br>
                        <div id="qrcodep12t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423142] ? item.obji12[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423143] ? item.obji12[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423145] ? item.obji12[423145] : '' }}
                        <br>
                        <div id="qrcoded12t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji12[423146]!=undefined">
                    <td>@{{item.obji12[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423147] ? item.obji12[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423148] ? item.obji12[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423149] ? item.obji12[423149] : '' }}
                        <br>
                        <div id="qrcodep12t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423150] ? item.obji12[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423151] ? item.obji12[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423153] ? item.obji12[423153] : '' }}
                        <br>
                        <div id="qrcoded12t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji12[423154]!=undefined">
                    <td>@{{item.obji12[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423155] ? item.obji12[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423156] ? item.obji12[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423157] ? item.obji12[423157] : '' }}
                        <br>
                        <div id="qrcodep12t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423158] ? item.obji12[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423159] ? item.obji12[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423161] ? item.obji12[423161] : '' }}
                        <br>
                        <div id="qrcoded12t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji12[423162]!=undefined">
                    <td>@{{item.obji12[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423163] ? item.obji12[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423164] ? item.obji12[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423165] ? item.obji12[423165] : '' }}
                        <br>
                        <div id="qrcodep12t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423166] ? item.obji12[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423167] ? item.obji12[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423169] ? item.obji12[423169] : '' }}
                        <br>
                        <div id="qrcoded12t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji12[423170]!=undefined">
                    <td>@{{item.obji12[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423171] ? item.obji12[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423172] ? item.obji12[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423173] ? item.obji12[423173] : '' }}
                        <br>
                        <div id="qrcodep12t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423174] ? item.obji12[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423175] ? item.obji12[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423177] ? item.obji12[423177] : '' }}
                        <br>
                        <div id="qrcoded12t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji12[423178]!=undefined">
                    <td>@{{item.obji12[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423179] ? item.obji12[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423180] ? item.obji12[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423181] ? item.obji12[423181] : '' }}
                        <br>
                        <div id="qrcodep12t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423182] ? item.obji12[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423183] ? item.obji12[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423185] ? item.obji12[423185] : '' }}
                        <br>
                        <div id="qrcoded12t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji12[423186]!=undefined">
                    <td>@{{item.obji12[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423187] ? item.obji12[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423188] ? item.obji12[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423189] ? item.obji12[423189] : '' }}
                        <br>
                        <div id="qrcodep12t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423190] ? item.obji12[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423191] ? item.obji12[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423193] ? item.obji12[423193] : '' }}
                        <br>
                        <div id="qrcoded12t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji12[423194]!=undefined">
                    <td>@{{item.obji12[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423195] ? item.obji12[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423196] ? item.obji12[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423197] ? item.obji12[423197] : '' }}
                        <br>
                        <div id="qrcodep12t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423198] ? item.obji12[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423199] ? item.obji12[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423201] ? item.obji12[423201] : '' }}
                        <br>
                        <div id="qrcoded12t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji12[423202]!=undefined">
                    <td>@{{item.obji12[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423203] ? item.obji12[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423204] ? item.obji12[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423205] ? item.obji12[423205] : '' }}
                        <br>
                        <div id="qrcodep12t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423206] ? item.obji12[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423207] ? item.obji12[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423209] ? item.obji12[423209] : '' }}
                        <br>
                        <div id="qrcoded12t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji12[423210]!=undefined">
                    <td>@{{item.obji12[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji12[423211] ? item.obji12[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[423212] ? item.obji12[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji12[423213] ? item.obji12[423213] : '' }}
                        <br>
                        <div id="qrcodep12t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji12[423214] ? item.obji12[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[423215] ? item.obji12[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji12[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji12[423217] ? item.obji12[423217] : '' }}
                        <br>
                        <div id="qrcoded12t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d13']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji13[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423051] ? item.obji13[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423052] ? item.obji13[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423053] ? item.obji13[423053] : '' }} 
                        <br>
                        <div id="qrcodep13t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423054] ? item.obji13[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423055] ? item.obji13[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423057] ? item.obji13[423057] : '' }}
                        <br>
                        <div id="qrcoded13t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji13[423058]!=undefined">
                    <td>@{{item.obji13[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423059] ? item.obji13[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423060] ? item.obji13[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423061] ? item.obji13[423061] : '' }}
                        <br>
                        <div id="qrcodep13t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423062] ? item.obji13[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423063] ? item.obji13[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423065] ? item.obji13[423065] : '' }}
                        <br>
                        <div id="qrcoded13t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji13[423066]!=undefined">
                    <td>@{{item.obji13[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423067] ? item.obji13[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423068] ? item.obji13[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423069] ? item.obji13[423069] : '' }}
                        <br>
                        <div id="qrcodep13t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423070] ? item.obji13[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423071] ? item.obji13[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423073] ? item.obji13[423073] : '' }}
                        <br>
                        <div id="qrcoded13t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji13[423074]!=undefined">
                    <td>@{{item.obji13[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423075] ? item.obji13[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423076] ? item.obji13[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423077] ? item.obji13[423077] : '' }}
                        <br>
                        <div id="qrcodep13t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423078] ? item.obji13[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423079] ? item.obji13[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423081] ? item.obji13[423081] : '' }}
                        <br>
                        <div id="qrcoded13t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji13[423082]!=undefined">
                    <td>@{{item.obji13[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423083] ? item.obji13[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423084] ? item.obji13[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423085] ? item.obji13[423085] : '' }}
                        <br>
                        <div id="qrcodep13t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423086] ? item.obji13[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423087] ? item.obji13[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423089] ? item.obji13[423089] : '' }}
                        <br>
                        <div id="qrcoded13t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji13[423090]!=undefined">
                    <td>@{{item.obji13[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423091] ? item.obji13[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423092] ? item.obji13[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423093] ? item.obji13[423093] : '' }}
                        <br>
                        <div id="qrcodep13t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423094] ? item.obji13[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423095] ? item.obji13[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423097] ? item.obji13[423097] : '' }}
                        <br>
                        <div id="qrcoded13t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji13[423098]!=undefined">
                    <td>@{{item.obji13[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423099] ? item.obji13[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423100] ? item.obji13[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423101] ? item.obji13[423101] : '' }}
                        <br>
                        <div id="qrcodep13t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423102] ? item.obji13[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423103] ? item.obji13[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423105] ? item.obji13[423105] : '' }}
                        <br>
                        <div id="qrcoded13t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji13[423106]!=undefined">
                    <td>@{{item.obji13[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423107] ? item.obji13[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423108] ? item.obji13[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423109] ? item.obji13[423109] : '' }}
                        <br>
                        <div id="qrcodep13t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423110] ? item.obji13[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423111] ? item.obji13[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423113] ? item.obji13[423113] : '' }}
                        <br>
                        <div id="qrcoded13t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji13[423114]!=undefined">
                    <td>@{{item.obji13[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423115] ? item.obji13[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423116] ? item.obji13[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423117] ? item.obji13[423117] : '' }}
                        <br>
                        <div id="qrcodep13t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423118] ? item.obji13[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423119] ? item.obji13[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423121] ? item.obji13[423121] : '' }}
                        <br>
                        <div id="qrcoded13t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji13[423122]!=undefined">
                    <td>@{{item.obji13[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423123] ? item.obji13[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423124] ? item.obji13[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423125] ? item.obji13[423125] : '' }}
                        <br>
                        <div id="qrcodep13t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423126] ? item.obji13[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423127] ? item.obji13[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423129] ? item.obji13[423129] : '' }}
                        <br>
                        <div id="qrcoded13t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji13[423130]!=undefined">
                    <td>@{{item.obji13[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423131] ? item.obji13[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423132] ? item.obji13[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423133] ? item.obji13[423133] : '' }}
                        <br>
                        <div id="qrcodep13t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423134] ? item.obji13[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423135] ? item.obji13[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423137] ? item.obji13[423137] : '' }}
                        <br>
                        <div id="qrcoded13t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji13[423138]!=undefined">
                    <td>@{{item.obji13[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423139] ? item.obji13[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423140] ? item.obji13[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423141] ? item.obji13[423141] : '' }}
                        <br>
                        <div id="qrcodep13t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423142] ? item.obji13[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423143] ? item.obji13[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423145] ? item.obji13[423145] : '' }}
                        <br>
                        <div id="qrcoded13t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji13[423146]!=undefined">
                    <td>@{{item.obji13[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423147] ? item.obji13[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423148] ? item.obji13[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423149] ? item.obji13[423149] : '' }}
                        <br>
                        <div id="qrcodep13t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423150] ? item.obji13[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423151] ? item.obji13[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423153] ? item.obji13[423153] : '' }}
                        <br>
                        <div id="qrcoded13t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji13[423154]!=undefined">
                    <td>@{{item.obji13[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423155] ? item.obji13[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423156] ? item.obji13[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423157] ? item.obji13[423157] : '' }}
                        <br>
                        <div id="qrcodep13t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423158] ? item.obji13[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423159] ? item.obji13[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423161] ? item.obji13[423161] : '' }}
                        <br>
                        <div id="qrcoded13t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji13[423162]!=undefined">
                    <td>@{{item.obji13[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423163] ? item.obji13[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423164] ? item.obji13[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423165] ? item.obji13[423165] : '' }}
                        <br>
                        <div id="qrcodep13t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423166] ? item.obji13[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423167] ? item.obji13[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423169] ? item.obji13[423169] : '' }}
                        <br>
                        <div id="qrcoded13t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji13[423170]!=undefined">
                    <td>@{{item.obji13[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423171] ? item.obji13[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423172] ? item.obji13[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423173] ? item.obji13[423173] : '' }}
                        <br>
                        <div id="qrcodep13t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423174] ? item.obji13[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423175] ? item.obji13[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423177] ? item.obji13[423177] : '' }}
                        <br>
                        <div id="qrcoded13t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji13[423178]!=undefined">
                    <td>@{{item.obji13[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423179] ? item.obji13[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423180] ? item.obji13[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423181] ? item.obji13[423181] : '' }}
                        <br>
                        <div id="qrcodep13t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423182] ? item.obji13[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423183] ? item.obji13[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423185] ? item.obji13[423185] : '' }}
                        <br>
                        <div id="qrcoded13t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji13[423186]!=undefined">
                    <td>@{{item.obji13[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423187] ? item.obji13[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423188] ? item.obji13[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423189] ? item.obji13[423189] : '' }}
                        <br>
                        <div id="qrcodep13t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423190] ? item.obji13[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423191] ? item.obji13[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423193] ? item.obji13[423193] : '' }}
                        <br>
                        <div id="qrcoded13t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji13[423194]!=undefined">
                    <td>@{{item.obji13[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423195] ? item.obji13[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423196] ? item.obji13[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423197] ? item.obji13[423197] : '' }}
                        <br>
                        <div id="qrcodep13t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423198] ? item.obji13[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423199] ? item.obji13[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423201] ? item.obji13[423201] : '' }}
                        <br>
                        <div id="qrcoded13t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji13[423202]!=undefined">
                    <td>@{{item.obji13[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423203] ? item.obji13[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423204] ? item.obji13[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423205] ? item.obji13[423205] : '' }}
                        <br>
                        <div id="qrcodep13t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423206] ? item.obji13[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423207] ? item.obji13[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423209] ? item.obji13[423209] : '' }}
                        <br>
                        <div id="qrcoded13t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji13[423210]!=undefined">
                    <td>@{{item.obji13[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji13[423211] ? item.obji13[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[423212] ? item.obji13[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji13[423213] ? item.obji13[423213] : '' }}
                        <br>
                        <div id="qrcodep13t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji13[423214] ? item.obji13[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[423215] ? item.obji13[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji13[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji13[423217] ? item.obji13[423217] : '' }}
                        <br>
                        <div id="qrcoded13t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d14']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji14[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423051] ? item.obji14[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423052] ? item.obji14[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423053] ? item.obji14[423053] : '' }} 
                        <br>
                        <div id="qrcodep14t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423054] ? item.obji14[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423055] ? item.obji14[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423057] ? item.obji14[423057] : '' }}
                        <br>
                        <div id="qrcoded14t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji14[423058]!=undefined">
                    <td>@{{item.obji14[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423059] ? item.obji14[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423060] ? item.obji14[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423061] ? item.obji14[423061] : '' }}
                        <br>
                        <div id="qrcodep14t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423062] ? item.obji14[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423063] ? item.obji14[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423065] ? item.obji14[423065] : '' }}
                        <br>
                        <div id="qrcoded14t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji14[423066]!=undefined">
                    <td>@{{item.obji14[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423067] ? item.obji14[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423068] ? item.obji14[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423069] ? item.obji14[423069] : '' }}
                        <br>
                        <div id="qrcodep14t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423070] ? item.obji14[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423071] ? item.obji14[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423073] ? item.obji14[423073] : '' }}
                        <br>
                        <div id="qrcoded14t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji14[423074]!=undefined">
                    <td>@{{item.obji14[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423075] ? item.obji14[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423076] ? item.obji14[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423077] ? item.obji14[423077] : '' }}
                        <br>
                        <div id="qrcodep14t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423078] ? item.obji14[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423079] ? item.obji14[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423081] ? item.obji14[423081] : '' }}
                        <br>
                        <div id="qrcoded14t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji14[423082]!=undefined">
                    <td>@{{item.obji14[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423083] ? item.obji14[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423084] ? item.obji14[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423085] ? item.obji14[423085] : '' }}
                        <br>
                        <div id="qrcodep14t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423086] ? item.obji14[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423087] ? item.obji14[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423089] ? item.obji14[423089] : '' }}
                        <br>
                        <div id="qrcoded14t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji14[423090]!=undefined">
                    <td>@{{item.obji14[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423091] ? item.obji14[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423092] ? item.obji14[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423093] ? item.obji14[423093] : '' }}
                        <br>
                        <div id="qrcodep14t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423094] ? item.obji14[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423095] ? item.obji14[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423097] ? item.obji14[423097] : '' }}
                        <br>
                        <div id="qrcoded14t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji14[423098]!=undefined">
                    <td>@{{item.obji14[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423099] ? item.obji14[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423100] ? item.obji14[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423101] ? item.obji14[423101] : '' }}
                        <br>
                        <div id="qrcodep14t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423102] ? item.obji14[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423103] ? item.obji14[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423105] ? item.obji14[423105] : '' }}
                        <br>
                        <div id="qrcoded14t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji14[423106]!=undefined">
                    <td>@{{item.obji14[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423107] ? item.obji14[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423108] ? item.obji14[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423109] ? item.obji14[423109] : '' }}
                        <br>
                        <div id="qrcodep14t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423110] ? item.obji14[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423111] ? item.obji14[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423113] ? item.obji14[423113] : '' }}
                        <br>
                        <div id="qrcoded14t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji14[423114]!=undefined">
                    <td>@{{item.obji14[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423115] ? item.obji14[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423116] ? item.obji14[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423117] ? item.obji14[423117] : '' }}
                        <br>
                        <div id="qrcodep14t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423118] ? item.obji14[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423119] ? item.obji14[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423121] ? item.obji14[423121] : '' }}
                        <br>
                        <div id="qrcoded14t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji14[423122]!=undefined">
                    <td>@{{item.obji14[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423123] ? item.obji14[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423124] ? item.obji14[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423125] ? item.obji14[423125] : '' }}
                        <br>
                        <div id="qrcodep14t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423126] ? item.obji14[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423127] ? item.obji14[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423129] ? item.obji14[423129] : '' }}
                        <br>
                        <div id="qrcoded14t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji14[423130]!=undefined">
                    <td>@{{item.obji14[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423131] ? item.obji14[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423132] ? item.obji14[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423133] ? item.obji14[423133] : '' }}
                        <br>
                        <div id="qrcodep14t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423134] ? item.obji14[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423135] ? item.obji14[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423137] ? item.obji14[423137] : '' }}
                        <br>
                        <div id="qrcoded14t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji14[423138]!=undefined">
                    <td>@{{item.obji14[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423139] ? item.obji14[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423140] ? item.obji14[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423141] ? item.obji14[423141] : '' }}
                        <br>
                        <div id="qrcodep14t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423142] ? item.obji14[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423143] ? item.obji14[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423145] ? item.obji14[423145] : '' }}
                        <br>
                        <div id="qrcoded14t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji14[423146]!=undefined">
                    <td>@{{item.obji14[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423147] ? item.obji14[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423148] ? item.obji14[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423149] ? item.obji14[423149] : '' }}
                        <br>
                        <div id="qrcodep14t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423150] ? item.obji14[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423151] ? item.obji14[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423153] ? item.obji14[423153] : '' }}
                        <br>
                        <div id="qrcoded14t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji14[423154]!=undefined">
                    <td>@{{item.obji14[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423155] ? item.obji14[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423156] ? item.obji14[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423157] ? item.obji14[423157] : '' }}
                        <br>
                        <div id="qrcodep14t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423158] ? item.obji14[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423159] ? item.obji14[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423161] ? item.obji14[423161] : '' }}
                        <br>
                        <div id="qrcoded14t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji14[423162]!=undefined">
                    <td>@{{item.obji14[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423163] ? item.obji14[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423164] ? item.obji14[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423165] ? item.obji14[423165] : '' }}
                        <br>
                        <div id="qrcodep14t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423166] ? item.obji14[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423167] ? item.obji14[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423169] ? item.obji14[423169] : '' }}
                        <br>
                        <div id="qrcoded14t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji14[423170]!=undefined">
                    <td>@{{item.obji14[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423171] ? item.obji14[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423172] ? item.obji14[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423173] ? item.obji14[423173] : '' }}
                        <br>
                        <div id="qrcodep14t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423174] ? item.obji14[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423175] ? item.obji14[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423177] ? item.obji14[423177] : '' }}
                        <br>
                        <div id="qrcoded14t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji14[423178]!=undefined">
                    <td>@{{item.obji14[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423179] ? item.obji14[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423180] ? item.obji14[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423181] ? item.obji14[423181] : '' }}
                        <br>
                        <div id="qrcodep14t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423182] ? item.obji14[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423183] ? item.obji14[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423185] ? item.obji14[423185] : '' }}
                        <br>
                        <div id="qrcoded14t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji14[423186]!=undefined">
                    <td>@{{item.obji14[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423187] ? item.obji14[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423188] ? item.obji14[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423189] ? item.obji14[423189] : '' }}
                        <br>
                        <div id="qrcodep14t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423190] ? item.obji14[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423191] ? item.obji14[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423193] ? item.obji14[423193] : '' }}
                        <br>
                        <div id="qrcoded14t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji14[423194]!=undefined">
                    <td>@{{item.obji14[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423195] ? item.obji14[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423196] ? item.obji14[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423197] ? item.obji14[423197] : '' }}
                        <br>
                        <div id="qrcodep14t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423198] ? item.obji14[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423199] ? item.obji14[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423201] ? item.obji14[423201] : '' }}
                        <br>
                        <div id="qrcoded14t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji14[423202]!=undefined">
                    <td>@{{item.obji14[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423203] ? item.obji14[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423204] ? item.obji14[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423205] ? item.obji14[423205] : '' }}
                        <br>
                        <div id="qrcodep14t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423206] ? item.obji14[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423207] ? item.obji14[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423209] ? item.obji14[423209] : '' }}
                        <br>
                        <div id="qrcoded14t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji14[423210]!=undefined">
                    <td>@{{item.obji14[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji14[423211] ? item.obji14[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[423212] ? item.obji14[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji14[423213] ? item.obji14[423213] : '' }}
                        <br>
                        <div id="qrcodep14t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji14[423214] ? item.obji14[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[423215] ? item.obji14[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji14[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji14[423217] ? item.obji14[423217] : '' }}
                        <br>
                        <div id="qrcoded14t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d15']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji15[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423051] ? item.obji15[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423052] ? item.obji15[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423053] ? item.obji15[423053] : '' }} 
                        <br>
                        <div id="qrcodep15t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423054] ? item.obji15[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423055] ? item.obji15[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423057] ? item.obji15[423057] : '' }}
                        <br>
                        <div id="qrcoded15t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji15[423058]!=undefined">
                    <td>@{{item.obji15[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423059] ? item.obji15[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423060] ? item.obji15[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423061] ? item.obji15[423061] : '' }}
                        <br>
                        <div id="qrcodep15t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423062] ? item.obji15[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423063] ? item.obji15[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423065] ? item.obji15[423065] : '' }}
                        <br>
                        <div id="qrcoded15t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji15[423066]!=undefined">
                    <td>@{{item.obji15[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423067] ? item.obji15[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423068] ? item.obji15[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423069] ? item.obji15[423069] : '' }}
                        <br>
                        <div id="qrcodep15t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423070] ? item.obji15[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423071] ? item.obji15[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423073] ? item.obji15[423073] : '' }}
                        <br>
                        <div id="qrcoded15t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji15[423074]!=undefined">
                    <td>@{{item.obji15[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423075] ? item.obji15[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423076] ? item.obji15[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423077] ? item.obji15[423077] : '' }}
                        <br>
                        <div id="qrcodep15t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423078] ? item.obji15[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423079] ? item.obji15[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423081] ? item.obji15[423081] : '' }}
                        <br>
                        <div id="qrcoded15t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji15[423082]!=undefined">
                    <td>@{{item.obji15[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423083] ? item.obji15[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423084] ? item.obji15[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423085] ? item.obji15[423085] : '' }}
                        <br>
                        <div id="qrcodep15t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423086] ? item.obji15[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423087] ? item.obji15[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423089] ? item.obji15[423089] : '' }}
                        <br>
                        <div id="qrcoded15t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji15[423090]!=undefined">
                    <td>@{{item.obji15[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423091] ? item.obji15[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423092] ? item.obji15[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423093] ? item.obji15[423093] : '' }}
                        <br>
                        <div id="qrcodep15t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423094] ? item.obji15[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423095] ? item.obji15[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423097] ? item.obji15[423097] : '' }}
                        <br>
                        <div id="qrcoded15t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji15[423098]!=undefined">
                    <td>@{{item.obji15[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423099] ? item.obji15[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423100] ? item.obji15[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423101] ? item.obji15[423101] : '' }}
                        <br>
                        <div id="qrcodep15t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423102] ? item.obji15[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423103] ? item.obji15[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423105] ? item.obji15[423105] : '' }}
                        <br>
                        <div id="qrcoded15t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji15[423106]!=undefined">
                    <td>@{{item.obji15[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423107] ? item.obji15[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423108] ? item.obji15[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423109] ? item.obji15[423109] : '' }}
                        <br>
                        <div id="qrcodep15t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423110] ? item.obji15[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423111] ? item.obji15[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423113] ? item.obji15[423113] : '' }}
                        <br>
                        <div id="qrcoded15t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji15[423114]!=undefined">
                    <td>@{{item.obji15[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423115] ? item.obji15[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423116] ? item.obji15[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423117] ? item.obji15[423117] : '' }}
                        <br>
                        <div id="qrcodep15t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423118] ? item.obji15[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423119] ? item.obji15[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423121] ? item.obji15[423121] : '' }}
                        <br>
                        <div id="qrcoded15t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji15[423122]!=undefined">
                    <td>@{{item.obji15[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423123] ? item.obji15[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423124] ? item.obji15[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423125] ? item.obji15[423125] : '' }}
                        <br>
                        <div id="qrcodep15t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423126] ? item.obji15[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423127] ? item.obji15[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423129] ? item.obji15[423129] : '' }}
                        <br>
                        <div id="qrcoded15t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji15[423130]!=undefined">
                    <td>@{{item.obji15[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423131] ? item.obji15[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423132] ? item.obji15[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423133] ? item.obji15[423133] : '' }}
                        <br>
                        <div id="qrcodep15t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423134] ? item.obji15[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423135] ? item.obji15[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423137] ? item.obji15[423137] : '' }}
                        <br>
                        <div id="qrcoded15t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji15[423138]!=undefined">
                    <td>@{{item.obji15[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423139] ? item.obji15[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423140] ? item.obji15[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423141] ? item.obji15[423141] : '' }}
                        <br>
                        <div id="qrcodep15t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423142] ? item.obji15[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423143] ? item.obji15[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423145] ? item.obji15[423145] : '' }}
                        <br>
                        <div id="qrcoded15t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji15[423146]!=undefined">
                    <td>@{{item.obji15[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423147] ? item.obji15[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423148] ? item.obji15[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423149] ? item.obji15[423149] : '' }}
                        <br>
                        <div id="qrcodep15t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423150] ? item.obji15[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423151] ? item.obji15[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423153] ? item.obji15[423153] : '' }}
                        <br>
                        <div id="qrcoded15t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji15[423154]!=undefined">
                    <td>@{{item.obji15[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423155] ? item.obji15[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423156] ? item.obji15[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423157] ? item.obji15[423157] : '' }}
                        <br>
                        <div id="qrcodep15t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423158] ? item.obji15[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423159] ? item.obji15[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423161] ? item.obji15[423161] : '' }}
                        <br>
                        <div id="qrcoded15t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji15[423162]!=undefined">
                    <td>@{{item.obji15[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423163] ? item.obji15[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423164] ? item.obji15[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423165] ? item.obji15[423165] : '' }}
                        <br>
                        <div id="qrcodep15t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423166] ? item.obji15[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423167] ? item.obji15[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423169] ? item.obji15[423169] : '' }}
                        <br>
                        <div id="qrcoded15t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji15[423170]!=undefined">
                    <td>@{{item.obji15[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423171] ? item.obji15[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423172] ? item.obji15[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423173] ? item.obji15[423173] : '' }}
                        <br>
                        <div id="qrcodep15t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423174] ? item.obji15[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423175] ? item.obji15[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423177] ? item.obji15[423177] : '' }}
                        <br>
                        <div id="qrcoded15t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji15[423178]!=undefined">
                    <td>@{{item.obji15[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423179] ? item.obji15[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423180] ? item.obji15[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423181] ? item.obji15[423181] : '' }}
                        <br>
                        <div id="qrcodep15t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423182] ? item.obji15[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423183] ? item.obji15[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423185] ? item.obji15[423185] : '' }}
                        <br>
                        <div id="qrcoded15t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji15[423186]!=undefined">
                    <td>@{{item.obji15[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423187] ? item.obji15[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423188] ? item.obji15[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423189] ? item.obji15[423189] : '' }}
                        <br>
                        <div id="qrcodep15t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423190] ? item.obji15[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423191] ? item.obji15[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423193] ? item.obji15[423193] : '' }}
                        <br>
                        <div id="qrcoded15t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji15[423194]!=undefined">
                    <td>@{{item.obji15[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423195] ? item.obji15[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423196] ? item.obji15[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423197] ? item.obji15[423197] : '' }}
                        <br>
                        <div id="qrcodep15t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423198] ? item.obji15[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423199] ? item.obji15[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423201] ? item.obji15[423201] : '' }}
                        <br>
                        <div id="qrcoded15t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji15[423202]!=undefined">
                    <td>@{{item.obji15[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423203] ? item.obji15[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423204] ? item.obji15[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423205] ? item.obji15[423205] : '' }}
                        <br>
                        <div id="qrcodep15t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423206] ? item.obji15[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423207] ? item.obji15[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423209] ? item.obji15[423209] : '' }}
                        <br>
                        <div id="qrcoded15t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji15[423210]!=undefined">
                    <td>@{{item.obji15[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji15[423211] ? item.obji15[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[423212] ? item.obji15[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji15[423213] ? item.obji15[423213] : '' }}
                        <br>
                        <div id="qrcodep15t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji15[423214] ? item.obji15[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[423215] ? item.obji15[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji15[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji15[423217] ? item.obji15[423217] : '' }}
                        <br>
                        <div id="qrcoded15t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d16']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji16[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423051] ? item.obji16[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423052] ? item.obji16[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423053] ? item.obji16[423053] : '' }} 
                        <br>
                        <div id="qrcodep16t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423054] ? item.obji16[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423055] ? item.obji16[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423057] ? item.obji16[423057] : '' }}
                        <br>
                        <div id="qrcoded16t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji16[423058]!=undefined">
                    <td>@{{item.obji16[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423059] ? item.obji16[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423060] ? item.obji16[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423061] ? item.obji16[423061] : '' }}
                        <br>
                        <div id="qrcodep16t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423062] ? item.obji16[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423063] ? item.obji16[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423065] ? item.obji16[423065] : '' }}
                        <br>
                        <div id="qrcoded16t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji16[423066]!=undefined">
                    <td>@{{item.obji16[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423067] ? item.obji16[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423068] ? item.obji16[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423069] ? item.obji16[423069] : '' }}
                        <br>
                        <div id="qrcodep16t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423070] ? item.obji16[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423071] ? item.obji16[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423073] ? item.obji16[423073] : '' }}
                        <br>
                        <div id="qrcoded16t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji16[423074]!=undefined">
                    <td>@{{item.obji16[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423075] ? item.obji16[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423076] ? item.obji16[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423077] ? item.obji16[423077] : '' }}
                        <br>
                        <div id="qrcodep16t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423078] ? item.obji16[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423079] ? item.obji16[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423081] ? item.obji16[423081] : '' }}
                        <br>
                        <div id="qrcoded16t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji16[423082]!=undefined">
                    <td>@{{item.obji16[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423083] ? item.obji16[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423084] ? item.obji16[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423085] ? item.obji16[423085] : '' }}
                        <br>
                        <div id="qrcodep16t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423086] ? item.obji16[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423087] ? item.obji16[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423089] ? item.obji16[423089] : '' }}
                        <br>
                        <div id="qrcoded16t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji16[423090]!=undefined">
                    <td>@{{item.obji16[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423091] ? item.obji16[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423092] ? item.obji16[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423093] ? item.obji16[423093] : '' }}
                        <br>
                        <div id="qrcodep16t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423094] ? item.obji16[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423095] ? item.obji16[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423097] ? item.obji16[423097] : '' }}
                        <br>
                        <div id="qrcoded16t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji16[423098]!=undefined">
                    <td>@{{item.obji16[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423099] ? item.obji16[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423100] ? item.obji16[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423101] ? item.obji16[423101] : '' }}
                        <br>
                        <div id="qrcodep16t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423102] ? item.obji16[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423103] ? item.obji16[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423105] ? item.obji16[423105] : '' }}
                        <br>
                        <div id="qrcoded16t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji16[423106]!=undefined">
                    <td>@{{item.obji16[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423107] ? item.obji16[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423108] ? item.obji16[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423109] ? item.obji16[423109] : '' }}
                        <br>
                        <div id="qrcodep16t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423110] ? item.obji16[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423111] ? item.obji16[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423113] ? item.obji16[423113] : '' }}
                        <br>
                        <div id="qrcoded16t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji16[423114]!=undefined">
                    <td>@{{item.obji16[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423115] ? item.obji16[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423116] ? item.obji16[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423117] ? item.obji16[423117] : '' }}
                        <br>
                        <div id="qrcodep16t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423118] ? item.obji16[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423119] ? item.obji16[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423121] ? item.obji16[423121] : '' }}
                        <br>
                        <div id="qrcoded16t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji16[423122]!=undefined">
                    <td>@{{item.obji16[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423123] ? item.obji16[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423124] ? item.obji16[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423125] ? item.obji16[423125] : '' }}
                        <br>
                        <div id="qrcodep16t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423126] ? item.obji16[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423127] ? item.obji16[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423129] ? item.obji16[423129] : '' }}
                        <br>
                        <div id="qrcoded16t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji16[423130]!=undefined">
                    <td>@{{item.obji16[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423131] ? item.obji16[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423132] ? item.obji16[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423133] ? item.obji16[423133] : '' }}
                        <br>
                        <div id="qrcodep16t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423134] ? item.obji16[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423135] ? item.obji16[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423137] ? item.obji16[423137] : '' }}
                        <br>
                        <div id="qrcoded16t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji16[423138]!=undefined">
                    <td>@{{item.obji16[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423139] ? item.obji16[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423140] ? item.obji16[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423141] ? item.obji16[423141] : '' }}
                        <br>
                        <div id="qrcodep16t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423142] ? item.obji16[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423143] ? item.obji16[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423145] ? item.obji16[423145] : '' }}
                        <br>
                        <div id="qrcoded16t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji16[423146]!=undefined">
                    <td>@{{item.obji16[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423147] ? item.obji16[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423148] ? item.obji16[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423149] ? item.obji16[423149] : '' }}
                        <br>
                        <div id="qrcodep16t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423150] ? item.obji16[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423151] ? item.obji16[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423153] ? item.obji16[423153] : '' }}
                        <br>
                        <div id="qrcoded16t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji16[423154]!=undefined">
                    <td>@{{item.obji16[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423155] ? item.obji16[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423156] ? item.obji16[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423157] ? item.obji16[423157] : '' }}
                        <br>
                        <div id="qrcodep16t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423158] ? item.obji16[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423159] ? item.obji16[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423161] ? item.obji16[423161] : '' }}
                        <br>
                        <div id="qrcoded16t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji16[423162]!=undefined">
                    <td>@{{item.obji16[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423163] ? item.obji16[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423164] ? item.obji16[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423165] ? item.obji16[423165] : '' }}
                        <br>
                        <div id="qrcodep16t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423166] ? item.obji16[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423167] ? item.obji16[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423169] ? item.obji16[423169] : '' }}
                        <br>
                        <div id="qrcoded16t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji16[423170]!=undefined">
                    <td>@{{item.obji16[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423171] ? item.obji16[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423172] ? item.obji16[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423173] ? item.obji16[423173] : '' }}
                        <br>
                        <div id="qrcodep16t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423174] ? item.obji16[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423175] ? item.obji16[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423177] ? item.obji16[423177] : '' }}
                        <br>
                        <div id="qrcoded16t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji16[423178]!=undefined">
                    <td>@{{item.obji16[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423179] ? item.obji16[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423180] ? item.obji16[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423181] ? item.obji16[423181] : '' }}
                        <br>
                        <div id="qrcodep16t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423182] ? item.obji16[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423183] ? item.obji16[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423185] ? item.obji16[423185] : '' }}
                        <br>
                        <div id="qrcoded16t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji16[423186]!=undefined">
                    <td>@{{item.obji16[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423187] ? item.obji16[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423188] ? item.obji16[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423189] ? item.obji16[423189] : '' }}
                        <br>
                        <div id="qrcodep16t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423190] ? item.obji16[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423191] ? item.obji16[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423193] ? item.obji16[423193] : '' }}
                        <br>
                        <div id="qrcoded16t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji16[423194]!=undefined">
                    <td>@{{item.obji16[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423195] ? item.obji16[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423196] ? item.obji16[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423197] ? item.obji16[423197] : '' }}
                        <br>
                        <div id="qrcodep16t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423198] ? item.obji16[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423199] ? item.obji16[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423201] ? item.obji16[423201] : '' }}
                        <br>
                        <div id="qrcoded16t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji16[423202]!=undefined">
                    <td>@{{item.obji16[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423203] ? item.obji16[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423204] ? item.obji16[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423205] ? item.obji16[423205] : '' }}
                        <br>
                        <div id="qrcodep16t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423206] ? item.obji16[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423207] ? item.obji16[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423209] ? item.obji16[423209] : '' }}
                        <br>
                        <div id="qrcoded16t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji16[423210]!=undefined">
                    <td>@{{item.obji16[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji16[423211] ? item.obji16[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[423212] ? item.obji16[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji16[423213] ? item.obji16[423213] : '' }}
                        <br>
                        <div id="qrcodep16t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji16[423214] ? item.obji16[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[423215] ? item.obji16[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji16[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji16[423217] ? item.obji16[423217] : '' }}
                        <br>
                        <div id="qrcoded16t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d17']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji17[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423051] ? item.obji17[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423052] ? item.obji17[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423053] ? item.obji17[423053] : '' }} 
                        <br>
                        <div id="qrcodep17t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423054] ? item.obji17[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423055] ? item.obji17[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423057] ? item.obji17[423057] : '' }}
                        <br>
                        <div id="qrcoded17t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji17[423058]!=undefined">
                    <td>@{{item.obji17[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423059] ? item.obji17[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423060] ? item.obji17[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423061] ? item.obji17[423061] : '' }}
                        <br>
                        <div id="qrcodep17t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423062] ? item.obji17[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423063] ? item.obji17[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423065] ? item.obji17[423065] : '' }}
                        <br>
                        <div id="qrcoded17t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji17[423066]!=undefined">
                    <td>@{{item.obji17[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423067] ? item.obji17[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423068] ? item.obji17[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423069] ? item.obji17[423069] : '' }}
                        <br>
                        <div id="qrcodep17t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423070] ? item.obji17[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423071] ? item.obji17[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423073] ? item.obji17[423073] : '' }}
                        <br>
                        <div id="qrcoded17t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji17[423074]!=undefined">
                    <td>@{{item.obji17[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423075] ? item.obji17[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423076] ? item.obji17[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423077] ? item.obji17[423077] : '' }}
                        <br>
                        <div id="qrcodep17t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423078] ? item.obji17[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423079] ? item.obji17[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423081] ? item.obji17[423081] : '' }}
                        <br>
                        <div id="qrcoded17t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji17[423082]!=undefined">
                    <td>@{{item.obji17[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423083] ? item.obji17[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423084] ? item.obji17[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423085] ? item.obji17[423085] : '' }}
                        <br>
                        <div id="qrcodep17t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423086] ? item.obji17[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423087] ? item.obji17[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423089] ? item.obji17[423089] : '' }}
                        <br>
                        <div id="qrcoded17t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji17[423090]!=undefined">
                    <td>@{{item.obji17[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423091] ? item.obji17[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423092] ? item.obji17[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423093] ? item.obji17[423093] : '' }}
                        <br>
                        <div id="qrcodep17t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423094] ? item.obji17[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423095] ? item.obji17[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423097] ? item.obji17[423097] : '' }}
                        <br>
                        <div id="qrcoded17t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji17[423098]!=undefined">
                    <td>@{{item.obji17[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423099] ? item.obji17[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423100] ? item.obji17[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423101] ? item.obji17[423101] : '' }}
                        <br>
                        <div id="qrcodep17t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423102] ? item.obji17[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423103] ? item.obji17[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423105] ? item.obji17[423105] : '' }}
                        <br>
                        <div id="qrcoded17t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji17[423106]!=undefined">
                    <td>@{{item.obji17[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423107] ? item.obji17[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423108] ? item.obji17[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423109] ? item.obji17[423109] : '' }}
                        <br>
                        <div id="qrcodep17t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423110] ? item.obji17[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423111] ? item.obji17[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423113] ? item.obji17[423113] : '' }}
                        <br>
                        <div id="qrcoded17t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji17[423114]!=undefined">
                    <td>@{{item.obji17[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423115] ? item.obji17[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423116] ? item.obji17[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423117] ? item.obji17[423117] : '' }}
                        <br>
                        <div id="qrcodep17t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423118] ? item.obji17[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423119] ? item.obji17[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423121] ? item.obji17[423121] : '' }}
                        <br>
                        <div id="qrcoded17t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji17[423122]!=undefined">
                    <td>@{{item.obji17[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423123] ? item.obji17[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423124] ? item.obji17[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423125] ? item.obji17[423125] : '' }}
                        <br>
                        <div id="qrcodep17t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423126] ? item.obji17[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423127] ? item.obji17[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423129] ? item.obji17[423129] : '' }}
                        <br>
                        <div id="qrcoded17t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji17[423130]!=undefined">
                    <td>@{{item.obji17[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423131] ? item.obji17[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423132] ? item.obji17[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423133] ? item.obji17[423133] : '' }}
                        <br>
                        <div id="qrcodep17t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423134] ? item.obji17[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423135] ? item.obji17[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423137] ? item.obji17[423137] : '' }}
                        <br>
                        <div id="qrcoded17t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji17[423138]!=undefined">
                    <td>@{{item.obji17[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423139] ? item.obji17[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423140] ? item.obji17[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423141] ? item.obji17[423141] : '' }}
                        <br>
                        <div id="qrcodep17t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423142] ? item.obji17[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423143] ? item.obji17[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423145] ? item.obji17[423145] : '' }}
                        <br>
                        <div id="qrcoded17t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji17[423146]!=undefined">
                    <td>@{{item.obji17[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423147] ? item.obji17[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423148] ? item.obji17[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423149] ? item.obji17[423149] : '' }}
                        <br>
                        <div id="qrcodep17t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423150] ? item.obji17[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423151] ? item.obji17[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423153] ? item.obji17[423153] : '' }}
                        <br>
                        <div id="qrcoded17t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji17[423154]!=undefined">
                    <td>@{{item.obji17[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423155] ? item.obji17[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423156] ? item.obji17[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423157] ? item.obji17[423157] : '' }}
                        <br>
                        <div id="qrcodep17t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423158] ? item.obji17[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423159] ? item.obji17[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423161] ? item.obji17[423161] : '' }}
                        <br>
                        <div id="qrcoded17t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji17[423162]!=undefined">
                    <td>@{{item.obji17[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423163] ? item.obji17[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423164] ? item.obji17[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423165] ? item.obji17[423165] : '' }}
                        <br>
                        <div id="qrcodep17t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423166] ? item.obji17[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423167] ? item.obji17[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423169] ? item.obji17[423169] : '' }}
                        <br>
                        <div id="qrcoded17t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji17[423170]!=undefined">
                    <td>@{{item.obji17[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423171] ? item.obji17[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423172] ? item.obji17[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423173] ? item.obji17[423173] : '' }}
                        <br>
                        <div id="qrcodep17t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423174] ? item.obji17[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423175] ? item.obji17[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423177] ? item.obji17[423177] : '' }}
                        <br>
                        <div id="qrcoded17t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji17[423178]!=undefined">
                    <td>@{{item.obji17[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423179] ? item.obji17[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423180] ? item.obji17[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423181] ? item.obji17[423181] : '' }}
                        <br>
                        <div id="qrcodep17t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423182] ? item.obji17[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423183] ? item.obji17[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423185] ? item.obji17[423185] : '' }}
                        <br>
                        <div id="qrcoded17t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji17[423186]!=undefined">
                    <td>@{{item.obji17[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423187] ? item.obji17[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423188] ? item.obji17[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423189] ? item.obji17[423189] : '' }}
                        <br>
                        <div id="qrcodep17t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423190] ? item.obji17[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423191] ? item.obji17[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423193] ? item.obji17[423193] : '' }}
                        <br>
                        <div id="qrcoded17t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji17[423194]!=undefined">
                    <td>@{{item.obji17[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423195] ? item.obji17[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423196] ? item.obji17[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423197] ? item.obji17[423197] : '' }}
                        <br>
                        <div id="qrcodep17t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423198] ? item.obji17[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423199] ? item.obji17[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423201] ? item.obji17[423201] : '' }}
                        <br>
                        <div id="qrcoded17t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji17[423202]!=undefined">
                    <td>@{{item.obji17[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423203] ? item.obji17[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423204] ? item.obji17[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423205] ? item.obji17[423205] : '' }}
                        <br>
                        <div id="qrcodep17t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423206] ? item.obji17[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423207] ? item.obji17[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423209] ? item.obji17[423209] : '' }}
                        <br>
                        <div id="qrcoded17t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji17[423210]!=undefined">
                    <td>@{{item.obji17[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji17[423211] ? item.obji17[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[423212] ? item.obji17[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji17[423213] ? item.obji17[423213] : '' }}
                        <br>
                        <div id="qrcodep17t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji17[423214] ? item.obji17[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[423215] ? item.obji17[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji17[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji17[423217] ? item.obji17[423217] : '' }}
                        <br>
                        <div id="qrcoded17t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d18']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji18[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423051] ? item.obji18[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423052] ? item.obji18[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423053] ? item.obji18[423053] : '' }} 
                        <br>
                        <div id="qrcodep18t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423054] ? item.obji18[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423055] ? item.obji18[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423057] ? item.obji18[423057] : '' }}
                        <br>
                        <div id="qrcoded18t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji18[423058]!=undefined">
                    <td>@{{item.obji18[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423059] ? item.obji18[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423060] ? item.obji18[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423061] ? item.obji18[423061] : '' }}
                        <br>
                        <div id="qrcodep18t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423062] ? item.obji18[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423063] ? item.obji18[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423065] ? item.obji18[423065] : '' }}
                        <br>
                        <div id="qrcoded18t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji18[423066]!=undefined">
                    <td>@{{item.obji18[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423067] ? item.obji18[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423068] ? item.obji18[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423069] ? item.obji18[423069] : '' }}
                        <br>
                        <div id="qrcodep18t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423070] ? item.obji18[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423071] ? item.obji18[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423073] ? item.obji18[423073] : '' }}
                        <br>
                        <div id="qrcoded18t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji18[423074]!=undefined">
                    <td>@{{item.obji18[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423075] ? item.obji18[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423076] ? item.obji18[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423077] ? item.obji18[423077] : '' }}
                        <br>
                        <div id="qrcodep18t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423078] ? item.obji18[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423079] ? item.obji18[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423081] ? item.obji18[423081] : '' }}
                        <br>
                        <div id="qrcoded18t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji18[423082]!=undefined">
                    <td>@{{item.obji18[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423083] ? item.obji18[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423084] ? item.obji18[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423085] ? item.obji18[423085] : '' }}
                        <br>
                        <div id="qrcodep18t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423086] ? item.obji18[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423087] ? item.obji18[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423089] ? item.obji18[423089] : '' }}
                        <br>
                        <div id="qrcoded18t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji18[423090]!=undefined">
                    <td>@{{item.obji18[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423091] ? item.obji18[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423092] ? item.obji18[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423093] ? item.obji18[423093] : '' }}
                        <br>
                        <div id="qrcodep18t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423094] ? item.obji18[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423095] ? item.obji18[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423097] ? item.obji18[423097] : '' }}
                        <br>
                        <div id="qrcoded18t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji18[423098]!=undefined">
                    <td>@{{item.obji18[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423099] ? item.obji18[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423100] ? item.obji18[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423101] ? item.obji18[423101] : '' }}
                        <br>
                        <div id="qrcodep18t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423102] ? item.obji18[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423103] ? item.obji18[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423105] ? item.obji18[423105] : '' }}
                        <br>
                        <div id="qrcoded18t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji18[423106]!=undefined">
                    <td>@{{item.obji18[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423107] ? item.obji18[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423108] ? item.obji18[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423109] ? item.obji18[423109] : '' }}
                        <br>
                        <div id="qrcodep18t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423110] ? item.obji18[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423111] ? item.obji18[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423113] ? item.obji18[423113] : '' }}
                        <br>
                        <div id="qrcoded18t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji18[423114]!=undefined">
                    <td>@{{item.obji18[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423115] ? item.obji18[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423116] ? item.obji18[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423117] ? item.obji18[423117] : '' }}
                        <br>
                        <div id="qrcodep18t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423118] ? item.obji18[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423119] ? item.obji18[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423121] ? item.obji18[423121] : '' }}
                        <br>
                        <div id="qrcoded18t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji18[423122]!=undefined">
                    <td>@{{item.obji18[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423123] ? item.obji18[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423124] ? item.obji18[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423125] ? item.obji18[423125] : '' }}
                        <br>
                        <div id="qrcodep18t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423126] ? item.obji18[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423127] ? item.obji18[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423129] ? item.obji18[423129] : '' }}
                        <br>
                        <div id="qrcoded18t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji18[423130]!=undefined">
                    <td>@{{item.obji18[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423131] ? item.obji18[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423132] ? item.obji18[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423133] ? item.obji18[423133] : '' }}
                        <br>
                        <div id="qrcodep18t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423134] ? item.obji18[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423135] ? item.obji18[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423137] ? item.obji18[423137] : '' }}
                        <br>
                        <div id="qrcoded18t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji18[423138]!=undefined">
                    <td>@{{item.obji18[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423139] ? item.obji18[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423140] ? item.obji18[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423141] ? item.obji18[423141] : '' }}
                        <br>
                        <div id="qrcodep18t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423142] ? item.obji18[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423143] ? item.obji18[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423145] ? item.obji18[423145] : '' }}
                        <br>
                        <div id="qrcoded18t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji18[423146]!=undefined">
                    <td>@{{item.obji18[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423147] ? item.obji18[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423148] ? item.obji18[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423149] ? item.obji18[423149] : '' }}
                        <br>
                        <div id="qrcodep18t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423150] ? item.obji18[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423151] ? item.obji18[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423153] ? item.obji18[423153] : '' }}
                        <br>
                        <div id="qrcoded18t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji18[423154]!=undefined">
                    <td>@{{item.obji18[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423155] ? item.obji18[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423156] ? item.obji18[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423157] ? item.obji18[423157] : '' }}
                        <br>
                        <div id="qrcodep18t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423158] ? item.obji18[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423159] ? item.obji18[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423161] ? item.obji18[423161] : '' }}
                        <br>
                        <div id="qrcoded18t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji18[423162]!=undefined">
                    <td>@{{item.obji18[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423163] ? item.obji18[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423164] ? item.obji18[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423165] ? item.obji18[423165] : '' }}
                        <br>
                        <div id="qrcodep18t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423166] ? item.obji18[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423167] ? item.obji18[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423169] ? item.obji18[423169] : '' }}
                        <br>
                        <div id="qrcoded18t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji18[423170]!=undefined">
                    <td>@{{item.obji18[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423171] ? item.obji18[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423172] ? item.obji18[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423173] ? item.obji18[423173] : '' }}
                        <br>
                        <div id="qrcodep18t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423174] ? item.obji18[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423175] ? item.obji18[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423177] ? item.obji18[423177] : '' }}
                        <br>
                        <div id="qrcoded18t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji18[423178]!=undefined">
                    <td>@{{item.obji18[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423179] ? item.obji18[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423180] ? item.obji18[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423181] ? item.obji18[423181] : '' }}
                        <br>
                        <div id="qrcodep18t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423182] ? item.obji18[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423183] ? item.obji18[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423185] ? item.obji18[423185] : '' }}
                        <br>
                        <div id="qrcoded18t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji18[423186]!=undefined">
                    <td>@{{item.obji18[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423187] ? item.obji18[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423188] ? item.obji18[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423189] ? item.obji18[423189] : '' }}
                        <br>
                        <div id="qrcodep18t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423190] ? item.obji18[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423191] ? item.obji18[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423193] ? item.obji18[423193] : '' }}
                        <br>
                        <div id="qrcoded18t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji18[423194]!=undefined">
                    <td>@{{item.obji18[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423195] ? item.obji18[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423196] ? item.obji18[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423197] ? item.obji18[423197] : '' }}
                        <br>
                        <div id="qrcodep18t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423198] ? item.obji18[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423199] ? item.obji18[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423201] ? item.obji18[423201] : '' }}
                        <br>
                        <div id="qrcoded18t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji18[423202]!=undefined">
                    <td>@{{item.obji18[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423203] ? item.obji18[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423204] ? item.obji18[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423205] ? item.obji18[423205] : '' }}
                        <br>
                        <div id="qrcodep18t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423206] ? item.obji18[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423207] ? item.obji18[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423209] ? item.obji18[423209] : '' }}
                        <br>
                        <div id="qrcoded18t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji18[423210]!=undefined">
                    <td>@{{item.obji18[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji18[423211] ? item.obji18[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[423212] ? item.obji18[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji18[423213] ? item.obji18[423213] : '' }}
                        <br>
                        <div id="qrcodep18t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji18[423214] ? item.obji18[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[423215] ? item.obji18[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji18[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji18[423217] ? item.obji18[423217] : '' }}
                        <br>
                        <div id="qrcoded18t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d19']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji19[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423051] ? item.obji19[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423052] ? item.obji19[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423053] ? item.obji19[423053] : '' }} 
                        <br>
                        <div id="qrcodep19t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423054] ? item.obji19[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423055] ? item.obji19[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423057] ? item.obji19[423057] : '' }}
                        <br>
                        <div id="qrcoded19t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji19[423058]!=undefined">
                    <td>@{{item.obji19[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423059] ? item.obji19[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423060] ? item.obji19[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423061] ? item.obji19[423061] : '' }}
                        <br>
                        <div id="qrcodep19t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423062] ? item.obji19[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423063] ? item.obji19[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423065] ? item.obji19[423065] : '' }}
                        <br>
                        <div id="qrcodep19t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji19[423066]!=undefined">
                    <td>@{{item.obji19[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423067] ? item.obji19[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423068] ? item.obji19[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423069] ? item.obji19[423069] : '' }}
                        <br>
                        <div id="qrcodep19t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423070] ? item.obji19[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423071] ? item.obji19[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423073] ? item.obji19[423073] : '' }}
                        <br>
                        <div id="qrcodep19t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji19[423074]!=undefined">
                    <td>@{{item.obji19[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423075] ? item.obji19[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423076] ? item.obji19[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423077] ? item.obji19[423077] : '' }}
                        <br>
                        <div id="qrcodep19t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423078] ? item.obji19[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423079] ? item.obji19[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423081] ? item.obji19[423081] : '' }}
                        <br>
                        <div id="qrcodep19t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji19[423082]!=undefined">
                    <td>@{{item.obji19[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423083] ? item.obji19[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423084] ? item.obji19[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423085] ? item.obji19[423085] : '' }}
                        <br>
                        <div id="qrcodep19t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423086] ? item.obji19[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423087] ? item.obji19[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423089] ? item.obji19[423089] : '' }}
                        <br>
                        <div id="qrcodep19t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji19[423090]!=undefined">
                    <td>@{{item.obji19[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423091] ? item.obji19[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423092] ? item.obji19[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423093] ? item.obji19[423093] : '' }}
                        <br>
                        <div id="qrcodep19t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423094] ? item.obji19[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423095] ? item.obji19[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423097] ? item.obji19[423097] : '' }}
                        <br>
                        <div id="qrcodep19t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji19[423098]!=undefined">
                    <td>@{{item.obji19[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423099] ? item.obji19[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423100] ? item.obji19[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423101] ? item.obji19[423101] : '' }}
                        <br>
                        <div id="qrcodep19t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423102] ? item.obji19[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423103] ? item.obji19[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423105] ? item.obji19[423105] : '' }}
                        <br>
                        <div id="qrcodep19t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji19[423106]!=undefined">
                    <td>@{{item.obji19[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423107] ? item.obji19[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423108] ? item.obji19[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423109] ? item.obji19[423109] : '' }}
                        <br>
                        <div id="qrcodep19t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423110] ? item.obji19[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423111] ? item.obji19[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423113] ? item.obji19[423113] : '' }}
                        <br>
                        <div id="qrcodep19t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji19[423114]!=undefined">
                    <td>@{{item.obji19[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423115] ? item.obji19[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423116] ? item.obji19[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423117] ? item.obji19[423117] : '' }}
                        <br>
                        <div id="qrcodep19t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423118] ? item.obji19[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423119] ? item.obji19[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423121] ? item.obji19[423121] : '' }}
                        <br>
                        <div id="qrcodep19t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji19[423122]!=undefined">
                    <td>@{{item.obji19[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423123] ? item.obji19[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423124] ? item.obji19[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423125] ? item.obji19[423125] : '' }}
                        <br>
                        <div id="qrcodep19t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423126] ? item.obji19[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423127] ? item.obji19[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423129] ? item.obji19[423129] : '' }}
                        <br>
                        <div id="qrcodep19t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji19[423130]!=undefined">
                    <td>@{{item.obji19[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423131] ? item.obji19[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423132] ? item.obji19[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423133] ? item.obji19[423133] : '' }}
                        <br>
                        <div id="qrcodep19t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423134] ? item.obji19[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423135] ? item.obji19[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423137] ? item.obji19[423137] : '' }}
                        <br>
                        <div id="qrcodep19t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji19[423138]!=undefined">
                    <td>@{{item.obji19[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423139] ? item.obji19[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423140] ? item.obji19[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423141] ? item.obji19[423141] : '' }}
                        <br>
                        <div id="qrcodep19t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423142] ? item.obji19[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423143] ? item.obji19[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423145] ? item.obji19[423145] : '' }}
                        <br>
                        <div id="qrcodep19t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji19[423146]!=undefined">
                    <td>@{{item.obji19[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423147] ? item.obji19[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423148] ? item.obji19[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423149] ? item.obji19[423149] : '' }}
                        <br>
                        <div id="qrcodep19t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423150] ? item.obji19[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423151] ? item.obji19[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423153] ? item.obji19[423153] : '' }}
                        <br>
                        <div id="qrcodep19t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji19[423154]!=undefined">
                    <td>@{{item.obji19[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423155] ? item.obji19[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423156] ? item.obji19[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423157] ? item.obji19[423157] : '' }}
                        <br>
                        <div id="qrcodep19t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423158] ? item.obji19[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423159] ? item.obji19[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423161] ? item.obji19[423161] : '' }}
                        <br>
                        <div id="qrcodep19t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji19[423162]!=undefined">
                    <td>@{{item.obji19[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423163] ? item.obji19[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423164] ? item.obji19[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423165] ? item.obji19[423165] : '' }}
                        <br>
                        <div id="qrcodep19t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423166] ? item.obji19[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423167] ? item.obji19[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423169] ? item.obji19[423169] : '' }}
                        <br>
                        <div id="qrcodep19t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji19[423170]!=undefined">
                    <td>@{{item.obji19[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423171] ? item.obji19[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423172] ? item.obji19[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423173] ? item.obji19[423173] : '' }}
                        <br>
                        <div id="qrcodep19t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423174] ? item.obji19[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423175] ? item.obji19[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423177] ? item.obji19[423177] : '' }}
                        <br>
                        <div id="qrcodep19t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji19[423178]!=undefined">
                    <td>@{{item.obji19[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423179] ? item.obji19[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423180] ? item.obji19[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423181] ? item.obji19[423181] : '' }}
                        <br>
                        <div id="qrcodep19t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423182] ? item.obji19[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423183] ? item.obji19[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423185] ? item.obji19[423185] : '' }}
                        <br>
                        <div id="qrcodep19t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji19[423186]!=undefined">
                    <td>@{{item.obji19[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423187] ? item.obji19[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423188] ? item.obji19[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423189] ? item.obji19[423189] : '' }}
                        <br>
                        <div id="qrcodep19t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423190] ? item.obji19[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423191] ? item.obji19[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423193] ? item.obji19[423193] : '' }}
                        <br>
                        <div id="qrcodep19t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji19[423194]!=undefined">
                    <td>@{{item.obji19[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423195] ? item.obji19[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423196] ? item.obji19[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423197] ? item.obji19[423197] : '' }}
                        <br>
                        <div id="qrcodep19t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423198] ? item.obji19[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423199] ? item.obji19[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423201] ? item.obji19[423201] : '' }}
                        <br>
                        <div id="qrcodep19t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji19[423202]!=undefined">
                    <td>@{{item.obji19[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423203] ? item.obji19[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423204] ? item.obji19[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423205] ? item.obji19[423205] : '' }}
                        <br>
                        <div id="qrcodep19t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423206] ? item.obji19[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423207] ? item.obji19[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423209] ? item.obji19[423209] : '' }}
                        <br>
                        <div id="qrcodep19t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji19[423210]!=undefined">
                    <td>@{{item.obji19[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji19[423211] ? item.obji19[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[423212] ? item.obji19[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji19[423213] ? item.obji19[423213] : '' }}
                        <br>
                        <div id="qrcodep19t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji19[423214] ? item.obji19[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[423215] ? item.obji19[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji19[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji19[423217] ? item.obji19[423217] : '' }}
                        <br>
                        <div id="qrcodep19t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif

    @if (!empty($res['d20']))
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
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                    <td>@{{item.obji20[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423051] ? item.obji20[423051] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423052] ? item.obji20[423052] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423053] ? item.obji20[423053] : '' }} 
                        <br>
                        <div id="qrcodep20t1" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423054] ? item.obji20[423054] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423055] ? item.obji20[423055] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423057] ? item.obji20[423057] : '' }}
                        <br>
                        <div id="qrcoded20t1" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 2 --}} 
                <tr style="height:150px" ng-show="item.obji20[423058]!=undefined">
                    <td>@{{item.obji20[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423059] ? item.obji20[423059] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423060] ? item.obji20[423060] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423061] ? item.obji20[423061] : '' }}
                        <br>
                        <div id="qrcodep20t2" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423062] ? item.obji20[423062] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423063] ? item.obji20[423063] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423065] ? item.obji20[423065] : '' }}
                        <br>
                        <div id="qrcoded20t2" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 3 --}}
                <tr style="height:150px" ng-show="item.obji20[423066]!=undefined">
                    <td>@{{item.obji20[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423067] ? item.obji20[423067] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423068] ? item.obji20[423068] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423069] ? item.obji20[423069] : '' }}
                        <br>
                        <div id="qrcodep20t3" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423070] ? item.obji20[423070] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423071] ? item.obji20[423071] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423073] ? item.obji20[423073] : '' }}
                        <br>
                        <div id="qrcoded20t3" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 4 --}}
                <tr style="height:150px" ng-show="item.obji20[423074]!=undefined">
                    <td>@{{item.obji20[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423075] ? item.obji20[423075] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423076] ? item.obji20[423076] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423077] ? item.obji20[423077] : '' }}
                        <br>
                        <div id="qrcodep20t4" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423078] ? item.obji20[423078] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423079] ? item.obji20[423079] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423081] ? item.obji20[423081] : '' }}
                        <br>
                        <div id="qrcoded20t4" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 5 --}}
                <tr style="height:150px" ng-show="item.obji20[423082]!=undefined">
                    <td>@{{item.obji20[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423083] ? item.obji20[423083] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423084] ? item.obji20[423084] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423085] ? item.obji20[423085] : '' }}
                        <br>
                        <div id="qrcodep20t5" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423086] ? item.obji20[423086] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423087] ? item.obji20[423087] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423089] ? item.obji20[423089] : '' }}
                        <br>
                        <div id="qrcoded20t5" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 6 --}}
                <tr style="height:150px" ng-show="item.obji20[423090]!=undefined">
                    <td>@{{item.obji20[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423091] ? item.obji20[423091] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423092] ? item.obji20[423092] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423093] ? item.obji20[423093] : '' }}
                        <br>
                        <div id="qrcodep20t6" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423094] ? item.obji20[423094] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423095] ? item.obji20[423095] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423097] ? item.obji20[423097] : '' }}
                        <br>
                        <div id="qrcoded20t6" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 7 --}}
                <tr style="height:150px" ng-show="item.obji20[423098]!=undefined">
                    <td>@{{item.obji20[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423099] ? item.obji20[423099] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423100] ? item.obji20[423100] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423101] ? item.obji20[423101] : '' }}
                        <br>
                        <div id="qrcodep20t7" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423102] ? item.obji20[423102] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423103] ? item.obji20[423103] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423105] ? item.obji20[423105] : '' }}
                        <br>
                        <div id="qrcoded20t7" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 8 --}}
                <tr style="height:150px" ng-show="item.obji20[423106]!=undefined">
                    <td>@{{item.obji20[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423107] ? item.obji20[423107] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423108] ? item.obji20[423108] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423109] ? item.obji20[423109] : '' }}
                        <br>
                        <div id="qrcodep20t8" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423110] ? item.obji20[423110] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423111] ? item.obji20[423111] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423113] ? item.obji20[423113] : '' }}
                        <br>
                        <div id="qrcoded20t8" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 9 --}}
                <tr style="height:150px" ng-show="item.obji20[423114]!=undefined">
                    <td>@{{item.obji20[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423115] ? item.obji20[423115] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423116] ? item.obji20[423116] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423117] ? item.obji20[423117] : '' }}
                        <br>
                        <div id="qrcodep20t9" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423118] ? item.obji20[423118] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423119] ? item.obji20[423119] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423121] ? item.obji20[423121] : '' }}
                        <br>
                        <div id="qrcoded20t9" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 10 --}}
                <tr style="height:150px" ng-show="item.obji20[423122]!=undefined">
                    <td>@{{item.obji20[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423123] ? item.obji20[423123] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423124] ? item.obji20[423124] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423125] ? item.obji20[423125] : '' }}
                        <br>
                        <div id="qrcodep20t10" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423126] ? item.obji20[423126] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423127] ? item.obji20[423127] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423129] ? item.obji20[423129] : '' }}
                        <br>
                        <div id="qrcoded20t10" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 11 --}}
                <tr style="height:150px" ng-show="item.obji20[423130]!=undefined">
                    <td>@{{item.obji20[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423131] ? item.obji20[423131] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423132] ? item.obji20[423132] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423133] ? item.obji20[423133] : '' }}
                        <br>
                        <div id="qrcodep20t11" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423134] ? item.obji20[423134] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423135] ? item.obji20[423135] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423137] ? item.obji20[423137] : '' }}
                        <br>
                        <div id="qrcoded20t11" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 12 --}}
                <tr style="height:150px" ng-show="item.obji20[423138]!=undefined">
                    <td>@{{item.obji20[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423139] ? item.obji20[423139] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423140] ? item.obji20[423140] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423141] ? item.obji20[423141] : '' }}
                        <br>
                        <div id="qrcodep20t12" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423142] ? item.obji20[423142] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423143] ? item.obji20[423143] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423145] ? item.obji20[423145] : '' }}
                        <br>
                        <div id="qrcoded20t12" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 13 --}}
                <tr style="height:150px" ng-show="item.obji20[423146]!=undefined">
                    <td>@{{item.obji20[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423147] ? item.obji20[423147] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423148] ? item.obji20[423148] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423149] ? item.obji20[423149] : '' }}
                        <br>
                        <div id="qrcodep20t13" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423150] ? item.obji20[423150] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423151] ? item.obji20[423151] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423153] ? item.obji20[423153] : '' }}
                        <br>
                        <div id="qrcoded20t13" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 14 --}}
                <tr style="height:150px" ng-show="item.obji20[423154]!=undefined">
                    <td>@{{item.obji20[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423155] ? item.obji20[423155] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423156] ? item.obji20[423156] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423157] ? item.obji20[423157] : '' }}
                        <br>
                        <div id="qrcodep20t14" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423158] ? item.obji20[423158] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423159] ? item.obji20[423159] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423161] ? item.obji20[423161] : '' }}
                        <br>
                        <div id="qrcoded20t14" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 15 --}}
                <tr style="height:150px" ng-show="item.obji20[423162]!=undefined">
                    <td>@{{item.obji20[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423163] ? item.obji20[423163] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423164] ? item.obji20[423164] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423165] ? item.obji20[423165] : '' }}
                        <br>
                        <div id="qrcodep20t15" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423166] ? item.obji20[423166] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423167] ? item.obji20[423167] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423169] ? item.obji20[423169] : '' }}
                        <br>
                        <div id="qrcoded20t15" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 16 --}}
                <tr style="height:150px" ng-show="item.obji20[423170]!=undefined">
                    <td>@{{item.obji20[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423171] ? item.obji20[423171] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423172] ? item.obji20[423172] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423173] ? item.obji20[423173] : '' }}
                        <br>
                        <div id="qrcodep20t16" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423174] ? item.obji20[423174] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423175] ? item.obji20[423175] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423177] ? item.obji20[423177] : '' }}
                        <br>
                        <div id="qrcoded20t16" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 17 --}}
                <tr style="height:150px" ng-show="item.obji20[423178]!=undefined">
                    <td>@{{item.obji20[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423179] ? item.obji20[423179] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423180] ? item.obji20[423180] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423181] ? item.obji20[423181] : '' }}
                        <br>
                        <div id="qrcodep20t17" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423182] ? item.obji20[423182] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423183] ? item.obji20[423183] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423185] ? item.obji20[423185] : '' }}
                        <br>
                        <div id="qrcoded20t17" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 18 --}}
                <tr style="height:150px" ng-show="item.obji20[423186]!=undefined">
                    <td>@{{item.obji20[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423187] ? item.obji20[423187] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423188] ? item.obji20[423188] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423189] ? item.obji20[423189] : '' }}
                        <br>
                        <div id="qrcodep20t18" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423190] ? item.obji20[423190] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423191] ? item.obji20[423191] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423193] ? item.obji20[423193] : '' }}
                        <br>
                        <div id="qrcoded20t18" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 19 --}}
                <tr style="height:150px" ng-show="item.obji20[423194]!=undefined">
                    <td>@{{item.obji20[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423195] ? item.obji20[423195] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423196] ? item.obji20[423196] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423197] ? item.obji20[423197] : '' }}
                        <br>
                        <div id="qrcodep20t19" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423198] ? item.obji20[423198] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423199] ? item.obji20[423199] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423201] ? item.obji20[423201] : '' }}
                        <br>
                        <div id="qrcoded20t19" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 20 --}}
                <tr style="height:150px" ng-show="item.obji20[423202]!=undefined">
                    <td>@{{item.obji20[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423203] ? item.obji20[423203] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423204] ? item.obji20[423204] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423205] ? item.obji20[423205] : '' }}
                        <br>
                        <div id="qrcodep20t20" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423206] ? item.obji20[423206] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423207] ? item.obji20[423207] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423209] ? item.obji20[423209] : '' }}
                        <br>
                        <div id="qrcoded20t20" style="text-align: right"></div>
                    </td>
                </tr>
                {{-- 21 --}}
                <tr style="height:150px" ng-show="item.obji20[423210]!=undefined">
                    <td>@{{item.obji20[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td>@{{ item.obji20[423211] ? item.obji20[423211] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[423212] ? item.obji20[423212] : '' }} <br><br> 
                        Paraf : @{{ item.obji20[423213] ? item.obji20[423213] : '' }}
                        <br>
                        <div id="qrcodep20t21" style="text-align: right"></div>
                    </td>
                    <td colspan="2">@{{ item.obji20[423214] ? item.obji20[423214] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[423215] ? item.obji20[423215] : '' }} <br><br> 
                        Tanggal : @{{item.obji20[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                        Paraf : @{{ item.obji20[423217] ? item.obji20[423217] : '' }}
                        <br>
                        <div id="qrcoded20t21" style="text-align: right"></div>
                    </td>
                </tr>
            </table>
        </section>
    @endif
			
</body>
@include('report.script-cppt')
</html>
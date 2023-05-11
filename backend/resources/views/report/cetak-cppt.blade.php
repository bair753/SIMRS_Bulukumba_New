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
<body ng-controller="cetakCPPT">
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
                <td>@{{item.obj[423050] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423051] ? item.obj[423051] : '' }}</td>
                <td colspan="3">@{{ item.obj[423052] ? item.obj[423052] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423053] ? item.obj[423053] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423054] ? item.obj[423054] : '' }}</td>
                <td colspan="2">@{{ item.obj[423055] ? item.obj[423055] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423056] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423057] ? item.obj[423057] : '' }}
                </td>
            </tr>
            {{-- 2 --}} 
            <tr style="height:150px" ng-show="item.obj[423058]!=undefined">
                <td>@{{item.obj[423058] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423059] ? item.obj[423059] : '' }}</td>
                <td colspan="3">@{{ item.obj[423060] ? item.obj[423060] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423061] ? item.obj[423061] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423062] ? item.obj[423062] : '' }}</td>
                <td colspan="2">@{{ item.obj[423063] ? item.obj[423063] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423064] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423065] ? item.obj[423065] : '' }}
                </td>
            </tr>
            {{-- 3 --}}
            <tr style="height:150px" ng-show="item.obj[423066]!=undefined">
                <td>@{{item.obj[423066] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423067] ? item.obj[423067] : '' }}</td>
                <td colspan="3">@{{ item.obj[423068] ? item.obj[423068] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423069] ? item.obj[423069] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423070] ? item.obj[423070] : '' }}</td>
                <td colspan="2">@{{ item.obj[423071] ? item.obj[423071] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423072] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423073] ? item.obj[423073] : '' }}
                </td>
            </tr>
            {{-- 4 --}}
            <tr style="height:150px" ng-show="item.obj[423074]!=undefined">
                <td>@{{item.obj[423074] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423075] ? item.obj[423075] : '' }}</td>
                <td colspan="3">@{{ item.obj[423076] ? item.obj[423076] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423077] ? item.obj[423077] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423078] ? item.obj[423078] : '' }}</td>
                <td colspan="2">@{{ item.obj[423079] ? item.obj[423079] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423080] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423081] ? item.obj[423081] : '' }}
                </td>
            </tr>
            {{-- 5 --}}
            <tr style="height:150px" ng-show="item.obj[423082]!=undefined">
                <td>@{{item.obj[423082] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423083] ? item.obj[423083] : '' }}</td>
                <td colspan="3">@{{ item.obj[423084] ? item.obj[423084] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423085] ? item.obj[423085] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423086] ? item.obj[423086] : '' }}</td>
                <td colspan="2">@{{ item.obj[423087] ? item.obj[423087] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423088] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423089] ? item.obj[423089] : '' }}
                </td>
            </tr>
            {{-- 6 --}}
            <tr style="height:150px" ng-show="item.obj[423090]!=undefined">
                <td>@{{item.obj[423090] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423091] ? item.obj[423091] : '' }}</td>
                <td colspan="3">@{{ item.obj[423092] ? item.obj[423092] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423093] ? item.obj[423093] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423094] ? item.obj[423094] : '' }}</td>
                <td colspan="2">@{{ item.obj[423095] ? item.obj[423095] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423096] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423097] ? item.obj[423097] : '' }}
                </td>
            </tr>
            {{-- 7 --}}
            <tr style="height:150px" ng-show="item.obj[423098]!=undefined">
                <td>@{{item.obj[423098] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423099] ? item.obj[423099] : '' }}</td>
                <td colspan="3">@{{ item.obj[423100] ? item.obj[423100] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423101] ? item.obj[423101] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423102] ? item.obj[423102] : '' }}</td>
                <td colspan="2">@{{ item.obj[423103] ? item.obj[423103] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423104] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423105] ? item.obj[423105] : '' }}
                </td>
            </tr>
            {{-- 8 --}}
            <tr style="height:150px" ng-show="item.obj[423106]!=undefined">
                <td>@{{item.obj[423106] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423107] ? item.obj[423107] : '' }}</td>
                <td colspan="3">@{{ item.obj[423108] ? item.obj[423108] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423109] ? item.obj[423109] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423110] ? item.obj[423110] : '' }}</td>
                <td colspan="2">@{{ item.obj[423111] ? item.obj[423111] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423112] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423113] ? item.obj[423113] : '' }}
                </td>
            </tr>
            {{-- 9 --}}
            <tr style="height:150px" ng-show="item.obj[423114]!=undefined">
                <td>@{{item.obj[423114] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423115] ? item.obj[423115] : '' }}</td>
                <td colspan="3">@{{ item.obj[423116] ? item.obj[423116] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423117] ? item.obj[423117] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423118] ? item.obj[423118] : '' }}</td>
                <td colspan="2">@{{ item.obj[423119] ? item.obj[423119] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423120] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423121] ? item.obj[423121] : '' }}
                </td>
            </tr>
            {{-- 10 --}}
            <tr style="height:150px" ng-show="item.obj[423122]!=undefined">
                <td>@{{item.obj[423122] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423123] ? item.obj[423123] : '' }}</td>
                <td colspan="3">@{{ item.obj[423124] ? item.obj[423124] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423125] ? item.obj[423125] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423126] ? item.obj[423126] : '' }}</td>
                <td colspan="2">@{{ item.obj[423127] ? item.obj[423127] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423128] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423129] ? item.obj[423129] : '' }}
                </td>
            </tr>
            {{-- 11 --}}
            <tr style="height:150px" ng-show="item.obj[423130]!=undefined">
                <td>@{{item.obj[423130] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423131] ? item.obj[423131] : '' }}</td>
                <td colspan="3">@{{ item.obj[423132] ? item.obj[423132] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423133] ? item.obj[423133] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423134] ? item.obj[423134] : '' }}</td>
                <td colspan="2">@{{ item.obj[423135] ? item.obj[423135] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423136] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423137] ? item.obj[423137] : '' }}
                </td>
            </tr>
            {{-- 12 --}}
            <tr style="height:150px" ng-show="item.obj[423138]!=undefined">
                <td>@{{item.obj[423138] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423139] ? item.obj[423139] : '' }}</td>
                <td colspan="3">@{{ item.obj[423140] ? item.obj[423140] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423141] ? item.obj[423141] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423142] ? item.obj[423142] : '' }}</td>
                <td colspan="2">@{{ item.obj[423143] ? item.obj[423143] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423144] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423145] ? item.obj[423145] : '' }}
                </td>
            </tr>
            {{-- 13 --}}
            <tr style="height:150px" ng-show="item.obj[423146]!=undefined">
                <td>@{{item.obj[423146] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423147] ? item.obj[423147] : '' }}</td>
                <td colspan="3">@{{ item.obj[423148] ? item.obj[423148] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423149] ? item.obj[423149] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423150] ? item.obj[423150] : '' }}</td>
                <td colspan="2">@{{ item.obj[423151] ? item.obj[423151] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423152] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423153] ? item.obj[423153] : '' }}
                </td>
            </tr>
            {{-- 14 --}}
            <tr style="height:150px" ng-show="item.obj[423154]!=undefined">
                <td>@{{item.obj[423154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423155] ? item.obj[423155] : '' }}</td>
                <td colspan="3">@{{ item.obj[423156] ? item.obj[423156] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423157] ? item.obj[423157] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423158] ? item.obj[423158] : '' }}</td>
                <td colspan="2">@{{ item.obj[423159] ? item.obj[423159] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423160] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423161] ? item.obj[423161] : '' }}
                </td>
            </tr>
            {{-- 15 --}}
            <tr style="height:150px" ng-show="item.obj[423162]!=undefined">
                <td>@{{item.obj[423162] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423163] ? item.obj[423163] : '' }}</td>
                <td colspan="3">@{{ item.obj[423164] ? item.obj[423164] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423165] ? item.obj[423165] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423166] ? item.obj[423166] : '' }}</td>
                <td colspan="2">@{{ item.obj[423167] ? item.obj[423167] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423168] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423169] ? item.obj[423169] : '' }}
                </td>
            </tr>
            {{-- 16 --}}
            <tr style="height:150px" ng-show="item.obj[423170]!=undefined">
                <td>@{{item.obj[423170] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423171] ? item.obj[423171] : '' }}</td>
                <td colspan="3">@{{ item.obj[423172] ? item.obj[423172] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423173] ? item.obj[423173] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423174] ? item.obj[423174] : '' }}</td>
                <td colspan="2">@{{ item.obj[423175] ? item.obj[423175] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423176] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423177] ? item.obj[423177] : '' }}
                </td>
            </tr>
            {{-- 17 --}}
            <tr style="height:150px" ng-show="item.obj[423178]!=undefined">
                <td>@{{item.obj[423178] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423179] ? item.obj[423179] : '' }}</td>
                <td colspan="3">@{{ item.obj[423180] ? item.obj[423180] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423181] ? item.obj[423181] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423182] ? item.obj[423182] : '' }}</td>
                <td colspan="2">@{{ item.obj[423183] ? item.obj[423183] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423184] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423185] ? item.obj[423185] : '' }}
                </td>
            </tr>
            {{-- 18 --}}
            <tr style="height:150px" ng-show="item.obj[423186]!=undefined">
                <td>@{{item.obj[423186] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423187] ? item.obj[423187] : '' }}</td>
                <td colspan="3">@{{ item.obj[423188] ? item.obj[423188] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423189] ? item.obj[423189] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423190] ? item.obj[423190] : '' }}</td>
                <td colspan="2">@{{ item.obj[423191] ? item.obj[423191] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423192] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423193] ? item.obj[423193] : '' }}
                </td>
            </tr>
            {{-- 19 --}}
            <tr style="height:150px" ng-show="item.obj[423194]!=undefined">
                <td>@{{item.obj[423194] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423195] ? item.obj[423195] : '' }}</td>
                <td colspan="3">@{{ item.obj[423196] ? item.obj[423196] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423197] ? item.obj[423197] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423198] ? item.obj[423198] : '' }}</td>
                <td colspan="2">@{{ item.obj[423199] ? item.obj[423199] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423200] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423201] ? item.obj[423201] : '' }}
                </td>
            </tr>
            {{-- 20 --}}
            <tr style="height:150px" ng-show="item.obj[423202]!=undefined">
                <td>@{{item.obj[423202] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423203] ? item.obj[423203] : '' }}</td>
                <td colspan="3">@{{ item.obj[423204] ? item.obj[423204] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423205] ? item.obj[423205] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423206] ? item.obj[423206] : '' }}</td>
                <td colspan="2">@{{ item.obj[423207] ? item.obj[423207] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423208] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423209] ? item.obj[423209] : '' }}
                </td>
            </tr>
            {{-- 21 --}}
            <tr style="height:150px" ng-show="item.obj[423210]!=undefined">
                <td>@{{item.obj[423210] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td>@{{ item.obj[423211] ? item.obj[423211] : '' }}</td>
                <td colspan="3">@{{ item.obj[423212] ? item.obj[423212] : '' }} <br><br> 
                    Paraf : @{{ item.obj[423213] ? item.obj[423213] : '' }}
                </td>
                <td colspan="2">@{{ item.obj[423214] ? item.obj[423214] : '' }}</td>
                <td colspan="2">@{{ item.obj[423215] ? item.obj[423215] : '' }} <br><br> 
                    Tanggal : @{{item.obj[423216] | toDate | date:'dd MMMM yyyy HH:mm'}} <br><br> 
                    Paraf : @{{ item.obj[423217] ? item.obj[423217] : '' }}
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

    angular.controller('cetakCPPT', function ($scope, $http, httpService) {
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

        var dokter = $scope.item.obj[31100569];
        var dpjp = $scope.item.obj[31100576];
        jQuery('#qrcodeDokter').qrcode({
            width	: 100,
			height	: 100,
            text	: "Tanda Tangan Digital Oleh " + dokter
        });	

        jQuery('#qrcodeDPJP').qrcode({
            width	: 100,
			height	: 100,
            text	: "Tanda Tangan Digital Oleh " + dpjp
        });	
    })

    angular.filter('toDate', function() {
    return function(items) {
        return new Date(items);
        };
    });
    // $(document).ready(function () {
    //     window.print();
    // });
</script>
</html>
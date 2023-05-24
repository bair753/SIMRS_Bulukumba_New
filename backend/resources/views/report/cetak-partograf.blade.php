<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partograf</title>
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
        body{
            width:210mm;
            height:297mm;
            margin-top:250mm;
            margin-bottom:250mm;
            margin-left:250mm;
            margin-right:250mm;
            margin:0 auto; 
        }
        @page{
            size: A4;
        }
        table{ 
            page-break-inside:auto 
        }
        tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        }
        table{
            border:1px solid #000;
            border-collapse:collapse;
            table-layout:fixed;
        }
        tr td{
            border:1px solid #000;
            border-collapse:collapse;
        }
        .mintd{
            width:48pt;
        }
        img{
            width:70%;
            height:70%;
            object-fit: cover;
        }
        .logo{
            width:50px !important;
        }
        .text-center{
            text-align: center;
        }
        .bordered{
            border:1px solid #000;
        }
        .noborder{
            border:none;
        }
        .border-lr{
            border:1px solid #000;
            border-top:none;
            border-bottom:none;
        }
        .border-tb{
            border:1px solid #000;
            border-left:none;
            border-right:none;
        }
        table tr td{
            font-size: xx-small;
        }
        table tr{
            height:13pt
        }
        .bg-dark{
            background:#000;
            color:#fff;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: x-large;
            padding:.5rem;
            height:20pt !important;
        }
        .bg-dark-small{
            background:#000;
            color:#fff;
        }
        .rotate{
            vertical-align: bottom;
            text-align: center;
        }
        #rotate{
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }
    </style>
</head>
<body  ng-controller="cetakPartograf">
    <table width='100%'>
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="noborder-tb text-center" style="padding:.3rem">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb">
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder">No. RM </td>
            <td colspan="13" class="noborder">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Nama Lengkap</td>
            <td colspan="11" class="noborder">
                : {!!  $res['d'][0]->namapasien  !!} 
            </td>
            <td colspan="2" class="noborder">{!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" rowspan="2" style="font-size:xx-large;text-align: center;">56</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PARTOGRAF</th>
        </tr>
        <tr class="noborder">
            <td colspan="8" class="noborder">G: @{{ item.obj[18000300] ? item.obj[18000300] : '................' }}</td>
            <td colspan="8" class="noborder">P: @{{ item.obj[18000301] ? item.obj[18000301] : '................' }}</td>
            <td colspan="8" class="noborder">A: @{{ item.obj[18000302] ? item.obj[18000302] : '................' }}</td>
        </tr>
        <tr>
            <td colspan="25">
                Ketuban Pecah Sejak Jam : @{{item.obj[18000303] | toDate | date:'HH:mm'}} WITA
            </td>
            <td colspan="24">
                Mules Sejak Jam : @{{item.obj[18000304] | toDate | date:'HH:mm'}} WITA
            </td>
        </tr>
        <tr style="border:none">
            <td colspan="49" style="border-bottom:none"></td>
        </tr>
        <tr>
            <td colspan="10" rowspan="13" style="border:none;text-align:center">Denyut Jantung Janin (    / mnt)</td>
            <td colspan="7" style="text-align:right;border:none">200</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">190</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">180</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">170</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">160</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">150</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">140</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">130</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">120</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">110</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">100</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">90</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="7" style="text-align:right;border:none">80</td>
            <td colspan="32"></td>
        </tr>
        <tr>
            <td colspan="17" style="text-align:right;border:none">Air Ketuban</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="17" style="text-align:right;border:none">Penyusupan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="46" style="text-align:right;border:none"></td>
        </tr>
        <tr>
            <td class="rotate" colspan="7" rowspan="12" style="border:none">
                <span id="rotate">
                    Pembukaan serviks (cm) beri tanda x <br> 
                    Turunnya kepala 
                    <br>beri tanda o
                </span>
            </td>
            <td colspan="10" style="text-align:right;border:none">10</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">9</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">8</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">7</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">6</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">5</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">2</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="10" style="text-align:right;border:none">0</td>
            <td colspan="2">1</td>
            <td colspan="2">2</td>
            <td colspan="2">3</td>
            <td colspan="2">4</td>
            <td colspan="2">5</td>
            <td colspan="2">6</td>
            <td colspan="2">7</td>
            <td colspan="2">8</td>
            <td colspan="2">9</td>
            <td colspan="2">10</td>
            <td colspan="2">11</td>
            <td colspan="2">12</td>
            <td colspan="2">13</td>
            <td colspan="2">14</td>
            <td colspan="2">15</td>
            <td colspan="2">16</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:right;border:none">Waktu <br>(jam)</td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="36" style="border:none"></td>
        </tr>
        <tr>
            <td valign="bottom" colspan="8" rowspan="5" style="border:none;text-align:center">Kontraksi <br> Tiap <br> 0 Menit</td>
            <td colspan="3" style="border:none"></td>
            <td colspan="6" style="text-align: right;border:none">5</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" style="border:none"></td>
            <td colspan="6" style="text-align: right;border:none">< 20 4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td colspan="6" style="text-align: right;border:none">20-40 3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td colspan="6" style="text-align: right;border:none">> 40 2</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td colspan="6" style="text-align: right;border:none">( dok) 1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="33" style="border:none"></td>
        </tr>
        <tr>
            <td colspan="17" style="text-align:right;border:none">Obat dan <br>
                Cairan IV
               </td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="8" valign="top" rowspan="13" style="text-align:center;border:none">
                <li>
                    Nadi
                </li>
            </td>
            <td colspan="6" rowspan="13" valign="middle" style="border:none;">Tekanan
                <br>darah
              </td>
            <td colspan="3"style="border:none;text-align:right">180</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">170</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">160</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">150</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">140</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">130</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">120</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">110</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">100</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">90</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">80</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">70</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3"style="border:none;text-align:right">60</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="36" style="border:none"></td>
        </tr>
        <tr>
            <td colspan="8" style="border:none;text-align:center">
                <li>
                    Suhu
                </li>
            </td>
            <td colspan="9" style="border:none;text-align:right">&#x2103;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="3" style="border:none" valign="middle">Urin</td>
            <td colspan="5" style="border-right:none"></td>
            <td colspan="3" style="border:none"></td>
            <td colspan="6" style="border:none">Protein</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" style="border-right:none"></td>
            <td colspan="3" style="border:none"></td>
            <td colspan="6" style="border:none">Aseton</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr height="30pt">
            <td colspan="5" style="border:none"></td>
            <td colspan="3" style="border:none"></td>
            <td colspan="6" style="border:none">Volume </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="height:5pt"></tr>
        <!-- next page  -->
        <tr style="border-top:1px solid #000">
            <td colspan="24" class="noborder bg-dark-small">Catatan Persalinan</td>
            <td class="noborder">24.</td>
            <td colspan="24" class="noborder">Masase fundus uteri?</td>
        </tr>
        <tr>
            <td class="noborder ">1.</td>
            <td colspan="3" class="noborder ">Tanggal </td>
            <td colspan="20" class="noborder ">: @{{item.obj[1000415] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td class="noborder" colspan="25">@{{ item.obj[1000486] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
        </tr>
        <tr>
            <td class="noborder">2.</td>
            <td colspan="3" class="noborder">Nama Bidan  </td>
            <td class="noborder" colspan="20">: @{{ item.obj[1000416] ? item.obj[1000416] : '' }}</td>
            <td class="noborder" colspan="25">@{{ item.obj[1000487] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak, Alasan : @{{ item.obj[1000488] ? item.obj[1000488] : '' }}</td>
            
        </tr>
        <tr>
            <td class="noborder" rowspan="4" valign="top">3.</td>
            <td colspan="5" class="noborder">Tempat Persalinan  </td>
            <td class="noborder" colspan="18">: </td>
            <td class="noborder">25</td>
            <td colspan="24" class="noborder">Plasenta lahir lengkap (intact) : @{{ item.obj[1000490] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya / @{{ item.obj[1000491] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
        </tr>
        <tr class="noborder">
            <td colspan="12" class="noborder">
                @{{ item.obj[1000418] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rumah Ibu
            </td>
            <td colspan="11" class="noborder">
                @{{ item.obj[1000419] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Puskesmas
            </td>
            <td class="noborder"></td>
            <td colspan="24"  class="noborder">
                @{{ item.obj[1000492] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Jika tidak lengkap, tindakan yang dilakukan : @{{ item.obj[1000493] ? item.obj[1000493] : '' }}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                @{{ item.obj[1000420] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Polindes
            </td>
            <td colspan="11" class="noborder">
                @{{ item.obj[1000421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rumah Sakit
            </td>
            <td class="noborder" colspan="2"></td>
            <td colspan="23"  class="noborder">
                a. @{{ item.obj[1000493] ? item.obj[1000493] : '' }}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                @{{ item.obj[1000422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Klinik Swasta
            </td>
            <td colspan="11" class="noborder">
                @{{ item.obj[1000423] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lainnya : @{{ item.obj[1000424] ? item.obj[1000424] : '' }}
            </td>
            <td class="noborder" colspan="2"></td>
            <td colspan="23"  class="noborder">
                b. @{{ item.obj[1000494] ? item.obj[1000494] : '' }}
            </td>
        </tr>
        <tr>
            <td  class="noborder">4.</td>
            <td colspan="5"  class="noborder">Alamat Persalinan</td>
            <td colspan="18"  class="noborder">: @{{ item.obj[1000425] ? item.obj[1000425] : '' }}</td>
            <td  class="noborder">26</td>
            <td colspan="24"  class="noborder">Plasenta tidak lahir > 30 menit : @{{ item.obj[1000496] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya / @{{ item.obj[1000497] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
        </tr>
        <tr>
            <td  class="noborder">5.</td>
            <td colspan="3"  class="noborder">Catatan </td>
            <td colspan="20"  class="noborder">: @{{ item.obj[1000427] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rujuk, kala : @{{ item.obj[1000428] ? item.obj[1000428] : '' }}</td>
            <td  class="noborder" colspan="12"> Tindakan :</td>
        </tr>
        <tr>
            <td  class="noborder">6.</td>
            <td colspan="5"  class="noborder">Alasan merujuk </td>
            <td colspan="18" class="noborder">: @{{ item.obj[1000429] ? item.obj[1000429] : '' }}</td>
            <td  class="noborder" colspan="2"></td>
            <td colspan="23"  class="noborder">
                a. @{{ item.obj[1000499] ? item.obj[1000499] : '' }}
            </td>
        </tr>
        <tr>
            <td  class="noborder">7.</td>
            <td colspan="5"  class="noborder">Tempat rujukan  </td>
            <td colspan="18"  class="noborder">: @{{ item.obj[1000430] ? item.obj[1000430] : '' }}</td>
            <td  class="noborder" colspan="2"></td>
            <td colspan="23"  class="noborder">
                b. @{{ item.obj[1000500] ? item.obj[1000500] : '' }}
            </td>
        </tr>
        <tr>
            <td  class="noborder" rowspan="4" valign="top">8.</td>
            <td colspan="9"  class="noborder">Pendamping pada saat persalinan</td>
            <td colspan="14"  class="noborder">: </td>
            <td  class="noborder">27</td>
            <td colspan="24"  class="noborder">Laserasi</td>
        </tr>
        <tr>
            <td colspan="12"  class="noborder">
                @{{ item.obj[1000432] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bidan
            </td>
            <td colspan="11"  class="noborder">
                @{{ item.obj[1000435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teman
            </td>
            <td colspan="25"  class="noborder">
                @{{ item.obj[1000502] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Dimana : @{{ item.obj[1000503] ? item.obj[1000503] : '' }}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                @{{ item.obj[1000433] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Suami
            </td>
            <td colspan="11" class="noborder">
                @{{ item.obj[1000436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dukun
            </td>
            <td colspan="25" class="noborder">
                @{{ item.obj[1000504] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                @{{ item.obj[1000434] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Keluarga
            </td>
            <td colspan="11" class="noborder">
                @{{ item.obj[1000437] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada
            </td>
            <td  class="noborder">28.</td>
            <td colspan="24" class="noborder">
               Jika laserasi perineum, derajat : @{{ item.obj[1000505] ? item.obj[1000505] : '' }}
            </td>
        </tr>
        <tr>
            <td colspan="24" class="noborder"></td>
            <td class="noborder"></td>
            <td colspan="24" class="noborder">Tindakan :</td>
        </tr>
        <tr  class="noborder">
            <td colspan="24" class="bg-dark-small">KALA I</td>
            <td class="noborder"></td>
            <td colspan="24" class="noborder">
                @{{ item.obj[1000507] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penjahitan dengan / tanpa anestesi
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">9</td>
            <td colspan="23" class="noborder">Partograf melewati garis waspada :	@{{ item.obj[1000439] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya @{{ item.obj[1000440] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
            <td class="noborder"></td>
            <td colspan="24" class="noborder">
                @{{ item.obj[1000508] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada Jahit, Alasan : @{{ item.obj[1000509] ? item.obj[1000509] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">10</td>
            <td colspan="6" class="noborder">Masalah lain, sebutkan </td>
            <td colspan="17" class="noborder">: @{{ item.obj[1000441] ? item.obj[1000441] : '' }}</td>
            <td class="noborder">29.</td>
            <td colspan="24" class="noborder">
                Atonia uteri :
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td  class="noborder" colspan="23"></td>
            <td colspan="25" class="noborder">
                @{{ item.obj[1000511] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, tindakan :
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">11.</td>
            <td colspan="7" class="noborder">Penatalaksanaan masalah tsb</td>
            <td colspan="16" class="noborder">: @{{ item.obj[1000442] ? item.obj[1000442] : '' }}</td>
            <td class="noborder" colspan="2"></td>
            <td colspan="23" class="noborder">
                a. @{{ item.obj[1000512] ? item.obj[1000512] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23"></td>
            <td class="noborder" colspan="2"></td>
            <td colspan="23" class="noborder">
                b. @{{ item.obj[1000513] ? item.obj[1000513] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">12.</td>
            <td class="noborder" colspan="3">Hasilnya</td>
            <td class="noborder" colspan="20">: @{{ item.obj[1000443] ? item.obj[1000443] : '' }}</td>
            <td class="noborder" colspan="2"></td>
            <td class="noborder" colspan="23" >
                c. @{{ item.obj[1000514] ? item.obj[1000514] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td colspan="24" class="noborder"></td>
            <td colspan="25" class="noborder">
                @{{ item.obj[1000515] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak
            </td>
        </tr>
        <tr class="noborder">
            <td colspan="24" class="noborder bg-dark-small">KALA II</td>
            <td class="noborder">30</td>
            <td class="noborder" colspan="7" class="border-tb">
                Jumlah perdarahan
            </td>
            <td class="noborder" colspan="13">@{{ item.obj[1000516] ? item.obj[1000516] : '...' }}</td>
            <td class="noborder" colspan="4">ml</td>
        </tr>
        <tr>
            <td class="noborder">13.</td>
            <td class="noborder" colspan="23">Episiotomi</td>
            <td class="noborder">31.</td>
            <td class="noborder" colspan="7">Masalah lain, sebutkan</td>
            <td class="noborder" colspan="17">: @{{ item.obj[1000517] ? item.obj[1000517] : '' }}</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000445] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, indikasi: @{{ item.obj[1000446] ? item.obj[1000446] : '' }}
            </td>
            <td class="noborder">32</td>
            <td class="noborder" colspan="9">Penatalaksanaan masalah tersebut</td>
            <td class="noborder" colspan="15">@{{ item.obj[1000518] ? item.obj[1000518] : '' }}</td>
            
        </tr>
        <tr>
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000447] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak 
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24"></td>
            
        </tr>
        <tr>
            <td class="noborder">14.</td>
            <td class="noborder" colspan="23">Pendamping pada saat persalinan :</td>
            <td class="noborder">33.</td>
            <td class="noborder" colspan="3">Hasilnya</td>
            <td class="noborder" colspan="21">: @{{ item.obj[1000519] ? item.obj[1000519] : '' }}</td>
        </tr>
        <tr>
            <td class="noborder"></td>
            <td class="noborder" colspan="8">
                @{{ item.obj[1000449] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Suami
            </td>
            <td class="noborder" colspan="8">
                @{{ item.obj[1000451] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teman
            </td>
            <td class="noborder" colspan="32">
                @{{ item.obj[1000453] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Ada
            </td>
        </tr>
        <tr>
            <td class="noborder"></td>
            <td class="noborder" colspan="8">
                @{{ item.obj[1000450] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Keluarga
            </td>
            <td class="noborder" colspan="40">
                @{{ item.obj[1000452] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dukun
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">15.</td>
            <td class="noborder" colspan="48">Gawat janin :</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000455] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, tindakan yang dilakukan :
            </td>
            <td colspan="25" class="bg-dark-small">BAYI BARU LAHIR</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">
                a. @{{ item.obj[1000456] ? item.obj[1000456] : '' }}
            </td>
            <td class="noborder">34.</td>
            <td class="noborder" colspan="4">Berat badan</td>
            <td class="noborder" colspan="14">@{{ item.obj[1000520] ? item.obj[1000520] : '' }}</td>
            <td class="noborder" colspan="6">gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">
                b. @{{ item.obj[1000457] ? item.obj[1000457] : '' }}
            </td>
            <td class="noborder">35.</td>
            <td class="noborder" colspan="4">Panjang</td>
            <td class="noborder" colspan="14">@{{ item.obj[1000521] ? item.obj[1000521] : '' }}</td>
            <td class="noborder" colspan="6">cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">
                c. @{{ item.obj[1000458] ? item.obj[1000458] : '' }}
            </td>
            <td class="noborder">36.</td>
            <td class="noborder" colspan="4">Jenis Kelamin</td>
            <td class="noborder" colspan="20">: @{{ item.obj[1000523] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} L/ @{{ item.obj[1000524] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} P</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000459] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak
            </td>
            <td class="noborder">37.</td>
            <td class="noborder" colspan="24">Penilaian bayi baru lahir : @{{ item.obj[1000526] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} baik / @{{ item.obj[1000527] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ada penyulit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000460] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pemantauan DJJ setiap 5-10 menit selama kala II, hasil :
            </td>
            <td class="noborder">38.</td>
            <td class="noborder" colspan="24">Bayi lahir :</td>
        </tr>
        <tr class="noborder">
            <td class="noborder">16.</td>
            <td class="noborder" colspan="23">
                Distosia bahu :
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                @{{ item.obj[1000529] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Normal, Tindakan
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000463] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, tindakan yang dilakukan :
            </td>
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000530] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Mengeringkan
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">a. 
                @{{ item.obj[1000464] ? item.obj[1000464] : '' }}
            </td>
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000531] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Menghangatkan
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">b. 
                @{{ item.obj[1000465] ? item.obj[1000465] : '' }}
            </td>
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000532] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rangsang taktil
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="22">c. 
                @{{ item.obj[1000466] ? item.obj[1000466] : '' }}
            </td>
            <td class="noborder"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000533] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bungkus bayi dan tempatkan disisi ibu
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000467] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                @{{ item.obj[1000534] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Asfiksia ringan / pucat / biru / lemas, tindakan :
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">17.</td>
            <td class="noborder" colspan="23">
                Masalah lain, sebutkan : @{{ item.obj[1000468] ? item.obj[1000468] : '' }}
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="12">
                @{{ item.obj[1000535] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Mengeringkan
            </td>
            <td class="noborder" colspan="12">
                @{{ item.obj[1000538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Menghangatkan
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">18.</td>
            <td class="noborder" colspan="23">
                Penatalaksanaan masalah tersebut :
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="12">
                @{{ item.obj[1000536] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rangsang taktil
            </td>
            <td class="noborder" colspan="12">
                @{{ item.obj[1000539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain, sebutkan :
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">@{{ item.obj[1000469] ? item.obj[1000469] : '' }}</td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                @{{ item.obj[1000537] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bungkus bayinya dan
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">19.</td>
            <td class="noborder" colspan="23">Hasilnya : @{{ item.obj[1000470] ? item.obj[1000470] : '' }}</td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                tempatkan disisi ibu
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="24"></td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                
            </td>
        </tr>
        <tr class="noborder">
            <td class="bg-dark-small" colspan="24">KALA III</td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                @{{ item.obj[1000541] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cacat bawaan, sebutkan : @{{ item.obj[1000542] ? item.obj[1000542] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">20.</td>
            <td class="noborder" colspan="6">Lama Kala III</td>
            <td class="noborder" colspan="7">@{{ item.obj[1000471] ? item.obj[1000471] : '...' }}</td>
            <td class="noborder" colspan="10">menit</td>
            <td class="noborder"></td>
            <td class="noborder" colspan="24">
                @{{ item.obj[1000543] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hipotermia, tindakan :
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">21.</td>
            <td class="noborder" colspan="23">Pemberian Oksitosin 10 U IM?</td>
            
            <td class="noborder" colspan="2"></td>
            <td class="noborder" colspan="23">
                a. @{{ item.obj[1000544] ? item.obj[1000544] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="4">
                @{{ item.obj[1000473] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Waktu:
            </td>
            <td class="noborder" colspan="12">
                @{{ item.obj[1000474] ? item.obj[1000474] : '...' }}
            </td>
            <td class="noborder" colspan="7">
                menit sesudah persalinan
            </td>
            <td class="noborder" colspan="2"></td>
            <td colspan="23" class="noborder">
                b. @{{ item.obj[1000545] ? item.obj[1000545] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="5">
                @{{ item.obj[1000475] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak, Alasan:
            </td>
            <td class="noborder" colspan="18">
                : @{{ item.obj[1000476] ? item.obj[1000476] : '' }}
            </td>
            
            <td colspan="2" class="noborder"></td>
            <td colspan="23" class="noborder">
                c. @{{ item.obj[1000546] ? item.obj[1000546] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">22.</td>
            <td class="noborder" colspan="23">
                Pemberian ulang Oksitosin (2x)?
            </td>
            <td class="noborder" colspan="">39</td>
            <td class="noborder" colspan="24">
                Pemberian ASI
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="5">
                @{{ item.obj[1000478] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Alasan : 
            </td>
            <td class="noborder" colspan="18">
                @{{ item.obj[1000479] ? item.obj[1000479] : '' }}
            </td>
            <td class="noborder" colspan="5">
                @{{ item.obj[1000548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Waktu : 
            </td>
            <td class="noborder" colspan="11">
                @{{ item.obj[1000549] ? item.obj[1000549] : '' }}
            </td>
            <td class="noborder" colspan="9">jam setelah bayi lahir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000480] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak
            </td>
            <td class="noborder" colspan="5">
                @{{ item.obj[1000550] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak, Alasan
            </td>
            <td class="noborder" colspan="20">
                @{{ item.obj[1000551] ? item.obj[1000551] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">23</td>
            <td class="noborder" colspan="23">
                Penegangan tali pusat terkendali?
            </td>
            <td class="noborder">40</td>
            <td class="noborder" colspan="6">
                Masalah lain, sebutkan
            </td>
            <td class="noborder" colspan="18">
                : @{{ item.obj[1000552] ? item.obj[1000552] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder">23</td>
            <td class="noborder" colspan="23">
                @{{ item.obj[1000482] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya
            </td>
            <td class="noborder"></td>
            <td class="noborder" colspan="3">Hasilnya :</td>
            <td class="noborder" colspan="21">
                @{{ item.obj[1000553] ? item.obj[1000553] : '' }}
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder"></td>
            <td class="noborder" colspan="48">
                @{{ item.obj[1000483] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak, Alasan : @{{ item.obj[1000484] ? item.obj[1000484] : '' }}
            </td>
        </tr>
       
        <tr style="border:1px solid #000;text-align:center;">
            <td colspan="5">Jam Ke</td>
            <td colspan="5">Waktu</td>
            <td colspan="5">Tekanan Darah</td>
            <td colspan="5">Nadi</td>
            <td colspan="5">Suhu</td>
            <td colspan="5">Tinggi Fundus Uteri</td>
            <td colspan="5">Kontraksi Uterus</td>
            <td colspan="5">Kandung Kemih</td>
            <td colspan="9">Perdarahan</td>
        </tr>
        <tr  style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000555] ? item.obj[1000555] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000556] ? item.obj[1000556] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000557] ? item.obj[1000557] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000558] ? item.obj[1000558] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000559] ? item.obj[1000559] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000560] ? item.obj[1000560] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000561] ? item.obj[1000561] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000562] ? item.obj[1000562] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000563] ? item.obj[1000563] : '' }}</td>
        </tr>
        <tr  style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000564] ? item.obj[1000564] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000565] ? item.obj[1000565] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000566] ? item.obj[1000566] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000567] ? item.obj[1000567] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000568] ? item.obj[1000568] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000569] ? item.obj[1000569] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000570] ? item.obj[1000570] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000571] ? item.obj[1000571] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000572] ? item.obj[1000572] : '' }}</td>
        </tr>
        <tr  style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000573] ? item.obj[1000573] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000574] ? item.obj[1000574] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000575] ? item.obj[1000575] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000576] ? item.obj[1000576] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000577] ? item.obj[1000577] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000578] ? item.obj[1000578] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000579] ? item.obj[1000579] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000580] ? item.obj[1000580] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000581] ? item.obj[1000581] : '' }}</td>
        </tr>
        <tr  style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000582] ? item.obj[1000582] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000583] ? item.obj[1000583] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000584] ? item.obj[1000584] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000585] ? item.obj[1000585] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000586] ? item.obj[1000586] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000587] ? item.obj[1000587] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000588] ? item.obj[1000588] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000589] ? item.obj[1000589] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000590] ? item.obj[1000590] : '' }}</td>
        </tr>
        <tr  style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000591] ? item.obj[1000591] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000592] ? item.obj[1000592] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000593] ? item.obj[1000593] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000594] ? item.obj[1000594] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000595] ? item.obj[1000595] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000596] ? item.obj[1000596] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000597] ? item.obj[1000597] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000598] ? item.obj[1000598] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000599] ? item.obj[1000599] : '' }}</td>
        </tr>
        <tr style="height:10pt">
            <td colspan="5" style="text-align: center">@{{ item.obj[1000600] ? item.obj[1000600] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000601] ? item.obj[1000601] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000602] ? item.obj[1000602] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000603] ? item.obj[1000603] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000604] ? item.obj[1000604] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000605] ? item.obj[1000605] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000606] ? item.obj[1000606] : '' }}</td>
            <td colspan="5" style="text-align: center">@{{ item.obj[1000607] ? item.obj[1000607] : '' }}</td>
            <td colspan="9" style="text-align: center">@{{ item.obj[1000608] ? item.obj[1000608] : '' }}</td>
        </tr>
    </table>
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

    angular.controller('cetakPartograf', function ($scope, $http, httpService) {
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

        // var keluhan_utama = $scope.item.obj[420516].replace(/(?:\r\n|\r|\n)/g, ', ');

        // $scope.item.obj['keluhan_utama'] = keluhan_utama;

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
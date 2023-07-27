<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan EKG</title>
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
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width:279mm;
            height:201mm;
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
<body ng-controller="cetakEKG">
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obj[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obj[31101097] ? item.obj[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d1'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji2[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji2[31101097] ? item.obji2[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d2'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji3[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji3[31101097] ? item.obji3[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d3'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji4[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji4[31101097] ? item.obji4[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d4'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji5[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji5[31101097] ? item.obji5[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d5'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji6[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji6[31101097] ? item.obji6[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d6'][0]->image  !!}" /></center>
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
                    <td rowspan="4" colspan="5" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">20</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr style="border:none">
                    <td colspan="12" style="text-align:center;border-left:none;border-right:none;font-weight: bolder;">
                        <h2>HASIL PEMERIKSAAN EKG</h2>
                        {{-- <small style="font-size:8px">(Dilengkapi dalam waktu 2 jam pertama pasien masuk ruang IGD)</small> --}}
                    </td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="8pt">
                    <td  style="border:none;" colspan="6"><b>Tanggal dan Jam Perekaman : @{{item.obji7[31101096] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td>
                    <td  style="border:none;"  colspan="6"><b>Pelaksana : @{{ item.obji7[31101097] ? item.obji7[31101097] : '' }}</b></td>
                </tr>
                <tr style="border:px solid #000; border-top:none;border-bottom:none" height="10pt">
                    <td  style="border:none;" colspan="12">
                        <center><img class="gambarAset" style="width: 750px;" src="{!! $res['d7'][0]->image  !!}" /></center>
                    </td>
                </tr>

            </table>
        </section>
    @endif

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

    angular.controller('cetakEKG', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: [],
			obji2: [],
			obji3: [],
			obji4: [],
			obji5: [],
			obji6: [],
			obji7: [],
        }

        var dataLoad = {!! json_encode($res['d1'] )!!};
		var dataLoad2 = {!! json_encode($res['d2'] )!!};
		var dataLoad3 = {!! json_encode($res['d3'] )!!};
		var dataLoad4 = {!! json_encode($res['d4'] )!!};
		var dataLoad5 = {!! json_encode($res['d5'] )!!};
		var dataLoad6 = {!! json_encode($res['d6'] )!!};
		var dataLoad7 = {!! json_encode($res['d7'] )!!};

        if(dataLoad.length > 0){
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
        }

        if(dataLoad2.length > 0){
            for (var i = 0; i <= dataLoad2.length - 1; i++) {
                if(dataLoad2[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad2[i].type == "textbox") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad2[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji2[dataLoad2[i].emrdfk] = chekedd
                }
                if (dataLoad2[i].type == "radio") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value

                }

                if (dataLoad2[i].type == "datetime") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "time") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "date") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }

                if (dataLoad2[i].type == "checkboxtextbox") {
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                    $scope.item.obji2[dataLoad2[i].emrdfk] = true
                }
                if (dataLoad2[i].type == "textarea") {
                    $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                    $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                }
                if (dataLoad2[i].type == "combobox") {
        
                    var str = dataLoad2[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                        $('#id_'+dataLoad2[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad2[i].type == "combobox2") {
                    var str = dataLoad2[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji2[dataLoad2[i].emrdfk+""+1] = res[0]
                    $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                    $('#id_'+dataLoad2[i].emrdfk).html ( res[1])

                }

                if (dataLoad2[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad2[i].value
                }

                if (dataLoad2[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad2[i].value
                }

                if (dataLoad2[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad2[i].value
                }
                if (dataLoad2[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad2[i].value
                }
                
                if (dataLoad2[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad2[i].value
                }

                $scope.tglemr = dataLoad2[i].tgl
                
            }
        }

        if(dataLoad3.length > 0){
            for (var i = 0; i <= dataLoad3.length - 1; i++) {
                if(dataLoad3[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad3[i].type == "textbox") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad3[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji3[dataLoad3[i].emrdfk] = chekedd
                }
                if (dataLoad3[i].type == "radio") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value

                }

                if (dataLoad3[i].type == "datetime") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "time") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "date") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }

                if (dataLoad3[i].type == "checkboxtextbox") {
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                    $scope.item.obji3[dataLoad3[i].emrdfk] = true
                }
                if (dataLoad3[i].type == "textarea") {
                    $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                    $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                }
                if (dataLoad3[i].type == "combobox") {
        
                    var str = dataLoad3[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                        $('#id_'+dataLoad3[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad3[i].type == "combobox2") {
                    var str = dataLoad3[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji3[dataLoad3[i].emrdfk+""+1] = res[0]
                    $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                    $('#id_'+dataLoad3[i].emrdfk).html ( res[1])

                }

                if (dataLoad3[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad3[i].value
                }

                if (dataLoad3[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad3[i].value
                }

                if (dataLoad3[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad3[i].value
                }
                if (dataLoad3[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad3[i].value
                }
                
                if (dataLoad3[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad3[i].value
                }

                $scope.tglemr = dataLoad3[i].tgl
                
            }
        }

        if(dataLoad4.length > 0){
            for (var i = 0; i <= dataLoad4.length - 1; i++) {
                if(dataLoad4[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad4[i].type == "textbox") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad4[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji4[dataLoad4[i].emrdfk] = chekedd
                }
                if (dataLoad4[i].type == "radio") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value

                }

                if (dataLoad4[i].type == "datetime") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "time") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "date") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }

                if (dataLoad4[i].type == "checkboxtextbox") {
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                    $scope.item.obji4[dataLoad4[i].emrdfk] = true
                }
                if (dataLoad4[i].type == "textarea") {
                    $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                    $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                }
                if (dataLoad4[i].type == "combobox") {
        
                    var str = dataLoad4[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                        $('#id_'+dataLoad4[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad4[i].type == "combobox2") {
                    var str = dataLoad4[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji4[dataLoad4[i].emrdfk+""+1] = res[0]
                    $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                    $('#id_'+dataLoad4[i].emrdfk).html ( res[1])

                }

                if (dataLoad4[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad4[i].value
                }

                if (dataLoad4[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad4[i].value
                }

                if (dataLoad4[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad4[i].value
                }
                if (dataLoad4[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad4[i].value
                }
                
                if (dataLoad4[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad4[i].value
                }

                $scope.tglemr = dataLoad4[i].tgl
                
            }
        }

        if(dataLoad5.length > 0){
            for (var i = 0; i <= dataLoad5.length - 1; i++) {
                if(dataLoad5[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad5[i].type == "textbox") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad5[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji5[dataLoad5[i].emrdfk] = chekedd
                }
                if (dataLoad5[i].type == "radio") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value

                }

                if (dataLoad5[i].type == "datetime") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "time") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "date") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }

                if (dataLoad5[i].type == "checkboxtextbox") {
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                    $scope.item.obji5[dataLoad5[i].emrdfk] = true
                }
                if (dataLoad5[i].type == "textarea") {
                    $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                    $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                }
                if (dataLoad5[i].type == "combobox") {
        
                    var str = dataLoad5[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                        $('#id_'+dataLoad5[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad5[i].type == "combobox2") {
                    var str = dataLoad5[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji5[dataLoad5[i].emrdfk+""+1] = res[0]
                    $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                    $('#id_'+dataLoad5[i].emrdfk).html ( res[1])

                }

                if (dataLoad5[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad5[i].value
                }

                if (dataLoad5[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad5[i].value
                }

                if (dataLoad5[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad5[i].value
                }
                if (dataLoad5[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad5[i].value
                }
                
                if (dataLoad5[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad5[i].value
                }

                $scope.tglemr = dataLoad5[i].tgl
                
            }
        }

        if(dataLoad6.length > 0){
            for (var i = 0; i <= dataLoad6.length - 1; i++) {
                if(dataLoad6[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad6[i].type == "textbox") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad6[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji6[dataLoad6[i].emrdfk] = chekedd
                }
                if (dataLoad6[i].type == "radio") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value

                }

                if (dataLoad6[i].type == "datetime") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "time") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "date") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }

                if (dataLoad6[i].type == "checkboxtextbox") {
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                    $scope.item.obji6[dataLoad6[i].emrdfk] = true
                }
                if (dataLoad6[i].type == "textarea") {
                    $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                    $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                }
                if (dataLoad6[i].type == "combobox") {
        
                    var str = dataLoad6[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                        $('#id_'+dataLoad6[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad6[i].type == "combobox2") {
                    var str = dataLoad6[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji6[dataLoad6[i].emrdfk+""+1] = res[0]
                    $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                    $('#id_'+dataLoad6[i].emrdfk).html ( res[1])

                }

                if (dataLoad6[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad6[i].value
                }

                if (dataLoad6[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad6[i].value
                }

                if (dataLoad6[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad6[i].value
                }
                if (dataLoad6[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad6[i].value
                }
                
                if (dataLoad6[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad6[i].value
                }

                $scope.tglemr = dataLoad6[i].tgl
                
            }
        }

        if(dataLoad7.length > 0){
            for (var i = 0; i <= dataLoad7.length - 1; i++) {
                if(dataLoad7[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad7[i].type == "textbox") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad7[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji7[dataLoad7[i].emrdfk] = chekedd
                }
                if (dataLoad7[i].type == "radio") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value

                }

                if (dataLoad7[i].type == "datetime") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "time") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "date") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }

                if (dataLoad7[i].type == "checkboxtextbox") {
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                    $scope.item.obji7[dataLoad7[i].emrdfk] = true
                }
                if (dataLoad7[i].type == "textarea") {
                    $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                    $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                }
                if (dataLoad7[i].type == "combobox") {
        
                    var str = dataLoad7[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                        $('#id_'+dataLoad7[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad7[i].type == "combobox2") {
                    var str = dataLoad7[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji7[dataLoad7[i].emrdfk+""+1] = res[0]
                    $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                    $('#id_'+dataLoad7[i].emrdfk).html ( res[1])

                }

                if (dataLoad7[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad7[i].value
                }

                if (dataLoad7[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad7[i].value
                }

                if (dataLoad7[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad7[i].value
                }
                if (dataLoad7[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad7[i].value
                }
                
                if (dataLoad7[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad7[i].value
                }

                $scope.tglemr = dataLoad7[i].tgl
                
            }
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
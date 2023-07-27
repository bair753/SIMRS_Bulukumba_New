<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Operasi</title>
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
<body ng-controller="cetakLaporanOperasi">
    @if (!empty($res['d1']))
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                        <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                        <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obj[31100530] ? item.obj[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obj[31100532] ? item.obj[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obj[31100535] ? item.obj[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obj[31100534] ? item.obj[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obj[31100536] ? item.obj[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obj[31100537] ? item.obj[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obj[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obj[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obj[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obj[31100541] ? item.obj[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obj[31100542] ? item.obj[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obj[31100541] ? item.obj[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obj[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obj[32103414] ? item.obj[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obj[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obj[32103415] ? item.obj[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obj[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obj[32103416] ? item.obj[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obj[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obj[32103417] ? item.obj[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obj[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obj[32103418] ? item.obj[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obj[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obj[32103419] ? item.obj[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obj[31100550] ? item.obj[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obj[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obj[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obj[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obj[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obj[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obj[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obj[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obj[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obj[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obj[31100563] ? item.obj[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obj[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obj[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obj[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obj[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obj[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obj[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obj[31100567] ? item.obj[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obj[31100568] ? item.obj[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter1" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obj[31100569] ? item.obj[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obj[31100570] ? item.obj[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obj[31100571] ? item.obj[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obj[31100572] ? item.obj[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obj[31100573] ? item.obj[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obj[31100574] ? item.obj[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obj[31100575] ? item.obj[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP1" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obj[31100576] ? item.obj[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji2[31100530] ? item.obji2[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji2[31100532] ? item.obji2[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji2[31100535] ? item.obji2[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji2[31100534] ? item.obji2[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji2[31100536] ? item.obji2[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji2[31100537] ? item.obji2[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji2[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji2[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji2[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji2[31100541] ? item.obji2[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji2[31100542] ? item.obji2[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji2[31100541] ? item.obji2[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji2[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji2[32103414] ? item.obji2[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji2[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji2[32103415] ? item.obji2[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji2[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji2[32103416] ? item.obji2[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji2[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji2[32103417] ? item.obji2[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji2[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji2[32103418] ? item.obji2[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji2[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji2[32103419] ? item.obji2[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji2[31100550] ? item.obji2[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji2[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji2[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji2[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji2[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji2[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji2[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji2[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji2[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji2[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji2[31100563] ? item.obji2[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji2[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji2[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji2[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji2[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji2[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji2[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji2[31100567] ? item.obji2[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji2[31100568] ? item.obji2[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter2" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji2[31100569] ? item.obji2[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji2[31100570] ? item.obji2[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji2[31100571] ? item.obji2[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji2[31100572] ? item.obji2[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji2[31100573] ? item.obji2[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji2[31100574] ? item.obji2[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji2[31100575] ? item.obji2[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP2" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji2[31100576] ? item.obji2[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji3[31100530] ? item.obji3[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji3[31100532] ? item.obji3[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji3[31100535] ? item.obji3[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji3[31100534] ? item.obji3[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji3[31100536] ? item.obji3[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji3[31100537] ? item.obji3[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji3[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji3[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji3[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji3[31100541] ? item.obji3[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji3[31100542] ? item.obji3[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji3[31100541] ? item.obji3[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji3[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji3[32103414] ? item.obji3[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji3[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji3[32103415] ? item.obji3[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji3[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji3[32103416] ? item.obji3[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji3[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji3[32103417] ? item.obji3[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji3[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji3[32103418] ? item.obji3[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji3[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji3[32103419] ? item.obji3[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji3[31100550] ? item.obji3[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji3[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji3[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji3[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji3[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji3[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji3[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji3[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji3[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji3[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji3[31100563] ? item.obji3[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji3[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji3[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji3[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji3[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji3[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji3[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji3[31100567] ? item.obji3[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji3[31100568] ? item.obji3[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter3" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji3[31100569] ? item.obji3[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji3[31100570] ? item.obji3[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji3[31100571] ? item.obji3[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji3[31100572] ? item.obji3[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji3[31100573] ? item.obji3[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji3[31100574] ? item.obji3[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji3[31100575] ? item.obji3[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP3" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji3[31100576] ? item.obji3[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji4[31100530] ? item.obji4[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji4[31100532] ? item.obji4[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji4[31100535] ? item.obji4[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji4[31100534] ? item.obji4[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji4[31100536] ? item.obji4[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji4[31100537] ? item.obji4[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji4[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji4[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji4[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji4[31100541] ? item.obji4[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji4[31100542] ? item.obji4[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji4[31100541] ? item.obji4[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji4[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji4[32103414] ? item.obji4[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji4[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji4[32103415] ? item.obji4[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji4[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji4[32103416] ? item.obji4[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji4[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji4[32103417] ? item.obji4[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji4[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji4[32103418] ? item.obji4[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji4[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji4[32103419] ? item.obji4[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji4[31100550] ? item.obji4[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji4[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji4[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji4[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji4[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji4[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji4[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji4[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji4[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji4[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji4[31100563] ? item.obji4[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji4[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji4[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji4[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji4[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji4[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji4[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji4[31100567] ? item.obji4[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji4[31100568] ? item.obji4[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter4" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji4[31100569] ? item.obji4[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji4[31100570] ? item.obji4[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji4[31100571] ? item.obji4[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji4[31100572] ? item.obji4[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji4[31100573] ? item.obji4[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji4[31100574] ? item.obji4[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji4[31100575] ? item.obji4[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP4" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji4[31100576] ? item.obji4[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji5[31100530] ? item.obji5[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji5[31100532] ? item.obji5[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji5[31100535] ? item.obji5[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji5[31100534] ? item.obji5[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji5[31100536] ? item.obji5[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji5[31100537] ? item.obji5[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji5[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji5[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji5[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji5[31100541] ? item.obji5[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji5[31100542] ? item.obji5[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji5[31100541] ? item.obji5[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji5[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji5[32103414] ? item.obji5[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji5[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji5[32103415] ? item.obji5[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji5[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji5[32103416] ? item.obji5[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji5[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji5[32103417] ? item.obji5[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji5[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji5[32103418] ? item.obji5[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji5[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji5[32103419] ? item.obji5[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji5[31100550] ? item.obji5[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji5[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji5[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji5[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji5[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji5[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji5[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji5[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji5[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji5[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji5[31100563] ? item.obji5[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji5[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji5[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji5[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji5[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji5[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji5[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji5[31100567] ? item.obji5[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji5[31100568] ? item.obji5[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter5" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji5[31100569] ? item.obji5[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji5[31100570] ? item.obji5[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji5[31100571] ? item.obji5[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji5[31100572] ? item.obji5[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji5[31100573] ? item.obji5[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji5[31100574] ? item.obji5[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji5[31100575] ? item.obji5[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP5" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji5[31100576] ? item.obji5[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji6[31100530] ? item.obji6[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji6[31100532] ? item.obji6[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji6[31100535] ? item.obji6[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji6[31100534] ? item.obji6[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji6[31100536] ? item.obji6[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji6[31100537] ? item.obji6[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji6[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji6[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji6[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji6[31100541] ? item.obji6[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji6[31100542] ? item.obji6[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji6[31100541] ? item.obji6[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji6[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji6[32103414] ? item.obji6[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji6[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji6[32103415] ? item.obji6[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji6[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji6[32103416] ? item.obji6[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji6[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji6[32103417] ? item.obji6[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji6[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji6[32103418] ? item.obji6[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji6[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji6[32103419] ? item.obji6[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji6[31100550] ? item.obji6[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji6[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji6[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji6[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji6[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji6[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji6[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji6[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji6[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji6[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji6[31100563] ? item.obji6[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji6[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji6[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji6[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji6[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji6[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji6[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji6[31100567] ? item.obji6[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji6[31100568] ? item.obji6[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter6" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji6[31100569] ? item.obji6[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji6[31100570] ? item.obji6[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji6[31100571] ? item.obji6[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji6[31100572] ? item.obji6[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji6[31100573] ? item.obji6[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji6[31100574] ? item.obji6[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji6[31100575] ? item.obji6[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP6" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji6[31100576] ? item.obji6[31100576] : '________________________________________' }})</td>
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
                        @endif</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN OPERASI
                    </td>
                </tr>
                <tr >
                    <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obji7[31100530] ? item.obji7[31100530] : '' }}</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                    <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
                </tr>
                <tr>
                    <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obji7[31100532] ? item.obji7[31100532] : '' }}</td>
                    <td colspan="3" style="border:none">Scrub : @{{ item.obji7[31100535] ? item.obji7[31100535] : '' }}</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obji7[31100534] ? item.obji7[31100534] : '' }}</td>
                    <td colspan="3" style="border:none">Sirkuler : @{{ item.obji7[31100536] ? item.obji7[31100536] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obji7[31100537] ? item.obji7[31100537] : '' }}</td>
                    <td colspan="5" style="border:none;">Jenis Anestesi</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="2" style="border:none;">@{{ item.obji7[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                    <td colspan="2" style="border:none;">@{{ item.obji7[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                    <td style="border:none;">@{{ item.obji7[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="4">Diagnose Pre-Operatif : @{{ item.obji7[31100541] ? item.obji7[31100541] : '' }}</td>
                    <td colspan="5">Komplikasi Selama Operasi : @{{ item.obji7[31100542] ? item.obji7[31100542] : '' }}</td>
                </tr>
                <tr>
                    <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obji7[31100541] ? item.obji7[31100541] : '' }}</td>
                    <td colspan="2" style="border:none">Intake</td>
                    <td colspan="3" style="border:none">Output</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji7[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                    <td style="border:none">: @{{ item.obji7[32103414] ? item.obji7[32103414] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji7[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                    <td style="border:none">: @{{ item.obji7[32103415] ? item.obji7[32103415] : '__' }} cc</td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">@{{ item.obji7[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                    <td style="border:none">: @{{ item.obji7[32103416] ? item.obji7[32103416] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji7[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                    <td style="border:none">: @{{ item.obji7[32103417] ? item.obji7[32103417] : '__' }} cc</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none">@{{ item.obji7[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                    <td style="border:none">: @{{ item.obji7[32103418] ? item.obji7[32103418] : '__' }} cc</td>
                    <td style="border:none">@{{ item.obji7[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                    <td style="border:none">: @{{ item.obji7[32103419] ? item.obji7[32103419] : '__' }} cc</td>
                </tr>
                <tr valign="top">
                    <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obji7[31100550] ? item.obji7[31100550] : '' }}</td>
                    <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                    <td colspan="3" style="border:none">Jenis Luka Operasi</td>
                </tr>
                <tr valign="top">
                    <td rowspan="4" style="border:none">@{{ item.obji7[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obji7[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td colspan="3" style="border:none">@{{ item.obji7[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji7[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji7[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
                </tr>
                <tr style="border:none">
                    <td colspan="3" style="border:none">@{{ item.obji7[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
                </tr>
                <tr style="border:none;">
                    <td style="border:none;">@{{ item.obji7[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                    <td style="border:none;">@{{ item.obji7[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                    <td style="border:none;" colspan="2">@{{ item.obji7[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                    <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obji7[31100563] ? item.obji7[31100563] : '' }}</td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td style="border:none;">@{{ item.obji7[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                    <td style="border:none;">@{{ item.obji7[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                    <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obji7[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
                </tr>
                <tr height="50px" valign="top">
                    <td colspan="2">Tanggal Operasi : @{{item.obji7[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                    <td colspan="2">Jam Operasi Dimulai : @{{item.obji7[31100565] | toDate | date:'HH:mm'}}</td>
                    <td colspan="2">Jam Operasi Selesai : @{{item.obji7[31100566] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3">Lama Operasi Berlangsung : @{{ item.obji7[31100567] ? item.obji7[31100567] : '' }}</td>
                </tr>
                <tr height="70px" valign="top">
                    <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obji7[31100568] ? item.obji7[31100568] : '' }}</td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDokter7" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center;border:none;">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji7[31100569] ? item.obji7[31100569] : '________________________________________' }})</td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
                </tr>
                {{-- <tr height="850px">
                    <td colspan="9"></td>
                </tr> --}}
                <tr height="30px" style="border-top:1px solid #000">
                    <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji7[31100570] ? item.obji7[31100570] : '________________________________________' }}</td>

                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji7[31100571] ? item.obji7[31100571] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">2. Puasa</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji7[31100572] ? item.obji7[31100572] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">3. Infus</td>
                    <td colspan="7" style="border:none">: @{{ item.obji7[31100573] ? item.obji7[31100573] : '________________________________________' }} </td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">4. Antibiotika</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji7[31100574] ? item.obji7[31100574] : '________________________________________' }}</td>
                </tr>
                <tr height="30px">
                    <td colspan="2" style="border:none">5. Lain-lain</td>
                    <td colspan="7" style="border:none">:  @{{ item.obji7[31100575] ? item.obji7[31100575] : '________________________________________' }}</td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">DPJP : </td>
                </tr>
                <tr style="text-align:center;" valign="top">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none"><div id="qrcodeDPJP7" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align:center">
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">(@{{ item.obji7[31100576] ? item.obji7[31100576] : '________________________________________' }})</td>
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

    angular.controller('cetakLaporanOperasi', function ($scope, $http, httpService) {
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

        var dokter1 = $scope.item.obj[31100569];
        var dpjp1 = $scope.item.obj[31100576];
        var dokter2 = $scope.item.obji2[31100569];
        var dpjp2 = $scope.item.obji2[31100576];
        var dokter3 = $scope.item.obji3[31100569];
        var dpjp3 = $scope.item.obji3[31100576];
        var dokter4 = $scope.item.obji4[31100569];
        var dpjp4 = $scope.item.obji4[31100576];
        var dokter5 = $scope.item.obji5[31100569];
        var dpjp5 = $scope.item.obji5[31100576];
        var dokter6 = $scope.item.obji6[31100569];
        var dpjp6 = $scope.item.obji6[31100576];
        var dokter7 = $scope.item.obji7[31100569];
        var dpjp7 = $scope.item.obji7[31100576];

        if (dokter1 != undefined) {
            jQuery('#qrcodeDokter1').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter1
            });	
        }

        if (dpjp1 != undefined) {
            jQuery('#qrcodeDPJP1').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp1
            });	
        }

        if (dokter2 != undefined) {
            jQuery('#qrcodeDokter2').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter2
            });	
        }

        if (dpjp2 != undefined) {
            jQuery('#qrcodeDPJP2').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp2
            });	
        }

        if (dokter2 != undefined) {
            jQuery('#qrcodeDokter2').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter2
            });	
        }

        if (dpjp2 != undefined) {
            jQuery('#qrcodeDPJP2').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp2
            });	
        }

        if (dokter4 != undefined) {
            jQuery('#qrcodeDokter4').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter4
            });	
        }

        if (dpjp4 != undefined) {
            jQuery('#qrcodeDPJP4').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp4
            });	
        }

        if (dokter5 != undefined) {
            jQuery('#qrcodeDokter5').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter5
            });	
        }

        if (dpjp5 != undefined) {
            jQuery('#qrcodeDPJP5').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp5
            });	
        }

        if (dokter6 != undefined) {
            jQuery('#qrcodeDokter6').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter6
            });	
        }

        if (dpjp6 != undefined) {
            jQuery('#qrcodeDPJP6').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp6
            });	
        }

        if (dokter7 != undefined) {
            jQuery('#qrcodeDokter7').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dokter7
            });	
        }

        if (dpjp7 != undefined) {
            jQuery('#qrcodeDPJP7').qrcode({
                width	: 80,
                height	: 80,
                text	: "Tanda Tangan Digital Oleh " + dpjp7
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
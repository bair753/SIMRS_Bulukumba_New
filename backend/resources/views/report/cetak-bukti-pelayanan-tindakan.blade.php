
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKTI PELAYANAN TINDAKAN KEDOKTERAN FISIK DAN REHABILITASI</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
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
        body{
            font-family:Arial, Helvetica, sans-serif;
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
            font-size: 12px;
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
<body ng-controller="cetakBuktiPelayananTindakan">
    <table width="100%" style="table-layout:fixed;border:none">
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
            @else
                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
            @endif
            </td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h2>PEMERINTAH KABUPATEN BULUKUMBA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h1>DINAS KESEHATAN</h1></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h2>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX. 85030 <hr style="border:2px solid #000"></td>
        </tr>
        <tr style="text-align:center">
            <td colspan="9" style="border:none;font-size:13pt;"><h3>BUKTI PELAYANAN TINDAKAN KEDOKTERAN FISIK DAN REHABILITASI</h3></td>
        </tr>
        <tr style="height:20px"></tr>
        <tr>
            <td style="border:1" colspan="2">No. RM</td>
            <td style="border:1" colspan="7">{!! $res['d'][0]->nocm  !!}</td>
        </tr>
        <tr>
            <td style="border:1" colspan="2">Nama Pasien</td>
            <td style="border:1" colspan="7">{!!  $res['d'][0]->namapasien  !!}</td>
        </tr>
        <tr>
            <td style="border:1" colspan="2">Diagnosa</td>
            <td style="border:1" colspan="7">@{{ item.obj[32110811] ? item.obj[32110811] : '' }}</td>
        </tr>
    </table>

    <br><br>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td style="border:1;text-align:center;" rowspan="2" colspan="1">NO</td>
            <td style="border:1;text-align:center;" rowspan="2" colspan="3">PROGRAM</td>
            <td style="border:1;text-align:center;" rowspan="2" colspan="2">TANGGAL</td>
            <td style="border:1;text-align:center;" colspan="3" colspan="3">TANDA TANGAN</td>
        </tr>
        <tr>
            <td style="border:1;text-align:center;" colspan="1">PASIEN</td>
            <td style="border:1;text-align:center;" colspan="1">DOKTER</td>
            <td style="border:1;text-align:center;" colspan="1">TERAPIS</td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110812] ? item.obj[32110812] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110813] ? item.obj[32110813] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110814] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep1" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded1" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet1" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110818] ? item.obj[32110818] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110819] ? item.obj[32110819] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110820] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep2" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded2" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet2" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110824] ? item.obj[32110824] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110825] ? item.obj[32110825] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110826] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep3" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded3" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet3" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110830] ? item.obj[32110830] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110831] ? item.obj[32110831] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110832] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep4" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded4" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet4" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110836] ? item.obj[32110836] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110837] ? item.obj[32110837] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110838] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep5" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded5" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet5" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110842] ? item.obj[32110842] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110843] ? item.obj[32110843] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110844] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep6" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded6" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet6" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110848] ? item.obj[32110848] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110849] ? item.obj[32110849] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110850] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep7" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded7" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet7" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110854] ? item.obj[32110854] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110855] ? item.obj[32110855] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110856] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep8" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded8" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet8" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110860] ? item.obj[32110860] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110861] ? item.obj[32110861] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110862] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep9" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded9" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet9" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110866] ? item.obj[32110866] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110867] ? item.obj[32110867] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110868] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep10" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded10" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet10" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110872] ? item.obj[32110872] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110873] ? item.obj[32110873] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110874] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep11" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded11" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet11" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110878] ? item.obj[32110878] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110879] ? item.obj[32110879] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110880] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep12" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded12" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet12" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110884] ? item.obj[32110884] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110885] ? item.obj[32110885] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110886] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep13" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded13" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet13" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110890] ? item.obj[32110890] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110891] ? item.obj[32110891] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110892] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep14" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded14" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet14" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110896] ? item.obj[32110896] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110897] ? item.obj[32110897] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110898] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep15" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded15" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet15" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110902] ? item.obj[32110902] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110903] ? item.obj[32110903] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110904] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep16" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded16" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet16" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110908] ? item.obj[32110908] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110909] ? item.obj[32110909] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110910] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep17" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded17" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet17" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110914] ? item.obj[32110914] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110915] ? item.obj[32110915] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110916] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep18" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded18" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet18" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110920] ? item.obj[32110920] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110921] ? item.obj[32110921] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110922] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep19" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded19" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet19" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110926] ? item.obj[32110926] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110927] ? item.obj[32110927] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110928] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep20" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded20" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet20" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110932] ? item.obj[32110932] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110933] ? item.obj[32110933] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110934] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep21" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded21" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet21" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110938] ? item.obj[32110938] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110939] ? item.obj[32110939] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110940] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep22" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded22" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet22" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110944] ? item.obj[32110944] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110945] ? item.obj[32110945] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110946] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep23" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded23" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet23" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110950] ? item.obj[32110950] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110951] ? item.obj[32110951] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110952] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep24" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded24" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet24" style="text-align: center"></div></td>
        </tr>

        <tr height="20px">
            <td style="border:1;text-align:center;" colspan="1">@{{ item.obj[32110956] ? item.obj[32110956] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="3">@{{ item.obj[32110957] ? item.obj[32110957] : '' }}</td>
            <td style="border:1;text-align:center;" colspan="2">@{{item.obj[32110958] | toDate | date:'dd-MM-yyyy'}}</td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodep25" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcoded25" style="text-align: center"></div></td>
            <td style="border:1;text-align:center;" colspan="1"><div id="qrcodet25" style="text-align: center"></div></td>
        </tr>

    </table>
    <br><br>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr style="text-align: left;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Bulukumba, @{{item.obj[32110962] | toDate | date:'dd-MM-yyyy'}}</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Dokter  SpKFR,</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcodedokter" style="text-align: center"></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none">(@{{ item.obj[32110963] ? item.obj[32110963] : '__________________________________________' }})</td>
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
  
    angular.controller('cetakBuktiPelayananTindakan', function ($scope, $http, httpService) {
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
        // var keluhan_saat_ini = $scope.item.obj[422203].replace(/(?:\r\n|\r|\n)/g, ', ');
  
        // $scope.item.obj['keluhan_saat_ini'] = keluhan_saat_ini;

        var dokter = $scope.item.obj[32110963];
  
        var p1 = $scope.item.obj[32110815];
        var d1 = $scope.item.obj[32110816];
        var t1 = $scope.item.obj[32110817];

        var p2 = $scope.item.obj[32110821];
        var d2 = $scope.item.obj[32110822];
        var t2 = $scope.item.obj[32110823];

        var p3 = $scope.item.obj[32110827];
        var d3 = $scope.item.obj[32110828];
        var t3 = $scope.item.obj[32110829];

        var p4 = $scope.item.obj[32110833];
        var d4 = $scope.item.obj[32110834];
        var t4 = $scope.item.obj[32110835];

        var p5 = $scope.item.obj[32110839];
        var d5 = $scope.item.obj[32110840];
        var t5 = $scope.item.obj[32110841];

        var p6 = $scope.item.obj[32110845];
        var d6 = $scope.item.obj[32110846];
        var t6 = $scope.item.obj[32110847];

        var p7 = $scope.item.obj[32110851];
        var d7 = $scope.item.obj[32110852];
        var t7 = $scope.item.obj[32110853];

        var p8 = $scope.item.obj[32110857];
        var d8 = $scope.item.obj[32110858];
        var t8 = $scope.item.obj[32110859];

        var p9 = $scope.item.obj[32110863];
        var d9 = $scope.item.obj[32110864];
        var t9 = $scope.item.obj[32110865];

        var p10 = $scope.item.obj[32110869];
        var d10 = $scope.item.obj[32110870];
        var t10 = $scope.item.obj[32110871];

        var p11 = $scope.item.obj[32110875];
        var d11 = $scope.item.obj[32110876];
        var t11 = $scope.item.obj[32110877];

        var p12 = $scope.item.obj[32110881];
        var d12 = $scope.item.obj[32110882];
        var t12 = $scope.item.obj[32110883];

        var p13 = $scope.item.obj[32110887];
        var d13 = $scope.item.obj[32110888];
        var t13 = $scope.item.obj[32110889];

        var p14 = $scope.item.obj[32110893];
        var d14 = $scope.item.obj[32110894];
        var t14 = $scope.item.obj[32110895];

        var p15 = $scope.item.obj[32110899];
        var d15 = $scope.item.obj[32110900];
        var t15 = $scope.item.obj[32110901];

        var p16 = $scope.item.obj[32110905];
        var d16 = $scope.item.obj[32110906];
        var t16 = $scope.item.obj[32110907];

        var p17 = $scope.item.obj[32110911];
        var d17 = $scope.item.obj[32110912];
        var t17 = $scope.item.obj[32110913];

        var p18 = $scope.item.obj[32110917];
        var d18 = $scope.item.obj[32110918];
        var t18 = $scope.item.obj[32110919];

        var p19 = $scope.item.obj[32110923];
        var d19 = $scope.item.obj[32110924];
        var t19 = $scope.item.obj[32110925];

        var p20 = $scope.item.obj[32110929];
        var d20 = $scope.item.obj[32110930];
        var t20 = $scope.item.obj[32110931];

        var p21 = $scope.item.obj[32110935];
        var d21 = $scope.item.obj[32110936];
        var t21 = $scope.item.obj[32110937];

        var p22 = $scope.item.obj[32110941];
        var d22 = $scope.item.obj[32110942];
        var t22 = $scope.item.obj[32110943];

        var p23 = $scope.item.obj[32110947];
        var d23 = $scope.item.obj[32110948];
        var t23 = $scope.item.obj[32110949];

        var p24 = $scope.item.obj[32110953];
        var d24 = $scope.item.obj[32110954];
        var t24 = $scope.item.obj[32110955];

        var p25 = $scope.item.obj[32110959];
        var d25 = $scope.item.obj[32110960];
        var t25 = $scope.item.obj[32110961];

        if(dokter != undefined){
            jQuery('#qrcodedokter').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + dokter
            });	
        }

        if(p1 != undefined){
            jQuery('#qrcodep1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p1
            });	
        }

        if(d1 != undefined){
            jQuery('#qrcoded1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d1
            });	
        }

        if(t1 != undefined){
            jQuery('#qrcodet1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t1
            });	
        }

        if(p2 != undefined){
            jQuery('#qrcodep2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p2
            });	
        }

        if(d2 != undefined){
            jQuery('#qrcoded2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d2
            });	
        }

        if(t2 != undefined){
            jQuery('#qrcodet2').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t2
            });	
        }

        if(p3 != undefined){
            jQuery('#qrcodep3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p3
            });	
        }

        if(d3 != undefined){
            jQuery('#qrcoded3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d3
            });	
        }

        if(t3 != undefined){
            jQuery('#qrcodet3').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t3
            });	
        }

        if(p4 != undefined){
            jQuery('#qrcodep4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p4
            });	
        }

        if(d4 != undefined){
            jQuery('#qrcoded4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d4
            });	
        }

        if(t4 != undefined){
            jQuery('#qrcodet4').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t4
            });	
        }

        if(p5 != undefined){
            jQuery('#qrcodep5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p5
            });	
        }

        if(d5 != undefined){
            jQuery('#qrcoded5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d5
            });	
        }

        if(t5 != undefined){
            jQuery('#qrcodet5').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t5
            });	
        }

        if(p6 != undefined){
            jQuery('#qrcodep6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p6
            });	
        }

        if(d6 != undefined){
            jQuery('#qrcoded6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d6
            });	
        }

        if(t6 != undefined){
            jQuery('#qrcodet6').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t6
            });	
        }

        if(p7 != undefined){
            jQuery('#qrcodep7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p7
            });	
        }

        if(d7 != undefined){
            jQuery('#qrcoded7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d7
            });	
        }

        if(t7 != undefined){
            jQuery('#qrcodet7').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t7
            });	
        }

        if(p8 != undefined){
            jQuery('#qrcodep8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p8
            });	
        }

        if(d8 != undefined){
            jQuery('#qrcoded8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d8
            });	
        }

        if(t8 != undefined){
            jQuery('#qrcodet8').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t8
            });	
        }

        if(p9 != undefined){
            jQuery('#qrcodep9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p9
            });	
        }

        if(d9 != undefined){
            jQuery('#qrcoded9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d9
            });	
        }

        if(t9 != undefined){
            jQuery('#qrcodet9').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t9
            });	
        }

        if(p10 != undefined){
            jQuery('#qrcodep10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p10
            });	
        }

        if(d10 != undefined){
            jQuery('#qrcoded10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d10
            });	
        }

        if(t10 != undefined){
            jQuery('#qrcodet10').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t10
            });	
        }

        if(p11 != undefined){
            jQuery('#qrcodep11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p11
            });	
        }

        if(d11 != undefined){
            jQuery('#qrcoded11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d11
            });	
        }

        if(t11 != undefined){
            jQuery('#qrcodet11').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t11
            });	
        }

        if(p12 != undefined){
            jQuery('#qrcodep12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p12
            });	
        }

        if(d12 != undefined){
            jQuery('#qrcoded12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d12
            });	
        }

        if(t12 != undefined){
            jQuery('#qrcodet12').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t12
            });	
        }

        if(p13 != undefined){
            jQuery('#qrcodep13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p13
            });	
        }

        if(d13 != undefined){
            jQuery('#qrcoded13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d13
            });	
        }

        if(t13 != undefined){
            jQuery('#qrcodet13').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t13
            });	
        }

        if(p14 != undefined){
            jQuery('#qrcodep14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p14
            });	
        }

        if(d14 != undefined){
            jQuery('#qrcoded14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d14
            });	
        }

        if(t14 != undefined){
            jQuery('#qrcodet14').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t14
            });	
        }

        if(p15 != undefined){
            jQuery('#qrcodep15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p15
            });	
        }

        if(d15 != undefined){
            jQuery('#qrcoded15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d15
            });	
        }

        if(t15 != undefined){
            jQuery('#qrcodet15').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t15
            });	
        }

        if(p16 != undefined){
            jQuery('#qrcodep16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p16
            });	
        }

        if(d16 != undefined){
            jQuery('#qrcoded16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d16
            });	
        }

        if(t16 != undefined){
            jQuery('#qrcodet16').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t16
            });	
        }

        if(p17 != undefined){
            jQuery('#qrcodep17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p17
            });	
        }

        if(d17 != undefined){
            jQuery('#qrcoded17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d17
            });	
        }

        if(t17 != undefined){
            jQuery('#qrcodet17').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t17
            });	
        }

        if(p18 != undefined){
            jQuery('#qrcodep18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p18
            });	
        }

        if(d18 != undefined){
            jQuery('#qrcoded18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d18
            });	
        }

        if(t18 != undefined){
            jQuery('#qrcodet18').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t18
            });	
        }

        if(p19 != undefined){
            jQuery('#qrcodep19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p19
            });	
        }

        if(d19 != undefined){
            jQuery('#qrcoded19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d19
            });	
        }

        if(t19 != undefined){
            jQuery('#qrcodet19').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t19
            });	
        }

        if(p20 != undefined){
            jQuery('#qrcodep20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p20
            });	
        }

        if(d20 != undefined){
            jQuery('#qrcoded20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d20
            });	
        }

        if(t20 != undefined){
            jQuery('#qrcodet20').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t20
            });	
        }

        if(p21 != undefined){
            jQuery('#qrcodep21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p21
            });	
        }

        if(d21 != undefined){
            jQuery('#qrcoded21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d21
            });	
        }

        if(t21 != undefined){
            jQuery('#qrcodet21').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t21
            });	
        }

        if(p22 != undefined){
            jQuery('#qrcodep22').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p22
            });	
        }

        if(d22 != undefined){
            jQuery('#qrcoded22').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d22
            });	
        }

        if(t22 != undefined){
            jQuery('#qrcodet22').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t22
            });	
        }

        if(p23 != undefined){
            jQuery('#qrcodep23').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p23
            });	
        }

        if(d23 != undefined){
            jQuery('#qrcoded23').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d23
            });	
        }

        if(t23 != undefined){
            jQuery('#qrcodet23').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t23
            });	
        }

        if(p24 != undefined){
            jQuery('#qrcodep24').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p24
            });	
        }

        if(d24 != undefined){
            jQuery('#qrcoded24').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d24
            });	
        }

        if(t24 != undefined){
            jQuery('#qrcodet24').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t24
            });	
        }

        if(p25 != undefined){
            jQuery('#qrcodep25').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + p25
            });	
        }

        if(d25 != undefined){
            jQuery('#qrcoded25').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d25
            });	
        }

        if(t25 != undefined){
            jQuery('#qrcodet25').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + t25
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
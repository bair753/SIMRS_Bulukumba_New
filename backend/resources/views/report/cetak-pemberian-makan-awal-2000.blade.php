<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal 2000 - 2500 gram</title>
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
            height:200mm;
            width:297mm;
            margin-top:250mm;
            margin-bottom:250mm;
            margin-left:250mm;
            margin-right:250mm;
            margin:0 auto; 
        }
        @page{
            size: A4 Landscape;
        }
        table{ 
            page-break-inside:auto 
        }
		table {
            -fs-table-paginate: paginate;
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
			/* padding:.1rem; */
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
		.text-right{
            text-align: right;
        }
        .bordered{
            border:1px solid #000;
        }
        .noborder{
            border:none;
        }
		.blf{
			border-left:1px solid #000;
		}
		.btp{
			border-top:1px solid #000;
		}
		.btm{
			border-bottom:1px solid #000;
		}
		.br{
			border-right:1px solid #000;
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
            height:9pt
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
		.p3{
			padding:0.3rem;
		}
		.p2{
			padding:0.2rem;
		}
		.pdua{
			padding:1rem;
		}
		
    </style>
</head>
<body ng-controller="cetakPemberianMakanAwal2000">
    <table width='100%'>
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
            <td colspan="13" class="noborder" style="font-size: 10pt">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
            <td colspan="11" class="noborder" style="font-size: 10pt">
                : {!!  $res['d'][0]->namapasien  !!}
            </td>
            <td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
            <td colspan="13" class="noborder" style="font-size: 10pt">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">70</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
            <td colspan="11" class="noborder" style="font-size: 10pt">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark-small">
            <th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
        </tr>
		<tr>
			<td colspan="15">&nbsp; BB : @{{ item.obj[1001750] ? item.obj[1001750] : '' }}</td>
			<td colspan="8">&nbsp; BB MASUK : @{{ item.obj[1001751] ? item.obj[1001751] : '' }}</td>
			<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @{{ item.obj[1001812] ? item.obj[1001812] : '' }}</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI LAHIR/HARI RAWAT</td>
			<td colspan="5">VOLUME MINUM</td>
			<td colspan="5">VOLUME CAIRAN IV</td>
			<td colspan="5">JENIS CAIRAN</td>
			<td colspan="5">TOTAL VOLUME CAIRAN</td>
			<td colspan="26" rowspan="11">
				<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
					<tr class="noborder text-center">
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24" align="left">'Volume minum' merupakan jumlah volume minimal yang diberikan. Selalu bisa naik volume susu ke total volume cairan</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">Gunakan BB lahir atau BB saat masuk yang sampai BB lebih besar</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">Kalau bayi turun berat badan (BB), gunakan BB tertinggi untuk penghitungan</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">Pemberian minum harus dimulai pada hari kedua, jika RR ≤ 80</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">ASI adalah yang terbaik. Gunakan ASI Perah atau Formula 20 Kkal/ 30 cc sampai pemberian minum 150 cc/kg/hr</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">Untuk membuat Formula 20 Kkal/ 30 cc, campur satu sendok peres SGM BBLR di dalam 40 cc air.</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2">-</td>
							<td valign="top" class="noborder" colspan="24">Pindah ke lembar pemeliharaan pemberian minum saat minum bayi mencapai 150 cc/kg/hr.</td>
						</tr>
						<tr class="noborder">
							<td valign="top" class="noborder text-center" colspan="2"></td>
							<td valign="top" class="noborder" colspan="24"><em>(Jk neonatus mengalami intoleransi atau tanda NEC (lihat dibawah) dan pemberian minum lanjutan tertunda, jelaskan masalah pada kolom “komentar” dan gunakan lembar “pemberian minum awal” kedua sesuai kebutuhan perbaiki hari rawat pada kolom pertama)</em></td>
						</tr>
				</table>
			</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 1 :</td>
			<td colspan="5">0 cc/kg/hr</td>
			<td colspan="5">80 cc/kg/hr</td>
			<td colspan="5">D10</td>
			<td colspan="5">80 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 2 :</td>
			<td colspan="5">10 cc/kg/hr</td>
			<td colspan="5">90 cc/kg/hr</td>
			<td colspan="5">D10</td>
			<td colspan="5">100 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 3 :</td>
			<td colspan="5">30 cc/kg/hr</td>
			<td colspan="5">70 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">100 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 4 :</td>
			<td colspan="5">50 cc/kg/hr</td>
			<td colspan="5">70 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 5 :</td>
			<td colspan="5">70 cc/kg/hr</td>
			<td colspan="5">50 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 6 :</td>
			<td colspan="5">90 cc/kg/hr</td>
			<td colspan="5">40 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">130 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 7 :</td>
			<td colspan="5">120 cc/kg/hr</td>
			<td colspan="5">20 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">140 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 8 :</td>
			<td colspan="5">150 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">150 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 9 :</td>
			<td colspan="5">140 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">140 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 10 :</td>
			<td colspan="5">150 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">150 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 11 :</td>
			<td colspan="5">LEMBAR PEMELIHARAAN</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">150 cc/kg/hr</td>
			<td colspan="26" rowspan="2">
				Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; D10 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution

			</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 12 :</td>
			<td colspan="5">LEMBAR PEMELIHARAAN</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">150 cc/kg/hr</td>
		</tr>
		<tr></tr>
		<tr  class="text-center">
			<td colspan="3" rowspan="2">HARI RAWAT INFANT</td>
			<td colspan="3"></td>
			<td colspan="2">A</td>
			<td colspan="3">B</td>
			<td colspan="4"></td>
			<td colspan="3">C</td>
			<td colspan="3"></td>
			<td colspan="4"></td>
			<td colspan="8"></td>
			<td colspan="7"></td>
			<td colspan="9"></td>
		</tr>
		<tr class="text-center">
			<td colspan="3">Tgl hari ini (d/m/y)</td>
			<td colspan="2">Berat Badan (kg)</td>
			<td colspan="3">Volume minum per hari (co/kg/hr)</td>
			<td colspan="4">Volume minum setiap 3 jam (A*B)/8</td>
			<td colspan="3">Volum cairan IV perhari (co/kg/hr)</td>
			<td colspan="3">Volume Cairan per jam (A*B)/12</td>
			<td colspan="4">Jenis Minuman (ASI atau Formula)</td>
			<td colspan="8">MINUMAN DIBERIKAN PERHARI <br> (lingkari setiap minum diberikan)</td>
			<td colspan="7">Tanda Intoleransi (Dsitensi: <br />Muntahan empedu atau susu: feces berdarah)</td>
			<td colspan="9">Komentar</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">DOB atau HD 1</td>
			<td colspan="3">&nbsp;@{{item.obj[1001813] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001814] ? item.obj[1001814] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001815] ? item.obj[1001815] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001816] ? item.obj[1001816] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001817] ? item.obj[1001817] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001818] ? item.obj[1001818] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001819] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001820] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001821] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001822] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001823] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001824] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001825] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001826] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001827] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001828] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001833] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001834] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001835] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001836] ? item.obj[1001836] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">2</td>
			<td colspan="3">&nbsp;@{{item.obj[1001837] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001838] ? item.obj[1001838] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001839] ? item.obj[1001839] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001840] ? item.obj[1001840] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001841] ? item.obj[1001841] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001842] ? item.obj[1001842] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001843] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001844] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001845] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001846] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001847] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001848] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001849] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001850] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001851] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001852] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001857] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001858] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001859] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001860] ? item.obj[1001860] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">3</td>
			<td colspan="3">&nbsp;@{{item.obj[1001861] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001862] ? item.obj[1001862] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001863] ? item.obj[1001863] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001864] ? item.obj[1001864] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001865] ? item.obj[1001865] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001866] ? item.obj[1001866] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001867] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001868] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001869] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001870] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001871] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001872] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001873] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001874] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001875] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001876] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001881] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001882] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001883] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001884] ? item.obj[1001884] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">4</td>
			<td colspan="3">&nbsp;@{{item.obj[1001885] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001886] ? item.obj[1001886] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001887] ? item.obj[1001887] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001888] ? item.obj[1001888] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001889] ? item.obj[1001889] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001890] ? item.obj[1001890] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001891] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001892] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001893] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001894] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001895] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001896] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001897] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001898] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001899] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001900] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001905] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001906] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001907] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001908] ? item.obj[1001908] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">5</td>
			<td colspan="3">&nbsp;@{{item.obj[1001909] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001910] ? item.obj[1001910] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001911] ? item.obj[1001911] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001912] ? item.obj[1001912] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001913] ? item.obj[1001913] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001914] ? item.obj[1001914] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001915] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001916] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001917] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001918] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001919] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001920] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001921] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001922] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001923] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001924] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001929] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001930] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001931] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001932] ? item.obj[1001932] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">6</td>
			<td colspan="3">&nbsp;@{{item.obj[1001933] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001934] ? item.obj[1001934] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001935] ? item.obj[1001935] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001936] ? item.obj[1001936] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001937] ? item.obj[1001937] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001938] ? item.obj[1001938] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001939] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001940] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001941] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001942] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001943] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001944] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001945] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001946] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001947] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001948] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001953] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001954] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001955] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001956] ? item.obj[1001956] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">7</td>
			<td colspan="3">&nbsp;@{{item.obj[1001957] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001958] ? item.obj[1001958] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001959] ? item.obj[1001959] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001960] ? item.obj[1001960] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001961] ? item.obj[1001961] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001962] ? item.obj[1001962] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001963] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001964] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001965] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001966] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001967] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001968] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001969] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001970] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001971] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001972] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001977] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001978] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001979] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001980] ? item.obj[1001980] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">8</td>
			<td colspan="3">&nbsp;@{{item.obj[1001981] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001982] ? item.obj[1001982] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001983] ? item.obj[1001983] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001984] ? item.obj[1001984] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001985] ? item.obj[1001985] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001986] ? item.obj[1001986] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001987] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001988] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001989] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001990] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001991] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001992] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001993] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001994] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001995] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001996] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1002001] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1002002] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002003] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1002004] ? item.obj[1002004] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">9</td>
			<td colspan="3">&nbsp;@{{item.obj[1002005] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1002006] ? item.obj[1002006] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002007] ? item.obj[1002007] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1002008] ? item.obj[1002008] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002009] ? item.obj[1002009] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1002010] ? item.obj[1002010] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002011] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1002012] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1002013] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002014] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002015] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002016] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002017] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002018] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002019] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002020] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1002025] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1002026] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002027] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1002028] ? item.obj[1002028] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">10</td>
			<td colspan="3">&nbsp;@{{item.obj[1002029] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1002030] ? item.obj[1002030] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002031] ? item.obj[1002031] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1002032] ? item.obj[1002032] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002033] ? item.obj[1002033] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1002034] ? item.obj[1002034] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002035] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1002036] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1002037] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002039] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002040] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002041] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002042] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002043] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002044] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1002049] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1002050] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002051] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1002052] ? item.obj[1002052] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">11</td>
			<td colspan="2">&nbsp;@{{item.obj[1002053] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002054] ? item.obj[1002054] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002055] ? item.obj[1002055] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1002056] ? item.obj[1002056] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002057] ? item.obj[1002057] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1002058] ? item.obj[1002058] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002059] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1002060] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1002061] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002062] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002063] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002064] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002065] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002066] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002067] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002068] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1002073] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1002074] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002075] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1002076] ? item.obj[1002076] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">12</td>
			<td colspan="2">&nbsp;@{{item.obj[1002077] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002078] ? item.obj[1002078] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002079] ? item.obj[1002079] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1002080] ? item.obj[1002080] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1002081] ? item.obj[1002081] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1002082] ? item.obj[1002082] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002083] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1002084] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1002085] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002086] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002087] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002088] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002091] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1002092] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1002097] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1002098] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1002099] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1002100] ? item.obj[1002100] : '' }}</td>
		</tr>
    </table>
	<div class="pdua">
		<table style="table-layout:fixed;border:none;width:100%;">
			<tr class="p03">
				<td colspan="49" class="noborder"></td>
			</tr>
			<tr>
				<td colspan="20" class="noborder"></td>
				<td class="noborder"></td>
				<td colspan="7" rowspan="3">Pertimbangkan NEC. Hentikan minuman 24-48 jam. Mulai cairan IV sampai 150cc/kg/d Mulai Amp/Sulbactam</td>
				<td class="noborder" colspan="7"></td>
				<td class="noborder btm">+</td>
				<td colspan="7" rowspan="2">Jk pneumotoses, lanjut status puasa, Antibiotik dan cairan IV untuk 14 hari</td>
			</tr>
			<tr>
				<td class="noborder" colspan="10" rowspan="2">
					PENDEKATAN UNTUK TOLERANSI MAKANAN <br>
					PADA BAYI BERAT BADAN LAHIR RENDAH
				</td>
				<td class="noborder"></td>
				<td class="noborder"></td>
				<td class="noborder btm"></td>
				<td class="noborder btm"></td>
				<td colspan="6" class="text-center" rowspan="2">Residu/muntahan dgn cairan empedu atau feses berdarah</td>
				<td class="noborder"></td>
				<td class="noborder" colspan=""></td>
				
				<td colspan="4" rowspan="2">Abdominal X-Ray dalam 24 jam</td>
				<td class="noborder"></td>
				<td class="noborder br"></td>
				<td class="noborder"></td>
				<td class="noborder"></td>
			</tr>
			<tr>
				<td class="noborder"></td>
				<td class="noborder"></td>
				<td class="noborder blf"></td>
				<td class="noborder"></td>
				<td class="noborder"></td>
				<td class="noborder"></td>
				<td colspan="" class="noborder btp"></td>
				<td class="noborder btp br"></td>
				<td class="noborder"></td>
			</tr>
			<tr>
				<td colspan="3" rowspan="2" class="text-center">Intoleransi Makanan</td>
				<td class="noborder"></td>
				<td class="noborder"></td>
				<td rowspan="2" colspan="6" class="text-center">Distensi; muntahan/residu dgn empedu; Darah pada feses</td>
				<td class="noborder blf btm"></td>
				<td class="noborder blf"></td>
				<td class="noborder"></td>
				<td colspan="19" class="noborder"></td>
				<td class="noborder"></td>
				<td class="noborder br"></td>
				<td class="btm bl noborder"></td>
				<td class="" colspan="7" rowspan="2">Jk negatif, mulai pemberian minum pada volume terakhir sebelum terjadi</td>
			</tr>
			<tr>
				<td class="noborder btp"></td>
				<td class="noborder btp"></td>
				<td class="noborder br"></td>
				<td class="noborder"></td>
				<td class="noborder br btm"></td>
				<td colspan="6" rowspan="2" class="text-center">Residu/muntahan tdk <br> mengandung cairan empedu</td>
				<td class="noborder"></td>
				<td colspan="7" rowspan="2" class="text-center">Jk Aspirasi < 25% minuman. Lanjutkan pemberian minuman</td>
				<td colspan="7" class="noborder"></td>
				<td class="noborder">-</td>
			</tr>
			<tr>
				<td colspan="11" class="noborder"></td>
				<td class="noborder"></td>
				<td class="noborder btp"></td>
				
			</tr>
			<tr></tr>
			<tr>
				<td colspan="21" class="noborder"></td>
				<td colspan="7" rowspan="2">Jk, 25-50 %. Turunkan pemberian minuman hingga 50%</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td colspan="21" class="noborder"></td>
				<td colspan="7" rowspan="2">Jk > 50%, tundai 1 atau 2 kali minum, mulai pemberian minum 50% dari volume sebelumnya</td>
			</tr>
		</table>
	</div>
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

    angular.controller('cetakPemberianMakanAwal2000', function ($scope, $http, httpService) {
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
    // $(document).ready(function () {
    //     window.print();
    // });
</script>
</html>
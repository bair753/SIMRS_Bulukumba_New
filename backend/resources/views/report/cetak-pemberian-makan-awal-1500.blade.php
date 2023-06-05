<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal 1500 - 2000 gram</title>
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
<body ng-controller="cetakPemberianMakanAwal1500">
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
            <th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
        </tr>
		<tr>
			<td colspan="15">&nbsp; BB : @{{ item.obj[1001350] ? item.obj[1001350] : '' }}</td>
			<td colspan="8">&nbsp; BB MASUK : @{{ item.obj[1001351] ? item.obj[1001351] : '' }}</td>
			<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @{{ item.obj[1001412] ? item.obj[1001412] : '' }}</td>
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
			<td colspan="5">20 cc/kg/hr</td>
			<td colspan="5">80 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">100 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 4 :</td>
			<td colspan="5">40 cc/kg/hr</td>
			<td colspan="5">80 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 5 :</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 6 :</td>
			<td colspan="5">80 cc/kg/hr</td>
			<td colspan="5">40 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 7 :</td>
			<td colspan="5">100 cc/kg/hr</td>
			<td colspan="5">20 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 8 :</td>
			<td colspan="5">120 cc/kg/hr</td>
			<td colspan="5">10 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">130 cc/kg/hr</td>
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
			<td colspan="2"></td>
			<td colspan="3">A</td>
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
			<td colspan="3">&nbsp;@{{item.obj[1001413] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001414] ? item.obj[1001414] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001415] ? item.obj[1001415] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001416] ? item.obj[1001416] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001417] ? item.obj[1001417] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001418] ? item.obj[1001418] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001419] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001420] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001423] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001424] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001425] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001426] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001427] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001433] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001434] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001436] ? item.obj[1001436] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">2</td>
			<td colspan="3">&nbsp;@{{item.obj[1001437] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001438] ? item.obj[1001438] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001439] ? item.obj[1001439] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001440] ? item.obj[1001440] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001441] ? item.obj[1001441] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001442] ? item.obj[1001442] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001443] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001444] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001445] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001446] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001447] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001448] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001449] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001450] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001451] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001452] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001457] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001458] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001459] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001460] ? item.obj[1001460] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">3</td>
			<td colspan="3">&nbsp;@{{item.obj[1001461] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001462] ? item.obj[1001462] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001463] ? item.obj[1001463] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001464] ? item.obj[1001464] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001465] ? item.obj[1001465] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001466] ? item.obj[1001466] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001467] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001468] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001469] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001470] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001471] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001472] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001473] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001474] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001475] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001476] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001481] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001482] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001483] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001484] ? item.obj[1001484] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">4</td>
			<td colspan="3">&nbsp;@{{item.obj[1001485] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001486] ? item.obj[1001486] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001487] ? item.obj[1001487] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001488] ? item.obj[1001488] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001489] ? item.obj[1001489] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001490] ? item.obj[1001490] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001491] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001492] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001493] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001494] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001495] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001496] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001497] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001498] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001499] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001500] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001505] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001506] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001507] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001508] ? item.obj[1001508] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">5</td>
			<td colspan="3">&nbsp;@{{item.obj[1001509] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001510] ? item.obj[1001510] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001511] ? item.obj[1001511] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001512] ? item.obj[1001512] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001513] ? item.obj[1001513] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001514] ? item.obj[1001514] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001515] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001516] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001517] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001518] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001519] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001520] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001521] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001522] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001523] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001524] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001529] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001530] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001531] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001532] ? item.obj[1001532] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">6</td>
			<td colspan="3">&nbsp;@{{item.obj[1001533] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001534] ? item.obj[1001534] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001535] ? item.obj[1001535] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001536] ? item.obj[1001536] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001537] ? item.obj[1001537] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001538] ? item.obj[1001538] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001541] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001542] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001543] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001556] ? item.obj[1001556] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">7</td>
			<td colspan="3">&nbsp;@{{item.obj[1001557] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001558] ? item.obj[1001558] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001559] ? item.obj[1001559] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001560] ? item.obj[1001560] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001561] ? item.obj[1001561] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001562] ? item.obj[1001562] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001563] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001564] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001565] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001566] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001567] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001568] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001569] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001570] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001571] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001572] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001577] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001578] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001579] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001580] ? item.obj[1001580] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">8</td>
			<td colspan="3">&nbsp;@{{item.obj[1001581] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001582] ? item.obj[1001582] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001583] ? item.obj[1001583] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001584] ? item.obj[1001584] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001585] ? item.obj[1001585] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001586] ? item.obj[1001586] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001587] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001588] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001589] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001590] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001591] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001592] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001593] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001594] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001595] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001596] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001601] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001602] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001603] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001604] ? item.obj[1001604] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">9</td>
			<td colspan="3">&nbsp;@{{item.obj[1001605] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001606] ? item.obj[1001606] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001607] ? item.obj[1001607] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001608] ? item.obj[1001608] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001609] ? item.obj[1001609] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001610] ? item.obj[1001610] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001611] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001612] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001613] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001614] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001615] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001616] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001617] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001618] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001619] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001620] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001625] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001626] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001627] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001628] ? item.obj[1001628] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">10</td>
			<td colspan="3">&nbsp;@{{item.obj[1001629] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001630] ? item.obj[1001630] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001631] ? item.obj[1001631] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001632] ? item.obj[1001632] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001633] ? item.obj[1001633] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001634] ? item.obj[1001634] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001635] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001636] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001637] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001638] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001639] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001640] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001641] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001642] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001643] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001644] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001649] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001650] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001651] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001652] ? item.obj[1001652] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">11</td>
			<td colspan="3">&nbsp;@{{item.obj[1001653] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001654] ? item.obj[1001654] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001655] ? item.obj[1001655] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001656] ? item.obj[1001656] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001657] ? item.obj[1001657] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001658] ? item.obj[1001658] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001659] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001660] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001661] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001662] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001663] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001664] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001665] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001666] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001667] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001668] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001673] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001674] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001675] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001676] ? item.obj[1001676] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">12</td>
			<td colspan="3">&nbsp;@{{item.obj[1001677] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[1001678] ? item.obj[1001678] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001679] ? item.obj[1001679] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[1001680] ? item.obj[1001680] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[1001681] ? item.obj[1001681] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[1001682] ? item.obj[1001682] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001683] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[1001684] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[1001685] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001686] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001687] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001688] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001689] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001690] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001691] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[1001692] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[1001697] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[1001698] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[1001699] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[1001700] ? item.obj[1001700] : '' }}</td>
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
				<td colspan="7" rowspan="2">Jk, 25-50 %. Turunkan pemberian minuman hingga 50%</td>
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

    angular.controller('cetakPemberianMakanAwal1500', function ($scope, $http, httpService) {
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
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
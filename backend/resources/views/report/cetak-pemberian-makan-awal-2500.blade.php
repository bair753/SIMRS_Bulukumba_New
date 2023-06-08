<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal Lebih dari 2500 gram</title>
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
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">72</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
            <td colspan="11" class="noborder" style="font-size: 10pt">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark-small">
            <th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
        </tr>
		<tr>
			<td colspan="15">&nbsp; BB : @{{ item.obj[32104178] ? item.obj[32104178] : '' }}</td>
			<td colspan="8">&nbsp; BB MASUK : @{{ item.obj[32104179] ? item.obj[32104179] : '' }}</td>
			<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @{{ item.obj[32104240] ? item.obj[32104240] : '' }}</td>
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
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">D10</td>
			<td colspan="5">60 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 2 :</td>
			<td colspan="5">20 cc/kg/hr</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">D10</td>
			<td colspan="5">80 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 3 :</td>
			<td colspan="5">40 cc/kg/hr</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">100 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 4 :</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">60 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 5 :</td>
			<td colspan="5">80 cc/kg/hr</td>
			<td colspan="5">40 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 6 :</td>
			<td colspan="5">100 cc/kg/hr</td>
			<td colspan="5">20 cc/kg/hr</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 7 :</td>
			<td colspan="5">120 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">120 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 8 :</td>
			<td colspan="5">140 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">140 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 9 :</td>
			<td colspan="5">150 cc/kg/hr</td>
			<td colspan="5">OFF</td>
			<td colspan="5">D10 1/5 NS</td>
			<td colspan="5">150 cc/kg/hr</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">HARI 10 :</td>
			<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
			<td colspan="3">&nbsp;@{{item.obj[32104241] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104242] ? item.obj[32104242] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104243] ? item.obj[32104243] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104244] ? item.obj[32104244] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104245] ? item.obj[32104245] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104246] ? item.obj[32104246] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104247] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104248] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104249] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104252] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104264] ? item.obj[32104264] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">2</td>
			<td colspan="3">&nbsp;@{{item.obj[32104265] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104266] ? item.obj[32104266] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104267] ? item.obj[32104267] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104268] ? item.obj[32104268] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104269] ? item.obj[32104269] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104270] ? item.obj[32104270] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104271] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104278] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104288] ? item.obj[32104288] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">3</td>
			<td colspan="3">&nbsp;@{{item.obj[32104289] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104290] ? item.obj[32104290] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104291] ? item.obj[32104291] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104292] ? item.obj[32104292] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104293] ? item.obj[32104293] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104294] ? item.obj[32104294] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104297] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104298] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104299] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104300] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104301] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104304] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104311] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104312] ? item.obj[32104312] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">4</td>
			<td colspan="3">&nbsp;@{{item.obj[32104313] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104314] ? item.obj[32104314] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104315] ? item.obj[32104315] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104316] ? item.obj[32104316] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104317] ? item.obj[32104317] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104318] ? item.obj[32104318] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104319] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104320] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104321] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104322] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104325] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104326] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104327] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104328] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104333] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104334] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104335] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104336] ? item.obj[32104336] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">5</td>
			<td colspan="3">&nbsp;@{{item.obj[32104337] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104338] ? item.obj[32104338] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104339] ? item.obj[32104339] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104340] ? item.obj[32104340] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104341] ? item.obj[32104341] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104342] ? item.obj[32104342] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104343] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104346] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104347] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104348] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104349] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104350] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104357] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104360] ? item.obj[32104360] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">6</td>
			<td colspan="3">&nbsp;@{{item.obj[32104361] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104362] ? item.obj[32104362] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104363] ? item.obj[32104363] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104364] ? item.obj[32104364] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104365] ? item.obj[32104365] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104366] ? item.obj[32104366] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104367] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104368] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104369] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104370] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104371] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104374] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104375] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104376] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104384] ? item.obj[32104384] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">7</td>
			<td colspan="3">&nbsp;@{{item.obj[32104385] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104386] ? item.obj[32104386] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104387] ? item.obj[32104387] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104388] ? item.obj[32104388] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104389] ? item.obj[32104389] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104390] ? item.obj[32104390] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104391] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104392] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104395] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104396] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104397] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104398] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104399] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104405] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104406] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104408] ? item.obj[32104408] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">8</td>
			<td colspan="3">&nbsp;@{{item.obj[32104409] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104410] ? item.obj[32104410] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104411] ? item.obj[32104411] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104412] ? item.obj[32104412] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104413] ? item.obj[32104413] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104414] ? item.obj[32104414] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104417] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104418] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104419] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104420] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104423] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104424] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104430] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104431] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104432] ? item.obj[32104432] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">9</td>
			<td colspan="3">&nbsp;@{{item.obj[32104433] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104434] ? item.obj[32104434] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104435] ? item.obj[32104435] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104436] ? item.obj[32104436] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104437] ? item.obj[32104437] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104438] ? item.obj[32104438] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104439] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104440] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104441] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104442] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104443] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104444] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104445] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104446] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104447] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104448] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104453] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104454] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104455] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104456] ? item.obj[32104456] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">10</td>
			<td colspan="3">&nbsp;@{{item.obj[32104457] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104458] ? item.obj[32104458] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104459] ? item.obj[32104459] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104460] ? item.obj[32104460] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104461] ? item.obj[32104461] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104462] ? item.obj[32104462] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104463] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104464] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104465] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104466] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104467] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104468] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104469] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104470] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104471] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104472] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104477] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104478] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104479] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104480] ? item.obj[32104480] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">11</td>
			<td colspan="3">&nbsp;@{{item.obj[32104481] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104482] ? item.obj[32104482] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104483] ? item.obj[32104483] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104484] ? item.obj[32104484] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104485] ? item.obj[32104485] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104486] ? item.obj[32104486] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104487] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104488] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104489] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104490] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104491] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104492] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104493] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104494] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104495] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104496] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104501] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104502] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104503] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104504] ? item.obj[32104504] : '' }}</td>
		</tr>
		<tr>
			<td colspan="3" class="text-center">12</td>
			<td colspan="3">&nbsp;@{{item.obj[32104505] | toDate | date:'dd MMMM yyyy'}}</td>
			<td colspan="2">&nbsp;@{{ item.obj[32104506] ? item.obj[32104506] : '' }}</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104507] ? item.obj[32104507] : '' }}</td>
			<td colspan="2" class="noborder btm">&nbsp;@{{ item.obj[32104508] ? item.obj[32104508] : '' }}</td>
			<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
			<td colspan="3">&nbsp;@{{ item.obj[32104509] ? item.obj[32104509] : '' }}</td>
			<td colspan="2" class="noborder btm"></td>
			<td class="noborder br btm" style="text-align: right;">@{{ item.obj[32104510] ? item.obj[32104510] : '' }} cc&nbsp;</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104511] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} ASI</td>
			<td colspan="2" class="noborder text-center btm">@{{ item.obj[32104512] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} F</td>
			<td colspan="" class="text-center blf noborder btm">@{{ item.obj[32104513] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104514] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104515] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104516] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104517] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104518] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104519] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7</td>
			<td colspan="" class="text-center noborder btm">@{{ item.obj[32104520] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8</td>
			<td colspan="2" class="text-center noborder blf btm">@{{ item.obj[32104525] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dis</td>
			<td colspan="3" class="text-center noborder btm">@{{ item.obj[32104526] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} M - emp su</td>
			<td colspan="2" class="text-center noborder btm">@{{ item.obj[32104527] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} D</td>
			<td colspan="9" class="text-center">@{{ item.obj[32104528] ? item.obj[32104528] : '' }}</td>
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
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
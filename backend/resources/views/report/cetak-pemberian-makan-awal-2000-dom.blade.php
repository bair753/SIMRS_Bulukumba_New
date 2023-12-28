<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal 2000 - 2500 gram</title>
    <style>
      html,body{
           
		   box-sizing:border-box;
		   /* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
		   font-family: Arial, Helvetica, sans-serif;
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
            font-size: 6pt;
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
		/* .format{
            page-break-after: always;
        } */
		
    </style>
</head>
@if (!empty($res['d1']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d1'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d1'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d1'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d2']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d2'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d2'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d2'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="5">d20</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">d20</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">30 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d20 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				
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
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d3']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d3'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d3'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d3'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="5">d30</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">d30</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">30 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d30 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				
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
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d4']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d4'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d4'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d4'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="5">d40</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">d40</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">30 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d40 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				
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
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d5']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d5'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d5'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d5'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="5">d50</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">d50</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">30 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d50 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				
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
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d6']))
	<body>
		<div class="format">
			<table width='100%'>
				<tr height=20 class="noborder">
					<td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</td>
					<td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
						<strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
					</td>
					<td colspan="6" class="noborder" style="font-size: 10pt">No. RM </td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! $res['d6'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d6'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d6'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d6'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">70</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d6'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 2000-2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d6'] as $item) @if($item->emrdfk == 1001750) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d6'] as $item) @if($item->emrdfk == 1001751) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d6'] as $item) @if($item->emrdfk == 1001812) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI LAHIR/HARI RAWAT</td>
					<td colspan="5">VOLUME MINUM</td>
					<td colspan="5">VOLUME CAIRAN IV</td>
					<td colspan="5">JENIS CAIRAN</td>
					<td colspan="5">TOTAL VOLUME CAIRAN</td>
					<td colspan="26" rowspan="11">
						<table class="noborder" style="table-layout:fixed;text-align:left;width:100%">
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
					<td colspan="5">d60</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">d60</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">30 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">70 cc/kg/hr</td>
					<td colspan="5">50 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">90 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d60 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				
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
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001813) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001814) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001815) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001816) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001817) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001818) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001824) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001827) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001828) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001836) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001837) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001838) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001839) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001840) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001841) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001842) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001848) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001852) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001860) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001861) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001862) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001863) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001864) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001865) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001866) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001870) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001884) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001885) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001886) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001887) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001888) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001889) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001890) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001892) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001893) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001894) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001895) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001896) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001897) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001898) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001899) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001900) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001905) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001906) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001907) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001908) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001909) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001910) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001911) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001912) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001913) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001914) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001915) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001916) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001917) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001918) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001919) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001920) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001921) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001922) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001923) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001924) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001929) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001930) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001931) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001932) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001933) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001934) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001935) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001936) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001937) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001938) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001939) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001940) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001941) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001942) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001943) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001944) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001945) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001946) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001947) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001948) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001953) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001954) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001955) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001956) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001957) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001958) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001959) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001960) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001961) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001962) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001963) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001964) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001965) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001966) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001967) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001968) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001969) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001970) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001971) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001972) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001977) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001978) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001979) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001980) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001981) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001982) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001983) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001984) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1001985) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001986) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001987) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001988) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001989) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001990) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001991) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001992) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001993) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001994) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001995) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1001996) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002001) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002002) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002003) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002004) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002005) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002006) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002007) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002008) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002009) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002010) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002011) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002012) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002013) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002014) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002015) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002016) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002017) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002018) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002019) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002020) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002025) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002026) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002027) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002028) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002029) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002030) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002031) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002032) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002033) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002034) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002035) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002036) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002037) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002038) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002049) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002050) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002051) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002052) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002053) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002054) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002055) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002056) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002057) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002058) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002059) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002060) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002061) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002062) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002063) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002064) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002065) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002066) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002067) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002068) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002073) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002074) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002075) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002076) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002077) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002078) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002079) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002080) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 1002081) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002082) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002083) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002084) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002085) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002086) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002087) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002088) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002091) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002092) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002097) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002098) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002099) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 1002100) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif
</html>
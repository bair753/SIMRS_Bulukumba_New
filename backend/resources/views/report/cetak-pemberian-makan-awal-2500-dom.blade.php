<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal Lebih dari 2500 gram</title>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d1'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d1'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d1'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d1'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d2'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d2'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d2'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d2'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d20</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d20</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d3'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d3'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d3'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d3'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d30</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d30</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d4'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d4'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d4'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d4'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d40</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d40</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d5'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d5'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d5'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d5'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d50</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d50</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d6'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d6'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d6'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d6'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d60</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d60</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d60 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
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
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d6'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif

@if (!empty($res['d7']))
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
						: {!! $res['d7'][0]->nocm  !!}
					</td>
					<td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: 36px;text-align:center">RM</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Nama Lengkap</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!!  $res['d7'][0]->namapasien  !!}
					</td>
					<td colspan="2" class="noborder" style="font-size: 10pt">{!!  $res['d7'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">Tanggal Lahir</td>
					<td colspan="13" class="noborder" style="font-size: 10pt">
						: {!! date('d-m-Y',strtotime( $res['d7'][0]->tgllahir  )) !!}
					</td>
					<td colspan="5" class="border-lr" rowspan="2" style="font-size: 36px;text-align:center">72</td>
				</tr>
				<tr class="noborder">
					<td colspan="6" class="noborder" style="font-size: 10pt">NIK</td>
					<td colspan="11" class="noborder" style="font-size: 10pt">
						: {!! $res['d7'][0]->noidentitas  !!}
					</td>
				</tr>
				<tr class="bordered bg-dark-small">
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS LEBIH DARI 2500 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d7'] as $item) @if($item->emrdfk == 32104178) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d7'] as $item) @if($item->emrdfk == 32104179) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d7'] as $item) @if($item->emrdfk == 32104240) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d70</td>
					<td colspan="5">60 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 2 :</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d70</td>
					<td colspan="5">80 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 3 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">140 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">140 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 9 :</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 10 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 11 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
					<td colspan="5">150 cc/kg/hr</td>
					<td colspan="26" rowspan="2">
						Kunci - DOB : Hari lahir; HD : Hari rawat; * %Perubahan dari BB lahir = (BW-AW/BW)* 100 dimana BW adalah berat lahir dan AW <br> adalah berat saat masuk; d70 : Dextrose 10%; NS : Normal Saline atau 154 mEq/L solution
		
					</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 12 :</td>
					<td colspan="5">LEMBAR PEMELIHARAAN</td>
					<td colspan="5">OFF</td>
					<td colspan="5">d70 1/5 NS</td>
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
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104241) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104242) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104243) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104244) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104245) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104246) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104248) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104255) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104264) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104265) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104266) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104267) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104268) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104269) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104270) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104276) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104278) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104280) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104286) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104288) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104289) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104290) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104291) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104292) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104293) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104294) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104302) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104309) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104312) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104313) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104314) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104315) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104316) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104317) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104318) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104323) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104336) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104337) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104338) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104339) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104340) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104341) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104342) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104344) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104345) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104346) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104347) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104348) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104349) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104350) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104351) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104352) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104357) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104358) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104359) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104360) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104361) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104362) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104363) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104364) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104365) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104366) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104370) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104384) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104385) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104386) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104387) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104388) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104389) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104390) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104392) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104393) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104394) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104395) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104396) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104407) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104408) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104409) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104410) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104411) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104412) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104414) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104429) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104432) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104433) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104434) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104435) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104436) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104438) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104439) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104440) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104453) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104454) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104455) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104456) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104457) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104458) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104459) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104460) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104462) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104463) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104464) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104465) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104466) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104477) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104478) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104479) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104480) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104481) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104482) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104483) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104484) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104486) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104487) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104488) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104489) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104490) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104501) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104502) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104503) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104504) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104505) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104506) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104507) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104508) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk == 32104509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104510) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104511) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104512) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104513) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104514) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104525) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104526) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104527) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d7'] as $item) @if($item->emrdfk == 32104528) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:400px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif
</html>
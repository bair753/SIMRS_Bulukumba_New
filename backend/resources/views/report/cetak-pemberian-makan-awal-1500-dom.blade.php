<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Makan Awal 1500 - 2000 gram</title>
   
    <style>
        html,body{
           
            box-sizing:border-box;
			/* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
			font-family: Arial, Helvetica, sans-serif;
        }
        @page{
            size: A4 Landscape;
        }
        /* table{ 
            page-break-inside:auto 
        } */
		/* table {
            -fs-table-paginate: paginate;
        } */
        /* tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        } */
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
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001350) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001351) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d1'] as $item) @if($item->emrdfk == 1001412) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001414) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001415) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001416) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001417) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001418) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001425) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001428) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001433) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001434) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001436) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001438) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001439) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001440) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001441) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001442) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001449) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001450) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001451) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001452) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001457) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001458) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001459) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001460) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001462) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001463) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001464) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001465) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001466) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001473) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001474) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001475) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001476) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001481) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001482) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001483) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001484) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001486) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001487) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001488) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001489) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001490) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001497) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001498) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001499) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001500) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001505) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001506) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001507) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001508) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001510) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001511) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001512) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001513) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001514) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001521) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001522) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001523) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001524) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001529) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001530) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001531) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001532) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001533) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001534) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001535) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001536) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001537) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001538) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001541) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001542) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001543) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001554) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001555) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001556) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001557) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001558) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001559) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001560) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001561) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001562) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001563) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001564) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001565) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001566) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001567) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001568) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001569) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001570) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001571) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001572) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001577) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001578) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001579) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001580) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001581) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001582) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001583) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001584) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001585) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001586) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001587) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001588) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001589) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001590) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001591) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001592) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001593) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001594) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001595) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001596) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001601) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001602) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001603) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001604) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001605) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001606) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001607) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001608) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001609) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001610) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001611) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001612) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001613) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001614) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001615) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001616) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001617) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001618) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001619) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001628) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001629) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001630) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001631) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001632) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001633) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001634) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001637) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001638) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001641) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001642) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001643) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001651) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001652) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001653) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001654) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001655) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001656) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001657) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001658) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001676) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001677) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001678) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001679) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001680) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk == 1001681) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001682) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 1001700) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:500px;"></center></th>
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
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001350) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001351) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d2'] as $item) @if($item->emrdfk == 1001412) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">d20 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
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
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001414) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001415) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001416) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001417) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001418) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001425) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001428) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001433) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001434) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001436) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001438) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001439) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001440) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001441) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001442) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001449) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001450) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001451) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001452) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001457) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001458) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001459) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001460) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001462) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001463) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001464) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001465) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001466) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001473) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001474) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001475) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001476) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001481) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001482) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001483) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001484) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001486) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001487) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001488) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001489) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001490) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001497) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001498) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001499) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001500) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001505) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001506) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001507) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001508) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001510) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001511) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001512) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001513) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001514) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001521) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001522) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001523) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001524) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001529) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001530) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001531) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001532) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001533) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001534) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001535) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001536) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001537) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001538) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001541) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001542) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001543) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001554) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001555) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001556) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001557) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001558) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001559) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001560) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001561) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001562) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001563) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001564) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001565) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001566) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001567) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001568) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001569) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001570) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001571) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001572) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001577) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001578) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001579) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001580) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001581) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001582) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001583) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001584) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001585) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001586) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001587) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001588) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001589) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001590) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001591) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001592) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001593) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001594) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001595) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001596) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001601) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001602) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001603) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001604) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001605) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001606) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001607) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001608) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001609) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001610) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001611) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001612) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001613) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001614) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001615) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001616) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001617) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001618) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001619) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001628) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001629) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001630) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001631) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001632) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001633) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001634) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001637) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001638) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001641) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001642) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001643) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001651) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001652) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001653) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001654) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001655) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001656) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001657) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001658) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001676) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001677) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001678) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001679) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001680) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk == 1001681) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001682) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 1001700) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:500px;"></center></th>
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
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001350) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001351) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d3'] as $item) @if($item->emrdfk == 1001412) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">d30 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
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
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001414) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001415) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001416) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001417) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001418) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001425) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001428) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001433) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001434) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001436) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001438) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001439) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001440) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001441) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001442) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001449) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001450) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001451) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001452) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001457) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001458) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001459) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001460) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001462) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001463) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001464) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001465) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001466) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001473) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001474) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001475) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001476) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001481) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001482) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001483) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001484) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001486) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001487) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001488) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001489) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001490) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001497) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001498) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001499) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001500) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001505) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001506) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001507) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001508) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001510) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001511) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001512) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001513) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001514) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001521) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001522) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001523) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001524) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001529) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001530) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001531) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001532) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001533) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001534) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001535) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001536) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001537) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001538) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001541) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001542) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001543) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001554) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001555) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001556) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001557) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001558) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001559) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001560) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001561) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001562) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001563) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001564) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001565) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001566) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001567) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001568) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001569) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001570) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001571) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001572) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001577) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001578) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001579) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001580) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001581) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001582) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001583) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001584) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001585) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001586) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001587) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001588) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001589) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001590) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001591) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001592) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001593) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001594) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001595) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001596) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001601) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001602) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001603) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001604) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001605) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001606) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001607) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001608) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001609) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001610) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001611) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001612) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001613) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001614) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001615) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001616) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001617) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001618) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001619) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001628) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001629) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001630) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001631) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001632) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001633) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001634) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001637) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001638) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001641) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001642) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001643) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001651) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001652) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001653) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001654) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001655) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001656) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001657) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001658) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001676) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001677) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001678) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001679) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001680) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk == 1001681) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001682) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 1001700) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:500px;"></center></th>
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
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001350) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001351) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d4'] as $item) @if($item->emrdfk == 1001412) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">d40 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
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
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001414) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001415) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001416) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001417) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001418) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001425) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001428) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001433) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001434) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001436) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001438) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001439) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001440) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001441) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001442) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001449) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001450) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001451) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001452) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001457) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001458) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001459) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001460) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001462) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001463) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001464) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001465) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001466) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001473) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001474) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001475) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001476) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001481) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001482) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001483) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001484) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001486) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001487) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001488) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001489) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001490) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001497) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001498) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001499) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001500) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001505) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001506) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001507) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001508) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001510) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001511) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001512) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001513) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001514) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001521) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001522) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001523) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001524) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001529) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001530) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001531) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001532) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001533) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001534) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001535) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001536) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001537) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001538) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001541) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001542) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001543) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001554) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001555) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001556) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001557) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001558) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001559) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001560) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001561) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001562) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001563) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001564) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001565) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001566) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001567) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001568) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001569) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001570) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001571) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001572) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001577) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001578) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001579) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001580) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001581) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001582) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001583) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001584) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001585) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001586) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001587) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001588) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001589) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001590) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001591) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001592) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001593) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001594) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001595) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001596) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001601) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001602) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001603) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001604) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001605) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001606) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001607) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001608) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001609) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001610) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001611) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001612) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001613) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001614) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001615) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001616) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001617) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001618) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001619) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001628) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001629) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001630) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001631) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001632) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001633) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001634) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001637) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001638) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001641) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001642) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001643) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001651) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001652) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001653) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001654) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001655) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001656) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001657) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001658) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001676) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001677) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001678) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001679) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001680) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk == 1001681) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001682) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 1001700) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:500px;"></center></th>
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
					<th colspan="49" height="20pt">PEMBERIAN MAKAN AWAL DAN PENURUNAN CAIRAN IV PADA NEONATUS 1500-2000 GRAM DARI HARI PERAWATAN 1-12</th>
				</tr>
				<tr>
					<td colspan="15">&nbsp; BB : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001350) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="8">&nbsp; BB MASUK : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001351) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="26">&nbsp; % PERUBAHAN DARI BB LAHIR : @foreach($res['d5'] as $item) @if($item->emrdfk == 1001412) {!! $item->value !!} @endif @endforeach</td>
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
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">100 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 4 :</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 5 :</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">60 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 6 :</td>
					<td colspan="5">80 cc/kg/hr</td>
					<td colspan="5">40 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 7 :</td>
					<td colspan="5">100 cc/kg/hr</td>
					<td colspan="5">20 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">120 cc/kg/hr</td>
				</tr>
				<tr class="text-center">
					<td colspan="3">HARI 8 :</td>
					<td colspan="5">120 cc/kg/hr</td>
					<td colspan="5">10 cc/kg/hr</td>
					<td colspan="5">d50 1/5 NS</td>
					<td colspan="5">130 cc/kg/hr</td>
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
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001413) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001414) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001415) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001416) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001417) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001418) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001420) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001421) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001422) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001423) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001424) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001425) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001428) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001433) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001434) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001436) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">2</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001437) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001438) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001439) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001440) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001441) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001442) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001443) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001444) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001445) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001446) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001447) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001448) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001449) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001450) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001451) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001452) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001457) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001458) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001459) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001460) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">3</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001461) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001462) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001463) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001464) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001465) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001466) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001467) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001468) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001469) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001470) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001471) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001472) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001473) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001474) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001475) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001476) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001481) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001482) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001483) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001484) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">4</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001485) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001486) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001487) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001488) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001489) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001490) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001491) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001492) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001493) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001494) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001495) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001496) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001497) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001498) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001499) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001500) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001505) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001506) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001507) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001508) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">5</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001509) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001510) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001511) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001512) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001513) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001514) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001515) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001516) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001517) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001518) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001521) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001522) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001523) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001524) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001529) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001530) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001531) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001532) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">6</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001533) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001534) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001535) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001536) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001537) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001538) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001541) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001542) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001543) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001554) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001555) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001556) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">7</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001557) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001558) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001559) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001560) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001561) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001562) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001563) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001564) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001565) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001566) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001567) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001568) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001569) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001570) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001571) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001572) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001577) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001578) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001579) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001580) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">8</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001581) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001582) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001583) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001584) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001585) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001586) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001587) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001588) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001589) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001590) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001591) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001592) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001593) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001594) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001595) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001596) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001601) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001602) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001603) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001604) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">9</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001605) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001606) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001607) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001608) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001609) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001610) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001611) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001612) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001613) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001614) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001615) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001616) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001617) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001618) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001619) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001628) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">10</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001629) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001630) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001631) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001632) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001633) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001634) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001637) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001638) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001641) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001642) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001643) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001651) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001652) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">11</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001653) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001654) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001655) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001656) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001657) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001658) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001667) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001668) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001676) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<td colspan="3" class="text-center">12</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001677) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001678) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001679) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001680) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm" style="text-align: right;">cc&nbsp;</td>
					<td colspan="3">&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk == 1001681) {!! $item->value !!} @endif @endforeach</td>
					<td colspan="2" class="noborder btm"></td>
					<td class="noborder br btm" style="text-align: right;">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001682) {!! $item->value !!} @endif @endforeach cc&nbsp;</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach ASI</td>
					<td colspan="2" class="noborder text-center btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach F</td>
					<td colspan="" class="text-center blf noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001685) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001686) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001691) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
					<td colspan="" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001692) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
					<td colspan="2" class="text-center noborder blf btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dis</td>
					<td colspan="3" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001698) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach M - emp su</td>
					<td colspan="2" class="text-center noborder btm">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001699) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach D</td>
					<td colspan="9" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 1001700) {!! $item->value !!} @endif @endforeach</td>
				</tr>
				<tr>
					<th colspan="49" height="20pt"><center><img src="{{ $keterangan }}" alt="" style="width:500px;"></center></th>
				</tr>
			</table>
		</div>
	</body>
@endif
</html>
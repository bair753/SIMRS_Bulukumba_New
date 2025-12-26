<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Pengkajian Harian Hemodialisis</title>
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
			/* font-family:Arial, Helvetica, sans-serif; */
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
			/* font-size: x-small; */
		}
		tr td{
			border:1px solid #000;
			border-collapse: collapse;
			font-size: 9pt;
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
		.bordered{
            border:1px solid #000;
        }
        .noborder{
            border:none;
        }
	</style>
</head>
<body ng-controller="cetakPengkajianHarianHemodialisis">
    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                <img src="{{ $image }}" alt="" style="height: 70px; width:60px; text-align: center;">
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder">No. RM </td>
            <td colspan="13" class="noborder">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
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
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">89</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PENGKAJIAN HARIAN HEMODIALISIS</th>
        </tr>
		<tr class="noborder" height="20">
			<td colspan="5" class="border-rl noborder"></td>
			<td colspan="30" class="noborder"></td>
			<td colspan="4" class="noborder"></td>
			<td colspan="10" class="noborder"></td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Tanggal / Jam</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@foreach($res['d'] as $item) @if($item->emrdfk == 428950) {!! $item->value !!} @endif @endforeach</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">No Mesin</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@foreach($res['d'] as $item)
				@if($item->emrdfk == 428959)
					{!! $item->value !!}
				@endif
				@endforeach</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Nama Pasien</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!!  $res['d'][0]->namapasien  !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Hemodialisis ke-</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@foreach($res['d'] as $item)
				@if($item->emrdfk == 428960)
					{!! $item->value !!}
				@endif
				@endforeach</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Tanggal Lahir</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Tipe Dialiser</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@foreach($res['d'] as $item)
				@if($item->emrdfk == 428961)
					{!! $item->value !!}
				@endif
				@endforeach</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Nomor RM</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!!  $res['d'][0]->nocm  !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Riwayat Alergi Obat</td>
			<td class="noborder">:</td>
			<td colspan="5" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428963) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Tidak</td>
			<td class="noborder" colspan="8">@foreach($res['d'] as $item) @if($item->emrdfk == 428964) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Ya : @foreach($res['d'] as $item) @if($item->emrdfk == 428965) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Alamat</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@foreach($res['d'] as $item) @if($item->emrdfk == 428957) {!! $item->value !!} @endif @endforeach<</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder"></td>
			<td class="noborder" colspan="17"></td>
		</tr>
		<tr class="btm">
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Diagnosa Medis</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@foreach($res['d'] as $item) @if($item->emrdfk == 428958) {!! $item->value !!} @endif @endforeach<</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder"></td>
			<td class="noborder" colspan="17"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">
				<strong><U>PENGKAJIAN KEPERAWATAN</U></strong>
			</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">1.	KELUHAN UTAMA : @foreach($res['d'] as $item) @if($item->emrdfk == 428966) {!! $item->value !!} @endif @endforeach<</td>
		</tr>
		<tr></tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">2.	PENILAIAN NYERI </td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">NYERI</td>
			<td class="noborder">:</td>
			<td colspan="4" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428969) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Ya</td>
			<td colspan="4" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428970) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Tidak</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">a.	Onset</td>
			<td class="noborder">:</td>
			<td colspan="4" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428972) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Akut</td>
			<td colspan="4" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428973) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Kronik</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">b.	Pencetus</td>
			<td class="noborder">:</td>
			<td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428974) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="7" class="noborder">Gambaran Nyeri</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7">@foreach($res['d'] as $item) @if($item->emrdfk == 428975) {!! $item->value !!} @endif @endforeach</td>
			<td class="noborder" colspan="6">Lokasi Nyeri</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="9">@foreach($res['d'] as $item) @if($item->emrdfk == 428976) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">c.	Durasi</td>
			<td class="noborder">:</td>
			<td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428977) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="7" class="noborder">Frekuensi</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7">@foreach($res['d'] as $item) @if($item->emrdfk == 428978) {!! $item->value !!} @endif @endforeach</td>
			
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">d.	Skala nyeri</td>
			<td class="noborder">:</td>
			<td colspan="30" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428979) {!! $item->value !!} @endif @endforeach (Metode VAS/ NRS/ BPS/ FLACC/ NIPS)</td>
		</tr>
		<tr class="btm"></tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="31" class="noborder btp">3.	PEMERIKSAAN FISIK</td>
			<td colspan="17">4.	PEMERIKSAAN PENUNJANG</td>
		</tr>
		<tr>
			<td class="noborder btp"></td>
			<td colspan="16" class="noborder btp" ></td>
			<td colspan="15" class="noborder blf btp"></td>
			<td colspan="17" class="noborder blf"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder" >a.	Keadaan Umum</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428977) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="15" class="noborder blf br"> Pemeriksaan fisik tambahan : @foreach($res['d'] as $item) @if($item->emrdfk == 428991) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="17" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428992) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">b.	Tekanan Darah</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428982) {!! $item->value !!} @endif @endforeach mmHg</td>
			<td colspan="15" class="noborder br"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">c.	Frekuensi Nadi</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428983) {!! $item->value !!} @endif @endforeach x/mnt</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">d.	Frekuensi Napas</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428984) {!! $item->value !!} @endif @endforeach x/mnt</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">e.	Suhu</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428985) {!! $item->value !!} @endif @endforeach &#8451;</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">f.	Berat Badan Pre HD</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428986) {!! $item->value !!} @endif @endforeach kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">g.	Berat Badan Post HD</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428987) {!! $item->value !!} @endif @endforeach kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">h.	Berat Badan Kering</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428988) {!! $item->value !!} @endif @endforeach kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">i.	Tinggi Badan</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428989) {!! $item->value !!} @endif @endforeach cm</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">i.	IMT</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@foreach($res['d'] as $item) @if($item->emrdfk == 428990) {!! $item->value !!} @endif @endforeach kg/m<sup>2</sup></td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td colspan="8" class="noborder"></td>
			<td class="noborder"></td>
			<td colspan="7" class="noborder br"></td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">5.	GIZI</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="10">a.	@foreach($res['d'] as $item) @if($item->emrdfk == 428994) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach SGA, score total</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="10">@foreach($res['d'] as $item) @if($item->emrdfk == 428995) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="10">b.	Kesimpulan</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428997) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Tanpa malnutrisi</td>
			<td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428998) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Malnutrisi Ringan</td>
			<td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 428999) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Malnutrisi Sedang</td> 
			<td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429000) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Malnutrisi Berat</td> 
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder"><strong><u>DIAGNOSA KEPERAWATAN :</u></strong></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429002) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 1. Kelebihan volume cairan</td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429005) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 4.	Penurunan curah jantung</td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429008) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 7.		Risiko infeksi</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429003) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 2.	Gangguan pemenuhan oksigen</td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429006) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 5.	Nutrisi kurang dari kebutuhan tubuh</td>
			<td class="noborder" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429009) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 8.		Gangguan rasa nyaman : nyeri</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder btm" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429004) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 3.	Gangguan keseimbangan cairan</td>
			<td class="noborder btm" colspan="16">@foreach($res['d'] as $item) @if($item->emrdfk == 429007) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach 6.	Ketidakpatuhan terhadap diet</td>
			<td class="noborder" colspan="16"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong><u>INTERVENSI KEPERAWATAN (rekapitulasi pre-intra dan post-HD):</u></strong></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429012) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Monitor berat badan, intake out put</td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429018) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Atur posisi pasien agar ventilasi adekuat</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429013) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Berikan terapi oksigen sesuai kebutuhan</td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429019) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Melakukan observasi pasien (Monitor vital sign) dan mesin</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429014) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Bila pasien mulai hipotensi (mual, muntah, keringat dingin, pusing,</td>
			<td colspan="24" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429020) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Hentikan HD sesuai indikasi</td>
		</tr>
		<tr>
			<td class="noborder" colspan="2"></td>
			<td class="noborder" colspan="23">kram, hipoglikemi berikan cairan sesuai SPO)</td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429021) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Posisikan supinasi dengan elevasi kepala 30 dan elevasi kaki</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429015) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Kaji kemampuan pasien mendapatkan nutrisi yang dibutuhkan</td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429023) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach PENKES : diet, AV-Shunt, @{{ item.obj[429024] ? item.obj[429024] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429016) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Monitor tanda dan gejala infeksi (lokal sismetik)</td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429022) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Ganti balutan luka sesuai dengan prosedur</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@foreach($res['d'] as $item) @if($item->emrdfk == 429017) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Monitor kadar gula darah</td>
			<td class="noborder" colspan="24"> Monitor tanda dan gejalah hipoglikemik</td>
		</tr>
		<tr class="btm"></tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="39"><strong><u>INSTRUKSI MEDIK</u></strong></td>
			<td class="noborder" rowspan="10" colspan="9" style="padding:.5rem">
				<table style="width:100%">
					<tr>
						<td rowspan="9" class="noborder">Catatan Lain: @foreach($res['d'] as $item) @if($item->emrdfk == 429052) {!! $item->value !!} @endif @endforeach</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="text-center" colspan="5"><strong>RESEP HD :</strong></td>
			<td class="noborder"></td>
			<td colspan="5" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429026) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Inisiasi</td>
			<td colspan="5" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429027) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Akut</td>
			<td colspan="5" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 429028) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Rutin</td>
			<td class="noborder" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429029) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach SLED</td>
			<td class="noborder" colspan="10">@foreach($res['d'] as $item) @if($item->emrdfk == 429030) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Time</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="10">@foreach($res['d'] as $item) @if($item->emrdfk == 429031) {!! $item->value !!} @endif @endforeach Jam</td>
			<td colspan="2" class="noborder"></td>
			<td class="noborder" colspan="10">Heparinisasi</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Bloode Flow</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@foreach($res['d'] as $item) @if($item->emrdfk == 429032) {!! $item->value !!} @endif @endforeach ml/mnt</td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429039) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Dosis Sirkulasi : @foreach($res['d'] as $item) @if($item->emrdfk == 429040) {!! $item->value !!} @endif @endforeach unit</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Dialysate Flow</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429033] ? item.obj[429033] : '' }} ml/mnt</td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429041) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Dosis Awal : @foreach($res['d'] as $item) @if($item->emrdfk == 429042) {!! $item->value !!} @endif @endforeach unit</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Ultra Filtration Goal</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429034] ? item.obj[429034] : '' }} ml</td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429043) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Dosis Pemeliharaan :</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Ultra Filtration Rate</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@foreach($res['d'] as $item) @if($item->emrdfk == 429035) {!! $item->value !!} @endif @endforeach ml/jam</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="4">Kontinyu</td>
			<td class="noborder" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429044) {!! $item->value !!} @endif @endforeach</td>
			<td class="noborder" colspan="3">unit/jam</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Conductivity</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@foreach($res['d'] as $item) @if($item->emrdfk == 429036) {!! $item->value !!} @endif @endforeach </td>
			<td class="noborder"></td>
			<td class="noborder" colspan="4">Intermiten</td>
			<td class="noborder" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429044) {!! $item->value !!} @endif @endforeach</td>
			<td class="noborder" colspan="3">unit/jam</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Dialysate Temperature</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@foreach($res['d'] as $item) @if($item->emrdfk == 429037) {!! $item->value !!} @endif @endforeach &#8451;</td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429046) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach LMWH : @foreach($res['d'] as $item) @if($item->emrdfk == 429047) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Akses Vaskuler</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@foreach($res['d'] as $item) @if($item->emrdfk == 429038) {!! $item->value !!} @endif @endforeach </td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429048) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Tanpa Heparin, penyebab : @foreach($res['d'] as $item) @if($item->emrdfk == 429049) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder" colspan=""></td>
			<td class="noborder" colspan="12"></td>
			<td class="noborder" colspan="20">@foreach($res['d'] as $item) @if($item->emrdfk == 429050) {!! $item->value == true ? '[✓]' : '[&nbsp;&nbsp;&nbsp;]' !!} @endif @endforeach Program bilas NaCl 0,9% : @foreach($res['d'] as $item) @if($item->emrdfk == 429051) {!! $item->value !!} @endif @endforeach ml/jam</td>
		</tr>
		<tr style="height:5pt" class="btm"></tr>
		<tr class="text-center">
			<td rowspan="2" colspan="4" id="rotate" class="bordered">Observasi</td>
			<td rowspan="2" colspan="3" class="bordered">Jam</td>
			<td rowspan="2" colspan="4" class="bordered">Blood Flow (ml/mnt)</td>
			<td rowspan="2" colspan="4" class="bordered">Ultra Filtration Rate (ml)</td>
			<td rowspan="2" class="bordered" colspan="4">Tekanan Darah (mmHg)</td>
			<td rowspan="2" colspan="3" class="bordered">Nadi (x/mnt)</td>
			<td rowspan="2" colspan="3" class="bordered">Suhu (&#8451;)</td>
			<td rowspan="2" colspan="4" class="bordered">Respirasi (x/mnt)</td>
			<td rowspan="" colspan="6" class="bordered">Intake</td>
			<td rowspan="" colspan="3" class="bordered">Output</td>
			<td rowspan="2" colspan="6">Keterangan Lain</td>
			<td rowspan="2" colspan="5">Paraf & Nama Jelas</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">NaCi 0,9%</td>
			<td colspan="3">Lain-lain</td>
			<td colspan="3">Ultra Filtration Goal</td>
		</tr>
		<tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">PRE-HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429053) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429054) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429055) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429056) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429057) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429058) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429059) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429060) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429061) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429062) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429063) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429064) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429065) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429066) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429067) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429068) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429069) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429070) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429071) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429072) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429073) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429074) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429075) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429076) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429077) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429078) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429079) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429080) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429081) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429082) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429083) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429084) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429085) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429086) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429087) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429088) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429089) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429090) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429091) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429092) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429093) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429094) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429095) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429096) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429097) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429098) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429099) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429100) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429101) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429102) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429102) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429104) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429105) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429106) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429107) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429108) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429109) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429110) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429111) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429112) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429113) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429114) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429115) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429116) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429117) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429118) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429119) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429120) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429121) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429122) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429123) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429124) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429125) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429126) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429127) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429128) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429129) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429130) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429131) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429132) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429133) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429134) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429135) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429136) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429137) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429138) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429139) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429140) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429141) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429142) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429143) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429144) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429145) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429146) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429147) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429148) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429149) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429150) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429151) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429152) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429153) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429154) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429155) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429156) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429157) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429158) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429159) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429160) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429161) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429162) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429163) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429164) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429165) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429166) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429167) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429168) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429169) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429170) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429171) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429172) {!! $item->value !!} @endif @endforeach</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429173) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429174) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429175) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429176) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429177) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429178) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429179) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429180) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429181) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429182) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429183) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429184) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr class="text-center">
			<td rowspan="3" colspan="4" id="" class="bordered">POST-HD</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429185) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" class="bordered" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 429186) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429187) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429188) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429189) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429190) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429191) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429192) {!! $item->value !!} @endif @endforeach</td>
            <td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429193) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 429194) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 429195) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="" colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 429196) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr>
			<td colspan="25" class="text-right">Jumlah</td>
			<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 429198) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 429198) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 429200) {!! $item->value !!} @endif @endforeach</td>
			<td rowspan="2" colspan="6"></td>
			<td rowspan="2" colspan="5"></td>
		</tr>
		<tr>
			<td colspan="25" class="text-right">Total Ultra Filtration</td>
			<td colspan="9">@foreach($res['d'] as $item) @if($item->emrdfk == 429201) {!! $item->value !!} @endif @endforeach ml</td>
		</tr>
		<tr valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">EVALUASI KEPERAWATAN : @foreach($res['d'] as $item) @if($item->emrdfk == 429202) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr style="height: 30pt;" valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Discharge Planning : @foreach($res['d'] as $item) @if($item->emrdfk == 429203) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr style="height: 30pt;" valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Catatan HD yang akan datang : @foreach($res['d'] as $item) @if($item->emrdfk == 429204) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Bulukumba, @foreach($res['d'] as $item) @if($item->emrdfk == 429205) {!! $item->value !!} @endif @endforeach</td>
		</tr>
		<tr valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="24">Perawat yang Bertugas :	1.  @foreach($res['d'] as $item) @if($item->emrdfk == 429206) {!! $item->value !!} @endif @endforeach (Akses),</td>
			<td colspan="24" class="noborder">2.  @foreach($res['d'] as $item) @if($item->emrdfk == 429207) {!! $item->value !!} @endif @endforeach (Observasi)</td>
		</tr>
		<tr style="height: 20pt; text-align: center;">
			<td colspan="4" rowspan="2" id="rotate">Evaluasi <br> Medik</td>
			<td colspan="15">Obat ysng Dikonsumsi</td>
			<td colspan="15">Obat Tambahan</td>
			<td colspan="15">Nama dan Tanda Tangan Dokter</td>
		</tr>
		<tr style="text-align: center;">
			<td colspan="15">@foreach($res['d'] as $item) @if($item->emrdfk == 429208) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="15">@foreach($res['d'] as $item) @if($item->emrdfk == 429209) {!! $item->value !!} @endif @endforeach</td>
			<td colspan="15"><div id="qrcoded1"></div> <br> @foreach($res['d'] as $item) @if($item->emrdfk == 429210) {!! $item->value !!} @endif @endforeach</td>
		</tr>
    </table>
</body>
</html>
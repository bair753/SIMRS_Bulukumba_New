<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Perkembangan Pasien Terintegrasi</title>
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
			page-break-after:always;
		}
		header{
			border:1px solid #000; 
		}
		section{
			width:210mm;
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
@if (!empty($res['d1']))
    @foreach($res['d1'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
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
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d1'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d1'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d1'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d1'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d2']))
    @foreach($res['d2'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d2'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d2'][0]->namapasien  !!} {!!  $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d2'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d2'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d2'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d2'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d2'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d3']))
    @foreach($res['d3'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d3'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d3'][0]->namapasien  !!} {!!  $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d3'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d3'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d3'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d3'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d3'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d4']))
    @foreach($res['d4'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d4'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d4'][0]->namapasien  !!} {!!  $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d4'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d4'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d4'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d4'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d4'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d5']))
    @foreach($res['d5'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d5'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d5'][0]->namapasien  !!} {!!  $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d5'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d5'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d5'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d5'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d5'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d6']))
    @foreach($res['d6'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d6'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d6'][0]->namapasien  !!} {!!  $res['d6'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d6'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d6'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d6'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d6'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d6'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d6'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d6'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d7']))
    @foreach($res['d7'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d7'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d7'][0]->namapasien  !!} {!!  $res['d7'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d7'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d7'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d7'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d7'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d7'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d7'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d7'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d8']))
    @foreach($res['d8'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d8'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d8'][0]->namapasien  !!} {!!  $res['d8'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d8'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d8'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d8'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d8'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d8'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d8'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d8'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d9']))
    @foreach($res['d9'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d9'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d9'][0]->namapasien  !!} {!!  $res['d9'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d9'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d9'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d9'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d9'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d9'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d9'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d9'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d10']))
    @foreach($res['d10'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d10'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d10'][0]->namapasien  !!} {!!  $res['d10'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d10'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d10'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d10'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d10'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d10'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d10'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d10'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d11']))
    @foreach($res['d11'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d11'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d11'][0]->namapasien  !!} {!!  $res['d11'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d11'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d11'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d11'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d11'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d11'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d11'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d11'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d12']))
    @foreach($res['d12'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d12'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d12'][0]->namapasien  !!} {!!  $res['d12'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d12'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d12'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d12'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d12'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d12'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d12'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d12'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d13']))
    @foreach($res['d13'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d13'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d13'][0]->namapasien  !!} {!!  $res['d13'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d13'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d13'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d13'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d13'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d13'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d13'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d13'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d14']))
    @foreach($res['d14'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d14'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d14'][0]->namapasien  !!} {!!  $res['d14'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d14'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d14'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d14'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d14'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d14'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d14'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d14'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d15']))
    @foreach($res['d15'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d15'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d15'][0]->namapasien  !!} {!!  $res['d15'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d15'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d15'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d15'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d15'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d15'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d15'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d15'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d16']))
    @foreach($res['d16'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d16'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d16'][0]->namapasien  !!} {!!  $res['d16'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d16'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d16'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d16'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d16'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d16'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d16'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d16'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d16'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d16'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d17']))
    @foreach($res['d17'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d17'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d17'][0]->namapasien  !!} {!!  $res['d17'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d17'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d17'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d17'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d17'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d17'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d17'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d17'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d17'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d17'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d18']))
    @foreach($res['d18'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d18'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d18'][0]->namapasien  !!} {!!  $res['d18'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d18'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d18'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d18'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d18'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d18'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d18'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d18'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d18'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d18'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d19']))
    @foreach($res['d19'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d19'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d19'][0]->namapasien  !!} {!!  $res['d19'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d19'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d19'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d19'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d19'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d19'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d19'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d19'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d19'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d19'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d20']))
    @foreach($res['d20'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d20'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d20'][0]->namapasien  !!} {!!  $res['d20'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d20'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d20'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d20'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d20'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d20'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d20'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d20'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d20'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d20'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif

@if (!empty($res['d21']))
    @foreach($res['d21'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
    <body>
        <section>
            <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 50px; width:60px;"></center>
                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d21'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!!  $res['d21'][0]->namapasien  !!} {!!  $res['d21'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d21'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d21'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        CATATAN PERKEMBANGAN PASIEN TERINTEGRASI
                    </td>
                </tr>
                <tr style="text-align:center">
                    <td >TGL/JAM</td>
                    <td>PROFESI</td>
                    <td colspan="3" valign="top">
                        <strong>HASIL ASESMEN PASIEN DAN PEMBERIAN PELAYANAN</strong> <br>(Tulis dengan format SOAP/ ADIME, disertai Sasaran. Tulis Nama, beri Paraf pada akhir catatan)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>Instruksi PPA</strong> <br>Termasuk Pasca Bedah 
                        (Instruksi ditulis dgn rinci dan jelas)
                    </td>
                    <td colspan="2" style="border:none;border-right:1px solid #000">
                        <strong>REVIEW & VERIFIKASI DPJP</strong> <br>Termasuk Pasca Bedah 
                        (Tulis Nama, beri Paraf, Tgl, Jam) <br> (DPJP harus membaca/ mereview seluruh Rencana Asuhan)

                    </td>
                </tr>
                {{-- 1 --}}
                <tr style="height:150px" @if (!strpos($emrdfk, '423050')) hidden @endif>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423050) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423051) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423052) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk ==423053) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk ==423053) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk ==423054) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk ==423055) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk ==423056) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk ==423057) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk ==423057) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>

                {{-- 2 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk ==423058) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk ==423058) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk ==423059) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423060) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423061) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423061) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423062) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423063) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423064) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423065) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423065) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 3 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423066) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423066) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423067) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423068) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423069) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423069) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423070) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423071) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423072) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423073) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423073) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 4 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423074) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423074) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423075) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423076) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423077) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423077) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423078) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423079) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423080) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423081) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423081) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 5 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423082) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423082) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423083) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423084) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423085) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423085) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423086) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423087) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423088) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423089) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423089) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 6 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423090) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423090) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423091) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423092) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423093) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423093) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423094) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423095) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423096) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423097) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423097) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 7 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423098) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423098) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423099) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423100) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423101) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423101) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423103) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423104) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423105) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423105) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 8 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423106) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423106) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423107) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423108) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423109) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423109) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423110) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423111) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423112) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423113) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423113) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 9 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423114) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423114) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423115) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423116) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423117) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423117) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423118) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423119) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423120) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423121) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423121) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 10 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423122) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423122) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423123) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423124) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423125) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423125) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423126) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423127) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423128) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423129) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423129) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 11 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423130) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423130) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423131) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423132) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423133) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423133) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423134) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423135) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423136) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423137) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423137) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 12 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423138) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423138) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423139) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423140) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423141) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423141) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423142) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423143) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423144) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423145) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423145) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 13 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423146) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423146) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423147) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423148) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423149) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423149) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423151) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423152) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423153) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423153) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 14 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423154) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423154) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423156) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423157) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423157) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423158) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423159) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423160) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423161) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423161) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 15 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423162) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423162) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423163) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423164) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423165) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423165) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423166) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423167) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423168) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423169) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423169) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 16 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423170) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423170) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423172) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423173) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423173) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423174) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423175) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423176) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423177) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423177) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 17 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423178) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423178) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423179) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423180) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423181) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423181) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423182) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423183) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423184) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423185) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423185) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
            

                {{-- 18 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423186) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423186) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423187) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423188) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423189) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423189) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423191) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423192) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423193) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423193) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 19 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423194) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423194) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423195) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423196) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423197) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423197) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423198) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423199) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423200) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423201) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423201) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 20 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423202) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423202) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423204) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423205) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423205) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423206) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423207) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423208) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423209) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423209) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                

                {{-- 21 --}}
                @foreach($res['d21'] as $item) @if($item->emrdfk == 423210) 
                <tr style="height:150px">
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423210) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d21'] as $item) @if($item->emrdfk == 423211) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d21'] as $item) @if($item->emrdfk == 423212) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423213) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423213) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423214) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d21'] as $item) @if($item->emrdfk == 423215) {!! $item->value !!} @endif @endforeach <br><br> 
                        Tanggal : @foreach($res['d21'] as $item) @if($item->emrdfk == 423216) {!! $item->value !!} @endif @endforeach <br><br> 
                        Paraf : @foreach($res['d21'] as $item) @if($item->emrdfk == 423217) {!! $item->value !!} @endif @endforeach
                        <br>
                        @foreach($res['d21'] as $item) @if($item->emrdfk == 423217) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
                    </td>
                </tr>
                @endif @endforeach
                
            </table>
        </section>		
    </body>
@endif
</html>
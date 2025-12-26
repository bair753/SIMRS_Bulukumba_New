<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Perkembangan Pasien Terintegrasi Rawat Jalan</title>
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
<body ng-controller="cetakCPPTRajal">
    @foreach($res['d'] as $item=> $design) 
        @php
            $emrdfk = $design->emrdfk
        @endphp
    @endforeach
      <section>
        <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: left;">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="3" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">25</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
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
            <tr style="height:150px" @if (!strpos($emrdfk, '421650')) hidden @endif>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421650) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421651) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421652) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421653) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421653) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421654) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421655) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421656) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421657) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421657) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>

            {{-- 2 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421658) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421658) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421659) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421660) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421661) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421661) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421662) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421663) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421664) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421665) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421665) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 3 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421666) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421666) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421667) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421668) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421669) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421670) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421671) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421672) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421673) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421673) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 4 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421674) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421674) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421675) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421676) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421677) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421677) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421678) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421679) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421680) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421681) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421681) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 5 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421682) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421682) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421683) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421684) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421685) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421685) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421686) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421687) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421688) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421689) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421689) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 6 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421690) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421690) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421691) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421692) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421693) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421693) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421694) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421695) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421696) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421697) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421697) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 7 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421698) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421698) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421699) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421700) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421701) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421701) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421702) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421703) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421704) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421705) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421705) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 8 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421706) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421706) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421707) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421708) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421709) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421709) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421710) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421711) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421712) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421713) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421713) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 9 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421714) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421714) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421715) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421716) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421717) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421717) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421718) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421719) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421720) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421721) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421721) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 10 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421722) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421722) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421723) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421724) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421725) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421725) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421726) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421727) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421728) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421729) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421729) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 11 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421730) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421730) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421731) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421732) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421733) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421733) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421734) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421735) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421736) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421737) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421737) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 12 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421738) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421738) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421739) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421740) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421741) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421741) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421742) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421743) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421744) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421745) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421745) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 13 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421746) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421746) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421747) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421748) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421749) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421749) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421750) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421751) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421752) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421753) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421753) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 14 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421754) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421754) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421755) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421756) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421757) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421757) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421758) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421759) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421760) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421761) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421761) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 15 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421762) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421762) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421763) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421764) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421765) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421765) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421766) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421767) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421768) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421769) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421769) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 16 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421770) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421770) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421771) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421772) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421773) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421773) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421774) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421775) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421776) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421777) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421777) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 17 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421778) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421778) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421779) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421780) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421781) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421781) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421782) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421783) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421784) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421785) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421785) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
           

            {{-- 18 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421786) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421786) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421787) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421788) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421789) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421789) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421790) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421791) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421792) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421793) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421793) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 19 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421794) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421794) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421795) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421796) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421797) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421797) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421798) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421799) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421800) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421801) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421801) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 20 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421802) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421802) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421803) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421804) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421805) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421805) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421806) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421807) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421808) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421809) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421809) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            

            {{-- 21 --}}
            @foreach($res['d'] as $item) @if($item->emrdfk == 421810) 
            <tr style="height:150px">
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421810) {!! $item->value !!} @endif @endforeach</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 421811) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 421812) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421813) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421813) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421814) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 421815) {!! $item->value !!} @endif @endforeach <br><br> 
                    Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 421816) {!! $item->value !!} @endif @endforeach <br><br> 
                    Paraf : @foreach($res['d'] as $item) @if($item->emrdfk == 421817) {!! $item->value !!} @endif @endforeach
                    <br>
                    @foreach($res['d'] as $item) @if($item->emrdfk == 421817) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            @endif @endforeach
            
        </table>
    </section>
			
</body>
</html>
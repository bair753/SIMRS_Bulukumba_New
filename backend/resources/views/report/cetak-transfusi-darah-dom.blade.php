<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check List Dan Observasi Transfusi Darah</title>
    <style>
       html,
        body {
            margin-top: 10px;
            margin-left: 20px;
            /* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
            font-family:Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            font-size: 7pt;
        }
        @page{

            size:A4;
          
        }
       
        header{
            border:1px solid #000; 
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
            font-size: 7pt;
            page-break-inside:auto;
            width: 100%;
        }
        tr td{
            border:1px solid #000;
            border-collapse: collapse;
        }
        #content > tr td{
            width:20px;
            font-size: 6pt;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem
        }
        /* section{
            page-break-after: always
        } */
    </style>
</head>

@if (!empty($res['d1']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->namapasien !!} ({{ $res['d1'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d1'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d1'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d1'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d1'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d1'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d1'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d1'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d1'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d2']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d2'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d2'][0]->namapasien !!} ({{ $res['d2'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d2'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d2'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d2'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d2'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d2'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d2'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d2'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d2'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d2'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d3']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d3'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d3'][0]->namapasien !!} ({{ $res['d3'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d3'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d3'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d3'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d3'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d3'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d3'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d3'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d3'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d3'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d4']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d4'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d4'][0]->namapasien !!} ({{ $res['d4'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d4'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d4'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d4'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d4'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d4'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d4'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d4'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d4'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d4'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d4'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d5']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d5'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d5'][0]->namapasien !!} ({{ $res['d5'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d5'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d5'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d5'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d5'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d5'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d5'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d5'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d5'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d5'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d5'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d6']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d6'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d6'][0]->namapasien !!} ({{ $res['d6'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d6'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d6'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d6'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d6'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d6'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d6'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d6'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d6'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d6'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d6'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d6'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d6'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d6'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d7']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d7'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d7'][0]->namapasien !!} ({{ $res['d7'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d7'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d7'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d7'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d7'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d7'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d7'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d7'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d7'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d7'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d7'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d7'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d7'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d7'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d8']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d8'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d8'][0]->namapasien !!} ({{ $res['d8'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d8'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d8'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d8'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d8'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d8'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d8'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d8'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d8'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d8'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d8'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d8'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d8'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d8'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d9']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d9'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d9'][0]->namapasien !!} ({{ $res['d9'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d9'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d9'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d9'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d9'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d9'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d9'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d9'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d9'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d9'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d9'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d9'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d9'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d9'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d10']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d10'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d10'][0]->namapasien !!} ({{ $res['d10'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d10'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d10'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d10'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d10'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d10'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d10'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d10'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d10'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d10'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d10'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d10'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d10'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d10'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d11']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d11'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d11'][0]->namapasien !!} ({{ $res['d11'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d11'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d11'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d11'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d11'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d11'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d11'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d11'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d11'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d11'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d11'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d11'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d11'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d11'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d12']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d12'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d12'][0]->namapasien !!} ({{ $res['d12'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d12'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d12'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d12'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d12'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d12'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d12'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d12'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d12'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d12'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d12'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d12'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d12'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d12'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d13']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d13'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d13'][0]->namapasien !!} ({{ $res['d13'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d13'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d13'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d13'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d13'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d13'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d13'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d13'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d13'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d13'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d13'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d13'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d13'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d13'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d14']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d14'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d14'][0]->namapasien !!} ({{ $res['d14'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d14'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d14'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d14'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d14'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d14'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d14'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d14'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d14'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d14'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d14'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d14'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d14'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d14'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif

@if (!empty($res['d15']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">
                        <center><img src="{{ $image }}" alt="" style="height: 60px; width:50px;"></center>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="4" style="border:none">: {!! $res['d15'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">: {!! $res['d15'][0]->namapasien !!} ({{ $res['d15'][0]->jeniskelamin
                        == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d15'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d15'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="7" style="border:none;border-bottom:1px solid #000">Tanggal/Pukul: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td>
                    {{-- <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @foreach($res['d15'] as $item) @if($item->emrdfk ==31101376) {!! $item->value !!} @endif @endforeach</td> --}}
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @foreach($res['d15'] as $item) @if($item->emrdfk ==31101377) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==32104089) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Sesuai</td>
                    <td colspan="3" style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==32104090) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut
                            :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD
                            H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Whole Blood
                    </td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PRC</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Trombosit</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach FFP</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah :</td>
                    <td style="border:none" colspan="9">@foreach($res['d15'] as $item) @if($item->emrdfk ==32116519) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                        BAG / @foreach($res['d15'] as $item) @if($item->emrdfk ==32116520) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CC : @foreach($res['d15'] as $item) @if($item->emrdfk ==31101382) {!! $item->value !!} @endif @endforeach</td>
                    
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach A</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach B</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach C</td>
                    <td style="border:none">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach AB</td>
                    <td colspan="6" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101387) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101388) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101389) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101390) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101391) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101392) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101393) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101394) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101395) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @foreach($res['d15'] as $item) @if($item->emrdfk ==31101396) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="11" style="border:none"></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:center;border:none">
                        <div style="text-align: center">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101397) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                    <td style="border:none"></td>
                    <td colspan="5" style="text-align:center;border:none;">
                        <div style="text-align: center">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101398) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@foreach($res['d15'] as $item) @if($item->emrdfk ==31101397) {!! $item->value !!} @endif @endforeach)</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@foreach($res['d15'] as $item) @if($item->emrdfk ==31101398) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="3">Tgl/Jam</td>
                    <td colspan="8">CATATAN PERKEMBANGAN</td>
                    <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td rowspan="2">TD</td>
                    <td rowspan="2">nadi</td>
                    <td rowspan="2">suhu</td>
                    <td rowspan="2">pernapasan</td>
                    <td colspan="2">HB</td>
                    <td rowspan="2">Reaksi Transfusi</td>
                    <td rowspan="2">Perbedaan Kondisi Pasien</td>
                </tr>
                <tr style="text-align:center;font-weight: bolder;">
                    <td>Pre Transfusi</td>
                    <td>Post Transfusi</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101399) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101400) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101401) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101402) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101403) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101404) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101405) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101406) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101407) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101903) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101904) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101905) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101906) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101907) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101908) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101909) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101910) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101911) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101912) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101913) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101914) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101915) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101916) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101917) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101918) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101919) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101920) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101921) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101922) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101923) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101924) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101925) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101926) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101927) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101928) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101929) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101930) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101931) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101932) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101933) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101934) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101935) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101936) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101937) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101938) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101939) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101940) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101941) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101942) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101943) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101944) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101945) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101946) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101947) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101948) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101949) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101950) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101951) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101952) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101953) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101954) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101955) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101956) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101957) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101958) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101959) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101960) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101961) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101962) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101963) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101964) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101965) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101966) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101967) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101968) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101969) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101970) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101971) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101972) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101973) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101974) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101975) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101976) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101977) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101978) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101979) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101980) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101981) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101982) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101983) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101984) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101985) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101986) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101987) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101988) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101989) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101990) {!! $item->value !!} @endif @endforeach</td>
                    <td>@foreach($res['d15'] as $item) @if($item->emrdfk ==31101991) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2">@foreach($res['d15'] as $item) @if($item->emrdfk ==31101992) {!! $item->value !!} @endif @endforeach</td>
                </tr>

                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">1. Observasi Reaksi Cepat </td>
                    <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">2. Observasi Reaksi Lambat </td>
                    <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24
                        jam pasca transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam
                            setelah transfuse)</em></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gejala gelisah, lemah pruritis,
                        palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urtikaria, demam, takikardia, kaku
                        otot</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam, lemah, hipotensi (turun ≥ 20%
                        tekanan darah sistolik), takikardia (naik ≥ 20%),
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2. Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101413) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia
                        berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat
                            dengan hitung trombosit 20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101414) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi,
                        diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi
                        spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101415) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan
                        femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@foreach($res['d15'] as $item) @if($item->emrdfk ==31101416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C,
                        HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">3. Penanganan Reaksi Transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Pertahankan infus dengan pemberian NaCl
                        0.9%</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c. Periksa ulang : Label darah donor, surat
                        permintaan transfusi, identifikasi penderita</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d. Segera lapor terjadinya reaksi transfusi
                        pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e. Kirim minimal 10 cc darah penderita
                        tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f. Tamping urin penderita 24 jam</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g. Kirim urin penderita untuk evaluasi
                        sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
                </tr>
            </table>
        </section>
    </body>
@endif
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Pemberian dan Pemantauan Obat Pasien</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body,
        html {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6pt;
            margin: 10px 10px;
        }

        @page {
            size: A4;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 3rem;
            margin-right: 1rem;
            transform: scale(72%);
        }

        table {
            border: 1px solid #000;
            border-collapse: collapse;
            table-layout: auto;
            width: 100%; 
        }

        table tr td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: .3rem;
            table-layout: auto;
            width: 100%;
        }

        td input {
            vertical-align: middle;
        }

        .format {
            padding: 1rem;
        }

        @media only screen and (max-width:220mm) and (max-height:270mm) {
            @page {
                size: A4;
                margin: 0;
                transform: scale(71%);
            }

            .format {
                width: 210mm;
                height: 297mm;
            }

            table {
                transform: scale(50%);
            }

            .divider {
                clear: both;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    
    @if (!empty($res['d1']))
        <div class="format">
            <table>
                <tr>
                    <td rowspan="4" colspan="2">
                        <figure style="width:80px;margin:0 auto;">
                            <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                        </figure>
                    </td>
                    <td rowspan="4" colspan="4" style="text-align:center;width:38%">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="9" style="border:none;">No RM</td>
                    <td style="border:none;" colspan="4">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="3" style="background:#000;color:#fff;width:100px;text-align:center;font-size:36px">RM</td>
                </tr>
                <tr>
                    <td width="30" colspan="9" style="border:none;">Nama Lengkap</td>
                    <td style="border:none;" colspan="3">: {!!  $res['d1'][0]->namapasien  !!}</td>
                    <td style="border:none;text-align: right;">{{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }}</td>
                </tr>
                <tr>
                    <td width="30" colspan="9" style="border:none;">Tanggal Lahir</td>
                    <td style="border:none;" colspan="4">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                </tr>
                <tr>
                    <td width="30" colspan="9" style="border:none;">NIK</td>
                    <td style="border:none;" colspan="4">: {!! $res['d1'][0]->noidentitas  !!}</td>
                    <td style="text-align:center;font-size:36px">27</td>
                </tr>
                <tr>
                    <td colspan="20" style="text-align:center;background: #000;color: #fff;"><h1>CATATAN PEMBERIAN DAN PEMANTAUAN OBAT PASIEN</h1></td>
                </tr>
                <tr>
                    <td colspan="20" style="text-align:left"><h2>RUANG RAWAT AWAL : @foreach($res['d1'] as $item) @if($item->emrdfk == 424100) {!! $item->value !!} @endif @endforeach</h2></td>
                </tr>
                <tr style="text-align:center;">
                    <td rowspan="3">No</td>
                    <td rowspan="3" style="min-width: 100%">Nama Obat</td>
                    <td rowspan="3">Dosis</td>
                    <td rowspan="3">Rute</td>
                    <td rowspan="3">Tgl Mulai</td>
                    <td rowspan="3">Nama / TTD Dokter</td>
                    <td colspan="12">Waktu dan Frekuensi</td>
                    <td rowspan="3">Informasi Benar</td>
                    <td rowspan="3">Review Farmasi</td>
                </tr>
                <tr style="text-align:center;">
                    <td colspan="4">Hari ke</td>
                    <td colspan="4">Hari ke</td>
                    <td colspan="4">Hari ke</td>
                </tr>
                <tr style="text-align:center;">
                    <td>p</td>
                    <td>s</td>
                    <td>s</td>
                    <td>m</td>
                    <td>p</td>
                    <td>s</td>
                    <td>s</td>
                    <td>m</td>
                    <td>p</td>
                    <td>s</td>
                    <td>s</td>
                    <td>m</td>
                </tr>
                <!-- bagian a -->
                <tr style="background:#000;color:#fff">
                    <td colspan="20"><h3>A. RESEP NON PARENTERAL</h3></td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">1</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424101) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424102) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424103) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424104) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424106) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424111) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424116) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424121) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424122) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424107) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424108) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424109) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424110) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424112) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424113) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424114) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424115) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424117) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424118) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424119) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424120) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">2</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424123) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424124) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424125) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424126) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424127) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424128) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424133) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424138) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424143) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424144) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424129) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424130) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424131) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424132) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424134) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424135) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424136) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424137) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424139) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424140) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424141) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424142) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">3</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424145) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424146) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424147) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424148) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424149) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424150) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424155) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424160) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424165) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424166) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424151) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424152) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424153) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424154) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424156) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424157) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424158) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424159) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424161) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424162) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424163) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424164) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">4</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424167) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424168) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424169) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424170) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424171) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424172) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424177) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424182) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424187) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424188) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424173) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424174) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424175) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424176) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424178) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424179) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424180) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424181) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424183) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424184) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424185) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424186) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">5</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424189) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424190) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424191) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424192) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424199) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424204) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424209) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424210) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424195) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424196) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424197) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424198) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424200) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424201) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424202) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424203) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424205) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424206) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424207) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424208) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">6</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424211) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424212) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424213) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424214) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424215) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424216) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424221) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424226) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424231) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424232) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424217) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424218) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424219) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424220) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424222) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424223) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424224) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424225) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424227) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424228) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424229) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424230) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">7</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424233) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424234) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424235) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424236) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424237) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424238) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424244) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424248) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424253) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424254) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424239) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424240) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424241) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424242) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424244) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424245) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424246) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424247) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424249) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424250) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424251) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424252) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">8</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424255) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424256) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424257) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424258) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424259) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424260) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424265) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424270) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424254) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424254) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424261) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424262) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424263) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424264) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424266) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424267) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424268) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424269) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424271) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424272) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424273) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424274) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">9</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424277) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424278) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424279) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424280) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424281) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424287) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424292) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424297) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424298) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424283) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424284) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424285) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424286) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424288) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424289) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424290) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424291) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424293) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424294) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424295) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424296) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">10</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424299) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424300) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424301) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424302) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424303) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424304) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424309) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424314) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424319) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424320) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424305) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424306) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424307) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424308) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424310) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424311) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424312) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424313) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424315) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424316) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424217) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424218) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">11</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424321) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424322) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424323) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424324) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424325) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424326) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424331) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424336) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424341) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424342) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424327) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424328) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424329) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424330) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424332) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424333) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424334) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424335) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424337) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424338) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424339) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424340) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">12</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424343) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424344) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424345) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424346) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424353) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424358) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424363) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424364) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424349) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424350) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424351) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424352) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424354) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424355) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424356) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424357) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424359) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424360) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424361) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424362) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">13</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424365) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424366) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424367) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424368) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424369) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424370) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424375) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424380) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424385) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424386) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424371) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424372) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424373) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424374) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424376) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424377) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424378) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424379) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424381) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424382) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424383) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424384) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">14</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424387) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424388) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424389) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424390) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424391) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424392) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424397) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424402) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424407) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424408) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424393) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424394) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424395) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424396) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424398) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424399) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424400) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424401) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424403) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424404) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424405) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424406) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">15</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424409) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424410) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424411) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424412) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424413) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424414) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424419) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424424) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424429) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424430) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424415) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424416) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424417) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424418) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424420) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424421) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424422) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424423) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424425) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424426) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424427) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424428) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">16</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424431) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424432) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424433) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424434) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424435) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424436) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424441) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424446) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424451) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424452) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424437) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424438) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424439) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424440) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424442) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424443) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424444) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424445) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424447) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424448) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424449) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424450) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>

                <!-- bagian b -->
                <tr style="background:#000;color:#fff">
                    <td colspan="20"><h3>B. RESEP PARENTERAL</h3></td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">1</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424453) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424454) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424455) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424456) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424457) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424458) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424463) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424468) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424473) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424474) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424459) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424460) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424461) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424462) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424464) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424465) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424466) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424467) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424469) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424470) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424471) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424472) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">2</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424475) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424476) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424477) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424478) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424479) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424480) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424485) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424490) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424495) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424496) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr><td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424481) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424482) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424483) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424484) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424486) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424487) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424488) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424489) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424491) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424492) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424493) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424494) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">3</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424497) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424498) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424499) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424500) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424501) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424502) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424507) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424512) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424517) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424518) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424503) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424504) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424505) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424506) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424508) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424509) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424510) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424511) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424513) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424514) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424515) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424516) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">4</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424519) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424520) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424521) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424522) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424523) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424524) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424529) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424534) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424539) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424540) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424525) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424526) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424527) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424528) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424530) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424531) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424532) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424533) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424535) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424536) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424537) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424538) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">5</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424541) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424542) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424543) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424544) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424545) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424546) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424551) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424556) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424561) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424562) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424547) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424548) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424549) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424550) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424552) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424553) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424554) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424555) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424557) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424558) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424559) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424560) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">6</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424563) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424564) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424565) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424566) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424567) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424568) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424573) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424578) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424583) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424584) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424569) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424570) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424571) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424572) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424574) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424575) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424576) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424577) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424579) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424580) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424581) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                     <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424582) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">7</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424585) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424586) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424587) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424588) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424589) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424590) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424595) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424600) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424605) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424606) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424591) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424592) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424593) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424594) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424596) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424597) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424598) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424599) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424601) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424602) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424603) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424604) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">8</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424607) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424608) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424609) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424610) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424611) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424612) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424617) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424622) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424627) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424628) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424613) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424614) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424615) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424616) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424618) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424619) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424620) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424621) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424623) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424624) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424625) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424626) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">9</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424629) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424630) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424631) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424632) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424633) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424634) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424639) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424644) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424649) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424635) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424636) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424637) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424638) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424640) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424641) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424642) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424643) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424645) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424646) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424647) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424648) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">10</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424651) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424652) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424653) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424654) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424655) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424656) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424661) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424666) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424671) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424672) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424657) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424658) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424659) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424660) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424662) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424663) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424664) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424665) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424667) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424668) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424669) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424670) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">11</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424673) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424674) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424675) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424676) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424677) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424678) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424683) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424688) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424693) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424694) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424679) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424680) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424681) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424682) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424684) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424685) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424686) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424688) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424689) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424690) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424691) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424692) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>

                <!-- bagian c -->
                <tr style="background:#000;color:#fff">
                    <td colspan="20"><h3>C. CAIRAN INTRAVENA</h3></td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">1</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424695) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424696) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424697) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424698) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424699) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424700) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424705) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424710) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424715) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424716) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424701) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424702) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424703) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424704) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424706) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424707) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424708) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424709) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424711) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424712) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424713) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424714) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">2</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424717) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424718) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424719) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424720) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424721) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424722) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424727) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424732) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424737) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424738) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424723) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424724) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424725) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424726) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424728) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424729) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424730) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424731) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424733) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424734) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424735) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424736) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">3</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424739) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424740) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424741) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424742) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424743) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424744) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424749) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424754) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424759) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424760) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424745) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424746) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424747) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424748) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424750) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424751) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424752) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424753) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424755) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424756) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424757) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424758) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">4</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424761) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424762) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424763) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424764) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424765) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424766) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424771) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424776) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424781) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424782) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424767) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424768) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424769) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424770) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424772) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424773) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424774) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424775) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424777) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424778) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424779) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424780) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">5</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424783) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424784) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424785) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424786) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424787) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424788) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424793) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424798) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424803) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424804) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424789) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424790) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424791) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424792) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424794) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424795) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424796) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424797) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424799) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424800) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424801) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424802) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">6</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424805) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424806) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424807) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424808) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424809) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424810) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424815) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424820) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424825) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424826) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424811) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424812) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424813) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424814) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424816) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424817) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424818) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424819) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424821) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424822) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424823) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424824) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">7</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424827) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424828) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424829) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424830) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424831) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424832) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424837) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424842) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424847) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424848) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424833) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424834) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424835) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424836) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424838) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424839) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424840) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424841) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424843) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424844) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424845) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424846) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">8</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424849) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424850) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424851) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424852) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424853) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424854) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424859) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424864) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424869) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424870) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424855) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424856) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424857) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424858) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424860) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424861) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424862) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424863) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424865) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424866) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424867) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424868) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">9</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424871) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424872) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424873) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424874) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424875) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424876) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424881) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424886) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424891) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424892) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424877) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424878) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424879) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424880) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424882) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424883) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424884) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424885) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424887) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424888) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424889) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424890) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">10</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424893) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424894) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424895) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424896) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424897) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424898) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424903) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424908) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424913) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424914) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424899) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424900) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424901) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424902) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424904) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424905) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424906) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424907) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424909) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424910) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424911) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424912) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
                <tr style="height:18px">
                    <td rowspan="2" style="text-align:center">11</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424915) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424916) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424917) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424918) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424919) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424920) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424925) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="text-align:center">@foreach($res['d1'] as $item) @if($item->emrdfk == 424930) {!! $item->value !!} @endif @endforeach</td>
                    
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424935) {!! $item->value !!} @endif @endforeach</td>
                    <td rowspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 424936) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424921) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424922) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424923) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424924) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424926) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424927) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424928) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424929) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424931) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424932) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424933) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                    <td style="text-align:center;">@foreach($res['d1'] as $item) @if($item->emrdfk == 424934) <img src="{{ $centang}}" width="7px" height="7px" /> @endif @endforeach</td>
                </tr>
            </table>
        </div>
    @endif

</body>

</html>
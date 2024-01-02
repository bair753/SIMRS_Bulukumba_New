<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</title>

    <style>
        html,
        body {
            font-family:Arial, Helvetica, sans-serif;

            margin-bottom: 0px;
        }

        @page {
            size: auto;
        }

        table {
            page-break-inside: auto
        }

        table {
            -fs-table-paginate: paginate;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        table {
            border: 1px solid #000;
            border-collapse: collapse;
            table-layout: fixed;
        }

        tr td {
            border: 1px solid #000;
            border-collapse: collapse;
            /* padding:.1rem; */
        }

        .mintd {
            width: 48pt;
        }

        .logo {
            width: 50px !important;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bordered {
            border: 1px solid #000;
        }

        .noborder {
            border: none;
        }

        .blf {
            border-left: 1px solid #000;
        }

        .btp {
            border-top: 1px solid #000;
        }

        .btm {
            border-bottom: 1px solid #000;
        }

        .br {
            border-right: 1px solid #000;
        }

        .border-lr {
            border: 1px solid #000;
            border-top: none;
            border-bottom: none;
        }

        .border-tb {
            border: 1px solid #000;
            border-left: none;
            border-right: none;
        }

        table tr td {
            font-size: 7pt;
        }

        table tr {
            height: 16pt
        }

        .bg-dark {
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: x-large;
            padding: .5rem;
            height: 20pt !important;
        }

        .bg-dark-small {
            background: #000;
            color: #fff;
        }

        .rotate {
            vertical-align: bottom;
            text-align: center;
        }

        #rotate {
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }

        .p3 {
            padding: 0.3rem;
        }

        .p2 {
            padding: 0.2rem;
        }

        p {
            padding: .5rem;
        }

        ul li {
            list-style: none;
        }

        ul li:before {
            content: '-'
        }

        .gambar {
            position: absolute;
            top: 25%;
            left: 45%;
        }

        img.img-diagram {
            width: 97%;
            height: 97%;
            object-fit: cover;
        }

        /* .format {
            page-break-after: always;
        } */
    </style>
</head>

@if (!empty($res['d1']))
    <body ng-controller="cetakSkriningDewasa">
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                        !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                    </td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->namapasien !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">38.2</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr class="text-center">
                    <td colspan="12" rowspan="3">Faktor Risiko</td>
                    <td colspan="12" rowspan="3">Parameter</td>
                    <td colspan="25">Tanggal /Jam</td>
                </tr>
                <tr class="text-center">
                    <td colspan="5" rowspan="2" valign="top" class="p2">Skor</td>
                    <td colspan="3">1</td>
                    <td colspan="3">2</td>
                    <td colspan="3">3</td>
                    <td colspan="3">4</td>
                    <td colspan="3">5</td>
                    <td colspan="5">6</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 428100) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 428101) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 428102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 428103) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 428104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5">@foreach($res['d1'] as $item) @if($item->emrdfk == 428105) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">Riwayat Jatuh
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">25</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428106) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428107) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428108) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428109) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428110) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428111) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">( 1 tahun terakhir)
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428112) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428113) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428114) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428115) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428116) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428117) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">
                        Diagnosa sekunder
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428118) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428119) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428120) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428121) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428122) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428123) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">
                        (>=2 Diagnosis Medis )
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428124) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428125) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428126) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428127) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428128) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428129) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Alat Bantu
                    </td>
                    <td colspan="12" class="p3">Berpegangan pada perabot</td>
                    <td colspan="5" class="text-center">30</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428130) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428131) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428132) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428133) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428134) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428135) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Tongkat/ alat penopang</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428136) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428137) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428138) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428139) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428140) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428141) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak ada / kursi roda / perawat /tirah baring</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428142) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428143) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428144) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428145) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428146) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428147) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Terpasang Infus
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428148) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428149) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428150) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428151) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428152) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428153) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428154) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428155) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428156) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428157) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428158) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428159) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Gaya Berjalan
                    </td>
                    <td colspan="12" class="p3">Terganggu</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428160) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428161) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428162) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428163) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428164) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428165) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Lemah</td>
                    <td colspan="5" class="text-center">10</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428166) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428167) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428168) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428169) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428170) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428171) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Normal /tirah baring/immobilisasi</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428172) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428173) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428174) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428175) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428176) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428177) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Status Mental
                    </td>
                    <td colspan="12" class="p3">Sering lupa akan keterbatasan yang dimiliki</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428178) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428179) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428180) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428181) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428182) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428183) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Sadar akan kemampuan diri sendiri</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428184) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428185) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428186) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428187) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428188) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428189) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="29" class="bg-dark text-center">TOTAL</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428191) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428192) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428195) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Hasil Skrining : @foreach($res['d1'] as $item) @if($item->emrdfk == 428196) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Saran : @foreach($res['d1'] as $item) @if($item->emrdfk == 428198) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">Perawat</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">
                        <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk ==428199) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach </div>
                    </td>
                </tr>
                <tr valign="bottom" class="noborder btm">
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder p3">(@foreach($res['d1'] as $item) @if($item->emrdfk == 428199) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Kategori :</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Tinggi = >= 45 (Pasang gelang dan penandaan warna kuning)
                    </td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Sedang = 25 – 44</td>
                </tr>
                <tr>
                    <td class="p3 noborder" colspan="49">Risiko Rendah = 0 – 25</td>
                </tr>
                <tr class="bg-dark text-center">
                    <td colspan="49">INTERVENSI RISIKO JATUH DEWASA</td>
                </tr>
                <tr class="bg-dark-small text-center">
                    <td colspan="49">(Skala MORSE)</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Rendah dan Sedang</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3">1</td>
                    <td colspan="16" class="p3">Melakukan orientasi ruangan pada pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428207) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428208) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428209) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428210) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428211) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428212) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Keselamatan lingkungan : hindari ruangan yang kacau balau, dekatkan bel dan
                        telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428214) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428215) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428216) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428217) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428218) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428219) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pastikan roda tempat tidur terkunci</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428221) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428222) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428223) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428224) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428225) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428226) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Posisikan tempat tidur pada posisi terendah</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428228) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428229) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428230) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428231) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428232) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428233) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Pagar Pengaman tempat tidur dinaikkan</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428235) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428236) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428237) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428238) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428239) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428240) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 4 jam) tawarkan
                        kebelakang (kamar kecil secara teratur)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428242) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428243) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428244) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428245) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428246) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Memberikan bantuan saat pasien ambulasi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428257) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428258) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428259) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428260) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">9</td>
                    <td colspan="16" class="p3">Meletakkan alat bantu pasien dalam jangkauan ( kacamata, HP, tongkat dan
                        penyangga)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428264) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428267) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">10</td>
                    <td colspan="16" class="p3">Gunakan alat bantu jalan (walker, handrail)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428270) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428276) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428277) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428278) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428279) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428280) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428281) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Tinggi</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d1'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">1</td>
                    <td colspan="16" class="p3">Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428290) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428292) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428294) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Pasangkan tanda peringatan pasien jatuh diatas tempat tidur pasien / di
                        dinding dekat pasien / di gantung dekat pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pasien ditempelkan didekat nurse station</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428305) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428306) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428307) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428308) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Memasangkan handrail tempat tidur bila meninggalkan pasien seorang diri</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428315) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri dikamar
                        mandi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428317) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428318) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam )</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428329) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Membantu kebutuhan eliminasi pasien saban 2 jam </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran
                        menggunakan tempat duduk dikamar mandi saat pasien mandi </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428338) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428339) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428340) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428341) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428342) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428344) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428345) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428346) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d1'] as $item) @if($item->emrdfk == 428349) {!! $item->value !!} @endif @endforeach</td>
                </tr>
            </table>
        </div>
    </body>
@endif

@if (!empty($res['d2']))
    <body ng-controller="cetakSkriningDewasa">
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                        !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d2'][0]->nocm !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                    </td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d2'][0]->namapasien !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">38.2</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d2'][0]->noidentitas !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr class="text-center">
                    <td colspan="12" rowspan="3">Faktor Risiko</td>
                    <td colspan="12" rowspan="3">Parameter</td>
                    <td colspan="25">Tanggal /Jam</td>
                </tr>
                <tr class="text-center">
                    <td colspan="5" rowspan="2" valign="top" class="p2">Skor</td>
                    <td colspan="3">1</td>
                    <td colspan="3">2</td>
                    <td colspan="3">3</td>
                    <td colspan="3">4</td>
                    <td colspan="3">5</td>
                    <td colspan="5">6</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 428100) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 428101) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 428102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 428103) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 428104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5">@foreach($res['d2'] as $item) @if($item->emrdfk == 428105) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">Riwayat Jatuh
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">25</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428106) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428107) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428108) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428109) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428110) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428111) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">( 1 tahun terakhir)
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428112) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428113) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428114) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428115) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428116) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428117) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">
                        Diagnosa sekunder
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428118) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428119) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428120) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428121) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428122) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428123) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">
                        (>=2 Diagnosis Medis )
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428124) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428125) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428126) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428127) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428128) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428129) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Alat Bantu
                    </td>
                    <td colspan="12" class="p3">Berpegangan pada perabot</td>
                    <td colspan="5" class="text-center">30</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428130) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428131) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428132) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428133) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428134) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428135) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Tongkat/ alat penopang</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428136) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428137) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428138) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428139) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428140) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428141) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak ada / kursi roda / perawat /tirah baring</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428142) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428143) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428144) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428145) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428146) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428147) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Terpasang Infus
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428148) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428149) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428150) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428151) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428152) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428153) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428154) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428155) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428156) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428157) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428158) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428159) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Gaya Berjalan
                    </td>
                    <td colspan="12" class="p3">Terganggu</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428160) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428161) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428162) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428163) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428164) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428165) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Lemah</td>
                    <td colspan="5" class="text-center">10</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428166) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428167) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428168) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428169) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428170) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428171) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Normal /tirah baring/immobilisasi</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428172) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428173) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428174) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428175) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428176) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428177) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Status Mental
                    </td>
                    <td colspan="12" class="p3">Sering lupa akan keterbatasan yang dimiliki</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428178) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428179) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428180) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428181) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428182) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428183) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Sadar akan kemampuan diri sendiri</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428184) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428185) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428186) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428187) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428188) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428189) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="29" class="bg-dark text-center">TOTAL</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428191) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428192) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428195) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Hasil Skrining : @foreach($res['d2'] as $item) @if($item->emrdfk == 428196) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Saran : @foreach($res['d2'] as $item) @if($item->emrdfk == 428198) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">Perawat</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">
                        <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk ==428199) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach </div>
                    </td>
                </tr>
                <tr valign="bottom" class="noborder btm">
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder p3">(@foreach($res['d2'] as $item) @if($item->emrdfk == 428199) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Kategori :</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Tinggi = >= 45 (Pasang gelang dan penandaan warna kuning)
                    </td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Sedang = 25 – 44</td>
                </tr>
                <tr>
                    <td class="p3 noborder" colspan="49">Risiko Rendah = 0 – 25</td>
                </tr>
                <tr class="bg-dark text-center">
                    <td colspan="49">INTERVENSI RISIKO JATUH DEWASA</td>
                </tr>
                <tr class="bg-dark-small text-center">
                    <td colspan="49">(Skala MORSE)</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Rendah dan Sedang</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3">1</td>
                    <td colspan="16" class="p3">Melakukan orientasi ruangan pada pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428207) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428208) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428209) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428210) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428211) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428212) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Keselamatan lingkungan : hindari ruangan yang kacau balau, dekatkan bel dan
                        telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428214) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428215) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428216) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428217) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428218) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428219) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pastikan roda tempat tidur terkunci</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428221) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428222) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428223) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428224) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428225) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428226) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Posisikan tempat tidur pada posisi terendah</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428228) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428229) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428230) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428231) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428232) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428233) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Pagar Pengaman tempat tidur dinaikkan</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428235) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428236) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428237) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428238) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428239) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428240) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 4 jam) tawarkan
                        kebelakang (kamar kecil secara teratur)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428242) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428243) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428244) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428245) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428246) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Memberikan bantuan saat pasien ambulasi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428257) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428258) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428259) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428260) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">9</td>
                    <td colspan="16" class="p3">Meletakkan alat bantu pasien dalam jangkauan ( kacamata, HP, tongkat dan
                        penyangga)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428264) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428267) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">10</td>
                    <td colspan="16" class="p3">Gunakan alat bantu jalan (walker, handrail)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428270) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428276) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428277) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428278) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428279) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428280) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428281) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Tinggi</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d2'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">1</td>
                    <td colspan="16" class="p3">Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428290) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428292) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428294) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Pasangkan tanda peringatan pasien jatuh diatas tempat tidur pasien / di
                        dinding dekat pasien / di gantung dekat pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pasien ditempelkan didekat nurse station</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428305) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428306) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428307) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428308) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Memasangkan handrail tempat tidur bila meninggalkan pasien seorang diri</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428315) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri dikamar
                        mandi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428317) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428318) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam )</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428329) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Membantu kebutuhan eliminasi pasien saban 2 jam </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran
                        menggunakan tempat duduk dikamar mandi saat pasien mandi </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428338) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428339) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428340) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428341) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428342) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428344) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428345) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428346) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d2'] as $item) @if($item->emrdfk == 428349) {!! $item->value !!} @endif @endforeach</td>
                </tr>
            </table>
        </div>
    </body>
@endif

@if (!empty($res['d3']))
    <body ng-controller="cetakSkriningDewasa">
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                        !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d3'][0]->nocm !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                    </td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d3'][0]->namapasien !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">38.2</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d3'][0]->noidentitas !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr class="text-center">
                    <td colspan="12" rowspan="3">Faktor Risiko</td>
                    <td colspan="12" rowspan="3">Parameter</td>
                    <td colspan="25">Tanggal /Jam</td>
                </tr>
                <tr class="text-center">
                    <td colspan="5" rowspan="2" valign="top" class="p2">Skor</td>
                    <td colspan="3">1</td>
                    <td colspan="3">2</td>
                    <td colspan="3">3</td>
                    <td colspan="3">4</td>
                    <td colspan="3">5</td>
                    <td colspan="5">6</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 428100) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 428101) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 428102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 428103) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 428104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5">@foreach($res['d3'] as $item) @if($item->emrdfk == 428105) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">Riwayat Jatuh
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">25</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428106) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428107) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428108) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428109) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428110) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428111) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">( 1 tahun terakhir)
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428112) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428113) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428114) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428115) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428116) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428117) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">
                        Diagnosa sekunder
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428118) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428119) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428120) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428121) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428122) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428123) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">
                        (>=2 Diagnosis Medis )
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428124) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428125) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428126) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428127) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428128) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428129) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Alat Bantu
                    </td>
                    <td colspan="12" class="p3">Berpegangan pada perabot</td>
                    <td colspan="5" class="text-center">30</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428130) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428131) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428132) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428133) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428134) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428135) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Tongkat/ alat penopang</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428136) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428137) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428138) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428139) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428140) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428141) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak ada / kursi roda / perawat /tirah baring</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428142) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428143) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428144) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428145) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428146) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428147) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Terpasang Infus
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428148) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428149) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428150) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428151) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428152) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428153) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428154) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428155) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428156) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428157) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428158) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428159) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Gaya Berjalan
                    </td>
                    <td colspan="12" class="p3">Terganggu</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428160) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428161) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428162) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428163) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428164) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428165) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Lemah</td>
                    <td colspan="5" class="text-center">10</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428166) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428167) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428168) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428169) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428170) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428171) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Normal /tirah baring/immobilisasi</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428172) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428173) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428174) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428175) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428176) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428177) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Status Mental
                    </td>
                    <td colspan="12" class="p3">Sering lupa akan keterbatasan yang dimiliki</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428178) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428179) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428180) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428181) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428182) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428183) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Sadar akan kemampuan diri sendiri</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428184) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428185) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428186) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428187) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428188) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428189) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="29" class="bg-dark text-center">TOTAL</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428191) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428192) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428195) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Hasil Skrining : @foreach($res['d3'] as $item) @if($item->emrdfk == 428196) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Saran : @foreach($res['d3'] as $item) @if($item->emrdfk == 428198) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">Perawat</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">
                        <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk ==428199) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach </div>
                    </td>
                </tr>
                <tr valign="bottom" class="noborder btm">
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder p3">(@foreach($res['d3'] as $item) @if($item->emrdfk == 428199) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Kategori :</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Tinggi = >= 45 (Pasang gelang dan penandaan warna kuning)
                    </td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Sedang = 25 – 44</td>
                </tr>
                <tr>
                    <td class="p3 noborder" colspan="49">Risiko Rendah = 0 – 25</td>
                </tr>
                <tr class="bg-dark text-center">
                    <td colspan="49">INTERVENSI RISIKO JATUH DEWASA</td>
                </tr>
                <tr class="bg-dark-small text-center">
                    <td colspan="49">(Skala MORSE)</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Rendah dan Sedang</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3">1</td>
                    <td colspan="16" class="p3">Melakukan orientasi ruangan pada pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428207) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428208) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428209) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428210) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428211) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428212) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Keselamatan lingkungan : hindari ruangan yang kacau balau, dekatkan bel dan
                        telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428214) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428215) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428216) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428217) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428218) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428219) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pastikan roda tempat tidur terkunci</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428221) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428222) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428223) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428224) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428225) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428226) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Posisikan tempat tidur pada posisi terendah</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428228) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428229) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428230) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428231) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428232) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428233) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Pagar Pengaman tempat tidur dinaikkan</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428235) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428236) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428237) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428238) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428239) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428240) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 4 jam) tawarkan
                        kebelakang (kamar kecil secara teratur)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428242) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428243) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428244) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428245) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428246) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Memberikan bantuan saat pasien ambulasi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428257) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428258) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428259) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428260) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">9</td>
                    <td colspan="16" class="p3">Meletakkan alat bantu pasien dalam jangkauan ( kacamata, HP, tongkat dan
                        penyangga)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428264) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428267) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">10</td>
                    <td colspan="16" class="p3">Gunakan alat bantu jalan (walker, handrail)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428270) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428276) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428277) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428278) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428279) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428280) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428281) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Tinggi</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d3'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">1</td>
                    <td colspan="16" class="p3">Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428290) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428292) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428294) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Pasangkan tanda peringatan pasien jatuh diatas tempat tidur pasien / di
                        dinding dekat pasien / di gantung dekat pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pasien ditempelkan didekat nurse station</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428305) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428306) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428307) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428308) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Memasangkan handrail tempat tidur bila meninggalkan pasien seorang diri</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428315) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri dikamar
                        mandi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428317) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428318) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam )</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428329) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Membantu kebutuhan eliminasi pasien saban 2 jam </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran
                        menggunakan tempat duduk dikamar mandi saat pasien mandi </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428338) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428339) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428340) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428341) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428342) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428344) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428345) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428346) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d3'] as $item) @if($item->emrdfk == 428349) {!! $item->value !!} @endif @endforeach</td>
                </tr>
            </table>
        </div>
    </body>
@endif

@if (!empty($res['d4']))
    <body ng-controller="cetakSkriningDewasa">
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                        !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d4'][0]->nocm !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                    </td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d4'][0]->namapasien !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">38.2</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d4'][0]->noidentitas !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr class="text-center">
                    <td colspan="12" rowspan="3">Faktor Risiko</td>
                    <td colspan="12" rowspan="3">Parameter</td>
                    <td colspan="25">Tanggal /Jam</td>
                </tr>
                <tr class="text-center">
                    <td colspan="5" rowspan="2" valign="top" class="p2">Skor</td>
                    <td colspan="3">1</td>
                    <td colspan="3">2</td>
                    <td colspan="3">3</td>
                    <td colspan="3">4</td>
                    <td colspan="3">5</td>
                    <td colspan="5">6</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 428100) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 428101) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 428102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 428103) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 428104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5">@foreach($res['d4'] as $item) @if($item->emrdfk == 428105) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">Riwayat Jatuh
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">25</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428106) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428107) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428108) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428109) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428110) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428111) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">( 1 tahun terakhir)
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428112) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428113) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428114) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428115) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428116) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428117) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">
                        Diagnosa sekunder
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428118) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428119) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428120) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428121) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428122) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428123) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">
                        (>=2 Diagnosis Medis )
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428124) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428125) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428126) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428127) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428128) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428129) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Alat Bantu
                    </td>
                    <td colspan="12" class="p3">Berpegangan pada perabot</td>
                    <td colspan="5" class="text-center">30</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428130) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428131) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428132) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428133) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428134) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428135) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Tongkat/ alat penopang</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428136) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428137) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428138) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428139) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428140) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428141) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak ada / kursi roda / perawat /tirah baring</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428142) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428143) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428144) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428145) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428146) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428147) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Terpasang Infus
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428148) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428149) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428150) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428151) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428152) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428153) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428154) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428155) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428156) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428157) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428158) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428159) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Gaya Berjalan
                    </td>
                    <td colspan="12" class="p3">Terganggu</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428160) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428161) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428162) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428163) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428164) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428165) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Lemah</td>
                    <td colspan="5" class="text-center">10</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428166) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428167) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428168) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428169) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428170) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428171) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Normal /tirah baring/immobilisasi</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428172) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428173) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428174) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428175) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428176) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428177) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Status Mental
                    </td>
                    <td colspan="12" class="p3">Sering lupa akan keterbatasan yang dimiliki</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428178) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428179) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428180) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428181) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428182) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428183) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Sadar akan kemampuan diri sendiri</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428184) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428185) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428186) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428187) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428188) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428189) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="29" class="bg-dark text-center">TOTAL</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428191) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428192) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428195) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Hasil Skrining : @foreach($res['d4'] as $item) @if($item->emrdfk == 428196) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Saran : @foreach($res['d4'] as $item) @if($item->emrdfk == 428198) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">Perawat</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">
                        <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk ==428199) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach </div>
                    </td>
                </tr>
                <tr valign="bottom" class="noborder btm">
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder p3">(@foreach($res['d4'] as $item) @if($item->emrdfk == 428199) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Kategori :</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Tinggi = >= 45 (Pasang gelang dan penandaan warna kuning)
                    </td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Sedang = 25 – 44</td>
                </tr>
                <tr>
                    <td class="p3 noborder" colspan="49">Risiko Rendah = 0 – 25</td>
                </tr>
                <tr class="bg-dark text-center">
                    <td colspan="49">INTERVENSI RISIKO JATUH DEWASA</td>
                </tr>
                <tr class="bg-dark-small text-center">
                    <td colspan="49">(Skala MORSE)</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Rendah dan Sedang</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3">1</td>
                    <td colspan="16" class="p3">Melakukan orientasi ruangan pada pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428207) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428208) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428209) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428210) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428211) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428212) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Keselamatan lingkungan : hindari ruangan yang kacau balau, dekatkan bel dan
                        telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428214) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428215) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428216) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428217) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428218) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428219) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pastikan roda tempat tidur terkunci</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428221) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428222) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428223) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428224) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428225) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428226) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Posisikan tempat tidur pada posisi terendah</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428228) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428229) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428230) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428231) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428232) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428233) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Pagar Pengaman tempat tidur dinaikkan</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428235) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428236) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428237) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428238) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428239) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428240) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 4 jam) tawarkan
                        kebelakang (kamar kecil secara teratur)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428242) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428243) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428244) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428245) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428246) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Memberikan bantuan saat pasien ambulasi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428257) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428258) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428259) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428260) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">9</td>
                    <td colspan="16" class="p3">Meletakkan alat bantu pasien dalam jangkauan ( kacamata, HP, tongkat dan
                        penyangga)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428264) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428267) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">10</td>
                    <td colspan="16" class="p3">Gunakan alat bantu jalan (walker, handrail)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428270) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428276) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428277) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428278) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428279) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428280) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428281) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Tinggi</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d4'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">1</td>
                    <td colspan="16" class="p3">Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428290) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428292) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428294) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Pasangkan tanda peringatan pasien jatuh diatas tempat tidur pasien / di
                        dinding dekat pasien / di gantung dekat pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pasien ditempelkan didekat nurse station</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428305) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428306) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428307) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428308) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Memasangkan handrail tempat tidur bila meninggalkan pasien seorang diri</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428315) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri dikamar
                        mandi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428317) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428318) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam )</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428329) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Membantu kebutuhan eliminasi pasien saban 2 jam </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran
                        menggunakan tempat duduk dikamar mandi saat pasien mandi </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428338) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428339) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428340) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428341) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428342) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428344) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428345) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428346) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d4'] as $item) @if($item->emrdfk == 428349) {!! $item->value !!} @endif @endforeach</td>
                </tr>
            </table>
        </div>
    </body>
@endif

@if (!empty($res['d5']))
    <body ng-controller="cetakSkriningDewasa">
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                        !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d5'][0]->nocm !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM
                    </td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d5'][0]->namapasien !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">38.2</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d5'][0]->noidentitas !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ASESMEN LANJUT RESIKO JATUH PASIEN DEWASA</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr class="text-center">
                    <td colspan="12" rowspan="3">Faktor Risiko</td>
                    <td colspan="12" rowspan="3">Parameter</td>
                    <td colspan="25">Tanggal /Jam</td>
                </tr>
                <tr class="text-center">
                    <td colspan="5" rowspan="2" valign="top" class="p2">Skor</td>
                    <td colspan="3">1</td>
                    <td colspan="3">2</td>
                    <td colspan="3">3</td>
                    <td colspan="3">4</td>
                    <td colspan="3">5</td>
                    <td colspan="5">6</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 428100) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 428101) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 428102) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 428103) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 428104) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5">@foreach($res['d5'] as $item) @if($item->emrdfk == 428105) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">Riwayat Jatuh
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">25</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428106) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428107) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428108) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428109) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428110) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428111) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">( 1 tahun terakhir)
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428112) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428113) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428114) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428115) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428116) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428117) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-center noborder">
                        Diagnosa sekunder
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428118) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428119) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428120) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428121) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428122) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428123) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="text-center noborder">
                        (>=2 Diagnosis Medis )
                    </td>
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428124) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428125) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428126) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428127) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428128) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428129) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Alat Bantu
                    </td>
                    <td colspan="12" class="p3">Berpegangan pada perabot</td>
                    <td colspan="5" class="text-center">30</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428130) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428131) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428132) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428133) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428134) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428135) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Tongkat/ alat penopang</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428136) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428137) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428138) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428139) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428140) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428141) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak ada / kursi roda / perawat /tirah baring</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428142) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428143) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428144) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428145) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428146) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428147) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Terpasang Infus
                    </td>
                    <td colspan="12" class="p3">Ya</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428148) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428149) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428150) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428151) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428152) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428153) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Tidak</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428154) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428155) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428156) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428157) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428158) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428159) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="3" valign="top" class="p2 text-center noborder">
                        Gaya Berjalan
                    </td>
                    <td colspan="12" class="p3">Terganggu</td>
                    <td colspan="5" class="text-center">20</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428160) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428161) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428162) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428163) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428164) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428165) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" class="p3">Lemah</td>
                    <td colspan="5" class="text-center">10</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428166) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428167) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428168) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428169) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428170) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428171) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Normal /tirah baring/immobilisasi</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428172) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428173) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428174) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428175) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428176) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428177) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="12" rowspan="2" valign="top" class="p2 text-center noborder">
                        Status Mental
                    </td>
                    <td colspan="12" class="p3">Sering lupa akan keterbatasan yang dimiliki</td>
                    <td colspan="5" class="text-center">15</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428178) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428179) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428180) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428181) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428182) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428183) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="12" class="p3">Sadar akan kemampuan diri sendiri</td>
                    <td colspan="5" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428184) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428185) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428186) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428187) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428188) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428189) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="29" class="bg-dark text-center">TOTAL</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428190) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428191) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428192) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428193) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428194) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428195) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Hasil Skrining : @foreach($res['d5'] as $item) @if($item->emrdfk == 428196) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3" style="height:70pt" valign="top">Saran : @foreach($res['d5'] as $item) @if($item->emrdfk == 428198) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">Perawat</td>
                </tr>
                <tr>
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder">
                        <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk ==428199) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach </div>
                    </td>
                </tr>
                <tr valign="bottom" class="noborder btm">
                    <td colspan="30" class="noborder"></td>
                    <td colspan="19" class="text-center noborder p3">(@foreach($res['d5'] as $item) @if($item->emrdfk == 428199) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Kategori :</td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Tinggi = >= 45 (Pasang gelang dan penandaan warna kuning)
                    </td>
                </tr>
                <tr>
                    <td colspan="49" class="p3 noborder">Risiko Sedang = 25 – 44</td>
                </tr>
                <tr>
                    <td class="p3 noborder" colspan="49">Risiko Rendah = 0 – 25</td>
                </tr>
                <tr class="bg-dark text-center">
                    <td colspan="49">INTERVENSI RISIKO JATUH DEWASA</td>
                </tr>
                <tr class="bg-dark-small text-center">
                    <td colspan="49">(Skala MORSE)</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Rendah dan Sedang</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428200) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428201) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428202) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428203) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428204) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428205) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3">1</td>
                    <td colspan="16" class="p3">Melakukan orientasi ruangan pada pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428207) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428208) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428209) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428210) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428211) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428212) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Keselamatan lingkungan : hindari ruangan yang kacau balau, dekatkan bel dan
                        telepon, biarkan pintu terbuka, gunakan lampu malam hari serta pagar tempat tidur</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428214) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428215) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428216) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428217) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428218) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428219) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pastikan roda tempat tidur terkunci</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428221) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428222) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428223) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428224) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428225) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428226) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Posisikan tempat tidur pada posisi terendah</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428228) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428229) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428230) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428231) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428232) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428233) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Pagar Pengaman tempat tidur dinaikkan</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428235) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428236) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428237) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428238) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428239) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428240) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 4 jam) tawarkan
                        kebelakang (kamar kecil secara teratur)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428242) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428243) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428244) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428245) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428246) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428247) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Memberikan bantuan saat pasien ambulasi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428249) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428250) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428251) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428252) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428253) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428254) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Anjurkan pasien menggunakan kaos kaki atau sepatu yang tidak licin</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428256) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428257) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428258) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428259) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428260) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428261) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">9</td>
                    <td colspan="16" class="p3">Meletakkan alat bantu pasien dalam jangkauan ( kacamata, HP, tongkat dan
                        penyangga)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428264) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428267) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">10</td>
                    <td colspan="16" class="p3">Gunakan alat bantu jalan (walker, handrail)</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428270) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428271) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428272) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428273) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428276) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428277) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428278) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428279) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428280) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428281) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">No</td>
                    <td colspan="16" class="text-center">Risiko Tinggi</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Tgl / Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                {{-- <tr>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428282) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428283) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428284) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428285) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428286) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3">Jam: @foreach($res['d5'] as $item) @if($item->emrdfk == 428287) {!! $item->value !!} @endif @endforeach</td>
                </tr> --}}
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">1</td>
                    <td colspan="16" class="p3">Pakaikan stiker risiko jatuh berwarna kuning pada gelang pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428290) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428292) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428294) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">2</td>
                    <td colspan="16" class="p3">Pasangkan tanda peringatan pasien jatuh diatas tempat tidur pasien / di
                        dinding dekat pasien / di gantung dekat pasien</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428296) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428297) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428298) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428299) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428300) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428301) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">3</td>
                    <td colspan="16" class="p3">Pasien ditempelkan didekat nurse station</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428303) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428304) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428305) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428306) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428307) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428308) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">4</td>
                    <td colspan="16" class="p3">Memasangkan handrail tempat tidur bila meninggalkan pasien seorang diri</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428310) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428311) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428315) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">5</td>
                    <td colspan="16" class="p3">Mendampingi pasien saat ke kamar mandi, jangan tinggalkan sendiri dikamar
                        mandi</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428317) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428318) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428319) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428320) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428321) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428322) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">6</td>
                    <td colspan="16" class="p3">Monitor kebutuhan pasien secara berkala (minimal tiap 2 jam )</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428324) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428325) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428326) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428327) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428328) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428329) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">7</td>
                    <td colspan="16" class="p3">Membantu kebutuhan eliminasi pasien saban 2 jam </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3" class="p3" valign="top">8</td>
                    <td colspan="16" class="p3">Lantai kamar mandi dengan karpetanti slip/tidak licin, serta anjuran
                        menggunakan tempat duduk dikamar mandi saat pasien mandi </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428338) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428339) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428340) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428341) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428342) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428343) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    </td>
                </tr>
                <tr style="font-size: small;height:70pt" valign="top">
                    <td colspan="19" class="p3 text-center">Nama & tanda tangan perawat</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428344) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428345) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428346) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428347) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428348) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="5" class="p3 text-center">@foreach($res['d5'] as $item) @if($item->emrdfk == 428349) {!! $item->value !!} @endif @endforeach</td>
                </tr>
            </table>
        </div>
    </body>
@endif

</html>
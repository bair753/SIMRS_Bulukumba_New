<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Persalinan</title>

    <style>
        * {
            /* font-family: DejaVu Sans, Verdana, Arial, sans-serif; */
            font-family:Arial, Helvetica, sans-serif;

        }

        @page {
            size: auto;
            size: A4 portrait;
        }

        html,
        body {
            font-size: 7pt;
            margin-top: 10px;
            margin-left: 20px;
        }

        table {
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        header {
            border: 1px solid #000;
            width: 100%;
            display: flex;
            justify-content: flex-start;
        }

        .logo {
            width: 100px;
            height: auto;
            border-right: 1px solid #000;
            padding: .3rem;
        }

        .kop {
            padding: .3rem;
            align-self: center;
        }

        .kop-text {
            text-align: center;
            font-size: smaller;
        }

        .info {
            border-left: 1px solid #000;
            border-right: 1px solid #000;
            border-collapse: collapse;
            flex-grow: 1;
            padding: .3rem;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            padding: .5rem;
            text-align: center;
        }

        .bordered {
            border: 1px solid black;
            border-collapse: collapse;
            padding: .2rem;
            box-sizing: border-box;
        }

        .border-top,
        .border-bottom,
        .border-left,
        .border-right {
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-top {
            border-top: .1rem solid rgba(0, 0, 0, 0.45);
        }

        .border-bottom {
            border-bottom: .1rem solid rgba(0, 0, 0, 0.45);
        }

        .border-left {
            border-left: .1rem solid rgba(0, 0, 0, 0.45);
        }

        .border-right {
            border-right: .1rem solid rgba(0, 0, 0, 0.45);
        }

        .flex {
            display: flex;
        }

        .flex .basis50,
        .col-2 {
            flex-basis: 50%;
        }

        ul li:not(:first-child) {
            padding: .3rem;
        }

        ul li {
            list-style: none;
        }

        .basis50 ul li:first-child {
            border-bottom: 1px solid #000;
            padding: .3rem;
        }

        table {
            border: 1px solid #000;
            border-collapse: collapse;
            font-size: x-small;
        }

        tr td {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        #content>tr td,
        .info table>tr td {
            width: 20px;
        }

        td {
            padding: .3rem;
        }
    </style>

</head>
@if (!empty($res['d1']))
    <body>
        <section>
            <table width="100%" id="content" style="table-layout:fixed">
                <tr style="border:none;border-top:1px solid #000">
                    <td rowspan="4" style="border:none;border-right:1px solid #000">

                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>

                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->namapasien !!} {!! $res['d1'][0]->jeniskelamin ==
                        'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">59</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d1'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN PERSALINAN
                    </td>
                </tr>
                <tr>
                    <td style="border:none;">G : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100366) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">P : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100367) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">A : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100368) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" style="border:none;">M : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100369) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000">
                    <th style="border:1px solid #000">TANGGAL/ PUKUL</th>
                    <th colspan="8" style="border:1px solid #000">RIWAYAT PERSALINAN</th>
                </tr>
                <tr style="border:1px solid #000">
                    <td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31100370) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">Pasien masuk kamar bersalin</td>
                </tr>
                <tr>
                    <td rowspan="4">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100371) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">PEMERIKSAAN LUAR</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> TFU : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100372) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> Letak :
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kepala
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lintang
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Oblique
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100377) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kiri
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kanan</td>
                </tr>
                <tr>
                    <td style="border:none;"> DJJ :</td>
                    <td colspan="" style="border:none;"> @foreach($res['d1'] as $item) @if($item->emrdfk ==31100378) {!! $item->value !!} @endif @endforeach x / menit
                    </td>
                    <td colspan="6" style="border:none;"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <td rowspan="4">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100413) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="border:1px solid #000;border-bottom:none;border-top:none">PEMERIKSAAN DALAM</td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100387) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100388) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;">
                    <td colspan="1" style="border:none">Vulva</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100389) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Jernih
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100390) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hijau
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pekat
                    </td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Vagina</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Kepala</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge I - II
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge II - III
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge III - IV
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach U2K
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sacrum
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-top:none">
                    <td colspan="1" style="border:none">Portio</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TEBAL
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIPIS
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KAKU
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LUNAK
                    </td>
                    <td colspan="1" style="border:none">Dagu</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KIRI
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KANAN
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach DEPAN
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BELAKANG
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100414) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Lahir bayi</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100401) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laki-laki
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100402) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Perempuan
                    </td>
                    <td colspan="1" style="border:none">Panjang Badan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100408) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Spontan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100403) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LBK
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100404) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PK
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach MK
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                    </td>
                    <td colspan="1" style="border:none">Lilitan Tali Pusat</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="1" style="border:none">Berat Badan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100407) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Episiotomi</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100415) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Plasenta lahir</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Spontan
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Manual
                    </td>
                    <td colspan="1" style="border:none">Ukuran</td>
                    <td colspan="3" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100421) {!! $item->value !!} @endif @endforeach x @foreach($res['d1'] as $item) @if($item->emrdfk ==31100422) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="2" style="border:none">
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lengkap
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Lengkap
                    </td>
                    <td colspan="2" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">

                    </td>
                    <td colspan="1" style="border:none">Perdarahan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Berat</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Jahitan Perineum</td>
                    <td style="border:none"> : Luar : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100424) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2" style="border:none"> dalam : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100425) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <th style="border:1px solid #000" rowspan="6">POST PARTUM</th>
                    <td style="border:none" colspan="2">Keadaan ibu </td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Tinggi Fundus Uteri</td>
                    <td style="border:none" colspan="6">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100428) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Kontraksi Rahim</td>
                    <td style="border:none" colspan="6">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100429) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Perdarahan</td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada @foreach($res['d1'] as $item) @if($item->emrdfk ==31100432) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Terapi</td>
                    <td style="border:none" colspan="6">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100433) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Transfusi darah/ cairan</td>
                    <td style="border:none" colspan="6">: @foreach($res['d1'] as $item) @if($item->emrdfk ==311004334) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;">
                    <th rowspan="4" style="border:1px solid #000;border-bottom:none;">2 JAM POST PARTUM</th>
                    <td colspan="2" style="border:none">Keadaan ibu</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100436) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                    <td colspan="2" style="border:none">Tinggi FU</td>
                    <td colspan="2" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100440) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Tensi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100437) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">mmHg</td>
                    <td colspan="2" style="border:none">Kontraksi Rahim</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d1'] as $item) @if($item->emrdfk ==31100442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Nadi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100438) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="2" style="border:none">Perdarahan</td>
                    <td style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100443) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none">cc</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Respirasi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk ==31100439) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="4" style="border:none"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;border-top:1px solid #000;">
                    <td colspan="6" style="border:none">Diagnosa Kebidanan : @foreach($res['d1'] as $item) @if($item->emrdfk ==31100444) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" style="border:none">
                        Bulukumba : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100445) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        Dokter / Bidan
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        <div style="text-align: left">@foreach($res['d1'] as $item) @if($item->emrdfk ==31100446) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        (@foreach($res['d1'] as $item) @if($item->emrdfk ==31100446) {!! $item->value !!} @endif @endforeach)
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        Tanda Tangan & Nama Jelas
                    </td>
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

                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>

                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d2'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!! $res['d2'][0]->namapasien !!} {!! $res['d2'][0]->jeniskelamin ==
                        'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">59</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d2'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN PERSALINAN
                    </td>
                </tr>
                <tr>
                    <td style="border:none;">G : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100366) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">P : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100367) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">A : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100368) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" style="border:none;">M : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100369) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000">
                    <th style="border:1px solid #000">TANGGAL/ PUKUL</th>
                    <th colspan="8" style="border:1px solid #000">RIWAYAT PERSALINAN</th>
                </tr>
                <tr style="border:1px solid #000">
                    <td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31100370) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">Pasien masuk kamar bersalin</td>
                </tr>
                <tr>
                    <td rowspan="4">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100371) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">PEMERIKSAAN LUAR</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> TFU : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100372) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> Letak :
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kepala
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lintang
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Oblique
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100377) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kiri
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kanan</td>
                </tr>
                <tr>
                    <td style="border:none;"> DJJ :</td>
                    <td colspan="" style="border:none;"> @foreach($res['d2'] as $item) @if($item->emrdfk ==31100378) {!! $item->value !!} @endif @endforeach x / menit
                    </td>
                    <td colspan="6" style="border:none;"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <td rowspan="4">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100413) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="border:1px solid #000;border-bottom:none;border-top:none">PEMERIKSAAN DALAM</td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100387) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100388) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;">
                    <td colspan="1" style="border:none">Vulva</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100389) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Jernih
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100390) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hijau
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pekat
                    </td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Vagina</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Kepala</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge I - II
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge II - III
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge III - IV
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach U2K
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sacrum
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-top:none">
                    <td colspan="1" style="border:none">Portio</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TEBAL
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIPIS
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KAKU
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LUNAK
                    </td>
                    <td colspan="1" style="border:none">Dagu</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KIRI
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KANAN
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach DEPAN
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BELAKANG
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100414) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Lahir bayi</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100401) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laki-laki
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100402) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Perempuan
                    </td>
                    <td colspan="1" style="border:none">Panjang Badan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100408) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Spontan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100403) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LBK
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100404) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PK
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach MK
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                    </td>
                    <td colspan="1" style="border:none">Lilitan Tali Pusat</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="1" style="border:none">Berat Badan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100407) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Episiotomi</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100415) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Plasenta lahir</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Spontan
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Manual
                    </td>
                    <td colspan="1" style="border:none">Ukuran</td>
                    <td colspan="3" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100421) {!! $item->value !!} @endif @endforeach x @foreach($res['d2'] as $item) @if($item->emrdfk ==31100422) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="2" style="border:none">
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lengkap
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Lengkap
                    </td>
                    <td colspan="2" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">

                    </td>
                    <td colspan="1" style="border:none">Perdarahan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Berat</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Jahitan Perineum</td>
                    <td style="border:none"> : Luar : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100424) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2" style="border:none"> dalam : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100425) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <th style="border:1px solid #000" rowspan="6">POST PARTUM</th>
                    <td style="border:none" colspan="2">Keadaan ibu </td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Tinggi Fundus Uteri</td>
                    <td style="border:none" colspan="6">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100428) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Kontraksi Rahim</td>
                    <td style="border:none" colspan="6">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100429) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Perdarahan</td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada @foreach($res['d2'] as $item) @if($item->emrdfk ==31100432) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Terapi</td>
                    <td style="border:none" colspan="6">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100433) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Transfusi darah/ cairan</td>
                    <td style="border:none" colspan="6">: @foreach($res['d2'] as $item) @if($item->emrdfk ==311004334) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;">
                    <th rowspan="4" style="border:1px solid #000;border-bottom:none;">2 JAM POST PARTUM</th>
                    <td colspan="2" style="border:none">Keadaan ibu</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100436) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                    <td colspan="2" style="border:none">Tinggi FU</td>
                    <td colspan="2" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100440) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Tensi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100437) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">mmHg</td>
                    <td colspan="2" style="border:none">Kontraksi Rahim</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d2'] as $item) @if($item->emrdfk ==31100442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Nadi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100438) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="2" style="border:none">Perdarahan</td>
                    <td style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100443) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none">cc</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Respirasi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk ==31100439) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="4" style="border:none"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;border-top:1px solid #000;">
                    <td colspan="6" style="border:none">Diagnosa Kebidanan : @foreach($res['d2'] as $item) @if($item->emrdfk ==31100444) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" style="border:none">
                        Bulukumba : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100445) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        Dokter / Bidan
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        <div style="text-align: left">@foreach($res['d2'] as $item) @if($item->emrdfk ==31100446) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        (@foreach($res['d2'] as $item) @if($item->emrdfk ==31100446) {!! $item->value !!} @endif @endforeach)
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        Tanda Tangan & Nama Jelas
                    </td>
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

                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>

                    </td>
                    <td rowspan="4" colspan="3" style="text-align:center;border:none"><strong>{!!
                            $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP :
                        (0413) 81292</td>
                    <td style="border:none;border-left:1px solid #000">No. RM </td>
                    <td colspan="3" style="border:none">: {!! $res['d3'][0]->nocm !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="3" style="border:none">: {!! $res['d3'][0]->namapasien !!} {!! $res['d3'][0]->jeniskelamin ==
                        'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">59</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="3" style="border:none">: {!! $res['d3'][0]->noidentitas !!}</td>
                </tr>
                <tr>
                    <td colspan="9" class="bg-dark" style="font-size:x-large">
                        LAPORAN PERSALINAN
                    </td>
                </tr>
                <tr>
                    <td style="border:none;">G : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100366) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">P : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100367) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none;">A : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100368) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" style="border:none;">M : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100369) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000">
                    <th style="border:1px solid #000">TANGGAL/ PUKUL</th>
                    <th colspan="8" style="border:1px solid #000">RIWAYAT PERSALINAN</th>
                </tr>
                <tr style="border:1px solid #000">
                    <td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31100370) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">Pasien masuk kamar bersalin</td>
                </tr>
                <tr>
                    <td rowspan="4">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100371) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="8" style="border:none;">PEMERIKSAAN LUAR</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> TFU : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100372) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none;" colspan="8"> Letak :
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kepala
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lintang
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100376) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Oblique
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100377) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kiri
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100378) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Punggung Kanan</td>
                </tr>
                <tr>
                    <td style="border:none;"> DJJ :</td>
                    <td colspan="" style="border:none;"> @foreach($res['d3'] as $item) @if($item->emrdfk ==31100378) {!! $item->value !!} @endif @endforeach x / menit
                    </td>
                    <td colspan="6" style="border:none;"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <td rowspan="4">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100413) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="4" style="border:1px solid #000;border-bottom:none;border-top:none">PEMERIKSAAN DALAM</td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100387) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100388) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;">
                    <td colspan="1" style="border:none">Vulva</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100379) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Air Ketuban</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100389) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Jernih
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100390) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hijau
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100391) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pekat
                    </td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Vagina</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach NORMAL
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIDAK NORMAL
                    </td>
                    <td colspan="1" style="border:none">Kepala</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge I - II
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge II - III
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hodge III - IV
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach U2K
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sacrum
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-top:none">
                    <td colspan="1" style="border:none">Portio</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TEBAL
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TIPIS
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KAKU
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LUNAK
                    </td>
                    <td colspan="1" style="border:none">Dagu</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100397) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KIRI
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100398) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach KANAN
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100399) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach DEPAN
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100400) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BELAKANG
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100414) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Lahir bayi</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100401) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laki-laki
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100402) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Perempuan
                    </td>
                    <td colspan="1" style="border:none">Panjang Badan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100408) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Spontan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100403) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach LBK
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100404) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PK
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100405) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach MK
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100406) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sungsang
                    </td>
                    <td colspan="1" style="border:none">Lilitan Tali Pusat</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100409) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100410) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none;border-bottom:1px solid #000">
                    <td colspan="1" style="border:none">Berat Badan</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100407) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Episiotomi</td>
                    <td colspan="3" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100411) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach +
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100412) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach -
                    </td>
                </tr>
                <tr style="border:none">
                    <td rowspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100415) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">Plasenta lahir</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100416) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Spontan
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100417) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Manual
                    </td>
                    <td colspan="1" style="border:none">Ukuran</td>
                    <td colspan="3" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100421) {!! $item->value !!} @endif @endforeach x @foreach($res['d3'] as $item) @if($item->emrdfk ==31100422) {!! $item->value !!} @endif @endforeach cm</td>
                </tr>
                <tr style="border:none">
                    <td colspan="2" style="border:none">
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100418) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lengkap
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100419) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Lengkap
                    </td>
                    <td colspan="2" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">

                    </td>
                    <td colspan="1" style="border:none">Perdarahan</td>
                    <td colspan="3" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr style="border:none">
                    <td colspan="1" style="border:none">Berat</td>
                    <td colspan="3" style="border:1px solid #000;border-bottom:none;border-top:none;border-left:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100423) {!! $item->value !!} @endif @endforeach gram</td>
                    <td colspan="1" style="border:none">Jahitan Perineum</td>
                    <td style="border:none"> : Luar : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100424) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="2" style="border:none"> dalam : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100425) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none">
                    <th style="border:1px solid #000" rowspan="6">POST PARTUM</th>
                    <td style="border:none" colspan="2">Keadaan ibu </td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100426) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100427) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Tinggi Fundus Uteri</td>
                    <td style="border:none" colspan="6">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100428) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Kontraksi Rahim</td>
                    <td style="border:none" colspan="6">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100429) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Perdarahan</td>
                    <td style="border:none" colspan="6">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100430) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100431) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada @foreach($res['d3'] as $item) @if($item->emrdfk ==31100432) {!! $item->value !!} @endif @endforeach cc</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Terapi</td>
                    <td style="border:none" colspan="6">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100433) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td style="border:none" colspan="2">Transfusi darah/ cairan</td>
                    <td style="border:none" colspan="6">: @foreach($res['d3'] as $item) @if($item->emrdfk ==311004334) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;">
                    <th rowspan="4" style="border:1px solid #000;border-bottom:none;">2 JAM POST PARTUM</th>
                    <td colspan="2" style="border:none">Keadaan ibu</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100435) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100436) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                    <td colspan="2" style="border:none">Tinggi FU</td>
                    <td colspan="2" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100440) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Tensi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100437) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">mmHg</td>
                    <td colspan="2" style="border:none">Kontraksi Rahim</td>
                    <td colspan="2" style="border:none">:
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100441) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baik
                        @foreach($res['d3'] as $item) @if($item->emrdfk ==31100442) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Baik
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Nadi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100438) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="2" style="border:none">Perdarahan</td>
                    <td style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100443) {!! $item->value !!} @endif @endforeach</td>
                    <td style="border:none">cc</td>
                </tr>
                <tr>
                    <td colspan="2" style="border:none">Respirasi</td>
                    <td colspan="1" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk ==31100439) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="1" style="border:none">x / menit</td>
                    <td colspan="4" style="border:none"></td>
                </tr>
                <tr style="border:1px solid #000;border-bottom:none;border-top:1px solid #000;">
                    <td colspan="6" style="border:none">Diagnosa Kebidanan : @foreach($res['d3'] as $item) @if($item->emrdfk ==31100444) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="3" style="border:none">
                        Bulukumba : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100445) {!! $item->value !!} @endif @endforeach
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        Dokter / Bidan
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="text-align:left;border:none;">
                        <div style="text-align: left">@foreach($res['d3'] as $item) @if($item->emrdfk ==31100446) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        (@foreach($res['d3'] as $item) @if($item->emrdfk ==31100446) {!! $item->value !!} @endif @endforeach)
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="border:none"></td>
                    <td colspan="3" style="border:none">
                        Tanda Tangan & Nama Jelas
                    </td>
                </tr>
            </table>
        </section>

    </body>
@endif
</html>
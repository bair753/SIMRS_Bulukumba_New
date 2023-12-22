<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesmen Awal Keperawatan IGD</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            /* font-family: DejaVu Sans, Verdana, Arial, sans-serif; */
            font-family: Arial, Helvetica, sans-serif;
        }

        body,
        html {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6pt;
            margin: 10px 20px;
        }

        @page {
            size: A4;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 3rem;
            margin-right: 1rem;
            transform: scale(72%);
        }



        .table-border {
            table-layout: fixed;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: .3rem;
            /* page-break-before: avoid; */


        }

        .table-noborder,
        tr,
        td {
            border: 0;
            border-collapse: collapse;
            padding: .3rem;


        }



        .format {
            padding: 1rem;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            padding: .5rem;
            text-align: center;
        }


        .bordered {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: .2rem;
            box-sizing: border-box;

        }

        .border-top {
            border-top: 1px solid #000;
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-left {
            border-left: 1px solid #000;
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-right {
            border-right: 1px solid #000;
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .flex {
            display: flex;
        }

        .flex .basis50 {
            flex-basis: 50%;
        }

        .col-2 {
            display: flex;
            flex-basis: 50%;
        }

        ul li:not(nth-child(1)) {
            padding: .3rem;
        }

        ul li {
            list-style: none;
        }

        .basis50 ul li:first-child {
            border-bottom: 1px solid #000;
            padding: .3rem;
        }

        /* .page-break {
            page-break-after: always;
        } */
    </style>

</head>

<body>
    <section>
        <table width="100%" class="table-border">
            <tr>
                <td rowspan="4" colspan="3" width="18%">
                    <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                </td>
                <td rowspan="4" colspan="7" style="text-align:center;font-size:10px;">
                    <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap
                    !!}<br>TELP : (0413) 81292
                </td>
                <td colspan="2" class="border-left">No. RM </td>
                <td colspan="8">: {!! $res['d'][0]->nocm !!}</td>
                <td rowspan="2" colspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr height="20px">
                <td colspan="2" class="border-left">Nama Lengkap</td>
                <td colspan="8">: {!! $res['d'][0]->namapasien !!} {!! $res['d'][0]->jeniskelamin
                    ==
                    'PEREMPUAN' ? '(P)' : '(L)' !!}</td>
            </tr>
            <tr height="20px">
                <td colspan="2" class="border-left">Tanggal Lahir</td>
                <td colspan="8">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir )) !!}</td>
                <td rowspan="2" colspan="2" style="font-size:xx-large;text-align: center;" class="border-left">07</td>
            </tr>
            <tr height="20px">
                <td colspan='2' class="border-left">NIK</td>
                <td colspan="8">: {!! $res['d'][0]->noidentitas !!}</td>
            </tr>
        </table>
        <table width="100%" class="table-border">

            <tr height="20px" class="bg-dark">
                <td colspan="22" style="font-size: x-large;">ASESMEN AWAL KEPERAWATAN IGD</td>
            </tr>
            <tr>
                <td colspan="7" class="bordered">Respon Time : @foreach($res['d'] as $item) @if($item->emrdfk == 420616) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="9" class="bordered">Tanggal / Jam Masuk : @foreach($res['d'] as $item) @if($item->emrdfk == 420617) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Datang Pukul</td>
                <td colspan="3">: @foreach($res['d'] as $item) @if($item->emrdfk == 420617) {!! $item->value !!} @endif @endforeach WITA</td>
            </tr>
            <tr class="border-bottom">
                <td colspan="4">Cara Pembayaran :</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420620) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Umum</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420621) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Asuransi</td>
                <td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 420622) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                BPJS No. : @foreach($res['d'] as $item) @if($item->emrdfk == 420623) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" class="border-left">Diperiksa Pukul</td>
                <td colspan="3">: @foreach($res['d'] as $item) @if($item->emrdfk == 420618) {!! $item->value !!} @endif @endforeach WITA</td>
            </tr>
            <tr class="border-bottom">
                <td colspan="4" class="border-bottom border-top">Jenis Kasus</td>
                <td colspan="3" class="border-left border-bottom border-top">@foreach($res['d'] as $item) @if($item->emrdfk == 420624) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bedah</td>
                <td colspan="3" class="border-bottom border-top">@foreach($res['d'] as $item) @if($item->emrdfk == 420625) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Non
                    Bedah</td>
                <td colspan="3" class="border-bottom border-top">@foreach($res['d'] as $item) @if($item->emrdfk == 420626) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Anak
                </td>
                <td colspan="9" class="border-bottom border-top">@foreach($res['d'] as $item) @if($item->emrdfk == 420627) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kebidanan/Penyakit Kandungan</td>
            </tr>
            <tr valign="middle">
                <td rowspan="3" colspan="4">Pengantar</td>
                <td colspan="2" class="border-left">Nama</td>
                <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 420628) {!! $item->value !!} @endif @endforeach </td>
                <td>(@foreach($res['d'] as $item) @if($item->emrdfk == 420630) {!! $item->value !!} @endif @endforeach)</td>
                <td class="border-left">Alamat</td>
                <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 420634) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr valign="middle">
                <td colspan="2" class="border-left">No.Tlpn/HP </td>
                <td colspan="8">: @foreach($res['d'] as $item) @if($item->emrdfk == 420632) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="8" class="border-left"></td>
            </tr>
            <tr valign="middle">
                <td colspan="3" class="border-left">Hubungan dengan pasien</td>
                <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 420633) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="8" class="border-left"></td>

            </tr>
            <tr height="35px" class="border-top">
                <td valign="middle" colspan="4" class="border-top border-bottom">Keluhan Saat ini</td>
                <td colspan="18" class="border-left border-top border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420864) {!! $item->value !!} @endif @endforeach </td>
            </tr>



            <tr height="18px" class="border-top">
                <td rowspan="25" colspan="4" valign="top">Status Fisik</td>
                <td colspan="2" class="border-left">Airway</td>
                <td>:</td>
                <td colspan="2" valign="middle">@foreach($res['d'] as $item) @if($item->emrdfk == 420635) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Normal</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420636) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Masalah</td>
                <td colspan="11">: @foreach($res['d'] as $item) @if($item->emrdfk == 420637) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="18px">
                <td colspan="2" class="border-left">Breathing</td>
                <td colspan="2">: Nafas</td>
                <td colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420638) {!! $item->value !!} @endif @endforeach x/m</td>
                <td></td>
                <td colspan="4">Pola pernafasan </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420639) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Normal</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420640) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak, </td>
                <td colspan="3">Jelaskan: @foreach($res['d'] as $item) @if($item->emrdfk == 420641) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="18px">
                <td colspan="2" class="border-left">Circulation</td>
                <td colspan="2">TD</td>
                <td colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420642) {!! $item->value !!} @endif @endforeach mmHg</td>
                <td></td>
                <td colspan="">Nadi</td>
                <td colspan="3"> @foreach($res['d'] as $item) @if($item->emrdfk == 420643) {!! $item->value !!} @endif @endforeach x/m</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420644) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Teratur</td>
                <td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 420645) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Teratur </td>
            </tr>
            <tr height="18px">
                <td colspan="2" class="border-left">Suhu</td>
                <td colspan="4">: @foreach($res['d'] as $item) @if($item->emrdfk == 420646) {!! $item->value !!} @endif @endforeach °C</td>
                <td></td>
                <td colspan="">Akral</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420647) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hangat</td>
                <td colspan="7">@foreach($res['d'] as $item) @if($item->emrdfk == 420648) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dingin</td>
            </tr>
            <tr height="18px">
                <td colspan="6" class="border-left">Pendarahan/Kehilangan Cairan :</td>
                <td></td>
                <td colspan=""></td>
                <td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 420649) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 420650) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada, Jelaskan : @foreach($res['d'] as $item) @if($item->emrdfk == 420641) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="18px">
                <td colspan="2" class="border-left">Capilary Refill :</td>
                <td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 420652) {!! $item->value !!} @endif @endforeach Detik</td>
                <td colspan="5"></td>
                <td colspan="5">SPO2, Jelaskan : @foreach($res['d'] as $item) @if($item->emrdfk == 420653) {!! $item->value !!} @endif @endforeach %</td>
                <td></td>
            </tr>
            <tr height="18px" class="border-top border-left">
                <td colspan="6" class="border-left border-top border-left">
                    <b>Dissability/Neurologi</b>

                    <table width="100%" style="table-layout:fixed">
                        <tr>
                            <td colspan="6">Kesadaran : @foreach($res['d'] as $item) @if($item->emrdfk == 420654) {!! $item->value !!} @endif @endforeach </td>
                        </tr>

                    </table>

                    <br>



                </td>
                <td colspan="6" class="border-left border-top border-left"></td>
                <td colspan="6" class="border-left border-top border-left"></td>
            </tr>
            <tr height="18px">
                <td colspan="6" class="border-left">Kesadaran : @foreach($res['d'] as $item) @if($item->emrdfk == 420654) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="6" class="border-left"></td>
                <td colspan="6" class="border-left"></td>
            </tr>
            <tr height="18px">
                <td colspan="6" class="border-left">GCS : E :@foreach($res['d'] as $item) @if($item->emrdfk == 420655) {!! $item->value !!} @endif @endforeach, 
                    V : @foreach($res['d'] as $item) @if($item->emrdfk == 420656) {!! $item->value !!} @endif @endforeach, 
                    M : @foreach($res['d'] as $item) @if($item->emrdfk == 420657) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="6" class="border-left">Exposure</td>
                <td colspan="6" class="border-left">Tanda Kehidupan</td>
            </tr>
            <tr height="18px">
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420658) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mandiri</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420659) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dibantu</td>
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420669) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Jelas</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420670) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pendarahan</td>
                <td colspan="6" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420676) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Denyut Nadi (-)</td>
            </tr>
            <tr height="18px">
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420660) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Alert</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420661) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pain</td>
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420671) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fraktur</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420672) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Normal</td>
                <td colspan="6" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420677) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Reflek Cahaya (-)</td>
            </tr>
            <tr height="18px">
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420662) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Verbal</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420663) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Non Verbal</td>
                <td colspan="3" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420673) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Hematom</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420674) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Deformitas</td>
                <td colspan="6" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420678) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach EKG
                    Asystole</td>
            </tr>


            <tr height="18px">
                <td colspan="6" class="border-left"><strong>Pupil</strong></td>
                <td colspan="6" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420675) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Luka</td>
                <td colspan="6" class="border-left">Penentuan Kematian Pukul: @foreach($res['d'] as $item) @if($item->emrdfk == 420679) {!! $item->value !!} @endif @endforeach WITA</td>
            </tr>

            <tr height="18px">
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420664) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Isokor</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420665) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Anisokor</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420666) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Midriasis</td>
                <td colspan="6" class="border-left"></td>
                <td colspan="6" class="border-left"></td>
            </tr>
            <tr>
                <td colspan="6" class="border-left">Refleks: @foreach($res['d'] as $item) @if($item->emrdfk == 420668) {!! $item->value !!} @endif @endforeach / @foreach($res['d'] as $item) @if($item->emrdfk == 420669) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="6" class="border-left"></td>
                <td colspan="6" class="border-left"></td>
            </tr>
        </table>
        <table width="100%" class="table-border">
            <tr>
                <td rowspan="7" width="18%">Bio-Psiko-Sosio-Spiritual
                </td>
                <td class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420680) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Rumah Sendiri</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420681) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Rumah Orang Tua</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420682) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kontrak</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420683) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kos</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420684) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Lainnya : @foreach($res['d'] as $item) @if($item->emrdfk == 420685) {!! $item->value !!} @endif @endforeach </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420687) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tenang</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420688) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cemas</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420689) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Marah</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420690) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Lainnya : @foreach($res['d'] as $item) @if($item->emrdfk == 420691) {!! $item->value !!} @endif @endforeach </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="border-left">Status Perkawinan</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420693) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kawin</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420694) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Belum Kawin</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" class="border-left">Nilai dan keyakinan yang mempengaruhi Kesehatan :</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420696) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420697) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 420698) {!! $item->value !!} @endif @endforeach</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="border-left">Agama</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420700) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Islam</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420701) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kristen Katolik</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420702) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kristen Protestan</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420703) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Hindu</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420704) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Budha</td>
                <td></td>
            </tr>
            <tr>
                <td class="border-left"></td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420705) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Konghucu</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420706) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kepercayaan terhadap Tuhan Yang Maha Esa</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="border-left">Menjalankan Ibadah</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420708) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Selalu</td>
                <td>@foreach($res['d'] as $item) @if($item->emrdfk == 420709) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                    Hambatan : @foreach($res['d'] as $item) @if($item->emrdfk == 420710) {!! $item->value !!} @endif @endforeach </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
        <table width="100%" class="table-border">
            <tr class="bordered">
                <td colspan="4">Ekonomi</td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420711) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PNS
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420712) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    TNI/POLRI</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420713) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Pegawai Swasta</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420714) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Wiraswasta</td>
                <td colspan="3">@foreach($res['d'] as $item) @if($item->emrdfk == 420715) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Petani/Nelayan</td>
                <td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 420716) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 420717) {!! $item->value !!} @endif @endforeach </td>
            </tr>
        </table>
        <table width="100%" class="table-border">
            <tr>
                <td rowspan="6" colspan="4" valign="top" class="border-bottom">Riwayat Kesehatan Pasien</td>
                <td colspan="18" height="35px" valign="top" class="border-left border-bottom">Riwayat Penyakit
                    Sebelumnya : @foreach($res['d'] as $item) @if($item->emrdfk == 420718) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="18" height="35px" valign="top" class="border-left border-bottom">Riwayat Penyakit Sekarang
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 420719) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" class="border-left">Anak ke : @foreach($res['d'] as $item) @if($item->emrdfk == 420720) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="4">Dari : @foreach($res['d'] as $item) @if($item->emrdfk == 420721) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="4">Meninggal : @foreach($res['d'] as $item) @if($item->emrdfk == 420722) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="6">Abortus : @foreach($res['d'] as $item) @if($item->emrdfk == 420723) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="6" class="border-left">Lahir : Ateim/Premature/Spontan/Tindakan </td>
                <td colspan="10"> : @foreach($res['d'] as $item) @if($item->emrdfk == 420725) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Oleh : @foreach($res['d'] as $item) @if($item->emrdfk == 420726) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="6" class="border-left">BB Lahir : @foreach($res['d'] as $item) @if($item->emrdfk == 420727) {!! $item->value !!} @endif @endforeach Kg</td>
                <td colspan="6">Panjang Badan Lahir : @foreach($res['d'] as $item) @if($item->emrdfk == 420728) {!! $item->value !!} @endif @endforeach cm</td>
                <td colspan="6">Lingkar Kepala : @foreach($res['d'] as $item) @if($item->emrdfk == 420729) {!! $item->value !!} @endif @endforeach cm
                </td>
            </tr>
            <tr class="border-bottom">
                <td colspan="4" class="border-left">Imunisasi: </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420731) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BCG
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420732) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach DPT
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420733) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    POLIO</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420734) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Campak</td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420735) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Hepatitis</td>
                <td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 420736) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach @foreach($res['d'] as $item) @if($item->emrdfk == 420737) {!! $item->value !!} @endif @endforeach </td>
            </tr>
        </table>
        <table width="100%" class="table-border" style="margin-top:-5px">
            <tr class="border-bottom">
                <td colspan="4" class="border-bottom">Riwayat Alergi</td>
                <td colspan="2" class="border-left border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420738) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak </td>
                <td colspan="16" class="border-bottom border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420739) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya,
                    Sebutkan : @foreach($res['d'] as $item) @if($item->emrdfk == 420740) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" class="border-bottom">Riwayat Penggunaan Obat</td>
                <td colspan="2" class="border-left border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420741) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Ada</td>
                <td colspan="16" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420742) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ada
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 420743) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr class="border-bottom">
                <td colspan="4">Asesmen Nyeri</td>
                <td colspan="4" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420744) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Nyeri</td>
                <td colspan="14" class="border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420745) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nyeri Lanjut ke RM 36</td>
            </tr>
            <tr>
                <td colspan="4" rowspan="3" class="border-bottom">Resiko Jatuh</td>
                <td colspan="14" rowspan="3" class="border-bottom border-left">
                    <h4>Penilaian / Pengkajian: </h4>
                    <p>
                    <pre>
    1. Cara Berjalan pasien (salah satu atau lebih)
       a. Tidak seimbang/sempoyongan/limbung
       b. Jalan dengan menggunakan alat bantu (kruk/tripot/kursi roda/orang lain)
    2. Menopang saat akan duduk : Tampak memegang pinggiran kursi atau meja/ 
       benda lain sebagai penopang saat akan duduk.

                        </pre>
                    </p>

                </td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420749) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420750) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420752) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420753) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr>
                <td colspan="2" class="border-left border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420755) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420756) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <!-- lembar ke dua  -->
            <tr>
                <td colspan="4" rowspan="2" class="border-bottom">Asesmen Fungsional</td>
                <td colspan="6" class="border-left">Alat Bantu : @foreach($res['d'] as $item) @if($item->emrdfk == 420759) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="6">Prothesa : @foreach($res['d'] as $item) @if($item->emrdfk == 420760) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="6">Cacat Tubuh : @foreach($res['d'] as $item) @if($item->emrdfk == 420761) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="border-left border-bottom">ADL :</td>
                <td colspan="4" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420763) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Mandiri</td>
                <td colspan="4" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420764) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Dibantu</td>
                <td colspan="8" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420765) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tergabung Penuh</td>


            </tr>
            <tr class="bordered">
                <td colspan="4" rowspan="8" class="bordered">Risiko Nutrisional</td>
                <td colspan="4" class="border-left">BB : @foreach($res['d'] as $item) @if($item->emrdfk == 420766) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="6" class="border-left">TB : @foreach($res['d'] as $item) @if($item->emrdfk == 420767) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="8" class="border-left">Lingkar Kepala : @foreach($res['d'] as $item) @if($item->emrdfk == 420768) {!! $item->value !!} @endif @endforeach
                </td>

            </tr>
            <tr style="text-align:center;height:18px" class="bordered">
                <td class="border-left">No</td>
                <td colspan="13" class="border-left">Deskripsi</td>
                <td colspan="4" class="border-left border-right">Jawaban</td>
            </tr>
            <tr class="bordered">
                <td style="text-align:center">1</td>
                <td colspan="13" class="border-left">IMT < 20,5 kg/m2 atau LILA <23,5 cm</td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420770) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-left border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420771) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr class="bordered">
                <td style="text-align:center">2</td>
                <td colspan="13" class="border-left">Berat badan berkurang dalam 3 bulan</td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420773) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-left border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420774) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr class="bordered">
                <td style="text-align:center">3</td>
                <td colspan="13" class="border-left">Asupan makan menurun dalam 1 minggu terakhir</td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420776) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-left border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420777) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr class="bordered">
                <td style="text-align:center">4</td>
                <td colspan="13" class="border-left">Menderita sakit berat, misalnya: kesadaran menurun dan terapi
                    intensif</td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420779) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-left border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420780) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Tidak</td>
            </tr>
            <tr class="bordered">
                <td style="text-align:center">5</td>
                <td colspan="13" class="border-left">Ada gangguan metabolisme (DM, Penyakit Jantung, HT, CKD, TBC
                    Keganasan)
                    Lain – lain : @foreach($res['d'] as $item) @if($item->emrdfk == 420781) {!! $item->value !!} @endif @endforeach .
                </td>
                <td colspan="2" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420782) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td colspan="2" class="border-left border-right">@foreach($res['d'] as $item) @if($item->emrdfk == 420783) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
            </tr>
            <tr class="bordered">
                <td colspan="18" class="border-top border-bottom"><strong>Jika terdapat jawaban Ya, maka dilaporkan ke dietisien untuk dilakukan skrining
                        lanjut.</strong></td>
            </tr>

            <tr>
                <td colspan="4" rowspan="3" valign="top" class="border-bottom">Kebutuhan Edukasi</td>
                <td colspan="18" class="border-left">Edukasi awal disampaikan tentang penggunaan
                    obat-obatan, penggunaan peralatan medis, potensi interaksi antara obat, diet dan nutrisi, manajemen
                    nyeri, teknik rehabilitasi, dan cuci tangan yang benar kepada :</td>
            </tr>
            <tr>
                <td colspan="5" class=" border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420785) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pasien</td>
                <td colspan="13">@foreach($res['d'] as $item) @if($item->emrdfk == 420786) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Keluarga</td>
            </tr>
            <tr>
                <td colspan="18" class="border-bottom border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420787) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    Tidak dapat memberikan edukasi kepada pasien atau keluarga,karena : @foreach($res['d'] as $item) @if($item->emrdfk == 420789) {!! $item->value !!} @endif @endforeach </td>
            </tr>

            <tr>
                <td colspan="4" rowspan="3" class="border-bottom">Perencanaan Pulang</td>
                <td colspan="4" class="border-bottom border-left">Pasien disarankan pulang: </td>
                <td colspan="5" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420791) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    Berobat Lanjut di FKTP</td>
                <td colspan="9" class="border-bottom ">@foreach($res['d'] as $item) @if($item->emrdfk == 420792) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    Poli
                    : @foreach($res['d'] as $item) @if($item->emrdfk == 420793) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" class="border-bottom border-left">Pasien Dirujuk</td>
                <td colspan="5" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420795) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    Rujuk balik ke FKTP</td>
                <td colspan="9" class="border-bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 420796) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                    RS
                </td>
            </tr>
            <tr>
                <td colspan="18" class="border-bottom border-left">Rawat inap, Bagian / Ruang : @foreach($res['d'] as $item) @if($item->emrdfk == 420799) {!! $item->value !!} @endif @endforeach </td>

            </tr>



            <tr height="90px">
                <td colspan="4" valign="top" class="border-bottom">Masalah Keperawatan</td>
                <td colspan="18" class="border-left">@foreach($res['d'] as $item) @if($item->emrdfk == 420800) {!! $item->value !!} @endif @endforeach </td>
            </tr>

            <tr>
                <td colspan="4" rowspan="4" valign="top">Kriteria Evaluasi <br>Skala Likert (1-5)</td>
                <td colspan="3" class="bordered" style="text-align:center;">1</td>
                <td colspan="4" class="bordered" style="text-align:center;">2</td>
                <td colspan="3" class="bordered" style="text-align:center;">3</td>
                <td colspan="4" class="bordered" style="text-align:center;">4</td>
                <td colspan="4" class="bordered" style="text-align:center;">5</td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420801) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Menurun
                </td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420802) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Menurun</td>
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420803) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sedang
                </td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420804) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Meningkat</td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420805) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Meningkat</td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420806) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Meningkat</td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420807) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Meningkat</td>
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420808) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sedang
                </td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420809) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Menurun</td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420810) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Menurun
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420811) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Memburuk</td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420812) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Memburuk</td>
                <td colspan="3" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420813) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sedang
                </td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420814) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cukup
                    Membaik</td>
                <td colspan="4" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420815) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Membaik
                </td>
            </tr>
            <tr>
                <td colspan="4" class="bordered" valign="top" rowspan="16">Implementasi/<br>Tindakan Kolaborasi</td>
                <td colspan="2" class="bordered" style="text-align: center;">Tgl/Pukul</td>
                <td colspan="11" class="bordered" style="text-align: center;">Implementas Keperewatan/Tindakan
                    Kolaborasi</td>
                <td colspan="5" class="bordered" style="text-align: center;">Nama dan Tanda Tangan</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420816) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420817) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420818) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420819) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420820) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420821) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420822) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420823) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420824) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420825) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420826) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420827) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420828) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420829) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420830) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420831) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420832) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420833) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420834) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420835) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420836) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420837) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420838) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420839) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420840) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420841) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420842) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420843) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420844) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420845) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420846) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420847) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420848) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420849) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420850) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420851) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420852) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420853) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420854) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420855) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420856) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420857) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420858) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="11" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420859) {!! $item->value !!} @endif @endforeach</td>
                <td colspan="5" class="bordered">@foreach($res['d'] as $item) @if($item->emrdfk == 420860) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="11">Bulukumba: @foreach($res['d'] as $item) @if($item->emrdfk == 420861) {!! $item->value !!} @endif @endforeach WITA</td>
                <td colspan="11" class=" border-left">Tanda Tangan</td>
            </tr>
            <tr>
                <td colspan="11" valign="top">Perawat Penanggung Jawab
                    Asuhan : @foreach($res['d'] as $item) @if($item->emrdfk == 420862) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="11" class=" border-left">
                    <div style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 420862) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
        </table>
    </section>

</body>

</html>
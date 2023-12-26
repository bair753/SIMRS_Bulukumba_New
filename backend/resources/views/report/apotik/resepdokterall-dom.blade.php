<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Resep Elektronik
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">

        html {
            margin: 40px 50px
        }

        table {
            font-size: x-small;
            border-collapse: collapse;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        thead tr td {
            font-size: x-small;
        }

        tbody tr td {
            font-size: 10px;
            text-align: left;
        }

        .tabledetail tr {
            border: 1px solid black;
            border-collapse: collapse;

        }

        .tabledetail td {
            border: 1px solid black;
            border-collapse: collapse;

        }

        .gray {
            background-color: lightgray
        }

        /* .format{
            page-break-after: always;
        }

        .format2{
            page-break-after: avoid;
        } */
    </style>
</head>


<?php date_default_timezone_set('Asia/Makassar'); ?>
@foreach ($data['depo'] as $depo)
    <body>
        <div class="format">
            <table width="100%">
                <tbody>
                    <tr>

                        <td width="16%">
                            <p align="left">
                                <img src="{{ $image }}" width="60px" height="70px" />
                            </p>
                        </td>
                        <td width="82%">
                            <center>

                                <h2> <b>{{ $profile[0]->namapemerintahan }} </b></h2>
                                <h2>{{ $profile[0]->namalengkap }}</h2>
                                {{ $profile[0]->alamatlengkap }}
                                <br>
                                Telp.
                                {{ $profile[0]->fixedphone }}
                                Fax.
                                {{ $profile[0]->faksimile }}
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <center>
                <h2> <u>RESEP</u></h2>
            </center>
            <table width="100%">
                <tbody valign="top">
                    <tr>
                        <td width="15%">
                            No. Rekam Medik
                        </td>
                        <td>
                            :
                        </td>
                        <td height="5" width="30%" t>
                            {{ $depo['nocm'] }}
                        </td>
                        <td height="5" width="16%">
                            Tanggal / Jam
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ date('d-m-Y H:i', strtotime($depo['tglorder'])) }}
                        </td>
                        <td rowspan="7" height="5">

                            <div id="qrcodeDPJP" style="text-align: center">
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td height="5" width="15%">
                            Nama Pasien
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="30%">
                            {{ $depo['namapasien'] }}
                        </td>
                        <td height="5" width="16%">
                            Nama Dokter
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $depo['namalengkap'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Tanggal Lahir
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="30%">
                            {{ $depo['tgllahir'] }}
                        </td>
                        <td height="5" width="16%">
                            Nomor Izin Praktek
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $depo['nosip'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Jenis Kelamin
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">
                            {{ $depo['jeniskelamin'] }}
                        </td>
                        <td height="5" width="16%">
                            Status Dokter*
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            DPJP / Konsulen / TIM
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Tinggi Badan**
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">

                            - cm

                        </td>
                        <td height="5" width="16%">
                            Perawatan / Poli
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $depo['namaruangan'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Berat Badan**
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">

                            - kg
                        </td>
                        <td height="5" width="16%">
                            Riwayat Alergi
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{-- <input type="checkbox" name="sebutkan" id="showcek" checked> YA, Sebutkan --}}

                            {{ $depo['isi']->riwayatalergi }}

                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Alamat
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">

                            {{ $depo['alamatlengkap'] }}

                        </td>
                        <td height="5" width="16%">

                        </td>
                        <td height="5">

                        </td>
                        {{-- <td height="5">
                                <input type="checkbox" name="sebutkan" id="showcek" checked> YA, Sebutkan
                                <textarea name="" id="textcek" cols="30" rows="2"></textarea>
                            </td> --}}
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            <br>
                            <i>*pilih salah satu</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i>**pasien anak dan</i>
                        </td>
                        <td height="5">

                        </td>
                        <td height="5" width="10%">
                            <i>pasien yang membutuhkan perhitungan
                                dosis</i>
                        </td>
                        <td height="5" width="16%">
                            individual
                        </td>
                    </tr>

                </tbody>
            </table>

            <table width="100%">
                <thead>
                    <tr>
                        <td height="5">
                            <b>R/Ke
                        </td>
                        <td height="5">
                            <b>Nama Perbekalan Farmasi
                        </td>
                        <td height="5">
                            <b>Dosis
                        </td>
                        <td height="5">
                            <b>Jumlah
                        </td>
                        <td height="5">
                            <b>Rute
                        </td>
                        <td height="5">
                            <b>Aturan Pakai
                        </td>
                        <td height="5">
                            <b>Keterangan
                        </td>
                        <td height="5">
                            <b>Paraf
                        </td>
                    </tr>
                </thead>
                <tbody valign="top">
                    <?php foreach ($depo['details'] as $d) { ?>
                    <tr>
                        <td height="5">
                            <?= $d->rke ?>
                        </td>
                        <td height="5">
                            <?= $d->namaproduk ?>
                        </td>
                        <td height="5">
                            -
                        </td>
                        <td height="5">
                            <?= $d->jumlah ?>
                        </td>
                        <td height="5">

                        </td>
                        <td height="5">
                            <?= $d->aturanpakai ?>
                        </td>
                        <td height="5">
                            -
                        </td>
                        <td height="5">

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tbody valign="top">
                    <tr>
                        <td style="text-align: center" colspan="8" height="5">
                            <font size="2" style="font-weight:bold;" >--- Diisi
                                Farmasi ---

                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="8" height="5">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center; padding-bottom:3px;">
                            Tahap I : Pengkajian & Klarifikasi

                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                            Tahap II : Penyiapan Obat
                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                            Tahap III : Dispening
                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt;border-right:solid 1.0pt; text-align:center;">
                            Tahap VI : Serah & Informasi
                        </td>
                    </tr>
                    <tr style="text-align:center;">
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">

                            <font size="1" size="1">Jam :
                                {{ $depo['isi']->jampengkajian != null ? date('H:i', strtotime(
                                    $depo['isi']->jampengkajian)) : '-' }}

                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">
                            <font size="1" size="1">Petugas :
                                {{ $depo['isi']->petugaspengkajian }}
                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">

                            <font size="1" size="1">Jam :
                                {{ $depo['isi']->jampenyiapanobat != null ? date('H:i', strtotime(
                                    $depo['isi']->jampenyiapanobat)) : '-' }}

                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">

                            <font size="1" size="1">Petugas :
                                {{ $depo['isi']->penyiapanobat }}
                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">

                            <font size="1" size="1">Jam :
                                {{ $depo['isi']->jamdispening != null ? date('H:i', strtotime( $depo['isi']->jamdispening))
                                    : '-' }}

                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">
                            <font size="1" size="1">Petugas : {{ $depo['isi']->dispening }}

                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">

                            <font size="1" size="1">Jam :
                                {{ $depo['isi']->jamserah != null ? date('H:i', strtotime( $depo['isi']->jamserah)) : '-' }}

                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1" size="1">Petugas :
                                {{ $depo['isi']->serahinformasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table c width="100%" align="center" style="border: solid 1.0pt">
                <tbody valign="top">
                    <tr>
                        <td height="5"
                            style="padding-left:3pt; padding-bottom:3pt; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>PENGKAJIAN RESEP:</font>
                        </td>
                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>YA</font>
                        </td>
                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>TIDAK</font>
                        </td>
                        <td height="5"
                            style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt; border-bottom:solid 1.0pt;">
                            <font size="1"><b>KLARIFIKASI & KONFIRMASI (SBAR)</font>
                        </td>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-bottom:solid 1.0pt;">
                            <font size="1"><b>PENERIMA OBAT</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">1. Benar Dan Jelas Penulisan Resep</font>
                        </td>
                        @if ($depo['isi']->penulisanresep == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"><i>(Situation, Background, Assesment,
                                    Recommendation)</i></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">2. Benar Obat</font>
                        </td>
                        @if ($depo['isi']->obat == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">3. Benar Dosis</font>
                        </td>
                        @if ($depo['isi']->dosis == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Tanggal :
                                {{ date('d-m-Y', strtotime($depo['tglorder'])) }}
                            </font>
                        </td>
                        <td height="5" style="padding-left:3pt; ">
                            <font size="1">Tanggal : {!! date('d-m-Y') !!}</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">4. Benar Waktu Dan Frekuensi</font>
                        </td>
                        @if ($depo['isi']->waktufrekuensi == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif

                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Jam :
                                {{ date('H:i', strtotime($depo['tglorder'])) }}</font>
                        </td>
                        <td height="5" style="padding-left:3pt; ">
                            <font size="1">Jam : {!! date('H:i') !!}</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">5. Benar Rute</font>
                        </td>
                        @if ($depo['isi']->rute == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif

                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">6. Benar Pasien</font>
                        </td>
                        @if ($depo['isi']->pasien == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif

                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Petugas Farmasi : </font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">7. Tidak Ada Duplikasi Terapi</font>
                        </td>
                        @if ($depo['isi']->duplikasiterapi == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">8. Tidak Ada Interaksi Obat</font>
                        </td>
                        @if ($depo['isi']->interaksiobat == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif

                        <td height="5" style="padding-left:3pt; text-align:center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; text-align:center;">
                            <font size="1"></font>
                        </td>

                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5"
                            style="padding-left:3pt; text-align:center; border-right:solid 1.0pt;padding-bottom:5pt;">
                            <font size="1">
                                <u>({{ $depo['isi']->farmasi == NULL ? '________________' : $depo['isi']->farmasi }})</u>
                            </font>
                        </td>
                        <td height="5" style="padding-left:3pt; text-align:center;">
                            <font size="1"><u>({{ $depo['namapasien'] }})</u></font>
                        </td>

                    </tr>
                </tbody>
            </table>
            <!--end-->
        </div>
    </body>
@endforeach
@foreach ($data['dokter'] as $dokter)
    <body>
        <div class="format2">
            <table width="100%">
                <tbody>
                    <tr>
        
                        <td width="16%">
                            <p align="left">
                                <img src="{{ $image }}" width="60px" height="70px" />
                            </p>
                        </td>
                        <td width="82%">
                            <center>
        
                                <h2> <b>{{ $profile[0]->namapemerintahan }} </b></h2>
                                <h2>{{ $profile[0]->namalengkap }}</h2>
                                {{ $profile[0]->alamatlengkap }}
                                <br>
                                Telp.
                                {{ $profile[0]->fixedphone }}
                                Fax.
                                {{ $profile[0]->faksimile }}
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <center>
                <h2> <u>RESEP</u></h2>
            </center>
            <table width="100%">
                <tbody valign="top">
                    <tr>
                        <td width="15%">
                            No. Rekam Medik
                        </td>
                        <td>
                            :
                        </td>
                        <td height="5" width="30%" t>
                            {{ $dokter['nocm'] }}
                        </td>
                        <td height="5" width="16%">
                            Tanggal / Jam
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ date('d-m-Y H:i', strtotime($dokter['tglorder'])) }}
                        </td>
                        <td rowspan="7" height="5">
        
                            <div id="qrcodeDPJP" style="text-align: center">
                            </div>
        
                        </td>
                    </tr>
        
                    <tr>
                        <td height="5" width="15%">
                            Nama Pasien
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="30%">
                            {{ $dokter['namapasien'] }}
                        </td>
                        <td height="5" width="16%">
                            Nama Dokter
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $dokter['namalengkap'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Tanggal Lahir
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="30%">
                            {{ date('d-m-Y', strtotime($dokter['tgllahir'])) }}
                        </td>
                        <td height="5" width="16%">
                            Nomor Izin Praktek
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $dokter['nosip'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Jenis Kelamin
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">
                            {{ $dokter['jeniskelamin'] }}
                        </td>
                        <td height="5" width="16%">
                            Status Dokter*
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            DPJP / Konsulen / TIM
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Tinggi Badan**
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">
        
                            - cm
        
                        </td>
                        <td height="5" width="16%">
                            Perawatan / Poli
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{ $dokter['namaruangan'] }}
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Berat Badan**
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">
        
                            - kg
                        </td>
                        <td height="5" width="16%">
                            Riwayat Alergi
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5">
                            {{-- <input type="checkbox" name="sebutkan" id="showcek" checked> YA, Sebutkan --}}
        
                            {{ $dokter['isi']->riwayatalergi }}
        
                        </td>
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            Alamat
                        </td>
                        <td height="5">
                            :
                        </td>
                        <td height="5" width="10%">
        
                            {{ $dokter['alamatlengkap'] }}
        
                        </td>
                        <td height="5" width="16%">
        
                        </td>
                        <td height="5">
        
                        </td>
                        {{-- <td height="5">
                                    <input type="checkbox" name="sebutkan" id="showcek" checked> YA, Sebutkan
                                    <textarea name="" id="textcek" cols="30" rows="2"></textarea>
                                </td> --}}
                    </tr>
                    <tr>
                        <td height="5" width="15%">
                            <br>
                            <i>*pilih salah satu</i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i>**pasien anak dan</i>
                        </td>
                        <td height="5">
        
                        </td>
                        <td height="5" width="10%">
                            <i>pasien yang membutuhkan perhitungan
                                dosis</i>
                        </td>
                        <td height="5" width="16%">
                            individual
                        </td>
                    </tr>
        
                </tbody>
            </table>
        
            <table width="100%">
                <thead>
                    <tr>
                        <td height="5">
                            <b>R/Ke
                        </td>
                        <td height="5">
                            <b>Nama Perbekalan Farmasi
                        </td>
                        <td height="5">
                            <b>Dosis
                        </td>
                        <td height="5">
                            <b>Jumlah
                        </td>
                        <td height="5">
                            <b>Rute
                        </td>
                        <td height="5">
                            <b>Aturan Pakai
                        </td>
                        <td height="5">
                            <b>Keterangan
                        </td>
                        <td height="5">
                            <b>Paraf
                        </td>
                    </tr>
                </thead>
                <tbody valign="top">
                    <?php foreach ($dokter['details'] as $d) { ?>
                    <tr>
                        <td height="5">
                            <?= $d->rke ?>
                        </td>
                        <td height="5">
                            <?= $d->namaproduk ?>
                        </td>
                        <td height="5">
                            -
                        </td>
                        <td height="5">
                            <?= $d->jumlah ?>
                        </td>
                        <td height="5">
        
                        </td>
                        <td height="5">
                            <?= $d->aturanpakai ?>
                        </td>
                        <td height="5">
                            -
                        </td>
                        <td height="5">
        
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tbody valign="top">
                    <tr>
                        <td style="text-align: center" colspan="8" height="5">
                            <font size="2" style="font-weight:bold;" >--- Diisi
                                Farmasi ---
        
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="8" height="5">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center; padding-bottom:3px;">
                            Tahap I : Pengkajian & Klarifikasi
        
                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                            Tahap II : Penyiapan Obat
                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                            Tahap III : Dispening
                        </td>
                        <td colspan="2" height="5" width="25%"
                            style="border-left:solid 1.0pt; border-top:solid 1.0pt;border-right:solid 1.0pt; text-align:center;">
                            Tahap VI : Serah & Informasi
                        </td>
                    </tr>
                    <tr style="text-align:center;">
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
        
                            <font size="1" size="1">Jam :
                                {{ $dokter['isi']->jampengkajian != null ? date('H:i', strtotime(
                                        $dokter['isi']->jampengkajian)) : '-' }}
        
                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">
                            <font size="1" size="1">Petugas :
                                {{ $dokter['isi']->petugaspengkajian }}
                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
        
                            <font size="1" size="1">Jam :
                                {{ $dokter['isi']->jampenyiapanobat != null ? date('H:i', strtotime(
                                        $dokter['isi']->jampenyiapanobat)) : '-' }}
        
                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">
        
                            <font size="1" size="1">Petugas :
                                {{ $dokter['isi']->penyiapanobat }}
                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
        
                            <font size="1" size="1">Jam :
                                {{ $dokter['isi']->jamdispening != null ? date('H:i', strtotime( $dokter['isi']->jamdispening))
                                        : '-' }}
        
                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt;">
                            <font size="1" size="1">Petugas : {{ $dokter['isi']->dispening }}
        
                        </td>
                        <td height="10" style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
        
                            <font size="1" size="1">Jam :
                                {{ $dokter['isi']->jamserah != null ? date('H:i', strtotime( $dokter['isi']->jamserah)) : '-' }}
        
                        </td>
                        <td height="10" style="border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1" size="1">Petugas :
                                {{ $dokter['isi']->serahinformasi }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table c width="100%" align="center" style="border: solid 1.0pt">
                <tbody valign="top">
                    <tr>
                        <td height="5"
                            style="padding-left:3pt; padding-bottom:3pt; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>PENGKAJIAN RESEP:</font>
                        </td>
                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>YA</font>
                        </td>
                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                            <font size="1"><b>TIDAK</font>
                        </td>
                        <td height="5"
                            style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt; border-bottom:solid 1.0pt;">
                            <font size="1"><b>KLARIFIKASI & KONFIRMASI (SBAR)</font>
                        </td>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-bottom:solid 1.0pt;">
                            <font size="1"><b>PENERIMA OBAT</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">1. Benar Dan Jelas Penulisan Resep</font>
                        </td>
                        @if ($dokter['isi']->penulisanresep == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"><i>(Situation, Background, Assesment,
                                    Recommendation)</i></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">2. Benar Obat</font>
                        </td>
                        @if ($dokter['isi']->obat == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">3. Benar Dosis</font>
                        </td>
                        @if ($dokter['isi']->dosis == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Tanggal :
                                {{ date('d-m-Y', strtotime($dokter['tglorder'])) }}
                            </font>
                        </td>
                        <td height="5" style="padding-left:3pt; ">
                            <font size="1">Tanggal : {!! date('d-m-Y') !!}</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">4. Benar Waktu Dan Frekuensi</font>
                        </td>
                        @if ($dokter['isi']->waktufrekuensi == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
        
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Jam :
                                {{ date('H:i', strtotime($dokter['tglorder'])) }}</font>
                        </td>
                        <td height="5" style="padding-left:3pt; ">
                            <font size="1">Jam : {!! date('H:i') !!}</font>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">5. Benar Rute</font>
                        </td>
                        @if ($dokter['isi']->rute == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
        
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">6. Benar Pasien</font>
                        </td>
                        @if ($dokter['isi']->pasien == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
        
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1">Petugas Farmasi : </font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">7. Tidak Ada Duplikasi Terapi</font>
                        </td>
                        @if ($dokter['isi']->duplikasiterapi == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; "></td>
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1">8. Tidak Ada Interaksi Obat</font>
                        </td>
                        @if ($dokter['isi']->interaksiobat == 't')
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        @else
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"><input type="checkbox" name="" id="">
                            </font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <img src="{{ $centang}}" width="10px" height="10px" />
                        </td>
                        @endif
        
                        <td height="5" style="padding-left:3pt; text-align:center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="padding-left:3pt; text-align:center;">
                            <font size="1"></font>
                        </td>
        
                    </tr>
                    <tr>
                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                            <font size="1"></font>
                        </td>
                        <td height="5"
                            style="padding-left:3pt; text-align:center; border-right:solid 1.0pt;padding-bottom:5pt;">
                            <font size="1">
                                <u>({{ $dokter['isi']->farmasi == NULL ? '________________' : $dokter['isi']->farmasi }})</u>
                            </font>
                        </td>
                        <td height="5" style="padding-left:3pt; text-align:center;">
                            <font size="1"><u>({{ $dokter['namapasien'] }})</u></font>
                        </td>
        
                    </tr>
                </tbody>
            </table>
            <!--end-->
        </div>
        
    </body>
@endforeach

</html>
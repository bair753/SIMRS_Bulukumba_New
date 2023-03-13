<html>

<head>
    <title>
        Report
    </title>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
    @if (stripos(\Request::url(), 'localhost') !== false)
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else
        <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}">
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
</head>
<style type="text/css" media="print">
    @media print {
        @page {
            size: 21cm 29.7cm;
            margin: 0;
            /* size: portrait; */
        }
    }
</style>
<style>
    tr td {
        /*padding:2px 4px 2px 4px;*/
    }

    .borderss {
        border-bottom: 1px solid black;
    }

    body {
        font-family: Tahoma, Geneva, sans-serif;
    }
</style>

<body style="background-color: #CCCCCC">
    <?php date_default_timezone_set('Asia/Makassar');?>
    <div align="center">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{ $pageWidth }}">
            <tbody>
                <tr>
                    <td style="padding: 30px 0px">
                        <div align="center">
                            <p align="right">
                            <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" height="133" border="0"
                                width="80%" align="center" style="text-align: center">
                                <tbody>
                                    <tr>
                                        <td style="text-align:left">
                                            <div align="center">
                                                <table cellspacing="0" cellpadding="0" height="74" border="0"
                                                    width="850">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top"></td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top">
                                                                <table cellspacing="0" cellpadding="0" border="0"
                                                                    width="80%" align="center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="105">
                                                                                <p align="left">
                                                                                    <img src="{{ asset('img/logo_t.png') }}"
                                                                                        style="width: 80px"
                                                                                        border="0" />
                                                                                </p>
                                                                            </td>
                                                                            <td align="center">
                                                                                <div style="margin-left: 0px">
                                                                                    <b>
                                                                                        <font size="4"
                                                                                            color="#000000">
                                                                                            {{ $profile[0]->namapemerintahan }}
                                                                                        </font>
                                                                                        <br>
                                                                                    </b>
                                                                                    <font size="4"
                                                                                        color="#000000">
                                                                                        {{ $profile[0]->namalengkap }}
                                                                                    </font>
                                                                                    <br>
                                                                                    <font size="2"color="#000000">
                                                                                        {{ $profile[0]->alamatlengkap }}
                                                                                        <br>
                                                                                        Telp.
                                                                                        {{ $profile[0]->fixedphone }}
                                                                                        Fax.
                                                                                        {{ $profile[0]->faksimile }}
                                                                                        <font size="1">
                                                                                            <br><br>
                                                                                            <b>
                                                                                                <font size="5"
                                                                                                    color="#000000">
                                                                                                    <u>RESEP</u></font>
                                                                                                <br>
                                                                                            </b>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="105">&nbsp;</td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    <tr>
                                        <td bordercolor="#808080" height="13">
                                            <table cellspacing="0" cellpadding="0" border="0" width="80%"
                                                align="center">
                                                <tbody valign="top">
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">No. Rekam Medik</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="30%">
                                                            <font size="1">{{ $raw->nocm }}</font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Tanggal / Jam</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">{{ $raw->tglorder }} </font>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Nama Pasien</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="30%">
                                                            <font size="1">{{ $raw->namapasien }}</font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Nama Dokter</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">{{ $raw->namalengkap }} </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Tanggal Lahir</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="30%">
                                                            <font size="1">{{ $raw->tgllahir }}
                                                                ({{ $raw->umur }})</font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Nomor Izin Praktek</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">{{ $raw->nosip }} </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Jenis Kelamin</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="10%">
                                                            <font size="1">{{ $raw->jeniskelamin }}</font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Status Dokter*</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">DPJP / Konsulen / TIM</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Tinggi Badan**</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="10%">
                                                            <font size="1">
                                                                {{ $tinggibadan == null ? '-' : $tinggibadan }} cm
                                                            </font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Perawatan / Poli</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">{{ $raw->namaruangan }} </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Berat Badan**</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="10%">
                                                            <font size="1">
                                                                {{ $beratbadan == null ? '-' : $beratbadan }} kg</font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1">Riwayat Alergi</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><input type="checkbox" name="" id=""> Tidak</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <font size="1">Alamat</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1">:</font>
                                                        </td>
                                                        <td height="5" width="10%">
                                                            <font size="1">
                                                                {{ $alamatpasien == null ? '-' : $alamatpasien }}
                                                            </font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1"></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><input type="checkbox" name="sebutkan" id="showcek" checked> YA, Sebutkan</font>
                                                            <textarea name="" id="textcek" cols="30" rows="2"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" width="15%">
                                                            <br>
                                                            <font size="1"><i>*pilih salah satu</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font size="1"><i>**pasien anak dan</i></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"></font>
                                                        </td>
                                                        <td height="5" width="10%">
                                                            <font size="1"><i>pasien yang membutuhkan perhitungan
                                                                    dosis</i></font>
                                                        </td>
                                                        <td height="5" width="16%">
                                                            <font size="1"> individual</font>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#808080" height="13">
                                            <table cellspacing="0" cellpadding="0" border="0" width="80%"
                                                align="center">
                                                <tbody valign="top">
                                                    <tr>
                                                        <td height="5">
                                                            <font size="1"><b>R/Ke</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Nama Perbekalan Farmasi</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Dosis</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Jumlah</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Rute</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Aturan Pakai</font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><b>Paraf</font>
                                                        </td>
                                                    </tr>
                                                    <?php foreach ($details as $d){ ?>
                                                    <tr>
                                                        <td height="5">
                                                            <font size="1"><?= $d->rke ?></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><?= $d->namaproduk ?></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><?= $d->kekuatan ?></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><?= $d->jumlah ?></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"></font>
                                                        </td>
                                                        <td height="5">
                                                            <font size="1"><?= $d->aturanpakai ?></font>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#808080" height="5">
                                            <table cellspacing="0" cellpadding="0" border="0" width="80%"
                                                align="center">
                                                <tbody valign="top">
                                                    <tr>
                                                        <td align="center" colspan="8" height="5">
                                                            <font size="2" style="font-weight:bold;">--- Diisi
                                                                Farmasi ---</font>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" colspan="8" height="5">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" height="5" width="25%"
                                                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center; padding-bottom:3px;">
                                                            <font size="1">Tahap I : Pengkajian & Klarifikasi
                                                            </font>
                                                        </td>
                                                        <td colspan="2" height="5" width="25%"
                                                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                                                            <font size="1">Tahap II : Penyiapan Obat</font>
                                                        </td>
                                                        <td colspan="2" height="5" width="25%"
                                                            style="border-left:solid 1.0pt; border-top:solid 1.0pt; text-align:center;">
                                                            <font size="1">Tahap III : Dispening</font>
                                                        </td>
                                                        <td colspan="2" height="5" width="25%"
                                                            style="border-left:solid 1.0pt; border-top:solid 1.0pt;border-right:solid 1.0pt; text-align:center;">
                                                            <font size="1">Tahap VI : Serah & Informasi</font>
                                                        </td>
                                                    </tr>
                                                    <tr style="text-align:center;">
                                                        <td height="10"
                                                            style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Jam ......</font>
                                                        </td>
                                                        <td height="10" style="border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Petugas ......</font>
                                                        </td>
                                                        <td height="10"
                                                            style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Jam ......</font>
                                                        </td>
                                                        <td height="10" style="border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Petugas ......</font>
                                                        </td>
                                                        <td height="10"
                                                            style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Jam ......</font>
                                                        </td>
                                                        <td height="10" style="border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Petugas ......</font>
                                                        </td>
                                                        <td height="10"
                                                            style="border-left:solid 1.0pt; border-bottom:solid 1.0pt;">
                                                            <font size="1" size="1">Jam ......</font>
                                                        </td>
                                                        <td height="10"
                                                            style="border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                                                            <font size="1" size="1">Petugas ......</font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#808080" height="13">
                                            <table cellspacing="0" cellpadding="0" width="80%"
                                                align="center" style="border: solid 1.0pt">
                                                <tbody valign="top">
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                                                            <font size="1"><b>PENGKAJIAN RESEP:</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                                                            <font size="1"><b>YA</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-bottom:solid 1.0pt; border-right:solid 1.0pt;">
                                                            <font size="1"><b>TIDAK</font>
                                                        </td>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt; border-bottom:solid 1.0pt;">
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
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1"><i>(Situation, Background, Assesment, Recommendation)</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">2. Benar Obat</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1"></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">3. Benar Dosis</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1">Tanggal : {{ date('d-m-Y', strtotime($raw->tglorder)) }}</font>
                                                        </td>
                                                        <td height="5" style="padding-left:3pt; ">
                                                            <font size="1">Tanggal : {!! date('d-m-Y') !!}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">4. Benar Waktu Dan Frekuensi</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1">Jam : {{ date('H:i', strtotime($raw->tglorder)) }}</font>
                                                        </td>
                                                        <td height="5" style="padding-left:3pt; ">
                                                            <font size="1">Jam : {!! date('H:i') !!}</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">5. Benar Rute</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1"></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">6. Benar Pasien</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1">Petugas Farmasi : </font>
                                                        </td>
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">7. Tidak Ada Duplikasi Terapi</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="border-right:solid 1.0pt; padding-left:3pt; ">
                                                            <font size="1"></font>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td height="5" style="padding-left:3pt; padding-bottom:3pt; border-right:solid 1.0pt;">
                                                            <font size="1">8. Tidak Ada Interaksi Obat</font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
                                                        <td height="5" style="text-align: center; border-right:solid 1.0pt;">
                                                            <font size="1"><input type="checkbox" name="" id=""></font>
                                                        </td>
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
                                                        <td height="5" style="padding-left:3pt; text-align:center; border-right:solid 1.0pt;padding-bottom:5pt;">
                                                            <font size="1"><u>({{ $r->user }})</u></font>
                                                        </td>
                                                        <td height="5" style="padding-left:3pt; text-align:center;">
                                                            <font size="1"><u>({{ $raw->namapasien }})</u></font>
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><br>
                                        </td>
                                    </tr>
                                    {{-- <script>
                                        $(document).ready(function() {
                                            window.print();
                                        });
                                    </script> --}}
                                    <script>
                                        const showcek = document.querySelector("#showcek");
                                        const textcek = document.querySelector("#textcek");
                                        showcek.addEventListener("change",(event)=>{
                                        textcek.style.display = "none";
                                            if(event.target.checked){
                                            textcek.style.display = "block";
                                            }
                                        });
                                    </script>
</body>

</html>

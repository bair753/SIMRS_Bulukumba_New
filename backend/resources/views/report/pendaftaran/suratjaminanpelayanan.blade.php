<html>

<head>
    <title>
        Surat Jaminan Pelayanan
    </title>
    @if(stripos(\Request::url(), 'localhost') !== FALSE)
    <link rel="stylesheet" href="{{ asset('css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('service/css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('service/css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('service/css/tabel.css') }}">
    <link rel="stylesheet" href="{{ asset('service/css/style.css') }}">
    @endif
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
</head>
<style type="text/css" media="print">
    @media print {
        @page {
            size: auto;
            margin: 0;
            /* size: portrait; */
        }

        footer {
            display: none
        }

        header {
            display: none
        }

        body {
            -webkit-print-color-adjust: exact !important;
        }
    }
</style>
<style>
    tr td {
        padding: 2px 4px 2px 4px;
    }

    .borderss {
        border-bottom: 1px solid black;
    }

    .baris1 {
        border: 2px solid #000000;
    }

    .baris2 {
        border: 1px solid #000000;
    }

    .garishalus {
        border: 0.01em solid #9a9a9a;
    }

    .garishalus tr td {
        border: 0.01em solid #9a9a9a;
        /* border: thin solid #9a9a9a; */
    }

    body {
        font-family: Tahoma, Geneva, sans-serif;
    }

    @page {
        size: A4
    }

    .garis6 td {
        padding: 3px !important;
    }
</style>

<body style="background-color: #CCCCCC;margin: 0" >
    <div align="center">
        <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}" style="padding:15px">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <p align="left" style="font-size: 11pt;font-weight:600;letter-spacing: 4px;" color="#000000">
                                        RSUD H. A. SULTHAN DG RADJA<br />
                                        BULUKUMBA
                                    </p>
                                </td>
                                <td align="center">
                                    <p align="center" style="font-size: 11pt;font-weight:600;letter-spacing: 4px;" color="#000000">
                                        <br /><br /><br /><br />
                                    </p>
                                </td>
                                <td>
                                    <p align="center" style="font-size: 11pt;font-weight:600;letter-spacing: 4px;border-width:2px; border-style:solid; border-color:black; padding: 1em;" color="#000000">
                                        {{ $datas->instalasi }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="3">
                                    <p align="center" style="font-size: 13pt;font-weight:600;letter-spacing: 4px;margin-top: -15px;" color="#000000">
                                        <br />{{ $datas->jenis }} <br />
                                        Surat Jaminan Pelayanan
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Nomor</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ $datas->noregistrasi }}</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">No.RM</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ $datas->nocm }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Perawatan/Poli</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ $datas->namaruangan }}</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Nama Peserta</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ $datas->namapasien }}</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">Tgl Masuk</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ date_format(date_create($datas->tglregistrasi),"d/m/Y H:i:s") }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Alamat</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: {{ $datas->alamatlengkap }}</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">Tgl Masuk</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">: &nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Diagnosa Penyakit</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: &nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <font style="font-size: 11pt;" color="#000000">Prosedur/Tindakan</font>
                                </td>
                                <td width="45%">
                                    <font style="font-size: 11pt;" color="#000000">: &nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                                <td width="15%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                                <td width="35%">
                                    <font style="font-size: 11pt;" color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>Penerima Pelayanan</b></font>
                                </td>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>Pemberi Pelayanan</b></font>
                                </td>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>Pemberi Jaminan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    <div style="text-align: center" id="qrPasien"></div>
                                </td>
                                <td style="text-align: center">
                                    <div style="text-align: center" id="qrDokter"></div>
                                </td>
                                <td style="text-align: center">
                                    <div style="text-align: center" id="qrPemberi"></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>{{ $datas->namapasien }}</b></font>
                                </td>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>{{ $datas->dokter }}</b></font>
                                </td>
                                <td style="text-align: center">
                                    <font style="font-size: 11pt;" color="#000000"><b>RSUD H.A. Sulthan DG Radja</b></font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</body>
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    $(function () {
        'use strict';
        $('#qrPasien').qrcode({
            text: APP_URL + '/service/medifirst2000/report/cetak-suratjaminanpelayanan?noregistrasi=' + {{ $datas->noregistrasi }} ,
            height: 75,
            width: 75
        });
        $('#qrDokter').qrcode({
            text: APP_URL + '/service/medifirst2000/report/cetak-pegawai?reg=' + {{ $datas->objectpegawaifk }} ,
            height: 75,
            width: 75
        });
        $('#qrPemberi').qrcode({
            text: APP_URL + '/service/medifirst2000/report/cetak-suratjaminanpelayanan?noregistrasi=' + {{ $datas->noregistrasi }} ,
            height: 75,
            width: 75
        });
    })
</script>
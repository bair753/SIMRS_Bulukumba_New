<html>

<head>
    <title>
        Hasil Laboratorium
    </title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
    @if(stripos(\Request::url(), 'localhost') !== FALSE)
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
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
    <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
    <script type="text/javascript" src=".{{ asset('js/qrcode/src/qrcode.js') }}"></script>
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
            size: A4;
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
    .break {
        page-break-after: always;
    }

    tr td {
        padding: 1px 5px 1px 2px;
    }

    .borderss {
        border-bottom: 1px solid black;
    }

    body {
        font-family: Tahoma, Geneva, sans-serif;
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

    @page {
        size: A4
    }

    .garis6 td {
        padding: 3px !important;
    }
</style>
@php
$d = App\Http\Controllers\Report\ReportController::getProfile();
@endphp

<body>
    @if (!empty($res['d0']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d0'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->pengorder }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d0'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d0'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d0'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d0'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d0'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d0'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d0'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head0'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa0"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab0"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d0'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d1']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d1'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d1'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d1'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d1'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d1'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d1'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d1'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d1'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head1'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa1"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab1"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d1'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d2']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d2'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d2'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d2'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d2'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d2'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d2'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d2'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d2'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head2'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa2"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab2"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d2'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d3']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d3'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d3'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d3'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d3'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d3'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d3'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d3'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d3'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head3'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa3"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab3"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d3'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d4']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d4'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d4'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d4'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d4'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d4'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d4'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d4'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d4'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head4'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa4"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab4"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d4'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d5']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d5'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d5'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d5'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d5'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d5'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d5'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d5'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d5'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head5'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa5"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab5"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d5'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d6']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d6'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d6'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d6'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d6'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d6'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d6'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d6'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d6'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head6'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa6"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab6"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d6'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d7']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d7'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d7'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d7'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d7'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d7'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d7'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d7'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d7'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head7'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa7"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab7"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d7'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d8']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d8'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d8'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d8'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d8'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d8'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d8'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d8'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d8'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head8'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa8"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab8"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d8'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d9']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d9'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d9'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d9'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d9'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d9'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d9'][0]->alamatlengkap !!}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d9'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d9'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head9'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa9"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab9"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d9'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d10']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d10'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d10'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d10'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d10'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d10'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d10'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d10'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d10'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head10'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa10"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d10'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d11']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d11'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d11'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d11'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d11'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d11'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d11'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d11'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d11'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head11'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa11"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab11"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d11'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d12']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d12'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d12'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d12'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d12'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d12'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d12'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d12'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d12'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head12'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa12"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab12"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d12'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d13']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d13'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d13'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d13'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d13'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d13'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d13'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d13'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d13'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head13'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa13"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab13"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d13'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d14']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d14'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d14'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d14'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d14'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d14'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d14'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d14'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d14'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head14'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa14"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab14"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d14'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d15']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d15'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d15'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d15'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d15'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d15'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d15'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d15'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d15'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head15'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa15"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab15"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d15'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d16']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d16'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d16'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d16'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d16'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d16'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d16'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d16'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d16'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head16'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa16"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab16"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d16'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d17']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d17'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d17'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d17'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d17'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d17'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d17'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d17'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d17'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head17'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa17"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab17"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d17'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d18']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d18'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d18'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d18'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d18'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d18'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d18'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d18'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d18'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head18'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa18"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab18"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d18'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d19']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d19'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d19'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d19'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d19'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d19'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d19'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d19'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d19'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head19'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa19"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab19"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d19'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d20']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d20'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d20'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d20'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d20'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d20'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d20'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d20'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d20'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head20'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa20"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab20"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d20'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d21']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d21'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d21'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d21'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d21'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d21'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d21'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d21'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d21'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head21'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa21"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab21"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d21'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d22']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d22'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d22'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d22'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d22'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d22'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d22'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d22'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d22'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head22'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa22"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab22"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d22'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d23']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d23'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d23'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d23'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d23'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d23'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d23'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d23'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d23'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head23'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa23"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab23"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d23'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    @if (!empty($res['d24']))
    <div align="center" class="break">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="5">
                                    <p align="center">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 10pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>&nbsp;&nbsp;&nbsp;&nbsp;{{ $profile->alamatlengkap }}</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center">
                                    <font style="font-size: 14pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>Hasil Laboratorium</b>
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                        <hr class="baris2">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px"></td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d24'][0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->noregistrasi }}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->dokterperiksa }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->namapasien }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d24'][0]->jeniskelamin !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d24'][0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->ruanganperejuk }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d24'][0]->tgllahirs !!}
                                    </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create(
                                        $res['d24'][0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $res['d24'][0]->alamatlengkap
                                        !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $res['d24'][0]->kelompokpasien }}
                                        &nbsp; / &nbsp; {{ $res['d24'][0]->namarekanan }}</font>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">No</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Pemeriksaan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Hasil</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Rujukan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Satuan</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Keterangan</font>
                                </td>
                            </tr>
                            @foreach($res['head24'] as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">
                                        {{ strtoupper($item[0]->detailjenisproduk) }}</font>
                                </td>
                            </tr>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($item as $data)
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $no }}</font>
                                </td>
                                <td style="text-align:left;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->detailpemeriksaan }}</font>
                                </td>
                                @if($data->hasil == "Negatif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Jernih")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Non Reaktif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->hasil == "Positif")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @elseif($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->nilaitext }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->satuanstandar }}</font>
                                </td>
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#000000">{{ $data->keterangan_lab }}</font>
                                </td>
                            </tr>
                            @php
                            $no = $no + 1;
                            @endphp
                            @endforeach
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus" style="">
                            <tr>
                                <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000"><b>Catatan</b></font>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="text-align:center">
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Nama Pemeriksa</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:10px;"></td>
                                <td style="padding-bottom:10px;"></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <div id="qrcodeNamaPemeriksa24"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab24"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}
                                    </font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>{{ $res['d24'][0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by:
                                        {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    <script>
        var p = {
            !!json_encode($r['pemeriksa']) !!
        };
        var d = {
            !!json_encode($r['doketr']) !!
        };

        jQuery('#qrcodeNamaPemeriksa0').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab0').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa1').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab1').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa2').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab2').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa3').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab3').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa4').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab4').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa5').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab5').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa6').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab6').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa7').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab7').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa8').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab8').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa9').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab9').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa10').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab10').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa11').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab11').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa12').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab12').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa13').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab13').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa14').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab14').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa15').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab15').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa16').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab16').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa17').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab17').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa18').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab18').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa19').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab19').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa20').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab20').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa21').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab21').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa22').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab22').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa23').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab23').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        jQuery('#qrcodeNamaPemeriksa24').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
        });

        jQuery('#qrcodePenanggungJawab24').qrcode({
            width: 70,
            height: 70,
            text: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
        });

        $(document).ready(function () {
            window.print();
        });
    </script>
</body>

</html>
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
<!-- onload="window.print()"  -->

<body>
    
    <div id="qrcode"></div>
    <div align="center">
        <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}" style="padding-right:25px;padding-left:80px;padding-top:80px;padding-bottom:25px;">
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
                                
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kunjungan</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->jeniskunjungan }}</font>
                                </td> --}}
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Rekam Medis</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->nocm }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">No. Pendaftaran</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->noregistrasi }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Perujuk</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->dokterperiksa }}</font>
                                </td>
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Ruang/Kamar/Nomor</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->ruanganasal }} &nbsp; : &nbsp; {{ $datas[0]->namakamar }} &nbsp; : &nbsp; {{ $datas[0]->nomorbed }}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Nama Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->namapasien }}</font>
                                </td>
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->tgllahirs !!}</font>
                                </td> --}}
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->kelompokpasien }} &nbsp; / &nbsp; {{ $datas[0]->namarekanan }}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Jenis Kelamin</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->jeniskelamin !!}</font>
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
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->umur !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->ruanganperejuk }}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->tgllahirs !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->alamatlengkap !!}</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->kelompokpasien }} &nbsp; / &nbsp; {{ $datas[0]->namarekanan }}</font>
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
                            @foreach($header as $item)
                            <tr>
                                <td colspan="7" style="text-align:left;">
                                    <font style="font-size: 12pt;font-weight:bold;" color="#000000">{{ strtoupper($item[0]->detailjenisproduk) }}</font>
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
                                    <font style="font-size: 11pt; padding-left:20px" color="#000000">{{ $r['catatan'] }}</font>
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
                                    <div id="qrcodeNamaPemeriksa"></div>
                                </td>
                                <td style="align-items: center">
                                    <div id="qrcodePenanggungJawab"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['pemeriksa'] }}</font>
                                </td>
                                <td style="align-items: center">
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}</font>
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
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr>
                                <td>{{ $datas[0]->tat }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by: {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        var p = {!! json_encode($r['pemeriksa'] )!!};
        var d = {!! json_encode($r['doketr'] )!!};
        
        if(p != null){
            jQuery('#qrcodeNamaPemeriksa').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + "{{ $r['pemeriksa'] }}"
            });	
        }
        if(d != null){
            jQuery('#qrcodePenanggungJawab').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + "{{ $r['doketr'] }}"
            });
        }
        $(document).ready(function () {
            window.print();
        });
    </script>
</body>

</html>
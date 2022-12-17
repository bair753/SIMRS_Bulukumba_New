<html>

<head>
    <title>
        hasil laboratorium
    </title>

    @if(stripos(\Request::url(), 'localhost') !== FALSE)
    <link rel="stylesheet" href="{{ asset('css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabel.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('service/css/paper.css') }} ">
    <link rel="stylesheet" href="{{ asset('service/css/table-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('service/css/tabel.css') }}">
    @endif

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
        padding: 1px 2px 1px 2px;
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

<body style="background-color: #CCCCCC">
    <div align="center">
        <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}" style="padding:25px">
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
                                        <b>{{ $profile->namalengkap }}</b>
                                    </font>
                                </td>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>INSTALASI LABORATORIUM KLINIK</b>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <font style="font-size: 12pt;font-weight: 600;letter-spacing: 2px;" color="#000000">
                                        <b>{{ $profile->alamatlengkap }}</b>
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
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal Lahir </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->tgllahirs !!}</font>
                                </td>
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->kelompokpasien }} &nbsp; / &nbsp; {{ $datas[0]->namarekanan }}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Umur</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->umur }} / {{ $datas[0]->jeniskelamin }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Dokter Penanggung Jawab</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $r['doketr'] }}</font>
                                    {{-- <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->dpjp }}</font> --}}
                                </td>
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Terima</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglorder),"d-m-Y H:i:s") !!}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Alamat </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! $datas[0]->tgllahirs !!}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Ruangan Perujuk </font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->ruanganperejuk }}</font>
                                </td>
                                {{-- <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Ambil Sample</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglambilsampel),"d-m-Y H:i:s") !!}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tipe/Penjamin Pasien</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {{ $datas[0]->kelompokpasien }} &nbsp; / &nbsp; {{ $datas[0]->namarekanan }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">Tanggal/Jam Keluar Hasil</font>
                                </td>
                                <td>
                                    <font style="font-size: 11pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglakhir),"d-m-Y H:i:s") !!}</font>
                                </td>
                                {{-- <td>
                                    <font style="font-size: 9pt" color="#000000">Tanggal/Jam Pemeriksaan</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglperiksa),"d-m-Y H:i:s") !!}</font>
                                </td> --}}
                            </tr>
                            <tr>
                                {{-- <td>
                                    <font style="font-size: 9pt" color="#000000">No. Registrasi</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {{ $datas[0]->noregistrasi }}</font>
                                </td> --}}
                                {{-- <td>
                                    <font style="font-size: 9pt" color="#000000">Tanggal/Jam Selesai</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {!! date_format(date_create( $datas[0]->tglselesaiperiksa),"d-m-Y H:i:s") !!}</font>
                                </td> --}}
                            </tr>
                            {{-- <tr>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">Dokter Pengirim</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {{ $datas[0]->pengorder }}</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">Petugas Laboratorium</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {{ $datas[0]->analislab }}</font>
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">Diagnosa</font>
                                </td>
                                <td>
                                    <font style="font-size: 9pt" color="#000000">: {{ $datas[0]->diagnosaprabedah }}</font>
                                </td>
                            </tr> --}}
                        </table>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" class="garishalus">
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
                                {{-- <td style="text-align:center;">
                                    <font style="font-size: 11pt" color="#000000">Nilai Kritsis</font>
                                </td> --}}                                
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
                                @if($data->stathasil === "*")
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#FF0000">{{ $data->hasil }}</font>
                                </td>
                                @else
                                <td style="text-align:center;">
                                    <font style="font-size: 10pt;" color="#000000">{{ $data->hasil }}</font>
                                </td>
                                @endif
                                {{-- <td style="text-align:center;">
                                    <font style="font-size: 10pt" color="#FF0000">{{ $data->nilaikritis }}</font>
                                </td> --}}
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
                    <td style="padding-top:20px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    {{-- <font style="font-size: 8pt;" color="#000000">Kesan : </font> --}}
                                </td>
                                <td style="text-align:center">
                                    <font style="font-size: 8pt;" color="#000000">Penanggung Jawab</font>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:30px;">
                                    {{-- <font style="font-size: 8pt;" color="#000000">{{ $datas[0]->kesan }}</font> --}}
                                </td>
                                <td style="padding-bottom:30px;"></td>
                            </tr>
                            {{-- <tr>
                                <td>
                                    <font style="font-size: 8pt;" color="#000000">Saran : </font>
                                </td>
                            </tr> --}}
                            <tr>
                                <td style="padding-bottom:15px;">
                                    {{-- <font style="font-size: 8pt;" color="#000000">{{ $datas[0]->saran }}</font> --}}
                                </td>
                                <td style="padding-bottom:15px;"></td>
                            </tr>
                            <tr>
                                <td>{{ $datas[0]->tat }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <font style="font-size: 8pt;font-style:italic;" color="#000000">Printed by: {{ $r['strIdPegawai'] . " " . date('d/m/Y H:i:s') }}</font>
                                </td>
                                <td style="text-align:center">
                                    {{-- <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $datas[0]->dokter }}</font> --}}
                                    <font style="font-size: 8pt;font-weight:bold;" color="#000000">{{ $r['doketr'] }}</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                {{-- <tr>
                <td style="padding-top:50px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="text-align:center;border-top:1px solid #000000;">
                                <font style="font-size: 14pt;" color="#000000" >
                                "HIGH QUALITY CARE IS OUR PRIORITY"
                                </font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> --}}
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
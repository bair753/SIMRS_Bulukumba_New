<html>

<head>
    <title>
        Cetak Dokter
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
</head>
<style type="text/css" media="print">
    @page {
        size: A5 portrait;
    }

    .bayangprint {
        width: 200mm;
    }
</style>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    .thejak {
        border-collapse: collapse;
        margin-right: 15px;
    }
    .thejak  tabelbgs {
        width: 100%;
    }

    .thejak2 {
        border-collapse: collapse;
        margin-right: 15px;
    }

    .thejak2 tabelbgs {
        width: 100%;
    }

    .table-container {
        display: flex;

    }

    .thejak td:nth-child(1),
    .thejak td:nth-child(2),
    .thejak td:nth-child(3) {
        text-align: center;
        border-collapse: collapse;
        border: 1px solid black;
    }
    .left-align td {
        text-align: left;
    }

    tr.underline th {
        border-bottom: 1px solid black;
        /* Ganti warna dan ketebalan sesuai kebutuhan */
    }

    .border-collapse-table th {
        text-align: center;
        padding: 0px 5px 0px 5px;

    }

    .border-collapse-table td {
        text-align: left;
        padding: 3px 5px 3px 5px;
    }

    .border-collapse-table td:nth-child(1) {
        text-align: center;
    }
    .tabelbgs {
        width: 100%;
    }

    .check-square {
        border: 1px solid #5F6368;
        background-color: #FAFBFF;
        border-radius: 5px;
        width: 20px;
        height: 20px;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
    }
</style>

<body style="background-color: #CCCCCC;margin: 0" onLoad="window.print()">
    <div align="center">
        <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}"
            style="padding:25px">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td rowspan="3">
                                    <p align="right">
                                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                        <img src="{{ asset('img/logo_rs.png') }}" width="80px" border="0">
                                        @else
                                        <img src="{{ asset('service/img/logo_rs.png') }}" width="80px" border="0">
                                        @endif
                                    </p>
                                </td>
                                <td align="center">
                                </td>
                                <td rowspan="3">
                                    <div style="width: 80px;">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <font
                                        style="text-transform: capitalize;font-size: 13pt;font-weight: 500;letter-spacing: 1px;"
                                        color="#000000">
                                        {{ $profile[0]->namalengkap }}
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <font style="font-size: 10pt;" color="#000000">
                                        {{ $profile[0]->alamatlengkap }}
                                    </font>
                                </td>
                            </tr>
                        </table>
                        <hr class="baris2">
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" height="20px">
                                    <font style="font-size: 13pt;font-weight: bold" color="#000000">RESEP DOKTER</font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="text-align: center;">
                        <table width="100%">
                            <tr>
                                <td style="width: 10%;">No Resep</td>
                                <td style="width: 20%;">: </td>
                                <td style="width: 15%;">Tgl Resep</td>
                                <td style="width: 25%;">: {{ $raw->tglorder }}</td>
                                <!-- <td style="width: 10%;">Resep Itter</td> -->
                                {{--<td style="width: 28%;">
                                    :
                                    @if($raw->jmlitter == 0)
                                        -
                                    @else
                                        Iterasi {{ $raw->jmlitter }}x
                                    @endif
                                </td>--}}
                            </tr>
                            <tr>
                                <td>Nama Pasien</td>
                                <td>: {{ $raw->namapasien }}</td>
                                <td>Rekam Medik</td>
                                <td>:  {{ $raw->nocm }}</td>
                                {{--<td>Tgl Pengambilan Resep Iter</td>
                                <td>: {{ $raw->tglpengambilaniter }}</td>--}}
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: {{ $raw->tgllahir }}</td>
                                <td>Poli/Ruangan</td>
                                <td>: {{ $raw->namaruangan }}</td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>: {{ $raw->tgllahir }} ({{ $raw->umur }})</td>
                                <td>Nama Dokter</td>
                                <td>: {{ $raw->namalengkap }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{ $raw->jeniskelamin }}</td>
                                <td>SIP Dokter</td>
                                <td>: {{ $raw->nosip }}</td>
                            </tr>
                            <tr>
                                <td style="margin-top: -10px;">Riwayat Alergi</td>
                                <td>: Ada <p class="check-square"></p> Tidak  Ada <p class="check-square"></p> </td>
                                @if ($raw->id != 2)
                                    <td></td>
                                    <td></td>
                                @else
                                    <td>No BPJS</td>
                                    <td>: {{ $raw->nobpjs }}</td>
                                @endif

                            </tr>
                           
                        </table>
                        <table width="100%" style="margin-top: 10px;" class="border-collapse-table">
                            <tr class="underline">
                                <th colspan="5" style="text-align: left">R/ </th>
                            </tr>
                            <tr class="underline">
                                <td></td>
                                <td>Nama Obat</td>
                                <td>No</td>
                                <td>Aturan Pakai</td>
                            </tr>
                            <tr class="underline">
                                <th colspan="5"></th>
                            </tr>
                            @foreach ($details as $d)
                            <tr>
                                <td>{{ $d->rke }}</td>
                                <td>{{ $d->namaproduk }}</td>
                                <td>({{ number_format($d->jumlah) }})</td>
                                <td>{{ $d->aturanpakai }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-container" class="tabelbgs">
                            <table width="5%" style="margin-top: 15px;" class="thejak tabelbgs">
                                <tr>
                                    <td colspan="2"><b>DOUBLE CHECK</b></td>
                                </tr>
                                <tr style="height: 120px;">
                                    <td style="vertical-align: top;">Paraf 1</td>
                                    <td style="vertical-align: top;">Paraf 2</td>
                                </tr>
                            </table>
                            <table width="5%" style="margin-top: 15px;" class="thejak tabelbgs left-align">
                                <tr>
                                    <td>Benar Pasien</td>
                                    <td style="padding: 15px"></td>
                                </tr>
                                <tr>
                                    <td>Benar Obat</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Benar dosis dan benar obat</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Benar waktu pemberian</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Benar rute pemberian	</td>
                                    <td></td>
                                </tr>
                            </table>
                            <table width="35%" style="margin-top: 15px;" class="thejak tabelbgs">
                                <tr>
                                    <td><b>T</b></td>
                                    <td style="padding: 5px"></td>
                                    <td><b>Jam<br>M</b></td>
                                </tr>
                                <tr>
                                    <td>P</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>R</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td></td>
                                    <td>Jam K</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                        
            </tbody>
        </table>
    </div>
</body>
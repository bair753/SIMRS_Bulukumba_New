<html> <head> <title> Surat Eligibilitas Peserta </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="{{ public_path('vendor/invoices/bootstrap.min.css') }}">
    </head>
    <style type="text/css" media="screen">
        * {
            /* font-family: Tahoma, Geneva, sans-serif; */
        }

        html {
            margin: 0;
        }

        body {
            font-size: 9pt;
            margin: 36pt;
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }
    </style>


    <body onLoad="window.print()">
        <div align="left">
            <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0">
                <tbody>
                    <tr>
                        <td width="30%">
                            <p align="left">
                                <img src="{{ $image }}" width="200px"  />
                            </p>
                        </td>
                        <td>
                            <center>

                                <br />
                                <font style="font-size: 12pt;" color="#000000" face="Tahoma"><b>SURAT ELIGIBILITAS
                                        PESERTA</b></font><br>
                                <font style="font-size: 12pt;" color="#000000" face="Tahoma"><b>{{ $dataReport['namaprofile'] }}</b></font>
                                <br>
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['alamat'] }}</font><br>

                            </center>

                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="25%">
                                        No SEP
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td width="25%">
                                        {{ $dataReport['nosep'] }}

                                    </td>
                                    <td width="25%">
                                        No RM
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $dataReport['norm'] }}

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tgl SEP
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['tanggalsep'] }}
                                    </td>
                                    <td>
                                        No Pendaftaran
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['noregistrasi'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No Kartu
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['nokepesertaan'] }}
                                    </td>


                                    <td>
                                        Jenis Peserta
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['jenispeserta'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama Peserta
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['namapeserta'] }}
                                    </td>
                                    <td>
                                        COB
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $dataReport['cob'] }}

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tgl Lahir
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['tgllahir'] }} Kelamin : {{ $dataReport['jeniskelamin'] }}
                                    </td>
                                    <td>
                                        Jenis Rawat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['jenisrawat'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No. Telepon
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['notelepon'] }}
                                    </td>
                                    <td>
                                        Kelas Rawat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['namakelas'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Poli/ Ruangan Tujuan

                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['namaruangan'] }}
                                    </td>
                                    <td>
                                        Pasien/ Keluarga Pasien

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        Petugas Bpjs Kesehatan

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Asal Faskes TK I
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

                                        {{ $dataReport['namapoli'] }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Diagnosa Awal
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td colspan="6">

                                        {{ $dataReport['namadiagnosa'] }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Catatan
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        {{ $dataReport['catatan'] }}

                                    </td>
                                    <td>
                                        {{ $dataReport['namapeserta'] }}

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        {{ $dataReport['namapeserta'] }}

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table>
                                            <tr>
                                                <td style="font-size:7pt">
    *Saya menyetujui BPJS Kesehatan untuk : <br>
    a. membuka dan atau menggunakan informasi medis Pasien untuk keperluan administrasi, pembayaran asuransi atau
    jaminan pembiayaan kesehatan <br>
    b. memberikan akses informasi medis atau riwayat pelayanan kepada dokter/tenaga medis pada RSUD H. A. SULTHAN DG. RADJA
    untuk kepentingan pemeliharaan kesehatan, pengobatan, penyembuhan, dan perawatan Pasien <br>
    *Saya mengetahui dan memahami : <br>
    a. Rumah Sakit dapat melakukan koordinasi dengan PT Jasa Raharja / PT Taspen / PT ASABRI / BPJS Ketenagakerjaan atau
 Penjamin lainnya, jika Peserta merupakan pasien yang mengalami kecelakaan lalulintas dan / atau kecelakaan kerja <br>
 b. SEP bukan sebagai bukti penjaminan peserta

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

    </html>
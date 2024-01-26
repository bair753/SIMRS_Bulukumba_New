<html>
<head>
    <title>
        Report
    </title>
    @if(stripos(\Request::url(), 'localhost') !== FALSE)
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
    @else
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
    @endif
</head>
<style type="text/css" media="print">
    @media print
    {
        @page
        {
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
    tr td {
        /*padding:2px 4px 2px 4px;*/
    }
    .borderss{
        border-bottom: 1px solid black;
    }
    body{
        font-family: Arial, Helvetica, sans-serif;;
    }
</style>
{{-- onLoad="window.print()" --}}
<body style="margin: 0">
<div align="left">
{{-- class="bayangprint" --}}
    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="{{$pageWidth}}">
        <tbody>
            <tr>
                <td style="padding:10px 30px 0px 30px;">
                    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" width="100%">
                        <tr>
                            <td width="20%">
                                <p align="left">
                                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                    <img src="{{ asset('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @else
                                    <img src="{{ asset('service/img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @endif
                                </p>
                            </td>
                            <td width="80%">
                                <p align="center">
                                    <font style="font-size: 14pt;font-weight:500" color="#000000" face="Tahoma">SURAT ELEGIBILITAS PESERTA</font><br>
                                    <font style="font-size: 12pt;font-weight:500" color="#000000" face="Tahoma">RSUD H.A SULTHAN DG. RADJA</font><br>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 30px 20px 30px;text-align: left">
                    <table cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                        <tr>
                            <td width="15%" align="right" colspan="6">
                                <font style="font-size: 24pt;font-family: '3 of 9 Barcode', sans-serif;" color="#000000">{{ "*".$dataReport['data']->nosep."*" }}</font>
                            </td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">NO. SEP</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;" colspan="4"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nosep }}
                            @if(date_create($dataReport['data']->tanggalsep) < date_create($dataReport['data']->tglcreate))
                                {{ " (BACKDATE)" }}
                            @endif
                            </font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. SEP</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ date_format(date_create($dataReport['data']->tanggalsep), 'd/m/Y') }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Peserta</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->jenispeserta }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Kartu</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nokepesertaan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">COB</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->cob }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nama Peserta</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namapeserta }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Jns. Rawat</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->jenisrawat }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Lahir</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ date_format(date_create($dataReport['data']->tgllahir), 'd/m/Y') }} &nbsp;&nbsp;&nbsp; Kelamin : {{ $dataReport['data']->jeniskelamin }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Jns. Kunjungan</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->kunjungan }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Telepon</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->notelpmobile }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->procedures }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Sub/Spesialis</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namaruangan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Poli Perujuk</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->polirujukannama }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Dokter</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namadjpjpmelayanni }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kls. Hak</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->haknamakelas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Faskes Perujuk</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nmprovider }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kls. Rawat</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namakelas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Awal</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namadiagnosa }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Penjamin</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="28%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->penjaminlakalantas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Catatan</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="38%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->catatan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;" colspan="3" align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pasien/Keluarga</font></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                                    <tr >
                                        <td height="5" width="60%" style="vertical-align:top;" align="left">
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">*Saya menyetujui BPJS Kesehatan untuk :</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">a. membuka dan atau menggunakan informasi medis Pasien untuk keperluan administrasi, pembayaran asuransi atau
                                                jaminan pembiayaan kesehatan</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">b. memberikan akses informasi medis atau riwayat pelayanan kepada dokter/tenaga medis pada RSUD H. A. SULTHAN DG. RADJA
                                                untuk kepentingan pemeliharaan kesehatan, pengobatan, penyembuhan, dan perawatan Pasien</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">*Saya mengetahui dan memahami :</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">a. Rumah Sakit dapat melakukan koordinasi dengan PT Jasa Raharja / PT Taspen / PT ASABRI / BPJS Ketenagakerjaan atau
                                                Penjamin lainnya, jika Peserta merupakan pasien yang mengalami kecelakaan lalulintas dan / atau kecelakaan kerja</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">b. SEP bukan sebagai bukti penjaminan peserta</font><br/>
                                            @if($dataReport['data']->objectdepartemenfk == 16)
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">** Dengan diterbitkan SEP ini, Peserta rawat inap telah mendapatkan informasi dan <br> menampati kelas rawat sesuai hak akses kelasnya (terkecuali kelas penuh atau naik kelas <br> sesuai aturan yang berlaku)</font><br/>
                                            @endif
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">dengan terlebih dahulu.</font><br/>
                                            <font style="font-size: 5pt;font-style:italic;" color="#000000" face="Tahoma">Cetakan Ke 1 {{ $dataReport['tglAyeuna'] }}</font><br/>
                                        </td>
                                        <td height="5" width="40%" style="vertical-align:top" align="center">
                                            <div style="text-align: center" id="qrSEP"></div>
                                            <font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namapeserta }}</font><br/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 30px 20px 30px;text-align: left">
                    <table cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                        <tr>
                            <td width="30%" align="left">
                                <font style="font-size: 10pt;font-weight:800;" color="#000000" face="Tahoma">RSUD H.A SULTHAN DG RADJA</font><br>
                                <font style="font-size: 10pt;font-weight:800;" color="#000000" face="Tahoma">BULUKUMBA</font>
                            </td>
                            <td width="35%" align="center">
                                <font style="font-size: 14pt;font-weight:bold;" color="#000000" face="Tahoma">BPJS KESEHATAN</font><br>
                                <font style="font-size: 11pt;font-weight:bold;" color="#000000" face="Tahoma">Surat Jaminan Pelayanan</font>
                            </td>
                            <td width="35%" align="center">
                                <font style="font-size: 11pt;font-weight:600;border-width:2px; border-style:solid; border-color:black; padding: 1em;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->instalasi }}</font>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-top:10px;">
                                <table border="0" bgcolor="#FFFFFF" width="100%" align="left">
                                    <tr>
                                        <td height="20" width="18%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nomor</font></td>
                                        <td height="20" width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" width="45%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->noregistrasi }}</font></td>
                                        {{-- batas --}}
                                        <td height="20" width="13%" align="right"><font style="font-size: 12pt;" color="#000000" face="Tahoma">No. RM</font></td>
                                        <td height="20" width="2%" align="right"><font style="font-size: 12pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" width="20%" align="left"><font style="font-size: 12pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->nocm }}</font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Perawatan/Poli</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" colspan="4"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->namaruangan }}</font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nama Peserta</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->namapasien }}</font></td>
                                        {{-- batas --}}
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl Masuk</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->tglmasuk }}</font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Kartu</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->nobpjs }}</font></td>
                                        {{-- batas --}}
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl Keluar</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Penyakit</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" colspan="4"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Prosedur/Tindakan</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" colspan="4"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-top:10px;">
                                <table border="0" bgcolor="#FFFFFF" width="100%" align="left">
                                    <tr>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Penerima Pelayanan</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Pemberi Pelayanan</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Pemberi Jaminan</font></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><div style="text-align: center" id="qrSJPPasien"></div></td>
                                        <td align="center"><div style="text-align: center" id="qrSJPDokter"></div></td>
                                        <td align="center"><div style="text-align: center" id="qrSJPRS"></div></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->namapasien }}</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->dokter }}</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">RSUD H.A SULTHAN DG. RADJA</font></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @if($dataReport['data']->isspri)
            <tr>
                <td style="padding:10px 30px 0px 30px;">
                    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" width="100%">
                        <tr>
                            <td width="30%" align="left">
                                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                    <img src="{{ asset('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @else
                                    <img src="{{ asset('service/img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @endif
                            </td>
                            <td width="40%" align="left">
                                <font style="font-size: 11pt;" color="#000000" face="Tahoma">SURAT PERINTAH RAWAT INAP</font><br>
                                <font style="font-size: 11pt;" color="#000000" face="Tahoma">RSUD H.A SULTHAN DG. RADJA</font><br>
                            </td>
                            <td width="30%" align="left">
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">No. {{ $dataReport['spri']->nosuratkontrol }}</font><br>
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. {{ $dataReport['spri']->tglrencana }}</font><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:20px 30px;text-align: left">
                    <table cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kepada Yth</font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td width="50%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->namadokter }}</font></td>
                            <td width="33%" rowspan="2">
                                <font style="font-size: 18pt;font-family: '3 of 9 Barcode', sans-serif;" color="#000000">{{ "*".$dataReport['spri']->nosuratkontrol."*" }}</font>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td width="53%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{  str_replace("Poliklinik", "", $dataReport['spri']->namapolitujuan) }}</font></td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="4">
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">
                                Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Kartu</font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td width="83%" colspan="2"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->nokartu }}</font></td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nama Pasien</font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td width="83%" colspan="2"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->nama }} ( {{ $dataReport['data']->jeniskelamin }}  )</font></td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Lahir</font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td width="83%" colspan="2"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ date_format(date_create($dataReport['data']->tgllahir), 'd/m/Y') }}</font></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Awal</font></td>
                            <td style="vertical-align:top;" width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td style="vertical-align:top;" width="50%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namadiagnosa }}</font></td>
                            <td width="33%" rowspan="4" align="center">
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">Mengetahui</font><br/>
                                <div style="text-align: center" id="qrSPRI"></div>
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->namadokter }}</font><br/>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Entri</font></td>
                            <td width="2%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td width="83%" colspan="2"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->tglterbit }}</font></td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="4">
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">
                                Demikian atas bantuannya diucapkan banyak terima kasih
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="4">
                                <font style="font-size: 9pt;font-style:italic;" color="#000000" face="Tahoma">
                                Tgl. Cetak {{ $dataReport['tglAyeuna'] }}
                                </font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    $(function () {
        'use strict';
        var APP_URL = "http://10.10.10.12/service/medifirst2000/report/ttd-digital/";
        $.ajax({
            "url": "https://tinyurl.com/api-create.php?url=" + APP_URL + "{{ $dataReport['suratJaminan']->noregistrasi }}" + "/pasien",
            "method": "GET",
            "timeout": 0,
            "success": function(response) {
                $('#qrSEP').qrcode({
                    text: response,
                    height: 55,
                    width: 55
                });
            }
        })
        $.ajax({
            "url": "https://tinyurl.com/api-create.php?url=" + APP_URL + "{{ $dataReport['suratJaminan']->noregistrasi }}" + "/pasien",
            "method": "GET",
            "timeout": 0,
            "success": function(response) {
                $('#qrSJPPasien').qrcode({
                    text: response,
                    height: 55,
                    width: 55
                });
            }
        })
        $.ajax({
            "url": "https://tinyurl.com/api-create.php?url=" + APP_URL + "{{ $dataReport['suratJaminan']->noregistrasi }}" + "/dokter",
            "method": "GET",
            "timeout": 0,
            "success": function(response) {
                $('#qrSJPDokter').qrcode({
                    text: response,
                    height: 55,
                    width: 55
                });
            }
        })
        $.ajax({
            "url": "https://tinyurl.com/api-create.php?url=" + APP_URL + "{{ $dataReport['suratJaminan']->noregistrasi }}" + "/rs",
            "method": "GET",
            "timeout": 0,
            "success": function(response) {
                $('#qrSJPRS').qrcode({
                    text: response,
                    height: 55,
                    width: 55
                });
            }
        })
        $.ajax({
            "url": "https://tinyurl.com/api-create.php?url=" + APP_URL + "{{ $dataReport['suratJaminan']->noregistrasi }}" + "/spri",
            "method": "GET",
            "timeout": 0,
            "success": function(response) {
                $('#qrSPRI').qrcode({
                    text: response,
                    height: 55,
                    width: 55
                });
                setTimeout(function(){ window.print() }, 1000);
            }
        })
    })
</script>
</html>
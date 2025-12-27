<!DOCTYPE html>
<html>
    <head>
        <title>Surat Eligibilitas Peserta</title>
    </head>
    <style>
        @page { 
            size: A4;
            margin: 10px 10px 0px 10px;
            /* margin: 0px;  */
        }
        body { 
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0">
            <tr>
                <td style="padding:10px 30px 0px 30px;">
                    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" width="100%">
                        <tr>
                            <td width="20%">
                                <p align="left">
                                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                    <img src="{{ public_path('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @else
                                    <img src="{{ public_path('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @endif
                                </p>
                            </td>
                            <td width="80%">
                                <p align="center">
                                    <font style="font-size: 14pt;" color="#000000" face="Tahoma">SURAT ELEGIBILITAS PESERTA</font><br>
                                    <font style="font-size: 12pt;" color="#000000" face="Tahoma">RSUD H.A SULTHAN DG. RADJA</font><br>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:-20px 30px 0px 30px;;text-align: left">
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td align="right">
                                <font style="font-size:24pt;font-family:'Code39';">
                                    {{ $dataReport['data']->nosep }}
                                </font>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left" style="table-layout:fixed;border-collapse:collapse;">
                      
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">NO. SEP</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nosep }}
                            @if(date_create($dataReport['data']->tanggalsep) < date_create($dataReport['data']->tglcreate))
                                {{ " (BACKDATE)" }}
                            @endif
                            </font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. SEP</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ date_format(date_create($dataReport['data']->tanggalsep), 'd/m/Y') }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Peserta</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->jenispeserta }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Kartu</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nokepesertaan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">COB</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->cob }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nama Peserta</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namapeserta }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Jns. Rawat</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->jenisrawat }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Lahir</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ date_format(date_create($dataReport['data']->tgllahir), 'd/m/Y') }} &nbsp;&nbsp;&nbsp; Kelamin : {{ $dataReport['data']->jeniskelamin }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Jns. Kunjungan</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->kunjungan }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Telepon</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->notelpmobile }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->procedures }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Sub/Spesialis</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namaruangan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Poli Perujuk</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->polirujukannama }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Dokter</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namadjpjpmelayanni }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kls. Hak</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->haknamakelas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Faskes Perujuk</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->nmprovider }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kls. Rawat</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->namakelas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Awal</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->namadiagnosa }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Penjamin</font></td>
                            <td height="5" width="23%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->penjaminlakalantas }}</font></td>
                        </tr>
                        <tr>
                            <td height="5" width="15%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Catatan</font></td>
                            <td height="5" width="2%" style="vertical-align:top;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                            <td height="5" width="46%" style="vertical-align:top;padding-right:10px;"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['data']->catatan }}</font></td>
                            {{-- batas --}}
                            <td height="5" width="38%" style="vertical-align:top;" colspan="3" align="center"><font style="font-size: 10pt; padding-left: 25px;" color="#000000" face="Tahoma"> Pasien/Keluarga</font></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                                    <tr >
                                        <td width="60%" style="vertical-align:top; font-size:6.5pt; font-style:italic; font-family:Tahoma; line-height:1.1;" align="left">
                                            <div style="padding-top: 8px;">*Saya menyetujui BPJS Kesehatan untuk :</div>

                                            <div style="margin-left:10px;">
                                                a. membuka dan atau menggunakan informasi medis Pasien untuk keperluan administrasi, pembayaran asuransi atau
                                                jaminan pembiayaan kesehatan
                                            </div>

                                            <div style="margin-left:10px;">
                                                b. memberikan akses informasi medis atau riwayat pelayanan kepada dokter/tenaga medis pada RSUD H. A. SULTHAN DG. RADJA
                                                untuk kepentingan pemeliharaan kesehatan, pengobatan, penyembuhan, dan perawatan Pasien
                                            </div>

                                            <div>*Saya mengetahui dan memahami :</div>

                                            <div style="margin-left:10px;">
                                                a. Rumah Sakit dapat melakukan koordinasi dengan PT Jasa Raharja / PT Taspen / PT ASABRI / BPJS Ketenagakerjaan atau
                                                Penjamin lainnya, jika Peserta merupakan pasien yang mengalami kecelakaan lalulintas dan / atau kecelakaan kerja
                                            </div>

                                            <div style="margin-left:10px;">
                                                b. SEP bukan sebagai bukti penjaminan peserta
                                            </div>

                                            @if($dataReport['data']->objectdepartemenfk == 16)
                                                <div>
                                                    ** Dengan diterbitkan SEP ini, Peserta rawat inap telah mendapatkan informasi dan
                                                    menempati kelas rawat sesuai hak akses kelasnya
                                                    (terkecuali kelas penuh atau naik kelas sesuai aturan yang berlaku)
                                                </div>
                                            @endif

                                            <div>dengan terlebih dahulu.</div>
                                            <div>Cetakan Ke 1 {{ $dataReport['tglAyeuna'] }}</div>

                                        </td>

                                        <td height="5" width="40%" style="vertical-align:top" align="center">
                                            <img src="data:image/png;base64, {!! $qrcodePasien !!}"><br/>
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
                <td style="padding:370px 30px 20px 30px;text-align: left">
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
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['suratJaminan']->tglkeluar }}</font></td>
                                    </tr>
                                    <tr>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Penyakit</font></td>
                                        <td height="20"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:</font></td>
                                        <td height="20" colspan="4"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['diagnosa'] }}</font></td>
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
                            <td colspan="3" style="padding-top:200px;">
                                <table border="0" bgcolor="#FFFFFF" width="100%" align="left">
                                    <tr>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Penerima Pelayanan</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Pemberi Pelayanan</font></td>
                                        <td align="center"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Pemberi Jaminan</font></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><img src="data:image/png;base64, {!! $qrcodePasien !!}"></td>
                                        <td align="center"><img src="data:image/png;base64, {!! $qrSJPDokter !!}"></td>
                                        <td align="center"><img src="data:image/png;base64, {!! $qrSJPRS !!}"></td>
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
        </table>
        <div style="page-break-before: always;"></div>

        <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0">
            @if($dataReport['data']->isspri)
            <tr>
                <td style="padding:30px 30px 0px 30px;">
                    <table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" width="100%">
                        <tr>
                            <td width="30%" align="left">
                                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                    <img src="{{ public_path('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
                                @else
                                    <img src="{{ public_path('img/logo_bpjs.png') }}" style="width: 200px" border="0"/>
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
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td align="right">
                                <font style="font-size: 18pt;font-family: 'Code39';" color="#000000">{{ $dataReport['spri']->nosuratkontrol }}</font>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td width="20%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Kepada Yth</font></td>
                            <td width="80%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{ $dataReport['spri']->namadokter }}</font></td>
                        </tr>
                        <tr>
                            <td width="20%"><font style="font-size: 10pt;" color="#000000" face="Tahoma"></font></td>
                            <td width="80%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">{{  str_replace("Poliklinik", "", $dataReport['spri']->namapolitujuan) }}</font></td>
                        </tr>
                    </table>
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td width="100%">
                                <font style="font-size: 10pt;" color="#000000" face="Tahoma">
                                Mohon Pemeriksaan dan Penanganan Lebih Lanjut :
                                </font>
                            </td>
                        </tr>
                    </table>
                    <table cellpadding="0" border="0" bgcolor="#FFFFFF" width="100%" align="left">
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">No. Kartu</font></td>
                            <td width="85%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['spri']->nokartu }}</font></td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Nama Pasien</font></td>
                            <td width="85%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['spri']->nama }} ( {{ $dataReport['data']->jeniskelamin }}  )</font></td>
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Lahir</font></td>
                            <td width="85%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ date_format(date_create($dataReport['data']->tgllahir), 'd/m/Y') }}</font></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;" width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Diagnosa Awal</font></td>
                            <td style="vertical-align:top;" width="85%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['data']->namadiagnosa }}</font></td>
                            
                        </tr>
                        <tr>
                            <td width="15%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">Tgl. Entri</font></td>
                            <td width="85%"><font style="font-size: 10pt;" color="#000000" face="Tahoma">:&nbsp;&nbsp;{{ $dataReport['spri']->tglterbit }}</font></td>
                        </tr>
                        
                    </table>
                    <table width="100%" style="border-collapse:collapse;padding-top: 100px;">
                        <tr>
                            <td width="60%" style="vertical-align:top;">
                                <font style="font-size:10pt;" face="Tahoma">
                                    Demikian atas bantuannya diucapkan banyak terima kasih
                                </font>
                            </td>

                            <td width="40%" align="center" style="vertical-align:top;">
                                <font style="font-size:10pt;" face="Tahoma">Mengetahui</font><br>
                            </td>
                        </tr>

                        <tr>
                            <td width="60%" style="padding-top:10px;vertical-align: top;">
                                <font style="font-size:9pt;font-style:italic;" face="Tahoma">
                                    Tgl. Cetak {{ $dataReport['tglAyeuna'] }}
                                </font>
                            </td>
                            <td width="40%" align="center" style="vertical-align:top;">
                                <img src="data:image/png;base64, {!! $qrSPRI !!}"><br>

                                <font style="font-size:10pt;" face="Tahoma">
                                    {{ $dataReport['spri']->namadokter }}
                                </font>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endif
        </table>
    </body>
</html>
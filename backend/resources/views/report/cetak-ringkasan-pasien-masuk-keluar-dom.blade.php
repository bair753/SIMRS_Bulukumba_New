<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pasien Masuk dan Keluar</title>


    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body,
        html {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6pt;
            margin: 10px 10px;
        }

        @page {
            size: A4;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 3rem;
            margin-right: 1rem;
            transform: scale(72%);
        }

        table {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        table tr td {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: .3rem;
        }

        td input {
            vertical-align: middle;
        }

        .format {
            padding: 1rem;
        }

        @media only screen and (max-width:220mm) and (max-height:270mm) {
            @page {
                size: A4;
                margin: 0;
                transform: scale(71%);
            }

            .format {
                width: 210mm;
                height: 297mm;
            }

            table {
                transform: scale(50%);
            }

            .divider {
                clear: both;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="format">
        <table width="100%" style="table-layout:fixed;text-align:center;">
            <tr>
                <td style="width:15%;margin:0 auto;" rowspan="2">
                    <figure style="width:60px;margin:0 auto;">

                      
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                  
                    </figure>
                </td>
                <td style="width:35%;margin:0 auto;" rowspan="2">
                    <table width="100%" style="border:none;table-layout:fixed;text-align:center;">
                        <tr style="border:none;text-align:center;">
                            <td style="text-align:center;border:none;">
                                <strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                                JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                                TELP : {!! $res['profile']->fixedphone !!}
                            </td>
                        </tr>
                    </table>

                </td>

                <td style="width:25%;margin:0;" rowspan="2">
                    <table width="100%" style="border:none;table-layout:fixed;text-align:left;">
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->nocm !!} ({!!
                                $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->namapasien !!} ({!!
                                $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">01</td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td style="text-align:center;background: #000;color: #fff;">
                    <h1>RINGKASAN PASIEN MASUK DAN KELUAR</h1>
                </td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-top:none;">
            <tr>
                <td width="60%" rowspan="2">
                    <table style="border:none;">
                        <tr style="border:none;">
                            <td style="border:none; width: 20%;">Nama Lengkap</td>
                            <td style="border:none; ">: @foreach($res['d'] as $item) @if($item->emrdfk == 420303) {!! $item->value !!} @endif @endforeach</td>
                            <td style="border:none; ">({!! $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Tgl Lahir</td>
                            <td style="border:none;" colspan="2">: {!! date('d-m-Y',strtotime($res['d'][0]->tgllahir)) !!}</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Agama</td>
                            <td style="text-align:left;border:none;" colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420308) {!! $item->value !!} @endif @endforeach </td>

                        </tr>
                        <tr>
                            <td style="border:none;">Kebangsaan</td>
                            <td style="text-align:left;border:none;" colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420309) {!! $item->value !!} @endif @endforeach </td>
                        </tr>
                        <tr>
                            <td style="border:none;">Alamat</td>
                            <td style="text-align:left;border:none;" colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420310) {!! $item->value !!} @endif @endforeach</td>
                        </tr>
                        <tr>
                            <td style="border:none;">Nomor Tlpn/HP</td>
                            <td style="text-align:left;border:none;" colspan="2">: @foreach($res['d'] as $item) @if($item->emrdfk == 420311) {!! $item->value !!} @endif @endforeach</td>
                        </tr>
                    </table>


                </td>
                <td valign="top" height="5px">No. RM : @foreach($res['d'] as $item) @if($item->emrdfk == 420304) {!! $item->value !!} @endif @endforeach</td>

            </tr>
            <tr>
                <td valign="top">
                    <table style="border:none;">
                        <tr>
                            <td style="border:none;">Status Perkawinan</td>
                        </tr>
                        <tr>
                            <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420312) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kawin</td>
                        </tr>
                        <tr>
                            <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420313) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Belum Kawin</td>
                        </tr>
                        <tr>
                            <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420314) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Janda / Duda</td>
                        </tr>

                    </table>

                </td>
            </tr>

            <tr>
                <td width="60%">
                    <table style="border:none;">
                        <tr style="border:none;">
                            <td style="border:none; width: 20%;">Nama Penanggung</td>
                            <td style="border:none;">: @foreach($res['d'] as $item) @if($item->emrdfk == 420315) {!! $item->value !!} @endif @endforeach</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Hubungan Keluarga</td>
                            <td style="border:none;">: @foreach($res['d'] as $item) @if($item->emrdfk == 420316) {!! $item->value !!} @endif @endforeach</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Pekerjaan</td>
                            <td style="border:none;">: @foreach($res['d'] as $item) @if($item->emrdfk == 420317) {!! $item->value !!} @endif @endforeach</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Alamat</td>
                            <td style="border:none;">: @foreach($res['d'] as $item) @if($item->emrdfk == 420318) {!! $item->value !!} @endif @endforeach</td>

                        </tr>
                        <tr>
                            <td style="border:none;">Nomor Tlpn/HP</td>
                            <td style="border:none;">: @foreach($res['d'] as $item) @if($item->emrdfk == 420319) {!! $item->value !!} @endif @endforeach</td>

                        </tr>
                    </table>
                </td>
                <td>
                    <table style="border:none;">
                        <tr>
                            <td style="border:none;">Dirawat yang ke :</td>
                        </tr>
                        <tr>
                            <td style="border:none;">Dirawat yang keDikirim Oleh :</td>
                        </tr>
                        <tr>
                            <td colspan="14" style="border:none;">Dr. Poliklinik : @foreach($res['d'] as $item) @if($item->emrdfk == 420322) {!! $item->value !!} @endif @endforeach</td>
                        </tr>
                        <tr>
                            <td style="border:none;">Dr. Jaga : @foreach($res['d'] as $item) @if($item->emrdfk == 420325) {!! $item->value !!} @endif @endforeach</td>
                        </tr>
                        <tr>
                            <td style="border:none;">Rujukan dari : @foreach($res['d'] as $item) @if($item->emrdfk == 420324) {!! $item->value !!} @endif @endforeach</td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table width="100%" style="table-layout:fixed;border-top:none;">
            <tr style="text-align: center;">
                <td style="width:20%;border:none;">Sebab Dirawat : @foreach($res['d'] as $item) @if($item->emrdfk == 420325) {!! $item->value !!} @endif @endforeach</td>
                <td style="width:40%;border:none;">Masuk Tanggal : @foreach($res['d'] as $item) @if($item->emrdfk == 420327) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none;">Jam : @foreach($res['d'] as $item) @if($item->emrdfk == 420329) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr style="text-align: center;">
                <td style="border:none; ">Dirawat di ruang : @foreach($res['d'] as $item) @if($item->emrdfk == 420326) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none;">Bagian : @foreach($res['d'] as $item) @if($item->emrdfk == 420328) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none;"></td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-top:none;">

            <tr>
                <td rowspan="2" style="border:none;" valign="top">Kasus Polisi :</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420330) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
                <td rowspan="2" style="border:none;" valign="top">Prosedur Masuk RS Melalui :</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420332) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach IRD
                </td>
                <td rowspan="2" style="border:none;" valign="top">Peserta BPJS :</td>

                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420334) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PBI
                </td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420336) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Umum
                </td>
            </tr>
            <tr>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420331) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420333) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Poliklinik</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420335) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PBI</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420337) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gratis</td>

            </tr>
            <tr>
                <td colspan="5" style="border:none;"></td>
                <td colspan="2" style="border:none;">No. BPJS: @foreach($res['d'] as $item) @if($item->emrdfk == 420338) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none;"></td>
                <td colspan="2" style="border:none;">Kelas Perawatan / Jaminan: @foreach($res['d'] as $item) @if($item->emrdfk == 420339) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>
        <table width="100%" style="table-layout:fixed;border-top:none;">
            <tr style="text-align:center;">
                <td style="border:none;width:50%">Dipindahkan ke ruang : @foreach($res['d'] as $item) @if($item->emrdfk == 420340) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none">Pindahan dari ruang : @foreach($res['d'] as $item) @if($item->emrdfk == 420343) {!! $item->value !!} @endif @endforeach</td>
            </tr>

            <tr style="text-align:center;">
                <td style="border:none">Kelas: @foreach($res['d'] as $item) @if($item->emrdfk == 420341) {!! $item->value !!} @endif @endforeach, 
                    Tgl / Jam: @foreach($res['d'] as $item) @if($item->emrdfk == 420342) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none">Kelas: @foreach($res['d'] as $item) @if($item->emrdfk == 420344) {!! $item->value !!} @endif @endforeach, 
                    Tgl / Jam: @foreach($res['d'] as $item) @if($item->emrdfk == 420345) {!! $item->value !!} @endif @endforeach</td>
            </tr>

            <tr>
                <td height="25px" valign="top" style="width:50%">Meninggal Tgl : @foreach($res['d'] as $item) @if($item->emrdfk == 420346) {!! $item->value !!} @endif @endforeach</td>
                <td height="25px" valign="top">Sebab Kematian : @foreach($res['d'] as $item) @if($item->emrdfk == 420347) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td height="25px" valign="top">Alergi Terhadap : @foreach($res['d'] as $item) @if($item->emrdfk == 420348) {!! $item->value !!} @endif @endforeach</td>
                <td height="25px" valign="top">Cacat Bawaan : @foreach($res['d'] as $item) @if($item->emrdfk == 420349) {!! $item->value !!} @endif @endforeach</td>
            </tr>

            <tr>
                <td height="25px" valign="top">Diagnosa Awal : @foreach($res['d'] as $item) @if($item->emrdfk == 420351) {!! $item->value !!} @endif @endforeach
                     @foreach($res['d'] as $item) @if($item->emrdfk == 420352) {!! $item->value !!} @endif @endforeach</td>
                <td height="25px" valign="top">Diagnosa Akhir : @foreach($res['d'] as $item) @if($item->emrdfk == 420354) {!! $item->value !!} @endif @endforeach
                @foreach($res['d'] as $item) @if($item->emrdfk == 420355) {!! $item->value !!} @endif @endforeach</td>
            </tr>


            <tr>
                <td colspan="2" height="25px" valign="top">Diagnosa sekunder (termasuk komplikasi/ manifestasi) : @foreach($res['d'] as $item) @if($item->emrdfk == 420357) {!! $item->value !!} @endif @endforeach
                    @foreach($res['d'] as $item) @if($item->emrdfk == 420358) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td colspan="2" height="25px" valign="top">Diagnosa sekunder (termasuk komplikasi/ manifestasi) : @foreach($res['d'] as $item) @if($item->emrdfk == 32115624) {!! $item->value !!} @endif @endforeach
                @foreach($res['d'] as $item) @if($item->emrdfk == 32115625) {!! $item->value !!} @endif @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2" height="25px" valign="top">Tindakan Operasi yang dilakukan (bila ada, sebutkan) : @foreach($res['d'] as $item) @if($item->emrdfk == 420359) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td height="25px" valign="top">Infeksi Nosokomial : @foreach($res['d'] as $item) @if($item->emrdfk == 420360) {!! $item->value !!} @endif @endforeach</td>
                <td height="25px" valign="top">Penyebab Infeksi : @foreach($res['d'] as $item) @if($item->emrdfk == 420361) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-bottom:none;">
            <tr>
                <td colspan="6">Status KB (khusus pasien wanita)</td>
            </tr>

            <tr style="border:none;height:25px">
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420362) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sudah KB</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420363) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach MOV
                    / MOW</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420364) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach IUD
                </td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420365) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Suntikan</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420366) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kondom</td>
                <td style="border:none; ">@foreach($res['d'] as $item) @if($item->emrdfk == 420367) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pil KB</td>
            </tr>
            <tr style="border:none;height:25px">
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420368) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Belum KB</td>
                <td colspan="5" style="border:none;">
                    @foreach($res['d'] as $item) @if($item->emrdfk == 420369) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Perlu KB. Alasan : @foreach($res['d'] as $item) @if($item->emrdfk == 420370) {!! $item->value !!} @endif @endforeach
                </td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-bottom:none;">
            <tr style="height:25px">
                <td style="border:none">Imunisasi yang pernah di dapat: </td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420371) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BCG</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420372) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach DPT</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420373) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Polio</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420374) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach TFT
                </td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420375) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Campak</td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-bottom:none;">
            <tr>
                <td>Imunisasi yang diperoleh selama di rawat : @foreach($res['d'] as $item) @if($item->emrdfk == 420376) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr>
                <td>Pengobatan Radioterapi / Ked. Nuklir : @foreach($res['d'] as $item) @if($item->emrdfk == 420377) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>

        <table width="100%" style="table-layout:fixed;border-top:none;border-bottom:none;">
            <tr>
                <td style="border:none;border-right:1px solid #000" width="50%">Transfusi Darah : @foreach($res['d'] as $item) @if($item->emrdfk == 420378) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none;">Golongan Darah : @foreach($res['d'] as $item) @if($item->emrdfk == 420379) {!! $item->value !!} @endif @endforeach</td>
            </tr>
        </table>
        <table width="100%" style="table-layout:fixed;border-bottom:none;">

            <tr>
                <td style="border:none; border-right:1px solid #000" colspan="3">Keadaan Keluar</td>
                <td style="border:none;" colspan="3">Cara Keluar</td>
            </tr>

            <tr>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420380) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sembuh</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420381) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Membaik</td>
                <td style="border:none;border-right:1px solid #000">@foreach($res['d'] as $item) @if($item->emrdfk == 420382) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Belum Sembuh</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420385) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Diijinkan Pulang</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420386) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pulang paksa</td>
                <td style="border:none;">@foreach($res['d'] as $item) @if($item->emrdfk == 420387) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lari</td>
            </tr>
            <tr style="height:25px">
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420383) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meninggal < 48 Jam</td>
                <td style="border:none;border-right:1px solid #000" colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420384) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meninggal > 48 Jam</td>
                <td style="border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 420388) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pindah RS Lain</td>
                <td style="border:none" colspan="2">@foreach($res['d'] as $item) @if($item->emrdfk == 420389) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dirujuk Ke: @foreach($res['d'] as $item) @if($item->emrdfk == 420390) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>



        <table width="100%" style="table-layout:fixed;">
            <tr style="border:none;border-top:1px solid #000;height:25px">
                <td style="border:none;border-right:1px solid #000;widt:50%;">Keluar Tanggal / Jam: @foreach($res['d'] as $item) @if($item->emrdfk == 420391) {!! $item->value !!} @endif @endforeach</td>
                <td style="border:none" colspan="">Dokter Penanggung Jawab Pelayanan : @foreach($res['d'] as $item) @if($item->emrdfk == 420393) {!! $item->value !!} @endif @endforeach</td>
            </tr>
            <tr style="border:none;height:25px">
                <td style="border:none;border-right:1px solid #000"></td>
                <td style="border:none" colspan="" rowspan="2">
                    @foreach($res['d'] as $item) @if($item->emrdfk == 420393) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach
                </td>
            </tr>
            <tr style="border:none;height:25px">
                <td style="border:none;border-right:1px solid #000">Lama Dirawat : @foreach($res['d'] as $item) @if($item->emrdfk == 420392) {!! $item->value !!} @endif @endforeach</td>
            </tr>

        </table>





    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Operasi</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            /* font-family: DejaVu Sans, Verdana, Arial, sans-serif; */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6pt;
            margin: 10px 20px;
        }

        @page {
            size: A4;
            width: 210mm;
            height: 279mm;
            margin-left: 3rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-right: 1rem;
            transform: scale(72%);
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
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

        .table-noborder,
        tr,
        td {
            border: 0;
            border-collapse: collapse;
            padding: .3rem;


        }
        .bordered {
            border: .1rem solid rgba(0, 0, 0, 0.45);
            border-collapse: collapse;
            padding: .2rem;
            box-sizing: border-box;

        }

        .border-top {
            border-top: .1rem solid rgba(0, 0, 0, 0.45);
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-bottom {
            border-bottom: .1rem solid rgba(0, 0, 0, 0.45);
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-left {
            border-left: .1rem solid rgba(0, 0, 0, 0.45);
            border-collapse: collapse;
            box-sizing: border-box;
        }

        .border-right {
            border-right: .1rem solid rgba(0, 0, 0, 0.45);
            border-collapse: collapse;
            box-sizing: border-box;
        }

        header {
            border: 1px solid #000;
        }



        .rotate {
            transform: rotate(-90deg);
        }

        .text-center {
            text-align: center;
        }

        .p05 {
            padding: .2rem;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            padding: .5rem;
            text-align: center;
        }
    </style>
</head>

@if (!empty($res['d1']))
    <body ng-controller="cetakLaporanOperasi">
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
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->nocm !!} </td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->namapasien !!} ({!!
                                $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d1'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">53</td>
            </tr>
        </table>

        <table width="100%" class="table-border">

            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100530) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @foreach($res['d1'] as $item) @if($item->emrdfk == 31100532) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Scrub : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100535) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @foreach($res['d1'] as $item) @if($item->emrdfk == 31100534) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Sirkuler : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100536) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Nama Dokter Anestesi : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100537) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5" style="border:none;border-top:1px solid #000">Jenis Anestesi :</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach General Anestesi</td>
                <td colspan="2" style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Regional Anestesi</td>
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lokal Anestesi </td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5">Komplikasi Selama Operasi : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100542) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Intake :</td>
                <td colspan="3" style="border:none">Output :</td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kristaloid </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103414) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah</td>
                <td colspan="2" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103415) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Expander </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103416) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urine</td>
                <td colspan="2" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103417) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000;">
                <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah </td>
                <td style="border:none;border-right: 1px solid #000;">:@foreach($res['d1'] as $item) @if($item->emrdfk == 32103418) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100549) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
                <td colspan="2" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103419) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan
                    : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100550) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi :</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100557) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100558) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100559) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kotor
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100560) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100561) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100562) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersih
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100551) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Khusus</td>
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100552) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Besar</td>
                <td style="border:none;" colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang
                    dipasang (implan) : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100563) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kecil</td>
                <td style="border:none;">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100556) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Emergency</td>
                    <td style="border:none;" colspan="5"></td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100564) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Dimulai : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100565) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Selesai : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100566) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Lama Operasi Berlangsung : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100567) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman
                    sebelah) : @foreach($res['d1'] as $item) @if($item->emrdfk == 31100568) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100569) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d1'] as $item) @if($item->emrdfk == 31100569) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100570) {!! $item->value !!} @endif @endforeach </td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100571) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100572) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100573) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100574) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">: @foreach($res['d1'] as $item) @if($item->emrdfk == 31100575) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk == 31100576) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d1'] as $item) @if($item->emrdfk == 31100576) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
        </table>
        </section>


    </body>
@endif

@if (!empty($res['d2']))
    <body ng-controller="cetakLaporanOperasi">
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
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->nocm !!} </td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->namapasien !!} ({!!
                                $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d2'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">53</td>
            </tr>
        </table>

        <table width="100%" class="table-border">

            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100530) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @foreach($res['d2'] as $item) @if($item->emrdfk == 31100532) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Scrub : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100535) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @foreach($res['d2'] as $item) @if($item->emrdfk == 31100534) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Sirkuler : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100536) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Nama Dokter Anestesi : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100537) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5" style="border:none;border-top:1px solid #000">Jenis Anestesi :</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach General Anestesi</td>
                <td colspan="2" style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Regional Anestesi</td>
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lokal Anestesi </td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5">Komplikasi Selama Operasi : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100542) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Intake :</td>
                <td colspan="3" style="border:none">Output :</td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kristaloid </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103414) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah</td>
                <td colspan="2" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103415) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Expander </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103416) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urine</td>
                <td colspan="2" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103417) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000;">
                <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah </td>
                <td style="border:none;border-right: 1px solid #000;">:@foreach($res['d2'] as $item) @if($item->emrdfk == 32103418) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100549) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
                <td colspan="2" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103419) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan
                    : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100550) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi :</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100557) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100558) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100559) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kotor
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100560) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100561) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100562) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersih
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100551) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Khusus</td>
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100552) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Besar</td>
                <td style="border:none;" colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang
                    dipasang (implan) : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100563) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kecil</td>
                <td style="border:none;">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100556) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Emergency</td>
                    <td style="border:none;" colspan="5"></td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100564) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Dimulai : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100565) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Selesai : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100566) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Lama Operasi Berlangsung : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100567) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman
                    sebelah) : @foreach($res['d2'] as $item) @if($item->emrdfk == 31100568) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100569) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d2'] as $item) @if($item->emrdfk == 31100569) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100570) {!! $item->value !!} @endif @endforeach </td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100571) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100572) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100573) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100574) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">: @foreach($res['d2'] as $item) @if($item->emrdfk == 31100575) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk == 31100576) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d2'] as $item) @if($item->emrdfk == 31100576) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
        </table>
        </section>


    </body>
@endif

@if (!empty($res['d3']))
    <body ng-controller="cetakLaporanOperasi">
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
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->nocm !!} </td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->namapasien !!} ({!!
                                $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d3'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">53</td>
            </tr>
        </table>

        <table width="100%" class="table-border">

            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100530) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @foreach($res['d3'] as $item) @if($item->emrdfk == 31100532) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Scrub : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100535) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @foreach($res['d3'] as $item) @if($item->emrdfk == 31100534) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Sirkuler : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100536) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Nama Dokter Anestesi : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100537) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5" style="border:none;border-top:1px solid #000">Jenis Anestesi :</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach General Anestesi</td>
                <td colspan="2" style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Regional Anestesi</td>
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lokal Anestesi </td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5">Komplikasi Selama Operasi : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100542) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Intake :</td>
                <td colspan="3" style="border:none">Output :</td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kristaloid </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103414) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah</td>
                <td colspan="2" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103415) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Expander </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103416) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urine</td>
                <td colspan="2" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103417) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000;">
                <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah </td>
                <td style="border:none;border-right: 1px solid #000;">:@foreach($res['d3'] as $item) @if($item->emrdfk == 32103418) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100549) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
                <td colspan="2" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103419) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan
                    : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100550) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi :</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100557) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100558) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100559) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kotor
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100560) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100561) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100562) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersih
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100551) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Khusus</td>
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100552) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Besar</td>
                <td style="border:none;" colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang
                    dipasang (implan) : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100563) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kecil</td>
                <td style="border:none;">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100556) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Emergency</td>
                    <td style="border:none;" colspan="5"></td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100564) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Dimulai : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100565) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Selesai : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100566) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Lama Operasi Berlangsung : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100567) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman
                    sebelah) : @foreach($res['d3'] as $item) @if($item->emrdfk == 31100568) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100569) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d3'] as $item) @if($item->emrdfk == 31100569) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100570) {!! $item->value !!} @endif @endforeach </td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100571) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100572) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100573) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100574) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">: @foreach($res['d3'] as $item) @if($item->emrdfk == 31100575) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk == 31100576) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d3'] as $item) @if($item->emrdfk == 31100576) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
        </table>
        </section>


    </body>
@endif

@if (!empty($res['d4']))
    <body ng-controller="cetakLaporanOperasi">
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
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->nocm !!} </td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->namapasien !!} ({!!
                                $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d4'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">53</td>
            </tr>
        </table>

        <table width="100%" class="table-border">

            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100530) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @foreach($res['d4'] as $item) @if($item->emrdfk == 31100532) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Scrub : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100535) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @foreach($res['d4'] as $item) @if($item->emrdfk == 31100534) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Sirkuler : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100536) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Nama Dokter Anestesi : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100537) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5" style="border:none;border-top:1px solid #000">Jenis Anestesi :</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach General Anestesi</td>
                <td colspan="2" style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Regional Anestesi</td>
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lokal Anestesi </td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5">Komplikasi Selama Operasi : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100542) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Intake :</td>
                <td colspan="3" style="border:none">Output :</td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kristaloid </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103414) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah</td>
                <td colspan="2" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103415) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Expander </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103416) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urine</td>
                <td colspan="2" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103417) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000;">
                <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah </td>
                <td style="border:none;border-right: 1px solid #000;">:@foreach($res['d4'] as $item) @if($item->emrdfk == 32103418) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100549) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
                <td colspan="2" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103419) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan
                    : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100550) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi :</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100557) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100558) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100559) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kotor
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100560) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100561) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100562) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersih
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100551) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Khusus</td>
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100552) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Besar</td>
                <td style="border:none;" colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang
                    dipasang (implan) : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100563) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kecil</td>
                <td style="border:none;">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100556) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Emergency</td>
                    <td style="border:none;" colspan="5"></td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100564) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Dimulai : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100565) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Selesai : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100566) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Lama Operasi Berlangsung : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100567) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman
                    sebelah) : @foreach($res['d4'] as $item) @if($item->emrdfk == 31100568) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100569) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d4'] as $item) @if($item->emrdfk == 31100569) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100570) {!! $item->value !!} @endif @endforeach </td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100571) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100572) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100573) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100574) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">: @foreach($res['d4'] as $item) @if($item->emrdfk == 31100575) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk == 31100576) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d4'] as $item) @if($item->emrdfk == 31100576) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
        </table>
        </section>


    </body>
@endif

@if (!empty($res['d5']))
    <body ng-controller="cetakLaporanOperasi">
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
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->nocm !!} </td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->namapasien !!} ({!!
                                $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                                $res['d5'][0]->tgllahir
                                )) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                            <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->noidentitas !!}</td>

                        </tr>
                    </table>

                </td>
                <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                    RM</td>

            </tr>
            <tr>
                <td style="text-align:center;font-size:36px">53</td>
            </tr>
        </table>

        <table width="100%" class="table-border">

            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100530) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @foreach($res['d5'] as $item) @if($item->emrdfk == 31100532) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Scrub : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100535) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @foreach($res['d5'] as $item) @if($item->emrdfk == 31100534) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3" style="border:none">Sirkuler : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100536) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2">Nama Dokter Anestesi : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100537) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5" style="border:none;border-top:1px solid #000">Jenis Anestesi :</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach General Anestesi</td>
                <td colspan="2" style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100539) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Regional Anestesi</td>
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100540) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lokal Anestesi </td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="5">Komplikasi Selama Operasi : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100542) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100541) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Intake :</td>
                <td colspan="3" style="border:none">Output :</td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100544) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kristaloid </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103414) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100545) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah</td>
                <td colspan="2" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103415) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100546) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Expander </td>
                <td style="border:none;border-right: 1px solid #000;">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103416) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100547) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Urine</td>
                <td colspan="2" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103417) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000;">
                <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100548) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Darah </td>
                <td style="border:none;border-right: 1px solid #000;">:@foreach($res['d5'] as $item) @if($item->emrdfk == 32103418) {!! $item->value !!} @endif @endforeach cc</td>
                <td style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100549) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
                <td colspan="2" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103419) {!! $item->value !!} @endif @endforeach cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan
                    : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100550) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi :</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100557) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya
                </td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100558) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
                <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100559) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kotor
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100560) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100561) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100562) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersih
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100551) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Khusus</td>
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100552) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Besar</td>
                <td style="border:none;" colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100553) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
                    Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang
                    dipasang (implan) : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100563) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr >
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kecil</td>
                <td style="border:none;">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100538) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100556) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Emergency</td>
                    <td style="border:none;" colspan="5"></td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100564) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Dimulai : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100565) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="2">Jam Operasi Selesai : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100566) {!! $item->value !!} @endif @endforeach </td>
                <td colspan="3">Lama Operasi Berlangsung : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100567) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman
                    sebelah) : @foreach($res['d5'] as $item) @if($item->emrdfk == 31100568) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100569) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d5'] as $item) @if($item->emrdfk == 31100569) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100570) {!! $item->value !!} @endif @endforeach </td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100571) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100572) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100573) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100574) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">: @foreach($res['d5'] as $item) @if($item->emrdfk == 31100575) {!! $item->value !!} @endif @endforeach </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">
                    <div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk == 31100576) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@foreach($res['d5'] as $item) @if($item->emrdfk == 31100576) {!! $item->value !!} @endif @endforeach )</td>
            </tr>
        </table>
        </section>


    </body>
@endif

</html>
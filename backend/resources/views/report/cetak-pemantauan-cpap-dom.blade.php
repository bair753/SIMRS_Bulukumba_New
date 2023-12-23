<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan CPAP Dst</title>

    <style>
        @page {
            size: auto;
            size: A4 portrait;
        }

        html,
        body {
            /* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
            font-size: 9pt;

        }

        table {
            border: 1px solid #000;
            /* table-layout: fixed; */
            border-collapse: collapse;

            width: 100%;
        }

        tr,
        td {
            padding: .3rem;
            border: 1px solid #000;
        }
        .noborder {
            padding: .3rem;
            border: none;
        }

        .blf {
            border-left: 1px solid #000;
        }

        .btp {
            border-top: 1px solid #000;
        }

        .btm {
            border-bottom: 1px solid #000;
        }

        .br {
            border-right: 1px solid #000;
        }

        .border-lr {
            border: 1px solid #000;
            border-top: none;
            border-bottom: none;
        }

        .border-tb {
            border: 1px solid #000;
            border-left: none;
            border-right: none;
        }

        .bg-dark {
            background: #000;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: x-large;
            padding: .5rem;
            height: 20pt !important;
        }
    </style>
</head>

@if (!empty($res['d1']))
<body>
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
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->namapasien !!} ({!!
                            $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d1'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">66</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
        <tr >
            <td class="noborder" colspan="3">Tanggal / Pukul</td>
            <td class="noborder" colspan="16">: @foreach($res['d1'] as $item) @if($item->emrdfk == 32103842) {!! $item->value !!} @endif @endforeach </td>
            <td class="noborder" colspan="4"></td>
            <td class="noborder" colspan="26"></td>
        </tr>

      



        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder">Gangguan Pernapasan (semua usia) <img src="{{ $cpap }}" alt="" style="width: 200px;display:block; margin:auto;padding-left:300px"></td>
            {{-- <td colspan="21" rowspan="20" class="noborder">

                <img src="{{ $cpap }}" alt="" style="width: 250px;display:block; margin:auto;">

            </td> --}}
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Merintih</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi parah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                RR > 80, RR @foreach($res['d1'] as $item) @if($item->emrdfk == 32103846) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach O<sub>2</sub>
                < 85% (kalau < 1500g) ATAU < 90% (kalau> 1500g)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @foreach($res['d1'] as $item) @if($item->emrdfk == 32103848) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Usia kehamilan @foreach($res['d1'] as $item) @if($item->emrdfk == 32103850) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Berat badan @foreach($res['d1'] as $item) @if($item->emrdfk == 32103852) {!! $item->value !!} @endif @endforeach gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju napas @foreach($res['d1'] as $item) @if($item->emrdfk == 32103854) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @foreach($res['d1'] as $item) @if($item->emrdfk == 32103855) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103856) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach "Hudson prongs" yang tepat untuk lubang hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 1 : 750-1250g @foreach($res['d1'] as $item) @if($item->emrdfk == 32103858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 2 : 1250-2000g @foreach($res['d1'] as $item) @if($item->emrdfk == 32103859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 3 : 2000-3000g</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Topi yang tepat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Peniti, karet, atau selotip untuk memasang selang ke topi</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Air dipenuhi sampai tingkat 6-8 cm. @foreach($res['d1'] as $item) @if($item->emrdfk == 32103863) {!! $item->value !!} @endif @endforeach cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara
                ruangan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mesin dinyalakan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meteran “blended” diatur antara 5-10 liter (biasanya mulai
                dari 6 liter) @foreach($res['d1'] as $item) @if($item->emrdfk == 32103867) {!! $item->value !!} @endif @endforeach liter</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Meteran “oxygen” diatur ke @foreach($res['d1'] as $item) @if($item->emrdfk == 32103869) {!! $item->value !!} @endif @endforeach % O2 = @foreach($res['d1'] as $item) @if($item->emrdfk == 32103871) {!! $item->value !!} @endif @endforeach L/menit. Lihat tabel di bawah</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">Aliran Total</td>
            <td colspan="7">5 L/mnt</td>
            <td colspan="7">6 L/mnt</td>
            <td colspan="7">7 L/mnt</td>
            <td colspan="7">8 L/mnt</td>
            <td colspan="7">9 L/mnt</td>
            <td colspan="7">10 L/mnt</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.5 O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.6 O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.7 O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.8 O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.9 O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">8.5 L O2</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Posisikan bayi dengan kepala diangkat 30 derajat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke
                “sniffing position”</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersihkan lubang hidung dan mulut dari lendir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Basahi prongs dengan air bersih atau sterile normal saline
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara
                selang dan wajah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pastikan prongs mengikuti lengkung lubang hidung dan tidak
                menyentuh dinding hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Kencangkan selang kalau posisi prongs dan selang sudah baik
                (ada gelembung di dalam air)</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Berikan “pacifier” supaya mulut tetap tertutup</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
    </table>
    <table>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RR @foreach($res['d1'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach /menit</td>
            <td class="noborder" colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Saturasi
                O2 @foreach($res['d1'] as $item) @if($item->emrdfk == 32103883) {!! $item->value !!} @endif @endforeach %</td>
            <td class="noborder" colspan="7">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  Pasien
                tenang</td>
            <td class="noborder" colspan="8">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gangguan
                napas turun</td>
        </tr>
        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d1'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB @foreach($res['d1'] as $item) @if($item->emrdfk == 32103888) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align: center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103889) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103890) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103891) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103892) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103893) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103894) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103895) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103896) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103897) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103898) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103899) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103900) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103901) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103902) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103903) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d1'] as $item) @if($item->emrdfk == 32103904) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103905) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103906) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103907) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103908) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103909) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103910) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103911) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103912) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103913) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103914) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103915) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103916) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103917) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103918) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103919) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103920) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103921) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103922) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103923) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103924) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103925) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103926) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103927) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d1'] as $item) @if($item->emrdfk == 32103928) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>
@endif

@if (!empty($res['d2']))
<body>
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
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->namapasien !!} ({!!
                            $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d2'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">66</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
        <tr >
            <td class="noborder" colspan="3">Tanggal / Pukul</td>
            <td class="noborder" colspan="16">: @foreach($res['d2'] as $item) @if($item->emrdfk == 32103842) {!! $item->value !!} @endif @endforeach </td>
            <td class="noborder" colspan="4"></td>
            <td class="noborder" colspan="26"></td>
        </tr>

      



        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder">Gangguan Pernapasan (semua usia) <img src="{{ $cpap }}" alt="" style="width: 200px;display:block; margin:auto;padding-left:300px"></td>
            {{-- <td colspan="21" rowspan="20" class="noborder">

                <img src="{{ $cpap }}" alt="" style="width: 250px;display:block; margin:auto;">

            </td> --}}
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Merintih</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi parah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                RR > 80, RR @foreach($res['d2'] as $item) @if($item->emrdfk == 32103846) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach O<sub>2</sub>
                < 85% (kalau < 1500g) ATAU < 90% (kalau> 1500g)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @foreach($res['d2'] as $item) @if($item->emrdfk == 32103848) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Usia kehamilan @foreach($res['d2'] as $item) @if($item->emrdfk == 32103850) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Berat badan @foreach($res['d2'] as $item) @if($item->emrdfk == 32103852) {!! $item->value !!} @endif @endforeach gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju napas @foreach($res['d2'] as $item) @if($item->emrdfk == 32103854) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @foreach($res['d2'] as $item) @if($item->emrdfk == 32103855) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103856) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach "Hudson prongs" yang tepat untuk lubang hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 1 : 750-1250g @foreach($res['d2'] as $item) @if($item->emrdfk == 32103858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 2 : 1250-2000g @foreach($res['d2'] as $item) @if($item->emrdfk == 32103859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 3 : 2000-3000g</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Topi yang tepat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Peniti, karet, atau selotip untuk memasang selang ke topi</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Air dipenuhi sampai tingkat 6-8 cm. @foreach($res['d2'] as $item) @if($item->emrdfk == 32103863) {!! $item->value !!} @endif @endforeach cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara
                ruangan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mesin dinyalakan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meteran “blended” diatur antara 5-10 liter (biasanya mulai
                dari 6 liter) @foreach($res['d2'] as $item) @if($item->emrdfk == 32103867) {!! $item->value !!} @endif @endforeach liter</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Meteran “oxygen” diatur ke @foreach($res['d2'] as $item) @if($item->emrdfk == 32103869) {!! $item->value !!} @endif @endforeach % O2 = @foreach($res['d2'] as $item) @if($item->emrdfk == 32103871) {!! $item->value !!} @endif @endforeach L/menit. Lihat tabel di bawah</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">Aliran Total</td>
            <td colspan="7">5 L/mnt</td>
            <td colspan="7">6 L/mnt</td>
            <td colspan="7">7 L/mnt</td>
            <td colspan="7">8 L/mnt</td>
            <td colspan="7">9 L/mnt</td>
            <td colspan="7">10 L/mnt</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.5 O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.6 O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.7 O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.8 O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.9 O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">8.5 L O2</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Posisikan bayi dengan kepala diangkat 30 derajat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke
                “sniffing position”</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersihkan lubang hidung dan mulut dari lendir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Basahi prongs dengan air bersih atau sterile normal saline
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara
                selang dan wajah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pastikan prongs mengikuti lengkung lubang hidung dan tidak
                menyentuh dinding hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Kencangkan selang kalau posisi prongs dan selang sudah baik
                (ada gelembung di dalam air)</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Berikan “pacifier” supaya mulut tetap tertutup</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
    </table>
    <table>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RR @foreach($res['d2'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach /menit</td>
            <td class="noborder" colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Saturasi
                O2 @foreach($res['d2'] as $item) @if($item->emrdfk == 32103883) {!! $item->value !!} @endif @endforeach %</td>
            <td class="noborder" colspan="7">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  Pasien
                tenang</td>
            <td class="noborder" colspan="8">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gangguan
                napas turun</td>
        </tr>
        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d2'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB @foreach($res['d2'] as $item) @if($item->emrdfk == 32103888) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align: center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103889) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103890) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103891) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103892) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103893) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103894) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103895) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103896) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103897) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103898) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103899) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103900) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103901) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103902) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103903) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d2'] as $item) @if($item->emrdfk == 32103904) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103905) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103906) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103907) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103908) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103909) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103910) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103911) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103912) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103913) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103914) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103915) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103916) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103917) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103918) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103919) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103920) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103921) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103922) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103923) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103924) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103925) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103926) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103927) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d2'] as $item) @if($item->emrdfk == 32103928) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>
@endif

@if (!empty($res['d3']))
<body>
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
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->namapasien !!} ({!!
                            $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d3'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">66</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
        <tr >
            <td class="noborder" colspan="3">Tanggal / Pukul</td>
            <td class="noborder" colspan="16">: @foreach($res['d3'] as $item) @if($item->emrdfk == 32103842) {!! $item->value !!} @endif @endforeach </td>
            <td class="noborder" colspan="4"></td>
            <td class="noborder" colspan="26"></td>
        </tr>

      



        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder">Gangguan Pernapasan (semua usia) <img src="{{ $cpap }}" alt="" style="width: 200px;display:block; margin:auto;padding-left:300px"></td>
            {{-- <td colspan="21" rowspan="20" class="noborder">

                <img src="{{ $cpap }}" alt="" style="width: 250px;display:block; margin:auto;">

            </td> --}}
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Merintih</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi parah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                RR > 80, RR @foreach($res['d3'] as $item) @if($item->emrdfk == 32103846) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach O<sub>2</sub>
                < 85% (kalau < 1500g) ATAU < 90% (kalau> 1500g)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @foreach($res['d3'] as $item) @if($item->emrdfk == 32103848) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Usia kehamilan @foreach($res['d3'] as $item) @if($item->emrdfk == 32103850) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Berat badan @foreach($res['d3'] as $item) @if($item->emrdfk == 32103852) {!! $item->value !!} @endif @endforeach gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju napas @foreach($res['d3'] as $item) @if($item->emrdfk == 32103854) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @foreach($res['d3'] as $item) @if($item->emrdfk == 32103855) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103856) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach "Hudson prongs" yang tepat untuk lubang hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 1 : 750-1250g @foreach($res['d3'] as $item) @if($item->emrdfk == 32103858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 2 : 1250-2000g @foreach($res['d3'] as $item) @if($item->emrdfk == 32103859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 3 : 2000-3000g</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Topi yang tepat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Peniti, karet, atau selotip untuk memasang selang ke topi</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Air dipenuhi sampai tingkat 6-8 cm. @foreach($res['d3'] as $item) @if($item->emrdfk == 32103863) {!! $item->value !!} @endif @endforeach cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara
                ruangan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mesin dinyalakan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meteran “blended” diatur antara 5-10 liter (biasanya mulai
                dari 6 liter) @foreach($res['d3'] as $item) @if($item->emrdfk == 32103867) {!! $item->value !!} @endif @endforeach liter</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Meteran “oxygen” diatur ke @foreach($res['d3'] as $item) @if($item->emrdfk == 32103869) {!! $item->value !!} @endif @endforeach % O2 = @foreach($res['d3'] as $item) @if($item->emrdfk == 32103871) {!! $item->value !!} @endif @endforeach L/menit. Lihat tabel di bawah</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">Aliran Total</td>
            <td colspan="7">5 L/mnt</td>
            <td colspan="7">6 L/mnt</td>
            <td colspan="7">7 L/mnt</td>
            <td colspan="7">8 L/mnt</td>
            <td colspan="7">9 L/mnt</td>
            <td colspan="7">10 L/mnt</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.5 O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.6 O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.7 O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.8 O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.9 O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">8.5 L O2</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Posisikan bayi dengan kepala diangkat 30 derajat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke
                “sniffing position”</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersihkan lubang hidung dan mulut dari lendir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Basahi prongs dengan air bersih atau sterile normal saline
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara
                selang dan wajah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pastikan prongs mengikuti lengkung lubang hidung dan tidak
                menyentuh dinding hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Kencangkan selang kalau posisi prongs dan selang sudah baik
                (ada gelembung di dalam air)</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Berikan “pacifier” supaya mulut tetap tertutup</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
    </table>
    <table>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RR @foreach($res['d3'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach /menit</td>
            <td class="noborder" colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Saturasi
                O2 @foreach($res['d3'] as $item) @if($item->emrdfk == 32103883) {!! $item->value !!} @endif @endforeach %</td>
            <td class="noborder" colspan="7">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  Pasien
                tenang</td>
            <td class="noborder" colspan="8">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gangguan
                napas turun</td>
        </tr>
        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d3'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB @foreach($res['d3'] as $item) @if($item->emrdfk == 32103888) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align: center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103889) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103890) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103891) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103892) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103893) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103894) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103895) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103896) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103897) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103898) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103899) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103900) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103901) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103902) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103903) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d3'] as $item) @if($item->emrdfk == 32103904) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103905) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103906) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103907) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103908) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103909) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103910) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103911) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103912) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103913) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103914) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103915) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103916) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103917) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103918) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103919) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103920) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103921) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103922) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103923) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103924) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103925) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103926) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103927) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d3'] as $item) @if($item->emrdfk == 32103928) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>
@endif

@if (!empty($res['d4']))
<body>
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
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->namapasien !!} ({!!
                            $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d4'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">66</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
        <tr >
            <td class="noborder" colspan="3">Tanggal / Pukul</td>
            <td class="noborder" colspan="16">: @foreach($res['d4'] as $item) @if($item->emrdfk == 32103842) {!! $item->value !!} @endif @endforeach </td>
            <td class="noborder" colspan="4"></td>
            <td class="noborder" colspan="26"></td>
        </tr>

      



        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder">Gangguan Pernapasan (semua usia) <img src="{{ $cpap }}" alt="" style="width: 200px;display:block; margin:auto;padding-left:300px"></td>
            {{-- <td colspan="21" rowspan="20" class="noborder">

                <img src="{{ $cpap }}" alt="" style="width: 250px;display:block; margin:auto;">

            </td> --}}
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Merintih</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi parah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                RR > 80, RR @foreach($res['d4'] as $item) @if($item->emrdfk == 32103846) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach O<sub>2</sub>
                < 85% (kalau < 1500g) ATAU < 90% (kalau> 1500g)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @foreach($res['d4'] as $item) @if($item->emrdfk == 32103848) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Usia kehamilan @foreach($res['d4'] as $item) @if($item->emrdfk == 32103850) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Berat badan @foreach($res['d4'] as $item) @if($item->emrdfk == 32103852) {!! $item->value !!} @endif @endforeach gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju napas @foreach($res['d4'] as $item) @if($item->emrdfk == 32103854) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @foreach($res['d4'] as $item) @if($item->emrdfk == 32103855) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103856) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach "Hudson prongs" yang tepat untuk lubang hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 1 : 750-1250g @foreach($res['d4'] as $item) @if($item->emrdfk == 32103858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 2 : 1250-2000g @foreach($res['d4'] as $item) @if($item->emrdfk == 32103859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 3 : 2000-3000g</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Topi yang tepat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Peniti, karet, atau selotip untuk memasang selang ke topi</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Air dipenuhi sampai tingkat 6-8 cm. @foreach($res['d4'] as $item) @if($item->emrdfk == 32103863) {!! $item->value !!} @endif @endforeach cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara
                ruangan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mesin dinyalakan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meteran “blended” diatur antara 5-10 liter (biasanya mulai
                dari 6 liter) @foreach($res['d4'] as $item) @if($item->emrdfk == 32103867) {!! $item->value !!} @endif @endforeach liter</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Meteran “oxygen” diatur ke @foreach($res['d4'] as $item) @if($item->emrdfk == 32103869) {!! $item->value !!} @endif @endforeach % O2 = @foreach($res['d4'] as $item) @if($item->emrdfk == 32103871) {!! $item->value !!} @endif @endforeach L/menit. Lihat tabel di bawah</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">Aliran Total</td>
            <td colspan="7">5 L/mnt</td>
            <td colspan="7">6 L/mnt</td>
            <td colspan="7">7 L/mnt</td>
            <td colspan="7">8 L/mnt</td>
            <td colspan="7">9 L/mnt</td>
            <td colspan="7">10 L/mnt</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.5 O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.6 O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.7 O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.8 O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.9 O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">8.5 L O2</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Posisikan bayi dengan kepala diangkat 30 derajat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke
                “sniffing position”</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersihkan lubang hidung dan mulut dari lendir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Basahi prongs dengan air bersih atau sterile normal saline
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara
                selang dan wajah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pastikan prongs mengikuti lengkung lubang hidung dan tidak
                menyentuh dinding hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Kencangkan selang kalau posisi prongs dan selang sudah baik
                (ada gelembung di dalam air)</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Berikan “pacifier” supaya mulut tetap tertutup</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
    </table>
    <table>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RR @foreach($res['d4'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach /menit</td>
            <td class="noborder" colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Saturasi
                O2 @foreach($res['d4'] as $item) @if($item->emrdfk == 32103883) {!! $item->value !!} @endif @endforeach %</td>
            <td class="noborder" colspan="7">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  Pasien
                tenang</td>
            <td class="noborder" colspan="8">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gangguan
                napas turun</td>
        </tr>
        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d4'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB @foreach($res['d4'] as $item) @if($item->emrdfk == 32103888) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align: center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103889) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103890) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103891) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103892) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103893) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103894) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103895) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103896) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103897) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103898) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103899) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103900) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103901) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103902) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103903) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d4'] as $item) @if($item->emrdfk == 32103904) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103905) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103906) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103907) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103908) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103909) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103910) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103911) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103912) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103913) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103914) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103915) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103916) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103917) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103918) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103919) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103920) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103921) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103922) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103923) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103924) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103925) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103926) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103927) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d4'] as $item) @if($item->emrdfk == 32103928) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>
@endif

@if (!empty($res['d5']))
<body>
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
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->namapasien !!} ({!!
                            $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d5'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">66</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
        <tr >
            <td class="noborder" colspan="3">Tanggal / Pukul</td>
            <td class="noborder" colspan="16">: @foreach($res['d5'] as $item) @if($item->emrdfk == 32103842) {!! $item->value !!} @endif @endforeach </td>
            <td class="noborder" colspan="4"></td>
            <td class="noborder" colspan="26"></td>
        </tr>

      



        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder">Gangguan Pernapasan (semua usia) <img src="{{ $cpap }}" alt="" style="width: 200px;display:block; margin:auto;padding-left:300px"></td>
            {{-- <td colspan="21" rowspan="20" class="noborder">

                <img src="{{ $cpap }}" alt="" style="width: 250px;display:block; margin:auto;">

            </td> --}}
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Merintih</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103844) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi parah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                RR > 80, RR @foreach($res['d5'] as $item) @if($item->emrdfk == 32103846) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach O<sub>2</sub>
                < 85% (kalau < 1500g) ATAU < 90% (kalau> 1500g)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @foreach($res['d5'] as $item) @if($item->emrdfk == 32103848) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Usia kehamilan @foreach($res['d5'] as $item) @if($item->emrdfk == 32103850) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Berat badan @foreach($res['d5'] as $item) @if($item->emrdfk == 32103852) {!! $item->value !!} @endif @endforeach gram</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju napas @foreach($res['d5'] as $item) @if($item->emrdfk == 32103854) {!! $item->value !!} @endif @endforeach /menit</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @foreach($res['d5'] as $item) @if($item->emrdfk == 32103855) {!! $item->value !!} @endif @endforeach %</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103856) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach "Hudson prongs" yang tepat untuk lubang hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 1 : 750-1250g @foreach($res['d5'] as $item) @if($item->emrdfk == 32103858) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 2 : 1250-2000g @foreach($res['d5'] as $item) @if($item->emrdfk == 32103859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Ukuran 3 : 2000-3000g</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Topi yang tepat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Peniti, karet, atau selotip untuk memasang selang ke topi</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Air dipenuhi sampai tingkat 6-8 cm. @foreach($res['d5'] as $item) @if($item->emrdfk == 32103863) {!! $item->value !!} @endif @endforeach cm</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara
                ruangan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Mesin dinyalakan</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Meteran “blended” diatur antara 5-10 liter (biasanya mulai
                dari 6 liter) @foreach($res['d5'] as $item) @if($item->emrdfk == 32103867) {!! $item->value !!} @endif @endforeach liter</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Meteran “oxygen” diatur ke @foreach($res['d5'] as $item) @if($item->emrdfk == 32103869) {!! $item->value !!} @endif @endforeach % O2 = @foreach($res['d5'] as $item) @if($item->emrdfk == 32103871) {!! $item->value !!} @endif @endforeach L/menit. Lihat tabel di bawah</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">Aliran Total</td>
            <td colspan="7">5 L/mnt</td>
            <td colspan="7">6 L/mnt</td>
            <td colspan="7">7 L/mnt</td>
            <td colspan="7">8 L/mnt</td>
            <td colspan="7">9 L/mnt</td>
            <td colspan="7">10 L/mnt</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.4 O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">1.5 L O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.5 O2</td>
            <td colspan="7">2 L O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.6 O2</td>
            <td colspan="7">2.5 L O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.7 O2</td>
            <td colspan="7">3 L O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">5 L O2</td>
            <td colspan="7">5.5 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.8 O2</td>
            <td colspan="7">3.5 L O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">6 L O2</td>
            <td colspan="7">6.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
        </tr>
        <tr class="text-center">
            <td colspan="7">0.9 O2</td>
            <td colspan="7">4 L O2</td>
            <td colspan="7">4.5 L O2</td>
            <td colspan="7">7 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">7.5 L O2</td>
            <td colspan="7">8.5 L O2</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103872) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Posisikan bayi dengan kepala diangkat 30 derajat</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke
                “sniffing position”</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103874) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bersihkan lubang hidung dan mulut dari lendir</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Basahi prongs dengan air bersih atau sterile normal saline
            </td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 
                Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara
                selang dan wajah</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pastikan prongs mengikuti lengkung lubang hidung dan tidak
                menyentuh dinding hidung</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Kencangkan selang kalau posisi prongs dan selang sudah baik
                (ada gelembung di dalam air)</td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="49">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
            Berikan “pacifier” supaya mulut tetap tertutup</td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
        <tr class="noborder">
            <td colspan="49" class="noborder"></td>
        </tr>
    </table>
    <table>
        <tr class="noborder">
            <td colspan="49" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RR @foreach($res['d5'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach /menit</td>
            <td class="noborder" colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Saturasi
                O2 @foreach($res['d5'] as $item) @if($item->emrdfk == 32103883) {!! $item->value !!} @endif @endforeach %</td>
            <td class="noborder" colspan="7">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  Pasien
                tenang</td>
            <td class="noborder" colspan="8">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Gangguan
                napas turun</td>
        </tr>
        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d5'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB @foreach($res['d5'] as $item) @if($item->emrdfk == 32103888) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align: center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103889) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103890) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103891) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103892) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103893) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103894) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103895) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103896) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103897) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103898) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103899) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103900) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103901) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103902) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103903) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39"> @foreach($res['d5'] as $item) @if($item->emrdfk == 32103904) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103905) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103906) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103907) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103908) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103909) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103910) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103911) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103912) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103913) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103914) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103915) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103916) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103917) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103918) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103919) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103920) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103921) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103922) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103923) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103924) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103925) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103926) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103927) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39">@foreach($res['d5'] as $item) @if($item->emrdfk == 32103928) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>
@endif
</html>
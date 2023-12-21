<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayi Sepsis</title>

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
            page-break-inside: auto;
            table-layout: fixed;
            border-collapse: collapse;
            border: 1px solid #000;
            width: 100%;
        }

        tr,
        td {
            padding: .3rem;
            page-break-inside: avoid;
            page-break-after: auto;
            border: 1px solid #000;
        }


        .noborder {
            padding: .3rem;
            page-break-inside: avoid;
            page-break-after: auto;
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
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
            font-size: x-large;
            padding: .5rem;
            height: 20pt !important;
        }
    </style>
</head>

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
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->nocm !!} </td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Nama</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->namapasien !!} ({!!
                            $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
                            $res['d'][0]->tgllahir
                            )) !!}</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="4" style="border:none;font-size:7pt;">NIK</td>
                        <td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->noidentitas !!}</td>

                    </tr>
                </table>

            </td>
            <td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
                RM</td>

        </tr>
        <tr>
            <td style="text-align:center;font-size:36px">65</td>
        </tr>
    </table>
    <table>

        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">BAYI SEPSIS</th>
        </tr>

        <tr>
            <td colspan="4" class="noborder">Berat Badan</td>
            <td colspan="21" class="noborder">: @foreach($res['d'] as $item) @if($item->emrdfk == 31100366) {!! $item->value !!} @endif @endforeach kg
            </td>
            <td colspan="5" class="noborder">Usia Kehamilan</td>
            <td colspan="19" class="noborder">:@foreach($res['d'] as $item) @if($item->emrdfk == 31100367) {!! $item->value !!} @endif @endforeach minggu</td>
        </tr>
        <tr>
            <td colspan="49">
                - Diagnosis tepat hanya dapat dilakukan dengan kultur darah. <br>
                - Kalau tak akses kultur darah, beri antibiotik selama 48 jam, lalu mengevaluasi kembali<br>
                - Diagnosis banding termasuk infeksi virus, hipoksia, meningitis, bacterial pneumonia, transient
                tachypnea pada bayi baru lahir, dll

            </td>
        </tr>
    </table>
    <table>


        <tr class="border-bt">
            <td style="padding:.5rem" class="noborder" colspan="49">

                (Cek yang sesuai)

                <table width="100%" class="noborder">
                    <tr class="border-lr">
                        <td colspan="22">Faktor Resiko Ibu</td>
                        <td colspan="5" class="border-lr"></td>
                        <td colspan="22">
                            faktor resiko Neonatal
                        </td>
                    </tr>
                    <tr class="border-lr">
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104039) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam
                            pada ibu > 38.0 <sup>0</sup>C</td>
                        <td colspan="5" class="border-lr"></td>
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104043) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ketuban pecah > 18 jam
                        </td>
                    </tr>
                    <tr class="border-lr">
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104040) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Air
                            ketuban berbau</td>
                        <td colspan="5" class="border-lr"></td>
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104044) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kelahiran &lt; 37 minggu
                        </td>
                    </tr>
                    <tr class="border-lr">
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104041) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nyeri
                            tekan uterus</td>
                        <td class="border-lr" colspan="5"></td>
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104045) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Denyut jantung janin &gt; 180
                        </td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="22">@foreach($res['d'] as $item) @if($item->emrdfk == 32104042) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Leukosit &gt; 15.000</td>
                        <td colspan="5" class="noborder"></td>
                        <td colspan="22" class="noborder">
                        </td>
                    </tr>
                    <tr class="noborder">
                        <td class="noborder" colspan="49"></td>
                    </tr>
                </table>
                <table class="noborder">
                    <tr class="noborder">
                        <td colspan="49" class="noborder">
                            Tanda Sepsis (tidak bergantung kepada usia bayi) :
                        </td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="5" class="noborder">(lingkari)</td>
                        <td colspan="10" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 36.6>S>37.5</td>
                        <td colspan="12" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tampak lesu dan sakit</td>
                        <td colspan="22" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100822) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak menghisap dengan baik</td>
                    </tr>
                    <tr class="noborder">
                        <td colspan="49" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100823) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Jika ada apa pun factor risiko ibu atau setelah dilahirkan
                            apa pun factor risiko neonatal dengan tanda sepsis, terus</td>
                    </tr>
                    <tr class="noborder">
                        <td class="noborder" colspan="49">Indikasi Lain: @foreach($res['d'] as $item) @if($item->emrdfk == 31100824) {!! $item->value !!} @endif @endforeach </td>
                    </tr>
                    <tr class="noborder">
                        <td class="noborder" colspan="8">Tanda Vital: @foreach($res['d'] as $item) @if($item->emrdfk == 31100825) {!! $item->value !!} @endif @endforeach <sup>0</sup>C</td>
                        <td class="noborder" colspan="8">DJ: @foreach($res['d'] as $item) @if($item->emrdfk == 31100826) {!! $item->value !!} @endif @endforeach </td>
                        <td class="noborder" colspan="8">RR: @foreach($res['d'] as $item) @if($item->emrdfk == 31100827) {!! $item->value !!} @endif @endforeach </td>
                        <td class="noborder" colspan="12">Saturasi O<sub>2</sub> : @foreach($res['d'] as $item) @if($item->emrdfk == 31100828) {!! $item->value !!} @endif @endforeach </td>
                        <td class="noborder" colspan="13">Komentar</td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
    <table >

        <tr class="border-lr">
            <td colspan="27" class="br noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100829) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Keadaan riwayat atau tanda dehidrasi</td>
            <td class="noborder br" colspan="22">Riwayat atau tanda dehidrasi</td>
        </tr>

        <tr class="border-lr">
            <td class="noborder btm" colspan="27">@foreach($res['d'] as $item) @if($item->emrdfk == 31100830) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Beri
                bayi susu menyusui 15 menit NGT 10cc/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 31100831) {!! $item->value !!} @endif @endforeach cc
                ATAU</td>
            <td class="noborder blf btm" colspan="11">@foreach($res['d'] as $item) @if($item->emrdfk == 31100835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach  &lt; 2
                kali air seni/hari</td>
            <td class="noborder btm" colspan="11">@foreach($res['d'] as $item) @if($item->emrdfk == 31100838) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kurang minum</td>
        </tr>
        <tr class="border-lr">
            <td colspan="27" class="br noborder">Bolus NS @foreach($res['d'] as $item) @if($item->emrdfk == 31100832) {!! $item->value !!} @endif @endforeach RL @foreach($res['d'] as $item) @if($item->emrdfk == 31100833) {!! $item->value !!} @endif @endforeach 10cc/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 31100834) {!! $item->value !!} @endif @endforeach cc selama 30 m 1j*</td>
            <td class="noborder blf"colspan="11" >@foreach($res['d'] as $item) @if($item->emrdfk == 31100836) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kurang Bergerak</td>
            <td class="noborder btm"colspan="11" class="noborder border-lt">@foreach($res['d'] as $item) @if($item->emrdfk == 31100839) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Denyut jantung &gt;160</td>
        </tr>
    
        <tr class="btm">
            <td colspan="27" class="br noborder"><small>(*beri bolusperlahan pada bayi &lt; 4 bln untuk menghindari
                    kelebihan cairan)</small></td>
            <td colspan="11" class="noborder border-lt">@foreach($res['d'] as $item) @if($item->emrdfk == 31100837) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Laju pernapasan &gt; 65</td>
            <td colspan="11" class="noborder border-lt">@foreach($res['d'] as $item) @if($item->emrdfk == 31100840) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Suhu &gt;36.5</td>
        </tr>
        <tr class="btp">
            <td colspan="27" class="br noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100841) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dapatkan kultur darah sebelum memberi
                antibiotik. Waktu : @foreach($res['d'] as $item) @if($item->emrdfk == 31100842) {!! $item->value !!} @endif @endforeach 
            </td>
            <td colspan="22" class="noborder"></td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder">
                @foreach($res['d'] as $item) @if($item->emrdfk == 31100843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Bayi ≤ 7 hari. Gentamicin1 5 mg/kg =
                @foreach($res['d'] as $item) @if($item->emrdfk == 31100844) {!! $item->value !!} @endif @endforeach mg IV/IM tiap @foreach($res['d'] as $item) @if($item->emrdfk == 31100845) {!! $item->value !!} @endif @endforeach jam +
            </td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;≤ 2.0kg: Ampicillin2 50 mg/kg q 12 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100846) {!! $item->value !!} @endif @endforeach mg IV/IM q 12 jam
            </td>
            <td colspan="22" class="text-center noborder"><strong>SELANG WAKTU PEMBERIAN GENTAMICIN 5mg/kg1</strong>
            </td>
        </tr>
        <tr>
            <td colspan="49" class="br">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> 2.0kg: Ampicillin2 50 mg/kg q 8 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100847) {!! $item->value !!} @endif @endforeach mg IV/IM q 8 jam
            </td>
        </tr>
        <tr>
            <td colspan="27" class="br">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bayi > 7 hari. Gentamicin1 5 mg/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 31100848) {!! $item->value !!} @endif @endforeach mg IV/IM tiap @foreach($res['d'] as $item) @if($item->emrdfk == 31100849) {!! $item->value !!} @endif @endforeach jam +
            </td>
            <td colspan="7" class="noborder text-center"><strong><u>Berat Badan</u></strong></td>
            <td colspan="7" class="noborder text-center"><strong><u>≤ 7 Hari</u></strong></td>
            <td colspan="8" class="noborder text-center"><strong><u>8-30 Hari</u></strong></td>
        </tr>
        <tr>
            <td colspan="27" class="br">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt; 1.2kg: Ampicillin2 50 mg/kg tiap 12 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100848) {!! $item->value !!} @endif @endforeach mg IV/IM tiap 12 jam
            </td>
            <td colspan="7" class="noborder text-center">≤ 1200 g</td>
            <td colspan="7" class="noborder text-center">Tiap 48</td>
            <td colspan="8" class="noborder text-center">Tiap 36</td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2kg-2.0kg: Ampicillin2 50 mg/kg tiap 8 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100851) {!! $item->value !!} @endif @endforeach mg IV/IM tiap 8 jam
            </td>
            <td colspan="7" class="noborder text-center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100842) {!! $item->value !!} @endif @endforeach  1200 g</td>
            <td colspan="7" class="noborder text-center">Tiap 36</td>
            <td colspan="8" class="noborder text-center">Tiap 24</td>
        </tr>
        <tr>
            <td colspan="49" class="br">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> 2kg: Ampicillin2 50 mg/kg tiap 6 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100852) {!! $item->value !!} @endif @endforeach mg IV/IM tiap 6 jam
            </td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder"></td>
            <td colspan="22" class="br noborder">
                <small>
                    <sup>1</sup> RSCM pedoman praktik klinis, Indonesi, 8/13 <br>
                    <sup>2</sup> Gomella, et al, Neonatology, McGraw Hill : 2009, page 733
                </small>
            </td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Waktu dosis pertama diberikan : @foreach($res['d'] as $item) @if($item->emrdfk == 32110721) {!! $item->value !!} @endif @endforeach 
            </td>
            <td colspan="22" class="br noborder">

            </td>
        </tr>
        <tr>
            <td colspan="27" class="br noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100853) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain : @foreach($res['d'] as $item) @if($item->emrdfk == 31100854) {!! $item->value !!} @endif @endforeach </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="btp">
            <td colspan="27" class="br noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100855) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pertimbangkan LP bila < 2 bln dan 36.5
                    ≥ S ≥ 38.0 C dan demam tidak spesifik </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                @foreach($res['d'] as $item) @if($item->emrdfk == 31100856) {!! $item->value !!} @endif @endforeach WBC @foreach($res['d'] as $item) @if($item->emrdfk == 31100857) {!! $item->value !!} @endif @endforeach 
                RBC @foreach($res['d'] as $item) @if($item->emrdfk == 31100858) {!! $item->value !!} @endif @endforeach Protein
            </td>
            <td colspan="22" class="br noborder">
                Nilai normal : WBC < 5 per mikroliter, RBC=0, <br>
                    Glukosa 45-80 mg/dL, Protein 15-45 mg/dL
            </td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 31100859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kalau WBC > 5 per microliter di CSF,
                obatkan bayi untuk meningitis
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                Bayi ≤ 7 hari. Gentamicin1 5 mg/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 31100860) {!! $item->value !!} @endif @endforeach mg IV/IM
                tiap @foreach($res['d'] as $item) @if($item->emrdfk == 31100861) {!! $item->value !!} @endif @endforeach jam +
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                ≤ 2.0kg: Ampicillin2 100 mg/kg q 12 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100862) {!! $item->value !!} @endif @endforeach mg
                IV/IM q 12 jam
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                < 1.2kg: Ampicillin2 100 mg/kg q 8 jam=@foreach($res['d'] as $item) @if($item->emrdfk == 31100863) {!! $item->value !!} @endif @endforeach mg
                    IV/IM q 8 jam </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                Bayi > 7 hari. Gentamicin1 5 mg/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 31100864) {!! $item->value !!} @endif @endforeach mg IV/IM
                tiap @foreach($res['d'] as $item) @if($item->emrdfk == 31100865) {!! $item->value !!} @endif @endforeach jam +
            </td>
            <td colspan="22" class="br "></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                < 1.2kg: Ampicillin2 100 mg/kg tiap 12 jam=@foreach($res['d'] as $item) @if($item->emrdfk == 31100866) {!! $item->value !!} @endif @endforeach mg
                    IV/IM tiap 12 jam </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                1.2kg-2.0kg: Ampicillin2 100 mg/kg tiap 8 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100867) {!! $item->value !!} @endif @endforeach mg IV/IM tiap 8 jam
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                > 2kg: Ampicillin2 100 mg/kg tiap 6 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 31100868) {!! $item->value !!} @endif @endforeach mg
                IV/IM tiap 6 jam
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder"></td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="">
            <td colspan="27" class="br noborder">
                Waktu dosis pertama diberikan : @foreach($res['d'] as $item) @if($item->emrdfk == 31100869) {!! $item->value !!} @endif @endforeach 
            </td>
            <td colspan="22" class="br noborder"></td>
        </tr>
        <tr class="btp">
            <td colspan="49" class="">
                @foreach($res['d'] as $item) @if($item->emrdfk == 31100870) {!! $item->value !!} @endif @endforeach 
            </td>
        </tr>

        <tr class="text-center">
            <td colspan="27" rowspan="2" class="br noborder">
                Tenaga Medis : @foreach($res['d'] as $item) @if($item->emrdfk == 31100871) {!! $item->value !!} @endif @endforeach 
            </td>
            <td colspan="22" rowspan="2" class="noborder">
                Tanggal / Jam : @foreach($res['d'] as $item) @if($item->emrdfk == 31100872) {!! $item->value !!} @endif @endforeach  
            </td>
        </tr>

        <tr>
            {{-- <td colspan="49" class="">
                @{{ item.obj[31100870] ? item.obj[31100870] : '.......' }}
            </td> --}}
        </tr>

        <!-- lembar ke dua  -->
        <tr style="border-top:1px solid #000">
            <td colspan="49" class="noborder">
                Nama Pasien : {!! $res['d'][0]->namapasien !!}
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">
                Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir )) !!}
            </td>
            <td colspan="37" class="noborder">
                BB : @foreach($res['d'] as $item) @if($item->emrdfk == 31100875) {!! $item->value !!} @endif @endforeach kg
            </td>
        </tr>
        <tr>
            <td colspan="12" class="noborder">

            </td>
            <td colspan="37" class="noborder">

            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center"><b>Tanggal dan Waktu</b></td>
            <td colspan="39" style="text-align:center"><b>Keterangan</b></td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100876) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100877) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100878) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100879) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100880) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100881) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100882) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100883) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100884) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100885) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100886) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100887) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100888) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100889) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100890) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100891) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100892) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100893) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100894) {!! $item->value !!} @endif @endforeach</td>
            <td colspan="39" style="text-align:center">@foreach($res['d'] as $item) @if($item->emrdfk == 31100895) {!! $item->value !!} @endif @endforeach</td>
        </tr>
    </table>
</body>

</html>
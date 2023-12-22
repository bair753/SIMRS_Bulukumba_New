<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kelahiran</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;

        }

        img {

            margin-bottom: 15px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            margin: 15px;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;


        }

        h3 {
            text-align: center;
            text-transform: uppercase;

            margin: -15px;
        }

        p {
            text-align: justify;
            margin-bottom: 15px;
            font-size: 12pt;
        }

        .address {
            text-align: center;
            margin-top: 20px;
            margin-bottom: -5px;
            font-size: 9pt;
        }

        .date {
            margin-top: 40px;
        }

        .sender {
            margin-top: 40px;
        }

        .subject {
            margin-top: 20px;
            text-align: center;
        }

        .signature {
            margin-top: 60px;
        }

        .footer {
            margin-top: 60px;
            text-align: center;
            font-style: italic;
        }

        /* Styling for tables */
        table {
            width: 100%;
            border-collapse: collapse;

            border: none;
        }

        th,
        td {
            border: none;

        }

        /* Styling for page breaks when printing */
        @media print {
            body {
                page-break-before: always;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
        <h3>PEMERINTAH KABUPATEN BULUKUMBA</h3>
        <h2>DINAS KESEHATAN</h2>
        <h3>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h3>
        <p class="address">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX.
            85030 <br> Website: https://rsud.bulukumbakab.go.id, Email: sultanhandgradja@yahoo.com</p>
        <hr style="border:2px solid #000">
    </div>
    <div class="header">
        <h3>SURAT KETERANGAN KELAHIRAN</h3>
        <p class="subject"> NOMOR: 440 / @foreach($res['d'] as $item) @if($item->emrdfk == 32108986) {!! $item->value !!} @endif @endforeach / RSUD-BLK / 2023
        </p>
    </div>
    <p>Yang bertanda tangan di bawah ini, Dokter / Bidan Rumah Sakit Umum Daerah Kab. Bulukumba menerangkan bahwa:</p>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td>Ny</td>
            <td>Nama</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108987) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Umur</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108988) {!! $item->value !!} @endif @endforeach Tahun</td>
        </tr>
        <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108989) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108990) {!! $item->value !!} @endif @endforeach </td>
        </tr>
    </table>

    <p><i>Istri dari</i></p>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td>Tn</td>
            <td>Nama</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108991) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Umur</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108992) {!! $item->value !!} @endif @endforeach Tahun</td>
        </tr>
        <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108993) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32108994) {!! $item->value !!} @endif @endforeach </td>
        </tr>
    </table>

    <p>Adalah benar telah melahirkan Anak "@foreach($res['d'] as $item) @if($item->emrdfk == 32108995) {!! $item->value !!} @endif @endforeach" di Rumah Sakit Umum Daerah H. Andi Sulthan Daeng Radja Bulukumba yang bernama 
        "@foreach($res['d'] as $item) @if($item->emrdfk == 32108996) {!! $item->value !!} @endif @endforeach" Jenis Kelamin "@foreach($res['d'] as $item) @if($item->emrdfk == 32108997) {!! $item->value !!} @endif @endforeach" 
        Pada Tanggal / Jam "@foreach($res['d'] as $item) @if($item->emrdfk == 32108998) {!! $item->value !!} @endif @endforeach" WITA.
    </p>
    <p>Demikian Surat Keterangan ini dibuat untuk digunakan sebagaimana mestinya</p>
    <table>
        <tr>
            <td colspan="4"></td>
            <td></td>
            <td colspan="4" style="border:none;text-align: left;">Bulukumba, @foreach($res['d'] as $item) @if($item->emrdfk == 32108999) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td></td>
            <td colspan="4" style="border:none;text-align: left;">Mengetahui</td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="4"></td>
            <td></td>
            <td colspan="4">Kepala Ruangan/Perawatan</td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="4" valign="bottom"></td>
            <td></td>
            <td colspan="4" valign="bottom">
                <div style="text-align: left">@foreach($res['d'] as $item) @if($item->emrdfk == 32109000) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
            </td>
        </tr>
        <tr style="text-align: left;">
            <td colspan="4" valign="bottom"></td>
            <td></td>
            <td colspan="4" valign="bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 32109000) {!! $item->value !!} @endif @endforeach </td>
        </tr>

    </table>
</body>

</html>
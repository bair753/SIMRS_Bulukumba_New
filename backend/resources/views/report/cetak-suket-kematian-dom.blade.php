<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kematian</title>
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
        <<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
        <h3>PEMERINTAH KABUPATEN BULUKUMBA</h3>
        <h2>DINAS KESEHATAN</h2>
        <h3>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h3>
        <p class="address">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX.
            85030 <br> Website: https://rsud.bulukumbakab.go.id, Email: sultanhandgradja@yahoo.com</p>
        <hr style="border:2px solid #000">
    </div>
    <div class="header">
        <h3>SURAT KETERANGAN KEMATIAN</h3>
        <p class="subject"> NOMOR: 440 / @foreach($res['d'] as $item) @if($item->emrdfk == 32104095) {!! $item->value !!} @endif @endforeach / RSUD-BLK / 2023
        </p>
    </div>
    <p>Yang bertanda tangan di bawah ini menerangkan bawah:
    </p>





    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td></td>
            <td>Nama</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32104091) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Umur</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32104092) {!! $item->value !!} @endif @endforeach Tahun</td>
        </tr>
        <tr>
            <td></td>
            <td>Pekerjaan</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32104093) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td colspan="7">: @foreach($res['d'] as $item) @if($item->emrdfk == 32104094) {!! $item->value !!} @endif @endforeach </td>
        </tr>
    </table>
    <p>Yang tersebut namanya di atas
        benar telah meninggal dunia di Rumah Sakit Umum Daerah H. Andi Sulthan Daeng Radja pada Tanggal / Jam @foreach($res['d'] as $item) @if($item->emrdfk == 32104096) {!! $item->value !!} @endif @endforeach
        yang dirawat dari tanggal
        @foreach($res['d'] as $item) @if($item->emrdfk == 32104097) {!! $item->value !!} @endif @endforeach dengan Diagnosa @foreach($res['d'] as $item) @if($item->emrdfk == 32104098) {!! $item->value !!} @endif @endforeach 
    </p>
    <p>Demikian surat keterangan ini dibuat untuk dipergunakan seperlunya</p>
    <table>

        <tr>
            <td colspan="4" style="border:none;text-align: center;">Mengetahui</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4">Dokter yang merawat</td>
            <td></td>
            <td colspan="4">Kepala Ruangan/Perawatan</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom">
                <div style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 32104099) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
            </td>
            <td></td>
            <td colspan="4" valign="bottom">
                <div style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 32104100) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 32104099) {!! $item->value !!} @endif @endforeach </td>
            <td></td>
            <td colspan="4" valign="bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 32104100) {!! $item->value !!} @endif @endforeach </td>
        </tr>

    </table>
</body>

</html>
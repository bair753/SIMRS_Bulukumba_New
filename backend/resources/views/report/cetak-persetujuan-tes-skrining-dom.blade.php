<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pernyataan Persetujuan Terhadap Tes Skrining</title>
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
        <h3>PERNYATAAN</h3>
        <h4>PERSETUJUAN TERHADAP TES SKRINING HIPOTOROID KONGENITAL</h4>
    </div>
    <p>Saya yang bertandatangan dibawah ini:
    </p>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td></td>
            <td colspan="2">Nama Ibu</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116749) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Nama Ayah</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116750) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Orang Tua / Wali</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116751) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Nama Bayi</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116752) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Jenis Kelamin</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116753) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Tanggal Lahir</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116754) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">No. Rekam Medis</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116755) {!! $item->value !!} @endif @endforeach </td>
        </tr>
    </table>
    <p style="text-align: center"><b>MENYATAKAN</b> <br> Menyetujui di lakukan Uji Saring Hipotiroid Kongenital terhadap bayi kami</p>
    <table>
        <tr style="text-align: center;">
            <td colspan="4"></td>
            <td></td>
            <td colspan="4">Bulukumba, @foreach($res['d'] as $item) @if($item->emrdfk == 32116756) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="4" style="border:none;text-align: center;">Mengetahui</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4">Petugas RSUD</td>
            <td></td>
            <td colspan="4">Orang Tua/Wali</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom">
                <div style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 32116757) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
            </td>
            <td></td>
            <td colspan="4" valign="bottom">
                <div style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 32116758) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</div>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 32116757) {!! $item->value !!} @endif @endforeach </td>
            <td></td>
            <td colspan="4" valign="bottom">@foreach($res['d'] as $item) @if($item->emrdfk == 32116758) {!! $item->value !!} @endif @endforeach </td>
        </tr>

    </table>
</body>

</html>
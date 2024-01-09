
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sitologi</title>
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
<body ng-controller="cetakSuketKematian">
    <div class="header">
        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
        <h3>PEMERINTAH KABUPATEN BULUKUMBA</h3>
        <h2>DINAS KESEHATAN</h2>
        <h3>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h3>
        <p class="address">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX.
            85030 <br> Website: https://rsud.bulukumbakab.go.id, Email: sultanhandgradja@yahoo.com</p>
        <hr style="border:2px solid #000">
    </div>
    <table width="100%" style="table-layout:fixed;border:none">
       
        <tr style="text-align:center">
            <td colspan="9" style="border:none;padding-bottom:20px"><h3>HASIL PEMERIKSAAN SITOLOGI</h3></td>
            <br>
        </tr>
        <tr style="font-size: 9pt">
            <td style="border:none" colspan="2">Nomor PA</td>
            <td style="border:none" colspan="2">: {{ $raw->nomorpa  }}</td>
            <td style="border:none" colspan="2">Nomor RM</td>
            <td style="border:none" colspan="3">: {{ $raw->nocm }}</td>
        </tr>
        <tr style="font-size: 9pt">
            <td style="border:none" colspan="2">Nama Pasien</td>
            <td style="border:none" colspan="2">: {{   $raw->namapasien  }}</td>
            <td style="border:none" colspan="2">Tanggal Diterima</td>
            <td style="border:none" colspan="3">: {{   $raw->tglterima }}</td>
        </tr>
        <tr style="font-size: 9pt">
            <td style="border:none" colspan="2">Jenis Kelamin</td>
            <td style="border:none" colspan="2">: {{  $raw->jeniskelamin }}</td>
            <td style="border:none" colspan="2">Tanggal Jawab</td>
            <td style="border:none" colspan="3">: {{ $raw->tgljawab  }}</td>
        </tr>
        <tr style="font-size: 9pt">
            <td style="border:none" colspan="2">Tanggal Lahir</td>
            <td style="border:none" colspan="2">: {{  $raw->umur }}</td>
            <td style="border:none" colspan="2">Dokter Pengirim</td>
            <td style="border:none" colspan="3">: @php 
                if (empty($raw->dokterluar)) {
                    $dokterPengirim = $raw->namadokterpengirim;
                }
                else {
                    $dokterPengirim = $raw->dokterluar;
                }
            @endphp {{ $dokterPengirim }}</td>
        </tr>
        <tr style="font-size: 9pt">
            <td style="border:none" colspan="2">Alamat</td>
            <td style="border:none" colspan="2">: {{  $raw->alamatlengkap }}</td>
            <td style="border:none" colspan="2">Poli/Bagian</td>
            <td style="border:none" colspan="3">: {{ $raw->asal }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Keterangan Klinik : </b>{{  $raw->keteranganklinik }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Diagnosa Klinik : </b>{{  $raw->diagnosaklinik }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Makroskopik : </b>{{  $raw->makroskopik }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Mikroskopik : </b>{{  $raw->mikroskopik }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Kesimpulan : </b>{{  $raw->kesimpulan }}</td>
        </tr>
        <tr style="height: 40px">
            <td colspan="9" style="border:none;text-align:justify;padding-bottom:15px;"><b>Anjuran : </b>{{  $raw->anjuran }}</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Dokter Pemeriksa</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none"><img src="data:image/png;base64, {!! $raw->qrcodedokterperiksa !!} " style="height: 70px; width:70px;"></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none">{{  $raw->namapenanggungjawab }}</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none">NIP : {{  $raw->nippns }}</td>
        </tr>

    </table>
</body>
<script>
    var d1 = {!! json_encode($raw->namapenanggungjawab )!!}
        
        if(d1 != undefined){
            jQuery('#qrcoded1').qrcode({
                width	: 70,
                height	: 70,
                text	: "Tanda Tangan Digital Oleh " + d1
            });	
        }
        $(document).ready(function () {
        window.print();
    });
</script>
</html>
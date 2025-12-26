
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan Hispatologi</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        @page{
            size:A4;
            width:210mm;
            height:279mm;
            margin-left:3rem;
            margin-top:1rem;
            margin-bottom:1rem;
            margin-right:1rem;
            transform:scale(72%);
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
        }
        table{ 
            page-break-inside:auto 
        }
        tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        }
        header{
            border:1px solid #000; 
        }
        section{
            width:210mm
        }
		.rotate{
			transform: rotate(-90deg);
		}
		.text-center{
			text-align: center;
		}
		.p05{
			padding:.2rem;
		}
        body{
            width:210mm;
            height:279mm;
            margin:0 auto;
            /* border:.1rem solid rgba(0,0,0,0.35); */
			border-bottom:none;
        }
        header{
            width:100%;
            display:flex;
            justify-content:flex-start;
            /* border:1px solid #000; */
        }
        .logo{
            width:100px;
            height:auto;
            border-right:1px solid #000;
            padding:.3rem;
        }
        img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
        .kop{
            padding:.3rem;
            align-self:center;
        }
        .kop-text{
            justify-content:center;
            align-items:center;
            align-content:center;
            text-align:center;
            font-size:smaller;
        }
        .info{
            border-left:1px solid #000;
            border-right:1px solid #000;
			border-collapse:collapse;
            flex-grow:1;
            padding:.3rem;
        }
        .code{
            display:flex;
            flex-direction:column;
            font-size:34px;
            flex-basis:15%;
            padding:0;
        }
        .code div:first-child{
            width:100%;
            background:#000;
            color:#fff;
            text-align:center;
            padding:.5rem;
        }
        .code div:last-child{
            text-align:center;
            width:100%;
            padding:.5rem;
        }
        .title{
            font-size:16pt;
            font-weight:bold;
        }
        .bg-dark{
            background:#000;
            color:#fff;
            padding:.5rem;
            text-align:center;
        }
		.bordered{
			border:1px solid black;
			border-collapse:collapse;
			padding:.2rem;
			box-sizing: border-box;
		}
        .border-top{
            border-top:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-bottom{
            border-bottom:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-left{
            border-left:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .border-right{
            border-right:.1rem solid rgba(0,0,0,0.45);
			border-collapse:collapse;
			box-sizing: border-box;
        }
        .flex{
            display:flex;
        }
        .flex .basis50{
            flex-basis:50%;
        }
        .col-2{
            display:flex;
            flex-basis:50%;
        }
        ul li:not(nth-child(1)){
            padding:.3rem;
        }
        ul li{
        list-style:none;
        }
        .basis50 ul li:first-child{
            border-bottom:1px solid #000;
            padding:.3rem;
        }
        table {
            border:1px solid #000;
            border-collapse: collapse;
            /* font-size: x-small; */
        }
        tr td{
            border:1px solid #000;
            border-collapse: collapse;
        }
        #content > tr td{
            width:20px;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem
        }
    </style>
</head>
<body ng-controller="cetakSuketKematian">
    <table width="100%" style="table-layout:fixed;border:none">
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
            @else
                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
            @endif
            </td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h2>PEMERINTAH KABUPATEN BULUKUMBA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h2>DINAS KESEHATAN BULUKUMBA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none"><h2>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h2></td>
        </tr>
        <tr style="text-align:center;border:none">
            <td colspan="9" style="border:none">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX. 85030 <br> Website: https://rsud.bulukumbakab.go.id, Email: sultanhandgradja@yahoo.com <hr style="border:2px solid #000"></td>
        </tr>
        <tr style="text-align:center">
            <td colspan="9" style="border:none;"><h3>HASIL PEMERIKSAAN HISPATOLOGI</h3></td>
        </tr>
        <tr style="height:20px"></tr>
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
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Lokasi/Bahan Jaringan : </b>{{  $raw->jaringanasal }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Cara Mendapatkan Jaringan : </b>{{  $raw->getjaringan }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Diagnosa Klinik : </b>{{  $raw->diagnosaklinik }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Keterangan Klinik : </b>{{  $raw->keteranganklinik }}</td>
        </tr>
        
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Makroskopik : </b>{{  $raw->makroskopik }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Mikroskopik : </b>{{  $raw->mikroskopik }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;text-align:justify"><b>Kesimpulan : </b>{{  $raw->kesimpulan }}</td>
        </tr>
        <tr>
            <td colspan="9" style="border:none;"><b>ICD-0 : </b>{{  $raw->diagnosa }}</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">Dokter Pemeriksa</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcoded1" style="text-align: center"></td>
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
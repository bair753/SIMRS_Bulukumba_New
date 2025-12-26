<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesmen Awal Medis Pasien Gawat Darurat</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        {{-- <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}"> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
        <!-- angular -->
        <script src="{{ asset('js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-material.js') }}" type="text/javascript"></script>
    @else
        <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}">
        <script src="{{ asset('service/js/jquery.min.js') }}"></script>
        <script src="{{ asset('service/js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        {{-- <link href="{{ asset('service/css/style.css') }}" rel="stylesheet"> --}}
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
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
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
            font-size: x-small;
            page-break-before: always;
            page-break-after: always;
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
        @media print
        {
            table {page-break-after:always}
            section {page-break-after: always;}
        }
        @media print
        {
            table {page-break-before:always}
            section {page-break-after: always;}
        }
    </style>
</head>
<body ng-controller="cetakAsesmenAwalMedisIGD">
      <section>
        
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;width:80px;" >
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                            @else
                                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                            @endif
                </td>
                <td rowspan="4" colspan="3" style="text-align:center;font-size:10px;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="3" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">08</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    ASESMEN AWAL MEDIS PASIEN GAWAT DARURAT
                </td>
            </tr>
            <tr height="20px">
                <td style="border:none;border-bottom:1px solid #000">Cara Masuk</td>
                <td style="border:none;border-bottom:1px solid #000">@{{ item.obj[420934] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Datang sendiri</td>
                <td style="border:none;border-bottom:1px solid #000">@{{ item.obj[420935] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rujukan Dari</td>
                <td colspan="3"  style="border:none;border-bottom:1px solid #000;border-right:1px solid #000">: @{{ item.obj[420936] ? item.obj[420936] : '' }}</td>
                <td colspan="2" style="border:none">Tanggal Masuk UGD</td>
                <td style="border:none;border-bottom:none;">: @{{item.obj[420932] | toDate | date:'dd MMMM yyyy'}}</td>
            </tr>
            <tr height="20px">
                <td colspan="2" style="border:none;border-bottom:1px solid #000">Cara Pembayaran</td>
                <td style="border:none;border-bottom:1px solid #000">@{{ item.obj[420938] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Umum</td>
                <td style="border:none;border-bottom:1px solid #000">@{{ item.obj[420939] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Asuransi</td>
                <td style="border:none;border-bottom:1px solid #000;">@{{ item.obj[420940] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BPJS No.</td>
                <td style="border:none;border-bottom:1px solid #000;border-right:1px solid #000">: @{{ item.obj[420941] ? item.obj[420941] : '' }}</td>
                <td colspan="2" style="border:none;border-bottom:1px solid #000">Pukul</td>
                <td style="border:none;border-bottom:1px solid #000">: @{{item.obj[420932] | toDate | date:'HH:mm'}} WITA</td>
            </tr>
            <tr height="70px">
                <td valign="top">Keluhan Saat ini</td>
                <td colspan="8">@{{ item.obj[420942] ? item.obj['keluhan_saat_ini'] : '' }}</td>
            </tr>
            <tr style="border-bottom:1px solid #000;height:20px">
                <td rowspan="5">Status Fisik</td>
                <td colspan="2" style="border:none">TD : @{{ item.obj[420943] ? item.obj[420943] : '................' }} mmHg</td>
                <td colspan="2" style="border:none;">Nadi : @{{ item.obj[420944] ? item.obj[420944] : '................' }} x/mnt</td>
                <td colspan="2" style="border:none">Suhu : @{{ item.obj[420945] ? item.obj[420945] : '................' }} <sup>o</sup>C</td>
                <td style="border:none" colspan="2">Nafas : @{{ item.obj[420946] ? item.obj[420946] : '................' }} x/mnt</td>
            </tr>
            <tr height="20px">
                <td style="border:none">Keadaan Umum</td>
                <td style="border:none">@{{ item.obj[420947] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                <td style="border:none;border-right:1px solid #000" colspan="2">@{{ item.obj[420948] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Ringan</td>
                <td style="border:none">Kesadaran</td>
                <td style="border:none">@{{ item.obj[420951] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} CM</td>
                <td style="border:none">@{{ item.obj[420952] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Apatis</td>
                <td style="border:none">@{{ item.obj[420953] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Somnolen</td>
            </tr>
            <tr height="20px">
                <td style="border:none"></td>
                <td style="border:none;border-bottom:1px solid #000">@{{ item.obj[420949] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Sedang</td>
                <td style="border:none;border-right:1px solid #000" colspan="2">@{{ item.obj[420950] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Berat</td>
                <td style="border:none"></td>
                <td style="border:none">@{{ item.obj[420954] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sopor</td>
                <td style="border:none">@{{ item.obj[420955] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Koma</td>
            </tr>
            <tr style="border:none;height:50px">
                <td colspan="8" style="border-bottom:none">General : @{{ item.obj[420956] ? item.obj['general'] : '' }}</td>
            </tr>
            <tr height="330px">
                <td colspan="4" style="border:none;">Lokalis : @{{ item.obj[420957] ? item.obj['lokalis'] : '' }}</td>
                <td colspan="4" style="text-align:center;border:none">
                   @if(stripos(\Request::url(), 'localhost') !== FALSE)
                        <img src="{{ asset('img/anatomy-tubuh.jpg') }}" alt="" style="width: 60%;display:block; margin:auto;">
                    @else
                        <img src="{{ asset('service/img/anatomy-tubuh.jpg') }}" alt="" style="width: 60%;display:block; margin:auto;">
                    @endif
                </td>
            </tr>
            <tr style="border-top:1px solid #000;height:20px">
                <td rowspan="4" valign="top">Bio-Psiko-Sosio-Spiritual</td>
                <td style="border:none" colspan="2">Masalah Psikologi</td>
                <td style="border:none">@{{ item.obj[420960] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none">@{{ item.obj[420961] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan</td>
                <td style="border:none">: @{{ item.obj[420962] ? item.obj['lokalis'] : '' }}</td>
            </tr>
            <tr height="20px">
                <td style="border:none" colspan="2">Masalah Sosial</td>
                <td style="border:none">@{{ item.obj[420964] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none">@{{ item.obj[420965] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan</td>
                <td colspan="3" style="border:none">: @{{ item.obj[420966] ? item.obj['lokalis'] : '' }}</td>
            </tr>
            <tr height="20px">
                <td style="border:none" colspan="2">Masalah cultural/bahasa</td>
                <td style="border:none" >@{{ item.obj[420968] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none" >@{{ item.obj[420969] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan</td>
                <td colspan="3" style="border:none" >: @{{ item.obj[420970] ? item.obj['lokalis'] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td style="border:none" colspan="2">Masalah Spiritual</td>
                <td style="border:none" >@{{ item.obj[420972] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none" >@{{ item.obj[420973] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan</td>
                <td colspan="3" style="border:none" >: @{{ item.obj[420974] ? item.obj['lokalis'] : '' }}</td>
            </tr>
            <tr height="20px" style="border:1px solid #000">
                <td >Ekonomi</td>
                <td style="border:none" >@{{ item.obj[420975] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PNS</td>
                <td style="border:none" >@{{ item.obj[420976] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} TNI/POLRI</td>
                <td style="border:none" >@{{ item.obj[420977] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pegawai Swasta</td>
                <td style="border:none" >@{{ item.obj[420978] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Wiraswasta</td>
                <td style="border:none" >@{{ item.obj[420979] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Petani/Nelayan</td>
                <td style="border:none" colspan="3" >@{{ item.obj[420980] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain : @{{ item.obj[420981] ? item.obj['lokalis'] : '' }}</td>
            </tr>
            <tr height="60px" style="border:none;">
                <td rowspan="2" valign="top">Riwayat Kesehatan Pasien</td>
                <td colspan="8" valign="top">Riwayat Penyakit Sebelumnya : @{{ item.obj[420982] ? item.obj['riwayat_penyakit_sebelumnya'] : '' }}</td>
            </tr>
            <tr height="60px" >
                <td colspan="8" valign="top">Riwayat Penyakit Sekarang : @{{ item.obj[420984] ? item.obj['riwayat_penyakit_sekarang'] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000;">
                <td>Riwayat Alergi</td>
                <td style="border:none;">@{{ item.obj[420985] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;text-align:right">@{{ item.obj[420986] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan : </td>
                <td colspan="6" style="border:none;">@{{ item.obj[420987] ? item.obj[420987] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000;">
                <td>Riw. Penggunaan Obat</td>
                <td style="border:none;">@{{ item.obj[420988] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                <td style="border:none;text-align:right">@{{ item.obj[420989] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ada : </td>
                <td colspan="6" style="border:none;">@{{ item.obj[420990] ? item.obj[420990] : '' }}</td>
            </tr>
            <tr height="20px" style="border:1px solid #000;">
                <td>Asesmen Nyeri</td>
                <td style="border:none;">@{{ item.obj[420991] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Nyeri</td>
                <td style="border:none;text-align:right" colspan="3">@{{ item.obj[420992] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nyeri, Menggunakan metode : </td>
                <td colspan="4" style="border:none;">@{{ item.obj[420993] ? item.obj[420993] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000;">
                <td>Risiko Jatuh</td>
                <td style="border:none">@{{ item.obj[420994] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td colspan="3" style="border:none;text-align:right">@{{ item.obj[420995] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Menggunakan Metode : </td>
                <td colspan="4" style="border:none">@{{ item.obj[420996] ? item.obj[420996] : '' }}</td>
            </tr>
            <tr height="20px" style="border:none">
                <td rowspan="2" valign="top">Asesmen Fungsional</td>
                <td colspan="2" style="border:none">Alat Bantu : @{{ item.obj[420997] ? item.obj[420997] : '' }}</td>
                <td colspan="2" style="border:none">Prothesa : @{{ item.obj[420998] ? item.obj[420998] : '' }}</td>
                <td colspan="4" style="border:none">Cacat Tubuh : @{{ item.obj[420999] ? item.obj[420999] : '' }}</td>
            </tr>
            <tr style="height:20px;border:none;border-bottom:1px solid #000">
                <td style="border:none">ADL : </td>
                <td style="border:none">@{{ item.obj[421001] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Mandiri</td>
                <td style="border:none" colspan="2">@{{ item.obj[421002] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dibantu</td>
                <td colspan="4" style="border:none">@{{ item.obj[421003] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tergantung penuh</td>
            </tr>
            <tr height="20px">
                <td rowspan="3">Risiko Nutrisional</td>
                <td style="border:none" colspan="3">BB : Cacat Tubuh : @{{ item.obj[421004] ? item.obj[421004] : '' }} g/Kg</td>
                <td colspan="5" style="border:none" colspan="4">Tinggi Badan/Panjang Badan : Cacat Tubuh : @{{ item.obj[421005] ? item.obj[421005] : '' }} cm</td>
            </tr>
            <tr height="20px">
                <td style="border:none" colspan="2">Khusus Anak dan Bayi</td>
                <td style="border:none" colspan="2">Lingkar Kepala :  @{{ item.obj[421007] ? item.obj[421007] : '' }} cm</td>
                <td colspan="4" style="border:none" colspan="3">LLA :  @{{ item.obj[421008] ? item.obj[421008] : '' }} cm</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td style="border:none" >Konsul/Dietisien :</td>
                <td style="border:none" >@{{ item.obj[421010] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak perlu</td>
                <td colspan="6" style="border:none" >@{{ item.obj[421012] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Perlu</td>
            </tr>
            <tr height="30px" style="border:none;">
                <td rowspan="3" valign="top">Kebutuhan Edukasi</td>
                <td colspan="8" style="border:none;">Edukasi awal disampaikan tentang penggunaan obat-obatan, penggunaan peralatan medis, potensi interaksi antara obat, diet dan nutrisi, manajemen nyeri, teknik rehabilitasi, dan cuci tangan yang benar kepada :</td>
            </tr>
            <tr height="20px" >
                <td colspan="2" style="border:none;">@{{ item.obj[421013] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pasien</td>
                <td colspan="6" style="border:none;">@{{ item.obj[421014] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Keluarga</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td colspan="8" style="border:none;">@{{ item.obj[421015] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak dapat memberikan edukasi kepada pasien atau keluarga, karena : @{{ item.obj[421016] ? item.obj[421016] : '' }}</td>
            </tr>
            <tr height="30px">
                <td valign="top">Diagnosa Medis</td>
                <td colspan="8">@{{ item.obj[421099] ? item.obj['diagnosa_medis'] : '' }}</td>
            </tr>
            <tr height="30px">
                <td valign="top">Pemeriksaan Penunjang</td>
                <td colspan="8">@{{ item.obj[421100] ? item.obj['pemeriksaan_penunjang'] : '' }}</td>
            </tr>
            <tr height="20px">
                <td rowspan="16" valign="top">Terapi/Tindakan</td>
                <td  style="text-align:center">Pukul(WITA)</td>
                <td  style="text-align:center" colspan="3">Terapi/Tindakan</td>
                <td style="text-align:center" colspan="2">Diberikan oleh Nama dan Paraf</td>
                <td colspan="2" style="text-align:center" colspan="2">Evaluasi</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421017] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421018] ? item.obj[421018] : '' }}</td>
                <td colspan="2">@{{ item.obj[421019] ? item.obj[421019] : '' }}</td>
                <td colspan="2">@{{ item.obj[421020] ? item.obj[421020] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421021] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421022] ? item.obj[421022] : '' }}</td>
                <td colspan="2">@{{ item.obj[421023] ? item.obj[421023] : '' }}</td>
                <td colspan="2">@{{ item.obj[421024] ? item.obj[421024] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421025] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421026] ? item.obj[421026] : '' }}</td>
                <td colspan="2">@{{ item.obj[421027] ? item.obj[421027] : '' }}</td>
                <td colspan="2">@{{ item.obj[421028] ? item.obj[421028] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421029] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421030] ? item.obj[421030] : '' }}</td>
                <td colspan="2">@{{ item.obj[421031] ? item.obj[421031] : '' }}</td>
                <td colspan="2">@{{ item.obj[421032] ? item.obj[421032] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421033] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421034] ? item.obj[421034] : '' }}</td>
                <td colspan="2">@{{ item.obj[421035] ? item.obj[421035] : '' }}</td>
                <td colspan="2">@{{ item.obj[421036] ? item.obj[421036] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421037] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421038] ? item.obj[421038] : '' }}</td>
                <td colspan="2">@{{ item.obj[421039] ? item.obj[421039] : '' }}</td>
                <td colspan="2">@{{ item.obj[421040] ? item.obj[421040] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421041] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421042] ? item.obj[421042] : '' }}</td>
                <td colspan="2">@{{ item.obj[421043] ? item.obj[421043] : '' }}</td>
                <td colspan="2">@{{ item.obj[421044] ? item.obj[421044] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421045] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421046] ? item.obj[421046] : '' }}</td>
                <td colspan="2">@{{ item.obj[421047] ? item.obj[421047] : '' }}</td>
                <td colspan="2">@{{ item.obj[421048] ? item.obj[421048] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421049] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421050] ? item.obj[421050] : '' }}</td>
                <td colspan="2">@{{ item.obj[421051] ? item.obj[421051] : '' }}</td>
                <td colspan="2">@{{ item.obj[421052] ? item.obj[421052] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421053] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421054] ? item.obj[421054] : '' }}</td>
                <td colspan="2">@{{ item.obj[421055] ? item.obj[421055] : '' }}</td>
                <td colspan="2">@{{ item.obj[421056] ? item.obj[421056] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421057] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421058] ? item.obj[421058] : '' }}</td>
                <td colspan="2">@{{ item.obj[421059] ? item.obj[421059] : '' }}</td>
                <td colspan="2">@{{ item.obj[421060] ? item.obj[421060] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421061] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421062] ? item.obj[421062] : '' }}</td>
                <td colspan="2">@{{ item.obj[421063] ? item.obj[421063] : '' }}</td>
                <td colspan="2">@{{ item.obj[421064] ? item.obj[421064] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421065] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421066] ? item.obj[421066] : '' }}</td>
                <td colspan="2">@{{ item.obj[421067] ? item.obj[421067] : '' }}</td>
                <td colspan="2">@{{ item.obj[421068] ? item.obj[421068] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421069] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421070] ? item.obj[421070] : '' }}</td>
                <td colspan="2">@{{ item.obj[421071] ? item.obj[421071] : '' }}</td>
                <td colspan="2">@{{ item.obj[421072] ? item.obj[421072] : '' }}</td>
            </tr>
            <tr height="20px">
                <td>@{{item.obj[421073] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="3">@{{ item.obj[421074] ? item.obj[421074] : '' }}</td>
                <td colspan="2">@{{ item.obj[421075] ? item.obj[421075] : '' }}</td>
                <td colspan="2">@{{ item.obj[421076] ? item.obj[421076] : '' }}</td>
            </tr>
            
            <tr height="20px">
                <td rowspan="3" valign="top">Perencanaan Pulang</td>
                <td colspan="8"  style="border:none;">@{{ item.obj[421077] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dirawat Konsul Spesialis : @{{ item.obj[421078] ? item.obj[421078] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td style="border:none;">@{{ item.obj[421079] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pulang</td>
                <td style="border:none;">@{{ item.obj[421080] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Izin dokter</td>
                <td style="border:none;" colspan="6">@{{ item.obj[421081] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Atas Permintaan Sendiri</td>
            </tr>
            <tr height="60px">
                <td colspan="8" valign="top">Terapi Pulang : @{{ item.obj[421082] ? item.obj['terapi_pulang'] : '' }}</td>
            </tr>
            <tr height="20px">
                <td rowspan="2" valign="top">Tindak Lanjut</td>
                <td style="border:none" colspan="2">Kontrol ke Poli/FKTP</td>
                <td style="border:none" colspan="4">: @{{ item.obj[421083] ? item.obj[421083] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none">Rujuk ke : @{{ item.obj[421084] ? item.obj[421084] : '' }}</td>
                <td colspan="4"  style="border:none">Alasan dirujuk: @{{ item.obj[421085] ? item.obj[421085] : '' }}</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td rowspan="2" valign="top">Kondisi Saat Pulang</td>
                <td colspan="2" style="border:none">TD : @{{ item.obj[421086] ? item.obj[421086] : '___' }} mmHg</td>
                <td  style="border:none" colspan="2">Nadi : @{{ item.obj[421087] ? item.obj[421087] : '___' }} x/mnt</td>
                <td style="border:none" colspan="2">Suhu : @{{ item.obj[421088] ? item.obj[421088] : '___' }} <sup>o</sup>C</td>
                <td style="border:none" colspan="2">Nafas : @{{ item.obj[421089] ? item.obj[421089] : '___' }} x/mnt</td>
            </tr>
            <tr height="20px" style="border-bottom:1px solid #000">
                <td style="border:none">@{{ item.obj[421090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Membaik</td>
                <td style="border:none">@{{ item.obj[421091] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Memburuk</td>
                <td style="border:none">@{{ item.obj[421092] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tetap</td>
                <td colspan="2" style="border:none;text-align:right">@{{ item.obj[421093] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Meninggal Pukul</td>
                <td style="border:none"colspan="2">: @{{item.obj[421094] | toDate | date:'dd MMMM yyyy HH:mm'}} WITA</td>
                <td style="border:none">@{{ item.obj[421095] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} DOA</td>
            </tr>
            <tr>
                <td  style="border:none;border-right:1px solid #000"colspan="5">Bulukumba : @{{item.obj[421096] | toDate | date:'dd MMMM yyyy'}} Pukul : @{{item.obj[421096] | toDate | date:'HH:mm'}} WITA</td>
                <td style="border:none">Tanda Tangan</td>
                <td style="border:none" colspan="3">: </td>
            </tr>
            <tr height="20px">
            <td colspan="5" valign="top" style="border:none;">Dokter Penanggung Jawab Pelayanan : @{{ item.obj[421097] ? item.obj[421097] : '' }}</td>
            <td colspan="4" style="border:none;border-left:1px solid #000"><div id="qrcodedpjp" style="text-align: center"></div></td>
            </tr>
        </table>
    </section>
			
</body>
<script type="text/javascript">
    var baseUrl =
            {!! json_encode(url('/')) !!}
    var angular = angular.module('angularApp', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('@{{');
            $interpolateProvider.endSymbol('}}');
        }).factory('httpService', function ($http, $q) {
            return {
                get: function (url) {
                    // $("#showLoading").show()
                    var deffer = $q.defer();
                    $http.get(baseUrl + '/' + url, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    }).then(function successCallback(response) {
                        deffer.resolve(response);
                        // $("#showLoading").hide()
                    }, function errorCallback(response) {
                        deffer.reject(response);
                        // $("#showLoading").hide()
                    });
                    return deffer.promise;
                },
            }
        })

    angular.controller('cetakAsesmenAwalMedisIGD', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: []
        }
        var dataLoad = {!! json_encode($res['d'] )!!};
        for (var i = 0; i <= dataLoad.length - 1; i++) {
            if(dataLoad[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad[i].type == "textbox") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obj[dataLoad[i].emrdfk] = chekedd
            }
            if (dataLoad[i].type == "radio") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value

            }

            if (dataLoad[i].type == "datetime") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "time") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "date") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }

            if (dataLoad[i].type == "checkboxtextbox") {
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
                $scope.item.obj2[dataLoad[i].emrdfk] = true
            }
            if (dataLoad[i].type == "textarea") {
                $('#id_'+dataLoad[i].emrdfk).html( dataLoad[i].value)
                $scope.item.obj[dataLoad[i].emrdfk] = dataLoad[i].value
            }
            if (dataLoad[i].type == "combobox") {
     
                var str = dataLoad[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obj[dataLoad[i].emrdfk] = res[1]
                    $('#id_'+dataLoad[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad[i].type == "combobox2") {
                var str = dataLoad[i].value
                var res = str.split("~");
                
                $scope.item.obj[dataLoad[i].emrdfk+""+1] = res[0]
                $scope.item.obj[dataLoad[i].emrdfk] = res[1]
                $('#id_'+dataLoad[i].emrdfk).html ( res[1])

            }

            if (dataLoad[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad[i].value
            }

            if (dataLoad[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad[i].value
            }

            if (dataLoad[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad[i].value
            }
            if (dataLoad[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad[i].value
            }
            
            if (dataLoad[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad[i].value
            }

            $scope.tglemr = dataLoad[i].tgl
            
        }

        var keluhan_saat_ini = $scope.item.obj[420942].replace(/(?:\r\n|\r|\n)/g, ', ');
        var general = $scope.item.obj[420956].replace(/(?:\r\n|\r|\n)/g, ', ');
        var lokalis = $scope.item.obj[420957].replace(/(?:\r\n|\r|\n)/g, ', ');
        var riwayat_penyakit_sebelumnya = $scope.item.obj[420982].replace(/(?:\r\n|\r|\n)/g, ', ');
        var riwayat_penyakit_sekarang = $scope.item.obj[420984].replace(/(?:\r\n|\r|\n)/g, ', ');
        var diagnosa_medis = $scope.item.obj[421099].replace(/(?:\r\n|\r|\n)/g, ', ');
        var pemeriksaan_penunjang = $scope.item.obj[421100].replace(/(?:\r\n|\r|\n)/g, ', ');
        var terapi_pulang = $scope.item.obj[421082].replace(/(?:\r\n|\r|\n)/g, ', ');

        $scope.item.obj['keluhan_saat_ini'] = keluhan_saat_ini;
        $scope.item.obj['general'] = general;
        $scope.item.obj['lokalis'] = lokalis;
        $scope.item.obj['riwayat_penyakit_sebelumnya'] = riwayat_penyakit_sebelumnya;
        $scope.item.obj['riwayat_penyakit_sekarang'] = riwayat_penyakit_sekarang;
        $scope.item.obj['diagnosa_medis'] = diagnosa_medis;
        $scope.item.obj['pemeriksaan_penunjang'] = pemeriksaan_penunjang;
        $scope.item.obj['terapi_pulang'] = terapi_pulang;
        

        var dpjp = $scope.item.obj[421097];
        jQuery('#qrcodedpjp').qrcode({
            width	: 100,
			height	: 100,
            text	: "Tanda Tangan Digital Oleh " + dpjp
        });	
    })

    angular.filter('toDate', function() {
        return function(items) {
            if(items != null){
                 return new Date(items);
            }
        };
    });
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check List Dan Observasi Transfusi Darah</title>
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
            font-size: x-small;
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
<body ng-controller="cetakTransfusiDarah">
      <section>
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                  @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
                            @else
                                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
                            @endif
                </td>
                <td rowspan="4" colspan="4" style="text-align:center;font-size:7pt;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="4" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="4" style="border:none">:  {!!  $res['d'][0]->namapasien  !!} ({{ $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="4" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="11" class="bg-dark" style="font-size:x-large">
                    CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                </td>
            </tr>
            <tr height="40px">
                <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obj[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obj[31101376] | toDate | date:'HH:mm' }}</td>
                <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obj[31101377] ? item.obj[31101377] : '' }}</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                <td colspan="3" style="border:none">@{{ item.obj[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                <td colspan="3" style="border:none">@{{ item.obj[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
            </tr>
            <tr>
                <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
            </tr>
            <tr style="border-top:1px solid #000">
                <td style="border:none">Jenis Darah</td>
                <td style="border:none">@{{ item.obj[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                <td style="border:none">@{{ item.obj[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                <td style="border:none">@{{ item.obj[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                <td style="border:none">@{{ item.obj[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                <td style="border:none" colspan="9">@{{ item.obj[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
            </tr>
            <tr>
                <td style="border:none">Golongan Darah</td>
                <td style="border:none">@{{ item.obj[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                <td style="border:none">@{{ item.obj[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                <td style="border:none">@{{ item.obj[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                <td style="border:none">@{{ item.obj[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
            </tr>
            <tr style="border:none">
                <td colspan="5" style="border:none">1: @{{ item.obj[31101387] ? item.obj[31101387] : '' }}</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">1: @{{item.obj[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">2: @{{ item.obj[31101389] ? item.obj[31101389] : '' }}</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">2: @{{item.obj[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">3: @{{ item.obj[31101391] ? item.obj[31101391] : '' }}</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">3: @{{item.obj[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">4: @{{ item.obj[31101393] ? item.obj[31101393] : '' }}</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">4: @{{item.obj[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">5: @{{ item.obj[31101395] ? item.obj[31101395] : '' }}</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">5: @{{item.obj[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="11" style="border:none"></td>
            </tr>
            <tr>
                <td colspan="5" style="border:none;text-align: center;">Petugas yang melakukan pengecekan</td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:center;border:none">Petugas 1,</td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;">Petugas 2,</td>
            </tr>
            <tr>
              <td colspan="5" style="text-align:center;border:none"><div id="qrcodePetugas1" style="text-align: center"></div></td>
              <td style="border:none"></td>
              <td colspan="5" style="text-align:center;border:none;"><div id="qrcodePetugas2" style="text-align: center"></div></td>
            </tr>
            <tr style="text-align: center;border-bottom: 1px solid #000;">
                <td colspan="5" style="border:none">(@{{ item.obj[31101397] ? item.obj[31101397] : '___________________________________________' }})</td>
                <td style="border:none"></td>
                <td colspan="5" style="border:none">(@{{ item.obj[31101398] ? item.obj[31101398] : '___________________________________________' }})</td>
            </tr>
            <tr style="text-align:center;font-weight: bolder;">
                <td rowspan="3">Tgl/Jam</td>
                <td colspan="8">CATATAN PERKEMBANGAN</td>
                <td rowspan="3" colspan="2">Stempel Nama & Tanda Tangan</td>
            </tr>
            <tr style="text-align:center;font-weight: bolder;">
                <td rowspan="2">TD</td>
                <td rowspan="2">nadi</td>
                <td rowspan="2">suhu</td>
                <td rowspan="2">pernapasan</td>
                <td colspan="2">HB</td>
                <td rowspan="2">Reaksi Transfusi</td>
                <td rowspan="2">Perbedaan Kondisi Pasien</td>
            </tr>
            <tr style="text-align:center;font-weight: bolder;">
                <td>Pre Transfusi</td>
                <td>Post Transfusi</td>
            </tr>
            <tr>
                <td>@{{item.obj[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obj[31101400] ? item.obj[31101400] : '' }}</td>
                <td>@{{ item.obj[31101401] ? item.obj[31101401] : '' }}</td>
                <td>@{{ item.obj[31101402] ? item.obj[31101402] : '' }}</td>
                <td>@{{ item.obj[31101403] ? item.obj[31101403] : '' }}</td>
                <td>@{{ item.obj[31101404] ? item.obj[31101404] : '' }}</td>
                <td>@{{ item.obj[31101405] ? item.obj[31101405] : '' }}</td>
                <td>@{{ item.obj[31101406] ? item.obj[31101406] : '' }}</td>
                <td>@{{ item.obj[31101407] ? item.obj[31101407] : '' }}</td>
                <td colspan="2">@{{ item.obj[31101408] ? item.obj[31101408] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101904] ? item.obj[31101904] : '' }}</td>
              <td>@{{ item.obj[31101905] ? item.obj[31101905] : '' }}</td>
              <td>@{{ item.obj[31101906] ? item.obj[31101906] : '' }}</td>
              <td>@{{ item.obj[31101907] ? item.obj[31101907] : '' }}</td>
              <td>@{{ item.obj[31101908] ? item.obj[31101908] : '' }}</td>
              <td>@{{ item.obj[31101909] ? item.obj[31101909] : '' }}</td>
              <td>@{{ item.obj[31101910] ? item.obj[31101910] : '' }}</td>
              <td>@{{ item.obj[31101911] ? item.obj[31101911] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101912] ? item.obj[31101912] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101914] ? item.obj[31101914] : '' }}</td>
              <td>@{{ item.obj[31101915] ? item.obj[31101915] : '' }}</td>
              <td>@{{ item.obj[31101916] ? item.obj[31101916] : '' }}</td>
              <td>@{{ item.obj[31101917] ? item.obj[31101917] : '' }}</td>
              <td>@{{ item.obj[31101918] ? item.obj[31101918] : '' }}</td>
              <td>@{{ item.obj[31101919] ? item.obj[31101919] : '' }}</td>
              <td>@{{ item.obj[31101920] ? item.obj[31101920] : '' }}</td>
              <td>@{{ item.obj[31101921] ? item.obj[31101921] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101922] ? item.obj[31101922] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101924] ? item.obj[31101924] : '' }}</td>
              <td>@{{ item.obj[31101925] ? item.obj[31101925] : '' }}</td>
              <td>@{{ item.obj[31101926] ? item.obj[31101926] : '' }}</td>
              <td>@{{ item.obj[31101927] ? item.obj[31101927] : '' }}</td>
              <td>@{{ item.obj[31101928] ? item.obj[31101928] : '' }}</td>
              <td>@{{ item.obj[31101929] ? item.obj[31101929] : '' }}</td>
              <td>@{{ item.obj[31101930] ? item.obj[31101930] : '' }}</td>
              <td>@{{ item.obj[31101931] ? item.obj[31101931] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101932] ? item.obj[31101932] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101934] ? item.obj[31101934] : '' }}</td>
              <td>@{{ item.obj[31101935] ? item.obj[31101935] : '' }}</td>
              <td>@{{ item.obj[31101936] ? item.obj[31101936] : '' }}</td>
              <td>@{{ item.obj[31101937] ? item.obj[31101937] : '' }}</td>
              <td>@{{ item.obj[31101938] ? item.obj[31101938] : '' }}</td>
              <td>@{{ item.obj[31101939] ? item.obj[31101939] : '' }}</td>
              <td>@{{ item.obj[31101940] ? item.obj[31101940] : '' }}</td>
              <td>@{{ item.obj[31101941] ? item.obj[31101941] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101942] ? item.obj[31101942] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101944] ? item.obj[31101944] : '' }}</td>
              <td>@{{ item.obj[31101945] ? item.obj[31101945] : '' }}</td>
              <td>@{{ item.obj[31101946] ? item.obj[31101946] : '' }}</td>
              <td>@{{ item.obj[31101947] ? item.obj[31101947] : '' }}</td>
              <td>@{{ item.obj[31101948] ? item.obj[31101948] : '' }}</td>
              <td>@{{ item.obj[31101949] ? item.obj[31101949] : '' }}</td>
              <td>@{{ item.obj[31101950] ? item.obj[31101950] : '' }}</td>
              <td>@{{ item.obj[31101951] ? item.obj[31101951] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101952] ? item.obj[31101952] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101954] ? item.obj[31101954] : '' }}</td>
              <td>@{{ item.obj[31101955] ? item.obj[31101955] : '' }}</td>
              <td>@{{ item.obj[31101956] ? item.obj[31101956] : '' }}</td>
              <td>@{{ item.obj[31101957] ? item.obj[31101957] : '' }}</td>
              <td>@{{ item.obj[31101958] ? item.obj[31101958] : '' }}</td>
              <td>@{{ item.obj[31101959] ? item.obj[31101959] : '' }}</td>
              <td>@{{ item.obj[31101960] ? item.obj[31101960] : '' }}</td>
              <td>@{{ item.obj[31101961] ? item.obj[31101961] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101962] ? item.obj[31101962] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101964] ? item.obj[31101964] : '' }}</td>
              <td>@{{ item.obj[31101965] ? item.obj[31101965] : '' }}</td>
              <td>@{{ item.obj[31101966] ? item.obj[31101966] : '' }}</td>
              <td>@{{ item.obj[31101967] ? item.obj[31101967] : '' }}</td>
              <td>@{{ item.obj[31101968] ? item.obj[31101968] : '' }}</td>
              <td>@{{ item.obj[31101969] ? item.obj[31101969] : '' }}</td>
              <td>@{{ item.obj[31101970] ? item.obj[31101970] : '' }}</td>
              <td>@{{ item.obj[31101971] ? item.obj[31101971] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101972] ? item.obj[31101972] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101974] ? item.obj[31101974] : '' }}</td>
              <td>@{{ item.obj[31101975] ? item.obj[31101975] : '' }}</td>
              <td>@{{ item.obj[31101976] ? item.obj[31101976] : '' }}</td>
              <td>@{{ item.obj[31101977] ? item.obj[31101977] : '' }}</td>
              <td>@{{ item.obj[31101978] ? item.obj[31101978] : '' }}</td>
              <td>@{{ item.obj[31101979] ? item.obj[31101979] : '' }}</td>
              <td>@{{ item.obj[31101980] ? item.obj[31101980] : '' }}</td>
              <td>@{{ item.obj[31101981] ? item.obj[31101981] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101982] ? item.obj[31101982] : '' }}</td>
            </tr>
            <tr>
              <td>@{{item.obj[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
              <td>@{{ item.obj[31101984] ? item.obj[31101984] : '' }}</td>
              <td>@{{ item.obj[31101985] ? item.obj[31101985] : '' }}</td>
              <td>@{{ item.obj[31101986] ? item.obj[31101986] : '' }}</td>
              <td>@{{ item.obj[31101987] ? item.obj[31101987] : '' }}</td>
              <td>@{{ item.obj[31101988] ? item.obj[31101988] : '' }}</td>
              <td>@{{ item.obj[31101989] ? item.obj[31101989] : '' }}</td>
              <td>@{{ item.obj[31101990] ? item.obj[31101990] : '' }}</td>
              <td>@{{ item.obj[31101991] ? item.obj[31101991] : '' }}</td>
              <td colspan="2">@{{ item.obj[31101992] ? item.obj[31101992] : '' }}</td>
            </tr>
            
            <tr>
                <td colspan="11" class="bg-dark" style="text-align:left"><strong>CATATAN:</strong></td>
            </tr>
            <tr>
                <td colspan="2" style="border:none">1.  Observasi Reaksi Cepat </td>
                <td colspan="9" style="border:none">: - 15 Menit Pertama dan Kedua</td>
            </tr>
            <tr>
                <td colspan="2" style="border:none">2.  Observasi Reaksi Lambat </td>
                <td colspan="9" style="border:none">: - 60 Menit Pertama dan selanjutnya tiap pergantian Shift sampai 24 jam pasca transfusi</td>
            </tr>
            <tr>
                <td colspan="11" class="bg-dark" style="text-align:left"><strong>REAKSI TRANSFUSI:</strong></td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">1. Reaksi Cepat <em>(terjadi selama transfuse atau dalam 24 jam setelah transfuse)</em></td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Reaksi Ringan</td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b. Reaksi Sedang - berat</td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
            </tr>
            <tr>
                <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                    Hemoglobinuria dan perdarahan yang tidak jelas
                </td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
            </tr>
            <tr>
                <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obj[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">3.	Penanganan Reaksi Transfusi</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;a. Hentikan segera pemberian transfusi</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;b.	Pertahankan infus dengan pemberian NaCl 0.9%</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;c.	Periksa ulang : Label darah donor, surat permintaan transfusi, identifikasi penderita</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;d.	Segera lapor terjadinya reaksi transfusi pada dokter jaga, petugas Bank Darah Rumah Sakit</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;e.	Kirim minimal 10 cc darah penderita tanpa antikoagulan bersama-sama dengan sisa darah ke laboratorium untuk penelitian reaksi transfusi</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;f.	Tamping urin penderita 24 jam</td>
            </tr>
            <tr>
                <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;g.	Kirim urin penderita untuk evaluasi sebab-sebab terjadinya reaksi transfusi dan penentuan prognosis</td>
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

  angular.controller('cetakTransfusiDarah', function ($scope, $http, httpService) {
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
      // var keluhan_saat_ini = $scope.item.obj[422203].replace(/(?:\r\n|\r|\n)/g, ', ');

      // $scope.item.obj['keluhan_saat_ini'] = keluhan_saat_ini;

      var petugas1 = $scope.item.obj[31101397];
      var petugas2 = $scope.item.obj[31101398];
      jQuery('#qrcodePetugas1').qrcode({
          width	: 100,
          height	: 100,
          text	: "Tanda Tangan Digital Oleh " + petugas1
      });	
      jQuery('#qrcodePetugas2').qrcode({
          width	: 100,
          height	: 100,
          text	: "Tanda Tangan Digital Oleh " + petugas2
      });	
  })

  angular.filter('toDate', function() {
  return function(items) {
      return new Date(items);
      };
  });
  $(document).ready(function () {
      window.print();
  });
</script>
</html>
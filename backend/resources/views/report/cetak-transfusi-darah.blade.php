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
            width:210mm;
            page-break-after: always;
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
    @if (!empty($res['d1']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep1" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp1" style="text-align: center"></div></td>
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
    @endif

    @if (!empty($res['d2']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji2[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji2[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji2[31101377] ? item.obji2[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji2[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji2[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji2[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji2[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji2[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji2[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji2[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji2[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji2[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji2[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji2[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji2[31101387] ? item.obji2[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji2[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji2[31101389] ? item.obji2[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji2[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji2[31101391] ? item.obji2[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji2[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji2[31101393] ? item.obji2[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji2[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji2[31101395] ? item.obji2[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji2[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep2" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp2" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji2[31101397] ? item.obji2[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji2[31101398] ? item.obji2[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji2[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji2[31101400] ? item.obji2[31101400] : '' }}</td>
                    <td>@{{ item.obji2[31101401] ? item.obji2[31101401] : '' }}</td>
                    <td>@{{ item.obji2[31101402] ? item.obji2[31101402] : '' }}</td>
                    <td>@{{ item.obji2[31101403] ? item.obji2[31101403] : '' }}</td>
                    <td>@{{ item.obji2[31101404] ? item.obji2[31101404] : '' }}</td>
                    <td>@{{ item.obji2[31101405] ? item.obji2[31101405] : '' }}</td>
                    <td>@{{ item.obji2[31101406] ? item.obji2[31101406] : '' }}</td>
                    <td>@{{ item.obji2[31101407] ? item.obji2[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji2[31101408] ? item.obji2[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101904] ? item.obji2[31101904] : '' }}</td>
                <td>@{{ item.obji2[31101905] ? item.obji2[31101905] : '' }}</td>
                <td>@{{ item.obji2[31101906] ? item.obji2[31101906] : '' }}</td>
                <td>@{{ item.obji2[31101907] ? item.obji2[31101907] : '' }}</td>
                <td>@{{ item.obji2[31101908] ? item.obji2[31101908] : '' }}</td>
                <td>@{{ item.obji2[31101909] ? item.obji2[31101909] : '' }}</td>
                <td>@{{ item.obji2[31101910] ? item.obji2[31101910] : '' }}</td>
                <td>@{{ item.obji2[31101911] ? item.obji2[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101912] ? item.obji2[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101914] ? item.obji2[31101914] : '' }}</td>
                <td>@{{ item.obji2[31101915] ? item.obji2[31101915] : '' }}</td>
                <td>@{{ item.obji2[31101916] ? item.obji2[31101916] : '' }}</td>
                <td>@{{ item.obji2[31101917] ? item.obji2[31101917] : '' }}</td>
                <td>@{{ item.obji2[31101918] ? item.obji2[31101918] : '' }}</td>
                <td>@{{ item.obji2[31101919] ? item.obji2[31101919] : '' }}</td>
                <td>@{{ item.obji2[31101920] ? item.obji2[31101920] : '' }}</td>
                <td>@{{ item.obji2[31101921] ? item.obji2[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101922] ? item.obji2[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101924] ? item.obji2[31101924] : '' }}</td>
                <td>@{{ item.obji2[31101925] ? item.obji2[31101925] : '' }}</td>
                <td>@{{ item.obji2[31101926] ? item.obji2[31101926] : '' }}</td>
                <td>@{{ item.obji2[31101927] ? item.obji2[31101927] : '' }}</td>
                <td>@{{ item.obji2[31101928] ? item.obji2[31101928] : '' }}</td>
                <td>@{{ item.obji2[31101929] ? item.obji2[31101929] : '' }}</td>
                <td>@{{ item.obji2[31101930] ? item.obji2[31101930] : '' }}</td>
                <td>@{{ item.obji2[31101931] ? item.obji2[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101932] ? item.obji2[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101934] ? item.obji2[31101934] : '' }}</td>
                <td>@{{ item.obji2[31101935] ? item.obji2[31101935] : '' }}</td>
                <td>@{{ item.obji2[31101936] ? item.obji2[31101936] : '' }}</td>
                <td>@{{ item.obji2[31101937] ? item.obji2[31101937] : '' }}</td>
                <td>@{{ item.obji2[31101938] ? item.obji2[31101938] : '' }}</td>
                <td>@{{ item.obji2[31101939] ? item.obji2[31101939] : '' }}</td>
                <td>@{{ item.obji2[31101940] ? item.obji2[31101940] : '' }}</td>
                <td>@{{ item.obji2[31101941] ? item.obji2[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101942] ? item.obji2[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101944] ? item.obji2[31101944] : '' }}</td>
                <td>@{{ item.obji2[31101945] ? item.obji2[31101945] : '' }}</td>
                <td>@{{ item.obji2[31101946] ? item.obji2[31101946] : '' }}</td>
                <td>@{{ item.obji2[31101947] ? item.obji2[31101947] : '' }}</td>
                <td>@{{ item.obji2[31101948] ? item.obji2[31101948] : '' }}</td>
                <td>@{{ item.obji2[31101949] ? item.obji2[31101949] : '' }}</td>
                <td>@{{ item.obji2[31101950] ? item.obji2[31101950] : '' }}</td>
                <td>@{{ item.obji2[31101951] ? item.obji2[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101952] ? item.obji2[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101954] ? item.obji2[31101954] : '' }}</td>
                <td>@{{ item.obji2[31101955] ? item.obji2[31101955] : '' }}</td>
                <td>@{{ item.obji2[31101956] ? item.obji2[31101956] : '' }}</td>
                <td>@{{ item.obji2[31101957] ? item.obji2[31101957] : '' }}</td>
                <td>@{{ item.obji2[31101958] ? item.obji2[31101958] : '' }}</td>
                <td>@{{ item.obji2[31101959] ? item.obji2[31101959] : '' }}</td>
                <td>@{{ item.obji2[31101960] ? item.obji2[31101960] : '' }}</td>
                <td>@{{ item.obji2[31101961] ? item.obji2[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101962] ? item.obji2[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101964] ? item.obji2[31101964] : '' }}</td>
                <td>@{{ item.obji2[31101965] ? item.obji2[31101965] : '' }}</td>
                <td>@{{ item.obji2[31101966] ? item.obji2[31101966] : '' }}</td>
                <td>@{{ item.obji2[31101967] ? item.obji2[31101967] : '' }}</td>
                <td>@{{ item.obji2[31101968] ? item.obji2[31101968] : '' }}</td>
                <td>@{{ item.obji2[31101969] ? item.obji2[31101969] : '' }}</td>
                <td>@{{ item.obji2[31101970] ? item.obji2[31101970] : '' }}</td>
                <td>@{{ item.obji2[31101971] ? item.obji2[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101972] ? item.obji2[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101974] ? item.obji2[31101974] : '' }}</td>
                <td>@{{ item.obji2[31101975] ? item.obji2[31101975] : '' }}</td>
                <td>@{{ item.obji2[31101976] ? item.obji2[31101976] : '' }}</td>
                <td>@{{ item.obji2[31101977] ? item.obji2[31101977] : '' }}</td>
                <td>@{{ item.obji2[31101978] ? item.obji2[31101978] : '' }}</td>
                <td>@{{ item.obji2[31101979] ? item.obji2[31101979] : '' }}</td>
                <td>@{{ item.obji2[31101980] ? item.obji2[31101980] : '' }}</td>
                <td>@{{ item.obji2[31101981] ? item.obji2[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101982] ? item.obji2[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji2[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji2[31101984] ? item.obji2[31101984] : '' }}</td>
                <td>@{{ item.obji2[31101985] ? item.obji2[31101985] : '' }}</td>
                <td>@{{ item.obji2[31101986] ? item.obji2[31101986] : '' }}</td>
                <td>@{{ item.obji2[31101987] ? item.obji2[31101987] : '' }}</td>
                <td>@{{ item.obji2[31101988] ? item.obji2[31101988] : '' }}</td>
                <td>@{{ item.obji2[31101989] ? item.obji2[31101989] : '' }}</td>
                <td>@{{ item.obji2[31101990] ? item.obji2[31101990] : '' }}</td>
                <td>@{{ item.obji2[31101991] ? item.obji2[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji2[31101992] ? item.obji2[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji2[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d3']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji3[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji3[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji3[31101377] ? item.obji3[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji3[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji3[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji3[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji3[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji3[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji3[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji3[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji3[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji3[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji3[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji3[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji3[31101387] ? item.obji3[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji3[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji3[31101389] ? item.obji3[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji3[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji3[31101391] ? item.obji3[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji3[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji3[31101393] ? item.obji3[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji3[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji3[31101395] ? item.obji3[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji3[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep3" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp3" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji3[31101397] ? item.obji3[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji3[31101398] ? item.obji3[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji3[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji3[31101400] ? item.obji3[31101400] : '' }}</td>
                    <td>@{{ item.obji3[31101401] ? item.obji3[31101401] : '' }}</td>
                    <td>@{{ item.obji3[31101402] ? item.obji3[31101402] : '' }}</td>
                    <td>@{{ item.obji3[31101403] ? item.obji3[31101403] : '' }}</td>
                    <td>@{{ item.obji3[31101404] ? item.obji3[31101404] : '' }}</td>
                    <td>@{{ item.obji3[31101405] ? item.obji3[31101405] : '' }}</td>
                    <td>@{{ item.obji3[31101406] ? item.obji3[31101406] : '' }}</td>
                    <td>@{{ item.obji3[31101407] ? item.obji3[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji3[31101408] ? item.obji3[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101904] ? item.obji3[31101904] : '' }}</td>
                <td>@{{ item.obji3[31101905] ? item.obji3[31101905] : '' }}</td>
                <td>@{{ item.obji3[31101906] ? item.obji3[31101906] : '' }}</td>
                <td>@{{ item.obji3[31101907] ? item.obji3[31101907] : '' }}</td>
                <td>@{{ item.obji3[31101908] ? item.obji3[31101908] : '' }}</td>
                <td>@{{ item.obji3[31101909] ? item.obji3[31101909] : '' }}</td>
                <td>@{{ item.obji3[31101910] ? item.obji3[31101910] : '' }}</td>
                <td>@{{ item.obji3[31101911] ? item.obji3[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101912] ? item.obji3[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101914] ? item.obji3[31101914] : '' }}</td>
                <td>@{{ item.obji3[31101915] ? item.obji3[31101915] : '' }}</td>
                <td>@{{ item.obji3[31101916] ? item.obji3[31101916] : '' }}</td>
                <td>@{{ item.obji3[31101917] ? item.obji3[31101917] : '' }}</td>
                <td>@{{ item.obji3[31101918] ? item.obji3[31101918] : '' }}</td>
                <td>@{{ item.obji3[31101919] ? item.obji3[31101919] : '' }}</td>
                <td>@{{ item.obji3[31101920] ? item.obji3[31101920] : '' }}</td>
                <td>@{{ item.obji3[31101921] ? item.obji3[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101922] ? item.obji3[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101924] ? item.obji3[31101924] : '' }}</td>
                <td>@{{ item.obji3[31101925] ? item.obji3[31101925] : '' }}</td>
                <td>@{{ item.obji3[31101926] ? item.obji3[31101926] : '' }}</td>
                <td>@{{ item.obji3[31101927] ? item.obji3[31101927] : '' }}</td>
                <td>@{{ item.obji3[31101928] ? item.obji3[31101928] : '' }}</td>
                <td>@{{ item.obji3[31101929] ? item.obji3[31101929] : '' }}</td>
                <td>@{{ item.obji3[31101930] ? item.obji3[31101930] : '' }}</td>
                <td>@{{ item.obji3[31101931] ? item.obji3[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101932] ? item.obji3[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101934] ? item.obji3[31101934] : '' }}</td>
                <td>@{{ item.obji3[31101935] ? item.obji3[31101935] : '' }}</td>
                <td>@{{ item.obji3[31101936] ? item.obji3[31101936] : '' }}</td>
                <td>@{{ item.obji3[31101937] ? item.obji3[31101937] : '' }}</td>
                <td>@{{ item.obji3[31101938] ? item.obji3[31101938] : '' }}</td>
                <td>@{{ item.obji3[31101939] ? item.obji3[31101939] : '' }}</td>
                <td>@{{ item.obji3[31101940] ? item.obji3[31101940] : '' }}</td>
                <td>@{{ item.obji3[31101941] ? item.obji3[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101942] ? item.obji3[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101944] ? item.obji3[31101944] : '' }}</td>
                <td>@{{ item.obji3[31101945] ? item.obji3[31101945] : '' }}</td>
                <td>@{{ item.obji3[31101946] ? item.obji3[31101946] : '' }}</td>
                <td>@{{ item.obji3[31101947] ? item.obji3[31101947] : '' }}</td>
                <td>@{{ item.obji3[31101948] ? item.obji3[31101948] : '' }}</td>
                <td>@{{ item.obji3[31101949] ? item.obji3[31101949] : '' }}</td>
                <td>@{{ item.obji3[31101950] ? item.obji3[31101950] : '' }}</td>
                <td>@{{ item.obji3[31101951] ? item.obji3[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101952] ? item.obji3[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101954] ? item.obji3[31101954] : '' }}</td>
                <td>@{{ item.obji3[31101955] ? item.obji3[31101955] : '' }}</td>
                <td>@{{ item.obji3[31101956] ? item.obji3[31101956] : '' }}</td>
                <td>@{{ item.obji3[31101957] ? item.obji3[31101957] : '' }}</td>
                <td>@{{ item.obji3[31101958] ? item.obji3[31101958] : '' }}</td>
                <td>@{{ item.obji3[31101959] ? item.obji3[31101959] : '' }}</td>
                <td>@{{ item.obji3[31101960] ? item.obji3[31101960] : '' }}</td>
                <td>@{{ item.obji3[31101961] ? item.obji3[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101962] ? item.obji3[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101964] ? item.obji3[31101964] : '' }}</td>
                <td>@{{ item.obji3[31101965] ? item.obji3[31101965] : '' }}</td>
                <td>@{{ item.obji3[31101966] ? item.obji3[31101966] : '' }}</td>
                <td>@{{ item.obji3[31101967] ? item.obji3[31101967] : '' }}</td>
                <td>@{{ item.obji3[31101968] ? item.obji3[31101968] : '' }}</td>
                <td>@{{ item.obji3[31101969] ? item.obji3[31101969] : '' }}</td>
                <td>@{{ item.obji3[31101970] ? item.obji3[31101970] : '' }}</td>
                <td>@{{ item.obji3[31101971] ? item.obji3[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101972] ? item.obji3[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101974] ? item.obji3[31101974] : '' }}</td>
                <td>@{{ item.obji3[31101975] ? item.obji3[31101975] : '' }}</td>
                <td>@{{ item.obji3[31101976] ? item.obji3[31101976] : '' }}</td>
                <td>@{{ item.obji3[31101977] ? item.obji3[31101977] : '' }}</td>
                <td>@{{ item.obji3[31101978] ? item.obji3[31101978] : '' }}</td>
                <td>@{{ item.obji3[31101979] ? item.obji3[31101979] : '' }}</td>
                <td>@{{ item.obji3[31101980] ? item.obji3[31101980] : '' }}</td>
                <td>@{{ item.obji3[31101981] ? item.obji3[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101982] ? item.obji3[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji3[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji3[31101984] ? item.obji3[31101984] : '' }}</td>
                <td>@{{ item.obji3[31101985] ? item.obji3[31101985] : '' }}</td>
                <td>@{{ item.obji3[31101986] ? item.obji3[31101986] : '' }}</td>
                <td>@{{ item.obji3[31101987] ? item.obji3[31101987] : '' }}</td>
                <td>@{{ item.obji3[31101988] ? item.obji3[31101988] : '' }}</td>
                <td>@{{ item.obji3[31101989] ? item.obji3[31101989] : '' }}</td>
                <td>@{{ item.obji3[31101990] ? item.obji3[31101990] : '' }}</td>
                <td>@{{ item.obji3[31101991] ? item.obji3[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji3[31101992] ? item.obji3[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji3[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d4']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji4[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji4[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji4[31101377] ? item.obji4[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji4[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji4[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji4[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji4[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji4[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji4[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji4[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji4[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji4[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji4[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji4[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji4[31101387] ? item.obji4[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji4[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji4[31101389] ? item.obji4[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji4[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji4[31101391] ? item.obji4[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji4[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji4[31101393] ? item.obji4[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji4[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji4[31101395] ? item.obji4[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji4[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep4" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp4" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji4[31101397] ? item.obji4[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji4[31101398] ? item.obji4[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji4[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji4[31101400] ? item.obji4[31101400] : '' }}</td>
                    <td>@{{ item.obji4[31101401] ? item.obji4[31101401] : '' }}</td>
                    <td>@{{ item.obji4[31101402] ? item.obji4[31101402] : '' }}</td>
                    <td>@{{ item.obji4[31101403] ? item.obji4[31101403] : '' }}</td>
                    <td>@{{ item.obji4[31101404] ? item.obji4[31101404] : '' }}</td>
                    <td>@{{ item.obji4[31101405] ? item.obji4[31101405] : '' }}</td>
                    <td>@{{ item.obji4[31101406] ? item.obji4[31101406] : '' }}</td>
                    <td>@{{ item.obji4[31101407] ? item.obji4[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji4[31101408] ? item.obji4[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101904] ? item.obji4[31101904] : '' }}</td>
                <td>@{{ item.obji4[31101905] ? item.obji4[31101905] : '' }}</td>
                <td>@{{ item.obji4[31101906] ? item.obji4[31101906] : '' }}</td>
                <td>@{{ item.obji4[31101907] ? item.obji4[31101907] : '' }}</td>
                <td>@{{ item.obji4[31101908] ? item.obji4[31101908] : '' }}</td>
                <td>@{{ item.obji4[31101909] ? item.obji4[31101909] : '' }}</td>
                <td>@{{ item.obji4[31101910] ? item.obji4[31101910] : '' }}</td>
                <td>@{{ item.obji4[31101911] ? item.obji4[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101912] ? item.obji4[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101914] ? item.obji4[31101914] : '' }}</td>
                <td>@{{ item.obji4[31101915] ? item.obji4[31101915] : '' }}</td>
                <td>@{{ item.obji4[31101916] ? item.obji4[31101916] : '' }}</td>
                <td>@{{ item.obji4[31101917] ? item.obji4[31101917] : '' }}</td>
                <td>@{{ item.obji4[31101918] ? item.obji4[31101918] : '' }}</td>
                <td>@{{ item.obji4[31101919] ? item.obji4[31101919] : '' }}</td>
                <td>@{{ item.obji4[31101920] ? item.obji4[31101920] : '' }}</td>
                <td>@{{ item.obji4[31101921] ? item.obji4[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101922] ? item.obji4[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101924] ? item.obji4[31101924] : '' }}</td>
                <td>@{{ item.obji4[31101925] ? item.obji4[31101925] : '' }}</td>
                <td>@{{ item.obji4[31101926] ? item.obji4[31101926] : '' }}</td>
                <td>@{{ item.obji4[31101927] ? item.obji4[31101927] : '' }}</td>
                <td>@{{ item.obji4[31101928] ? item.obji4[31101928] : '' }}</td>
                <td>@{{ item.obji4[31101929] ? item.obji4[31101929] : '' }}</td>
                <td>@{{ item.obji4[31101930] ? item.obji4[31101930] : '' }}</td>
                <td>@{{ item.obji4[31101931] ? item.obji4[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101932] ? item.obji4[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101934] ? item.obji4[31101934] : '' }}</td>
                <td>@{{ item.obji4[31101935] ? item.obji4[31101935] : '' }}</td>
                <td>@{{ item.obji4[31101936] ? item.obji4[31101936] : '' }}</td>
                <td>@{{ item.obji4[31101937] ? item.obji4[31101937] : '' }}</td>
                <td>@{{ item.obji4[31101938] ? item.obji4[31101938] : '' }}</td>
                <td>@{{ item.obji4[31101939] ? item.obji4[31101939] : '' }}</td>
                <td>@{{ item.obji4[31101940] ? item.obji4[31101940] : '' }}</td>
                <td>@{{ item.obji4[31101941] ? item.obji4[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101942] ? item.obji4[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101944] ? item.obji4[31101944] : '' }}</td>
                <td>@{{ item.obji4[31101945] ? item.obji4[31101945] : '' }}</td>
                <td>@{{ item.obji4[31101946] ? item.obji4[31101946] : '' }}</td>
                <td>@{{ item.obji4[31101947] ? item.obji4[31101947] : '' }}</td>
                <td>@{{ item.obji4[31101948] ? item.obji4[31101948] : '' }}</td>
                <td>@{{ item.obji4[31101949] ? item.obji4[31101949] : '' }}</td>
                <td>@{{ item.obji4[31101950] ? item.obji4[31101950] : '' }}</td>
                <td>@{{ item.obji4[31101951] ? item.obji4[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101952] ? item.obji4[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101954] ? item.obji4[31101954] : '' }}</td>
                <td>@{{ item.obji4[31101955] ? item.obji4[31101955] : '' }}</td>
                <td>@{{ item.obji4[31101956] ? item.obji4[31101956] : '' }}</td>
                <td>@{{ item.obji4[31101957] ? item.obji4[31101957] : '' }}</td>
                <td>@{{ item.obji4[31101958] ? item.obji4[31101958] : '' }}</td>
                <td>@{{ item.obji4[31101959] ? item.obji4[31101959] : '' }}</td>
                <td>@{{ item.obji4[31101960] ? item.obji4[31101960] : '' }}</td>
                <td>@{{ item.obji4[31101961] ? item.obji4[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101962] ? item.obji4[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101964] ? item.obji4[31101964] : '' }}</td>
                <td>@{{ item.obji4[31101965] ? item.obji4[31101965] : '' }}</td>
                <td>@{{ item.obji4[31101966] ? item.obji4[31101966] : '' }}</td>
                <td>@{{ item.obji4[31101967] ? item.obji4[31101967] : '' }}</td>
                <td>@{{ item.obji4[31101968] ? item.obji4[31101968] : '' }}</td>
                <td>@{{ item.obji4[31101969] ? item.obji4[31101969] : '' }}</td>
                <td>@{{ item.obji4[31101970] ? item.obji4[31101970] : '' }}</td>
                <td>@{{ item.obji4[31101971] ? item.obji4[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101972] ? item.obji4[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101974] ? item.obji4[31101974] : '' }}</td>
                <td>@{{ item.obji4[31101975] ? item.obji4[31101975] : '' }}</td>
                <td>@{{ item.obji4[31101976] ? item.obji4[31101976] : '' }}</td>
                <td>@{{ item.obji4[31101977] ? item.obji4[31101977] : '' }}</td>
                <td>@{{ item.obji4[31101978] ? item.obji4[31101978] : '' }}</td>
                <td>@{{ item.obji4[31101979] ? item.obji4[31101979] : '' }}</td>
                <td>@{{ item.obji4[31101980] ? item.obji4[31101980] : '' }}</td>
                <td>@{{ item.obji4[31101981] ? item.obji4[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101982] ? item.obji4[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji4[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji4[31101984] ? item.obji4[31101984] : '' }}</td>
                <td>@{{ item.obji4[31101985] ? item.obji4[31101985] : '' }}</td>
                <td>@{{ item.obji4[31101986] ? item.obji4[31101986] : '' }}</td>
                <td>@{{ item.obji4[31101987] ? item.obji4[31101987] : '' }}</td>
                <td>@{{ item.obji4[31101988] ? item.obji4[31101988] : '' }}</td>
                <td>@{{ item.obji4[31101989] ? item.obji4[31101989] : '' }}</td>
                <td>@{{ item.obji4[31101990] ? item.obji4[31101990] : '' }}</td>
                <td>@{{ item.obji4[31101991] ? item.obji4[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji4[31101992] ? item.obji4[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji4[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d5']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji5[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji5[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji5[31101377] ? item.obji5[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji5[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji5[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji5[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji5[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji5[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji5[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji5[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji5[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji5[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji5[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji5[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji5[31101387] ? item.obji5[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji5[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji5[31101389] ? item.obji5[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji5[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji5[31101391] ? item.obji5[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji5[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji5[31101393] ? item.obji5[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji5[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji5[31101395] ? item.obji5[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji5[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep5" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp5" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji5[31101397] ? item.obji5[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji5[31101398] ? item.obji5[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji5[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji5[31101400] ? item.obji5[31101400] : '' }}</td>
                    <td>@{{ item.obji5[31101401] ? item.obji5[31101401] : '' }}</td>
                    <td>@{{ item.obji5[31101402] ? item.obji5[31101402] : '' }}</td>
                    <td>@{{ item.obji5[31101403] ? item.obji5[31101403] : '' }}</td>
                    <td>@{{ item.obji5[31101404] ? item.obji5[31101404] : '' }}</td>
                    <td>@{{ item.obji5[31101405] ? item.obji5[31101405] : '' }}</td>
                    <td>@{{ item.obji5[31101406] ? item.obji5[31101406] : '' }}</td>
                    <td>@{{ item.obji5[31101407] ? item.obji5[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji5[31101408] ? item.obji5[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101904] ? item.obji5[31101904] : '' }}</td>
                <td>@{{ item.obji5[31101905] ? item.obji5[31101905] : '' }}</td>
                <td>@{{ item.obji5[31101906] ? item.obji5[31101906] : '' }}</td>
                <td>@{{ item.obji5[31101907] ? item.obji5[31101907] : '' }}</td>
                <td>@{{ item.obji5[31101908] ? item.obji5[31101908] : '' }}</td>
                <td>@{{ item.obji5[31101909] ? item.obji5[31101909] : '' }}</td>
                <td>@{{ item.obji5[31101910] ? item.obji5[31101910] : '' }}</td>
                <td>@{{ item.obji5[31101911] ? item.obji5[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101912] ? item.obji5[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101914] ? item.obji5[31101914] : '' }}</td>
                <td>@{{ item.obji5[31101915] ? item.obji5[31101915] : '' }}</td>
                <td>@{{ item.obji5[31101916] ? item.obji5[31101916] : '' }}</td>
                <td>@{{ item.obji5[31101917] ? item.obji5[31101917] : '' }}</td>
                <td>@{{ item.obji5[31101918] ? item.obji5[31101918] : '' }}</td>
                <td>@{{ item.obji5[31101919] ? item.obji5[31101919] : '' }}</td>
                <td>@{{ item.obji5[31101920] ? item.obji5[31101920] : '' }}</td>
                <td>@{{ item.obji5[31101921] ? item.obji5[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101922] ? item.obji5[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101924] ? item.obji5[31101924] : '' }}</td>
                <td>@{{ item.obji5[31101925] ? item.obji5[31101925] : '' }}</td>
                <td>@{{ item.obji5[31101926] ? item.obji5[31101926] : '' }}</td>
                <td>@{{ item.obji5[31101927] ? item.obji5[31101927] : '' }}</td>
                <td>@{{ item.obji5[31101928] ? item.obji5[31101928] : '' }}</td>
                <td>@{{ item.obji5[31101929] ? item.obji5[31101929] : '' }}</td>
                <td>@{{ item.obji5[31101930] ? item.obji5[31101930] : '' }}</td>
                <td>@{{ item.obji5[31101931] ? item.obji5[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101932] ? item.obji5[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101934] ? item.obji5[31101934] : '' }}</td>
                <td>@{{ item.obji5[31101935] ? item.obji5[31101935] : '' }}</td>
                <td>@{{ item.obji5[31101936] ? item.obji5[31101936] : '' }}</td>
                <td>@{{ item.obji5[31101937] ? item.obji5[31101937] : '' }}</td>
                <td>@{{ item.obji5[31101938] ? item.obji5[31101938] : '' }}</td>
                <td>@{{ item.obji5[31101939] ? item.obji5[31101939] : '' }}</td>
                <td>@{{ item.obji5[31101940] ? item.obji5[31101940] : '' }}</td>
                <td>@{{ item.obji5[31101941] ? item.obji5[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101942] ? item.obji5[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101944] ? item.obji5[31101944] : '' }}</td>
                <td>@{{ item.obji5[31101945] ? item.obji5[31101945] : '' }}</td>
                <td>@{{ item.obji5[31101946] ? item.obji5[31101946] : '' }}</td>
                <td>@{{ item.obji5[31101947] ? item.obji5[31101947] : '' }}</td>
                <td>@{{ item.obji5[31101948] ? item.obji5[31101948] : '' }}</td>
                <td>@{{ item.obji5[31101949] ? item.obji5[31101949] : '' }}</td>
                <td>@{{ item.obji5[31101950] ? item.obji5[31101950] : '' }}</td>
                <td>@{{ item.obji5[31101951] ? item.obji5[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101952] ? item.obji5[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101954] ? item.obji5[31101954] : '' }}</td>
                <td>@{{ item.obji5[31101955] ? item.obji5[31101955] : '' }}</td>
                <td>@{{ item.obji5[31101956] ? item.obji5[31101956] : '' }}</td>
                <td>@{{ item.obji5[31101957] ? item.obji5[31101957] : '' }}</td>
                <td>@{{ item.obji5[31101958] ? item.obji5[31101958] : '' }}</td>
                <td>@{{ item.obji5[31101959] ? item.obji5[31101959] : '' }}</td>
                <td>@{{ item.obji5[31101960] ? item.obji5[31101960] : '' }}</td>
                <td>@{{ item.obji5[31101961] ? item.obji5[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101962] ? item.obji5[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101964] ? item.obji5[31101964] : '' }}</td>
                <td>@{{ item.obji5[31101965] ? item.obji5[31101965] : '' }}</td>
                <td>@{{ item.obji5[31101966] ? item.obji5[31101966] : '' }}</td>
                <td>@{{ item.obji5[31101967] ? item.obji5[31101967] : '' }}</td>
                <td>@{{ item.obji5[31101968] ? item.obji5[31101968] : '' }}</td>
                <td>@{{ item.obji5[31101969] ? item.obji5[31101969] : '' }}</td>
                <td>@{{ item.obji5[31101970] ? item.obji5[31101970] : '' }}</td>
                <td>@{{ item.obji5[31101971] ? item.obji5[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101972] ? item.obji5[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101974] ? item.obji5[31101974] : '' }}</td>
                <td>@{{ item.obji5[31101975] ? item.obji5[31101975] : '' }}</td>
                <td>@{{ item.obji5[31101976] ? item.obji5[31101976] : '' }}</td>
                <td>@{{ item.obji5[31101977] ? item.obji5[31101977] : '' }}</td>
                <td>@{{ item.obji5[31101978] ? item.obji5[31101978] : '' }}</td>
                <td>@{{ item.obji5[31101979] ? item.obji5[31101979] : '' }}</td>
                <td>@{{ item.obji5[31101980] ? item.obji5[31101980] : '' }}</td>
                <td>@{{ item.obji5[31101981] ? item.obji5[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101982] ? item.obji5[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji5[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji5[31101984] ? item.obji5[31101984] : '' }}</td>
                <td>@{{ item.obji5[31101985] ? item.obji5[31101985] : '' }}</td>
                <td>@{{ item.obji5[31101986] ? item.obji5[31101986] : '' }}</td>
                <td>@{{ item.obji5[31101987] ? item.obji5[31101987] : '' }}</td>
                <td>@{{ item.obji5[31101988] ? item.obji5[31101988] : '' }}</td>
                <td>@{{ item.obji5[31101989] ? item.obji5[31101989] : '' }}</td>
                <td>@{{ item.obji5[31101990] ? item.obji5[31101990] : '' }}</td>
                <td>@{{ item.obji5[31101991] ? item.obji5[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji5[31101992] ? item.obji5[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji5[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d6']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji6[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji6[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji6[31101377] ? item.obji6[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji6[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji6[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji6[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji6[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji6[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji6[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji6[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji6[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji6[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji6[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji6[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji6[31101387] ? item.obji6[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji6[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji6[31101389] ? item.obji6[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji6[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji6[31101391] ? item.obji6[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji6[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji6[31101393] ? item.obji6[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji6[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji6[31101395] ? item.obji6[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji6[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep6" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp6" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji6[31101397] ? item.obji6[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji6[31101398] ? item.obji6[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji6[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji6[31101400] ? item.obji6[31101400] : '' }}</td>
                    <td>@{{ item.obji6[31101401] ? item.obji6[31101401] : '' }}</td>
                    <td>@{{ item.obji6[31101402] ? item.obji6[31101402] : '' }}</td>
                    <td>@{{ item.obji6[31101403] ? item.obji6[31101403] : '' }}</td>
                    <td>@{{ item.obji6[31101404] ? item.obji6[31101404] : '' }}</td>
                    <td>@{{ item.obji6[31101405] ? item.obji6[31101405] : '' }}</td>
                    <td>@{{ item.obji6[31101406] ? item.obji6[31101406] : '' }}</td>
                    <td>@{{ item.obji6[31101407] ? item.obji6[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji6[31101408] ? item.obji6[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101904] ? item.obji6[31101904] : '' }}</td>
                <td>@{{ item.obji6[31101905] ? item.obji6[31101905] : '' }}</td>
                <td>@{{ item.obji6[31101906] ? item.obji6[31101906] : '' }}</td>
                <td>@{{ item.obji6[31101907] ? item.obji6[31101907] : '' }}</td>
                <td>@{{ item.obji6[31101908] ? item.obji6[31101908] : '' }}</td>
                <td>@{{ item.obji6[31101909] ? item.obji6[31101909] : '' }}</td>
                <td>@{{ item.obji6[31101910] ? item.obji6[31101910] : '' }}</td>
                <td>@{{ item.obji6[31101911] ? item.obji6[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101912] ? item.obji6[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101914] ? item.obji6[31101914] : '' }}</td>
                <td>@{{ item.obji6[31101915] ? item.obji6[31101915] : '' }}</td>
                <td>@{{ item.obji6[31101916] ? item.obji6[31101916] : '' }}</td>
                <td>@{{ item.obji6[31101917] ? item.obji6[31101917] : '' }}</td>
                <td>@{{ item.obji6[31101918] ? item.obji6[31101918] : '' }}</td>
                <td>@{{ item.obji6[31101919] ? item.obji6[31101919] : '' }}</td>
                <td>@{{ item.obji6[31101920] ? item.obji6[31101920] : '' }}</td>
                <td>@{{ item.obji6[31101921] ? item.obji6[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101922] ? item.obji6[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101924] ? item.obji6[31101924] : '' }}</td>
                <td>@{{ item.obji6[31101925] ? item.obji6[31101925] : '' }}</td>
                <td>@{{ item.obji6[31101926] ? item.obji6[31101926] : '' }}</td>
                <td>@{{ item.obji6[31101927] ? item.obji6[31101927] : '' }}</td>
                <td>@{{ item.obji6[31101928] ? item.obji6[31101928] : '' }}</td>
                <td>@{{ item.obji6[31101929] ? item.obji6[31101929] : '' }}</td>
                <td>@{{ item.obji6[31101930] ? item.obji6[31101930] : '' }}</td>
                <td>@{{ item.obji6[31101931] ? item.obji6[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101932] ? item.obji6[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101934] ? item.obji6[31101934] : '' }}</td>
                <td>@{{ item.obji6[31101935] ? item.obji6[31101935] : '' }}</td>
                <td>@{{ item.obji6[31101936] ? item.obji6[31101936] : '' }}</td>
                <td>@{{ item.obji6[31101937] ? item.obji6[31101937] : '' }}</td>
                <td>@{{ item.obji6[31101938] ? item.obji6[31101938] : '' }}</td>
                <td>@{{ item.obji6[31101939] ? item.obji6[31101939] : '' }}</td>
                <td>@{{ item.obji6[31101940] ? item.obji6[31101940] : '' }}</td>
                <td>@{{ item.obji6[31101941] ? item.obji6[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101942] ? item.obji6[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101944] ? item.obji6[31101944] : '' }}</td>
                <td>@{{ item.obji6[31101945] ? item.obji6[31101945] : '' }}</td>
                <td>@{{ item.obji6[31101946] ? item.obji6[31101946] : '' }}</td>
                <td>@{{ item.obji6[31101947] ? item.obji6[31101947] : '' }}</td>
                <td>@{{ item.obji6[31101948] ? item.obji6[31101948] : '' }}</td>
                <td>@{{ item.obji6[31101949] ? item.obji6[31101949] : '' }}</td>
                <td>@{{ item.obji6[31101950] ? item.obji6[31101950] : '' }}</td>
                <td>@{{ item.obji6[31101951] ? item.obji6[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101952] ? item.obji6[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101954] ? item.obji6[31101954] : '' }}</td>
                <td>@{{ item.obji6[31101955] ? item.obji6[31101955] : '' }}</td>
                <td>@{{ item.obji6[31101956] ? item.obji6[31101956] : '' }}</td>
                <td>@{{ item.obji6[31101957] ? item.obji6[31101957] : '' }}</td>
                <td>@{{ item.obji6[31101958] ? item.obji6[31101958] : '' }}</td>
                <td>@{{ item.obji6[31101959] ? item.obji6[31101959] : '' }}</td>
                <td>@{{ item.obji6[31101960] ? item.obji6[31101960] : '' }}</td>
                <td>@{{ item.obji6[31101961] ? item.obji6[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101962] ? item.obji6[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101964] ? item.obji6[31101964] : '' }}</td>
                <td>@{{ item.obji6[31101965] ? item.obji6[31101965] : '' }}</td>
                <td>@{{ item.obji6[31101966] ? item.obji6[31101966] : '' }}</td>
                <td>@{{ item.obji6[31101967] ? item.obji6[31101967] : '' }}</td>
                <td>@{{ item.obji6[31101968] ? item.obji6[31101968] : '' }}</td>
                <td>@{{ item.obji6[31101969] ? item.obji6[31101969] : '' }}</td>
                <td>@{{ item.obji6[31101970] ? item.obji6[31101970] : '' }}</td>
                <td>@{{ item.obji6[31101971] ? item.obji6[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101972] ? item.obji6[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101974] ? item.obji6[31101974] : '' }}</td>
                <td>@{{ item.obji6[31101975] ? item.obji6[31101975] : '' }}</td>
                <td>@{{ item.obji6[31101976] ? item.obji6[31101976] : '' }}</td>
                <td>@{{ item.obji6[31101977] ? item.obji6[31101977] : '' }}</td>
                <td>@{{ item.obji6[31101978] ? item.obji6[31101978] : '' }}</td>
                <td>@{{ item.obji6[31101979] ? item.obji6[31101979] : '' }}</td>
                <td>@{{ item.obji6[31101980] ? item.obji6[31101980] : '' }}</td>
                <td>@{{ item.obji6[31101981] ? item.obji6[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101982] ? item.obji6[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji6[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji6[31101984] ? item.obji6[31101984] : '' }}</td>
                <td>@{{ item.obji6[31101985] ? item.obji6[31101985] : '' }}</td>
                <td>@{{ item.obji6[31101986] ? item.obji6[31101986] : '' }}</td>
                <td>@{{ item.obji6[31101987] ? item.obji6[31101987] : '' }}</td>
                <td>@{{ item.obji6[31101988] ? item.obji6[31101988] : '' }}</td>
                <td>@{{ item.obji6[31101989] ? item.obji6[31101989] : '' }}</td>
                <td>@{{ item.obji6[31101990] ? item.obji6[31101990] : '' }}</td>
                <td>@{{ item.obji6[31101991] ? item.obji6[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji6[31101992] ? item.obji6[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji6[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d7']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji7[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji7[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji7[31101377] ? item.obji7[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji7[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji7[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji7[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji7[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji7[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji7[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji7[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji7[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji7[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji7[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji7[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji7[31101387] ? item.obji7[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji7[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji7[31101389] ? item.obji7[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji7[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji7[31101391] ? item.obji7[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji7[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji7[31101393] ? item.obji7[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji7[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji7[31101395] ? item.obji7[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji7[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep7" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp7" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji7[31101397] ? item.obji7[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji7[31101398] ? item.obji7[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji7[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji7[31101400] ? item.obji7[31101400] : '' }}</td>
                    <td>@{{ item.obji7[31101401] ? item.obji7[31101401] : '' }}</td>
                    <td>@{{ item.obji7[31101402] ? item.obji7[31101402] : '' }}</td>
                    <td>@{{ item.obji7[31101403] ? item.obji7[31101403] : '' }}</td>
                    <td>@{{ item.obji7[31101404] ? item.obji7[31101404] : '' }}</td>
                    <td>@{{ item.obji7[31101405] ? item.obji7[31101405] : '' }}</td>
                    <td>@{{ item.obji7[31101406] ? item.obji7[31101406] : '' }}</td>
                    <td>@{{ item.obji7[31101407] ? item.obji7[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji7[31101408] ? item.obji7[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101904] ? item.obji7[31101904] : '' }}</td>
                <td>@{{ item.obji7[31101905] ? item.obji7[31101905] : '' }}</td>
                <td>@{{ item.obji7[31101906] ? item.obji7[31101906] : '' }}</td>
                <td>@{{ item.obji7[31101907] ? item.obji7[31101907] : '' }}</td>
                <td>@{{ item.obji7[31101908] ? item.obji7[31101908] : '' }}</td>
                <td>@{{ item.obji7[31101909] ? item.obji7[31101909] : '' }}</td>
                <td>@{{ item.obji7[31101910] ? item.obji7[31101910] : '' }}</td>
                <td>@{{ item.obji7[31101911] ? item.obji7[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101912] ? item.obji7[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101914] ? item.obji7[31101914] : '' }}</td>
                <td>@{{ item.obji7[31101915] ? item.obji7[31101915] : '' }}</td>
                <td>@{{ item.obji7[31101916] ? item.obji7[31101916] : '' }}</td>
                <td>@{{ item.obji7[31101917] ? item.obji7[31101917] : '' }}</td>
                <td>@{{ item.obji7[31101918] ? item.obji7[31101918] : '' }}</td>
                <td>@{{ item.obji7[31101919] ? item.obji7[31101919] : '' }}</td>
                <td>@{{ item.obji7[31101920] ? item.obji7[31101920] : '' }}</td>
                <td>@{{ item.obji7[31101921] ? item.obji7[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101922] ? item.obji7[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101924] ? item.obji7[31101924] : '' }}</td>
                <td>@{{ item.obji7[31101925] ? item.obji7[31101925] : '' }}</td>
                <td>@{{ item.obji7[31101926] ? item.obji7[31101926] : '' }}</td>
                <td>@{{ item.obji7[31101927] ? item.obji7[31101927] : '' }}</td>
                <td>@{{ item.obji7[31101928] ? item.obji7[31101928] : '' }}</td>
                <td>@{{ item.obji7[31101929] ? item.obji7[31101929] : '' }}</td>
                <td>@{{ item.obji7[31101930] ? item.obji7[31101930] : '' }}</td>
                <td>@{{ item.obji7[31101931] ? item.obji7[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101932] ? item.obji7[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101934] ? item.obji7[31101934] : '' }}</td>
                <td>@{{ item.obji7[31101935] ? item.obji7[31101935] : '' }}</td>
                <td>@{{ item.obji7[31101936] ? item.obji7[31101936] : '' }}</td>
                <td>@{{ item.obji7[31101937] ? item.obji7[31101937] : '' }}</td>
                <td>@{{ item.obji7[31101938] ? item.obji7[31101938] : '' }}</td>
                <td>@{{ item.obji7[31101939] ? item.obji7[31101939] : '' }}</td>
                <td>@{{ item.obji7[31101940] ? item.obji7[31101940] : '' }}</td>
                <td>@{{ item.obji7[31101941] ? item.obji7[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101942] ? item.obji7[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101944] ? item.obji7[31101944] : '' }}</td>
                <td>@{{ item.obji7[31101945] ? item.obji7[31101945] : '' }}</td>
                <td>@{{ item.obji7[31101946] ? item.obji7[31101946] : '' }}</td>
                <td>@{{ item.obji7[31101947] ? item.obji7[31101947] : '' }}</td>
                <td>@{{ item.obji7[31101948] ? item.obji7[31101948] : '' }}</td>
                <td>@{{ item.obji7[31101949] ? item.obji7[31101949] : '' }}</td>
                <td>@{{ item.obji7[31101950] ? item.obji7[31101950] : '' }}</td>
                <td>@{{ item.obji7[31101951] ? item.obji7[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101952] ? item.obji7[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101954] ? item.obji7[31101954] : '' }}</td>
                <td>@{{ item.obji7[31101955] ? item.obji7[31101955] : '' }}</td>
                <td>@{{ item.obji7[31101956] ? item.obji7[31101956] : '' }}</td>
                <td>@{{ item.obji7[31101957] ? item.obji7[31101957] : '' }}</td>
                <td>@{{ item.obji7[31101958] ? item.obji7[31101958] : '' }}</td>
                <td>@{{ item.obji7[31101959] ? item.obji7[31101959] : '' }}</td>
                <td>@{{ item.obji7[31101960] ? item.obji7[31101960] : '' }}</td>
                <td>@{{ item.obji7[31101961] ? item.obji7[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101962] ? item.obji7[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101964] ? item.obji7[31101964] : '' }}</td>
                <td>@{{ item.obji7[31101965] ? item.obji7[31101965] : '' }}</td>
                <td>@{{ item.obji7[31101966] ? item.obji7[31101966] : '' }}</td>
                <td>@{{ item.obji7[31101967] ? item.obji7[31101967] : '' }}</td>
                <td>@{{ item.obji7[31101968] ? item.obji7[31101968] : '' }}</td>
                <td>@{{ item.obji7[31101969] ? item.obji7[31101969] : '' }}</td>
                <td>@{{ item.obji7[31101970] ? item.obji7[31101970] : '' }}</td>
                <td>@{{ item.obji7[31101971] ? item.obji7[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101972] ? item.obji7[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101974] ? item.obji7[31101974] : '' }}</td>
                <td>@{{ item.obji7[31101975] ? item.obji7[31101975] : '' }}</td>
                <td>@{{ item.obji7[31101976] ? item.obji7[31101976] : '' }}</td>
                <td>@{{ item.obji7[31101977] ? item.obji7[31101977] : '' }}</td>
                <td>@{{ item.obji7[31101978] ? item.obji7[31101978] : '' }}</td>
                <td>@{{ item.obji7[31101979] ? item.obji7[31101979] : '' }}</td>
                <td>@{{ item.obji7[31101980] ? item.obji7[31101980] : '' }}</td>
                <td>@{{ item.obji7[31101981] ? item.obji7[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101982] ? item.obji7[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji7[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji7[31101984] ? item.obji7[31101984] : '' }}</td>
                <td>@{{ item.obji7[31101985] ? item.obji7[31101985] : '' }}</td>
                <td>@{{ item.obji7[31101986] ? item.obji7[31101986] : '' }}</td>
                <td>@{{ item.obji7[31101987] ? item.obji7[31101987] : '' }}</td>
                <td>@{{ item.obji7[31101988] ? item.obji7[31101988] : '' }}</td>
                <td>@{{ item.obji7[31101989] ? item.obji7[31101989] : '' }}</td>
                <td>@{{ item.obji7[31101990] ? item.obji7[31101990] : '' }}</td>
                <td>@{{ item.obji7[31101991] ? item.obji7[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji7[31101992] ? item.obji7[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji7[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d8']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji8[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji8[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji8[31101377] ? item.obji8[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji8[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji8[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji8[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji8[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji8[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji8[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji8[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji8[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji8[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji8[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji8[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji8[31101387] ? item.obji8[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji8[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji8[31101389] ? item.obji8[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji8[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji8[31101391] ? item.obji8[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji8[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji8[31101393] ? item.obji8[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji8[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji8[31101395] ? item.obji8[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji8[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep8" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp8" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji8[31101397] ? item.obji8[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji8[31101398] ? item.obji8[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji8[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji8[31101400] ? item.obji8[31101400] : '' }}</td>
                    <td>@{{ item.obji8[31101401] ? item.obji8[31101401] : '' }}</td>
                    <td>@{{ item.obji8[31101402] ? item.obji8[31101402] : '' }}</td>
                    <td>@{{ item.obji8[31101403] ? item.obji8[31101403] : '' }}</td>
                    <td>@{{ item.obji8[31101404] ? item.obji8[31101404] : '' }}</td>
                    <td>@{{ item.obji8[31101405] ? item.obji8[31101405] : '' }}</td>
                    <td>@{{ item.obji8[31101406] ? item.obji8[31101406] : '' }}</td>
                    <td>@{{ item.obji8[31101407] ? item.obji8[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji8[31101408] ? item.obji8[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101904] ? item.obji8[31101904] : '' }}</td>
                <td>@{{ item.obji8[31101905] ? item.obji8[31101905] : '' }}</td>
                <td>@{{ item.obji8[31101906] ? item.obji8[31101906] : '' }}</td>
                <td>@{{ item.obji8[31101907] ? item.obji8[31101907] : '' }}</td>
                <td>@{{ item.obji8[31101908] ? item.obji8[31101908] : '' }}</td>
                <td>@{{ item.obji8[31101909] ? item.obji8[31101909] : '' }}</td>
                <td>@{{ item.obji8[31101910] ? item.obji8[31101910] : '' }}</td>
                <td>@{{ item.obji8[31101911] ? item.obji8[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101912] ? item.obji8[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101914] ? item.obji8[31101914] : '' }}</td>
                <td>@{{ item.obji8[31101915] ? item.obji8[31101915] : '' }}</td>
                <td>@{{ item.obji8[31101916] ? item.obji8[31101916] : '' }}</td>
                <td>@{{ item.obji8[31101917] ? item.obji8[31101917] : '' }}</td>
                <td>@{{ item.obji8[31101918] ? item.obji8[31101918] : '' }}</td>
                <td>@{{ item.obji8[31101919] ? item.obji8[31101919] : '' }}</td>
                <td>@{{ item.obji8[31101920] ? item.obji8[31101920] : '' }}</td>
                <td>@{{ item.obji8[31101921] ? item.obji8[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101922] ? item.obji8[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101924] ? item.obji8[31101924] : '' }}</td>
                <td>@{{ item.obji8[31101925] ? item.obji8[31101925] : '' }}</td>
                <td>@{{ item.obji8[31101926] ? item.obji8[31101926] : '' }}</td>
                <td>@{{ item.obji8[31101927] ? item.obji8[31101927] : '' }}</td>
                <td>@{{ item.obji8[31101928] ? item.obji8[31101928] : '' }}</td>
                <td>@{{ item.obji8[31101929] ? item.obji8[31101929] : '' }}</td>
                <td>@{{ item.obji8[31101930] ? item.obji8[31101930] : '' }}</td>
                <td>@{{ item.obji8[31101931] ? item.obji8[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101932] ? item.obji8[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101934] ? item.obji8[31101934] : '' }}</td>
                <td>@{{ item.obji8[31101935] ? item.obji8[31101935] : '' }}</td>
                <td>@{{ item.obji8[31101936] ? item.obji8[31101936] : '' }}</td>
                <td>@{{ item.obji8[31101937] ? item.obji8[31101937] : '' }}</td>
                <td>@{{ item.obji8[31101938] ? item.obji8[31101938] : '' }}</td>
                <td>@{{ item.obji8[31101939] ? item.obji8[31101939] : '' }}</td>
                <td>@{{ item.obji8[31101940] ? item.obji8[31101940] : '' }}</td>
                <td>@{{ item.obji8[31101941] ? item.obji8[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101942] ? item.obji8[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101944] ? item.obji8[31101944] : '' }}</td>
                <td>@{{ item.obji8[31101945] ? item.obji8[31101945] : '' }}</td>
                <td>@{{ item.obji8[31101946] ? item.obji8[31101946] : '' }}</td>
                <td>@{{ item.obji8[31101947] ? item.obji8[31101947] : '' }}</td>
                <td>@{{ item.obji8[31101948] ? item.obji8[31101948] : '' }}</td>
                <td>@{{ item.obji8[31101949] ? item.obji8[31101949] : '' }}</td>
                <td>@{{ item.obji8[31101950] ? item.obji8[31101950] : '' }}</td>
                <td>@{{ item.obji8[31101951] ? item.obji8[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101952] ? item.obji8[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101954] ? item.obji8[31101954] : '' }}</td>
                <td>@{{ item.obji8[31101955] ? item.obji8[31101955] : '' }}</td>
                <td>@{{ item.obji8[31101956] ? item.obji8[31101956] : '' }}</td>
                <td>@{{ item.obji8[31101957] ? item.obji8[31101957] : '' }}</td>
                <td>@{{ item.obji8[31101958] ? item.obji8[31101958] : '' }}</td>
                <td>@{{ item.obji8[31101959] ? item.obji8[31101959] : '' }}</td>
                <td>@{{ item.obji8[31101960] ? item.obji8[31101960] : '' }}</td>
                <td>@{{ item.obji8[31101961] ? item.obji8[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101962] ? item.obji8[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101964] ? item.obji8[31101964] : '' }}</td>
                <td>@{{ item.obji8[31101965] ? item.obji8[31101965] : '' }}</td>
                <td>@{{ item.obji8[31101966] ? item.obji8[31101966] : '' }}</td>
                <td>@{{ item.obji8[31101967] ? item.obji8[31101967] : '' }}</td>
                <td>@{{ item.obji8[31101968] ? item.obji8[31101968] : '' }}</td>
                <td>@{{ item.obji8[31101969] ? item.obji8[31101969] : '' }}</td>
                <td>@{{ item.obji8[31101970] ? item.obji8[31101970] : '' }}</td>
                <td>@{{ item.obji8[31101971] ? item.obji8[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101972] ? item.obji8[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101974] ? item.obji8[31101974] : '' }}</td>
                <td>@{{ item.obji8[31101975] ? item.obji8[31101975] : '' }}</td>
                <td>@{{ item.obji8[31101976] ? item.obji8[31101976] : '' }}</td>
                <td>@{{ item.obji8[31101977] ? item.obji8[31101977] : '' }}</td>
                <td>@{{ item.obji8[31101978] ? item.obji8[31101978] : '' }}</td>
                <td>@{{ item.obji8[31101979] ? item.obji8[31101979] : '' }}</td>
                <td>@{{ item.obji8[31101980] ? item.obji8[31101980] : '' }}</td>
                <td>@{{ item.obji8[31101981] ? item.obji8[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101982] ? item.obji8[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji8[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji8[31101984] ? item.obji8[31101984] : '' }}</td>
                <td>@{{ item.obji8[31101985] ? item.obji8[31101985] : '' }}</td>
                <td>@{{ item.obji8[31101986] ? item.obji8[31101986] : '' }}</td>
                <td>@{{ item.obji8[31101987] ? item.obji8[31101987] : '' }}</td>
                <td>@{{ item.obji8[31101988] ? item.obji8[31101988] : '' }}</td>
                <td>@{{ item.obji8[31101989] ? item.obji8[31101989] : '' }}</td>
                <td>@{{ item.obji8[31101990] ? item.obji8[31101990] : '' }}</td>
                <td>@{{ item.obji8[31101991] ? item.obji8[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji8[31101992] ? item.obji8[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji8[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d9']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji9[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji9[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji9[31101377] ? item.obji9[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji9[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji9[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji9[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji9[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji9[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji9[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji9[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji9[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji9[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji9[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji9[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji9[31101387] ? item.obji9[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji9[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji9[31101389] ? item.obji9[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji9[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji9[31101391] ? item.obji9[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji9[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji9[31101393] ? item.obji9[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji9[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji9[31101395] ? item.obji9[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji9[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep9" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp9" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji9[31101397] ? item.obji9[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji9[31101398] ? item.obji9[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji9[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji9[31101400] ? item.obji9[31101400] : '' }}</td>
                    <td>@{{ item.obji9[31101401] ? item.obji9[31101401] : '' }}</td>
                    <td>@{{ item.obji9[31101402] ? item.obji9[31101402] : '' }}</td>
                    <td>@{{ item.obji9[31101403] ? item.obji9[31101403] : '' }}</td>
                    <td>@{{ item.obji9[31101404] ? item.obji9[31101404] : '' }}</td>
                    <td>@{{ item.obji9[31101405] ? item.obji9[31101405] : '' }}</td>
                    <td>@{{ item.obji9[31101406] ? item.obji9[31101406] : '' }}</td>
                    <td>@{{ item.obji9[31101407] ? item.obji9[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji9[31101408] ? item.obji9[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101904] ? item.obji9[31101904] : '' }}</td>
                <td>@{{ item.obji9[31101905] ? item.obji9[31101905] : '' }}</td>
                <td>@{{ item.obji9[31101906] ? item.obji9[31101906] : '' }}</td>
                <td>@{{ item.obji9[31101907] ? item.obji9[31101907] : '' }}</td>
                <td>@{{ item.obji9[31101908] ? item.obji9[31101908] : '' }}</td>
                <td>@{{ item.obji9[31101909] ? item.obji9[31101909] : '' }}</td>
                <td>@{{ item.obji9[31101910] ? item.obji9[31101910] : '' }}</td>
                <td>@{{ item.obji9[31101911] ? item.obji9[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101912] ? item.obji9[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101914] ? item.obji9[31101914] : '' }}</td>
                <td>@{{ item.obji9[31101915] ? item.obji9[31101915] : '' }}</td>
                <td>@{{ item.obji9[31101916] ? item.obji9[31101916] : '' }}</td>
                <td>@{{ item.obji9[31101917] ? item.obji9[31101917] : '' }}</td>
                <td>@{{ item.obji9[31101918] ? item.obji9[31101918] : '' }}</td>
                <td>@{{ item.obji9[31101919] ? item.obji9[31101919] : '' }}</td>
                <td>@{{ item.obji9[31101920] ? item.obji9[31101920] : '' }}</td>
                <td>@{{ item.obji9[31101921] ? item.obji9[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101922] ? item.obji9[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101924] ? item.obji9[31101924] : '' }}</td>
                <td>@{{ item.obji9[31101925] ? item.obji9[31101925] : '' }}</td>
                <td>@{{ item.obji9[31101926] ? item.obji9[31101926] : '' }}</td>
                <td>@{{ item.obji9[31101927] ? item.obji9[31101927] : '' }}</td>
                <td>@{{ item.obji9[31101928] ? item.obji9[31101928] : '' }}</td>
                <td>@{{ item.obji9[31101929] ? item.obji9[31101929] : '' }}</td>
                <td>@{{ item.obji9[31101930] ? item.obji9[31101930] : '' }}</td>
                <td>@{{ item.obji9[31101931] ? item.obji9[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101932] ? item.obji9[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101934] ? item.obji9[31101934] : '' }}</td>
                <td>@{{ item.obji9[31101935] ? item.obji9[31101935] : '' }}</td>
                <td>@{{ item.obji9[31101936] ? item.obji9[31101936] : '' }}</td>
                <td>@{{ item.obji9[31101937] ? item.obji9[31101937] : '' }}</td>
                <td>@{{ item.obji9[31101938] ? item.obji9[31101938] : '' }}</td>
                <td>@{{ item.obji9[31101939] ? item.obji9[31101939] : '' }}</td>
                <td>@{{ item.obji9[31101940] ? item.obji9[31101940] : '' }}</td>
                <td>@{{ item.obji9[31101941] ? item.obji9[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101942] ? item.obji9[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101944] ? item.obji9[31101944] : '' }}</td>
                <td>@{{ item.obji9[31101945] ? item.obji9[31101945] : '' }}</td>
                <td>@{{ item.obji9[31101946] ? item.obji9[31101946] : '' }}</td>
                <td>@{{ item.obji9[31101947] ? item.obji9[31101947] : '' }}</td>
                <td>@{{ item.obji9[31101948] ? item.obji9[31101948] : '' }}</td>
                <td>@{{ item.obji9[31101949] ? item.obji9[31101949] : '' }}</td>
                <td>@{{ item.obji9[31101950] ? item.obji9[31101950] : '' }}</td>
                <td>@{{ item.obji9[31101951] ? item.obji9[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101952] ? item.obji9[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101954] ? item.obji9[31101954] : '' }}</td>
                <td>@{{ item.obji9[31101955] ? item.obji9[31101955] : '' }}</td>
                <td>@{{ item.obji9[31101956] ? item.obji9[31101956] : '' }}</td>
                <td>@{{ item.obji9[31101957] ? item.obji9[31101957] : '' }}</td>
                <td>@{{ item.obji9[31101958] ? item.obji9[31101958] : '' }}</td>
                <td>@{{ item.obji9[31101959] ? item.obji9[31101959] : '' }}</td>
                <td>@{{ item.obji9[31101960] ? item.obji9[31101960] : '' }}</td>
                <td>@{{ item.obji9[31101961] ? item.obji9[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101962] ? item.obji9[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101964] ? item.obji9[31101964] : '' }}</td>
                <td>@{{ item.obji9[31101965] ? item.obji9[31101965] : '' }}</td>
                <td>@{{ item.obji9[31101966] ? item.obji9[31101966] : '' }}</td>
                <td>@{{ item.obji9[31101967] ? item.obji9[31101967] : '' }}</td>
                <td>@{{ item.obji9[31101968] ? item.obji9[31101968] : '' }}</td>
                <td>@{{ item.obji9[31101969] ? item.obji9[31101969] : '' }}</td>
                <td>@{{ item.obji9[31101970] ? item.obji9[31101970] : '' }}</td>
                <td>@{{ item.obji9[31101971] ? item.obji9[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101972] ? item.obji9[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101974] ? item.obji9[31101974] : '' }}</td>
                <td>@{{ item.obji9[31101975] ? item.obji9[31101975] : '' }}</td>
                <td>@{{ item.obji9[31101976] ? item.obji9[31101976] : '' }}</td>
                <td>@{{ item.obji9[31101977] ? item.obji9[31101977] : '' }}</td>
                <td>@{{ item.obji9[31101978] ? item.obji9[31101978] : '' }}</td>
                <td>@{{ item.obji9[31101979] ? item.obji9[31101979] : '' }}</td>
                <td>@{{ item.obji9[31101980] ? item.obji9[31101980] : '' }}</td>
                <td>@{{ item.obji9[31101981] ? item.obji9[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101982] ? item.obji9[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji9[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji9[31101984] ? item.obji9[31101984] : '' }}</td>
                <td>@{{ item.obji9[31101985] ? item.obji9[31101985] : '' }}</td>
                <td>@{{ item.obji9[31101986] ? item.obji9[31101986] : '' }}</td>
                <td>@{{ item.obji9[31101987] ? item.obji9[31101987] : '' }}</td>
                <td>@{{ item.obji9[31101988] ? item.obji9[31101988] : '' }}</td>
                <td>@{{ item.obji9[31101989] ? item.obji9[31101989] : '' }}</td>
                <td>@{{ item.obji9[31101990] ? item.obji9[31101990] : '' }}</td>
                <td>@{{ item.obji9[31101991] ? item.obji9[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji9[31101992] ? item.obji9[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji9[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d10']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji10[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji10[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji10[31101377] ? item.obji10[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji10[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji10[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji10[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji10[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji10[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji10[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji10[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji10[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji10[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji10[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji10[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji10[31101387] ? item.obji10[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji10[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji10[31101389] ? item.obji10[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji10[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji10[31101391] ? item.obji10[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji10[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji10[31101393] ? item.obji10[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji10[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji10[31101395] ? item.obji10[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji10[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep10" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp10" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji10[31101397] ? item.obji10[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji10[31101398] ? item.obji10[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji10[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji10[31101400] ? item.obji10[31101400] : '' }}</td>
                    <td>@{{ item.obji10[31101401] ? item.obji10[31101401] : '' }}</td>
                    <td>@{{ item.obji10[31101402] ? item.obji10[31101402] : '' }}</td>
                    <td>@{{ item.obji10[31101403] ? item.obji10[31101403] : '' }}</td>
                    <td>@{{ item.obji10[31101404] ? item.obji10[31101404] : '' }}</td>
                    <td>@{{ item.obji10[31101405] ? item.obji10[31101405] : '' }}</td>
                    <td>@{{ item.obji10[31101406] ? item.obji10[31101406] : '' }}</td>
                    <td>@{{ item.obji10[31101407] ? item.obji10[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji10[31101408] ? item.obji10[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101904] ? item.obji10[31101904] : '' }}</td>
                <td>@{{ item.obji10[31101905] ? item.obji10[31101905] : '' }}</td>
                <td>@{{ item.obji10[31101906] ? item.obji10[31101906] : '' }}</td>
                <td>@{{ item.obji10[31101907] ? item.obji10[31101907] : '' }}</td>
                <td>@{{ item.obji10[31101908] ? item.obji10[31101908] : '' }}</td>
                <td>@{{ item.obji10[31101909] ? item.obji10[31101909] : '' }}</td>
                <td>@{{ item.obji10[31101910] ? item.obji10[31101910] : '' }}</td>
                <td>@{{ item.obji10[31101911] ? item.obji10[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101912] ? item.obji10[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101914] ? item.obji10[31101914] : '' }}</td>
                <td>@{{ item.obji10[31101915] ? item.obji10[31101915] : '' }}</td>
                <td>@{{ item.obji10[31101916] ? item.obji10[31101916] : '' }}</td>
                <td>@{{ item.obji10[31101917] ? item.obji10[31101917] : '' }}</td>
                <td>@{{ item.obji10[31101918] ? item.obji10[31101918] : '' }}</td>
                <td>@{{ item.obji10[31101919] ? item.obji10[31101919] : '' }}</td>
                <td>@{{ item.obji10[31101920] ? item.obji10[31101920] : '' }}</td>
                <td>@{{ item.obji10[31101921] ? item.obji10[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101922] ? item.obji10[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101924] ? item.obji10[31101924] : '' }}</td>
                <td>@{{ item.obji10[31101925] ? item.obji10[31101925] : '' }}</td>
                <td>@{{ item.obji10[31101926] ? item.obji10[31101926] : '' }}</td>
                <td>@{{ item.obji10[31101927] ? item.obji10[31101927] : '' }}</td>
                <td>@{{ item.obji10[31101928] ? item.obji10[31101928] : '' }}</td>
                <td>@{{ item.obji10[31101929] ? item.obji10[31101929] : '' }}</td>
                <td>@{{ item.obji10[31101930] ? item.obji10[31101930] : '' }}</td>
                <td>@{{ item.obji10[31101931] ? item.obji10[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101932] ? item.obji10[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101934] ? item.obji10[31101934] : '' }}</td>
                <td>@{{ item.obji10[31101935] ? item.obji10[31101935] : '' }}</td>
                <td>@{{ item.obji10[31101936] ? item.obji10[31101936] : '' }}</td>
                <td>@{{ item.obji10[31101937] ? item.obji10[31101937] : '' }}</td>
                <td>@{{ item.obji10[31101938] ? item.obji10[31101938] : '' }}</td>
                <td>@{{ item.obji10[31101939] ? item.obji10[31101939] : '' }}</td>
                <td>@{{ item.obji10[31101940] ? item.obji10[31101940] : '' }}</td>
                <td>@{{ item.obji10[31101941] ? item.obji10[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101942] ? item.obji10[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101944] ? item.obji10[31101944] : '' }}</td>
                <td>@{{ item.obji10[31101945] ? item.obji10[31101945] : '' }}</td>
                <td>@{{ item.obji10[31101946] ? item.obji10[31101946] : '' }}</td>
                <td>@{{ item.obji10[31101947] ? item.obji10[31101947] : '' }}</td>
                <td>@{{ item.obji10[31101948] ? item.obji10[31101948] : '' }}</td>
                <td>@{{ item.obji10[31101949] ? item.obji10[31101949] : '' }}</td>
                <td>@{{ item.obji10[31101950] ? item.obji10[31101950] : '' }}</td>
                <td>@{{ item.obji10[31101951] ? item.obji10[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101952] ? item.obji10[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101954] ? item.obji10[31101954] : '' }}</td>
                <td>@{{ item.obji10[31101955] ? item.obji10[31101955] : '' }}</td>
                <td>@{{ item.obji10[31101956] ? item.obji10[31101956] : '' }}</td>
                <td>@{{ item.obji10[31101957] ? item.obji10[31101957] : '' }}</td>
                <td>@{{ item.obji10[31101958] ? item.obji10[31101958] : '' }}</td>
                <td>@{{ item.obji10[31101959] ? item.obji10[31101959] : '' }}</td>
                <td>@{{ item.obji10[31101960] ? item.obji10[31101960] : '' }}</td>
                <td>@{{ item.obji10[31101961] ? item.obji10[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101962] ? item.obji10[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101964] ? item.obji10[31101964] : '' }}</td>
                <td>@{{ item.obji10[31101965] ? item.obji10[31101965] : '' }}</td>
                <td>@{{ item.obji10[31101966] ? item.obji10[31101966] : '' }}</td>
                <td>@{{ item.obji10[31101967] ? item.obji10[31101967] : '' }}</td>
                <td>@{{ item.obji10[31101968] ? item.obji10[31101968] : '' }}</td>
                <td>@{{ item.obji10[31101969] ? item.obji10[31101969] : '' }}</td>
                <td>@{{ item.obji10[31101970] ? item.obji10[31101970] : '' }}</td>
                <td>@{{ item.obji10[31101971] ? item.obji10[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101972] ? item.obji10[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101974] ? item.obji10[31101974] : '' }}</td>
                <td>@{{ item.obji10[31101975] ? item.obji10[31101975] : '' }}</td>
                <td>@{{ item.obji10[31101976] ? item.obji10[31101976] : '' }}</td>
                <td>@{{ item.obji10[31101977] ? item.obji10[31101977] : '' }}</td>
                <td>@{{ item.obji10[31101978] ? item.obji10[31101978] : '' }}</td>
                <td>@{{ item.obji10[31101979] ? item.obji10[31101979] : '' }}</td>
                <td>@{{ item.obji10[31101980] ? item.obji10[31101980] : '' }}</td>
                <td>@{{ item.obji10[31101981] ? item.obji10[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101982] ? item.obji10[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji10[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji10[31101984] ? item.obji10[31101984] : '' }}</td>
                <td>@{{ item.obji10[31101985] ? item.obji10[31101985] : '' }}</td>
                <td>@{{ item.obji10[31101986] ? item.obji10[31101986] : '' }}</td>
                <td>@{{ item.obji10[31101987] ? item.obji10[31101987] : '' }}</td>
                <td>@{{ item.obji10[31101988] ? item.obji10[31101988] : '' }}</td>
                <td>@{{ item.obji10[31101989] ? item.obji10[31101989] : '' }}</td>
                <td>@{{ item.obji10[31101990] ? item.obji10[31101990] : '' }}</td>
                <td>@{{ item.obji10[31101991] ? item.obji10[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji10[31101992] ? item.obji10[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji10[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d11']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji11[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji11[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji11[31101377] ? item.obji11[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji11[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji11[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji11[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji11[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji11[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji11[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji11[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji11[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji11[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji11[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji11[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji11[31101387] ? item.obji11[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji11[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji11[31101389] ? item.obji11[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji11[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji11[31101391] ? item.obji11[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji11[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji11[31101393] ? item.obji11[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji11[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji11[31101395] ? item.obji11[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji11[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep11" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp11" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji11[31101397] ? item.obji11[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji11[31101398] ? item.obji11[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji11[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji11[31101400] ? item.obji11[31101400] : '' }}</td>
                    <td>@{{ item.obji11[31101401] ? item.obji11[31101401] : '' }}</td>
                    <td>@{{ item.obji11[31101402] ? item.obji11[31101402] : '' }}</td>
                    <td>@{{ item.obji11[31101403] ? item.obji11[31101403] : '' }}</td>
                    <td>@{{ item.obji11[31101404] ? item.obji11[31101404] : '' }}</td>
                    <td>@{{ item.obji11[31101405] ? item.obji11[31101405] : '' }}</td>
                    <td>@{{ item.obji11[31101406] ? item.obji11[31101406] : '' }}</td>
                    <td>@{{ item.obji11[31101407] ? item.obji11[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji11[31101408] ? item.obji11[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101904] ? item.obji11[31101904] : '' }}</td>
                <td>@{{ item.obji11[31101905] ? item.obji11[31101905] : '' }}</td>
                <td>@{{ item.obji11[31101906] ? item.obji11[31101906] : '' }}</td>
                <td>@{{ item.obji11[31101907] ? item.obji11[31101907] : '' }}</td>
                <td>@{{ item.obji11[31101908] ? item.obji11[31101908] : '' }}</td>
                <td>@{{ item.obji11[31101909] ? item.obji11[31101909] : '' }}</td>
                <td>@{{ item.obji11[31101910] ? item.obji11[31101910] : '' }}</td>
                <td>@{{ item.obji11[31101911] ? item.obji11[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101912] ? item.obji11[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101914] ? item.obji11[31101914] : '' }}</td>
                <td>@{{ item.obji11[31101915] ? item.obji11[31101915] : '' }}</td>
                <td>@{{ item.obji11[31101916] ? item.obji11[31101916] : '' }}</td>
                <td>@{{ item.obji11[31101917] ? item.obji11[31101917] : '' }}</td>
                <td>@{{ item.obji11[31101918] ? item.obji11[31101918] : '' }}</td>
                <td>@{{ item.obji11[31101919] ? item.obji11[31101919] : '' }}</td>
                <td>@{{ item.obji11[31101920] ? item.obji11[31101920] : '' }}</td>
                <td>@{{ item.obji11[31101921] ? item.obji11[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101922] ? item.obji11[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101924] ? item.obji11[31101924] : '' }}</td>
                <td>@{{ item.obji11[31101925] ? item.obji11[31101925] : '' }}</td>
                <td>@{{ item.obji11[31101926] ? item.obji11[31101926] : '' }}</td>
                <td>@{{ item.obji11[31101927] ? item.obji11[31101927] : '' }}</td>
                <td>@{{ item.obji11[31101928] ? item.obji11[31101928] : '' }}</td>
                <td>@{{ item.obji11[31101929] ? item.obji11[31101929] : '' }}</td>
                <td>@{{ item.obji11[31101930] ? item.obji11[31101930] : '' }}</td>
                <td>@{{ item.obji11[31101931] ? item.obji11[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101932] ? item.obji11[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101934] ? item.obji11[31101934] : '' }}</td>
                <td>@{{ item.obji11[31101935] ? item.obji11[31101935] : '' }}</td>
                <td>@{{ item.obji11[31101936] ? item.obji11[31101936] : '' }}</td>
                <td>@{{ item.obji11[31101937] ? item.obji11[31101937] : '' }}</td>
                <td>@{{ item.obji11[31101938] ? item.obji11[31101938] : '' }}</td>
                <td>@{{ item.obji11[31101939] ? item.obji11[31101939] : '' }}</td>
                <td>@{{ item.obji11[31101940] ? item.obji11[31101940] : '' }}</td>
                <td>@{{ item.obji11[31101941] ? item.obji11[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101942] ? item.obji11[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101944] ? item.obji11[31101944] : '' }}</td>
                <td>@{{ item.obji11[31101945] ? item.obji11[31101945] : '' }}</td>
                <td>@{{ item.obji11[31101946] ? item.obji11[31101946] : '' }}</td>
                <td>@{{ item.obji11[31101947] ? item.obji11[31101947] : '' }}</td>
                <td>@{{ item.obji11[31101948] ? item.obji11[31101948] : '' }}</td>
                <td>@{{ item.obji11[31101949] ? item.obji11[31101949] : '' }}</td>
                <td>@{{ item.obji11[31101950] ? item.obji11[31101950] : '' }}</td>
                <td>@{{ item.obji11[31101951] ? item.obji11[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101952] ? item.obji11[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101954] ? item.obji11[31101954] : '' }}</td>
                <td>@{{ item.obji11[31101955] ? item.obji11[31101955] : '' }}</td>
                <td>@{{ item.obji11[31101956] ? item.obji11[31101956] : '' }}</td>
                <td>@{{ item.obji11[31101957] ? item.obji11[31101957] : '' }}</td>
                <td>@{{ item.obji11[31101958] ? item.obji11[31101958] : '' }}</td>
                <td>@{{ item.obji11[31101959] ? item.obji11[31101959] : '' }}</td>
                <td>@{{ item.obji11[31101960] ? item.obji11[31101960] : '' }}</td>
                <td>@{{ item.obji11[31101961] ? item.obji11[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101962] ? item.obji11[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101964] ? item.obji11[31101964] : '' }}</td>
                <td>@{{ item.obji11[31101965] ? item.obji11[31101965] : '' }}</td>
                <td>@{{ item.obji11[31101966] ? item.obji11[31101966] : '' }}</td>
                <td>@{{ item.obji11[31101967] ? item.obji11[31101967] : '' }}</td>
                <td>@{{ item.obji11[31101968] ? item.obji11[31101968] : '' }}</td>
                <td>@{{ item.obji11[31101969] ? item.obji11[31101969] : '' }}</td>
                <td>@{{ item.obji11[31101970] ? item.obji11[31101970] : '' }}</td>
                <td>@{{ item.obji11[31101971] ? item.obji11[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101972] ? item.obji11[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101974] ? item.obji11[31101974] : '' }}</td>
                <td>@{{ item.obji11[31101975] ? item.obji11[31101975] : '' }}</td>
                <td>@{{ item.obji11[31101976] ? item.obji11[31101976] : '' }}</td>
                <td>@{{ item.obji11[31101977] ? item.obji11[31101977] : '' }}</td>
                <td>@{{ item.obji11[31101978] ? item.obji11[31101978] : '' }}</td>
                <td>@{{ item.obji11[31101979] ? item.obji11[31101979] : '' }}</td>
                <td>@{{ item.obji11[31101980] ? item.obji11[31101980] : '' }}</td>
                <td>@{{ item.obji11[31101981] ? item.obji11[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101982] ? item.obji11[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji11[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji11[31101984] ? item.obji11[31101984] : '' }}</td>
                <td>@{{ item.obji11[31101985] ? item.obji11[31101985] : '' }}</td>
                <td>@{{ item.obji11[31101986] ? item.obji11[31101986] : '' }}</td>
                <td>@{{ item.obji11[31101987] ? item.obji11[31101987] : '' }}</td>
                <td>@{{ item.obji11[31101988] ? item.obji11[31101988] : '' }}</td>
                <td>@{{ item.obji11[31101989] ? item.obji11[31101989] : '' }}</td>
                <td>@{{ item.obji11[31101990] ? item.obji11[31101990] : '' }}</td>
                <td>@{{ item.obji11[31101991] ? item.obji11[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji11[31101992] ? item.obji11[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji11[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d12']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji12[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji12[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji12[31101377] ? item.obji12[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji12[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji12[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji12[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji12[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji12[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji12[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji12[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji12[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji12[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji12[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji12[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji12[31101387] ? item.obji12[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji12[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji12[31101389] ? item.obji12[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji12[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji12[31101391] ? item.obji12[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji12[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji12[31101393] ? item.obji12[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji12[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji12[31101395] ? item.obji12[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji12[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep12" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp12" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji12[31101397] ? item.obji12[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji12[31101398] ? item.obji12[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji12[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji12[31101400] ? item.obji12[31101400] : '' }}</td>
                    <td>@{{ item.obji12[31101401] ? item.obji12[31101401] : '' }}</td>
                    <td>@{{ item.obji12[31101402] ? item.obji12[31101402] : '' }}</td>
                    <td>@{{ item.obji12[31101403] ? item.obji12[31101403] : '' }}</td>
                    <td>@{{ item.obji12[31101404] ? item.obji12[31101404] : '' }}</td>
                    <td>@{{ item.obji12[31101405] ? item.obji12[31101405] : '' }}</td>
                    <td>@{{ item.obji12[31101406] ? item.obji12[31101406] : '' }}</td>
                    <td>@{{ item.obji12[31101407] ? item.obji12[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji12[31101408] ? item.obji12[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101904] ? item.obji12[31101904] : '' }}</td>
                <td>@{{ item.obji12[31101905] ? item.obji12[31101905] : '' }}</td>
                <td>@{{ item.obji12[31101906] ? item.obji12[31101906] : '' }}</td>
                <td>@{{ item.obji12[31101907] ? item.obji12[31101907] : '' }}</td>
                <td>@{{ item.obji12[31101908] ? item.obji12[31101908] : '' }}</td>
                <td>@{{ item.obji12[31101909] ? item.obji12[31101909] : '' }}</td>
                <td>@{{ item.obji12[31101910] ? item.obji12[31101910] : '' }}</td>
                <td>@{{ item.obji12[31101911] ? item.obji12[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101912] ? item.obji12[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101914] ? item.obji12[31101914] : '' }}</td>
                <td>@{{ item.obji12[31101915] ? item.obji12[31101915] : '' }}</td>
                <td>@{{ item.obji12[31101916] ? item.obji12[31101916] : '' }}</td>
                <td>@{{ item.obji12[31101917] ? item.obji12[31101917] : '' }}</td>
                <td>@{{ item.obji12[31101918] ? item.obji12[31101918] : '' }}</td>
                <td>@{{ item.obji12[31101919] ? item.obji12[31101919] : '' }}</td>
                <td>@{{ item.obji12[31101920] ? item.obji12[31101920] : '' }}</td>
                <td>@{{ item.obji12[31101921] ? item.obji12[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101922] ? item.obji12[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101924] ? item.obji12[31101924] : '' }}</td>
                <td>@{{ item.obji12[31101925] ? item.obji12[31101925] : '' }}</td>
                <td>@{{ item.obji12[31101926] ? item.obji12[31101926] : '' }}</td>
                <td>@{{ item.obji12[31101927] ? item.obji12[31101927] : '' }}</td>
                <td>@{{ item.obji12[31101928] ? item.obji12[31101928] : '' }}</td>
                <td>@{{ item.obji12[31101929] ? item.obji12[31101929] : '' }}</td>
                <td>@{{ item.obji12[31101930] ? item.obji12[31101930] : '' }}</td>
                <td>@{{ item.obji12[31101931] ? item.obji12[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101932] ? item.obji12[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101934] ? item.obji12[31101934] : '' }}</td>
                <td>@{{ item.obji12[31101935] ? item.obji12[31101935] : '' }}</td>
                <td>@{{ item.obji12[31101936] ? item.obji12[31101936] : '' }}</td>
                <td>@{{ item.obji12[31101937] ? item.obji12[31101937] : '' }}</td>
                <td>@{{ item.obji12[31101938] ? item.obji12[31101938] : '' }}</td>
                <td>@{{ item.obji12[31101939] ? item.obji12[31101939] : '' }}</td>
                <td>@{{ item.obji12[31101940] ? item.obji12[31101940] : '' }}</td>
                <td>@{{ item.obji12[31101941] ? item.obji12[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101942] ? item.obji12[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101944] ? item.obji12[31101944] : '' }}</td>
                <td>@{{ item.obji12[31101945] ? item.obji12[31101945] : '' }}</td>
                <td>@{{ item.obji12[31101946] ? item.obji12[31101946] : '' }}</td>
                <td>@{{ item.obji12[31101947] ? item.obji12[31101947] : '' }}</td>
                <td>@{{ item.obji12[31101948] ? item.obji12[31101948] : '' }}</td>
                <td>@{{ item.obji12[31101949] ? item.obji12[31101949] : '' }}</td>
                <td>@{{ item.obji12[31101950] ? item.obji12[31101950] : '' }}</td>
                <td>@{{ item.obji12[31101951] ? item.obji12[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101952] ? item.obji12[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101954] ? item.obji12[31101954] : '' }}</td>
                <td>@{{ item.obji12[31101955] ? item.obji12[31101955] : '' }}</td>
                <td>@{{ item.obji12[31101956] ? item.obji12[31101956] : '' }}</td>
                <td>@{{ item.obji12[31101957] ? item.obji12[31101957] : '' }}</td>
                <td>@{{ item.obji12[31101958] ? item.obji12[31101958] : '' }}</td>
                <td>@{{ item.obji12[31101959] ? item.obji12[31101959] : '' }}</td>
                <td>@{{ item.obji12[31101960] ? item.obji12[31101960] : '' }}</td>
                <td>@{{ item.obji12[31101961] ? item.obji12[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101962] ? item.obji12[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101964] ? item.obji12[31101964] : '' }}</td>
                <td>@{{ item.obji12[31101965] ? item.obji12[31101965] : '' }}</td>
                <td>@{{ item.obji12[31101966] ? item.obji12[31101966] : '' }}</td>
                <td>@{{ item.obji12[31101967] ? item.obji12[31101967] : '' }}</td>
                <td>@{{ item.obji12[31101968] ? item.obji12[31101968] : '' }}</td>
                <td>@{{ item.obji12[31101969] ? item.obji12[31101969] : '' }}</td>
                <td>@{{ item.obji12[31101970] ? item.obji12[31101970] : '' }}</td>
                <td>@{{ item.obji12[31101971] ? item.obji12[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101972] ? item.obji12[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101974] ? item.obji12[31101974] : '' }}</td>
                <td>@{{ item.obji12[31101975] ? item.obji12[31101975] : '' }}</td>
                <td>@{{ item.obji12[31101976] ? item.obji12[31101976] : '' }}</td>
                <td>@{{ item.obji12[31101977] ? item.obji12[31101977] : '' }}</td>
                <td>@{{ item.obji12[31101978] ? item.obji12[31101978] : '' }}</td>
                <td>@{{ item.obji12[31101979] ? item.obji12[31101979] : '' }}</td>
                <td>@{{ item.obji12[31101980] ? item.obji12[31101980] : '' }}</td>
                <td>@{{ item.obji12[31101981] ? item.obji12[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101982] ? item.obji12[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji12[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji12[31101984] ? item.obji12[31101984] : '' }}</td>
                <td>@{{ item.obji12[31101985] ? item.obji12[31101985] : '' }}</td>
                <td>@{{ item.obji12[31101986] ? item.obji12[31101986] : '' }}</td>
                <td>@{{ item.obji12[31101987] ? item.obji12[31101987] : '' }}</td>
                <td>@{{ item.obji12[31101988] ? item.obji12[31101988] : '' }}</td>
                <td>@{{ item.obji12[31101989] ? item.obji12[31101989] : '' }}</td>
                <td>@{{ item.obji12[31101990] ? item.obji12[31101990] : '' }}</td>
                <td>@{{ item.obji12[31101991] ? item.obji12[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji12[31101992] ? item.obji12[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji12[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d13']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji13[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji13[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji13[31101377] ? item.obji13[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji13[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji13[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji13[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji13[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji13[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji13[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji13[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji13[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji13[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji13[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji13[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji13[31101387] ? item.obji13[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji13[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji13[31101389] ? item.obji13[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji13[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji13[31101391] ? item.obji13[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji13[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji13[31101393] ? item.obji13[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji13[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji13[31101395] ? item.obji13[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji13[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep13" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp13" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji13[31101397] ? item.obji13[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji13[31101398] ? item.obji13[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji13[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji13[31101400] ? item.obji13[31101400] : '' }}</td>
                    <td>@{{ item.obji13[31101401] ? item.obji13[31101401] : '' }}</td>
                    <td>@{{ item.obji13[31101402] ? item.obji13[31101402] : '' }}</td>
                    <td>@{{ item.obji13[31101403] ? item.obji13[31101403] : '' }}</td>
                    <td>@{{ item.obji13[31101404] ? item.obji13[31101404] : '' }}</td>
                    <td>@{{ item.obji13[31101405] ? item.obji13[31101405] : '' }}</td>
                    <td>@{{ item.obji13[31101406] ? item.obji13[31101406] : '' }}</td>
                    <td>@{{ item.obji13[31101407] ? item.obji13[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji13[31101408] ? item.obji13[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101904] ? item.obji13[31101904] : '' }}</td>
                <td>@{{ item.obji13[31101905] ? item.obji13[31101905] : '' }}</td>
                <td>@{{ item.obji13[31101906] ? item.obji13[31101906] : '' }}</td>
                <td>@{{ item.obji13[31101907] ? item.obji13[31101907] : '' }}</td>
                <td>@{{ item.obji13[31101908] ? item.obji13[31101908] : '' }}</td>
                <td>@{{ item.obji13[31101909] ? item.obji13[31101909] : '' }}</td>
                <td>@{{ item.obji13[31101910] ? item.obji13[31101910] : '' }}</td>
                <td>@{{ item.obji13[31101911] ? item.obji13[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101912] ? item.obji13[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101914] ? item.obji13[31101914] : '' }}</td>
                <td>@{{ item.obji13[31101915] ? item.obji13[31101915] : '' }}</td>
                <td>@{{ item.obji13[31101916] ? item.obji13[31101916] : '' }}</td>
                <td>@{{ item.obji13[31101917] ? item.obji13[31101917] : '' }}</td>
                <td>@{{ item.obji13[31101918] ? item.obji13[31101918] : '' }}</td>
                <td>@{{ item.obji13[31101919] ? item.obji13[31101919] : '' }}</td>
                <td>@{{ item.obji13[31101920] ? item.obji13[31101920] : '' }}</td>
                <td>@{{ item.obji13[31101921] ? item.obji13[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101922] ? item.obji13[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101924] ? item.obji13[31101924] : '' }}</td>
                <td>@{{ item.obji13[31101925] ? item.obji13[31101925] : '' }}</td>
                <td>@{{ item.obji13[31101926] ? item.obji13[31101926] : '' }}</td>
                <td>@{{ item.obji13[31101927] ? item.obji13[31101927] : '' }}</td>
                <td>@{{ item.obji13[31101928] ? item.obji13[31101928] : '' }}</td>
                <td>@{{ item.obji13[31101929] ? item.obji13[31101929] : '' }}</td>
                <td>@{{ item.obji13[31101930] ? item.obji13[31101930] : '' }}</td>
                <td>@{{ item.obji13[31101931] ? item.obji13[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101932] ? item.obji13[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101934] ? item.obji13[31101934] : '' }}</td>
                <td>@{{ item.obji13[31101935] ? item.obji13[31101935] : '' }}</td>
                <td>@{{ item.obji13[31101936] ? item.obji13[31101936] : '' }}</td>
                <td>@{{ item.obji13[31101937] ? item.obji13[31101937] : '' }}</td>
                <td>@{{ item.obji13[31101938] ? item.obji13[31101938] : '' }}</td>
                <td>@{{ item.obji13[31101939] ? item.obji13[31101939] : '' }}</td>
                <td>@{{ item.obji13[31101940] ? item.obji13[31101940] : '' }}</td>
                <td>@{{ item.obji13[31101941] ? item.obji13[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101942] ? item.obji13[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101944] ? item.obji13[31101944] : '' }}</td>
                <td>@{{ item.obji13[31101945] ? item.obji13[31101945] : '' }}</td>
                <td>@{{ item.obji13[31101946] ? item.obji13[31101946] : '' }}</td>
                <td>@{{ item.obji13[31101947] ? item.obji13[31101947] : '' }}</td>
                <td>@{{ item.obji13[31101948] ? item.obji13[31101948] : '' }}</td>
                <td>@{{ item.obji13[31101949] ? item.obji13[31101949] : '' }}</td>
                <td>@{{ item.obji13[31101950] ? item.obji13[31101950] : '' }}</td>
                <td>@{{ item.obji13[31101951] ? item.obji13[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101952] ? item.obji13[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101954] ? item.obji13[31101954] : '' }}</td>
                <td>@{{ item.obji13[31101955] ? item.obji13[31101955] : '' }}</td>
                <td>@{{ item.obji13[31101956] ? item.obji13[31101956] : '' }}</td>
                <td>@{{ item.obji13[31101957] ? item.obji13[31101957] : '' }}</td>
                <td>@{{ item.obji13[31101958] ? item.obji13[31101958] : '' }}</td>
                <td>@{{ item.obji13[31101959] ? item.obji13[31101959] : '' }}</td>
                <td>@{{ item.obji13[31101960] ? item.obji13[31101960] : '' }}</td>
                <td>@{{ item.obji13[31101961] ? item.obji13[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101962] ? item.obji13[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101964] ? item.obji13[31101964] : '' }}</td>
                <td>@{{ item.obji13[31101965] ? item.obji13[31101965] : '' }}</td>
                <td>@{{ item.obji13[31101966] ? item.obji13[31101966] : '' }}</td>
                <td>@{{ item.obji13[31101967] ? item.obji13[31101967] : '' }}</td>
                <td>@{{ item.obji13[31101968] ? item.obji13[31101968] : '' }}</td>
                <td>@{{ item.obji13[31101969] ? item.obji13[31101969] : '' }}</td>
                <td>@{{ item.obji13[31101970] ? item.obji13[31101970] : '' }}</td>
                <td>@{{ item.obji13[31101971] ? item.obji13[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101972] ? item.obji13[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101974] ? item.obji13[31101974] : '' }}</td>
                <td>@{{ item.obji13[31101975] ? item.obji13[31101975] : '' }}</td>
                <td>@{{ item.obji13[31101976] ? item.obji13[31101976] : '' }}</td>
                <td>@{{ item.obji13[31101977] ? item.obji13[31101977] : '' }}</td>
                <td>@{{ item.obji13[31101978] ? item.obji13[31101978] : '' }}</td>
                <td>@{{ item.obji13[31101979] ? item.obji13[31101979] : '' }}</td>
                <td>@{{ item.obji13[31101980] ? item.obji13[31101980] : '' }}</td>
                <td>@{{ item.obji13[31101981] ? item.obji13[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101982] ? item.obji13[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji13[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji13[31101984] ? item.obji13[31101984] : '' }}</td>
                <td>@{{ item.obji13[31101985] ? item.obji13[31101985] : '' }}</td>
                <td>@{{ item.obji13[31101986] ? item.obji13[31101986] : '' }}</td>
                <td>@{{ item.obji13[31101987] ? item.obji13[31101987] : '' }}</td>
                <td>@{{ item.obji13[31101988] ? item.obji13[31101988] : '' }}</td>
                <td>@{{ item.obji13[31101989] ? item.obji13[31101989] : '' }}</td>
                <td>@{{ item.obji13[31101990] ? item.obji13[31101990] : '' }}</td>
                <td>@{{ item.obji13[31101991] ? item.obji13[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji13[31101992] ? item.obji13[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji13[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d14']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji14[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji14[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji14[31101377] ? item.obji14[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji14[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji14[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji14[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji14[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji14[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji14[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji14[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji14[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji14[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji14[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji14[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji14[31101387] ? item.obji14[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji14[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji14[31101389] ? item.obji14[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji14[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji14[31101391] ? item.obji14[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji14[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji14[31101393] ? item.obji14[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji14[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji14[31101395] ? item.obji14[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji14[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep14" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp14" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji14[31101397] ? item.obji14[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji14[31101398] ? item.obji14[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji14[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji14[31101400] ? item.obji14[31101400] : '' }}</td>
                    <td>@{{ item.obji14[31101401] ? item.obji14[31101401] : '' }}</td>
                    <td>@{{ item.obji14[31101402] ? item.obji14[31101402] : '' }}</td>
                    <td>@{{ item.obji14[31101403] ? item.obji14[31101403] : '' }}</td>
                    <td>@{{ item.obji14[31101404] ? item.obji14[31101404] : '' }}</td>
                    <td>@{{ item.obji14[31101405] ? item.obji14[31101405] : '' }}</td>
                    <td>@{{ item.obji14[31101406] ? item.obji14[31101406] : '' }}</td>
                    <td>@{{ item.obji14[31101407] ? item.obji14[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji14[31101408] ? item.obji14[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101904] ? item.obji14[31101904] : '' }}</td>
                <td>@{{ item.obji14[31101905] ? item.obji14[31101905] : '' }}</td>
                <td>@{{ item.obji14[31101906] ? item.obji14[31101906] : '' }}</td>
                <td>@{{ item.obji14[31101907] ? item.obji14[31101907] : '' }}</td>
                <td>@{{ item.obji14[31101908] ? item.obji14[31101908] : '' }}</td>
                <td>@{{ item.obji14[31101909] ? item.obji14[31101909] : '' }}</td>
                <td>@{{ item.obji14[31101910] ? item.obji14[31101910] : '' }}</td>
                <td>@{{ item.obji14[31101911] ? item.obji14[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101912] ? item.obji14[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101914] ? item.obji14[31101914] : '' }}</td>
                <td>@{{ item.obji14[31101915] ? item.obji14[31101915] : '' }}</td>
                <td>@{{ item.obji14[31101916] ? item.obji14[31101916] : '' }}</td>
                <td>@{{ item.obji14[31101917] ? item.obji14[31101917] : '' }}</td>
                <td>@{{ item.obji14[31101918] ? item.obji14[31101918] : '' }}</td>
                <td>@{{ item.obji14[31101919] ? item.obji14[31101919] : '' }}</td>
                <td>@{{ item.obji14[31101920] ? item.obji14[31101920] : '' }}</td>
                <td>@{{ item.obji14[31101921] ? item.obji14[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101922] ? item.obji14[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101924] ? item.obji14[31101924] : '' }}</td>
                <td>@{{ item.obji14[31101925] ? item.obji14[31101925] : '' }}</td>
                <td>@{{ item.obji14[31101926] ? item.obji14[31101926] : '' }}</td>
                <td>@{{ item.obji14[31101927] ? item.obji14[31101927] : '' }}</td>
                <td>@{{ item.obji14[31101928] ? item.obji14[31101928] : '' }}</td>
                <td>@{{ item.obji14[31101929] ? item.obji14[31101929] : '' }}</td>
                <td>@{{ item.obji14[31101930] ? item.obji14[31101930] : '' }}</td>
                <td>@{{ item.obji14[31101931] ? item.obji14[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101932] ? item.obji14[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101934] ? item.obji14[31101934] : '' }}</td>
                <td>@{{ item.obji14[31101935] ? item.obji14[31101935] : '' }}</td>
                <td>@{{ item.obji14[31101936] ? item.obji14[31101936] : '' }}</td>
                <td>@{{ item.obji14[31101937] ? item.obji14[31101937] : '' }}</td>
                <td>@{{ item.obji14[31101938] ? item.obji14[31101938] : '' }}</td>
                <td>@{{ item.obji14[31101939] ? item.obji14[31101939] : '' }}</td>
                <td>@{{ item.obji14[31101940] ? item.obji14[31101940] : '' }}</td>
                <td>@{{ item.obji14[31101941] ? item.obji14[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101942] ? item.obji14[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101944] ? item.obji14[31101944] : '' }}</td>
                <td>@{{ item.obji14[31101945] ? item.obji14[31101945] : '' }}</td>
                <td>@{{ item.obji14[31101946] ? item.obji14[31101946] : '' }}</td>
                <td>@{{ item.obji14[31101947] ? item.obji14[31101947] : '' }}</td>
                <td>@{{ item.obji14[31101948] ? item.obji14[31101948] : '' }}</td>
                <td>@{{ item.obji14[31101949] ? item.obji14[31101949] : '' }}</td>
                <td>@{{ item.obji14[31101950] ? item.obji14[31101950] : '' }}</td>
                <td>@{{ item.obji14[31101951] ? item.obji14[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101952] ? item.obji14[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101954] ? item.obji14[31101954] : '' }}</td>
                <td>@{{ item.obji14[31101955] ? item.obji14[31101955] : '' }}</td>
                <td>@{{ item.obji14[31101956] ? item.obji14[31101956] : '' }}</td>
                <td>@{{ item.obji14[31101957] ? item.obji14[31101957] : '' }}</td>
                <td>@{{ item.obji14[31101958] ? item.obji14[31101958] : '' }}</td>
                <td>@{{ item.obji14[31101959] ? item.obji14[31101959] : '' }}</td>
                <td>@{{ item.obji14[31101960] ? item.obji14[31101960] : '' }}</td>
                <td>@{{ item.obji14[31101961] ? item.obji14[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101962] ? item.obji14[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101964] ? item.obji14[31101964] : '' }}</td>
                <td>@{{ item.obji14[31101965] ? item.obji14[31101965] : '' }}</td>
                <td>@{{ item.obji14[31101966] ? item.obji14[31101966] : '' }}</td>
                <td>@{{ item.obji14[31101967] ? item.obji14[31101967] : '' }}</td>
                <td>@{{ item.obji14[31101968] ? item.obji14[31101968] : '' }}</td>
                <td>@{{ item.obji14[31101969] ? item.obji14[31101969] : '' }}</td>
                <td>@{{ item.obji14[31101970] ? item.obji14[31101970] : '' }}</td>
                <td>@{{ item.obji14[31101971] ? item.obji14[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101972] ? item.obji14[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101974] ? item.obji14[31101974] : '' }}</td>
                <td>@{{ item.obji14[31101975] ? item.obji14[31101975] : '' }}</td>
                <td>@{{ item.obji14[31101976] ? item.obji14[31101976] : '' }}</td>
                <td>@{{ item.obji14[31101977] ? item.obji14[31101977] : '' }}</td>
                <td>@{{ item.obji14[31101978] ? item.obji14[31101978] : '' }}</td>
                <td>@{{ item.obji14[31101979] ? item.obji14[31101979] : '' }}</td>
                <td>@{{ item.obji14[31101980] ? item.obji14[31101980] : '' }}</td>
                <td>@{{ item.obji14[31101981] ? item.obji14[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101982] ? item.obji14[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji14[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji14[31101984] ? item.obji14[31101984] : '' }}</td>
                <td>@{{ item.obji14[31101985] ? item.obji14[31101985] : '' }}</td>
                <td>@{{ item.obji14[31101986] ? item.obji14[31101986] : '' }}</td>
                <td>@{{ item.obji14[31101987] ? item.obji14[31101987] : '' }}</td>
                <td>@{{ item.obji14[31101988] ? item.obji14[31101988] : '' }}</td>
                <td>@{{ item.obji14[31101989] ? item.obji14[31101989] : '' }}</td>
                <td>@{{ item.obji14[31101990] ? item.obji14[31101990] : '' }}</td>
                <td>@{{ item.obji14[31101991] ? item.obji14[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji14[31101992] ? item.obji14[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji14[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d15']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji15[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji15[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji15[31101377] ? item.obji15[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji15[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji15[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji15[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji15[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji15[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji15[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji15[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji15[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji15[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji15[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji15[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji15[31101387] ? item.obji15[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji15[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji15[31101389] ? item.obji15[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji15[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji15[31101391] ? item.obji15[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji15[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji15[31101393] ? item.obji15[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji15[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji15[31101395] ? item.obji15[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji15[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep15" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp15" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji15[31101397] ? item.obji15[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji15[31101398] ? item.obji15[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji15[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji15[31101400] ? item.obji15[31101400] : '' }}</td>
                    <td>@{{ item.obji15[31101401] ? item.obji15[31101401] : '' }}</td>
                    <td>@{{ item.obji15[31101402] ? item.obji15[31101402] : '' }}</td>
                    <td>@{{ item.obji15[31101403] ? item.obji15[31101403] : '' }}</td>
                    <td>@{{ item.obji15[31101404] ? item.obji15[31101404] : '' }}</td>
                    <td>@{{ item.obji15[31101405] ? item.obji15[31101405] : '' }}</td>
                    <td>@{{ item.obji15[31101406] ? item.obji15[31101406] : '' }}</td>
                    <td>@{{ item.obji15[31101407] ? item.obji15[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji15[31101408] ? item.obji15[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101904] ? item.obji15[31101904] : '' }}</td>
                <td>@{{ item.obji15[31101905] ? item.obji15[31101905] : '' }}</td>
                <td>@{{ item.obji15[31101906] ? item.obji15[31101906] : '' }}</td>
                <td>@{{ item.obji15[31101907] ? item.obji15[31101907] : '' }}</td>
                <td>@{{ item.obji15[31101908] ? item.obji15[31101908] : '' }}</td>
                <td>@{{ item.obji15[31101909] ? item.obji15[31101909] : '' }}</td>
                <td>@{{ item.obji15[31101910] ? item.obji15[31101910] : '' }}</td>
                <td>@{{ item.obji15[31101911] ? item.obji15[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101912] ? item.obji15[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101914] ? item.obji15[31101914] : '' }}</td>
                <td>@{{ item.obji15[31101915] ? item.obji15[31101915] : '' }}</td>
                <td>@{{ item.obji15[31101916] ? item.obji15[31101916] : '' }}</td>
                <td>@{{ item.obji15[31101917] ? item.obji15[31101917] : '' }}</td>
                <td>@{{ item.obji15[31101918] ? item.obji15[31101918] : '' }}</td>
                <td>@{{ item.obji15[31101919] ? item.obji15[31101919] : '' }}</td>
                <td>@{{ item.obji15[31101920] ? item.obji15[31101920] : '' }}</td>
                <td>@{{ item.obji15[31101921] ? item.obji15[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101922] ? item.obji15[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101924] ? item.obji15[31101924] : '' }}</td>
                <td>@{{ item.obji15[31101925] ? item.obji15[31101925] : '' }}</td>
                <td>@{{ item.obji15[31101926] ? item.obji15[31101926] : '' }}</td>
                <td>@{{ item.obji15[31101927] ? item.obji15[31101927] : '' }}</td>
                <td>@{{ item.obji15[31101928] ? item.obji15[31101928] : '' }}</td>
                <td>@{{ item.obji15[31101929] ? item.obji15[31101929] : '' }}</td>
                <td>@{{ item.obji15[31101930] ? item.obji15[31101930] : '' }}</td>
                <td>@{{ item.obji15[31101931] ? item.obji15[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101932] ? item.obji15[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101934] ? item.obji15[31101934] : '' }}</td>
                <td>@{{ item.obji15[31101935] ? item.obji15[31101935] : '' }}</td>
                <td>@{{ item.obji15[31101936] ? item.obji15[31101936] : '' }}</td>
                <td>@{{ item.obji15[31101937] ? item.obji15[31101937] : '' }}</td>
                <td>@{{ item.obji15[31101938] ? item.obji15[31101938] : '' }}</td>
                <td>@{{ item.obji15[31101939] ? item.obji15[31101939] : '' }}</td>
                <td>@{{ item.obji15[31101940] ? item.obji15[31101940] : '' }}</td>
                <td>@{{ item.obji15[31101941] ? item.obji15[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101942] ? item.obji15[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101944] ? item.obji15[31101944] : '' }}</td>
                <td>@{{ item.obji15[31101945] ? item.obji15[31101945] : '' }}</td>
                <td>@{{ item.obji15[31101946] ? item.obji15[31101946] : '' }}</td>
                <td>@{{ item.obji15[31101947] ? item.obji15[31101947] : '' }}</td>
                <td>@{{ item.obji15[31101948] ? item.obji15[31101948] : '' }}</td>
                <td>@{{ item.obji15[31101949] ? item.obji15[31101949] : '' }}</td>
                <td>@{{ item.obji15[31101950] ? item.obji15[31101950] : '' }}</td>
                <td>@{{ item.obji15[31101951] ? item.obji15[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101952] ? item.obji15[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101954] ? item.obji15[31101954] : '' }}</td>
                <td>@{{ item.obji15[31101955] ? item.obji15[31101955] : '' }}</td>
                <td>@{{ item.obji15[31101956] ? item.obji15[31101956] : '' }}</td>
                <td>@{{ item.obji15[31101957] ? item.obji15[31101957] : '' }}</td>
                <td>@{{ item.obji15[31101958] ? item.obji15[31101958] : '' }}</td>
                <td>@{{ item.obji15[31101959] ? item.obji15[31101959] : '' }}</td>
                <td>@{{ item.obji15[31101960] ? item.obji15[31101960] : '' }}</td>
                <td>@{{ item.obji15[31101961] ? item.obji15[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101962] ? item.obji15[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101964] ? item.obji15[31101964] : '' }}</td>
                <td>@{{ item.obji15[31101965] ? item.obji15[31101965] : '' }}</td>
                <td>@{{ item.obji15[31101966] ? item.obji15[31101966] : '' }}</td>
                <td>@{{ item.obji15[31101967] ? item.obji15[31101967] : '' }}</td>
                <td>@{{ item.obji15[31101968] ? item.obji15[31101968] : '' }}</td>
                <td>@{{ item.obji15[31101969] ? item.obji15[31101969] : '' }}</td>
                <td>@{{ item.obji15[31101970] ? item.obji15[31101970] : '' }}</td>
                <td>@{{ item.obji15[31101971] ? item.obji15[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101972] ? item.obji15[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101974] ? item.obji15[31101974] : '' }}</td>
                <td>@{{ item.obji15[31101975] ? item.obji15[31101975] : '' }}</td>
                <td>@{{ item.obji15[31101976] ? item.obji15[31101976] : '' }}</td>
                <td>@{{ item.obji15[31101977] ? item.obji15[31101977] : '' }}</td>
                <td>@{{ item.obji15[31101978] ? item.obji15[31101978] : '' }}</td>
                <td>@{{ item.obji15[31101979] ? item.obji15[31101979] : '' }}</td>
                <td>@{{ item.obji15[31101980] ? item.obji15[31101980] : '' }}</td>
                <td>@{{ item.obji15[31101981] ? item.obji15[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101982] ? item.obji15[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji15[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji15[31101984] ? item.obji15[31101984] : '' }}</td>
                <td>@{{ item.obji15[31101985] ? item.obji15[31101985] : '' }}</td>
                <td>@{{ item.obji15[31101986] ? item.obji15[31101986] : '' }}</td>
                <td>@{{ item.obji15[31101987] ? item.obji15[31101987] : '' }}</td>
                <td>@{{ item.obji15[31101988] ? item.obji15[31101988] : '' }}</td>
                <td>@{{ item.obji15[31101989] ? item.obji15[31101989] : '' }}</td>
                <td>@{{ item.obji15[31101990] ? item.obji15[31101990] : '' }}</td>
                <td>@{{ item.obji15[31101991] ? item.obji15[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji15[31101992] ? item.obji15[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji15[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d16']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji16[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji16[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji16[31101377] ? item.obji16[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji16[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji16[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji16[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji16[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji16[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji16[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji16[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji16[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji16[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji16[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji16[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji16[31101387] ? item.obji16[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji16[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji16[31101389] ? item.obji16[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji16[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji16[31101391] ? item.obji16[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji16[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji16[31101393] ? item.obji16[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji16[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji16[31101395] ? item.obji16[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji16[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep16" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp16" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji16[31101397] ? item.obji16[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji16[31101398] ? item.obji16[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji16[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji16[31101400] ? item.obji16[31101400] : '' }}</td>
                    <td>@{{ item.obji16[31101401] ? item.obji16[31101401] : '' }}</td>
                    <td>@{{ item.obji16[31101402] ? item.obji16[31101402] : '' }}</td>
                    <td>@{{ item.obji16[31101403] ? item.obji16[31101403] : '' }}</td>
                    <td>@{{ item.obji16[31101404] ? item.obji16[31101404] : '' }}</td>
                    <td>@{{ item.obji16[31101405] ? item.obji16[31101405] : '' }}</td>
                    <td>@{{ item.obji16[31101406] ? item.obji16[31101406] : '' }}</td>
                    <td>@{{ item.obji16[31101407] ? item.obji16[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji16[31101408] ? item.obji16[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101904] ? item.obji16[31101904] : '' }}</td>
                <td>@{{ item.obji16[31101905] ? item.obji16[31101905] : '' }}</td>
                <td>@{{ item.obji16[31101906] ? item.obji16[31101906] : '' }}</td>
                <td>@{{ item.obji16[31101907] ? item.obji16[31101907] : '' }}</td>
                <td>@{{ item.obji16[31101908] ? item.obji16[31101908] : '' }}</td>
                <td>@{{ item.obji16[31101909] ? item.obji16[31101909] : '' }}</td>
                <td>@{{ item.obji16[31101910] ? item.obji16[31101910] : '' }}</td>
                <td>@{{ item.obji16[31101911] ? item.obji16[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101912] ? item.obji16[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101914] ? item.obji16[31101914] : '' }}</td>
                <td>@{{ item.obji16[31101915] ? item.obji16[31101915] : '' }}</td>
                <td>@{{ item.obji16[31101916] ? item.obji16[31101916] : '' }}</td>
                <td>@{{ item.obji16[31101917] ? item.obji16[31101917] : '' }}</td>
                <td>@{{ item.obji16[31101918] ? item.obji16[31101918] : '' }}</td>
                <td>@{{ item.obji16[31101919] ? item.obji16[31101919] : '' }}</td>
                <td>@{{ item.obji16[31101920] ? item.obji16[31101920] : '' }}</td>
                <td>@{{ item.obji16[31101921] ? item.obji16[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101922] ? item.obji16[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101924] ? item.obji16[31101924] : '' }}</td>
                <td>@{{ item.obji16[31101925] ? item.obji16[31101925] : '' }}</td>
                <td>@{{ item.obji16[31101926] ? item.obji16[31101926] : '' }}</td>
                <td>@{{ item.obji16[31101927] ? item.obji16[31101927] : '' }}</td>
                <td>@{{ item.obji16[31101928] ? item.obji16[31101928] : '' }}</td>
                <td>@{{ item.obji16[31101929] ? item.obji16[31101929] : '' }}</td>
                <td>@{{ item.obji16[31101930] ? item.obji16[31101930] : '' }}</td>
                <td>@{{ item.obji16[31101931] ? item.obji16[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101932] ? item.obji16[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101934] ? item.obji16[31101934] : '' }}</td>
                <td>@{{ item.obji16[31101935] ? item.obji16[31101935] : '' }}</td>
                <td>@{{ item.obji16[31101936] ? item.obji16[31101936] : '' }}</td>
                <td>@{{ item.obji16[31101937] ? item.obji16[31101937] : '' }}</td>
                <td>@{{ item.obji16[31101938] ? item.obji16[31101938] : '' }}</td>
                <td>@{{ item.obji16[31101939] ? item.obji16[31101939] : '' }}</td>
                <td>@{{ item.obji16[31101940] ? item.obji16[31101940] : '' }}</td>
                <td>@{{ item.obji16[31101941] ? item.obji16[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101942] ? item.obji16[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101944] ? item.obji16[31101944] : '' }}</td>
                <td>@{{ item.obji16[31101945] ? item.obji16[31101945] : '' }}</td>
                <td>@{{ item.obji16[31101946] ? item.obji16[31101946] : '' }}</td>
                <td>@{{ item.obji16[31101947] ? item.obji16[31101947] : '' }}</td>
                <td>@{{ item.obji16[31101948] ? item.obji16[31101948] : '' }}</td>
                <td>@{{ item.obji16[31101949] ? item.obji16[31101949] : '' }}</td>
                <td>@{{ item.obji16[31101950] ? item.obji16[31101950] : '' }}</td>
                <td>@{{ item.obji16[31101951] ? item.obji16[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101952] ? item.obji16[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101954] ? item.obji16[31101954] : '' }}</td>
                <td>@{{ item.obji16[31101955] ? item.obji16[31101955] : '' }}</td>
                <td>@{{ item.obji16[31101956] ? item.obji16[31101956] : '' }}</td>
                <td>@{{ item.obji16[31101957] ? item.obji16[31101957] : '' }}</td>
                <td>@{{ item.obji16[31101958] ? item.obji16[31101958] : '' }}</td>
                <td>@{{ item.obji16[31101959] ? item.obji16[31101959] : '' }}</td>
                <td>@{{ item.obji16[31101960] ? item.obji16[31101960] : '' }}</td>
                <td>@{{ item.obji16[31101961] ? item.obji16[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101962] ? item.obji16[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101964] ? item.obji16[31101964] : '' }}</td>
                <td>@{{ item.obji16[31101965] ? item.obji16[31101965] : '' }}</td>
                <td>@{{ item.obji16[31101966] ? item.obji16[31101966] : '' }}</td>
                <td>@{{ item.obji16[31101967] ? item.obji16[31101967] : '' }}</td>
                <td>@{{ item.obji16[31101968] ? item.obji16[31101968] : '' }}</td>
                <td>@{{ item.obji16[31101969] ? item.obji16[31101969] : '' }}</td>
                <td>@{{ item.obji16[31101970] ? item.obji16[31101970] : '' }}</td>
                <td>@{{ item.obji16[31101971] ? item.obji16[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101972] ? item.obji16[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101974] ? item.obji16[31101974] : '' }}</td>
                <td>@{{ item.obji16[31101975] ? item.obji16[31101975] : '' }}</td>
                <td>@{{ item.obji16[31101976] ? item.obji16[31101976] : '' }}</td>
                <td>@{{ item.obji16[31101977] ? item.obji16[31101977] : '' }}</td>
                <td>@{{ item.obji16[31101978] ? item.obji16[31101978] : '' }}</td>
                <td>@{{ item.obji16[31101979] ? item.obji16[31101979] : '' }}</td>
                <td>@{{ item.obji16[31101980] ? item.obji16[31101980] : '' }}</td>
                <td>@{{ item.obji16[31101981] ? item.obji16[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101982] ? item.obji16[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji16[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji16[31101984] ? item.obji16[31101984] : '' }}</td>
                <td>@{{ item.obji16[31101985] ? item.obji16[31101985] : '' }}</td>
                <td>@{{ item.obji16[31101986] ? item.obji16[31101986] : '' }}</td>
                <td>@{{ item.obji16[31101987] ? item.obji16[31101987] : '' }}</td>
                <td>@{{ item.obji16[31101988] ? item.obji16[31101988] : '' }}</td>
                <td>@{{ item.obji16[31101989] ? item.obji16[31101989] : '' }}</td>
                <td>@{{ item.obji16[31101990] ? item.obji16[31101990] : '' }}</td>
                <td>@{{ item.obji16[31101991] ? item.obji16[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji16[31101992] ? item.obji16[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji16[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d17']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji17[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji17[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji17[31101377] ? item.obji17[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji17[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji17[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji17[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji17[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji17[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji17[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji17[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji17[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji17[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji17[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji17[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji17[31101387] ? item.obji17[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji17[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji17[31101389] ? item.obji17[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji17[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji17[31101391] ? item.obji17[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji17[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji17[31101393] ? item.obji17[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji17[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji17[31101395] ? item.obji17[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji17[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep17" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp17" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji17[31101397] ? item.obji17[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji17[31101398] ? item.obji17[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji17[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji17[31101400] ? item.obji17[31101400] : '' }}</td>
                    <td>@{{ item.obji17[31101401] ? item.obji17[31101401] : '' }}</td>
                    <td>@{{ item.obji17[31101402] ? item.obji17[31101402] : '' }}</td>
                    <td>@{{ item.obji17[31101403] ? item.obji17[31101403] : '' }}</td>
                    <td>@{{ item.obji17[31101404] ? item.obji17[31101404] : '' }}</td>
                    <td>@{{ item.obji17[31101405] ? item.obji17[31101405] : '' }}</td>
                    <td>@{{ item.obji17[31101406] ? item.obji17[31101406] : '' }}</td>
                    <td>@{{ item.obji17[31101407] ? item.obji17[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji17[31101408] ? item.obji17[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101904] ? item.obji17[31101904] : '' }}</td>
                <td>@{{ item.obji17[31101905] ? item.obji17[31101905] : '' }}</td>
                <td>@{{ item.obji17[31101906] ? item.obji17[31101906] : '' }}</td>
                <td>@{{ item.obji17[31101907] ? item.obji17[31101907] : '' }}</td>
                <td>@{{ item.obji17[31101908] ? item.obji17[31101908] : '' }}</td>
                <td>@{{ item.obji17[31101909] ? item.obji17[31101909] : '' }}</td>
                <td>@{{ item.obji17[31101910] ? item.obji17[31101910] : '' }}</td>
                <td>@{{ item.obji17[31101911] ? item.obji17[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101912] ? item.obji17[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101914] ? item.obji17[31101914] : '' }}</td>
                <td>@{{ item.obji17[31101915] ? item.obji17[31101915] : '' }}</td>
                <td>@{{ item.obji17[31101916] ? item.obji17[31101916] : '' }}</td>
                <td>@{{ item.obji17[31101917] ? item.obji17[31101917] : '' }}</td>
                <td>@{{ item.obji17[31101918] ? item.obji17[31101918] : '' }}</td>
                <td>@{{ item.obji17[31101919] ? item.obji17[31101919] : '' }}</td>
                <td>@{{ item.obji17[31101920] ? item.obji17[31101920] : '' }}</td>
                <td>@{{ item.obji17[31101921] ? item.obji17[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101922] ? item.obji17[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101924] ? item.obji17[31101924] : '' }}</td>
                <td>@{{ item.obji17[31101925] ? item.obji17[31101925] : '' }}</td>
                <td>@{{ item.obji17[31101926] ? item.obji17[31101926] : '' }}</td>
                <td>@{{ item.obji17[31101927] ? item.obji17[31101927] : '' }}</td>
                <td>@{{ item.obji17[31101928] ? item.obji17[31101928] : '' }}</td>
                <td>@{{ item.obji17[31101929] ? item.obji17[31101929] : '' }}</td>
                <td>@{{ item.obji17[31101930] ? item.obji17[31101930] : '' }}</td>
                <td>@{{ item.obji17[31101931] ? item.obji17[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101932] ? item.obji17[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101934] ? item.obji17[31101934] : '' }}</td>
                <td>@{{ item.obji17[31101935] ? item.obji17[31101935] : '' }}</td>
                <td>@{{ item.obji17[31101936] ? item.obji17[31101936] : '' }}</td>
                <td>@{{ item.obji17[31101937] ? item.obji17[31101937] : '' }}</td>
                <td>@{{ item.obji17[31101938] ? item.obji17[31101938] : '' }}</td>
                <td>@{{ item.obji17[31101939] ? item.obji17[31101939] : '' }}</td>
                <td>@{{ item.obji17[31101940] ? item.obji17[31101940] : '' }}</td>
                <td>@{{ item.obji17[31101941] ? item.obji17[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101942] ? item.obji17[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101944] ? item.obji17[31101944] : '' }}</td>
                <td>@{{ item.obji17[31101945] ? item.obji17[31101945] : '' }}</td>
                <td>@{{ item.obji17[31101946] ? item.obji17[31101946] : '' }}</td>
                <td>@{{ item.obji17[31101947] ? item.obji17[31101947] : '' }}</td>
                <td>@{{ item.obji17[31101948] ? item.obji17[31101948] : '' }}</td>
                <td>@{{ item.obji17[31101949] ? item.obji17[31101949] : '' }}</td>
                <td>@{{ item.obji17[31101950] ? item.obji17[31101950] : '' }}</td>
                <td>@{{ item.obji17[31101951] ? item.obji17[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101952] ? item.obji17[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101954] ? item.obji17[31101954] : '' }}</td>
                <td>@{{ item.obji17[31101955] ? item.obji17[31101955] : '' }}</td>
                <td>@{{ item.obji17[31101956] ? item.obji17[31101956] : '' }}</td>
                <td>@{{ item.obji17[31101957] ? item.obji17[31101957] : '' }}</td>
                <td>@{{ item.obji17[31101958] ? item.obji17[31101958] : '' }}</td>
                <td>@{{ item.obji17[31101959] ? item.obji17[31101959] : '' }}</td>
                <td>@{{ item.obji17[31101960] ? item.obji17[31101960] : '' }}</td>
                <td>@{{ item.obji17[31101961] ? item.obji17[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101962] ? item.obji17[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101964] ? item.obji17[31101964] : '' }}</td>
                <td>@{{ item.obji17[31101965] ? item.obji17[31101965] : '' }}</td>
                <td>@{{ item.obji17[31101966] ? item.obji17[31101966] : '' }}</td>
                <td>@{{ item.obji17[31101967] ? item.obji17[31101967] : '' }}</td>
                <td>@{{ item.obji17[31101968] ? item.obji17[31101968] : '' }}</td>
                <td>@{{ item.obji17[31101969] ? item.obji17[31101969] : '' }}</td>
                <td>@{{ item.obji17[31101970] ? item.obji17[31101970] : '' }}</td>
                <td>@{{ item.obji17[31101971] ? item.obji17[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101972] ? item.obji17[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101974] ? item.obji17[31101974] : '' }}</td>
                <td>@{{ item.obji17[31101975] ? item.obji17[31101975] : '' }}</td>
                <td>@{{ item.obji17[31101976] ? item.obji17[31101976] : '' }}</td>
                <td>@{{ item.obji17[31101977] ? item.obji17[31101977] : '' }}</td>
                <td>@{{ item.obji17[31101978] ? item.obji17[31101978] : '' }}</td>
                <td>@{{ item.obji17[31101979] ? item.obji17[31101979] : '' }}</td>
                <td>@{{ item.obji17[31101980] ? item.obji17[31101980] : '' }}</td>
                <td>@{{ item.obji17[31101981] ? item.obji17[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101982] ? item.obji17[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji17[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji17[31101984] ? item.obji17[31101984] : '' }}</td>
                <td>@{{ item.obji17[31101985] ? item.obji17[31101985] : '' }}</td>
                <td>@{{ item.obji17[31101986] ? item.obji17[31101986] : '' }}</td>
                <td>@{{ item.obji17[31101987] ? item.obji17[31101987] : '' }}</td>
                <td>@{{ item.obji17[31101988] ? item.obji17[31101988] : '' }}</td>
                <td>@{{ item.obji17[31101989] ? item.obji17[31101989] : '' }}</td>
                <td>@{{ item.obji17[31101990] ? item.obji17[31101990] : '' }}</td>
                <td>@{{ item.obji17[31101991] ? item.obji17[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji17[31101992] ? item.obji17[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji17[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d18']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji18[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji18[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji18[31101377] ? item.obji18[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji18[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji18[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji18[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji18[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji18[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji18[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji18[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji18[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji18[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji18[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji18[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji18[31101387] ? item.obji18[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji18[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji18[31101389] ? item.obji18[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji18[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji18[31101391] ? item.obji18[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji18[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji18[31101393] ? item.obji18[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji18[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji18[31101395] ? item.obji18[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji18[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep18" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp18" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji18[31101397] ? item.obji18[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji18[31101398] ? item.obji18[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji18[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji18[31101400] ? item.obji18[31101400] : '' }}</td>
                    <td>@{{ item.obji18[31101401] ? item.obji18[31101401] : '' }}</td>
                    <td>@{{ item.obji18[31101402] ? item.obji18[31101402] : '' }}</td>
                    <td>@{{ item.obji18[31101403] ? item.obji18[31101403] : '' }}</td>
                    <td>@{{ item.obji18[31101404] ? item.obji18[31101404] : '' }}</td>
                    <td>@{{ item.obji18[31101405] ? item.obji18[31101405] : '' }}</td>
                    <td>@{{ item.obji18[31101406] ? item.obji18[31101406] : '' }}</td>
                    <td>@{{ item.obji18[31101407] ? item.obji18[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji18[31101408] ? item.obji18[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101904] ? item.obji18[31101904] : '' }}</td>
                <td>@{{ item.obji18[31101905] ? item.obji18[31101905] : '' }}</td>
                <td>@{{ item.obji18[31101906] ? item.obji18[31101906] : '' }}</td>
                <td>@{{ item.obji18[31101907] ? item.obji18[31101907] : '' }}</td>
                <td>@{{ item.obji18[31101908] ? item.obji18[31101908] : '' }}</td>
                <td>@{{ item.obji18[31101909] ? item.obji18[31101909] : '' }}</td>
                <td>@{{ item.obji18[31101910] ? item.obji18[31101910] : '' }}</td>
                <td>@{{ item.obji18[31101911] ? item.obji18[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101912] ? item.obji18[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101914] ? item.obji18[31101914] : '' }}</td>
                <td>@{{ item.obji18[31101915] ? item.obji18[31101915] : '' }}</td>
                <td>@{{ item.obji18[31101916] ? item.obji18[31101916] : '' }}</td>
                <td>@{{ item.obji18[31101917] ? item.obji18[31101917] : '' }}</td>
                <td>@{{ item.obji18[31101918] ? item.obji18[31101918] : '' }}</td>
                <td>@{{ item.obji18[31101919] ? item.obji18[31101919] : '' }}</td>
                <td>@{{ item.obji18[31101920] ? item.obji18[31101920] : '' }}</td>
                <td>@{{ item.obji18[31101921] ? item.obji18[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101922] ? item.obji18[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101924] ? item.obji18[31101924] : '' }}</td>
                <td>@{{ item.obji18[31101925] ? item.obji18[31101925] : '' }}</td>
                <td>@{{ item.obji18[31101926] ? item.obji18[31101926] : '' }}</td>
                <td>@{{ item.obji18[31101927] ? item.obji18[31101927] : '' }}</td>
                <td>@{{ item.obji18[31101928] ? item.obji18[31101928] : '' }}</td>
                <td>@{{ item.obji18[31101929] ? item.obji18[31101929] : '' }}</td>
                <td>@{{ item.obji18[31101930] ? item.obji18[31101930] : '' }}</td>
                <td>@{{ item.obji18[31101931] ? item.obji18[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101932] ? item.obji18[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101934] ? item.obji18[31101934] : '' }}</td>
                <td>@{{ item.obji18[31101935] ? item.obji18[31101935] : '' }}</td>
                <td>@{{ item.obji18[31101936] ? item.obji18[31101936] : '' }}</td>
                <td>@{{ item.obji18[31101937] ? item.obji18[31101937] : '' }}</td>
                <td>@{{ item.obji18[31101938] ? item.obji18[31101938] : '' }}</td>
                <td>@{{ item.obji18[31101939] ? item.obji18[31101939] : '' }}</td>
                <td>@{{ item.obji18[31101940] ? item.obji18[31101940] : '' }}</td>
                <td>@{{ item.obji18[31101941] ? item.obji18[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101942] ? item.obji18[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101944] ? item.obji18[31101944] : '' }}</td>
                <td>@{{ item.obji18[31101945] ? item.obji18[31101945] : '' }}</td>
                <td>@{{ item.obji18[31101946] ? item.obji18[31101946] : '' }}</td>
                <td>@{{ item.obji18[31101947] ? item.obji18[31101947] : '' }}</td>
                <td>@{{ item.obji18[31101948] ? item.obji18[31101948] : '' }}</td>
                <td>@{{ item.obji18[31101949] ? item.obji18[31101949] : '' }}</td>
                <td>@{{ item.obji18[31101950] ? item.obji18[31101950] : '' }}</td>
                <td>@{{ item.obji18[31101951] ? item.obji18[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101952] ? item.obji18[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101954] ? item.obji18[31101954] : '' }}</td>
                <td>@{{ item.obji18[31101955] ? item.obji18[31101955] : '' }}</td>
                <td>@{{ item.obji18[31101956] ? item.obji18[31101956] : '' }}</td>
                <td>@{{ item.obji18[31101957] ? item.obji18[31101957] : '' }}</td>
                <td>@{{ item.obji18[31101958] ? item.obji18[31101958] : '' }}</td>
                <td>@{{ item.obji18[31101959] ? item.obji18[31101959] : '' }}</td>
                <td>@{{ item.obji18[31101960] ? item.obji18[31101960] : '' }}</td>
                <td>@{{ item.obji18[31101961] ? item.obji18[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101962] ? item.obji18[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101964] ? item.obji18[31101964] : '' }}</td>
                <td>@{{ item.obji18[31101965] ? item.obji18[31101965] : '' }}</td>
                <td>@{{ item.obji18[31101966] ? item.obji18[31101966] : '' }}</td>
                <td>@{{ item.obji18[31101967] ? item.obji18[31101967] : '' }}</td>
                <td>@{{ item.obji18[31101968] ? item.obji18[31101968] : '' }}</td>
                <td>@{{ item.obji18[31101969] ? item.obji18[31101969] : '' }}</td>
                <td>@{{ item.obji18[31101970] ? item.obji18[31101970] : '' }}</td>
                <td>@{{ item.obji18[31101971] ? item.obji18[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101972] ? item.obji18[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101974] ? item.obji18[31101974] : '' }}</td>
                <td>@{{ item.obji18[31101975] ? item.obji18[31101975] : '' }}</td>
                <td>@{{ item.obji18[31101976] ? item.obji18[31101976] : '' }}</td>
                <td>@{{ item.obji18[31101977] ? item.obji18[31101977] : '' }}</td>
                <td>@{{ item.obji18[31101978] ? item.obji18[31101978] : '' }}</td>
                <td>@{{ item.obji18[31101979] ? item.obji18[31101979] : '' }}</td>
                <td>@{{ item.obji18[31101980] ? item.obji18[31101980] : '' }}</td>
                <td>@{{ item.obji18[31101981] ? item.obji18[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101982] ? item.obji18[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji18[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji18[31101984] ? item.obji18[31101984] : '' }}</td>
                <td>@{{ item.obji18[31101985] ? item.obji18[31101985] : '' }}</td>
                <td>@{{ item.obji18[31101986] ? item.obji18[31101986] : '' }}</td>
                <td>@{{ item.obji18[31101987] ? item.obji18[31101987] : '' }}</td>
                <td>@{{ item.obji18[31101988] ? item.obji18[31101988] : '' }}</td>
                <td>@{{ item.obji18[31101989] ? item.obji18[31101989] : '' }}</td>
                <td>@{{ item.obji18[31101990] ? item.obji18[31101990] : '' }}</td>
                <td>@{{ item.obji18[31101991] ? item.obji18[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji18[31101992] ? item.obji18[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji18[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d19']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji19[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji19[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji19[31101377] ? item.obji19[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji19[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji19[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji19[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji19[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji19[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji19[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji19[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji19[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji19[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji19[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji19[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji19[31101387] ? item.obji19[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji19[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji19[31101389] ? item.obji19[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji19[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji19[31101391] ? item.obji19[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji19[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji19[31101393] ? item.obji19[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji19[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji19[31101395] ? item.obji19[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji19[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep19" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp19" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji19[31101397] ? item.obji19[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji19[31101398] ? item.obji19[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji19[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji19[31101400] ? item.obji19[31101400] : '' }}</td>
                    <td>@{{ item.obji19[31101401] ? item.obji19[31101401] : '' }}</td>
                    <td>@{{ item.obji19[31101402] ? item.obji19[31101402] : '' }}</td>
                    <td>@{{ item.obji19[31101403] ? item.obji19[31101403] : '' }}</td>
                    <td>@{{ item.obji19[31101404] ? item.obji19[31101404] : '' }}</td>
                    <td>@{{ item.obji19[31101405] ? item.obji19[31101405] : '' }}</td>
                    <td>@{{ item.obji19[31101406] ? item.obji19[31101406] : '' }}</td>
                    <td>@{{ item.obji19[31101407] ? item.obji19[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji19[31101408] ? item.obji19[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101904] ? item.obji19[31101904] : '' }}</td>
                <td>@{{ item.obji19[31101905] ? item.obji19[31101905] : '' }}</td>
                <td>@{{ item.obji19[31101906] ? item.obji19[31101906] : '' }}</td>
                <td>@{{ item.obji19[31101907] ? item.obji19[31101907] : '' }}</td>
                <td>@{{ item.obji19[31101908] ? item.obji19[31101908] : '' }}</td>
                <td>@{{ item.obji19[31101909] ? item.obji19[31101909] : '' }}</td>
                <td>@{{ item.obji19[31101910] ? item.obji19[31101910] : '' }}</td>
                <td>@{{ item.obji19[31101911] ? item.obji19[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101912] ? item.obji19[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101914] ? item.obji19[31101914] : '' }}</td>
                <td>@{{ item.obji19[31101915] ? item.obji19[31101915] : '' }}</td>
                <td>@{{ item.obji19[31101916] ? item.obji19[31101916] : '' }}</td>
                <td>@{{ item.obji19[31101917] ? item.obji19[31101917] : '' }}</td>
                <td>@{{ item.obji19[31101918] ? item.obji19[31101918] : '' }}</td>
                <td>@{{ item.obji19[31101919] ? item.obji19[31101919] : '' }}</td>
                <td>@{{ item.obji19[31101920] ? item.obji19[31101920] : '' }}</td>
                <td>@{{ item.obji19[31101921] ? item.obji19[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101922] ? item.obji19[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101924] ? item.obji19[31101924] : '' }}</td>
                <td>@{{ item.obji19[31101925] ? item.obji19[31101925] : '' }}</td>
                <td>@{{ item.obji19[31101926] ? item.obji19[31101926] : '' }}</td>
                <td>@{{ item.obji19[31101927] ? item.obji19[31101927] : '' }}</td>
                <td>@{{ item.obji19[31101928] ? item.obji19[31101928] : '' }}</td>
                <td>@{{ item.obji19[31101929] ? item.obji19[31101929] : '' }}</td>
                <td>@{{ item.obji19[31101930] ? item.obji19[31101930] : '' }}</td>
                <td>@{{ item.obji19[31101931] ? item.obji19[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101932] ? item.obji19[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101934] ? item.obji19[31101934] : '' }}</td>
                <td>@{{ item.obji19[31101935] ? item.obji19[31101935] : '' }}</td>
                <td>@{{ item.obji19[31101936] ? item.obji19[31101936] : '' }}</td>
                <td>@{{ item.obji19[31101937] ? item.obji19[31101937] : '' }}</td>
                <td>@{{ item.obji19[31101938] ? item.obji19[31101938] : '' }}</td>
                <td>@{{ item.obji19[31101939] ? item.obji19[31101939] : '' }}</td>
                <td>@{{ item.obji19[31101940] ? item.obji19[31101940] : '' }}</td>
                <td>@{{ item.obji19[31101941] ? item.obji19[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101942] ? item.obji19[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101944] ? item.obji19[31101944] : '' }}</td>
                <td>@{{ item.obji19[31101945] ? item.obji19[31101945] : '' }}</td>
                <td>@{{ item.obji19[31101946] ? item.obji19[31101946] : '' }}</td>
                <td>@{{ item.obji19[31101947] ? item.obji19[31101947] : '' }}</td>
                <td>@{{ item.obji19[31101948] ? item.obji19[31101948] : '' }}</td>
                <td>@{{ item.obji19[31101949] ? item.obji19[31101949] : '' }}</td>
                <td>@{{ item.obji19[31101950] ? item.obji19[31101950] : '' }}</td>
                <td>@{{ item.obji19[31101951] ? item.obji19[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101952] ? item.obji19[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101954] ? item.obji19[31101954] : '' }}</td>
                <td>@{{ item.obji19[31101955] ? item.obji19[31101955] : '' }}</td>
                <td>@{{ item.obji19[31101956] ? item.obji19[31101956] : '' }}</td>
                <td>@{{ item.obji19[31101957] ? item.obji19[31101957] : '' }}</td>
                <td>@{{ item.obji19[31101958] ? item.obji19[31101958] : '' }}</td>
                <td>@{{ item.obji19[31101959] ? item.obji19[31101959] : '' }}</td>
                <td>@{{ item.obji19[31101960] ? item.obji19[31101960] : '' }}</td>
                <td>@{{ item.obji19[31101961] ? item.obji19[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101962] ? item.obji19[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101964] ? item.obji19[31101964] : '' }}</td>
                <td>@{{ item.obji19[31101965] ? item.obji19[31101965] : '' }}</td>
                <td>@{{ item.obji19[31101966] ? item.obji19[31101966] : '' }}</td>
                <td>@{{ item.obji19[31101967] ? item.obji19[31101967] : '' }}</td>
                <td>@{{ item.obji19[31101968] ? item.obji19[31101968] : '' }}</td>
                <td>@{{ item.obji19[31101969] ? item.obji19[31101969] : '' }}</td>
                <td>@{{ item.obji19[31101970] ? item.obji19[31101970] : '' }}</td>
                <td>@{{ item.obji19[31101971] ? item.obji19[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101972] ? item.obji19[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101974] ? item.obji19[31101974] : '' }}</td>
                <td>@{{ item.obji19[31101975] ? item.obji19[31101975] : '' }}</td>
                <td>@{{ item.obji19[31101976] ? item.obji19[31101976] : '' }}</td>
                <td>@{{ item.obji19[31101977] ? item.obji19[31101977] : '' }}</td>
                <td>@{{ item.obji19[31101978] ? item.obji19[31101978] : '' }}</td>
                <td>@{{ item.obji19[31101979] ? item.obji19[31101979] : '' }}</td>
                <td>@{{ item.obji19[31101980] ? item.obji19[31101980] : '' }}</td>
                <td>@{{ item.obji19[31101981] ? item.obji19[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101982] ? item.obji19[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji19[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji19[31101984] ? item.obji19[31101984] : '' }}</td>
                <td>@{{ item.obji19[31101985] ? item.obji19[31101985] : '' }}</td>
                <td>@{{ item.obji19[31101986] ? item.obji19[31101986] : '' }}</td>
                <td>@{{ item.obji19[31101987] ? item.obji19[31101987] : '' }}</td>
                <td>@{{ item.obji19[31101988] ? item.obji19[31101988] : '' }}</td>
                <td>@{{ item.obji19[31101989] ? item.obji19[31101989] : '' }}</td>
                <td>@{{ item.obji19[31101990] ? item.obji19[31101990] : '' }}</td>
                <td>@{{ item.obji19[31101991] ? item.obji19[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji19[31101992] ? item.obji19[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji19[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

    @if (!empty($res['d20']))
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
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                    <td colspan="4" style="border:none">:  {!!  $res['d1'][0]->namapasien  !!} ({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                    <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
                    <td rowspan="2" style="font-size:xx-large;text-align: center;">86</td>
                </tr>
                <tr>
                    <td style="border:none;border-left:1px solid #000">NIK</td>
                    <td colspan="4" style="border:none">: {!! $res['d1'][0]->noidentitas  !!}</td>
                </tr>
                <tr>
                    <td colspan="11" class="bg-dark" style="font-size:x-large">
                        CHECK LIST DAN OBSERVASI TRANSFUSI DARAH
                    </td>
                </tr>
                <tr height="40px">
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Tanggal : @{{item.obji20[31101376] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td colspan="3" style="border:none;border-bottom:1px solid #000">Pukul : @{{ item.obji20[31101376] | toDate | date:'HH:mm' }}</td>
                    <td colspan="4" style="border:none;border-bottom:1px solid #000">Ruangan : @{{ item.obji20[31101377] ? item.obji20[31101377] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Format Permintaan Darah Dan Instruksi Dokter</td>
                    <td colspan="3" style="border:none">@{{ item.obji20[32104089] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sesuai</td>
                    <td colspan="3" style="border:none">@{{ item.obji20[32104090] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila SESUAI, maka dilanjutkan ke pernyataan berikut :</strong></td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none"><strong>Bila TIDAK SESUAI? Cross check kembali ke bank darah RSUD H. Andi Sulthan Daeng Radja</strong></td>
                </tr>
                <tr style="border-top:1px solid #000">
                    <td style="border:none">Jenis Darah</td>
                    <td style="border:none">@{{ item.obji20[31101378] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Whole Blood</td>
                    <td style="border:none">@{{ item.obji20[31101379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PRC</td>
                    <td style="border:none">@{{ item.obji20[31101380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Trombosit</td>
                    <td style="border:none">@{{ item.obji20[31101381] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} FFP</td>
                </tr>
                <tr style="border-bottom:1px solid #000">
                    <td colspan="2" style="border:none">Jumlah Kebutuhan Darah	:</td>
                    <td style="border:none" colspan="9">@{{ item.obji20[31101382] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} BAG / CC</td>
                </tr>
                <tr>
                    <td style="border:none">Golongan Darah</td>
                    <td style="border:none">@{{ item.obji20[31101383] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} A</td>
                    <td style="border:none">@{{ item.obji20[31101384] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} B</td>
                    <td style="border:none">@{{ item.obji20[31101385] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} C</td>
                    <td style="border:none">@{{ item.obji20[31101386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} AB</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">Nomor Kantong Darah</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">Tanggal kadaluarsa</td>
                </tr>
                <tr style="border:none">
                    <td colspan="5" style="border:none">1: @{{ item.obji20[31101387] ? item.obji20[31101387] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">1: @{{item.obji20[31101388] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">2: @{{ item.obji20[31101389] ? item.obji20[31101389] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">2: @{{item.obji20[31101390] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">3: @{{ item.obji20[31101391] ? item.obji20[31101391] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">3: @{{item.obji20[31101392] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">4: @{{ item.obji20[31101393] ? item.obji20[31101393] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">4: @{{item.obji20[31101394] | toDate | date:'dd-MM-yyyy'}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">5: @{{ item.obji20[31101395] ? item.obji20[31101395] : '' }}</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">5: @{{item.obji20[31101396] | toDate | date:'dd-MM-yyyy'}}</td>
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
                <td colspan="5" style="text-align:center;border:none"><div id="qrcodep20" style="text-align: center"></div></td>
                <td style="border:none"></td>
                <td colspan="5" style="text-align:center;border:none;"><div id="qrcodepp20" style="text-align: center"></div></td>
                </tr>
                <tr style="text-align: center;border-bottom: 1px solid #000;">
                    <td colspan="5" style="border:none">(@{{ item.obji20[31101397] ? item.obji20[31101397] : '___________________________________________' }})</td>
                    <td style="border:none"></td>
                    <td colspan="5" style="border:none">(@{{ item.obji20[31101398] ? item.obji20[31101398] : '___________________________________________' }})</td>
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
                    <td>@{{item.obji20[31101399] | toDate | date:'dd-MM-yyyy'}}</td>
                    <td>@{{ item.obji20[31101400] ? item.obji20[31101400] : '' }}</td>
                    <td>@{{ item.obji20[31101401] ? item.obji20[31101401] : '' }}</td>
                    <td>@{{ item.obji20[31101402] ? item.obji20[31101402] : '' }}</td>
                    <td>@{{ item.obji20[31101403] ? item.obji20[31101403] : '' }}</td>
                    <td>@{{ item.obji20[31101404] ? item.obji20[31101404] : '' }}</td>
                    <td>@{{ item.obji20[31101405] ? item.obji20[31101405] : '' }}</td>
                    <td>@{{ item.obji20[31101406] ? item.obji20[31101406] : '' }}</td>
                    <td>@{{ item.obji20[31101407] ? item.obji20[31101407] : '' }}</td>
                    <td colspan="2">@{{ item.obji20[31101408] ? item.obji20[31101408] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101904] ? item.obji20[31101904] : '' }}</td>
                <td>@{{ item.obji20[31101905] ? item.obji20[31101905] : '' }}</td>
                <td>@{{ item.obji20[31101906] ? item.obji20[31101906] : '' }}</td>
                <td>@{{ item.obji20[31101907] ? item.obji20[31101907] : '' }}</td>
                <td>@{{ item.obji20[31101908] ? item.obji20[31101908] : '' }}</td>
                <td>@{{ item.obji20[31101909] ? item.obji20[31101909] : '' }}</td>
                <td>@{{ item.obji20[31101910] ? item.obji20[31101910] : '' }}</td>
                <td>@{{ item.obji20[31101911] ? item.obji20[31101911] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101912] ? item.obji20[31101912] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101913] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101914] ? item.obji20[31101914] : '' }}</td>
                <td>@{{ item.obji20[31101915] ? item.obji20[31101915] : '' }}</td>
                <td>@{{ item.obji20[31101916] ? item.obji20[31101916] : '' }}</td>
                <td>@{{ item.obji20[31101917] ? item.obji20[31101917] : '' }}</td>
                <td>@{{ item.obji20[31101918] ? item.obji20[31101918] : '' }}</td>
                <td>@{{ item.obji20[31101919] ? item.obji20[31101919] : '' }}</td>
                <td>@{{ item.obji20[31101920] ? item.obji20[31101920] : '' }}</td>
                <td>@{{ item.obji20[31101921] ? item.obji20[31101921] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101922] ? item.obji20[31101922] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101923] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101924] ? item.obji20[31101924] : '' }}</td>
                <td>@{{ item.obji20[31101925] ? item.obji20[31101925] : '' }}</td>
                <td>@{{ item.obji20[31101926] ? item.obji20[31101926] : '' }}</td>
                <td>@{{ item.obji20[31101927] ? item.obji20[31101927] : '' }}</td>
                <td>@{{ item.obji20[31101928] ? item.obji20[31101928] : '' }}</td>
                <td>@{{ item.obji20[31101929] ? item.obji20[31101929] : '' }}</td>
                <td>@{{ item.obji20[31101930] ? item.obji20[31101930] : '' }}</td>
                <td>@{{ item.obji20[31101931] ? item.obji20[31101931] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101932] ? item.obji20[31101932] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101933] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101934] ? item.obji20[31101934] : '' }}</td>
                <td>@{{ item.obji20[31101935] ? item.obji20[31101935] : '' }}</td>
                <td>@{{ item.obji20[31101936] ? item.obji20[31101936] : '' }}</td>
                <td>@{{ item.obji20[31101937] ? item.obji20[31101937] : '' }}</td>
                <td>@{{ item.obji20[31101938] ? item.obji20[31101938] : '' }}</td>
                <td>@{{ item.obji20[31101939] ? item.obji20[31101939] : '' }}</td>
                <td>@{{ item.obji20[31101940] ? item.obji20[31101940] : '' }}</td>
                <td>@{{ item.obji20[31101941] ? item.obji20[31101941] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101942] ? item.obji20[31101942] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101943] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101944] ? item.obji20[31101944] : '' }}</td>
                <td>@{{ item.obji20[31101945] ? item.obji20[31101945] : '' }}</td>
                <td>@{{ item.obji20[31101946] ? item.obji20[31101946] : '' }}</td>
                <td>@{{ item.obji20[31101947] ? item.obji20[31101947] : '' }}</td>
                <td>@{{ item.obji20[31101948] ? item.obji20[31101948] : '' }}</td>
                <td>@{{ item.obji20[31101949] ? item.obji20[31101949] : '' }}</td>
                <td>@{{ item.obji20[31101950] ? item.obji20[31101950] : '' }}</td>
                <td>@{{ item.obji20[31101951] ? item.obji20[31101951] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101952] ? item.obji20[31101952] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101953] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101954] ? item.obji20[31101954] : '' }}</td>
                <td>@{{ item.obji20[31101955] ? item.obji20[31101955] : '' }}</td>
                <td>@{{ item.obji20[31101956] ? item.obji20[31101956] : '' }}</td>
                <td>@{{ item.obji20[31101957] ? item.obji20[31101957] : '' }}</td>
                <td>@{{ item.obji20[31101958] ? item.obji20[31101958] : '' }}</td>
                <td>@{{ item.obji20[31101959] ? item.obji20[31101959] : '' }}</td>
                <td>@{{ item.obji20[31101960] ? item.obji20[31101960] : '' }}</td>
                <td>@{{ item.obji20[31101961] ? item.obji20[31101961] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101962] ? item.obji20[31101962] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101963] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101964] ? item.obji20[31101964] : '' }}</td>
                <td>@{{ item.obji20[31101965] ? item.obji20[31101965] : '' }}</td>
                <td>@{{ item.obji20[31101966] ? item.obji20[31101966] : '' }}</td>
                <td>@{{ item.obji20[31101967] ? item.obji20[31101967] : '' }}</td>
                <td>@{{ item.obji20[31101968] ? item.obji20[31101968] : '' }}</td>
                <td>@{{ item.obji20[31101969] ? item.obji20[31101969] : '' }}</td>
                <td>@{{ item.obji20[31101970] ? item.obji20[31101970] : '' }}</td>
                <td>@{{ item.obji20[31101971] ? item.obji20[31101971] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101972] ? item.obji20[31101972] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101973] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101974] ? item.obji20[31101974] : '' }}</td>
                <td>@{{ item.obji20[31101975] ? item.obji20[31101975] : '' }}</td>
                <td>@{{ item.obji20[31101976] ? item.obji20[31101976] : '' }}</td>
                <td>@{{ item.obji20[31101977] ? item.obji20[31101977] : '' }}</td>
                <td>@{{ item.obji20[31101978] ? item.obji20[31101978] : '' }}</td>
                <td>@{{ item.obji20[31101979] ? item.obji20[31101979] : '' }}</td>
                <td>@{{ item.obji20[31101980] ? item.obji20[31101980] : '' }}</td>
                <td>@{{ item.obji20[31101981] ? item.obji20[31101981] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101982] ? item.obji20[31101982] : '' }}</td>
                </tr>
                <tr>
                <td>@{{item.obji20[31101983] | toDate | date:'dd-MM-yyyy'}}</td>
                <td>@{{ item.obji20[31101984] ? item.obji20[31101984] : '' }}</td>
                <td>@{{ item.obji20[31101985] ? item.obji20[31101985] : '' }}</td>
                <td>@{{ item.obji20[31101986] ? item.obji20[31101986] : '' }}</td>
                <td>@{{ item.obji20[31101987] ? item.obji20[31101987] : '' }}</td>
                <td>@{{ item.obji20[31101988] ? item.obji20[31101988] : '' }}</td>
                <td>@{{ item.obji20[31101989] ? item.obji20[31101989] : '' }}</td>
                <td>@{{ item.obji20[31101990] ? item.obji20[31101990] : '' }}</td>
                <td>@{{ item.obji20[31101991] ? item.obji20[31101991] : '' }}</td>
                <td colspan="2">@{{ item.obji20[31101992] ? item.obji20[31101992] : '' }}</td>
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
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101409] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gejala gelisah, lemah pruritis, palpasi, sispnea ringan dan nyeri kepala</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101410] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urtikaria, demam, takikardia, kaku otot</td>
                </tr>
                <tr>
                    <td colspan="11"  style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101411] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Demam, lemah, hipotensi (turun ≥ 20% tekanan darah sistolik), takikardia (naik ≥ 20%), 
                        Hemoglobinuria dan perdarahan yang tidak jelas
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">2.	Reaksi Lambat timbul 5-10 hari setelah transfuse</td>
                </tr>
                <tr>
                    <td colspan="5" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101412] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Reaksi hemolitik lambat</td>
                    <td colspan="6" style="border:none">: Gejala dan tanda demam, anemia, ikterik dan hemoglobinuria</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101413] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Purpur pasca transfuse : Timbul perdarahan dan adanya trombositopenia berat, akut trombosit < 100.000/uL, hitung trombosit ≤ 50.000/uL dan perdarahan yang tidak terlihat dengan hitung trombosit	20.000/uL</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penyakit graft-versus-host : Gejala demam, rash kulit dan deskuamasi, diare, hepatitis, pansitopenia, biasanya timbul 10-12 hari setelah transfuse. Tidak ada terapi spesifik, tetapi hanya bersifat suportif</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kelebihan besi ditandai gagal organ (jantung dan hati), kadar Fe Serum dan femitin meningkat lebih dari normal</td>
                </tr>
                <tr>
                    <td colspan="11" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;@{{ item.obji20[31101416] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Infeksi yang berisiko terjadi akibat transfuse adalah Hepatitis B dan C, HIV, CMV, Malaria, Sifilis, Bruselosis, Tipanosoiasis</td>
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
    @endif

			
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
            obj2: [],
			obji2: [],
			obji3: [],
			obji4: [],
			obji5: [],
			obji6: [],
			obji7: [],
			obji8: [],
			obji9: [],
			obji10: [],
			obji11: [],
			obji12: [],
			obji13: [],
			obji14: [],
			obji15: [],
			obji16: [],
			obji17: [],
			obji18: [],
			obji19: [],
			obji20: []
        }
        var dataLoad = {!! json_encode($res['d1'] )!!};
		var dataLoad2 = {!! json_encode($res['d2'] )!!};
		var dataLoad3 = {!! json_encode($res['d3'] )!!};
		var dataLoad4 = {!! json_encode($res['d4'] )!!};
		var dataLoad5 = {!! json_encode($res['d5'] )!!};
		var dataLoad6 = {!! json_encode($res['d6'] )!!};
		var dataLoad7 = {!! json_encode($res['d7'] )!!};
		var dataLoad8 = {!! json_encode($res['d8'] )!!};
		var dataLoad9 = {!! json_encode($res['d9'] )!!};
		var dataLoad10 = {!! json_encode($res['d10'] )!!};
		var dataLoad11 = {!! json_encode($res['d11'] )!!};
		var dataLoad12 = {!! json_encode($res['d12'] )!!};
		var dataLoad13 = {!! json_encode($res['d13'] )!!};
		var dataLoad14 = {!! json_encode($res['d14'] )!!};
		var dataLoad15 = {!! json_encode($res['d15'] )!!};
		var dataLoad16 = {!! json_encode($res['d16'] )!!};
		var dataLoad17 = {!! json_encode($res['d17'] )!!};
		var dataLoad18 = {!! json_encode($res['d18'] )!!};
		var dataLoad19 = {!! json_encode($res['d19'] )!!};
		var dataLoad20 = {!! json_encode($res['d20'] )!!};
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

		for (var i = 0; i <= dataLoad2.length - 1; i++) {
            if(dataLoad2[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad2[i].type == "textbox") {
                $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
            }
            if (dataLoad2[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad2[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji2[dataLoad2[i].emrdfk] = chekedd
            }
            if (dataLoad2[i].type == "radio") {
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value

            }

            if (dataLoad2[i].type == "datetime") {
                $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
            }
            if (dataLoad2[i].type == "time") {
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
            }
            if (dataLoad2[i].type == "date") {
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
            }

            if (dataLoad2[i].type == "checkboxtextbox") {
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
                $scope.item.obji2[dataLoad2[i].emrdfk] = true
            }
            if (dataLoad2[i].type == "textarea") {
                $('#id_'+dataLoad2[i].emrdfk).html( dataLoad2[i].value)
                $scope.item.obji2[dataLoad2[i].emrdfk] = dataLoad2[i].value
            }
            if (dataLoad2[i].type == "combobox") {
     
                var str = dataLoad2[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                    $('#id_'+dataLoad2[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad2[i].type == "combobox2") {
                var str = dataLoad2[i].value
                var res = str.split("~");
                
                $scope.item.obji2[dataLoad2[i].emrdfk+""+1] = res[0]
                $scope.item.obji2[dataLoad2[i].emrdfk] = res[1]
                $('#id_'+dataLoad2[i].emrdfk).html ( res[1])

            }

            if (dataLoad2[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad2[i].value
            }

            if (dataLoad2[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad2[i].value
            }

            if (dataLoad2[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad2[i].value
            }
            if (dataLoad2[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad2[i].value
            }
            
            if (dataLoad2[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad2[i].value
            }

            $scope.tglemr = dataLoad2[i].tgl
            
        }

		for (var i = 0; i <= dataLoad3.length - 1; i++) {
            if(dataLoad3[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad3[i].type == "textbox") {
                $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
            }
            if (dataLoad3[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad3[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji3[dataLoad3[i].emrdfk] = chekedd
            }
            if (dataLoad3[i].type == "radio") {
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value

            }

            if (dataLoad3[i].type == "datetime") {
                $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
            }
            if (dataLoad3[i].type == "time") {
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
            }
            if (dataLoad3[i].type == "date") {
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
            }

            if (dataLoad3[i].type == "checkboxtextbox") {
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
                $scope.item.obji3[dataLoad3[i].emrdfk] = true
            }
            if (dataLoad3[i].type == "textarea") {
                $('#id_'+dataLoad3[i].emrdfk).html( dataLoad3[i].value)
                $scope.item.obji3[dataLoad3[i].emrdfk] = dataLoad3[i].value
            }
            if (dataLoad3[i].type == "combobox") {
     
                var str = dataLoad3[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                    $('#id_'+dataLoad3[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad3[i].type == "combobox2") {
                var str = dataLoad3[i].value
                var res = str.split("~");
                
                $scope.item.obji3[dataLoad3[i].emrdfk+""+1] = res[0]
                $scope.item.obji3[dataLoad3[i].emrdfk] = res[1]
                $('#id_'+dataLoad3[i].emrdfk).html ( res[1])

            }

            if (dataLoad3[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad3[i].value
            }

            if (dataLoad3[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad3[i].value
            }

            if (dataLoad3[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad3[i].value
            }
            if (dataLoad3[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad3[i].value
            }
            
            if (dataLoad3[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad3[i].value
            }

            $scope.tglemr = dataLoad3[i].tgl
            
        }

		for (var i = 0; i <= dataLoad4.length - 1; i++) {
            if(dataLoad4[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad4[i].type == "textbox") {
                $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
            }
            if (dataLoad4[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad4[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji4[dataLoad4[i].emrdfk] = chekedd
            }
            if (dataLoad4[i].type == "radio") {
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value

            }

            if (dataLoad4[i].type == "datetime") {
                $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
            }
            if (dataLoad4[i].type == "time") {
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
            }
            if (dataLoad4[i].type == "date") {
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
            }

            if (dataLoad4[i].type == "checkboxtextbox") {
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
                $scope.item.obji4[dataLoad4[i].emrdfk] = true
            }
            if (dataLoad4[i].type == "textarea") {
                $('#id_'+dataLoad4[i].emrdfk).html( dataLoad4[i].value)
                $scope.item.obji4[dataLoad4[i].emrdfk] = dataLoad4[i].value
            }
            if (dataLoad4[i].type == "combobox") {
     
                var str = dataLoad4[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                    $('#id_'+dataLoad4[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad4[i].type == "combobox2") {
                var str = dataLoad4[i].value
                var res = str.split("~");
                
                $scope.item.obji4[dataLoad4[i].emrdfk+""+1] = res[0]
                $scope.item.obji4[dataLoad4[i].emrdfk] = res[1]
                $('#id_'+dataLoad4[i].emrdfk).html ( res[1])

            }

            if (dataLoad4[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad4[i].value
            }

            if (dataLoad4[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad4[i].value
            }

            if (dataLoad4[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad4[i].value
            }
            if (dataLoad4[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad4[i].value
            }
            
            if (dataLoad4[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad4[i].value
            }

            $scope.tglemr = dataLoad4[i].tgl
            
        }

		for (var i = 0; i <= dataLoad5.length - 1; i++) {
            if(dataLoad5[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad5[i].type == "textbox") {
                $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
            }
            if (dataLoad5[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad5[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji5[dataLoad5[i].emrdfk] = chekedd
            }
            if (dataLoad5[i].type == "radio") {
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value

            }

            if (dataLoad5[i].type == "datetime") {
                $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
            }
            if (dataLoad5[i].type == "time") {
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
            }
            if (dataLoad5[i].type == "date") {
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
            }

            if (dataLoad5[i].type == "checkboxtextbox") {
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
                $scope.item.obji5[dataLoad5[i].emrdfk] = true
            }
            if (dataLoad5[i].type == "textarea") {
                $('#id_'+dataLoad5[i].emrdfk).html( dataLoad5[i].value)
                $scope.item.obji5[dataLoad5[i].emrdfk] = dataLoad5[i].value
            }
            if (dataLoad5[i].type == "combobox") {
     
                var str = dataLoad5[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                    $('#id_'+dataLoad5[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad5[i].type == "combobox2") {
                var str = dataLoad5[i].value
                var res = str.split("~");
                
                $scope.item.obji5[dataLoad5[i].emrdfk+""+1] = res[0]
                $scope.item.obji5[dataLoad5[i].emrdfk] = res[1]
                $('#id_'+dataLoad5[i].emrdfk).html ( res[1])

            }

            if (dataLoad5[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad5[i].value
            }

            if (dataLoad5[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad5[i].value
            }

            if (dataLoad5[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad5[i].value
            }
            if (dataLoad5[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad5[i].value
            }
            
            if (dataLoad5[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad5[i].value
            }

            $scope.tglemr = dataLoad5[i].tgl
            
        }

		for (var i = 0; i <= dataLoad6.length - 1; i++) {
            if(dataLoad6[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad6[i].type == "textbox") {
                $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
            }
            if (dataLoad6[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad6[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji6[dataLoad6[i].emrdfk] = chekedd
            }
            if (dataLoad6[i].type == "radio") {
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value

            }

            if (dataLoad6[i].type == "datetime") {
                $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
            }
            if (dataLoad6[i].type == "time") {
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
            }
            if (dataLoad6[i].type == "date") {
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
            }

            if (dataLoad6[i].type == "checkboxtextbox") {
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
                $scope.item.obji6[dataLoad6[i].emrdfk] = true
            }
            if (dataLoad6[i].type == "textarea") {
                $('#id_'+dataLoad6[i].emrdfk).html( dataLoad6[i].value)
                $scope.item.obji6[dataLoad6[i].emrdfk] = dataLoad6[i].value
            }
            if (dataLoad6[i].type == "combobox") {
     
                var str = dataLoad6[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                    $('#id_'+dataLoad6[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad6[i].type == "combobox2") {
                var str = dataLoad6[i].value
                var res = str.split("~");
                
                $scope.item.obji6[dataLoad6[i].emrdfk+""+1] = res[0]
                $scope.item.obji6[dataLoad6[i].emrdfk] = res[1]
                $('#id_'+dataLoad6[i].emrdfk).html ( res[1])

            }

            if (dataLoad6[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad6[i].value
            }

            if (dataLoad6[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad6[i].value
            }

            if (dataLoad6[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad6[i].value
            }
            if (dataLoad6[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad6[i].value
            }
            
            if (dataLoad6[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad6[i].value
            }

            $scope.tglemr = dataLoad6[i].tgl
            
        }

		for (var i = 0; i <= dataLoad7.length - 1; i++) {
            if(dataLoad7[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad7[i].type == "textbox") {
                $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
            }
            if (dataLoad7[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad7[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji7[dataLoad7[i].emrdfk] = chekedd
            }
            if (dataLoad7[i].type == "radio") {
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value

            }

            if (dataLoad7[i].type == "datetime") {
                $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
            }
            if (dataLoad7[i].type == "time") {
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
            }
            if (dataLoad7[i].type == "date") {
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
            }

            if (dataLoad7[i].type == "checkboxtextbox") {
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
                $scope.item.obji7[dataLoad7[i].emrdfk] = true
            }
            if (dataLoad7[i].type == "textarea") {
                $('#id_'+dataLoad7[i].emrdfk).html( dataLoad7[i].value)
                $scope.item.obji7[dataLoad7[i].emrdfk] = dataLoad7[i].value
            }
            if (dataLoad7[i].type == "combobox") {
     
                var str = dataLoad7[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                    $('#id_'+dataLoad7[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad7[i].type == "combobox2") {
                var str = dataLoad7[i].value
                var res = str.split("~");
                
                $scope.item.obji7[dataLoad7[i].emrdfk+""+1] = res[0]
                $scope.item.obji7[dataLoad7[i].emrdfk] = res[1]
                $('#id_'+dataLoad7[i].emrdfk).html ( res[1])

            }

            if (dataLoad7[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad7[i].value
            }

            if (dataLoad7[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad7[i].value
            }

            if (dataLoad7[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad7[i].value
            }
            if (dataLoad7[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad7[i].value
            }
            
            if (dataLoad7[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad7[i].value
            }

            $scope.tglemr = dataLoad7[i].tgl
            
        }

		for (var i = 0; i <= dataLoad8.length - 1; i++) {
            if(dataLoad8[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad8[i].type == "textbox") {
                $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
            }
            if (dataLoad8[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad8[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji8[dataLoad8[i].emrdfk] = chekedd
            }
            if (dataLoad8[i].type == "radio") {
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value

            }

            if (dataLoad8[i].type == "datetime") {
                $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
            }
            if (dataLoad8[i].type == "time") {
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
            }
            if (dataLoad8[i].type == "date") {
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
            }

            if (dataLoad8[i].type == "checkboxtextbox") {
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
                $scope.item.obji8[dataLoad8[i].emrdfk] = true
            }
            if (dataLoad8[i].type == "textarea") {
                $('#id_'+dataLoad8[i].emrdfk).html( dataLoad8[i].value)
                $scope.item.obji8[dataLoad8[i].emrdfk] = dataLoad8[i].value
            }
            if (dataLoad8[i].type == "combobox") {
     
                var str = dataLoad8[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji8[dataLoad8[i].emrdfk] = res[1]
                    $('#id_'+dataLoad8[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad8[i].type == "combobox2") {
                var str = dataLoad8[i].value
                var res = str.split("~");
                
                $scope.item.obji8[dataLoad8[i].emrdfk+""+1] = res[0]
                $scope.item.obji8[dataLoad8[i].emrdfk] = res[1]
                $('#id_'+dataLoad8[i].emrdfk).html ( res[1])

            }

            if (dataLoad8[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad8[i].value
            }

            if (dataLoad8[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad8[i].value
            }

            if (dataLoad8[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad8[i].value
            }
            if (dataLoad8[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad8[i].value
            }
            
            if (dataLoad8[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad8[i].value
            }

            $scope.tglemr = dataLoad8[i].tgl
            
        }

		for (var i = 0; i <= dataLoad9.length - 1; i++) {
            if(dataLoad9[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad9[i].type == "textbox") {
                $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
            }
            if (dataLoad9[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad9[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji9[dataLoad9[i].emrdfk] = chekedd
            }
            if (dataLoad9[i].type == "radio") {
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value

            }

            if (dataLoad9[i].type == "datetime") {
                $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
            }
            if (dataLoad9[i].type == "time") {
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
            }
            if (dataLoad9[i].type == "date") {
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
            }

            if (dataLoad9[i].type == "checkboxtextbox") {
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
                $scope.item.obji9[dataLoad9[i].emrdfk] = true
            }
            if (dataLoad9[i].type == "textarea") {
                $('#id_'+dataLoad9[i].emrdfk).html( dataLoad9[i].value)
                $scope.item.obji9[dataLoad9[i].emrdfk] = dataLoad9[i].value
            }
            if (dataLoad9[i].type == "combobox") {
     
                var str = dataLoad9[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji9[dataLoad9[i].emrdfk] = res[1]
                    $('#id_'+dataLoad9[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad9[i].type == "combobox2") {
                var str = dataLoad9[i].value
                var res = str.split("~");
                
                $scope.item.obji9[dataLoad9[i].emrdfk+""+1] = res[0]
                $scope.item.obji9[dataLoad9[i].emrdfk] = res[1]
                $('#id_'+dataLoad9[i].emrdfk).html ( res[1])

            }

            if (dataLoad9[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad9[i].value
            }

            if (dataLoad9[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad9[i].value
            }

            if (dataLoad9[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad9[i].value
            }
            if (dataLoad9[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad9[i].value
            }
            
            if (dataLoad9[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad9[i].value
            }

            $scope.tglemr = dataLoad9[i].tgl
            
        }

		for (var i = 0; i <= dataLoad10.length - 1; i++) {
            if(dataLoad10[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad10[i].type == "textbox") {
                $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
            }
            if (dataLoad10[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad10[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji10[dataLoad10[i].emrdfk] = chekedd
            }
            if (dataLoad10[i].type == "radio") {
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value

            }

            if (dataLoad10[i].type == "datetime") {
                $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
            }
            if (dataLoad10[i].type == "time") {
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
            }
            if (dataLoad10[i].type == "date") {
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
            }

            if (dataLoad10[i].type == "checkboxtextbox") {
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
                $scope.item.obji10[dataLoad10[i].emrdfk] = true
            }
            if (dataLoad10[i].type == "textarea") {
                $('#id_'+dataLoad10[i].emrdfk).html( dataLoad10[i].value)
                $scope.item.obji10[dataLoad10[i].emrdfk] = dataLoad10[i].value
            }
            if (dataLoad10[i].type == "combobox") {
     
                var str = dataLoad10[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji10[dataLoad10[i].emrdfk] = res[1]
                    $('#id_'+dataLoad10[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad10[i].type == "combobox2") {
                var str = dataLoad10[i].value
                var res = str.split("~");
                
                $scope.item.obji10[dataLoad10[i].emrdfk+""+1] = res[0]
                $scope.item.obji10[dataLoad10[i].emrdfk] = res[1]
                $('#id_'+dataLoad10[i].emrdfk).html ( res[1])

            }

            if (dataLoad10[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad10[i].value
            }

            if (dataLoad10[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad10[i].value
            }

            if (dataLoad10[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad10[i].value
            }
            if (dataLoad10[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad10[i].value
            }
            
            if (dataLoad10[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad10[i].value
            }

            $scope.tglemr = dataLoad10[i].tgl
            
        }

		for (var i = 0; i <= dataLoad11.length - 1; i++) {
            if(dataLoad11[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad11[i].type == "textbox") {
                $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
            }
            if (dataLoad11[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad11[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji11[dataLoad11[i].emrdfk] = chekedd
            }
            if (dataLoad11[i].type == "radio") {
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value

            }

            if (dataLoad11[i].type == "datetime") {
                $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
            }
            if (dataLoad11[i].type == "time") {
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
            }
            if (dataLoad11[i].type == "date") {
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
            }

            if (dataLoad11[i].type == "checkboxtextbox") {
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
                $scope.item.obji11[dataLoad11[i].emrdfk] = true
            }
            if (dataLoad11[i].type == "textarea") {
                $('#id_'+dataLoad11[i].emrdfk).html( dataLoad11[i].value)
                $scope.item.obji11[dataLoad11[i].emrdfk] = dataLoad11[i].value
            }
            if (dataLoad11[i].type == "combobox") {
     
                var str = dataLoad11[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji11[dataLoad11[i].emrdfk] = res[1]
                    $('#id_'+dataLoad11[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad11[i].type == "combobox2") {
                var str = dataLoad11[i].value
                var res = str.split("~");
                
                $scope.item.obji11[dataLoad11[i].emrdfk+""+1] = res[0]
                $scope.item.obji11[dataLoad11[i].emrdfk] = res[1]
                $('#id_'+dataLoad11[i].emrdfk).html ( res[1])

            }

            if (dataLoad11[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad11[i].value
            }

            if (dataLoad11[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad11[i].value
            }

            if (dataLoad11[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad11[i].value
            }
            if (dataLoad11[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad11[i].value
            }
            
            if (dataLoad11[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad11[i].value
            }

            $scope.tglemr = dataLoad11[i].tgl
            
        }

		for (var i = 0; i <= dataLoad12.length - 1; i++) {
            if(dataLoad12[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad12[i].type == "textbox") {
                $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
            }
            if (dataLoad12[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad12[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji12[dataLoad12[i].emrdfk] = chekedd
            }
            if (dataLoad12[i].type == "radio") {
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value

            }

            if (dataLoad12[i].type == "datetime") {
                $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
            }
            if (dataLoad12[i].type == "time") {
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
            }
            if (dataLoad12[i].type == "date") {
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
            }

            if (dataLoad12[i].type == "checkboxtextbox") {
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
                $scope.item.obji12[dataLoad12[i].emrdfk] = true
            }
            if (dataLoad12[i].type == "textarea") {
                $('#id_'+dataLoad12[i].emrdfk).html( dataLoad12[i].value)
                $scope.item.obji12[dataLoad12[i].emrdfk] = dataLoad12[i].value
            }
            if (dataLoad12[i].type == "combobox") {
     
                var str = dataLoad12[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji12[dataLoad12[i].emrdfk] = res[1]
                    $('#id_'+dataLoad12[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad12[i].type == "combobox2") {
                var str = dataLoad12[i].value
                var res = str.split("~");
                
                $scope.item.obji12[dataLoad12[i].emrdfk+""+1] = res[0]
                $scope.item.obji12[dataLoad12[i].emrdfk] = res[1]
                $('#id_'+dataLoad12[i].emrdfk).html ( res[1])

            }

            if (dataLoad12[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad12[i].value
            }

            if (dataLoad12[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad12[i].value
            }

            if (dataLoad12[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad12[i].value
            }
            if (dataLoad12[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad12[i].value
            }
            
            if (dataLoad12[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad12[i].value
            }

            $scope.tglemr = dataLoad12[i].tgl
            
        }

		for (var i = 0; i <= dataLoad13.length - 1; i++) {
            if(dataLoad13[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad13[i].type == "textbox") {
                $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
            }
            if (dataLoad13[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad13[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji13[dataLoad13[i].emrdfk] = chekedd
            }
            if (dataLoad13[i].type == "radio") {
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value

            }

            if (dataLoad13[i].type == "datetime") {
                $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
            }
            if (dataLoad13[i].type == "time") {
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
            }
            if (dataLoad13[i].type == "date") {
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
            }

            if (dataLoad13[i].type == "checkboxtextbox") {
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
                $scope.item.obji13[dataLoad13[i].emrdfk] = true
            }
            if (dataLoad13[i].type == "textarea") {
                $('#id_'+dataLoad13[i].emrdfk).html( dataLoad13[i].value)
                $scope.item.obji13[dataLoad13[i].emrdfk] = dataLoad13[i].value
            }
            if (dataLoad13[i].type == "combobox") {
     
                var str = dataLoad13[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji13[dataLoad13[i].emrdfk] = res[1]
                    $('#id_'+dataLoad13[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad13[i].type == "combobox2") {
                var str = dataLoad13[i].value
                var res = str.split("~");
                
                $scope.item.obji13[dataLoad13[i].emrdfk+""+1] = res[0]
                $scope.item.obji13[dataLoad13[i].emrdfk] = res[1]
                $('#id_'+dataLoad13[i].emrdfk).html ( res[1])

            }

            if (dataLoad13[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad13[i].value
            }

            if (dataLoad13[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad13[i].value
            }

            if (dataLoad13[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad13[i].value
            }
            if (dataLoad13[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad13[i].value
            }
            
            if (dataLoad13[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad13[i].value
            }

            $scope.tglemr = dataLoad13[i].tgl
            
        }

		for (var i = 0; i <= dataLoad14.length - 1; i++) {
            if(dataLoad14[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad14[i].type == "textbox") {
                $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
            }
            if (dataLoad14[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad14[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji14[dataLoad14[i].emrdfk] = chekedd
            }
            if (dataLoad14[i].type == "radio") {
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value

            }

            if (dataLoad14[i].type == "datetime") {
                $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
            }
            if (dataLoad14[i].type == "time") {
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
            }
            if (dataLoad14[i].type == "date") {
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
            }

            if (dataLoad14[i].type == "checkboxtextbox") {
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
                $scope.item.obji14[dataLoad14[i].emrdfk] = true
            }
            if (dataLoad14[i].type == "textarea") {
                $('#id_'+dataLoad14[i].emrdfk).html( dataLoad14[i].value)
                $scope.item.obji14[dataLoad14[i].emrdfk] = dataLoad14[i].value
            }
            if (dataLoad14[i].type == "combobox") {
     
                var str = dataLoad14[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji14[dataLoad14[i].emrdfk] = res[1]
                    $('#id_'+dataLoad14[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad14[i].type == "combobox2") {
                var str = dataLoad14[i].value
                var res = str.split("~");
                
                $scope.item.obji14[dataLoad14[i].emrdfk+""+1] = res[0]
                $scope.item.obji14[dataLoad14[i].emrdfk] = res[1]
                $('#id_'+dataLoad14[i].emrdfk).html ( res[1])

            }

            if (dataLoad14[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad14[i].value
            }

            if (dataLoad14[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad14[i].value
            }

            if (dataLoad14[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad14[i].value
            }
            if (dataLoad14[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad14[i].value
            }
            
            if (dataLoad14[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad14[i].value
            }

            $scope.tglemr = dataLoad14[i].tgl
            
        }

		for (var i = 0; i <= dataLoad15.length - 1; i++) {
            if(dataLoad15[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad15[i].type == "textbox") {
                $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
            }
            if (dataLoad15[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad15[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji15[dataLoad15[i].emrdfk] = chekedd
            }
            if (dataLoad15[i].type == "radio") {
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value

            }

            if (dataLoad15[i].type == "datetime") {
                $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
            }
            if (dataLoad15[i].type == "time") {
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
            }
            if (dataLoad15[i].type == "date") {
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
            }

            if (dataLoad15[i].type == "checkboxtextbox") {
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
                $scope.item.obji15[dataLoad15[i].emrdfk] = true
            }
            if (dataLoad15[i].type == "textarea") {
                $('#id_'+dataLoad15[i].emrdfk).html( dataLoad15[i].value)
                $scope.item.obji15[dataLoad15[i].emrdfk] = dataLoad15[i].value
            }
            if (dataLoad15[i].type == "combobox") {
     
                var str = dataLoad15[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji15[dataLoad15[i].emrdfk] = res[1]
                    $('#id_'+dataLoad15[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad15[i].type == "combobox2") {
                var str = dataLoad15[i].value
                var res = str.split("~");
                
                $scope.item.obji15[dataLoad15[i].emrdfk+""+1] = res[0]
                $scope.item.obji15[dataLoad15[i].emrdfk] = res[1]
                $('#id_'+dataLoad15[i].emrdfk).html ( res[1])

            }

            if (dataLoad15[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad15[i].value
            }

            if (dataLoad15[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad15[i].value
            }

            if (dataLoad15[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad15[i].value
            }
            if (dataLoad15[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad15[i].value
            }
            
            if (dataLoad15[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad15[i].value
            }

            $scope.tglemr = dataLoad15[i].tgl
            
        }

		for (var i = 0; i <= dataLoad16.length - 1; i++) {
            if(dataLoad16[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad16[i].type == "textbox") {
                $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
            }
            if (dataLoad16[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad16[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji16[dataLoad16[i].emrdfk] = chekedd
            }
            if (dataLoad16[i].type == "radio") {
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value

            }

            if (dataLoad16[i].type == "datetime") {
                $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
            }
            if (dataLoad16[i].type == "time") {
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
            }
            if (dataLoad16[i].type == "date") {
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
            }

            if (dataLoad16[i].type == "checkboxtextbox") {
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
                $scope.item.obji16[dataLoad16[i].emrdfk] = true
            }
            if (dataLoad16[i].type == "textarea") {
                $('#id_'+dataLoad16[i].emrdfk).html( dataLoad16[i].value)
                $scope.item.obji16[dataLoad16[i].emrdfk] = dataLoad16[i].value
            }
            if (dataLoad16[i].type == "combobox") {
     
                var str = dataLoad16[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji16[dataLoad16[i].emrdfk] = res[1]
                    $('#id_'+dataLoad16[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad16[i].type == "combobox2") {
                var str = dataLoad16[i].value
                var res = str.split("~");
                
                $scope.item.obji16[dataLoad16[i].emrdfk+""+1] = res[0]
                $scope.item.obji16[dataLoad16[i].emrdfk] = res[1]
                $('#id_'+dataLoad16[i].emrdfk).html ( res[1])

            }

            if (dataLoad16[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad16[i].value
            }

            if (dataLoad16[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad16[i].value
            }

            if (dataLoad16[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad16[i].value
            }
            if (dataLoad16[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad16[i].value
            }
            
            if (dataLoad16[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad16[i].value
            }

            $scope.tglemr = dataLoad16[i].tgl
            
        }

		for (var i = 0; i <= dataLoad17.length - 1; i++) {
            if(dataLoad17[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad17[i].type == "textbox") {
                $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
            }
            if (dataLoad17[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad17[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji17[dataLoad17[i].emrdfk] = chekedd
            }
            if (dataLoad17[i].type == "radio") {
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value

            }

            if (dataLoad17[i].type == "datetime") {
                $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
            }
            if (dataLoad17[i].type == "time") {
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
            }
            if (dataLoad17[i].type == "date") {
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
            }

            if (dataLoad17[i].type == "checkboxtextbox") {
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
                $scope.item.obji17[dataLoad17[i].emrdfk] = true
            }
            if (dataLoad17[i].type == "textarea") {
                $('#id_'+dataLoad17[i].emrdfk).html( dataLoad17[i].value)
                $scope.item.obji17[dataLoad17[i].emrdfk] = dataLoad17[i].value
            }
            if (dataLoad17[i].type == "combobox") {
     
                var str = dataLoad17[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji17[dataLoad17[i].emrdfk] = res[1]
                    $('#id_'+dataLoad17[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad17[i].type == "combobox2") {
                var str = dataLoad17[i].value
                var res = str.split("~");
                
                $scope.item.obji17[dataLoad17[i].emrdfk+""+1] = res[0]
                $scope.item.obji17[dataLoad17[i].emrdfk] = res[1]
                $('#id_'+dataLoad17[i].emrdfk).html ( res[1])

            }

            if (dataLoad17[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad17[i].value
            }

            if (dataLoad17[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad17[i].value
            }

            if (dataLoad17[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad17[i].value
            }
            if (dataLoad17[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad17[i].value
            }
            
            if (dataLoad17[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad17[i].value
            }

            $scope.tglemr = dataLoad17[i].tgl
            
        }

		for (var i = 0; i <= dataLoad18.length - 1; i++) {
            if(dataLoad18[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad18[i].type == "textbox") {
                $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
            }
            if (dataLoad18[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad18[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji18[dataLoad18[i].emrdfk] = chekedd
            }
            if (dataLoad18[i].type == "radio") {
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value

            }

            if (dataLoad18[i].type == "datetime") {
                $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
            }
            if (dataLoad18[i].type == "time") {
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
            }
            if (dataLoad18[i].type == "date") {
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
            }

            if (dataLoad18[i].type == "checkboxtextbox") {
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
                $scope.item.obji18[dataLoad18[i].emrdfk] = true
            }
            if (dataLoad18[i].type == "textarea") {
                $('#id_'+dataLoad18[i].emrdfk).html( dataLoad18[i].value)
                $scope.item.obji18[dataLoad18[i].emrdfk] = dataLoad18[i].value
            }
            if (dataLoad18[i].type == "combobox") {
     
                var str = dataLoad18[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji18[dataLoad18[i].emrdfk] = res[1]
                    $('#id_'+dataLoad18[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad18[i].type == "combobox2") {
                var str = dataLoad18[i].value
                var res = str.split("~");
                
                $scope.item.obji18[dataLoad18[i].emrdfk+""+1] = res[0]
                $scope.item.obji18[dataLoad18[i].emrdfk] = res[1]
                $('#id_'+dataLoad18[i].emrdfk).html ( res[1])

            }

            if (dataLoad18[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad18[i].value
            }

            if (dataLoad18[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad18[i].value
            }

            if (dataLoad18[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad18[i].value
            }
            if (dataLoad18[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad18[i].value
            }
            
            if (dataLoad18[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad18[i].value
            }

            $scope.tglemr = dataLoad18[i].tgl
            
        }

		for (var i = 0; i <= dataLoad19.length - 1; i++) {
            if(dataLoad19[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad19[i].type == "textbox") {
                $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
            }
            if (dataLoad19[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad19[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji19[dataLoad19[i].emrdfk] = chekedd
            }
            if (dataLoad19[i].type == "radio") {
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value

            }

            if (dataLoad19[i].type == "datetime") {
                $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
            }
            if (dataLoad19[i].type == "time") {
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
            }
            if (dataLoad19[i].type == "date") {
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
            }

            if (dataLoad19[i].type == "checkboxtextbox") {
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
                $scope.item.obji19[dataLoad19[i].emrdfk] = true
            }
            if (dataLoad19[i].type == "textarea") {
                $('#id_'+dataLoad19[i].emrdfk).html( dataLoad19[i].value)
                $scope.item.obji19[dataLoad19[i].emrdfk] = dataLoad19[i].value
            }
            if (dataLoad19[i].type == "combobox") {
     
                var str = dataLoad19[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji19[dataLoad19[i].emrdfk] = res[1]
                    $('#id_'+dataLoad19[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad19[i].type == "combobox2") {
                var str = dataLoad19[i].value
                var res = str.split("~");
                
                $scope.item.obji19[dataLoad19[i].emrdfk+""+1] = res[0]
                $scope.item.obji19[dataLoad19[i].emrdfk] = res[1]
                $('#id_'+dataLoad19[i].emrdfk).html ( res[1])

            }

            if (dataLoad19[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad19[i].value
            }

            if (dataLoad19[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad19[i].value
            }

            if (dataLoad19[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad19[i].value
            }
            if (dataLoad19[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad19[i].value
            }
            
            if (dataLoad19[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad19[i].value
            }

            $scope.tglemr = dataLoad19[i].tgl
            
        }

		for (var i = 0; i <= dataLoad20.length - 1; i++) {
            if(dataLoad20[i].emrdfk == 3110029){
                continue;
            }
            if (dataLoad20[i].type == "textbox") {
                $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
            }
            if (dataLoad20[i].type == "checkbox") {
                var chekedd = false
                if (dataLoad20[i].value == '1') {
                    var chekedd = true
                }
                $scope.item.obji20[dataLoad20[i].emrdfk] = chekedd
            }
            if (dataLoad20[i].type == "radio") {
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value

            }

            if (dataLoad20[i].type == "datetime") {
                $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
            }
            if (dataLoad20[i].type == "time") {
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
            }
            if (dataLoad20[i].type == "date") {
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
            }

            if (dataLoad20[i].type == "checkboxtextbox") {
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
                $scope.item.obji20[dataLoad20[i].emrdfk] = true
            }
            if (dataLoad20[i].type == "textarea") {
                $('#id_'+dataLoad20[i].emrdfk).html( dataLoad20[i].value)
                $scope.item.obji20[dataLoad20[i].emrdfk] = dataLoad20[i].value
            }
            if (dataLoad20[i].type == "combobox") {
     
                var str = dataLoad20[i].value
                if(str != null)
                {
                    var res = str.split("~");
                    
                    $scope.item.obji20[dataLoad20[i].emrdfk] = res[1]
                    $('#id_'+dataLoad20[i].emrdfk).html ( res[1])
                }
            }
            if (dataLoad20[i].type == "combobox2") {
                var str = dataLoad20[i].value
                var res = str.split("~");
                
                $scope.item.obji20[dataLoad20[i].emrdfk+""+1] = res[0]
                $scope.item.obji20[dataLoad20[i].emrdfk] = res[1]
                $('#id_'+dataLoad20[i].emrdfk).html ( res[1])

            }

            if (dataLoad20[i].emrdfk == '423816' ) {
                $scope.hariTgl = dataLoad20[i].value
            }

            if (dataLoad20[i].emrdfk == '2000001974' ) {
                $scope.jamPeriksa = dataLoad20[i].value
            }

            if (dataLoad20[i].emrdfk == '2000002354' ) {
                $scope.tgl1 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002357' ) {
                $scope.tgl2 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002360' ) {
                $scope.tgl3 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002363' ) {
                $scope.tgl4 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002366' ) {
                $scope.tgl5 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002369' ) {
                $scope.tgl6 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002372' ) {
                $scope.tgl7 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002375' ) {
                $scope.tgl8 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002378' ) {
                $scope.tgl9 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002381' ) {
                $scope.tgl10 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002384' ) {
                $scope.tgl11 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002387' ) {
                $scope.tgl12 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002390' ) {
                $scope.tgl13 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002393' ) {
                $scope.tgl14 = dataLoad20[i].value
            }
            if (dataLoad20[i].emrdfk == '2000002396' ) {
                $scope.tgl15 = dataLoad20[i].value
            }
            
            if (dataLoad20[i].emrdfk == '2000002408' ) {
                $scope.pukul2 = dataLoad20[i].value
            }

            $scope.tglemr = dataLoad20[i].tgl
            
        }

        var p1 = $scope.item.obj[31101397];
        var pp1 = $scope.item.obj[31101398];
        var p2 = $scope.item.obji2[31101397];
        var pp2 = $scope.item.obji2[31101398];
        var p3 = $scope.item.obji3[31101397];
        var pp3 = $scope.item.obji3[31101398];
        var p4 = $scope.item.obji4[31101397];
        var pp4 = $scope.item.obji4[31101398];
        var p5 = $scope.item.obji5[31101397];
        var pp5 = $scope.item.obji5[31101398];
        var p6 = $scope.item.obji6[31101397];
        var pp6 = $scope.item.obji6[31101398];
        var p7 = $scope.item.obji7[31101397];
        var pp7 = $scope.item.obji7[31101398];
        var p8 = $scope.item.obji8[31101397];
        var pp8 = $scope.item.obji8[31101398];
        var p9 = $scope.item.obji9[31101397];
        var pp9 = $scope.item.obji9[31101398];
        var p10 = $scope.item.obji10[31101397];
        var pp10 = $scope.item.obji10[31101398];
        var p11 = $scope.item.obji11[31101397];
        var pp11 = $scope.item.obji11[31101398];
        var p12 = $scope.item.obji12[31101397];
        var pp12 = $scope.item.obji12[31101398];
        var p13 = $scope.item.obji13[31101397];
        var pp13 = $scope.item.obji13[31101398];
        var p14 = $scope.item.obji14[31101397];
        var pp14 = $scope.item.obji14[31101398];
        var p15 = $scope.item.obji15[31101397];
        var pp15 = $scope.item.obji15[31101398];
        var p16 = $scope.item.obji16[31101397];
        var pp16 = $scope.item.obji16[31101398];
        var p17 = $scope.item.obji17[31101397];
        var pp17 = $scope.item.obji17[31101398];
        var p18 = $scope.item.obji18[31101397];
        var pp18 = $scope.item.obji18[31101398];
        var p19 = $scope.item.obji19[31101397];
        var pp19 = $scope.item.obji19[31101398];
        var p20 = $scope.item.obji20[31101397];
        var pp20 = $scope.item.obji20[31101398];
		
        if(p1 != undefined){
            jQuery('#qrcodep1').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p1
            });	
        }

        if(pp1 != undefined){
            jQuery('#qrcodepp1').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp1
            });	
        }
        if(p2 != undefined){
            jQuery('#qrcodep2').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p2
            });	
        }

        if(pp2 != undefined){
            jQuery('#qrcodepp2').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp2
            });	
        }
        if(p3 != undefined){
            jQuery('#qrcodep3').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p3
            });	
        }

        if(pp3 != undefined){
            jQuery('#qrcodepp3').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp3
            });	
        }
        if(p4 != undefined){
            jQuery('#qrcodep4').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p4
            });	
        }

        if(pp4 != undefined){
            jQuery('#qrcodepp4').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp4
            });	
        }
        if(p5 != undefined){
            jQuery('#qrcodep5').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p5
            });	
        }

        if(pp5 != undefined){
            jQuery('#qrcodepp5').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp5
            });	
        }
        if(p6 != undefined){
            jQuery('#qrcodep6').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p6
            });	
        }

        if(pp6 != undefined){
            jQuery('#qrcodepp6').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp6
            });	
        }
        if(p7 != undefined){
            jQuery('#qrcodep7').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p7
            });	
        }

        if(pp7 != undefined){
            jQuery('#qrcodepp7').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp7
            });	
        }
        if(p8 != undefined){
            jQuery('#qrcodep8').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p8
            });	
        }

        if(pp8 != undefined){
            jQuery('#qrcodepp8').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp8
            });	
        }
        if(p9 != undefined){
            jQuery('#qrcodep9').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p9
            });	
        }

        if(pp9 != undefined){
            jQuery('#qrcodepp9').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp9
            });	
        }
        if(p10 != undefined){
            jQuery('#qrcodep10').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p10
            });	
        }

        if(pp10 != undefined){
            jQuery('#qrcodepp10').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp10
            });	
        }
        if(p11 != undefined){
            jQuery('#qrcodep11').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p11
            });	
        }

        if(pp11 != undefined){
            jQuery('#qrcodepp11').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp11
            });	
        }
        if(p12 != undefined){
            jQuery('#qrcodep12').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p12
            });	
        }

        if(pp12 != undefined){
            jQuery('#qrcodepp12').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp12
            });	
        }
        if(p13 != undefined){
            jQuery('#qrcodep13').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p13
            });	
        }

        if(pp13 != undefined){
            jQuery('#qrcodepp13').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp13
            });	
        }
        if(p14 != undefined){
            jQuery('#qrcodep14').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p14
            });	
        }

        if(pp14 != undefined){
            jQuery('#qrcodepp14').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp14
            });	
        }
        if(p15 != undefined){
            jQuery('#qrcodep15').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p15
            });	
        }

        if(pp15 != undefined){
            jQuery('#qrcodepp15').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp15
            });	
        }
        if(p16 != undefined){
            jQuery('#qrcodep16').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p16
            });	
        }

        if(pp16 != undefined){
            jQuery('#qrcodepp16').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp16
            });	
        }
        if(p17 != undefined){
            jQuery('#qrcodep17').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p17
            });	
        }

        if(pp17 != undefined){
            jQuery('#qrcodepp17').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp17
            });	
        }
        if(p18 != undefined){
            jQuery('#qrcodep18').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p18
            });	
        }

        if(pp18 != undefined){
            jQuery('#qrcodepp18').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp18
            });	
        }
        if(p19 != undefined){
            jQuery('#qrcodep19').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p19
            });	
        }

        if(pp19 != undefined){
            jQuery('#qrcodepp19').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp19
            });	
        }
        if(p20 != undefined){
            jQuery('#qrcodep20').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + p20
            });	
        }

        if(pp20 != undefined){
            jQuery('#qrcodepp20').qrcode({
                width	: 50,
                height	: 50,
                text	: "Tanda Tangan Digital Oleh " + pp20
            });	
        }
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
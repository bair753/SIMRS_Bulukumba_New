<!DOCTYPE html>
<html  lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowsheet</title>
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
        body{
            width:483mm;
            height:329mm;
            margin-top:200mm;
            margin-bottom:200mm;
            margin-left:200mm;
            margin-right:200mm;
            margin:0 auto; 
        }
        @page{
            size: A3 landscape;
        }
        table{ 
            page-break-inside:auto 
        }
		table {
            -fs-table-paginate: paginate;
        }
        tr{ 
            page-break-inside:avoid; 
            page-break-after:auto 
        }
        table{
            border:1px solid #000;
            border-collapse:collapse;
            table-layout:fixed;
        }
        tr td{
            border:1px solid #000;
            border-collapse:collapse;
			/* padding:.1rem; */
        }
        .mintd{
            width:48pt;
        }
        img{
            width:70%;
            height:70%;
            object-fit: cover;
        }
        .logo{
            width:50px !important;
        }
        .text-center{
            text-align: center;
        }
		.text-right{
            text-align: right;
        }
        .bordered{
            border:1px solid #000;
        }
        .noborder{
            border:none;
        }
		.blf{
			border-left:1px solid #000;
		}
		.btp{
			border-top:1px solid #000;
		}
		.btm{
			border-bottom:1px solid #000;
		}
		.br{
			border-right:1px solid #000;
		}
        .border-lr{
            border:1px solid #000;
            border-top:none;
            border-bottom:none;
        }
        .border-tb{
            border:1px solid #000;
            border-left:none;
            border-right:none;
        }
        table tr td{
            font-size: small;
        }
        table tr{
            height:12.8pt
        }
        .bg-dark{
            background:#000;
            color:#fff;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: x-large;
            padding:.5rem;
            height:20pt !important;
        }
        .bg-dark-small{
            background:#000;
            color:#fff;
        }
        .rotate{
            vertical-align: bottom;
            text-align: center;
        }
        #rotate{
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }
		.p3{
			padding:0.3rem;
		}
		.p2{
			padding:0.2rem;
		}
		p{
			padding:.5rem;
		}
		ul li{
			list-style:none;
		}
		ul li:before{
			content:'-'
		}

		.gambar{
			position:absolute;
			top:25%;
			left:45%;
		}
		img.img-diagram{
			width:97%;
			height:97%;
			object-fit: cover;
		}
        input{
            width:10px
        }
        input[type="text"]{
            width:12px;
            height:12px
        }
        .second > table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body ng-controller="cetakFlowsheet">
    <table>
        <tr>
            <td colspan="206">FLOW SHEET 24 JAM</td>
            <td rowspan="2" colspan="8" class="text-center">RM</td>
        </tr>
        <tr>
            <td colspan="38" rowspan="6" class="" style="text-align: center;font-size: x-large;"><strong>INSENTIVE CARE CHART <br>ICU / HCU</strong></td>
            <td colspan="12" rowspan="9" class="noborder blf text-center">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
                @else
                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
                @endif
            </td>
            <td colspan="26" rowspan="9" class="noborder br">
                <div class="title" style="text-align: center;">
                    <h2>{!! $res['profile']->namalengkap !!}</h2>
                    <p>
                        {!! $res['profile']->alamatlengkap !!}
                    </p>
                </div>
            </td>
            <td colspan="42" rowspan="">
            </td>
            <td colspan="35" rowspan=""></td>
            <td colspan="21" rowspan="" style="padding:.3rem" valign="top">CARA BAYAR</td>
            <td colspan="32" rowspan="" class="noborder"></td>
        </tr>
        <tr>
            <td class="noborder" colspan="15">NOMOR RM</td>
            <td class="noborder">:</td>
            <td class="noborder" colspan="24">{!! $res['d'][0]->nocm  !!}</td>
            <td colspan="2" class="noborder br"></td>
            <td class="noborder" colspan="15">TANGGAL</td>
            <td class="noborder" colspan="">:</td>
            <td class="noborder" colspan="19">@{{item.obj[32114595] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="4" class="noborder blf">@{{ item.obj[32114601] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="17" class="noborder">UMUM</td>
            <td colspan="15" rowspan="3" valign="top" class="noborder blf btp">Ketua Tim / Ketua Shift</td>
            <td rowspan="3" valign="top" class="noborder btp">:</td>
            <td colspan="5" valign="top" class="noborder btp">Pagi</td>
            <td colspan=""  class="noborder btp">:</td>
            <td colspan="10" class="noborder btp">@{{ item.obj[32114606] ? item.obj[32114606] : '.........' }}</td>
            <td colspan="8" rowspan="8" class="text-center" style="font: 30px"><b>128</b></td>
        </tr>
        <tr>
            <td class="noborder" colspan="15">NAMA</td>
            <td class="noborder">:</td>
            <td class="noborder br" colspan="26">{!!  $res['d'][0]->namapasien  !!}</td>
            <td class="noborder" colspan="15">NO. BED / KAMAR</td>
            <td class="noborder">:</td>
            <td class="noborder" colspan="19">@{{ item.obj[32114596] ? item.obj[32114596] : '' }}</td>
            <td colspan="4" class="blf noborder">@{{ item.obj[32114602] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="17" class="noborder">BPJS</td>
            <td colspan="5" class="noborder">Sore</td>
            <td colspan="" class="noborder">:</td>
            <td colspan="10" class="noborder">@{{ item.obj[32114607] ? item.obj[32114607] : '.........' }}</td>
        </tr>
        <tr>
            <td class="noborder" colspan="15">TANGGAL LAHIR</td>
            <td class="noborder">:</td>
            <td class="noborder br" colspan="26">{!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
            <td class="noborder" colspan="15">HARI RAWAT KE</td>
            <td class="noborder">:</td>
            <td class="noborder" colspan="19">@{{ item.obj[32114597] ? item.obj[32114597] : '' }}</td>
            <td colspan="4" class="blf noborder">@{{ item.obj[32114603] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="17" class="noborder">JASA RAHARJA</td>
            <td colspan="5" class="noborder">Malam</td>
            <td colspan="" class="noborder">:</td>
            <td colspan="10" class="noborder">@{{ item.obj[32114608] ? item.obj[32114608] : '.........' }}</td>
        </tr>
        <tr>
            <td class="noborder" colspan="15">NIK</td>
            <td class="noborder">:</td>
            <td class="noborder br" colspan="26">{!! $res['d'][0]->noidentitas  !!}</td>
            <td class="noborder" colspan="15">BERAT BADAN</td>
            <td class="noborder">:</td>
            <td class="noborder" colspan="8">@{{ item.obj[32114598] ? item.obj[32114598] : '' }}</td>
            <td class="noborder" colspan="11">TB : @{{ item.obj[32114599] ? item.obj[32114599] : '' }}</td>
            <td colspan="4" class="noborder blf">@{{ item.obj[32114604] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="17" class="noborder">Lain-lain</td>
            <td colspan="15" rowspan="" valign="top" class="blf noborder">Perawat Penanggung</td>
            <td rowspan="" valign="top" class="noborder">:</td>
            <td colspan="5" valign="top" class="noborder">Pagi</td>
            <td colspan=""  class="noborder">:</td>
            <td colspan="10"  class="noborder">@{{ item.obj[32114609] ? item.obj[32114609] : '.........' }}</td>
        </tr>
        <tr>
            <td class="noborder" colspan="15"></td>
            <td class="noborder"></td>
            <td class="noborder br" colspan="26"></td>
            <td class="noborder" colspan="15">GOLONGAN DARAH</td>
            <td class="noborder">:</td>
            <td class="noborder" colspan="19">@{{ item.obj[32114600] ? item.obj[32114600] : '' }}</td>
            <td colspan="21" class="noborder br blf">@{{ item.obj[32114605] ? item.obj[32114605] : '' }}</td>
            <td colspan="15" rowspan="2" valign="top" class="noborder">Jawab Pasien</td>
            <td rowspan="2" valign="top" class="noborder">:</td>
            <td colspan="5" valign="top" class="noborder">Sore</td>
            <td colspan="" class="noborder">:</td>
            <td colspan="10" class="noborder">@{{ item.obj[32114610] ? item.obj[32114610] : '.........' }}</td>
        </tr>
        <tr>
            <td class="noborder" colspan="45"></td>
            <td class="noborder" colspan="15"></td>
            <td class="noborder"></td>
            <td class="noborder br" colspan="26"></td>
            <td colspan="35" class="noborder"></td>
            <td colspan="21" class="noborder blf br"></td>
            <td colspan="5" valign="top" class="noborder">Malam</td>
            <td colspan="" class="noborder">:</td>
            <td colspan="10" class="noborder">@{{ item.obj[32114611] ? item.obj[32114611] : '.........' }}</td>
        </tr>
        <tr>
            <td colspan="118" class="noborder"></td>
            <td colspan="35" class="br blf noborder"></td>
            <td colspan="25" class="noborder br blf"></td>
            <td colspan="10" class="noborder"></td>
            <td colspan="8" class="noborder"></td>
            <td colspan="8" class="noborder"></td>
        </tr>
        <tr>
            <td colspan="118" class="noborder"></td>
            <td colspan="35" class="noborder blf"></td>
            <td colspan="25" class="noborder blf"></td>
            <td colspan="10" class="noborder blf"></td>
            <td colspan="8" class="noborder"></td>
            <td colspan="8" class="noborder"></td>
        </tr>
        <tr>
            <td colspan="10" class="noborder">Dokter Primer</td>
            <td colspan="28" class="noborder">: @{{ item.obj[32111298] ? item.obj[32111298] : '' }}</td>
            <td colspan="27" class="text-center">ALAT INVASIF</td>
            <td colspan="23" class="noborder btp"></td>
            <td colspan="30" class="text-center">DATA PENUNJANG</td>
            <td colspan="8" rowspan="2" class="text-center">TGL/JAM</td>
            <td colspan="32" rowspan="2" class="text-center">IMPLEMENTASI</td>
            <td colspan="8"class="text-center">NAMA</td>
            <td colspan="8"class="text-center" rowspan="2">TGL/JAM</td>
            <td colspan="32" rowspan="2"class="text-center">IMPLEMENTASI</td>
            <td colspan="8"class="text-center">NAMA</td>
        </tr>
        <tr>
            <td colspan="10" class="noborder">Konsultan</td>
            <td colspan="28" rowspan="2" class="noborder btm">: @{{ item.obj[32111299] ? item.obj[32111299] : '' }}</td>
            <td colspan="12" rowspan="2" class="text-center">JENIS ALAT</td>
            <td colspan="15" class="text-center">TANGGAL</td>
            <td colspan="23" class="noborder text-center">ALERGI</td>
            <td colspan="30" class="noborder br blf"></td>
            <td colspan="8" class="text-center">PARAF</td>
            <td colspan="8" class="text-center">PARAF</td>
        </tr>
        <tr>
            <td colspan="35" class="noborder btm"></td>
            <td colspan="7" class="text-center">Pemasangan</td>
            <td colspan="8" class="text-center">Pelepasan</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="14" class="noborder blf"></td>
            <td colspan="8"  class="noborder">Tanggal</td>
            <td colspan="8"  class="noborder">Keterangan</td>
            <td colspan="8" class="text-center">@{{item.obj[422550] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422551] ? item.obj[422551] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422552] ? item.obj[422552] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422553] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422555] ? item.obj[422555] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422556] ? item.obj[422556] : '' }}</td>
        </tr>
        <tr>
            <td colspan="38" class="noborder"></td>
            <td colspan="12">Arteri Line</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="2" class="noborder blf">@{{ item.obj[32111323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">Radiologi Terakhir</td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder">@{{item.obj[32111324] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="noborder">(@{{ item.obj[32111325] ? item.obj[32111325] : '................' }})</td>
            <td colspan="8" class="text-center">@{{item.obj[422557] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422558] ? item.obj[422558] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422559] ? item.obj[422559] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422560] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422561] ? item.obj[422561] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422562] ? item.obj[422562] : '' }}</td>
        </tr>
        <tr>
            <td colspan="38" class="noborder"></td>
            <td colspan="12">CVC</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111306] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111307] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="4" class="noborder text-center">@{{ item.obj[32111320] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="7" class="noborder">Ya</td>
            <td colspan="4" class="noborder text-center">@{{ item.obj[32111321] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">Tidak</td>
            <td colspan="2" class="noborder blf">@{{ item.obj[32111326] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">Laboratorium Terakhir</td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder">@{{item.obj[32111327] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="noborder">(@{{ item.obj[32111328] ? item.obj[32111328] : '................' }})</td>
            <td colspan="8" class="text-center">@{{item.obj[422563] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422564] ? item.obj[422564] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422565] ? item.obj[422565] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422566] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422567] ? item.obj[422567] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422568] ? item.obj[422568] : '' }}</td>
        </tr>
        <tr>
            <td colspan="10" class="noborder">Diagnosa</td>
            <td colspan="28" class="noborder">: @{{ item.obj[32111300] ? item.obj[32111300] : '' }}</td>
            <td colspan="12">P.A. Kateter</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111308] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111309] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="2" class="noborder blf">@{{ item.obj[32111329] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">USG Terakhir</td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder">@{{item.obj[32111330] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="noborder">(@{{ item.obj[32111331] ? item.obj[32111331] : '................' }})</td>
            <td colspan="8" class="text-center">@{{item.obj[422569] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422570] ? item.obj[422570] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422571] ? item.obj[422571] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422572] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422573] ? item.obj[422573] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422574] ? item.obj[422574] : '' }}</td>
        </tr>
        <tr>
            <td colspan="10" class="noborder">Diagnosa Post OP</td>
            <td colspan="28" class="noborder">: @{{ item.obj[32111301] ? item.obj[32111301] : '' }}</td>
            <td colspan="12">Intra Vena Kateter</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111310] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder text-center">Jika Ya, sebutkan jenis dan bahan alergi</td>
            <td colspan="2" class="noborder blf">@{{ item.obj[32111332] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">ECHO Terakhir</td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder">@{{item.obj[32111333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="noborder">(@{{ item.obj[32111334] ? item.obj[32111334] : '................' }})</td>
            <td colspan="8" class="text-center">@{{item.obj[422575] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422576] ? item.obj[422576] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422577] ? item.obj[422577] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422578] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422579] ? item.obj[422579] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422580] ? item.obj[422580] : '' }}</td>
        </tr>
        <tr>
            <td colspan="10" rowspan="2" class="noborder">Jenis Operasi</td>
            <td colspan="28" rowspan="2" class="noborder">: @{{ item.obj[32111302] ? item.obj[32111302] : '' }}</td>
            <td colspan="12">ETT/Trakheostomi</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111313] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder text-center">@{{ item.obj[32111322] ? item.obj[32111322] : '....................' }}</td>
            <td colspan="2" class="noborder blf">@{{ item.obj[32111335] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
            <td colspan="8" class="noborder">Lain-lain Terakhir</td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder">@{{item.obj[32111336] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="noborder">(@{{ item.obj[32111337] ? item.obj[32111337] : '................' }})</td>
            <td colspan="8" class="text-center">@{{item.obj[422581] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422582] ? item.obj[422582] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422583] ? item.obj[422583] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422584] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422585] ? item.obj[422585] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422586] ? item.obj[422586] : '' }}</td>
        </tr>
        <tr>
            <td colspan="12">NGT</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111314] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111315] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="2" class="noborder blf"></td>
            <td colspan="8" class="noborder"></td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder"></td>
            <td colspan="4" class="noborder"></td>
            <td colspan="4"  class="noborder" style="text-align: right;"></td>
            <td colspan="8" class="text-center">@{{item.obj[422587] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422588] ? item.obj[422588] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422589] ? item.obj[422589] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422590] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422591] ? item.obj[422591] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422592] ? item.obj[422592] : '' }}</td>
        </tr>
        <tr>
            <td colspan="10" rowspan="2" class="noborder">Tanggal Operasi</td>
            <td colspan="28" rowspan="2" class="noborder">: @{{item.obj[32111303] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="12">Kateter Urine</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111316] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111317] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="2" class="noborder blf"></td>
            <td colspan="8" class="noborder"></td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder"></td>
            <td colspan="4" class="noborder"></td>
            <td colspan="4" style="text-align: right;" class="noborder"></td>
            <td colspan="8" class="text-center">@{{item.obj[422593] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422594] ? item.obj[422594] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422595] ? item.obj[422595] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422596] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422597] ? item.obj[422597] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422598] ? item.obj[422598] : '' }}</td>
        </tr>
        <tr>
            <td colspan="12">Draine</td>
            <td colspan="7" class="text-center" style="font-size: 6pt">@{{item.obj[32111318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="8" class="text-center" style="font-size: 6pt">@{{item.obj[32111319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="23" class="noborder"></td>
            <td colspan="2" class="noborder blf"></td>
            <td colspan="8" class="noborder"></td>
            <td colspan="2" class="noborder"></td>
            <td colspan="10" class="noborder"></td>
            <td colspan="4" class="noborder"></td>
            <td colspan="4" style="text-align: right;" class="noborder"></td>
            <td colspan="8" class="text-center">@{{item.obj[422599] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422600] ? item.obj[422600] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422601] ? item.obj[422601] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422602] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422603] ? item.obj[422603] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422604] ? item.obj[422604] : '' }}</td>
        </tr>
        <tr>
            <td colspan="8" rowspan="2">TANDA-TANDA VITAL</td>
            <td colspan="2" rowspan="2">Resp.</td>
            <td colspan="2" rowspan="2">Temp</td>
            <td colspan="2" rowspan="2">Nadi</td>
            <td colspan="2" rowspan="2">TD</td>
            <td colspan="2" rowspan="2">Skala Nyeri</td>
            <td colspan="4" rowspan="2"><strong>07</strong></td>
            <td colspan="4" rowspan="2"><strong>08</strong></td>
            <td colspan="4" rowspan="2"><strong>09</strong></td>
            <td colspan="4" rowspan="2"><strong>10</strong></td>
            <td colspan="4" rowspan="2"><strong>11</strong></td>
            <td colspan="4" rowspan="2"><strong>12</strong></td>
            <td colspan="4" rowspan="2"><strong>13</strong></td>
            <td colspan="4" rowspan="2"><strong>14</strong></td>
            <td colspan="4" rowspan="2"><strong>15</strong></td>
            <td colspan="4" rowspan="2"><strong>16</strong></td>
            <td colspan="4" rowspan="2"><strong>17</strong></td>
            <td colspan="4" rowspan="2"><strong>18</strong></td>
            <td colspan="4" rowspan="2"><strong>19</strong></td>
            <td colspan="4" rowspan="2"><strong>20</strong></td>
            <td colspan="4" rowspan="2"><strong>21</strong></td>
            <td colspan="4" rowspan="2"><strong>22</strong></td>
            <td colspan="4" rowspan="2"><strong>23</strong></td>
            <td colspan="4" rowspan="2"><strong>00</strong></td>
            <td colspan="4" rowspan="2"><strong>01</strong></td>
            <td colspan="4" rowspan="2"><strong>02</strong></td>
            <td colspan="4" rowspan="2"><strong>03</strong></td>
            <td colspan="4" rowspan="2"><strong>04</strong></td>
            <td colspan="4" rowspan="2"><strong>05</strong></td>
            <td colspan="4" rowspan="2"><strong>06</strong></td>
            <td colspan="4" rowspan="2"><strong>07</strong></td>
            <td colspan="8" class="text-center">@{{item.obj[422605] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422606] ? item.obj[422606] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422607] ? item.obj[422607] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422608] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422609] ? item.obj[422609] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422610] ? item.obj[422610] : '' }}</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">250</td>
            <td colspan="2">250</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center">@{{item.obj[422611] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422612] ? item.obj[422612] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422613] ? item.obj[422613] : '' }}</td>
            <td colspan="8" class="text-center">@{{item.obj[422614] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422615] ? item.obj[422615] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422616] ? item.obj[422616] : '' }}</td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">60</td>
            <td colspan="2">42</td>
            <td colspan="2">240</td>
            <td colspan="2">240</td>
            <td colspan="2">12</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center">@{{item.obj[422617] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
            <td colspan="32" class="text-center">@{{ item.obj[422618] ? item.obj[422618] : '' }}</td>
            <td colspan="8" class="text-center">@{{ item.obj[422619] ? item.obj[422619] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">Nadi</td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">230</td>
            <td colspan="2">230</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">(Merah)</td>
            <td colspan="2"></td>
            <td colspan="2">41</td>
            <td colspan="2">220</td>
            <td colspan="2">220</td>
            <td colspan="2">11</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">210</td>
            <td colspan="2">210</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">50</td>
            <td colspan="2">40</td>
            <td colspan="2">200</td>
            <td colspan="2">200</td>
            <td colspan="2">10</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"><strong>TD</strong>(Hitam)</td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">190</td>
            <td colspan="2">190</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">Sirtulik &or;</td>
            <td colspan="2"></td>
            <td colspan="2">39</td>
            <td colspan="2">180</td>
            <td colspan="2">180</td>
            <td colspan="2">9</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">Diartulik &and;</td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">170</td>
            <td colspan="2">170</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">40</td>
            <td colspan="2">38</td>
            <td colspan="2">160</td>
            <td colspan="2">160</td>
            <td colspan="2">8</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"><strong>Temperatur</strong></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">150</td>
            <td colspan="2">150</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">(Biru) &bull;</td>
            <td colspan="2"></td>
            <td colspan="2">37</td>
            <td colspan="2">140</td>
            <td colspan="2">140</td>
            <td colspan="2">7</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">130</td>
            <td colspan="2">130</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">30</td>
            <td colspan="2">36</td>
            <td colspan="2">120</td>
            <td colspan="2">120</td>
            <td colspan="2">6</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"><strong>Respirasi</strong></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">110</td>
            <td colspan="2">110</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">(Hijau) &bull;</td>
            <td colspan="2"></td>
            <td colspan="2">35</td>
            <td colspan="2">100</td>
            <td colspan="2">100</td>
            <td colspan="2">5</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">90</td>
            <td colspan="2">90</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">20</td>
            <td colspan="2">34</td>
            <td colspan="2">80</td>
            <td colspan="2">80</td>
            <td colspan="2">4</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"><strong>Skala Nyeri</strong></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">70</td>
            <td colspan="2">70</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8">(Hitam) &bull;</td>
            <td colspan="2"></td>
            <td colspan="2">33</td>
            <td colspan="2">60</td>
            <td colspan="2">60</td>
            <td colspan="2">3</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">50</td>
            <td colspan="2">50</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">10</td>
            <td colspan="2">32</td>
            <td colspan="2">40</td>
            <td colspan="2">40</td>
            <td colspan="2">2</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">30</td>
            <td colspan="2">30</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2">31</td>
            <td colspan="2">20</td>
            <td colspan="2">20</td>
            <td colspan="2">1</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            <td colspan="2">10</td>
            <td colspan="2">10</td>
            <td colspan="2"></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">0</td>
            <td colspan="2">30</td>
            <td colspan="2">0</td>
            <td colspan="2">0</td>
            <td colspan="2">0</td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan=""></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">NILAI CVP</td>
            <td colspan="4">@{{ item.obj[32113940] ? item.obj[32113940] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113941] ? item.obj[32113941] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113942] ? item.obj[32113942] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113943] ? item.obj[32113943] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113944] ? item.obj[32113944] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113945] ? item.obj[32113945] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113946] ? item.obj[32113946] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113947] ? item.obj[32113947] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113948] ? item.obj[32113948] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113949] ? item.obj[32113949] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113950] ? item.obj[32113950] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113951] ? item.obj[32113951] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113952] ? item.obj[32113952] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113953] ? item.obj[32113953] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113954] ? item.obj[32113954] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113955] ? item.obj[32113955] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113956] ? item.obj[32113956] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113957] ? item.obj[32113957] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113958] ? item.obj[32113958] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113959] ? item.obj[32113959] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113960] ? item.obj[32113960] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113961] ? item.obj[32113961] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113962] ? item.obj[32113962] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113963] ? item.obj[32113963] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113964] ? item.obj[32113964] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">THERAPI OKSIGEN</td>
            <td colspan="4">@{{ item.obj[32113970] ? item.obj[32113970] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113971] ? item.obj[32113971] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113972] ? item.obj[32113972] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113973] ? item.obj[32113973] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113974] ? item.obj[32113974] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113975] ? item.obj[32113975] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113976] ? item.obj[32113976] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113977] ? item.obj[32113977] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113978] ? item.obj[32113978] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113979] ? item.obj[32113979] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113980] ? item.obj[32113980] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113981] ? item.obj[32113981] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113982] ? item.obj[32113982] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113983] ? item.obj[32113983] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113984] ? item.obj[32113984] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113985] ? item.obj[32113985] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113986] ? item.obj[32113986] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113987] ? item.obj[32113987] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113988] ? item.obj[32113988] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113989] ? item.obj[32113989] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113990] ? item.obj[32113990] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113991] ? item.obj[32113991] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113992] ? item.obj[32113992] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113993] ? item.obj[32113993] : '' }}</td>
            <td colspan="4">@{{ item.obj[32113994] ? item.obj[32113994] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">MODE VENTILATOR</td>
            <td colspan="4">@{{ item.obj[32114000] ? item.obj[32114000] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114001] ? item.obj[32114001] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114002] ? item.obj[32114002] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114003] ? item.obj[32114003] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114004] ? item.obj[32114004] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114005] ? item.obj[32114005] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114006] ? item.obj[32114006] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114007] ? item.obj[32114007] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114008] ? item.obj[32114008] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114009] ? item.obj[32114009] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114010] ? item.obj[32114010] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114011] ? item.obj[32114011] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114012] ? item.obj[32114012] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114013] ? item.obj[32114013] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114014] ? item.obj[32114014] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114015] ? item.obj[32114015] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114016] ? item.obj[32114016] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114017] ? item.obj[32114017] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114018] ? item.obj[32114018] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114019] ? item.obj[32114019] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114020] ? item.obj[32114020] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114021] ? item.obj[32114021] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114022] ? item.obj[32114022] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114023] ? item.obj[32114023] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114024] ? item.obj[32114024] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">TV / ETV</td>
            <td colspan="4">@{{ item.obj[32114030] ? item.obj[32114030] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114031] ? item.obj[32114031] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114032] ? item.obj[32114032] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114033] ? item.obj[32114033] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114034] ? item.obj[32114034] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114035] ? item.obj[32114035] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114036] ? item.obj[32114036] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114037] ? item.obj[32114037] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114038] ? item.obj[32114038] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114039] ? item.obj[32114039] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114040] ? item.obj[32114040] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114041] ? item.obj[32114041] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114042] ? item.obj[32114042] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114043] ? item.obj[32114043] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114044] ? item.obj[32114044] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114045] ? item.obj[32114045] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114046] ? item.obj[32114046] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114047] ? item.obj[32114047] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114048] ? item.obj[32114048] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114049] ? item.obj[32114049] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114050] ? item.obj[32114050] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114051] ? item.obj[32114051] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114052] ? item.obj[32114052] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114053] ? item.obj[32114053] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114054] ? item.obj[32114054] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">MV / IMV</td>
            <td colspan="4">@{{ item.obj[32114060] ? item.obj[32114060] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114061] ? item.obj[32114061] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114062] ? item.obj[32114062] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114063] ? item.obj[32114063] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114064] ? item.obj[32114064] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114065] ? item.obj[32114065] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114066] ? item.obj[32114066] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114067] ? item.obj[32114067] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114068] ? item.obj[32114068] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114069] ? item.obj[32114069] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114070] ? item.obj[32114070] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114071] ? item.obj[32114071] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114072] ? item.obj[32114072] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114073] ? item.obj[32114073] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114074] ? item.obj[32114074] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114075] ? item.obj[32114075] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114076] ? item.obj[32114076] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114077] ? item.obj[32114077] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114078] ? item.obj[32114078] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114079] ? item.obj[32114079] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114080] ? item.obj[32114080] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114081] ? item.obj[32114081] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114082] ? item.obj[32114082] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114083] ? item.obj[32114083] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114084] ? item.obj[32114084] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">RATE / IMV</td>
            <td colspan="4">@{{ item.obj[32114090] ? item.obj[32114090] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114091] ? item.obj[32114091] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114092] ? item.obj[32114092] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114093] ? item.obj[32114093] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114094] ? item.obj[32114094] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114095] ? item.obj[32114095] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114096] ? item.obj[32114096] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114097] ? item.obj[32114097] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114098] ? item.obj[32114098] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114099] ? item.obj[32114099] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114100] ? item.obj[32114100] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114101] ? item.obj[32114101] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114102] ? item.obj[32114102] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114103] ? item.obj[32114103] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114104] ? item.obj[32114104] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114105] ? item.obj[32114105] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114106] ? item.obj[32114106] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114107] ? item.obj[32114107] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114108] ? item.obj[32114108] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114109] ? item.obj[32114109] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114110] ? item.obj[32114110] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114111] ? item.obj[32114111] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114112] ? item.obj[32114112] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114113] ? item.obj[32114113] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114114] ? item.obj[32114114] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">TOTAL RATE</td>
            <td colspan="4">@{{ item.obj[32114120] ? item.obj[32114120] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114121] ? item.obj[32114121] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114122] ? item.obj[32114122] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114123] ? item.obj[32114123] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114124] ? item.obj[32114124] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114125] ? item.obj[32114125] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114126] ? item.obj[32114126] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114127] ? item.obj[32114127] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114128] ? item.obj[32114128] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114129] ? item.obj[32114129] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114130] ? item.obj[32114130] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114131] ? item.obj[32114131] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114132] ? item.obj[32114132] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114133] ? item.obj[32114133] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114134] ? item.obj[32114134] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114135] ? item.obj[32114135] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114136] ? item.obj[32114136] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114137] ? item.obj[32114137] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114138] ? item.obj[32114138] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114139] ? item.obj[32114139] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114140] ? item.obj[32114140] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114141] ? item.obj[32114141] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114142] ? item.obj[32114142] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114143] ? item.obj[32114143] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114144] ? item.obj[32114144] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">INSPIRASI PRESSURE</td>
            <td colspan="4">@{{ item.obj[32114150] ? item.obj[32114150] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114151] ? item.obj[32114151] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114152] ? item.obj[32114152] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114153] ? item.obj[32114153] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114154] ? item.obj[32114154] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114155] ? item.obj[32114155] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114156] ? item.obj[32114156] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114157] ? item.obj[32114157] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114158] ? item.obj[32114158] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114159] ? item.obj[32114159] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114160] ? item.obj[32114160] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114161] ? item.obj[32114161] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114162] ? item.obj[32114162] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114163] ? item.obj[32114163] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114164] ? item.obj[32114164] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114165] ? item.obj[32114165] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114166] ? item.obj[32114166] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114167] ? item.obj[32114167] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114168] ? item.obj[32114168] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114169] ? item.obj[32114169] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114170] ? item.obj[32114170] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114171] ? item.obj[32114171] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114172] ? item.obj[32114172] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114173] ? item.obj[32114173] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114174] ? item.obj[32114174] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">PEEP / PRESSURE SUPPORT</td>
            <td colspan="4">@{{ item.obj[32114180] ? item.obj[32114180] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114181] ? item.obj[32114181] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114182] ? item.obj[32114182] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114183] ? item.obj[32114183] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114184] ? item.obj[32114184] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114185] ? item.obj[32114185] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114186] ? item.obj[32114186] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114187] ? item.obj[32114187] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114188] ? item.obj[32114188] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114189] ? item.obj[32114189] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114190] ? item.obj[32114190] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114191] ? item.obj[32114191] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114192] ? item.obj[32114192] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114193] ? item.obj[32114193] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114194] ? item.obj[32114194] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114195] ? item.obj[32114195] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114196] ? item.obj[32114196] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114197] ? item.obj[32114197] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114198] ? item.obj[32114198] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114199] ? item.obj[32114199] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114200] ? item.obj[32114200] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114201] ? item.obj[32114201] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114202] ? item.obj[32114202] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114203] ? item.obj[32114203] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114204] ? item.obj[32114204] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">PEAK INSPIRASI PRESSURE</td>
            <td colspan="4">@{{ item.obj[32114210] ? item.obj[32114210] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114211] ? item.obj[32114211] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114212] ? item.obj[32114212] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114213] ? item.obj[32114213] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114214] ? item.obj[32114214] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114215] ? item.obj[32114215] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114216] ? item.obj[32114216] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114217] ? item.obj[32114217] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114218] ? item.obj[32114218] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114219] ? item.obj[32114219] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114220] ? item.obj[32114220] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114221] ? item.obj[32114221] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114222] ? item.obj[32114222] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114223] ? item.obj[32114223] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114224] ? item.obj[32114224] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114225] ? item.obj[32114225] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114226] ? item.obj[32114226] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114227] ? item.obj[32114227] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114228] ? item.obj[32114228] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114229] ? item.obj[32114229] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114230] ? item.obj[32114230] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114231] ? item.obj[32114231] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114232] ? item.obj[32114232] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114233] ? item.obj[32114233] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114234] ? item.obj[32114234] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">FIO2 / O2</td>
            <td colspan="4">@{{ item.obj[32114240] ? item.obj[32114240] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114241] ? item.obj[32114241] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114242] ? item.obj[32114242] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114243] ? item.obj[32114243] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114244] ? item.obj[32114244] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114245] ? item.obj[32114245] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114246] ? item.obj[32114246] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114247] ? item.obj[32114247] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114248] ? item.obj[32114248] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114249] ? item.obj[32114249] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114250] ? item.obj[32114250] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114251] ? item.obj[32114251] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114252] ? item.obj[32114252] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114253] ? item.obj[32114253] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114254] ? item.obj[32114254] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114255] ? item.obj[32114255] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114256] ? item.obj[32114256] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114257] ? item.obj[32114257] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114258] ? item.obj[32114258] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114259] ? item.obj[32114259] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114260] ? item.obj[32114260] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114261] ? item.obj[32114261] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114262] ? item.obj[32114262] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114263] ? item.obj[32114263] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114264] ? item.obj[32114264] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">ET CO2 / SP02</td>
            <td colspan="4">@{{ item.obj[32114270] ? item.obj[32114270] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114271] ? item.obj[32114271] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114272] ? item.obj[32114272] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114273] ? item.obj[32114273] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114274] ? item.obj[32114274] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114275] ? item.obj[32114275] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114276] ? item.obj[32114276] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114277] ? item.obj[32114277] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114278] ? item.obj[32114278] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114279] ? item.obj[32114279] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114280] ? item.obj[32114280] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114281] ? item.obj[32114281] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114282] ? item.obj[32114282] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114283] ? item.obj[32114283] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114284] ? item.obj[32114284] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114285] ? item.obj[32114285] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114286] ? item.obj[32114286] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114287] ? item.obj[32114287] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114288] ? item.obj[32114288] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114289] ? item.obj[32114289] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114290] ? item.obj[32114290] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114291] ? item.obj[32114291] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114292] ? item.obj[32114292] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114293] ? item.obj[32114293] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114294] ? item.obj[32114294] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">CUFF PRESSURE / POSITION ETT</td>
            <td colspan="4">@{{ item.obj[32114300] ? item.obj[32114300] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114301] ? item.obj[32114301] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114302] ? item.obj[32114302] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114303] ? item.obj[32114303] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114304] ? item.obj[32114304] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114305] ? item.obj[32114305] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114306] ? item.obj[32114306] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114307] ? item.obj[32114307] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114308] ? item.obj[32114308] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114309] ? item.obj[32114309] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114310] ? item.obj[32114310] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114311] ? item.obj[32114311] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114312] ? item.obj[32114312] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114313] ? item.obj[32114313] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114314] ? item.obj[32114314] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114315] ? item.obj[32114315] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114316] ? item.obj[32114316] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114317] ? item.obj[32114317] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114318] ? item.obj[32114318] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114319] ? item.obj[32114319] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114320] ? item.obj[32114320] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114321] ? item.obj[32114321] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114322] ? item.obj[32114322] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114323] ? item.obj[32114323] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114324] ? item.obj[32114324] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">SUCTION ORAL / KANULA</td>
            <td colspan="4">@{{ item.obj[32114330] ? item.obj[32114330] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114331] ? item.obj[32114331] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114332] ? item.obj[32114332] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114333] ? item.obj[32114333] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114334] ? item.obj[32114334] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114335] ? item.obj[32114335] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114336] ? item.obj[32114336] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114337] ? item.obj[32114337] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114338] ? item.obj[32114338] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114339] ? item.obj[32114339] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114340] ? item.obj[32114340] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114341] ? item.obj[32114341] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114342] ? item.obj[32114342] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114343] ? item.obj[32114343] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114344] ? item.obj[32114344] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114345] ? item.obj[32114345] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114346] ? item.obj[32114346] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114347] ? item.obj[32114347] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114348] ? item.obj[32114348] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114349] ? item.obj[32114349] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114350] ? item.obj[32114350] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114351] ? item.obj[32114351] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114352] ? item.obj[32114352] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114353] ? item.obj[32114353] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114354] ? item.obj[32114354] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">MEBULIZER</td>
            <td colspan="4">@{{ item.obj[32114360] ? item.obj[32114360] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114361] ? item.obj[32114361] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114362] ? item.obj[32114362] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114363] ? item.obj[32114363] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114364] ? item.obj[32114364] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114365] ? item.obj[32114365] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114366] ? item.obj[32114366] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114367] ? item.obj[32114367] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114368] ? item.obj[32114368] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114369] ? item.obj[32114369] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114370] ? item.obj[32114370] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114371] ? item.obj[32114371] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114372] ? item.obj[32114372] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114373] ? item.obj[32114373] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114374] ? item.obj[32114374] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114375] ? item.obj[32114375] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114376] ? item.obj[32114376] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114377] ? item.obj[32114377] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114378] ? item.obj[32114378] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114379] ? item.obj[32114379] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114380] ? item.obj[32114380] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114381] ? item.obj[32114381] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114382] ? item.obj[32114382] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114383] ? item.obj[32114383] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114384] ? item.obj[32114384] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">REAKSI PUPIL</td>
            <td colspan="4">@{{ item.obj[32114390] ? item.obj[32114390] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114391] ? item.obj[32114391] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114392] ? item.obj[32114392] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114393] ? item.obj[32114393] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114394] ? item.obj[32114394] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114395] ? item.obj[32114395] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114396] ? item.obj[32114396] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114397] ? item.obj[32114397] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114398] ? item.obj[32114398] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114399] ? item.obj[32114399] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114400] ? item.obj[32114400] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114401] ? item.obj[32114401] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114402] ? item.obj[32114402] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114403] ? item.obj[32114403] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114404] ? item.obj[32114404] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114405] ? item.obj[32114405] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114406] ? item.obj[32114406] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114407] ? item.obj[32114407] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114408] ? item.obj[32114408] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114409] ? item.obj[32114409] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114410] ? item.obj[32114410] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114411] ? item.obj[32114411] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114412] ? item.obj[32114412] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114413] ? item.obj[32114413] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114414] ? item.obj[32114414] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">UKURAN PUPIL</td>
            <td colspan="4">@{{ item.obj[32114420] ? item.obj[32114420] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114421] ? item.obj[32114421] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114422] ? item.obj[32114422] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114423] ? item.obj[32114423] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114424] ? item.obj[32114424] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114425] ? item.obj[32114425] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114426] ? item.obj[32114426] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114427] ? item.obj[32114427] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114428] ? item.obj[32114428] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114429] ? item.obj[32114429] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114430] ? item.obj[32114430] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114431] ? item.obj[32114431] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114432] ? item.obj[32114432] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114433] ? item.obj[32114433] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114434] ? item.obj[32114434] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114435] ? item.obj[32114435] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114436] ? item.obj[32114436] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114437] ? item.obj[32114437] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114438] ? item.obj[32114438] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114439] ? item.obj[32114439] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114440] ? item.obj[32114440] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114441] ? item.obj[32114441] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114442] ? item.obj[32114442] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114443] ? item.obj[32114443] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114444] ? item.obj[32114444] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">KESADARAN</td>
            <td colspan="4">@{{ item.obj[32114450] ? item.obj[32114450] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114451] ? item.obj[32114451] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114452] ? item.obj[32114452] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114453] ? item.obj[32114453] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114454] ? item.obj[32114454] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114455] ? item.obj[32114455] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114456] ? item.obj[32114456] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114457] ? item.obj[32114457] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114458] ? item.obj[32114458] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114459] ? item.obj[32114459] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114460] ? item.obj[32114460] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114461] ? item.obj[32114461] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114462] ? item.obj[32114462] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114463] ? item.obj[32114463] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114464] ? item.obj[32114464] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114465] ? item.obj[32114465] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114466] ? item.obj[32114466] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114467] ? item.obj[32114467] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114468] ? item.obj[32114468] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114469] ? item.obj[32114469] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114470] ? item.obj[32114470] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114471] ? item.obj[32114471] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114472] ? item.obj[32114472] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114473] ? item.obj[32114473] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114474] ? item.obj[32114474] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">GCS (GLASSGOW COMA STROKE)</td>
            <td colspan="4">@{{ item.obj[32114480] ? item.obj[32114480] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114481] ? item.obj[32114481] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114482] ? item.obj[32114482] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114483] ? item.obj[32114483] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114484] ? item.obj[32114484] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114485] ? item.obj[32114485] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114486] ? item.obj[32114486] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114487] ? item.obj[32114487] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114488] ? item.obj[32114488] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114489] ? item.obj[32114489] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114490] ? item.obj[32114490] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114491] ? item.obj[32114491] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114492] ? item.obj[32114492] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114493] ? item.obj[32114493] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114494] ? item.obj[32114494] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114495] ? item.obj[32114495] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114496] ? item.obj[32114496] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114497] ? item.obj[32114497] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114498] ? item.obj[32114498] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114499] ? item.obj[32114499] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114500] ? item.obj[32114500] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114501] ? item.obj[32114501] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114502] ? item.obj[32114502] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114503] ? item.obj[32114503] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114504] ? item.obj[32114504] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">SKORING JATUH</td>
            <td colspan="4">@{{ item.obj[32114510] ? item.obj[32114510] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114511] ? item.obj[32114511] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114512] ? item.obj[32114512] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114513] ? item.obj[32114513] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114514] ? item.obj[32114514] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114515] ? item.obj[32114515] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114516] ? item.obj[32114516] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114517] ? item.obj[32114517] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114518] ? item.obj[32114518] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114519] ? item.obj[32114519] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114520] ? item.obj[32114520] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114521] ? item.obj[32114521] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114522] ? item.obj[32114522] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114523] ? item.obj[32114523] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114524] ? item.obj[32114524] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114525] ? item.obj[32114525] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114526] ? item.obj[32114526] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114527] ? item.obj[32114527] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114528] ? item.obj[32114528] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114529] ? item.obj[32114529] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114530] ? item.obj[32114530] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114531] ? item.obj[32114531] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114532] ? item.obj[32114532] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114533] ? item.obj[32114533] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114534] ? item.obj[32114534] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">SKORING DEKUBITUS</td>
            <td colspan="4">@{{ item.obj[32114540] ? item.obj[32114540] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114541] ? item.obj[32114541] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114542] ? item.obj[32114542] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114543] ? item.obj[32114543] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114544] ? item.obj[32114544] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114545] ? item.obj[32114545] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114546] ? item.obj[32114546] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114547] ? item.obj[32114547] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114548] ? item.obj[32114548] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114549] ? item.obj[32114549] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114550] ? item.obj[32114550] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114551] ? item.obj[32114551] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114552] ? item.obj[32114552] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114553] ? item.obj[32114553] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114554] ? item.obj[32114554] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114555] ? item.obj[32114555] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114556] ? item.obj[32114556] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114557] ? item.obj[32114557] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114558] ? item.obj[32114558] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114559] ? item.obj[32114559] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114560] ? item.obj[32114560] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114561] ? item.obj[32114561] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114562] ? item.obj[32114562] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114563] ? item.obj[32114563] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114564] ? item.obj[32114564] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        <tr>
            <td colspan="18">MOBILISASI PASIF</td>
            <td colspan="4">@{{ item.obj[32114570] ? item.obj[32114570] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114571] ? item.obj[32114571] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114572] ? item.obj[32114572] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114573] ? item.obj[32114573] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114574] ? item.obj[32114574] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114575] ? item.obj[32114575] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114576] ? item.obj[32114576] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114577] ? item.obj[32114577] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114578] ? item.obj[32114578] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114579] ? item.obj[32114579] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114580] ? item.obj[32114580] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114581] ? item.obj[32114581] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114582] ? item.obj[32114582] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114583] ? item.obj[32114583] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114584] ? item.obj[32114584] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114585] ? item.obj[32114585] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114586] ? item.obj[32114586] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114587] ? item.obj[32114587] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114588] ? item.obj[32114588] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114589] ? item.obj[32114589] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114590] ? item.obj[32114590] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114591] ? item.obj[32114591] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114592] ? item.obj[32114592] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114593] ? item.obj[32114593] : '' }}</td>
            <td colspan="4">@{{ item.obj[32114594] ? item.obj[32114594] : '' }}</td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
            <td colspan="32" class="text-center"></td>
            <td colspan="8" class="text-center"></td>
        </tr>
        
    </table>
    <div class="p2"></div>
    <div class="second">
        <table>
            <tr>
                <td colspan="88" style="text-align: left;"></td>
                <td colspan="6" class="noborder">07</td>
                <td colspan="6"class="noborder">08</td>
                <td colspan="6"class="noborder">09</td>
                <td colspan="6"class="noborder">10</td>
                <td colspan="6"class="noborder">11</td>
                <td colspan="6"class="noborder">12</td>
                <td colspan="6" class="noborder">13</td>
                <td colspan="6" class="noborder">14</td>
                <td colspan="6" class="noborder">15</td>
                <td colspan="6" class="noborder">16</td>
                <td colspan="6" class="noborder">17</td>
                <td colspan="6" class="noborder">18</td>
                <td colspan="6" class="noborder">19</td>
                <td colspan="6" class="noborder">20</td>
                <td colspan="6" class="noborder">21</td>
                <td colspan="6" class="noborder">22</td>
                <td colspan="6" class="noborder">23</td>
                <td colspan="6" class="noborder">00</td>
                <td colspan="6" class="noborder">01</td>
                <td colspan="6" class="noborder">02</td>
                <td colspan="6" class="noborder">03</td>
                <td colspan="6" class="noborder">04</td>
                <td colspan="6" class="noborder">05</td>
                <td colspan="6" class="noborder">06</td>
                <td colspan="6" class="noborder">07</td>
            </tr>
            <tr>
                <td colspan="26" style="text-align: left;">INTAKE PARENTRAL</td>
                <td colspan="62" style="text-align: left;">@{{ item.obj[32115720] ? item.obj[32115720] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114612] ? item.obj[32114612] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114613] ? item.obj[32114613] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114614] ? item.obj[32114614] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114615] ? item.obj[32114615] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114616] ? item.obj[32114616] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114617] ? item.obj[32114617] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114618] ? item.obj[32114618] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114619] ? item.obj[32114619] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114620] ? item.obj[32114620] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114621] ? item.obj[32114621] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114622] ? item.obj[32114622] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114623] ? item.obj[32114623] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114624] ? item.obj[32114624] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114625] ? item.obj[32114625] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114626] ? item.obj[32114626] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114627] ? item.obj[32114627] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114628] ? item.obj[32114628] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114629] ? item.obj[32114629] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114630] ? item.obj[32114630] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114631] ? item.obj[32114631] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114632] ? item.obj[32114632] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114633] ? item.obj[32114633] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114634] ? item.obj[32114634] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114635] ? item.obj[32114635] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26" style="text-align: left;"></td>
                <td colspan="62" style="text-align: left;">@{{ item.obj[32116113] ? item.obj[32116113] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114642] ? item.obj[32114642] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114643] ? item.obj[32114643] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114644] ? item.obj[32114644] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114645] ? item.obj[32114645] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114646] ? item.obj[32114646] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114647] ? item.obj[32114647] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114648] ? item.obj[32114648] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114649] ? item.obj[32114649] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114650] ? item.obj[32114650] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114651] ? item.obj[32114651] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114652] ? item.obj[32114652] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114653] ? item.obj[32114653] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114654] ? item.obj[32114654] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114655] ? item.obj[32114655] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114656] ? item.obj[32114656] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114657] ? item.obj[32114657] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114658] ? item.obj[32114658] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114659] ? item.obj[32114659] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114660] ? item.obj[32114660] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114661] ? item.obj[32114661] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114662] ? item.obj[32114662] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114663] ? item.obj[32114663] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114664] ? item.obj[32114664] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114665] ? item.obj[32114665] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26" style="text-align: left;"></td>
                <td colspan="62" style="text-align: left;">@{{ item.obj[32116114] ? item.obj[32116114] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114672] ? item.obj[32114672] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114673] ? item.obj[32114673] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114674] ? item.obj[32114674] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114675] ? item.obj[32114675] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114676] ? item.obj[32114676] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114677] ? item.obj[32114677] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114678] ? item.obj[32114678] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114679] ? item.obj[32114679] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114680] ? item.obj[32114680] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114681] ? item.obj[32114681] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114682] ? item.obj[32114682] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114683] ? item.obj[32114683] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114684] ? item.obj[32114684] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114685] ? item.obj[32114685] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114686] ? item.obj[32114686] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114687] ? item.obj[32114687] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114688] ? item.obj[32114688] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114689] ? item.obj[32114689] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114690] ? item.obj[32114690] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114691] ? item.obj[32114691] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114692] ? item.obj[32114692] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114693] ? item.obj[32114693] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114694] ? item.obj[32114694] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114695] ? item.obj[32114695] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26" style="text-align: left;"></td>
                <td colspan="62" style="text-align: left;">@{{ item.obj[32116115] ? item.obj[32116115] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114702] ? item.obj[32114702] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114703] ? item.obj[32114703] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114704] ? item.obj[32114704] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114705] ? item.obj[32114705] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114706] ? item.obj[32114706] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114707] ? item.obj[32114707] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114708] ? item.obj[32114708] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114709] ? item.obj[32114709] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114710] ? item.obj[32114710] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114711] ? item.obj[32114711] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114712] ? item.obj[32114712] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114713] ? item.obj[32114713] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114714] ? item.obj[32114714] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114715] ? item.obj[32114715] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114716] ? item.obj[32114716] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114717] ? item.obj[32114717] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114718] ? item.obj[32114718] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114719] ? item.obj[32114719] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114720] ? item.obj[32114720] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114721] ? item.obj[32114721] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114722] ? item.obj[32114722] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114723] ? item.obj[32114723] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114724] ? item.obj[32114724] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114725] ? item.obj[32114725] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26"style="text-align: left;">INTAKE ENTERAL : @{{ item.obj[32114726] ? item.obj[32114726] : '' }}</td>
                <td colspan="62"style="text-align: left;">SUSU</td>
                <td colspan="6">@{{ item.obj[32114732] ? item.obj[32114732] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114733] ? item.obj[32114733] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114734] ? item.obj[32114734] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114735] ? item.obj[32114735] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114736] ? item.obj[32114736] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114737] ? item.obj[32114737] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114738] ? item.obj[32114738] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114739] ? item.obj[32114739] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114740] ? item.obj[32114740] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114741] ? item.obj[32114741] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114742] ? item.obj[32114742] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114743] ? item.obj[32114743] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114744] ? item.obj[32114744] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114745] ? item.obj[32114745] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114746] ? item.obj[32114746] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114747] ? item.obj[32114747] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114748] ? item.obj[32114748] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114749] ? item.obj[32114749] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114750] ? item.obj[32114750] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114751] ? item.obj[32114751] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114752] ? item.obj[32114752] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114753] ? item.obj[32114753] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114754] ? item.obj[32114754] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114755] ? item.obj[32114755] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26"></td>
                <td colspan="62"style="text-align: left;">JUS / BUBUR SARING : @{{ item.obj[32114727] ? item.obj[32114727] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114762] ? item.obj[32114762] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114763] ? item.obj[32114763] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114764] ? item.obj[32114764] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114765] ? item.obj[32114765] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114766] ? item.obj[32114766] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114767] ? item.obj[32114767] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114768] ? item.obj[32114768] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114769] ? item.obj[32114769] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114770] ? item.obj[32114770] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114771] ? item.obj[32114771] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114772] ? item.obj[32114772] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114773] ? item.obj[32114773] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114774] ? item.obj[32114774] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114775] ? item.obj[32114775] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114776] ? item.obj[32114776] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114777] ? item.obj[32114777] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114778] ? item.obj[32114778] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114779] ? item.obj[32114779] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114780] ? item.obj[32114780] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114781] ? item.obj[32114781] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114782] ? item.obj[32114782] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114783] ? item.obj[32114783] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114784] ? item.obj[32114784] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114785] ? item.obj[32114785] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88"style="text-align: left;">KONTROL PEMBERIAN OBAT</td>
                <td colspan="6">@{{ item.obj[32114792] ? item.obj[32114792] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114793] ? item.obj[32114793] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114794] ? item.obj[32114794] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114795] ? item.obj[32114795] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114796] ? item.obj[32114796] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114797] ? item.obj[32114797] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114798] ? item.obj[32114798] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114799] ? item.obj[32114799] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114800] ? item.obj[32114800] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114801] ? item.obj[32114801] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114802] ? item.obj[32114802] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114803] ? item.obj[32114803] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114804] ? item.obj[32114804] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114805] ? item.obj[32114805] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114806] ? item.obj[32114806] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114807] ? item.obj[32114807] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114808] ? item.obj[32114808] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114809] ? item.obj[32114809] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114810] ? item.obj[32114810] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114811] ? item.obj[32114811] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114812] ? item.obj[32114812] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114813] ? item.obj[32114813] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114814] ? item.obj[32114814] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114815] ? item.obj[32114815] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26"><STRONG>NAMA OBAT</STRONG> ( diisi oleh dokter)</td>
                <td colspan="12">DOSIS</td>
                <td colspan="12">ROUTE</td>
                <td colspan="12">START (TGL)</td>
                <td colspan="26">NAMA DOKTER / TTD</td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115631] ? item.obj[32115631] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115632] ? item.obj[32115632] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115633] ? item.obj[32115633] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115634] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115635] ? item.obj[32115635] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115637] ? item.obj[32115637] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115637] ? item.obj[32115637] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115638] ? item.obj[32115638] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115639] ? item.obj[32115639] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115640] ? item.obj[32115640] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115641] ? item.obj[32115641] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115642] ? item.obj[32115642] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115643] ? item.obj[32115643] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115644] ? item.obj[32115644] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115645] ? item.obj[32115645] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115646] ? item.obj[32115646] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115647] ? item.obj[32115647] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115648] ? item.obj[32115648] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115649] ? item.obj[32115649] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115650] ? item.obj[32115650] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115651] ? item.obj[32115651] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115652] ? item.obj[32115652] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115653] ? item.obj[32115653] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115654] ? item.obj[32115654] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115655] ? item.obj[32115655] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115656] ? item.obj[32115656] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115657] ? item.obj[32115657] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115658] ? item.obj[32115658] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115659] ? item.obj[32115659] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115661] ? item.obj[32115661] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115662] ? item.obj[32115662] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115663] ? item.obj[32115663] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115664] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115665] ? item.obj[32115665] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115667] ? item.obj[32115667] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115667] ? item.obj[32115667] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115668] ? item.obj[32115668] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115669] ? item.obj[32115669] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115670] ? item.obj[32115670] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115671] ? item.obj[32115671] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115672] ? item.obj[32115672] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115673] ? item.obj[32115673] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115674] ? item.obj[32115674] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115675] ? item.obj[32115675] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115676] ? item.obj[32115676] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115677] ? item.obj[32115677] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115678] ? item.obj[32115678] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115679] ? item.obj[32115679] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115680] ? item.obj[32115680] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115681] ? item.obj[32115681] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115682] ? item.obj[32115682] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115683] ? item.obj[32115683] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115684] ? item.obj[32115684] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115685] ? item.obj[32115685] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115686] ? item.obj[32115686] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115687] ? item.obj[32115687] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115688] ? item.obj[32115688] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115689] ? item.obj[32115689] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115691] ? item.obj[32115691] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115692] ? item.obj[32115692] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115693] ? item.obj[32115693] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115694] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115695] ? item.obj[32115695] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115697] ? item.obj[32115697] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115697] ? item.obj[32115697] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115698] ? item.obj[32115698] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115699] ? item.obj[32115699] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115700] ? item.obj[32115700] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115701] ? item.obj[32115701] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115702] ? item.obj[32115702] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115703] ? item.obj[32115703] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115704] ? item.obj[32115704] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115705] ? item.obj[32115705] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115706] ? item.obj[32115706] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115707] ? item.obj[32115707] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115708] ? item.obj[32115708] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115709] ? item.obj[32115709] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115710] ? item.obj[32115710] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115711] ? item.obj[32115711] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115712] ? item.obj[32115712] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115713] ? item.obj[32115713] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115714] ? item.obj[32115714] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115715] ? item.obj[32115715] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115716] ? item.obj[32115716] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115717] ? item.obj[32115717] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115718] ? item.obj[32115718] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115719] ? item.obj[32115719] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32114851] ? item.obj[32114851] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114852] ? item.obj[32114852] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114853] ? item.obj[32114853] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32114854] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32114855] ? item.obj[32114855] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114857] ? item.obj[32114857] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114857] ? item.obj[32114857] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114858] ? item.obj[32114858] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114859] ? item.obj[32114859] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114860] ? item.obj[32114860] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114861] ? item.obj[32114861] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114862] ? item.obj[32114862] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114863] ? item.obj[32114863] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114864] ? item.obj[32114864] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114865] ? item.obj[32114865] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114866] ? item.obj[32114866] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114867] ? item.obj[32114867] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114868] ? item.obj[32114868] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114869] ? item.obj[32114869] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114870] ? item.obj[32114870] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114871] ? item.obj[32114871] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114872] ? item.obj[32114872] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114873] ? item.obj[32114873] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114874] ? item.obj[32114874] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114875] ? item.obj[32114875] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114876] ? item.obj[32114876] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114877] ? item.obj[32114877] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114878] ? item.obj[32114878] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114879] ? item.obj[32114879] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32114881] ? item.obj[32114881] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114882] ? item.obj[32114882] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114883] ? item.obj[32114883] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32114884] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32114885] ? item.obj[32114885] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114887] ? item.obj[32114887] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114887] ? item.obj[32114887] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114888] ? item.obj[32114888] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114889] ? item.obj[32114889] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114890] ? item.obj[32114890] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114891] ? item.obj[32114891] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114892] ? item.obj[32114892] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114893] ? item.obj[32114893] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114894] ? item.obj[32114894] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114895] ? item.obj[32114895] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114896] ? item.obj[32114896] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114897] ? item.obj[32114897] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114898] ? item.obj[32114898] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114899] ? item.obj[32114899] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114900] ? item.obj[32114900] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114901] ? item.obj[32114901] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114902] ? item.obj[32114902] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114903] ? item.obj[32114903] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114904] ? item.obj[32114904] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114905] ? item.obj[32114905] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114906] ? item.obj[32114906] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114907] ? item.obj[32114907] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114908] ? item.obj[32114908] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114909] ? item.obj[32114909] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32114911] ? item.obj[32114911] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114912] ? item.obj[32114912] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114913] ? item.obj[32114913] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32114914] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32114915] ? item.obj[32114915] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114917] ? item.obj[32114917] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114917] ? item.obj[32114917] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114918] ? item.obj[32114918] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114919] ? item.obj[32114919] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114920] ? item.obj[32114920] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114921] ? item.obj[32114921] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114922] ? item.obj[32114922] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114923] ? item.obj[32114923] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114924] ? item.obj[32114924] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114925] ? item.obj[32114925] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114926] ? item.obj[32114926] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114927] ? item.obj[32114927] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114928] ? item.obj[32114928] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114929] ? item.obj[32114929] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114930] ? item.obj[32114930] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114931] ? item.obj[32114931] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114932] ? item.obj[32114932] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114933] ? item.obj[32114933] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114934] ? item.obj[32114934] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114935] ? item.obj[32114935] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114936] ? item.obj[32114936] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114937] ? item.obj[32114937] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114938] ? item.obj[32114938] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114939] ? item.obj[32114939] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32114941] ? item.obj[32114941] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114942] ? item.obj[32114942] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114943] ? item.obj[32114943] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32114944] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32114945] ? item.obj[32114945] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114947] ? item.obj[32114947] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114947] ? item.obj[32114947] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114948] ? item.obj[32114948] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114949] ? item.obj[32114949] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114950] ? item.obj[32114950] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114951] ? item.obj[32114951] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114952] ? item.obj[32114952] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114953] ? item.obj[32114953] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114954] ? item.obj[32114954] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114955] ? item.obj[32114955] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114956] ? item.obj[32114956] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114957] ? item.obj[32114957] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114958] ? item.obj[32114958] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114959] ? item.obj[32114959] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114960] ? item.obj[32114960] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114961] ? item.obj[32114961] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114962] ? item.obj[32114962] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114963] ? item.obj[32114963] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114964] ? item.obj[32114964] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114965] ? item.obj[32114965] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114966] ? item.obj[32114966] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114967] ? item.obj[32114967] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114968] ? item.obj[32114968] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114969] ? item.obj[32114969] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32114971] ? item.obj[32114971] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114972] ? item.obj[32114972] : '' }}</td>
                <td colspan="12">@{{ item.obj[32114973] ? item.obj[32114973] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32114974] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32114975] ? item.obj[32114975] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114977] ? item.obj[32114977] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114977] ? item.obj[32114977] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114978] ? item.obj[32114978] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114979] ? item.obj[32114979] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114980] ? item.obj[32114980] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114981] ? item.obj[32114981] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114982] ? item.obj[32114982] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114983] ? item.obj[32114983] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114984] ? item.obj[32114984] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114985] ? item.obj[32114985] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114986] ? item.obj[32114986] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114987] ? item.obj[32114987] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114988] ? item.obj[32114988] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114989] ? item.obj[32114989] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114990] ? item.obj[32114990] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114991] ? item.obj[32114991] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114992] ? item.obj[32114992] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114993] ? item.obj[32114993] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114994] ? item.obj[32114994] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114995] ? item.obj[32114995] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114996] ? item.obj[32114996] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114997] ? item.obj[32114997] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114998] ? item.obj[32114998] : '' }}</td>
                <td colspan="6">@{{ item.obj[32114999] ? item.obj[32114999] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115001] ? item.obj[32115001] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115002] ? item.obj[32115002] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115003] ? item.obj[32115003] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115004] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115005] ? item.obj[32115005] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115007] ? item.obj[32115007] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115007] ? item.obj[32115007] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115008] ? item.obj[32115008] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115009] ? item.obj[32115009] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115010] ? item.obj[32115010] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115011] ? item.obj[32115011] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115012] ? item.obj[32115012] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115013] ? item.obj[32115013] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115014] ? item.obj[32115014] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115015] ? item.obj[32115015] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115016] ? item.obj[32115016] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115017] ? item.obj[32115017] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115018] ? item.obj[32115018] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115019] ? item.obj[32115019] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115020] ? item.obj[32115020] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115021] ? item.obj[32115021] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115022] ? item.obj[32115022] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115023] ? item.obj[32115023] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115024] ? item.obj[32115024] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115025] ? item.obj[32115025] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115026] ? item.obj[32115026] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115027] ? item.obj[32115027] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115028] ? item.obj[32115028] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115029] ? item.obj[32115029] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115031] ? item.obj[32115031] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115032] ? item.obj[32115032] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115033] ? item.obj[32115033] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115034] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115035] ? item.obj[32115035] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115037] ? item.obj[32115037] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115037] ? item.obj[32115037] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115038] ? item.obj[32115038] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115039] ? item.obj[32115039] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115040] ? item.obj[32115040] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115041] ? item.obj[32115041] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115042] ? item.obj[32115042] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115043] ? item.obj[32115043] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115044] ? item.obj[32115044] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115045] ? item.obj[32115045] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115046] ? item.obj[32115046] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115047] ? item.obj[32115047] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115048] ? item.obj[32115048] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115049] ? item.obj[32115049] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115050] ? item.obj[32115050] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115051] ? item.obj[32115051] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115052] ? item.obj[32115052] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115053] ? item.obj[32115053] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115054] ? item.obj[32115054] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115055] ? item.obj[32115055] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115056] ? item.obj[32115056] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115057] ? item.obj[32115057] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115058] ? item.obj[32115058] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115059] ? item.obj[32115059] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115061] ? item.obj[32115061] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115062] ? item.obj[32115062] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115063] ? item.obj[32115063] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115064] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115065] ? item.obj[32115065] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115067] ? item.obj[32115067] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115067] ? item.obj[32115067] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115068] ? item.obj[32115068] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115069] ? item.obj[32115069] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115070] ? item.obj[32115070] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115071] ? item.obj[32115071] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115072] ? item.obj[32115072] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115073] ? item.obj[32115073] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115074] ? item.obj[32115074] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115075] ? item.obj[32115075] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115076] ? item.obj[32115076] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115077] ? item.obj[32115077] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115078] ? item.obj[32115078] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115079] ? item.obj[32115079] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115080] ? item.obj[32115080] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115081] ? item.obj[32115081] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115082] ? item.obj[32115082] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115083] ? item.obj[32115083] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115084] ? item.obj[32115084] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115085] ? item.obj[32115085] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115086] ? item.obj[32115086] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115087] ? item.obj[32115087] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115088] ? item.obj[32115088] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115089] ? item.obj[32115089] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115091] ? item.obj[32115091] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115092] ? item.obj[32115092] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115093] ? item.obj[32115093] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115094] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115095] ? item.obj[32115095] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115097] ? item.obj[32115097] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115097] ? item.obj[32115097] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115098] ? item.obj[32115098] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115099] ? item.obj[32115099] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115100] ? item.obj[32115100] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115101] ? item.obj[32115101] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115102] ? item.obj[32115102] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115103] ? item.obj[32115103] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115104] ? item.obj[32115104] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115105] ? item.obj[32115105] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115106] ? item.obj[32115106] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115107] ? item.obj[32115107] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115108] ? item.obj[32115108] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115109] ? item.obj[32115109] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115110] ? item.obj[32115110] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115111] ? item.obj[32115111] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115112] ? item.obj[32115112] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115113] ? item.obj[32115113] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115114] ? item.obj[32115114] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115115] ? item.obj[32115115] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115116] ? item.obj[32115116] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115117] ? item.obj[32115117] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115118] ? item.obj[32115118] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115119] ? item.obj[32115119] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115121] ? item.obj[32115121] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115122] ? item.obj[32115122] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115123] ? item.obj[32115123] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115124] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115125] ? item.obj[32115125] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115127] ? item.obj[32115127] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115127] ? item.obj[32115127] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115128] ? item.obj[32115128] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115129] ? item.obj[32115129] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115130] ? item.obj[32115130] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115131] ? item.obj[32115131] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115132] ? item.obj[32115132] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115133] ? item.obj[32115133] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115134] ? item.obj[32115134] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115135] ? item.obj[32115135] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115136] ? item.obj[32115136] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115137] ? item.obj[32115137] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115138] ? item.obj[32115138] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115139] ? item.obj[32115139] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115140] ? item.obj[32115140] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115141] ? item.obj[32115141] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115142] ? item.obj[32115142] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115143] ? item.obj[32115143] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115144] ? item.obj[32115144] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115145] ? item.obj[32115145] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115146] ? item.obj[32115146] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115147] ? item.obj[32115147] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115148] ? item.obj[32115148] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115149] ? item.obj[32115149] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115151] ? item.obj[32115151] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115152] ? item.obj[32115152] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115153] ? item.obj[32115153] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115154] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115155] ? item.obj[32115155] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115157] ? item.obj[32115157] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115157] ? item.obj[32115157] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115158] ? item.obj[32115158] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115159] ? item.obj[32115159] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115160] ? item.obj[32115160] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115161] ? item.obj[32115161] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115162] ? item.obj[32115162] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115163] ? item.obj[32115163] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115164] ? item.obj[32115164] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115165] ? item.obj[32115165] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115166] ? item.obj[32115166] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115167] ? item.obj[32115167] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115168] ? item.obj[32115168] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115169] ? item.obj[32115169] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115170] ? item.obj[32115170] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115171] ? item.obj[32115171] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115172] ? item.obj[32115172] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115173] ? item.obj[32115173] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115174] ? item.obj[32115174] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115175] ? item.obj[32115175] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115176] ? item.obj[32115176] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115177] ? item.obj[32115177] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115178] ? item.obj[32115178] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115179] ? item.obj[32115179] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115181] ? item.obj[32115181] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115182] ? item.obj[32115182] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115183] ? item.obj[32115183] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115184] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115185] ? item.obj[32115185] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115187] ? item.obj[32115187] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115187] ? item.obj[32115187] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115188] ? item.obj[32115188] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115189] ? item.obj[32115189] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115190] ? item.obj[32115190] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115191] ? item.obj[32115191] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115192] ? item.obj[32115192] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115193] ? item.obj[32115193] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115194] ? item.obj[32115194] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115195] ? item.obj[32115195] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115196] ? item.obj[32115196] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115197] ? item.obj[32115197] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115198] ? item.obj[32115198] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115199] ? item.obj[32115199] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115200] ? item.obj[32115200] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115201] ? item.obj[32115201] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115202] ? item.obj[32115202] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115203] ? item.obj[32115203] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115204] ? item.obj[32115204] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115205] ? item.obj[32115205] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115206] ? item.obj[32115206] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115207] ? item.obj[32115207] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115208] ? item.obj[32115208] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115209] ? item.obj[32115209] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115211] ? item.obj[32115211] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115212] ? item.obj[32115212] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115213] ? item.obj[32115213] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115214] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115215] ? item.obj[32115215] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115217] ? item.obj[32115217] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115217] ? item.obj[32115217] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115218] ? item.obj[32115218] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115219] ? item.obj[32115219] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115220] ? item.obj[32115220] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115221] ? item.obj[32115221] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115222] ? item.obj[32115222] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115223] ? item.obj[32115223] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115224] ? item.obj[32115224] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115225] ? item.obj[32115225] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115226] ? item.obj[32115226] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115227] ? item.obj[32115227] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115228] ? item.obj[32115228] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115229] ? item.obj[32115229] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115230] ? item.obj[32115230] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115231] ? item.obj[32115231] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115232] ? item.obj[32115232] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115233] ? item.obj[32115233] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115234] ? item.obj[32115234] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115235] ? item.obj[32115235] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115236] ? item.obj[32115236] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115237] ? item.obj[32115237] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115238] ? item.obj[32115238] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115239] ? item.obj[32115239] : '' }}</td>
            </tr>
            <tr style="background:rgba(103, 105, 107, 0.945);">
                <td colspan="26"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="12"></td>
                <td colspan="26"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="26">@{{ item.obj[32115241] ? item.obj[32115241] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115242] ? item.obj[32115242] : '' }}</td>
                <td colspan="12">@{{ item.obj[32115243] ? item.obj[32115243] : '' }}</td>
                <td colspan="12" style="font-size:6pt">@{{item.obj[32115244] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                <td colspan="26">@{{ item.obj[32115245] ? item.obj[32115245] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115247] ? item.obj[32115247] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115247] ? item.obj[32115247] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115248] ? item.obj[32115248] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115249] ? item.obj[32115249] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115250] ? item.obj[32115250] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115251] ? item.obj[32115251] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115252] ? item.obj[32115252] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115253] ? item.obj[32115253] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115254] ? item.obj[32115254] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115255] ? item.obj[32115255] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115256] ? item.obj[32115256] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115257] ? item.obj[32115257] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115258] ? item.obj[32115258] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115259] ? item.obj[32115259] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115260] ? item.obj[32115260] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115261] ? item.obj[32115261] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115262] ? item.obj[32115262] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115263] ? item.obj[32115263] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115264] ? item.obj[32115264] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115265] ? item.obj[32115265] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115266] ? item.obj[32115266] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115267] ? item.obj[32115267] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115268] ? item.obj[32115268] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115269] ? item.obj[32115269] : '' }}</td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left"><strong>TOTAL INTAKE / 24 JAM</strong></td>
                <td colspan="6">@{{ item.obj[32115270] ? item.obj[32115270] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115271] ? item.obj[32115271] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115272] ? item.obj[32115272] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115273] ? item.obj[32115273] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115274] ? item.obj[32115274] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115275] ? item.obj[32115275] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115276] ? item.obj[32115276] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115277] ? item.obj[32115277] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115278] ? item.obj[32115278] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115279] ? item.obj[32115279] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115280] ? item.obj[32115280] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115281] ? item.obj[32115281] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115282] ? item.obj[32115282] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115283] ? item.obj[32115283] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115284] ? item.obj[32115284] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115285] ? item.obj[32115285] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115286] ? item.obj[32115286] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115287] ? item.obj[32115287] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115288] ? item.obj[32115288] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115289] ? item.obj[32115289] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115290] ? item.obj[32115290] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115291] ? item.obj[32115291] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115292] ? item.obj[32115292] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115293] ? item.obj[32115293] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left"><strong>OUTPUT</strong></td>
                <td colspan="6">@{{ item.obj[32115300] ? item.obj[32115300] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115301] ? item.obj[32115301] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115302] ? item.obj[32115302] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115303] ? item.obj[32115303] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115304] ? item.obj[32115304] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115305] ? item.obj[32115305] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115306] ? item.obj[32115306] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115307] ? item.obj[32115307] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115308] ? item.obj[32115308] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115309] ? item.obj[32115309] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115310] ? item.obj[32115310] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115311] ? item.obj[32115311] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115312] ? item.obj[32115312] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115313] ? item.obj[32115313] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115314] ? item.obj[32115314] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115315] ? item.obj[32115315] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115316] ? item.obj[32115316] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115317] ? item.obj[32115317] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115318] ? item.obj[32115318] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115319] ? item.obj[32115319] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115320] ? item.obj[32115320] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115321] ? item.obj[32115321] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115322] ? item.obj[32115322] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115323] ? item.obj[32115323] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">DRAIN</td>
                <td colspan="6">@{{ item.obj[32115330] ? item.obj[32115330] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115331] ? item.obj[32115331] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115332] ? item.obj[32115332] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115333] ? item.obj[32115333] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115334] ? item.obj[32115334] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115335] ? item.obj[32115335] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115336] ? item.obj[32115336] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115337] ? item.obj[32115337] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115338] ? item.obj[32115338] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115339] ? item.obj[32115339] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115340] ? item.obj[32115340] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115341] ? item.obj[32115341] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115342] ? item.obj[32115342] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115343] ? item.obj[32115343] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115344] ? item.obj[32115344] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115345] ? item.obj[32115345] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115346] ? item.obj[32115346] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115347] ? item.obj[32115347] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115348] ? item.obj[32115348] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115349] ? item.obj[32115349] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115350] ? item.obj[32115350] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115351] ? item.obj[32115351] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115352] ? item.obj[32115352] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115353] ? item.obj[32115353] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">DRAIN</td>
                <td colspan="6">@{{ item.obj[32115360] ? item.obj[32115360] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115361] ? item.obj[32115361] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115362] ? item.obj[32115362] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115363] ? item.obj[32115363] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115364] ? item.obj[32115364] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115365] ? item.obj[32115365] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115366] ? item.obj[32115366] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115367] ? item.obj[32115367] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115368] ? item.obj[32115368] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115369] ? item.obj[32115369] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115370] ? item.obj[32115370] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115371] ? item.obj[32115371] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115372] ? item.obj[32115372] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115373] ? item.obj[32115373] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115374] ? item.obj[32115374] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115375] ? item.obj[32115375] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115376] ? item.obj[32115376] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115377] ? item.obj[32115377] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115378] ? item.obj[32115378] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115379] ? item.obj[32115379] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115380] ? item.obj[32115380] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115381] ? item.obj[32115381] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115382] ? item.obj[32115382] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115383] ? item.obj[32115383] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">WATER SEAL DRAINAGE (WSD) / CHEST TUBE KANAN</td>
                <td colspan="6">@{{ item.obj[32115390] ? item.obj[32115390] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115391] ? item.obj[32115391] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115392] ? item.obj[32115392] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115393] ? item.obj[32115393] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115394] ? item.obj[32115394] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115395] ? item.obj[32115395] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115396] ? item.obj[32115396] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115397] ? item.obj[32115397] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115398] ? item.obj[32115398] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115399] ? item.obj[32115399] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115400] ? item.obj[32115400] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115401] ? item.obj[32115401] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115402] ? item.obj[32115402] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115403] ? item.obj[32115403] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115404] ? item.obj[32115404] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115405] ? item.obj[32115405] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115406] ? item.obj[32115406] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115407] ? item.obj[32115407] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115408] ? item.obj[32115408] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115409] ? item.obj[32115409] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115410] ? item.obj[32115410] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115411] ? item.obj[32115411] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115412] ? item.obj[32115412] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115413] ? item.obj[32115413] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">WATER SEAL DRAINAGE (WSD) / CHEST TUBE KIRI</td>
                <td colspan="6">@{{ item.obj[32115420] ? item.obj[32115420] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115421] ? item.obj[32115421] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115422] ? item.obj[32115422] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115423] ? item.obj[32115423] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115424] ? item.obj[32115424] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115425] ? item.obj[32115425] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115426] ? item.obj[32115426] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115427] ? item.obj[32115427] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115428] ? item.obj[32115428] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115429] ? item.obj[32115429] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115430] ? item.obj[32115430] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115431] ? item.obj[32115431] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115432] ? item.obj[32115432] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115433] ? item.obj[32115433] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115434] ? item.obj[32115434] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115435] ? item.obj[32115435] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115436] ? item.obj[32115436] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115437] ? item.obj[32115437] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115438] ? item.obj[32115438] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115439] ? item.obj[32115439] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115440] ? item.obj[32115440] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115441] ? item.obj[32115441] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115442] ? item.obj[32115442] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115443] ? item.obj[32115443] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">CAIRAN LAMBUNG YANG KELUAR VIA NGT</td>
                <td colspan="6">@{{ item.obj[32115450] ? item.obj[32115450] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115451] ? item.obj[32115451] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115452] ? item.obj[32115452] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115453] ? item.obj[32115453] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115454] ? item.obj[32115454] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115455] ? item.obj[32115455] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115456] ? item.obj[32115456] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115457] ? item.obj[32115457] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115458] ? item.obj[32115458] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115459] ? item.obj[32115459] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115460] ? item.obj[32115460] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115461] ? item.obj[32115461] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115462] ? item.obj[32115462] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115463] ? item.obj[32115463] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115464] ? item.obj[32115464] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115465] ? item.obj[32115465] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115466] ? item.obj[32115466] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115467] ? item.obj[32115467] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115468] ? item.obj[32115468] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115469] ? item.obj[32115469] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115470] ? item.obj[32115470] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115471] ? item.obj[32115471] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115472] ? item.obj[32115472] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115473] ? item.obj[32115473] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">BUANG AIR BESAR / BAB (FESES)</td>
                <td colspan="6">@{{ item.obj[32115480] ? item.obj[32115480] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115481] ? item.obj[32115481] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115482] ? item.obj[32115482] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115483] ? item.obj[32115483] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115484] ? item.obj[32115484] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115485] ? item.obj[32115485] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115486] ? item.obj[32115486] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115487] ? item.obj[32115487] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115488] ? item.obj[32115488] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115489] ? item.obj[32115489] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115490] ? item.obj[32115490] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115491] ? item.obj[32115491] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115492] ? item.obj[32115492] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115493] ? item.obj[32115493] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115494] ? item.obj[32115494] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115495] ? item.obj[32115495] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115496] ? item.obj[32115496] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115497] ? item.obj[32115497] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115498] ? item.obj[32115498] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115499] ? item.obj[32115499] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115500] ? item.obj[32115500] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115501] ? item.obj[32115501] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115502] ? item.obj[32115502] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115503] ? item.obj[32115503] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">BUANG AIR KECIL / BAK (URINE)</td>
                <td colspan="6">@{{ item.obj[32115510] ? item.obj[32115510] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115511] ? item.obj[32115511] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115512] ? item.obj[32115512] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115513] ? item.obj[32115513] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115514] ? item.obj[32115514] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115515] ? item.obj[32115515] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115516] ? item.obj[32115516] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115517] ? item.obj[32115517] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115518] ? item.obj[32115518] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115519] ? item.obj[32115519] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115520] ? item.obj[32115520] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115521] ? item.obj[32115521] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115522] ? item.obj[32115522] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115523] ? item.obj[32115523] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115524] ? item.obj[32115524] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115525] ? item.obj[32115525] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115526] ? item.obj[32115526] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115527] ? item.obj[32115527] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115528] ? item.obj[32115528] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115529] ? item.obj[32115529] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115530] ? item.obj[32115530] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115531] ? item.obj[32115531] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115532] ? item.obj[32115532] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115533] ? item.obj[32115533] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left">INSENSIBLE WATER LOSS (IWL) / 24 JAM</td>
                <td colspan="6">@{{ item.obj[32115540] ? item.obj[32115540] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115541] ? item.obj[32115541] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115542] ? item.obj[32115542] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115543] ? item.obj[32115543] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115544] ? item.obj[32115544] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115545] ? item.obj[32115545] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115546] ? item.obj[32115546] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115547] ? item.obj[32115547] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115548] ? item.obj[32115548] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115549] ? item.obj[32115549] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115550] ? item.obj[32115550] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115551] ? item.obj[32115551] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115552] ? item.obj[32115552] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115553] ? item.obj[32115553] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115554] ? item.obj[32115554] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115555] ? item.obj[32115555] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115556] ? item.obj[32115556] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115557] ? item.obj[32115557] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115558] ? item.obj[32115558] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115559] ? item.obj[32115559] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115560] ? item.obj[32115560] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115561] ? item.obj[32115561] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115562] ? item.obj[32115562] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115563] ? item.obj[32115563] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left"><strong>TOTAL OUTPUT / 24 JAM</strong></td>
                <td colspan="6">@{{ item.obj[32115570] ? item.obj[32115570] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115571] ? item.obj[32115571] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115572] ? item.obj[32115572] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115573] ? item.obj[32115573] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115574] ? item.obj[32115574] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115575] ? item.obj[32115575] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115576] ? item.obj[32115576] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115577] ? item.obj[32115577] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115578] ? item.obj[32115578] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115579] ? item.obj[32115579] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115580] ? item.obj[32115580] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115581] ? item.obj[32115581] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115582] ? item.obj[32115582] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115583] ? item.obj[32115583] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115584] ? item.obj[32115584] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115585] ? item.obj[32115585] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115586] ? item.obj[32115586] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115587] ? item.obj[32115587] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115588] ? item.obj[32115588] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115589] ? item.obj[32115589] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115590] ? item.obj[32115590] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115591] ? item.obj[32115591] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115592] ? item.obj[32115592] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115593] ? item.obj[32115593] : '' }}</td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="88" style="text-align:left"><strong>BALANCE</strong></td>
                <td colspan="6">@{{ item.obj[32115600] ? item.obj[32115600] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115601] ? item.obj[32115601] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115602] ? item.obj[32115602] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115603] ? item.obj[32115603] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115604] ? item.obj[32115604] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115605] ? item.obj[32115605] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115606] ? item.obj[32115606] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115607] ? item.obj[32115607] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115608] ? item.obj[32115608] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115609] ? item.obj[32115609] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115610] ? item.obj[32115610] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115611] ? item.obj[32115611] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115612] ? item.obj[32115612] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115613] ? item.obj[32115613] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115614] ? item.obj[32115614] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115615] ? item.obj[32115615] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115616] ? item.obj[32115616] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115617] ? item.obj[32115617] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115618] ? item.obj[32115618] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115619] ? item.obj[32115619] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115620] ? item.obj[32115620] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115621] ? item.obj[32115621] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115622] ? item.obj[32115622] : '' }}</td>
                <td colspan="6">@{{ item.obj[32115623] ? item.obj[32115623] : '' }}</td>
                <td colspan="6"></td>
            </tr>
        </table>
    </div>
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

    angular.controller('cetakFlowsheet', function ($scope, $http, httpService) {
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

        // var dokter = $scope.item.obj[31100569];
        // var dpjp = $scope.item.obj[31100576];
        // jQuery('#qrcodeDokter').qrcode({
        //     width	: 100,
		// 	height	: 100,
        //     text	: "Tanda Tangan Digital Oleh " + dokter
        // });	

        // jQuery('#qrcodeDPJP').qrcode({
        //     width	: 100,
		// 	height	: 100,
        //     text	: "Tanda Tangan Digital Oleh " + dpjp
        // });	
    })
    angular.filter('toDate', function() {
        return function(items) {
            if(items != null){
                 return new Date(items);
            }
        };
    });
    // $(document).ready(function () {
    //     window.print();
    // });
</script>
</html>
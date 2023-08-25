<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberian Edukasi Pasien</title>
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
        body{
            width:210mm;
            height:297mm;
            margin-top:250mm;
            margin-bottom:250mm;
            margin-left:250mm;
            margin-right:250mm;
            margin:0 auto; 
        }
        @page{
            size: A4;
        }
        .batas{
            page-break-after: always;
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
            height:16pt
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
    </style>
</head>
<body ng-controller="cetakPemberianEdukasiPasien">
    @if (!empty($res['d1']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obj[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obj[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obj[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obj[423258] ? item.obj[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obj[423263] ? item.obj[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obj[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obj[423265] ? item.obj[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obj[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obj[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obj[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obj[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obj[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obj[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obj[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obj[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obj[423278] ? item.obj[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obj[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obj[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obj[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obj[423290] ? item.obj[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423292] ? item.obj[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423293] ? item.obj[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423294] ? item.obj[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423299] ? item.obj[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423300] ? item.obj[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423301] ? item.obj[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423306] ? item.obj[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423307] ? item.obj[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423308] ? item.obj[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423313] ? item.obj[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423314] ? item.obj[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423315] ? item.obj[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423320] ? item.obj[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423321] ? item.obj[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423322] ? item.obj[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423327] ? item.obj[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423328] ? item.obj[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423329] ? item.obj[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423334] ? item.obj[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423335] ? item.obj[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423336] ? item.obj[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423341] ? item.obj[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423342] ? item.obj[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423343] ? item.obj[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423348] ? item.obj[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423349] ? item.obj[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423350] ? item.obj[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423355] ? item.obj[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423356] ? item.obj[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423357] ? item.obj[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423362] ? item.obj[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423363] ? item.obj[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423364] ? item.obj[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423369] ? item.obj[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423370] ? item.obj[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423371] ? item.obj[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423376] ? item.obj[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423377] ? item.obj[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423378] ? item.obj[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423383] ? item.obj[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423384] ? item.obj[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423385] ? item.obj[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423390] ? item.obj[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423391] ? item.obj[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423392] ? item.obj[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423397] ? item.obj[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423398] ? item.obj[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423399] ? item.obj[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423404] ? item.obj[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423405] ? item.obj[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423406] ? item.obj[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423411] ? item.obj[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423412] ? item.obj[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423413] ? item.obj[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423418] ? item.obj[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423419] ? item.obj[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423420] ? item.obj[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423425] ? item.obj[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423426] ? item.obj[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423427] ? item.obj[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obj[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obj[423432] ? item.obj[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423433] ? item.obj[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obj[423434] ? item.obj[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obj[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obj[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d2']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji2[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji2[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji2[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji2[423258] ? item.obji2[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji2[423263] ? item.obji2[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji2[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji2[423265] ? item.obji2[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji2[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji2[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji2[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji2[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji2[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji2[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji2[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji2[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji2[423278] ? item.obji2[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji2[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji2[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji2[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji2[423290] ? item.obji2[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423292] ? item.obji2[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423293] ? item.obji2[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423294] ? item.obji2[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423299] ? item.obji2[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423300] ? item.obji2[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423301] ? item.obji2[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423306] ? item.obji2[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423307] ? item.obji2[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423308] ? item.obji2[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423313] ? item.obji2[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423314] ? item.obji2[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423315] ? item.obji2[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423320] ? item.obji2[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423321] ? item.obji2[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423322] ? item.obji2[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423327] ? item.obji2[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423328] ? item.obji2[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423329] ? item.obji2[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423334] ? item.obji2[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423335] ? item.obji2[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423336] ? item.obji2[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423341] ? item.obji2[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423342] ? item.obji2[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423343] ? item.obji2[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423348] ? item.obji2[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423349] ? item.obji2[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423350] ? item.obji2[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423355] ? item.obji2[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423356] ? item.obji2[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423357] ? item.obji2[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423362] ? item.obji2[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423363] ? item.obji2[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423364] ? item.obji2[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423369] ? item.obji2[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423370] ? item.obji2[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423371] ? item.obji2[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423376] ? item.obji2[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423377] ? item.obji2[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423378] ? item.obji2[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423383] ? item.obji2[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423384] ? item.obji2[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423385] ? item.obji2[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423390] ? item.obji2[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423391] ? item.obji2[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423392] ? item.obji2[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423397] ? item.obji2[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423398] ? item.obji2[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423399] ? item.obji2[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423404] ? item.obji2[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423405] ? item.obji2[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423406] ? item.obji2[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423411] ? item.obji2[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423412] ? item.obji2[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423413] ? item.obji2[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423418] ? item.obji2[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423419] ? item.obji2[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423420] ? item.obji2[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423425] ? item.obji2[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423426] ? item.obji2[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423427] ? item.obji2[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji2[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji2[423432] ? item.obji2[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423433] ? item.obji2[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji2[423434] ? item.obji2[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji2[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji2[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d3']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji3[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji3[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji3[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji3[423258] ? item.obji3[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji3[423263] ? item.obji3[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji3[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji3[423265] ? item.obji3[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji3[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji3[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji3[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji3[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji3[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji3[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji3[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji3[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji3[423278] ? item.obji3[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji3[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji3[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji3[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji3[423290] ? item.obji3[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423292] ? item.obji3[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423293] ? item.obji3[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423294] ? item.obji3[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423299] ? item.obji3[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423300] ? item.obji3[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423301] ? item.obji3[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423306] ? item.obji3[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423307] ? item.obji3[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423308] ? item.obji3[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423313] ? item.obji3[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423314] ? item.obji3[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423315] ? item.obji3[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423320] ? item.obji3[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423321] ? item.obji3[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423322] ? item.obji3[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423327] ? item.obji3[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423328] ? item.obji3[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423329] ? item.obji3[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423334] ? item.obji3[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423335] ? item.obji3[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423336] ? item.obji3[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423341] ? item.obji3[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423342] ? item.obji3[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423343] ? item.obji3[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423348] ? item.obji3[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423349] ? item.obji3[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423350] ? item.obji3[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423355] ? item.obji3[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423356] ? item.obji3[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423357] ? item.obji3[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423362] ? item.obji3[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423363] ? item.obji3[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423364] ? item.obji3[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423369] ? item.obji3[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423370] ? item.obji3[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423371] ? item.obji3[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423376] ? item.obji3[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423377] ? item.obji3[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423378] ? item.obji3[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423383] ? item.obji3[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423384] ? item.obji3[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423385] ? item.obji3[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423390] ? item.obji3[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423391] ? item.obji3[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423392] ? item.obji3[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423397] ? item.obji3[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423398] ? item.obji3[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423399] ? item.obji3[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423404] ? item.obji3[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423405] ? item.obji3[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423406] ? item.obji3[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423411] ? item.obji3[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423412] ? item.obji3[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423413] ? item.obji3[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423418] ? item.obji3[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423419] ? item.obji3[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423420] ? item.obji3[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423425] ? item.obji3[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423426] ? item.obji3[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423427] ? item.obji3[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji3[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji3[423432] ? item.obji3[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423433] ? item.obji3[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji3[423434] ? item.obji3[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji3[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji3[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d4']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji4[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji4[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji4[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji4[423258] ? item.obji4[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji4[423263] ? item.obji4[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji4[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji4[423265] ? item.obji4[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji4[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji4[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji4[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji4[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji4[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji4[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji4[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji4[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji4[423278] ? item.obji4[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji4[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji4[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji4[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji4[423290] ? item.obji4[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423292] ? item.obji4[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423293] ? item.obji4[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423294] ? item.obji4[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423299] ? item.obji4[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423300] ? item.obji4[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423301] ? item.obji4[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423306] ? item.obji4[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423307] ? item.obji4[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423308] ? item.obji4[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423313] ? item.obji4[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423314] ? item.obji4[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423315] ? item.obji4[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423320] ? item.obji4[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423321] ? item.obji4[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423322] ? item.obji4[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423327] ? item.obji4[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423328] ? item.obji4[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423329] ? item.obji4[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423334] ? item.obji4[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423335] ? item.obji4[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423336] ? item.obji4[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423341] ? item.obji4[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423342] ? item.obji4[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423343] ? item.obji4[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423348] ? item.obji4[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423349] ? item.obji4[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423350] ? item.obji4[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423355] ? item.obji4[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423356] ? item.obji4[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423357] ? item.obji4[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423362] ? item.obji4[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423363] ? item.obji4[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423364] ? item.obji4[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423369] ? item.obji4[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423370] ? item.obji4[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423371] ? item.obji4[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423376] ? item.obji4[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423377] ? item.obji4[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423378] ? item.obji4[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423383] ? item.obji4[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423384] ? item.obji4[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423385] ? item.obji4[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423390] ? item.obji4[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423391] ? item.obji4[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423392] ? item.obji4[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423397] ? item.obji4[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423398] ? item.obji4[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423399] ? item.obji4[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423404] ? item.obji4[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423405] ? item.obji4[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423406] ? item.obji4[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423411] ? item.obji4[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423412] ? item.obji4[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423413] ? item.obji4[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423418] ? item.obji4[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423419] ? item.obji4[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423420] ? item.obji4[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423425] ? item.obji4[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423426] ? item.obji4[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423427] ? item.obji4[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji4[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji4[423432] ? item.obji4[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423433] ? item.obji4[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji4[423434] ? item.obji4[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji4[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji4[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d5']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji5[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji5[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji5[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji5[423258] ? item.obji5[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji5[423263] ? item.obji5[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji5[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji5[423265] ? item.obji5[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji5[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji5[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji5[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji5[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji5[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji5[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji5[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji5[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji5[423278] ? item.obji5[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji5[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji5[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji5[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji5[423290] ? item.obji5[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423292] ? item.obji5[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423293] ? item.obji5[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423294] ? item.obji5[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423299] ? item.obji5[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423300] ? item.obji5[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423301] ? item.obji5[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423306] ? item.obji5[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423307] ? item.obji5[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423308] ? item.obji5[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423313] ? item.obji5[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423314] ? item.obji5[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423315] ? item.obji5[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423320] ? item.obji5[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423321] ? item.obji5[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423322] ? item.obji5[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423327] ? item.obji5[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423328] ? item.obji5[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423329] ? item.obji5[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423334] ? item.obji5[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423335] ? item.obji5[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423336] ? item.obji5[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423341] ? item.obji5[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423342] ? item.obji5[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423343] ? item.obji5[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423348] ? item.obji5[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423349] ? item.obji5[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423350] ? item.obji5[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423355] ? item.obji5[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423356] ? item.obji5[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423357] ? item.obji5[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423362] ? item.obji5[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423363] ? item.obji5[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423364] ? item.obji5[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423369] ? item.obji5[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423370] ? item.obji5[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423371] ? item.obji5[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423376] ? item.obji5[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423377] ? item.obji5[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423378] ? item.obji5[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423383] ? item.obji5[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423384] ? item.obji5[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423385] ? item.obji5[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423390] ? item.obji5[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423391] ? item.obji5[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423392] ? item.obji5[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423397] ? item.obji5[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423398] ? item.obji5[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423399] ? item.obji5[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423404] ? item.obji5[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423405] ? item.obji5[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423406] ? item.obji5[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423411] ? item.obji5[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423412] ? item.obji5[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423413] ? item.obji5[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423418] ? item.obji5[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423419] ? item.obji5[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423420] ? item.obji5[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423425] ? item.obji5[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423426] ? item.obji5[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423427] ? item.obji5[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji5[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji5[423432] ? item.obji5[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423433] ? item.obji5[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji5[423434] ? item.obji5[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji5[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji5[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d6']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji6[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji6[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji6[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji6[423258] ? item.obji6[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji6[423263] ? item.obji6[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji6[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji6[423265] ? item.obji6[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji6[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji6[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji6[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji6[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji6[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji6[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji6[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji6[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji6[423278] ? item.obji6[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji6[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji6[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji6[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji6[423290] ? item.obji6[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423292] ? item.obji6[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423293] ? item.obji6[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423294] ? item.obji6[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423299] ? item.obji6[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423300] ? item.obji6[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423301] ? item.obji6[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423306] ? item.obji6[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423307] ? item.obji6[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423308] ? item.obji6[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423313] ? item.obji6[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423314] ? item.obji6[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423315] ? item.obji6[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423320] ? item.obji6[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423321] ? item.obji6[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423322] ? item.obji6[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423327] ? item.obji6[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423328] ? item.obji6[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423329] ? item.obji6[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423334] ? item.obji6[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423335] ? item.obji6[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423336] ? item.obji6[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423341] ? item.obji6[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423342] ? item.obji6[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423343] ? item.obji6[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423348] ? item.obji6[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423349] ? item.obji6[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423350] ? item.obji6[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423355] ? item.obji6[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423356] ? item.obji6[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423357] ? item.obji6[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423362] ? item.obji6[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423363] ? item.obji6[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423364] ? item.obji6[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423369] ? item.obji6[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423370] ? item.obji6[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423371] ? item.obji6[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423376] ? item.obji6[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423377] ? item.obji6[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423378] ? item.obji6[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423383] ? item.obji6[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423384] ? item.obji6[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423385] ? item.obji6[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423390] ? item.obji6[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423391] ? item.obji6[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423392] ? item.obji6[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423397] ? item.obji6[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423398] ? item.obji6[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423399] ? item.obji6[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423404] ? item.obji6[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423405] ? item.obji6[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423406] ? item.obji6[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423411] ? item.obji6[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423412] ? item.obji6[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423413] ? item.obji6[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423418] ? item.obji6[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423419] ? item.obji6[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423420] ? item.obji6[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423425] ? item.obji6[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423426] ? item.obji6[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423427] ? item.obji6[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji6[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji6[423432] ? item.obji6[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423433] ? item.obji6[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji6[423434] ? item.obji6[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji6[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji6[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d7']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji7[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji7[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji7[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji7[423258] ? item.obji7[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji7[423263] ? item.obji7[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji7[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji7[423265] ? item.obji7[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji7[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji7[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji7[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji7[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji7[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji7[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji7[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji7[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji7[423278] ? item.obji7[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji7[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji7[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji7[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji7[423290] ? item.obji7[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423292] ? item.obji7[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423293] ? item.obji7[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423294] ? item.obji7[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423299] ? item.obji7[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423300] ? item.obji7[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423301] ? item.obji7[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423306] ? item.obji7[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423307] ? item.obji7[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423308] ? item.obji7[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423313] ? item.obji7[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423314] ? item.obji7[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423315] ? item.obji7[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423320] ? item.obji7[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423321] ? item.obji7[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423322] ? item.obji7[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423327] ? item.obji7[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423328] ? item.obji7[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423329] ? item.obji7[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423334] ? item.obji7[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423335] ? item.obji7[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423336] ? item.obji7[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423341] ? item.obji7[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423342] ? item.obji7[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423343] ? item.obji7[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423348] ? item.obji7[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423349] ? item.obji7[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423350] ? item.obji7[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423355] ? item.obji7[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423356] ? item.obji7[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423357] ? item.obji7[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423362] ? item.obji7[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423363] ? item.obji7[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423364] ? item.obji7[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423369] ? item.obji7[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423370] ? item.obji7[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423371] ? item.obji7[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423376] ? item.obji7[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423377] ? item.obji7[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423378] ? item.obji7[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423383] ? item.obji7[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423384] ? item.obji7[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423385] ? item.obji7[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423390] ? item.obji7[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423391] ? item.obji7[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423392] ? item.obji7[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423397] ? item.obji7[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423398] ? item.obji7[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423399] ? item.obji7[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423404] ? item.obji7[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423405] ? item.obji7[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423406] ? item.obji7[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423411] ? item.obji7[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423412] ? item.obji7[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423413] ? item.obji7[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423418] ? item.obji7[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423419] ? item.obji7[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423420] ? item.obji7[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423425] ? item.obji7[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423426] ? item.obji7[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423427] ? item.obji7[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji7[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji7[423432] ? item.obji7[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423433] ? item.obji7[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji7[423434] ? item.obji7[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji7[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji7[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d8']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji8[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji8[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji8[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji8[423258] ? item.obji8[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji8[423263] ? item.obji8[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji8[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji8[423265] ? item.obji8[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji8[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji8[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji8[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji8[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji8[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji8[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji8[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji8[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji8[423278] ? item.obji8[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji8[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji8[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji8[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji8[423290] ? item.obji8[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423292] ? item.obji8[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423293] ? item.obji8[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423294] ? item.obji8[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423299] ? item.obji8[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423300] ? item.obji8[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423301] ? item.obji8[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423306] ? item.obji8[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423307] ? item.obji8[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423308] ? item.obji8[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423313] ? item.obji8[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423314] ? item.obji8[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423315] ? item.obji8[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423320] ? item.obji8[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423321] ? item.obji8[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423322] ? item.obji8[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423327] ? item.obji8[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423328] ? item.obji8[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423329] ? item.obji8[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423334] ? item.obji8[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423335] ? item.obji8[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423336] ? item.obji8[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423341] ? item.obji8[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423342] ? item.obji8[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423343] ? item.obji8[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423348] ? item.obji8[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423349] ? item.obji8[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423350] ? item.obji8[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423355] ? item.obji8[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423356] ? item.obji8[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423357] ? item.obji8[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423362] ? item.obji8[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423363] ? item.obji8[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423364] ? item.obji8[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423369] ? item.obji8[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423370] ? item.obji8[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423371] ? item.obji8[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423376] ? item.obji8[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423377] ? item.obji8[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423378] ? item.obji8[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423383] ? item.obji8[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423384] ? item.obji8[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423385] ? item.obji8[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423390] ? item.obji8[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423391] ? item.obji8[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423392] ? item.obji8[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423397] ? item.obji8[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423398] ? item.obji8[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423399] ? item.obji8[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423404] ? item.obji8[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423405] ? item.obji8[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423406] ? item.obji8[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423411] ? item.obji8[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423412] ? item.obji8[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423413] ? item.obji8[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423418] ? item.obji8[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423419] ? item.obji8[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423420] ? item.obji8[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423425] ? item.obji8[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423426] ? item.obji8[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423427] ? item.obji8[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji8[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji8[423432] ? item.obji8[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423433] ? item.obji8[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji8[423434] ? item.obji8[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji8[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji8[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d9']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji9[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji9[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji9[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji9[423258] ? item.obji9[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji9[423263] ? item.obji9[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji9[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji9[423265] ? item.obji9[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji9[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji9[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji9[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji9[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji9[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji9[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji9[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji9[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji9[423278] ? item.obji9[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji9[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji9[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji9[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji9[423290] ? item.obji9[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423292] ? item.obji9[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423293] ? item.obji9[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423294] ? item.obji9[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423299] ? item.obji9[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423300] ? item.obji9[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423301] ? item.obji9[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423306] ? item.obji9[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423307] ? item.obji9[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423308] ? item.obji9[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423313] ? item.obji9[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423314] ? item.obji9[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423315] ? item.obji9[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423320] ? item.obji9[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423321] ? item.obji9[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423322] ? item.obji9[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423327] ? item.obji9[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423328] ? item.obji9[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423329] ? item.obji9[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423334] ? item.obji9[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423335] ? item.obji9[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423336] ? item.obji9[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423341] ? item.obji9[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423342] ? item.obji9[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423343] ? item.obji9[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423348] ? item.obji9[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423349] ? item.obji9[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423350] ? item.obji9[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423355] ? item.obji9[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423356] ? item.obji9[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423357] ? item.obji9[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423362] ? item.obji9[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423363] ? item.obji9[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423364] ? item.obji9[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423369] ? item.obji9[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423370] ? item.obji9[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423371] ? item.obji9[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423376] ? item.obji9[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423377] ? item.obji9[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423378] ? item.obji9[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423383] ? item.obji9[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423384] ? item.obji9[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423385] ? item.obji9[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423390] ? item.obji9[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423391] ? item.obji9[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423392] ? item.obji9[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423397] ? item.obji9[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423398] ? item.obji9[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423399] ? item.obji9[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423404] ? item.obji9[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423405] ? item.obji9[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423406] ? item.obji9[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423411] ? item.obji9[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423412] ? item.obji9[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423413] ? item.obji9[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423418] ? item.obji9[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423419] ? item.obji9[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423420] ? item.obji9[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423425] ? item.obji9[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423426] ? item.obji9[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423427] ? item.obji9[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji9[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji9[423432] ? item.obji9[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423433] ? item.obji9[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji9[423434] ? item.obji9[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji9[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji9[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d10']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji10[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji10[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji10[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji10[423258] ? item.obji10[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji10[423263] ? item.obji10[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji10[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji10[423265] ? item.obji10[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji10[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji10[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji10[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji10[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji10[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji10[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji10[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji10[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji10[423278] ? item.obji10[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji10[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji10[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji10[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji10[423290] ? item.obji10[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423292] ? item.obji10[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423293] ? item.obji10[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423294] ? item.obji10[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423299] ? item.obji10[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423300] ? item.obji10[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423301] ? item.obji10[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423306] ? item.obji10[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423307] ? item.obji10[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423308] ? item.obji10[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423313] ? item.obji10[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423314] ? item.obji10[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423315] ? item.obji10[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423320] ? item.obji10[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423321] ? item.obji10[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423322] ? item.obji10[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423327] ? item.obji10[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423328] ? item.obji10[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423329] ? item.obji10[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423334] ? item.obji10[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423335] ? item.obji10[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423336] ? item.obji10[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423341] ? item.obji10[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423342] ? item.obji10[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423343] ? item.obji10[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423348] ? item.obji10[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423349] ? item.obji10[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423350] ? item.obji10[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423355] ? item.obji10[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423356] ? item.obji10[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423357] ? item.obji10[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423362] ? item.obji10[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423363] ? item.obji10[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423364] ? item.obji10[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423369] ? item.obji10[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423370] ? item.obji10[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423371] ? item.obji10[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423376] ? item.obji10[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423377] ? item.obji10[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423378] ? item.obji10[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423383] ? item.obji10[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423384] ? item.obji10[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423385] ? item.obji10[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423390] ? item.obji10[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423391] ? item.obji10[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423392] ? item.obji10[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423397] ? item.obji10[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423398] ? item.obji10[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423399] ? item.obji10[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423404] ? item.obji10[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423405] ? item.obji10[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423406] ? item.obji10[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423411] ? item.obji10[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423412] ? item.obji10[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423413] ? item.obji10[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423418] ? item.obji10[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423419] ? item.obji10[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423420] ? item.obji10[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423425] ? item.obji10[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423426] ? item.obji10[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423427] ? item.obji10[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji10[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji10[423432] ? item.obji10[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423433] ? item.obji10[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji10[423434] ? item.obji10[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji10[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji10[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d11']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji11[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji11[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji11[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji11[423258] ? item.obji11[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji11[423263] ? item.obji11[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji11[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji11[423265] ? item.obji11[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji11[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji11[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji11[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji11[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji11[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji11[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji11[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji11[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji11[423278] ? item.obji11[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji11[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji11[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji11[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji11[423290] ? item.obji11[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423292] ? item.obji11[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423293] ? item.obji11[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423294] ? item.obji11[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423299] ? item.obji11[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423300] ? item.obji11[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423301] ? item.obji11[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423306] ? item.obji11[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423307] ? item.obji11[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423308] ? item.obji11[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423313] ? item.obji11[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423314] ? item.obji11[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423315] ? item.obji11[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423320] ? item.obji11[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423321] ? item.obji11[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423322] ? item.obji11[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423327] ? item.obji11[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423328] ? item.obji11[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423329] ? item.obji11[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423334] ? item.obji11[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423335] ? item.obji11[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423336] ? item.obji11[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423341] ? item.obji11[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423342] ? item.obji11[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423343] ? item.obji11[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423348] ? item.obji11[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423349] ? item.obji11[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423350] ? item.obji11[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423355] ? item.obji11[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423356] ? item.obji11[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423357] ? item.obji11[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423362] ? item.obji11[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423363] ? item.obji11[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423364] ? item.obji11[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423369] ? item.obji11[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423370] ? item.obji11[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423371] ? item.obji11[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423376] ? item.obji11[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423377] ? item.obji11[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423378] ? item.obji11[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423383] ? item.obji11[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423384] ? item.obji11[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423385] ? item.obji11[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423390] ? item.obji11[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423391] ? item.obji11[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423392] ? item.obji11[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423397] ? item.obji11[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423398] ? item.obji11[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423399] ? item.obji11[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423404] ? item.obji11[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423405] ? item.obji11[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423406] ? item.obji11[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423411] ? item.obji11[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423412] ? item.obji11[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423413] ? item.obji11[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423418] ? item.obji11[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423419] ? item.obji11[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423420] ? item.obji11[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423425] ? item.obji11[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423426] ? item.obji11[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423427] ? item.obji11[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji11[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji11[423432] ? item.obji11[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423433] ? item.obji11[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji11[423434] ? item.obji11[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji11[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji11[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d12']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji12[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji12[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji12[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji12[423258] ? item.obji12[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji12[423263] ? item.obji12[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji12[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji12[423265] ? item.obji12[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji12[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji12[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji12[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji12[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji12[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji12[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji12[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji12[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji12[423278] ? item.obji12[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji12[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji12[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji12[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji12[423290] ? item.obji12[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423292] ? item.obji12[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423293] ? item.obji12[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423294] ? item.obji12[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423299] ? item.obji12[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423300] ? item.obji12[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423301] ? item.obji12[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423306] ? item.obji12[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423307] ? item.obji12[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423308] ? item.obji12[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423313] ? item.obji12[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423314] ? item.obji12[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423315] ? item.obji12[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423320] ? item.obji12[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423321] ? item.obji12[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423322] ? item.obji12[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423327] ? item.obji12[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423328] ? item.obji12[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423329] ? item.obji12[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423334] ? item.obji12[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423335] ? item.obji12[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423336] ? item.obji12[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423341] ? item.obji12[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423342] ? item.obji12[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423343] ? item.obji12[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423348] ? item.obji12[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423349] ? item.obji12[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423350] ? item.obji12[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423355] ? item.obji12[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423356] ? item.obji12[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423357] ? item.obji12[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423362] ? item.obji12[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423363] ? item.obji12[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423364] ? item.obji12[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423369] ? item.obji12[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423370] ? item.obji12[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423371] ? item.obji12[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423376] ? item.obji12[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423377] ? item.obji12[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423378] ? item.obji12[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423383] ? item.obji12[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423384] ? item.obji12[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423385] ? item.obji12[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423390] ? item.obji12[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423391] ? item.obji12[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423392] ? item.obji12[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423397] ? item.obji12[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423398] ? item.obji12[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423399] ? item.obji12[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423404] ? item.obji12[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423405] ? item.obji12[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423406] ? item.obji12[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423411] ? item.obji12[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423412] ? item.obji12[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423413] ? item.obji12[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423418] ? item.obji12[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423419] ? item.obji12[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423420] ? item.obji12[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423425] ? item.obji12[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423426] ? item.obji12[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423427] ? item.obji12[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji12[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji12[423432] ? item.obji12[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423433] ? item.obji12[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji12[423434] ? item.obji12[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji12[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji12[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d13']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji13[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji13[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji13[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji13[423258] ? item.obji13[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji13[423263] ? item.obji13[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji13[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji13[423265] ? item.obji13[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji13[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji13[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji13[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji13[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji13[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji13[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji13[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji13[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji13[423278] ? item.obji13[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji13[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji13[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji13[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji13[423290] ? item.obji13[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423292] ? item.obji13[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423293] ? item.obji13[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423294] ? item.obji13[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423299] ? item.obji13[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423300] ? item.obji13[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423301] ? item.obji13[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423306] ? item.obji13[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423307] ? item.obji13[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423308] ? item.obji13[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423313] ? item.obji13[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423314] ? item.obji13[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423315] ? item.obji13[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423320] ? item.obji13[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423321] ? item.obji13[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423322] ? item.obji13[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423327] ? item.obji13[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423328] ? item.obji13[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423329] ? item.obji13[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423334] ? item.obji13[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423335] ? item.obji13[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423336] ? item.obji13[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423341] ? item.obji13[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423342] ? item.obji13[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423343] ? item.obji13[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423348] ? item.obji13[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423349] ? item.obji13[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423350] ? item.obji13[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423355] ? item.obji13[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423356] ? item.obji13[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423357] ? item.obji13[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423362] ? item.obji13[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423363] ? item.obji13[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423364] ? item.obji13[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423369] ? item.obji13[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423370] ? item.obji13[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423371] ? item.obji13[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423376] ? item.obji13[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423377] ? item.obji13[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423378] ? item.obji13[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423383] ? item.obji13[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423384] ? item.obji13[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423385] ? item.obji13[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423390] ? item.obji13[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423391] ? item.obji13[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423392] ? item.obji13[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423397] ? item.obji13[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423398] ? item.obji13[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423399] ? item.obji13[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423404] ? item.obji13[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423405] ? item.obji13[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423406] ? item.obji13[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423411] ? item.obji13[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423412] ? item.obji13[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423413] ? item.obji13[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423418] ? item.obji13[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423419] ? item.obji13[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423420] ? item.obji13[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423425] ? item.obji13[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423426] ? item.obji13[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423427] ? item.obji13[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji13[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji13[423432] ? item.obji13[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423433] ? item.obji13[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji13[423434] ? item.obji13[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji13[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji13[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d14']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji14[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji14[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji14[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji14[423258] ? item.obji14[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji14[423263] ? item.obji14[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji14[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji14[423265] ? item.obji14[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji14[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji14[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji14[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji14[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji14[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji14[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji14[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji14[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji14[423278] ? item.obji14[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji14[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji14[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji14[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji14[423290] ? item.obji14[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423292] ? item.obji14[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423293] ? item.obji14[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423294] ? item.obji14[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423299] ? item.obji14[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423300] ? item.obji14[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423301] ? item.obji14[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423306] ? item.obji14[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423307] ? item.obji14[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423308] ? item.obji14[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423313] ? item.obji14[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423314] ? item.obji14[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423315] ? item.obji14[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423320] ? item.obji14[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423321] ? item.obji14[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423322] ? item.obji14[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423327] ? item.obji14[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423328] ? item.obji14[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423329] ? item.obji14[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423334] ? item.obji14[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423335] ? item.obji14[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423336] ? item.obji14[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423341] ? item.obji14[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423342] ? item.obji14[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423343] ? item.obji14[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423348] ? item.obji14[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423349] ? item.obji14[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423350] ? item.obji14[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423355] ? item.obji14[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423356] ? item.obji14[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423357] ? item.obji14[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423362] ? item.obji14[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423363] ? item.obji14[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423364] ? item.obji14[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423369] ? item.obji14[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423370] ? item.obji14[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423371] ? item.obji14[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423376] ? item.obji14[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423377] ? item.obji14[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423378] ? item.obji14[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423383] ? item.obji14[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423384] ? item.obji14[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423385] ? item.obji14[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423390] ? item.obji14[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423391] ? item.obji14[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423392] ? item.obji14[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423397] ? item.obji14[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423398] ? item.obji14[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423399] ? item.obji14[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423404] ? item.obji14[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423405] ? item.obji14[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423406] ? item.obji14[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423411] ? item.obji14[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423412] ? item.obji14[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423413] ? item.obji14[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423418] ? item.obji14[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423419] ? item.obji14[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423420] ? item.obji14[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423425] ? item.obji14[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423426] ? item.obji14[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423427] ? item.obji14[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji14[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji14[423432] ? item.obji14[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423433] ? item.obji14[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji14[423434] ? item.obji14[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji14[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji14[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d15']))
        <div class="batas">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td rowspan="4" colspan="17" style="text-align:center;">
                        <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                        JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                        TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">({{ $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }})</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">29</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">PEMBERIAN EDUKASI PASIEN</th>
                </tr>
                <tr>
                    <td class="noborder" colspan="37"></td>
                    <td class="text-center" colspan="12"><strong>MATERI EDUKASI</strong></td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Baca dan tulis</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423250] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kurang</td>
                    <td class="noborder" colspan="18"></td>
                    <td class="noborder blf br" colspan="12">@{{ item.obji15[423282] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan Obat-obatan</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Pendidikan pasien</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423253] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SD</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423254] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTP</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLTA</td>
                    <td class="noborder" colspan="4">@{{ item.obji15[423256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} S-1</td>
                    <td class="noborder" colspan="10">@{{ item.obji15[423257] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji15[423258] ? item.obji15[423258] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penggunaan peralatan medis</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="9">Bahasa</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423260] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Indonesia</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423261] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inggris</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Daerah :  @{{ item.obji15[423263] ? item.obji15[423263] : '' }}</td>
                    <td class="noborder" colspan="8">@{{ item.obji15[423264] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji15[423265] ? item.obji15[423265] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423284] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensi interaksi antar obat</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Hambatan Emosional dan Motivasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bahasa</td>
                    <td class="noborder" colspan="11">@{{ item.obji15[423269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kognitif Terbatas</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Diet dan nutrisi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="8">[&nbsp;&nbsp;&nbsp;] Motivasi Kurang</td>
                    <td class="noborder" colspan="7">@{{ item.obji15[423270] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emosional</td>
                    <td class="noborder" colspan="8"></td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423286] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Manajemen nyeri</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12">Keterbatasan Fisik dan Kognetif</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji15[423272] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak ada</td>
                    <td class="noborder" colspan="9">@{{ item.obji15[423273] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Penglihatan terganggu</td>
                    <td class="noborder" colspan="9">@{{ item.obji15[423274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pendengaran terganggu</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Teknik rehabilitasi</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="12"></td>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="7">@{{ item.obji15[423275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan bicara</td>
                    <td class="noborder" colspan="6">@{{ item.obji15[423276] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fisik lemah</td>
                    <td class="noborder" colspan="10">@{{ item.obji15[423277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji15[423278] ? item.obji15[423278] : '' }}</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423288] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cuci tangan yang benar</td>
                </tr>
                <tr>
                    <td class="noborder"></td>
                    <td class="noborder" colspan="14">Kesediaan untuk Menerima Informasi</td>
                    <td class="noborder">:</td>
                    <td class="noborder" colspan="5">@{{ item.obji15[423280] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                    <td class="noborder" colspan="16">@{{ item.obji15[423281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                    <td class="noborder br blf" colspan="12">@{{ item.obji15[423289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain : @{{ item.obji15[423290] ? item.obji15[423290] : '' }}</td>
                </tr>
                <tr style="height: 40pt;" class="text-center bg-dark">
                    <td colspan="49">PEMBERIAN EDUKASI PASIEN</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="2" colspan="7">TGL/JAM</td>
                    <td rowspan="2" colspan="15">MATERI EDUKASI</td>
                    <td rowspan="" colspan="14">TANDA TANGAN DAN NAMA JELAS</td>
                    <td colspan="8">METODE EDUKASI</td>
                    <td rowspan="2" colspan="5">TGL RE-EDUKASI</td>
                </tr>
                <tr class="text-center">
                    <td colspan="7">PASIEN/ KELUARGA</td>
                    <td colspan="7">EDUKATOR</td>
                    <td colspan="4">Mengerti</td>
                    <td colspan="4">Tidak Mengerti</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423291] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423292] ? item.obji15[423292] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423293] ? item.obji15[423293] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423294] ? item.obji15[423294] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423296] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423297] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423298] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423299] ? item.obji15[423299] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423300] ? item.obji15[423300] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423301] ? item.obji15[423301] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423302] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423303] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423304] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423305] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423306] ? item.obji15[423306] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423307] ? item.obji15[423307] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423308] ? item.obji15[423308] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423309] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423310] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423311] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423312] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423313] ? item.obji15[423313] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423314] ? item.obji15[423314] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423315] ? item.obji15[423315] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423316] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423317] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423318] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423319] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423320] ? item.obji15[423320] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423321] ? item.obji15[423321] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423322] ? item.obji15[423322] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423323] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423324] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423325] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423326] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423327] ? item.obji15[423327] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423328] ? item.obji15[423328] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423329] ? item.obji15[423329] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423330] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423331] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423332] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423333] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423334] ? item.obji15[423334] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423335] ? item.obji15[423335] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423336] ? item.obji15[423336] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423337] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423338] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423339] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423340] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423341] ? item.obji15[423341] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423342] ? item.obji15[423342] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423343] ? item.obji15[423343] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423344] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423345] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423346] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423347] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423348] ? item.obji15[423348] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423349] ? item.obji15[423349] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423350] ? item.obji15[423350] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423351] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423352] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423353] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423354] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423355] ? item.obji15[423355] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423356] ? item.obji15[423356] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423357] ? item.obji15[423357] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423360] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423361] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423362] ? item.obji15[423362] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423363] ? item.obji15[423363] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423364] ? item.obji15[423364] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423367] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423368] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423369] ? item.obji15[423369] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423370] ? item.obji15[423370] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423371] ? item.obji15[423371] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423372] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423374] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423375] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423376] ? item.obji15[423376] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423377] ? item.obji15[423377] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423378] ? item.obji15[423378] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423379] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423380] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423381] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423382] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423383] ? item.obji15[423383] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423384] ? item.obji15[423384] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423385] ? item.obji15[423385] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423386] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423387] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423388] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423389] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423390] ? item.obji15[423390] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423391] ? item.obji15[423391] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423392] ? item.obji15[423392] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423393] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423394] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423395] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423396] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423397] ? item.obji15[423397] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423398] ? item.obji15[423398] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423399] ? item.obji15[423399] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423400] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423401] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423402] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423403] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423404] ? item.obji15[423404] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423405] ? item.obji15[423405] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423406] ? item.obji15[423406] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423407] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423408] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423409] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423410] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423411] ? item.obji15[423411] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423412] ? item.obji15[423412] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423413] ? item.obji15[423413] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423414] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423415] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423416] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423417] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423418] ? item.obji15[423418] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423419] ? item.obji15[423419] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423420] ? item.obji15[423420] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423421] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423422] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423423] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423424] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423425] ? item.obji15[423425] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423426] ? item.obji15[423426] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423427] ? item.obji15[423427] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423428] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423429] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423430] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
                <tr class="text-center">
                    <td rowspan="" colspan="7">@{{item.obji15[423431] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td rowspan="" colspan="15">@{{ item.obji15[423432] ? item.obji15[423432] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423433] ? item.obji15[423433] : '' }}</td>
                    <td rowspan="" colspan="7">@{{ item.obji15[423434] ? item.obji15[423434] : '' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423435] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="4">@{{ item.obji15[423436] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}</td>
                    <td rowspan="" colspan="5">@{{item.obji15[423437] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                </tr>
            </table>
        </div>
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

    angular.controller('cetakPemberianEdukasiPasien', function ($scope, $http, httpService) {
        $scope.item = {
            obj2: [],
            obj: [],
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

        if(dataLoad.length > 0){
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
                    $scope.item.obji12[dataLoad[i].emrdfk] = true
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
        }

        if(dataLoad2.length > 0){
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
        }

        if(dataLoad3.length > 0){
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
        }

        if(dataLoad4.length > 0){
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
        }

        if(dataLoad5.length > 0){
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
        }

        if(dataLoad6.length > 0){
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
        }

        if(dataLoad7.length > 0){
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
        }

        if(dataLoad8.length > 0){
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
        }

        if(dataLoad9.length > 0){
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
        }

        if(dataLoad10.length > 0){
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
        }

        if(dataLoad11.length > 0){
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
        }

        if(dataLoad12.length > 0){
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
        }

        if(dataLoad13.length > 0){
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
        }

        if(dataLoad14.length > 0){
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
        }

        if(dataLoad15.length > 0){
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
        }

        if(dataLoad16.length > 0){
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
        }

        if(dataLoad17.length > 0){
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
        }

        if(dataLoad18.length > 0){
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
        }

        if(dataLoad19.length > 0){
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
        }

        if(dataLoad20.length > 0){
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
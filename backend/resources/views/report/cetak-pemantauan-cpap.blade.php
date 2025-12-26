<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan CPAP Dst</title>
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
        {{-- <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}"> --}}
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
			padding:.2rem;
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
            font-size: 11px;
        }
        table tr{
            height:14.5pt
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
    </style>
</head>
<body ng-controller="cetakPemantauanCPAP">
    <table width='100%'>
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @endif
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb" style="text-align: center;font-size:12pt">
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder" >No. RM </td>
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
            <td colspan="2" class="noborder">{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">66</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d1'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PEMANTAUAN CPAP DST</th>
        </tr>
		<tr class="noborder">
			<td class="noborder" colspan="3">Tanggal</td>
			<td class="noborder" colspan="16">: @{{item.obj[32103842] | toDate | date:'dd MMMM yyyy'}}</td>
			<td class="noborder" colspan="2">Pukul</td>
			<td class="noborder" colspan="16">: @{{item.obj[32103842] | toDate | date:'HH:mm'}}</td>
		</tr>
		<tr>
			<td colspan="49">
				<section class="p3">
					<table width="100%" class="noborder">
						<tr  class="noborder">
							<td colspan="49" class="noborder"><strong><u>Indikasi</u></strong></td>
						</tr>
						<tr class="noborder">
							<td colspan="28" class="noborder">Gangguan Pernapasan (semua usia) </td>
							<td colspan="21" rowspan="15" class="noborder">
								@if(stripos(\Request::url(), 'localhost') !== FALSE)
                                    <img src="{{ asset('img/CPAP.jpg') }}" alt="" style="width: 300px;display:block; margin:auto;">
                                @else
                                    <img src="{{ asset('service/img/CPAP.jpg') }}" alt="" style="width: 300px;display:block; margin:auto;">
                                @endif
							</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103843] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Merintih</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103844] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Retraksi parah</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103845] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} RR > 80, RR @{{ item.obj[32103846] ? item.obj[32103846] : '____' }} /menit</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103847] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} O<sub>2</sub> < 85% (kalau < 1500g) ATAU < 90% (kalau > 1500g)</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi @{{ item.obj[32103848] ? item.obj[32103848] : '____' }} %</td>
						</tr>
						<tr>
							<td colspan="28" class="noborder"></td>
						</tr>
						<tr>
							<td class="noborder" colspan="28">Bayi < usia kehamilan 30 minggu atau 1500 grams</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103849] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Usia kehamilan @{{ item.obj[32103850] ? item.obj[32103850] : '____' }} minggu</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103851] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Berat badan @{{ item.obj[32103852] ? item.obj[32103852] : '____' }} gram</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103853] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}       Laju napas @{{ item.obj[32103854] ? item.obj[32103854] : '____' }} /menit</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saturasi O2 @{{ item.obj[32103855] ? item.obj[32103855] : '____' }} %</td>
						</tr>
						<tr><td colspan="28" class="noborder"></td></tr>
						<tr>
							<td colspan="28" class="noborder"><strong><u>Perlengkapan CPAP</u></strong></td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103856] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}       "Hudson prongs" yang tepat untuk lubang hidung</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103857] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ukuran 1 : 750-1250g	@{{ item.obj[32103858] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ukuran 2 : 1250-2000g	@{{ item.obj[32103859] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ukuran 3 : 2000-3000g</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103860] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}       Topi yang tepat</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103861] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Peniti, karet, atau selotip untuk memasang selang ke topi</td>
						</tr>
						<tr><td colspan="28" class="noborder"></td></tr>
						<tr>
							<td colspan="28" class="noborder"><strong><u>Pengaturan CPAP</u></strong></td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103862] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}      Air dipenuhi sampai tingkat 6-8 cm. @{{ item.obj[32103863] ? item.obj[32103863] : '____' }} cm</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103864] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}      Oksigen dipasang kalau saturasi O2 tidak tercapai dengan udara ruangan</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103865] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}      Mesin dinyalakan</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103866] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Meteran “blended” diatur antara 5-10 liter (biasanya mulai dari 6 liter) @{{ item.obj[32103867] ? item.obj[32103867] : '____' }} liter</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103868] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}      Meteran “oxygen” diatur ke @{{ item.obj[32103869] ? item.obj[32103869] : '____' }} % O2 = @{{ item.obj[32103871] ? item.obj[32103871] : '____' }} L/menit. Lihat tabel di bawah</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">Aliran Total</td>
							<td colspan="7">5 L/mnt</td>
							<td colspan="7">6 L/mnt</td>
							<td colspan="7">7 L/mnt</td>
							<td colspan="7">8 L/mnt</td>
							<td colspan="7">9 L/mnt</td>
							<td colspan="7">10 L/mnt</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.4 O2</td>
							<td colspan="7">1.5 L O2</td>
							<td colspan="7">1.5 L O2</td>
							<td colspan="7">2 L O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">3 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.4 O2</td>
							<td colspan="7">1.5 L O2</td>
							<td colspan="7">1.5 L O2</td>
							<td colspan="7">2 L O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">3 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.5 O2</td>
							<td colspan="7">2 L O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">3 L O2</td>
							<td colspan="7">3.5 L O2</td>
							<td colspan="7">3.5 L O2</td>
							<td colspan="7">4.5 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.6 O2</td>
							<td colspan="7">2.5 L O2</td>
							<td colspan="7">3 L O2</td>
							<td colspan="7">4 L O2</td>
							<td colspan="7">4.5 L O2</td>
							<td colspan="7">5 L O2</td>
							<td colspan="7">5.5 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.7 O2</td>
							<td colspan="7">3 L O2</td>
							<td colspan="7">3.5 L O2</td>
							<td colspan="7">5 L O2</td>
							<td colspan="7">5.5 L O2</td>
							<td colspan="7">6 L O2</td>
							<td colspan="7">6.5 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.8 O2</td>
							<td colspan="7">3.5 L O2</td>
							<td colspan="7">4 L O2</td>
							<td colspan="7">6 L O2</td>
							<td colspan="7">6.5 L O2</td>
							<td colspan="7">7 L O2</td>
							<td colspan="7">7.5 L O2</td>
						</tr>
						<tr class="text-center">
							<td colspan="7">0.9 O2</td>
							<td colspan="7">4 L O2</td>
							<td colspan="7">4.5 L O2</td>
							<td colspan="7">7 L O2</td>
							<td colspan="7">7.5 L O2</td>
							<td colspan="7">7.5 L O2</td>
							<td colspan="7">8.5 L O2</td>
						</tr>
						<tr>
							<td colspan="49" class="noborder"></td>
						</tr>
						<tr>
							<td class="noborder" colspan="28"><strong><u>Pemasangan CPAP</u></strong> (Lihat gambar I)</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103872] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Posisikan bayi dengan kepala diangkat 30 derajat</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103873] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Taruh gulungan kain di bawah bahu untuk mempertahankan bayi ke “sniffing position”</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103874] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersihkan lubang hidung dan mulut dari lendir</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103875] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Basahi prongs dengan air bersih atau sterile normal saline</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103876] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Taruh prongs melengkung ke bawah. Pastikan ada 2 mm antara selang dan wajah</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103877] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pastikan prongs mengikuti lengkung lubang hidung dan tidak menyentuh dinding hidung</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103878] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kencangkan selang kalau posisi prongs dan selang sudah baik (ada gelembung di dalam air)</td>
						</tr>
						<tr class="noborder">
							<td class="noborder" colspan="28">@{{ item.obj[32103879] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Berikan “pacifier” supaya mulut tetap tertutup</td>
						</tr>
						<tr>
							<td colspan="28" class="noborder"></td>
						</tr>
						<tr>
							<td colspan="28" class="noborder"></td>
						</tr>
					</table>
				</section>
			</td>
		</tr>
        <tr>
            <td colspan="28" class="noborder"><strong><u>Hasil</u></strong></td>
        </tr>
        <tr class="noborder">
            <td class="noborder" colspan="7">@{{ item.obj[32103880] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} RR @{{ item.obj[32103881] ? item.obj[32103881] : '____' }} /menit</td>
            <td class="noborder" colspan="10">@{{ item.obj[32103882] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Saturasi O2 @{{ item.obj[32103883] ? item.obj[32103883] : '____' }} %</td>
            <td class="noborder" colspan="7">@{{ item.obj[32103884] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pasien tenang</td>
            <td class="noborder" colspan="8">@{{ item.obj[32103885] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan napas turun</td>
        </tr>
		<!-- lembar ke dua  -->
		<tr style="border-top:1px solid #000">
			<td colspan="49" class="noborder">
				Nama Pasien : {!!  $res['d1'][0]->namapasien  !!}
			</td>
		</tr>
		<tr>
			<td colspan="12" class="noborder">
				Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
			</td>
			<td colspan="37" class="noborder">
				BB @{{ item.obj[32103888] ? item.obj[32103888] : '____' }} kg
			</td>
		</tr>
		<tr>
			<td colspan="10" style="text-align: center"><b>Tanggal dan Waktu</b></td>
			<td colspan="39" style="text-align: center"><b>Keterangan</b></td>
		</tr>
		<tr>
			<td colspan="10">@{{item.obj[32103889] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103890] ? item.obj[32103890] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103891] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103892] ? item.obj[32103892] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103893] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103894] ? item.obj[32103894] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103895] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103896] ? item.obj[32103896] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103897] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103898] ? item.obj[32103898] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103899] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103900] ? item.obj[32103900] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103901] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103902] ? item.obj[32103902] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103903] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103904] ? item.obj[32103904] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103905] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103906] ? item.obj[32103906] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103907] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103908] ? item.obj[32103908] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103909] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103910] ? item.obj[32103910] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103911] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103912] ? item.obj[32103912] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103913] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103914] ? item.obj[32103914] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103915] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103916] ? item.obj[32103916] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103917] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103918] ? item.obj[32103918] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103919] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103920] ? item.obj[32103920] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103921] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103922] ? item.obj[32103922] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103923] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103924] ? item.obj[32103924] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103925] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103926] ? item.obj[32103926] : '' }}</td>
		</tr>
        <tr>
			<td colspan="10">@{{item.obj[32103927] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="39">@{{ item.obj[32103928] ? item.obj[32103928] : '' }}</td>
		</tr>
    </table>
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

    angular.controller('cetakPemantauanCPAP', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: [],
            objImg: [],
        }
        var dataLoad = {!! json_encode($res['d1'] )!!};
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
        console.log($scope.item.objImg[31101098]);
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
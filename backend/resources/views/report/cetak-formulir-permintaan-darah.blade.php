<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            border:.1rem solid rgba(0,0,0,0.35);
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
            padding:.7rem;
        }
        /* img{
            width:100%;
            height:100%;
            object-fit:cover;
        } */
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
    </style>
</head>
<body ng-controller="cetakFormulirPermintaanDarah">
    @if (!empty($res['d1']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obj[31101248] ? item.obj[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obj[31101249] ? item.obj[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obj[31101250] ? item.obj[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obj[31101251] ? item.obj[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obj[31101252] ? item.obj[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obj[31101253] ? item.obj[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obj[31101254] ? item.obj[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obj[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obj[31101256] ? item.obj[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obj[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obj[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obj[31101259] ? item.obj[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obj[31101260] ? item.obj[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obj[31101261] ? item.obj[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obj[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obj[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obj[31101264] ? item.obj[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obj[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obj[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obj[31101267] ? item.obj[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obj[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obj[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obj[31101270] ? item.obj[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obj[31101271] ? item.obj[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obj[31101272] ? item.obj[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obj[31101273] ? item.obj[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obj[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obj[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="object-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obj[31101276] ? item.obj[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obj[31101278] ? item.obj[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obj[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obj[31101280] ? item.obj[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obj[31101282] ? item.obj[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obj[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obj[31101284] ? item.obj[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obj[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obj[31101286] ? item.obj[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obj[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obj[31101288] ? item.obj[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obj[31101290] ? item.obj[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obj[31101292] ? item.obj[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obj[31101294] ? item.obj[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obj[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obj[31101296] ? item.obj[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep1" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp1" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obj[31101297] ? item.obj[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obj[31101298] ? item.obj[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obj[31101299] ? item.obj[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obj[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obj[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obj[31101301] ? item.obj[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obj[31101302] ? item.obj[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obj[31101303] ? item.obj[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obj[31101304] ? item.obj[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obj[31101305] ? item.obj[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obj[31101306] ? item.obj[31101306] : '' }}</td>
							<td class="bordered">@{{item.obj[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obj[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obj[31101308] ? item.obj[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obj[31101309] ? item.obj[31101309] : '' }}</td>
							<td class="bordered">@{{item.obj[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obj[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obj[31101311] ? item.obj[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obj[31101312] ? item.obj[31101312] : '' }}</td>
							<td class="bordered">@{{item.obj[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obj[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obj[31101314] ? item.obj[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101315] ? item.obj[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101316] ? item.obj[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obj[31101317] ? item.obj[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101318] ? item.obj[31101318] : '' }}</td>
					<td class="bordered">@{{item.obj[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101320] ? item.obj[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101321] ? item.obj[31101321] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101322] ? item.obj[31101322] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obj[31101323] ? item.obj[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101324] ? item.obj[31101324] : '' }}</td>
					<td class="bordered">@{{item.obj[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101326] ? item.obj[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obj[31101327] ? item.obj[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101328] ? item.obj[31101328] : '' }}</td>
					<td class="bordered">@{{item.obj[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101329] ? item.obj[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obj[31101330] ? item.obj[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101331] ? item.obj[31101331] : '' }}</td>
					<td class="bordered">@{{item.obj[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101332] ? item.obj[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obj[31101333] ? item.obj[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101334] ? item.obj[31101334] : '' }}</td>
					<td class="bordered">@{{item.obj[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101335] ? item.obj[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obj[31101336] ? item.obj[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101337] ? item.obj[31101337] : '' }}</td>
					<td class="bordered">@{{item.obj[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101339] ? item.obj[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101340] ? item.obj[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101341] ? item.obj[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obj[31101342] ? item.obj[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101343] ? item.obj[31101343] : '' }}</td>
					<td class="bordered">@{{item.obj[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101344] ? item.obj[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obj[31101345] ? item.obj[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101346] ? item.obj[31101346] : '' }}</td>
					<td class="bordered">@{{item.obj[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101347] ? item.obj[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obj[31101348] ? item.obj[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101349] ? item.obj[31101349] : '' }}</td>
					<td class="bordered">@{{item.obj[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101350] ? item.obj[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obj[31101351] ? item.obj[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101352] ? item.obj[31101352] : '' }}</td>
					<td class="bordered">@{{item.obj[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101353] ? item.obj[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obj[31101354] ? item.obj[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101355] ? item.obj[31101355] : '' }}</td>
					<td class="bordered">@{{item.obj[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101357] ? item.obj[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101358] ? item.obj[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obj[31101359] ? item.obj[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obj[31101360] ? item.obj[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101361] ? item.obj[31101361] : '' }}</td>
					<td class="bordered">@{{item.obj[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101363] ? item.obj[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obj[31101364] ? item.obj[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101365] ? item.obj[31101365] : '' }}</td>
					<td class="bordered">@{{item.obj[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101367] ? item.obj[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obj[31101368] ? item.obj[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101369] ? item.obj[31101369] : '' }}</td>
					<td class="bordered">@{{item.obj[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101371] ? item.obj[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obj[31101372] ? item.obj[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obj[31101373] ? item.obj[31101373] : '' }}</td>
					<td class="bordered">@{{item.obj[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obj[31101375] ? item.obj[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d2']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji2[31101248] ? item.obji2[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji2[31101249] ? item.obji2[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji2[31101250] ? item.obji2[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji2[31101251] ? item.obji2[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji2[31101252] ? item.obji2[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji2[31101253] ? item.obji2[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji2[31101254] ? item.obji2[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji2[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji2[31101256] ? item.obji2[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji2[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji2[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji2[31101259] ? item.obji2[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji2[31101260] ? item.obji2[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji2[31101261] ? item.obji2[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji2[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji2[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji2[31101264] ? item.obji2[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji2[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji2[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji2[31101267] ? item.obji2[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji2[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji2[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji2[31101270] ? item.obji2[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji2[31101271] ? item.obji2[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji2[31101272] ? item.obji2[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji2[31101273] ? item.obji2[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji2[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji2[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji2ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji2[31101276] ? item.obji2[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji2[31101278] ? item.obji2[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji2[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji2[31101280] ? item.obji2[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji2[31101282] ? item.obji2[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji2[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji2[31101284] ? item.obji2[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji2[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji2[31101286] ? item.obji2[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji2[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji2[31101288] ? item.obji2[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji2[31101290] ? item.obji2[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji2[31101292] ? item.obji2[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji2[31101294] ? item.obji2[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji2[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji2[31101296] ? item.obji2[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep2" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp2" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji2[31101297] ? item.obji2[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji2[31101298] ? item.obji2[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji2[31101299] ? item.obji2[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji2[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji2[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji2[31101301] ? item.obji2[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji2[31101302] ? item.obji2[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji2[31101303] ? item.obji2[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji2[31101304] ? item.obji2[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji2[31101305] ? item.obji2[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji2[31101306] ? item.obji2[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji2[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji2[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji2[31101308] ? item.obji2[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji2[31101309] ? item.obji2[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji2[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji2[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji2[31101311] ? item.obji2[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji2[31101312] ? item.obji2[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji2[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji2[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji2[31101314] ? item.obji2[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101315] ? item.obji2[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101316] ? item.obji2[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji2[31101317] ? item.obji2[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101318] ? item.obji2[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101320] ? item.obji2[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101321] ? item.obji2[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji2[31101323] ? item.obji2[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101324] ? item.obji2[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101326] ? item.obji2[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji2[31101327] ? item.obji2[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101328] ? item.obji2[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101329] ? item.obji2[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji2[31101330] ? item.obji2[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101331] ? item.obji2[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101332] ? item.obji2[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji2[31101333] ? item.obji2[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101334] ? item.obji2[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101335] ? item.obji2[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji2[31101336] ? item.obji2[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101337] ? item.obji2[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101339] ? item.obji2[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101340] ? item.obji2[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101341] ? item.obji2[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji2[31101342] ? item.obji2[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101343] ? item.obji2[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101344] ? item.obji2[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji2[31101345] ? item.obji2[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101346] ? item.obji2[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101347] ? item.obji2[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji2[31101348] ? item.obji2[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101349] ? item.obji2[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101350] ? item.obji2[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji2[31101351] ? item.obji2[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101352] ? item.obji2[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji2[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101353] ? item.obji2[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji2[31101354] ? item.obji2[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101355] ? item.obji2[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101357] ? item.obji2[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101358] ? item.obji2[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji2[31101359] ? item.obji2[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji2[31101360] ? item.obji2[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101361] ? item.obji2[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101363] ? item.obji2[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji2[31101364] ? item.obji2[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101365] ? item.obji2[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101367] ? item.obji2[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji2[31101368] ? item.obji2[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101369] ? item.obji2[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101371] ? item.obji2[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji2[31101372] ? item.obji2[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji2[31101373] ? item.obji2[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji2[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji2[31101375] ? item.obji2[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d3']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji3[31101248] ? item.obji3[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji3[31101249] ? item.obji3[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji3[31101250] ? item.obji3[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji3[31101251] ? item.obji3[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji3[31101252] ? item.obji3[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji3[31101253] ? item.obji3[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji3[31101254] ? item.obji3[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji3[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji3[31101256] ? item.obji3[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji3[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji3[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji3[31101259] ? item.obji3[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji3[31101260] ? item.obji3[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji3[31101261] ? item.obji3[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji3[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji3[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji3[31101264] ? item.obji3[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji3[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji3[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji3[31101267] ? item.obji3[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji3[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji3[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji3[31101270] ? item.obji3[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji3[31101271] ? item.obji3[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji3[31101272] ? item.obji3[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji3[31101273] ? item.obji3[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji3[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji3[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji3ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji3[31101276] ? item.obji3[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji3[31101278] ? item.obji3[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji3[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji3[31101280] ? item.obji3[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji3[31101282] ? item.obji3[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji3[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji3[31101284] ? item.obji3[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji3[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji3[31101286] ? item.obji3[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji3[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji3[31101288] ? item.obji3[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji3[31101290] ? item.obji3[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji3[31101292] ? item.obji3[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji3[31101294] ? item.obji3[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji3[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji3[31101296] ? item.obji3[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep3" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp3" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji3[31101297] ? item.obji3[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji3[31101298] ? item.obji3[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji3[31101299] ? item.obji3[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji3[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji3[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji3[31101301] ? item.obji3[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji3[31101302] ? item.obji3[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji3[31101303] ? item.obji3[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji3[31101304] ? item.obji3[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji3[31101305] ? item.obji3[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji3[31101306] ? item.obji3[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji3[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji3[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji3[31101308] ? item.obji3[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji3[31101309] ? item.obji3[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji3[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji3[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji3[31101311] ? item.obji3[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji3[31101312] ? item.obji3[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji3[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji3[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji3[31101314] ? item.obji3[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101315] ? item.obji3[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101316] ? item.obji3[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji3[31101317] ? item.obji3[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101318] ? item.obji3[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101320] ? item.obji3[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101321] ? item.obji3[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji3[31101323] ? item.obji3[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101324] ? item.obji3[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101326] ? item.obji3[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji3[31101327] ? item.obji3[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101328] ? item.obji3[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101329] ? item.obji3[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji3[31101330] ? item.obji3[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101331] ? item.obji3[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101332] ? item.obji3[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji3[31101333] ? item.obji3[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101334] ? item.obji3[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101335] ? item.obji3[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji3[31101336] ? item.obji3[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101337] ? item.obji3[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101339] ? item.obji3[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101340] ? item.obji3[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101341] ? item.obji3[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji3[31101342] ? item.obji3[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101343] ? item.obji3[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101344] ? item.obji3[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji3[31101345] ? item.obji3[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101346] ? item.obji3[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101347] ? item.obji3[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji3[31101348] ? item.obji3[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101349] ? item.obji3[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101350] ? item.obji3[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji3[31101351] ? item.obji3[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101352] ? item.obji3[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji3[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101353] ? item.obji3[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji3[31101354] ? item.obji3[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101355] ? item.obji3[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101357] ? item.obji3[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101358] ? item.obji3[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji3[31101359] ? item.obji3[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji3[31101360] ? item.obji3[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101361] ? item.obji3[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101363] ? item.obji3[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji3[31101364] ? item.obji3[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101365] ? item.obji3[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101367] ? item.obji3[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji3[31101368] ? item.obji3[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101369] ? item.obji3[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101371] ? item.obji3[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji3[31101372] ? item.obji3[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji3[31101373] ? item.obji3[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji3[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji3[31101375] ? item.obji3[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d4']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji4[31101248] ? item.obji4[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji4[31101249] ? item.obji4[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji4[31101250] ? item.obji4[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji4[31101251] ? item.obji4[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji4[31101252] ? item.obji4[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji4[31101253] ? item.obji4[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji4[31101254] ? item.obji4[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji4[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji4[31101256] ? item.obji4[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji4[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji4[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji4[31101259] ? item.obji4[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji4[31101260] ? item.obji4[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji4[31101261] ? item.obji4[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji4[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji4[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji4[31101264] ? item.obji4[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji4[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji4[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji4[31101267] ? item.obji4[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji4[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji4[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji4[31101270] ? item.obji4[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji4[31101271] ? item.obji4[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji4[31101272] ? item.obji4[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji4[31101273] ? item.obji4[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji4[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji4[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji4ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji4[31101276] ? item.obji4[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji4[31101278] ? item.obji4[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji4[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji4[31101280] ? item.obji4[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji4[31101282] ? item.obji4[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji4[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji4[31101284] ? item.obji4[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji4[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji4[31101286] ? item.obji4[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji4[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji4[31101288] ? item.obji4[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji4[31101290] ? item.obji4[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji4[31101292] ? item.obji4[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji4[31101294] ? item.obji4[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji4[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji4[31101296] ? item.obji4[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep4" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp4" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji4[31101297] ? item.obji4[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji4[31101298] ? item.obji4[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji4[31101299] ? item.obji4[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji4[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji4[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji4[31101301] ? item.obji4[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji4[31101302] ? item.obji4[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji4[31101303] ? item.obji4[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji4[31101304] ? item.obji4[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji4[31101305] ? item.obji4[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji4[31101306] ? item.obji4[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji4[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji4[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji4[31101308] ? item.obji4[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji4[31101309] ? item.obji4[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji4[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji4[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji4[31101311] ? item.obji4[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji4[31101312] ? item.obji4[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji4[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji4[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji4[31101314] ? item.obji4[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101315] ? item.obji4[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101316] ? item.obji4[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji4[31101317] ? item.obji4[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101318] ? item.obji4[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101320] ? item.obji4[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101321] ? item.obji4[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji4[31101323] ? item.obji4[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101324] ? item.obji4[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101326] ? item.obji4[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji4[31101327] ? item.obji4[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101328] ? item.obji4[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101329] ? item.obji4[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji4[31101330] ? item.obji4[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101331] ? item.obji4[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101332] ? item.obji4[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji4[31101333] ? item.obji4[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101334] ? item.obji4[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101335] ? item.obji4[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji4[31101336] ? item.obji4[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101337] ? item.obji4[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101339] ? item.obji4[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101340] ? item.obji4[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101341] ? item.obji4[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji4[31101342] ? item.obji4[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101343] ? item.obji4[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101344] ? item.obji4[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji4[31101345] ? item.obji4[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101346] ? item.obji4[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101347] ? item.obji4[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji4[31101348] ? item.obji4[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101349] ? item.obji4[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101350] ? item.obji4[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji4[31101351] ? item.obji4[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101352] ? item.obji4[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji4[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101353] ? item.obji4[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji4[31101354] ? item.obji4[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101355] ? item.obji4[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101357] ? item.obji4[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101358] ? item.obji4[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji4[31101359] ? item.obji4[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji4[31101360] ? item.obji4[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101361] ? item.obji4[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101363] ? item.obji4[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji4[31101364] ? item.obji4[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101365] ? item.obji4[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101367] ? item.obji4[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji4[31101368] ? item.obji4[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101369] ? item.obji4[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101371] ? item.obji4[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji4[31101372] ? item.obji4[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji4[31101373] ? item.obji4[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji4[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji4[31101375] ? item.obji4[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d5']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji5[31101248] ? item.obji5[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji5[31101249] ? item.obji5[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji5[31101250] ? item.obji5[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji5[31101251] ? item.obji5[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji5[31101252] ? item.obji5[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji5[31101253] ? item.obji5[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji5[31101254] ? item.obji5[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji5[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji5[31101256] ? item.obji5[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji5[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji5[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji5[31101259] ? item.obji5[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji5[31101260] ? item.obji5[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji5[31101261] ? item.obji5[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji5[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji5[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji5[31101264] ? item.obji5[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji5[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji5[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji5[31101267] ? item.obji5[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji5[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji5[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji5[31101270] ? item.obji5[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji5[31101271] ? item.obji5[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji5[31101272] ? item.obji5[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji5[31101273] ? item.obji5[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji5[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji5[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji5ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji5[31101276] ? item.obji5[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji5[31101278] ? item.obji5[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji5[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji5[31101280] ? item.obji5[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji5[31101282] ? item.obji5[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji5[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji5[31101284] ? item.obji5[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji5[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji5[31101286] ? item.obji5[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji5[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji5[31101288] ? item.obji5[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji5[31101290] ? item.obji5[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji5[31101292] ? item.obji5[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji5[31101294] ? item.obji5[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji5[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji5[31101296] ? item.obji5[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep5" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp5" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji5[31101297] ? item.obji5[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji5[31101298] ? item.obji5[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji5[31101299] ? item.obji5[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji5[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji5[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji5[31101301] ? item.obji5[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji5[31101302] ? item.obji5[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji5[31101303] ? item.obji5[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji5[31101304] ? item.obji5[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji5[31101305] ? item.obji5[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji5[31101306] ? item.obji5[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji5[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji5[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji5[31101308] ? item.obji5[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji5[31101309] ? item.obji5[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji5[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji5[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji5[31101311] ? item.obji5[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji5[31101312] ? item.obji5[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji5[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji5[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji5[31101314] ? item.obji5[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101315] ? item.obji5[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101316] ? item.obji5[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji5[31101317] ? item.obji5[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101318] ? item.obji5[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101320] ? item.obji5[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101321] ? item.obji5[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji5[31101323] ? item.obji5[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101324] ? item.obji5[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101326] ? item.obji5[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji5[31101327] ? item.obji5[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101328] ? item.obji5[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101329] ? item.obji5[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji5[31101330] ? item.obji5[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101331] ? item.obji5[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101332] ? item.obji5[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji5[31101333] ? item.obji5[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101334] ? item.obji5[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101335] ? item.obji5[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji5[31101336] ? item.obji5[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101337] ? item.obji5[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101339] ? item.obji5[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101340] ? item.obji5[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101341] ? item.obji5[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji5[31101342] ? item.obji5[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101343] ? item.obji5[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101344] ? item.obji5[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji5[31101345] ? item.obji5[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101346] ? item.obji5[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101347] ? item.obji5[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji5[31101348] ? item.obji5[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101349] ? item.obji5[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101350] ? item.obji5[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji5[31101351] ? item.obji5[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101352] ? item.obji5[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji5[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101353] ? item.obji5[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji5[31101354] ? item.obji5[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101355] ? item.obji5[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101357] ? item.obji5[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101358] ? item.obji5[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji5[31101359] ? item.obji5[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji5[31101360] ? item.obji5[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101361] ? item.obji5[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101363] ? item.obji5[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji5[31101364] ? item.obji5[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101365] ? item.obji5[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101367] ? item.obji5[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji5[31101368] ? item.obji5[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101369] ? item.obji5[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101371] ? item.obji5[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji5[31101372] ? item.obji5[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji5[31101373] ? item.obji5[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji5[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji5[31101375] ? item.obji5[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d6']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji6[31101248] ? item.obji6[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji6[31101249] ? item.obji6[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji6[31101250] ? item.obji6[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji6[31101251] ? item.obji6[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji6[31101252] ? item.obji6[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji6[31101253] ? item.obji6[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji6[31101254] ? item.obji6[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji6[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji6[31101256] ? item.obji6[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji6[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji6[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji6[31101259] ? item.obji6[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji6[31101260] ? item.obji6[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji6[31101261] ? item.obji6[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji6[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji6[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji6[31101264] ? item.obji6[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji6[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji6[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji6[31101267] ? item.obji6[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji6[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji6[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji6[31101270] ? item.obji6[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji6[31101271] ? item.obji6[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji6[31101272] ? item.obji6[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji6[31101273] ? item.obji6[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji6[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji6[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji6ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji6[31101276] ? item.obji6[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji6[31101278] ? item.obji6[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji6[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji6[31101280] ? item.obji6[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji6[31101282] ? item.obji6[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji6[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji6[31101284] ? item.obji6[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji6[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji6[31101286] ? item.obji6[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji6[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji6[31101288] ? item.obji6[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji6[31101290] ? item.obji6[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji6[31101292] ? item.obji6[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji6[31101294] ? item.obji6[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji6[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji6[31101296] ? item.obji6[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep6" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp6" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji6[31101297] ? item.obji6[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji6[31101298] ? item.obji6[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji6[31101299] ? item.obji6[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji6[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji6[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji6[31101301] ? item.obji6[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji6[31101302] ? item.obji6[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji6[31101303] ? item.obji6[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji6[31101304] ? item.obji6[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji6[31101305] ? item.obji6[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji6[31101306] ? item.obji6[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji6[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji6[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji6[31101308] ? item.obji6[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji6[31101309] ? item.obji6[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji6[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji6[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji6[31101311] ? item.obji6[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji6[31101312] ? item.obji6[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji6[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji6[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji6[31101314] ? item.obji6[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101315] ? item.obji6[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101316] ? item.obji6[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji6[31101317] ? item.obji6[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101318] ? item.obji6[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101320] ? item.obji6[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101321] ? item.obji6[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji6[31101323] ? item.obji6[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101324] ? item.obji6[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101326] ? item.obji6[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji6[31101327] ? item.obji6[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101328] ? item.obji6[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101329] ? item.obji6[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji6[31101330] ? item.obji6[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101331] ? item.obji6[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101332] ? item.obji6[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji6[31101333] ? item.obji6[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101334] ? item.obji6[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101335] ? item.obji6[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji6[31101336] ? item.obji6[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101337] ? item.obji6[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101339] ? item.obji6[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101340] ? item.obji6[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101341] ? item.obji6[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji6[31101342] ? item.obji6[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101343] ? item.obji6[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101344] ? item.obji6[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji6[31101345] ? item.obji6[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101346] ? item.obji6[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101347] ? item.obji6[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji6[31101348] ? item.obji6[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101349] ? item.obji6[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101350] ? item.obji6[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji6[31101351] ? item.obji6[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101352] ? item.obji6[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji6[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101353] ? item.obji6[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji6[31101354] ? item.obji6[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101355] ? item.obji6[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101357] ? item.obji6[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101358] ? item.obji6[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji6[31101359] ? item.obji6[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji6[31101360] ? item.obji6[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101361] ? item.obji6[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101363] ? item.obji6[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji6[31101364] ? item.obji6[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101365] ? item.obji6[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101367] ? item.obji6[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji6[31101368] ? item.obji6[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101369] ? item.obji6[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101371] ? item.obji6[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji6[31101372] ? item.obji6[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji6[31101373] ? item.obji6[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji6[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji6[31101375] ? item.obji6[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d7']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji7[31101248] ? item.obji7[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji7[31101249] ? item.obji7[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji7[31101250] ? item.obji7[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji7[31101251] ? item.obji7[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji7[31101252] ? item.obji7[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji7[31101253] ? item.obji7[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji7[31101254] ? item.obji7[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji7[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji7[31101256] ? item.obji7[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji7[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji7[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji7[31101259] ? item.obji7[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji7[31101260] ? item.obji7[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji7[31101261] ? item.obji7[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji7[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji7[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji7[31101264] ? item.obji7[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji7[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji7[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji7[31101267] ? item.obji7[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji7[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji7[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji7[31101270] ? item.obji7[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji7[31101271] ? item.obji7[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji7[31101272] ? item.obji7[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji7[31101273] ? item.obji7[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji7[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji7[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji7ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji7[31101276] ? item.obji7[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji7[31101278] ? item.obji7[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji7[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji7[31101280] ? item.obji7[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji7[31101282] ? item.obji7[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji7[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji7[31101284] ? item.obji7[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji7[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji7[31101286] ? item.obji7[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji7[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji7[31101288] ? item.obji7[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji7[31101290] ? item.obji7[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji7[31101292] ? item.obji7[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji7[31101294] ? item.obji7[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji7[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji7[31101296] ? item.obji7[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep7" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp7" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji7[31101297] ? item.obji7[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji7[31101298] ? item.obji7[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji7[31101299] ? item.obji7[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji7[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji7[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji7[31101301] ? item.obji7[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji7[31101302] ? item.obji7[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji7[31101303] ? item.obji7[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji7[31101304] ? item.obji7[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji7[31101305] ? item.obji7[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji7[31101306] ? item.obji7[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji7[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji7[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji7[31101308] ? item.obji7[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji7[31101309] ? item.obji7[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji7[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji7[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji7[31101311] ? item.obji7[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji7[31101312] ? item.obji7[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji7[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji7[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji7[31101314] ? item.obji7[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101315] ? item.obji7[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101316] ? item.obji7[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji7[31101317] ? item.obji7[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101318] ? item.obji7[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101320] ? item.obji7[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101321] ? item.obji7[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji7[31101323] ? item.obji7[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101324] ? item.obji7[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101326] ? item.obji7[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji7[31101327] ? item.obji7[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101328] ? item.obji7[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101329] ? item.obji7[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji7[31101330] ? item.obji7[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101331] ? item.obji7[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101332] ? item.obji7[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji7[31101333] ? item.obji7[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101334] ? item.obji7[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101335] ? item.obji7[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji7[31101336] ? item.obji7[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101337] ? item.obji7[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101339] ? item.obji7[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101340] ? item.obji7[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101341] ? item.obji7[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji7[31101342] ? item.obji7[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101343] ? item.obji7[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101344] ? item.obji7[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji7[31101345] ? item.obji7[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101346] ? item.obji7[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101347] ? item.obji7[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji7[31101348] ? item.obji7[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101349] ? item.obji7[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101350] ? item.obji7[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji7[31101351] ? item.obji7[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101352] ? item.obji7[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji7[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101353] ? item.obji7[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji7[31101354] ? item.obji7[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101355] ? item.obji7[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101357] ? item.obji7[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101358] ? item.obji7[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji7[31101359] ? item.obji7[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji7[31101360] ? item.obji7[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101361] ? item.obji7[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101363] ? item.obji7[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji7[31101364] ? item.obji7[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101365] ? item.obji7[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101367] ? item.obji7[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji7[31101368] ? item.obji7[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101369] ? item.obji7[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101371] ? item.obji7[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji7[31101372] ? item.obji7[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji7[31101373] ? item.obji7[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji7[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji7[31101375] ? item.obji7[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d8']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji8[31101248] ? item.obji8[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji8[31101249] ? item.obji8[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji8[31101250] ? item.obji8[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji8[31101251] ? item.obji8[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji8[31101252] ? item.obji8[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji8[31101253] ? item.obji8[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji8[31101254] ? item.obji8[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji8[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji8[31101256] ? item.obji8[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji8[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji8[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji8[31101259] ? item.obji8[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji8[31101260] ? item.obji8[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji8[31101261] ? item.obji8[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji8[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji8[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji8[31101264] ? item.obji8[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji8[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji8[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji8[31101267] ? item.obji8[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji8[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji8[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji8[31101270] ? item.obji8[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji8[31101271] ? item.obji8[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji8[31101272] ? item.obji8[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji8[31101273] ? item.obji8[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji8[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji8[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji8ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji8[31101276] ? item.obji8[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji8[31101278] ? item.obji8[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji8[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji8[31101280] ? item.obji8[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji8[31101282] ? item.obji8[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji8[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji8[31101284] ? item.obji8[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji8[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji8[31101286] ? item.obji8[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji8[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji8[31101288] ? item.obji8[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji8[31101290] ? item.obji8[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji8[31101292] ? item.obji8[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji8[31101294] ? item.obji8[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji8[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji8[31101296] ? item.obji8[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep8" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp8" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji8[31101297] ? item.obji8[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji8[31101298] ? item.obji8[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji8[31101299] ? item.obji8[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji8[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji8[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji8[31101301] ? item.obji8[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji8[31101302] ? item.obji8[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji8[31101303] ? item.obji8[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji8[31101304] ? item.obji8[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji8[31101305] ? item.obji8[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji8[31101306] ? item.obji8[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji8[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji8[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji8[31101308] ? item.obji8[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji8[31101309] ? item.obji8[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji8[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji8[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji8[31101311] ? item.obji8[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji8[31101312] ? item.obji8[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji8[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji8[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji8[31101314] ? item.obji8[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101315] ? item.obji8[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101316] ? item.obji8[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji8[31101317] ? item.obji8[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101318] ? item.obji8[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101320] ? item.obji8[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101321] ? item.obji8[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji8[31101323] ? item.obji8[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101324] ? item.obji8[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101326] ? item.obji8[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji8[31101327] ? item.obji8[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101328] ? item.obji8[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101329] ? item.obji8[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji8[31101330] ? item.obji8[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101331] ? item.obji8[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101332] ? item.obji8[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji8[31101333] ? item.obji8[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101334] ? item.obji8[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101335] ? item.obji8[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji8[31101336] ? item.obji8[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101337] ? item.obji8[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101339] ? item.obji8[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101340] ? item.obji8[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101341] ? item.obji8[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji8[31101342] ? item.obji8[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101343] ? item.obji8[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101344] ? item.obji8[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji8[31101345] ? item.obji8[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101346] ? item.obji8[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101347] ? item.obji8[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji8[31101348] ? item.obji8[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101349] ? item.obji8[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101350] ? item.obji8[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji8[31101351] ? item.obji8[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101352] ? item.obji8[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji8[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101353] ? item.obji8[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji8[31101354] ? item.obji8[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101355] ? item.obji8[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101357] ? item.obji8[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101358] ? item.obji8[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji8[31101359] ? item.obji8[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji8[31101360] ? item.obji8[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101361] ? item.obji8[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101363] ? item.obji8[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji8[31101364] ? item.obji8[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101365] ? item.obji8[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101367] ? item.obji8[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji8[31101368] ? item.obji8[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101369] ? item.obji8[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101371] ? item.obji8[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji8[31101372] ? item.obji8[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji8[31101373] ? item.obji8[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji8[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji8[31101375] ? item.obji8[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d9']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji9[31101248] ? item.obji9[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji9[31101249] ? item.obji9[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji9[31101250] ? item.obji9[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji9[31101251] ? item.obji9[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji9[31101252] ? item.obji9[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji9[31101253] ? item.obji9[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji9[31101254] ? item.obji9[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji9[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji9[31101256] ? item.obji9[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji9[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji9[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji9[31101259] ? item.obji9[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji9[31101260] ? item.obji9[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji9[31101261] ? item.obji9[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji9[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji9[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji9[31101264] ? item.obji9[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji9[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji9[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji9[31101267] ? item.obji9[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji9[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji9[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji9[31101270] ? item.obji9[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji9[31101271] ? item.obji9[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji9[31101272] ? item.obji9[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji9[31101273] ? item.obji9[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji9[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji9[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji9ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji9[31101276] ? item.obji9[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji9[31101278] ? item.obji9[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji9[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji9[31101280] ? item.obji9[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji9[31101282] ? item.obji9[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji9[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji9[31101284] ? item.obji9[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji9[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji9[31101286] ? item.obji9[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji9[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji9[31101288] ? item.obji9[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji9[31101290] ? item.obji9[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji9[31101292] ? item.obji9[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji9[31101294] ? item.obji9[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji9[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji9[31101296] ? item.obji9[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep9" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp9" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji9[31101297] ? item.obji9[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji9[31101298] ? item.obji9[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji9[31101299] ? item.obji9[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji9[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji9[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji9[31101301] ? item.obji9[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji9[31101302] ? item.obji9[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji9[31101303] ? item.obji9[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji9[31101304] ? item.obji9[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji9[31101305] ? item.obji9[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji9[31101306] ? item.obji9[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji9[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji9[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji9[31101308] ? item.obji9[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji9[31101309] ? item.obji9[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji9[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji9[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji9[31101311] ? item.obji9[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji9[31101312] ? item.obji9[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji9[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji9[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji9[31101314] ? item.obji9[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101315] ? item.obji9[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101316] ? item.obji9[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji9[31101317] ? item.obji9[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101318] ? item.obji9[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101320] ? item.obji9[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101321] ? item.obji9[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji9[31101323] ? item.obji9[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101324] ? item.obji9[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101326] ? item.obji9[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji9[31101327] ? item.obji9[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101328] ? item.obji9[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101329] ? item.obji9[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji9[31101330] ? item.obji9[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101331] ? item.obji9[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101332] ? item.obji9[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji9[31101333] ? item.obji9[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101334] ? item.obji9[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101335] ? item.obji9[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji9[31101336] ? item.obji9[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101337] ? item.obji9[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101339] ? item.obji9[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101340] ? item.obji9[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101341] ? item.obji9[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji9[31101342] ? item.obji9[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101343] ? item.obji9[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101344] ? item.obji9[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji9[31101345] ? item.obji9[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101346] ? item.obji9[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101347] ? item.obji9[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji9[31101348] ? item.obji9[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101349] ? item.obji9[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101350] ? item.obji9[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji9[31101351] ? item.obji9[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101352] ? item.obji9[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji9[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101353] ? item.obji9[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji9[31101354] ? item.obji9[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101355] ? item.obji9[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101357] ? item.obji9[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101358] ? item.obji9[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji9[31101359] ? item.obji9[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji9[31101360] ? item.obji9[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101361] ? item.obji9[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101363] ? item.obji9[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji9[31101364] ? item.obji9[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101365] ? item.obji9[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101367] ? item.obji9[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji9[31101368] ? item.obji9[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101369] ? item.obji9[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101371] ? item.obji9[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji9[31101372] ? item.obji9[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji9[31101373] ? item.obji9[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji9[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji9[31101375] ? item.obji9[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d10']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji10[31101248] ? item.obji10[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji10[31101249] ? item.obji10[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji10[31101250] ? item.obji10[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji10[31101251] ? item.obji10[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji10[31101252] ? item.obji10[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji10[31101253] ? item.obji10[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji10[31101254] ? item.obji10[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji10[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji10[31101256] ? item.obji10[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji10[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji10[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji10[31101259] ? item.obji10[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji10[31101260] ? item.obji10[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji10[31101261] ? item.obji10[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji10[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji10[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji10[31101264] ? item.obji10[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji10[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji10[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji10[31101267] ? item.obji10[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji10[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji10[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji10[31101270] ? item.obji10[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji10[31101271] ? item.obji10[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji10[31101272] ? item.obji10[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji10[31101273] ? item.obji10[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji10[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji10[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji10ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji10[31101276] ? item.obji10[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji10[31101278] ? item.obji10[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji10[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji10[31101280] ? item.obji10[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji10[31101282] ? item.obji10[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji10[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji10[31101284] ? item.obji10[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji10[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji10[31101286] ? item.obji10[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji10[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji10[31101288] ? item.obji10[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji10[31101290] ? item.obji10[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji10[31101292] ? item.obji10[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji10[31101294] ? item.obji10[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji10[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji10[31101296] ? item.obji10[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep10" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp10" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji10[31101297] ? item.obji10[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji10[31101298] ? item.obji10[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji10[31101299] ? item.obji10[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji10[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji10[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji10[31101301] ? item.obji10[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji10[31101302] ? item.obji10[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji10[31101303] ? item.obji10[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji10[31101304] ? item.obji10[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji10[31101305] ? item.obji10[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji10[31101306] ? item.obji10[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji10[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji10[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji10[31101308] ? item.obji10[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji10[31101309] ? item.obji10[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji10[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji10[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji10[31101311] ? item.obji10[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji10[31101312] ? item.obji10[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji10[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji10[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji10[31101314] ? item.obji10[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101315] ? item.obji10[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101316] ? item.obji10[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji10[31101317] ? item.obji10[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101318] ? item.obji10[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101320] ? item.obji10[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101321] ? item.obji10[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji10[31101323] ? item.obji10[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101324] ? item.obji10[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101326] ? item.obji10[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji10[31101327] ? item.obji10[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101328] ? item.obji10[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101329] ? item.obji10[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji10[31101330] ? item.obji10[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101331] ? item.obji10[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101332] ? item.obji10[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji10[31101333] ? item.obji10[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101334] ? item.obji10[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101335] ? item.obji10[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji10[31101336] ? item.obji10[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101337] ? item.obji10[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101339] ? item.obji10[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101340] ? item.obji10[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101341] ? item.obji10[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji10[31101342] ? item.obji10[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101343] ? item.obji10[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101344] ? item.obji10[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji10[31101345] ? item.obji10[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101346] ? item.obji10[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101347] ? item.obji10[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji10[31101348] ? item.obji10[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101349] ? item.obji10[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101350] ? item.obji10[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji10[31101351] ? item.obji10[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101352] ? item.obji10[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji10[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101353] ? item.obji10[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji10[31101354] ? item.obji10[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101355] ? item.obji10[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101357] ? item.obji10[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101358] ? item.obji10[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji10[31101359] ? item.obji10[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji10[31101360] ? item.obji10[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101361] ? item.obji10[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101363] ? item.obji10[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji10[31101364] ? item.obji10[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101365] ? item.obji10[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101367] ? item.obji10[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji10[31101368] ? item.obji10[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101369] ? item.obji10[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101371] ? item.obji10[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji10[31101372] ? item.obji10[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji10[31101373] ? item.obji10[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji10[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji10[31101375] ? item.obji10[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d11']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji11[31101248] ? item.obji11[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji11[31101249] ? item.obji11[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji11[31101250] ? item.obji11[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji11[31101251] ? item.obji11[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji11[31101252] ? item.obji11[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji11[31101253] ? item.obji11[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji11[31101254] ? item.obji11[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji11[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji11[31101256] ? item.obji11[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji11[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji11[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji11[31101259] ? item.obji11[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji11[31101260] ? item.obji11[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji11[31101261] ? item.obji11[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji11[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji11[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji11[31101264] ? item.obji11[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji11[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji11[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji11[31101267] ? item.obji11[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji11[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji11[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji11[31101270] ? item.obji11[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji11[31101271] ? item.obji11[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji11[31101272] ? item.obji11[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji11[31101273] ? item.obji11[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji11[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji11[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji11ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji11[31101276] ? item.obji11[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji11[31101278] ? item.obji11[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji11[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji11[31101280] ? item.obji11[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji11[31101282] ? item.obji11[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji11[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji11[31101284] ? item.obji11[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji11[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji11[31101286] ? item.obji11[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji11[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji11[31101288] ? item.obji11[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji11[31101290] ? item.obji11[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji11[31101292] ? item.obji11[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji11[31101294] ? item.obji11[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji11[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji11[31101296] ? item.obji11[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep11" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp11" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji11[31101297] ? item.obji11[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji11[31101298] ? item.obji11[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji11[31101299] ? item.obji11[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji11[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji11[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji11[31101301] ? item.obji11[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji11[31101302] ? item.obji11[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji11[31101303] ? item.obji11[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji11[31101304] ? item.obji11[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji11[31101305] ? item.obji11[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji11[31101306] ? item.obji11[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji11[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji11[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji11[31101308] ? item.obji11[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji11[31101309] ? item.obji11[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji11[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji11[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji11[31101311] ? item.obji11[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji11[31101312] ? item.obji11[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji11[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji11[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji11[31101314] ? item.obji11[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101315] ? item.obji11[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101316] ? item.obji11[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji11[31101317] ? item.obji11[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101318] ? item.obji11[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101320] ? item.obji11[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101321] ? item.obji11[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji11[31101323] ? item.obji11[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101324] ? item.obji11[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101326] ? item.obji11[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji11[31101327] ? item.obji11[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101328] ? item.obji11[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101329] ? item.obji11[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji11[31101330] ? item.obji11[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101331] ? item.obji11[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101332] ? item.obji11[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji11[31101333] ? item.obji11[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101334] ? item.obji11[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101335] ? item.obji11[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji11[31101336] ? item.obji11[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101337] ? item.obji11[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101339] ? item.obji11[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101340] ? item.obji11[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101341] ? item.obji11[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji11[31101342] ? item.obji11[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101343] ? item.obji11[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101344] ? item.obji11[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji11[31101345] ? item.obji11[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101346] ? item.obji11[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101347] ? item.obji11[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji11[31101348] ? item.obji11[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101349] ? item.obji11[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101350] ? item.obji11[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji11[31101351] ? item.obji11[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101352] ? item.obji11[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji11[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101353] ? item.obji11[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji11[31101354] ? item.obji11[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101355] ? item.obji11[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101357] ? item.obji11[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101358] ? item.obji11[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji11[31101359] ? item.obji11[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji11[31101360] ? item.obji11[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101361] ? item.obji11[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101363] ? item.obji11[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji11[31101364] ? item.obji11[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101365] ? item.obji11[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101367] ? item.obji11[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji11[31101368] ? item.obji11[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101369] ? item.obji11[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101371] ? item.obji11[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji11[31101372] ? item.obji11[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji11[31101373] ? item.obji11[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji11[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji11[31101375] ? item.obji11[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d12']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji12[31101248] ? item.obji12[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji12[31101249] ? item.obji12[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji12[31101250] ? item.obji12[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji12[31101251] ? item.obji12[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji12[31101252] ? item.obji12[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji12[31101253] ? item.obji12[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji12[31101254] ? item.obji12[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji12[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji12[31101256] ? item.obji12[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji12[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji12[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji12[31101259] ? item.obji12[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji12[31101260] ? item.obji12[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji12[31101261] ? item.obji12[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji12[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji12[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji12[31101264] ? item.obji12[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji12[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji12[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji12[31101267] ? item.obji12[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji12[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji12[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji12[31101270] ? item.obji12[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji12[31101271] ? item.obji12[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji12[31101272] ? item.obji12[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji12[31101273] ? item.obji12[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji12[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji12[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji12ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji12[31101276] ? item.obji12[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji12[31101278] ? item.obji12[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji12[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji12[31101280] ? item.obji12[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji12[31101282] ? item.obji12[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji12[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji12[31101284] ? item.obji12[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji12[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji12[31101286] ? item.obji12[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji12[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji12[31101288] ? item.obji12[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji12[31101290] ? item.obji12[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji12[31101292] ? item.obji12[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji12[31101294] ? item.obji12[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji12[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji12[31101296] ? item.obji12[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep12" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp12" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji12[31101297] ? item.obji12[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji12[31101298] ? item.obji12[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji12[31101299] ? item.obji12[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji12[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji12[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji12[31101301] ? item.obji12[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji12[31101302] ? item.obji12[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji12[31101303] ? item.obji12[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji12[31101304] ? item.obji12[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji12[31101305] ? item.obji12[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji12[31101306] ? item.obji12[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji12[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji12[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji12[31101308] ? item.obji12[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji12[31101309] ? item.obji12[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji12[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji12[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji12[31101311] ? item.obji12[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji12[31101312] ? item.obji12[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji12[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji12[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji12[31101314] ? item.obji12[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101315] ? item.obji12[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101316] ? item.obji12[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji12[31101317] ? item.obji12[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101318] ? item.obji12[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101320] ? item.obji12[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101321] ? item.obji12[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji12[31101323] ? item.obji12[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101324] ? item.obji12[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101326] ? item.obji12[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji12[31101327] ? item.obji12[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101328] ? item.obji12[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101329] ? item.obji12[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji12[31101330] ? item.obji12[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101331] ? item.obji12[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101332] ? item.obji12[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji12[31101333] ? item.obji12[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101334] ? item.obji12[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101335] ? item.obji12[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji12[31101336] ? item.obji12[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101337] ? item.obji12[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101339] ? item.obji12[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101340] ? item.obji12[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101341] ? item.obji12[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji12[31101342] ? item.obji12[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101343] ? item.obji12[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101344] ? item.obji12[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji12[31101345] ? item.obji12[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101346] ? item.obji12[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101347] ? item.obji12[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji12[31101348] ? item.obji12[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101349] ? item.obji12[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101350] ? item.obji12[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji12[31101351] ? item.obji12[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101352] ? item.obji12[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji12[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101353] ? item.obji12[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji12[31101354] ? item.obji12[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101355] ? item.obji12[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101357] ? item.obji12[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101358] ? item.obji12[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji12[31101359] ? item.obji12[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji12[31101360] ? item.obji12[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101361] ? item.obji12[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101363] ? item.obji12[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji12[31101364] ? item.obji12[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101365] ? item.obji12[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101367] ? item.obji12[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji12[31101368] ? item.obji12[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101369] ? item.obji12[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101371] ? item.obji12[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji12[31101372] ? item.obji12[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji12[31101373] ? item.obji12[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji12[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji12[31101375] ? item.obji12[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d13']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji13[31101248] ? item.obji13[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji13[31101249] ? item.obji13[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji13[31101250] ? item.obji13[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji13[31101251] ? item.obji13[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji13[31101252] ? item.obji13[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji13[31101253] ? item.obji13[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji13[31101254] ? item.obji13[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji13[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji13[31101256] ? item.obji13[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji13[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji13[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji13[31101259] ? item.obji13[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji13[31101260] ? item.obji13[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji13[31101261] ? item.obji13[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji13[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji13[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji13[31101264] ? item.obji13[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji13[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji13[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji13[31101267] ? item.obji13[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji13[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji13[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji13[31101270] ? item.obji13[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji13[31101271] ? item.obji13[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji13[31101272] ? item.obji13[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji13[31101273] ? item.obji13[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji13[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji13[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji13ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji13[31101276] ? item.obji13[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji13[31101278] ? item.obji13[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji13[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji13[31101280] ? item.obji13[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji13[31101282] ? item.obji13[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji13[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji13[31101284] ? item.obji13[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji13[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji13[31101286] ? item.obji13[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji13[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji13[31101288] ? item.obji13[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji13[31101290] ? item.obji13[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji13[31101292] ? item.obji13[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji13[31101294] ? item.obji13[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji13[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji13[31101296] ? item.obji13[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep13" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp13" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji13[31101297] ? item.obji13[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji13[31101298] ? item.obji13[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji13[31101299] ? item.obji13[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji13[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji13[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji13[31101301] ? item.obji13[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji13[31101302] ? item.obji13[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji13[31101303] ? item.obji13[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji13[31101304] ? item.obji13[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji13[31101305] ? item.obji13[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji13[31101306] ? item.obji13[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji13[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji13[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji13[31101308] ? item.obji13[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji13[31101309] ? item.obji13[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji13[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji13[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji13[31101311] ? item.obji13[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji13[31101312] ? item.obji13[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji13[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji13[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji13[31101314] ? item.obji13[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101315] ? item.obji13[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101316] ? item.obji13[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji13[31101317] ? item.obji13[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101318] ? item.obji13[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101320] ? item.obji13[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101321] ? item.obji13[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji13[31101323] ? item.obji13[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101324] ? item.obji13[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101326] ? item.obji13[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji13[31101327] ? item.obji13[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101328] ? item.obji13[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101329] ? item.obji13[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji13[31101330] ? item.obji13[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101331] ? item.obji13[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101332] ? item.obji13[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji13[31101333] ? item.obji13[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101334] ? item.obji13[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101335] ? item.obji13[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji13[31101336] ? item.obji13[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101337] ? item.obji13[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101339] ? item.obji13[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101340] ? item.obji13[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101341] ? item.obji13[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji13[31101342] ? item.obji13[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101343] ? item.obji13[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101344] ? item.obji13[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji13[31101345] ? item.obji13[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101346] ? item.obji13[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101347] ? item.obji13[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji13[31101348] ? item.obji13[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101349] ? item.obji13[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101350] ? item.obji13[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji13[31101351] ? item.obji13[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101352] ? item.obji13[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji13[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101353] ? item.obji13[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji13[31101354] ? item.obji13[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101355] ? item.obji13[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101357] ? item.obji13[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101358] ? item.obji13[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji13[31101359] ? item.obji13[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji13[31101360] ? item.obji13[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101361] ? item.obji13[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101363] ? item.obji13[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji13[31101364] ? item.obji13[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101365] ? item.obji13[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101367] ? item.obji13[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji13[31101368] ? item.obji13[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101369] ? item.obji13[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101371] ? item.obji13[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji13[31101372] ? item.obji13[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji13[31101373] ? item.obji13[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji13[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji13[31101375] ? item.obji13[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d14']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji14[31101248] ? item.obji14[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji14[31101249] ? item.obji14[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji14[31101250] ? item.obji14[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji14[31101251] ? item.obji14[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji14[31101252] ? item.obji14[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji14[31101253] ? item.obji14[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji14[31101254] ? item.obji14[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji14[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji14[31101256] ? item.obji14[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji14[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji14[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji14[31101259] ? item.obji14[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji14[31101260] ? item.obji14[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji14[31101261] ? item.obji14[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji14[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji14[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji14[31101264] ? item.obji14[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji14[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji14[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji14[31101267] ? item.obji14[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji14[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji14[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji14[31101270] ? item.obji14[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji14[31101271] ? item.obji14[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji14[31101272] ? item.obji14[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji14[31101273] ? item.obji14[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji14[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji14[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji14ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji14[31101276] ? item.obji14[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji14[31101278] ? item.obji14[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji14[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji14[31101280] ? item.obji14[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji14[31101282] ? item.obji14[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji14[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji14[31101284] ? item.obji14[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji14[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji14[31101286] ? item.obji14[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji14[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji14[31101288] ? item.obji14[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji14[31101290] ? item.obji14[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji14[31101292] ? item.obji14[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji14[31101294] ? item.obji14[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji14[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji14[31101296] ? item.obji14[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep14" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp14" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji14[31101297] ? item.obji14[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji14[31101298] ? item.obji14[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji14[31101299] ? item.obji14[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji14[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji14[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji14[31101301] ? item.obji14[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji14[31101302] ? item.obji14[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji14[31101303] ? item.obji14[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji14[31101304] ? item.obji14[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji14[31101305] ? item.obji14[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji14[31101306] ? item.obji14[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji14[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji14[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji14[31101308] ? item.obji14[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji14[31101309] ? item.obji14[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji14[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji14[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji14[31101311] ? item.obji14[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji14[31101312] ? item.obji14[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji14[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji14[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji14[31101314] ? item.obji14[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101315] ? item.obji14[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101316] ? item.obji14[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji14[31101317] ? item.obji14[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101318] ? item.obji14[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101320] ? item.obji14[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101321] ? item.obji14[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji14[31101323] ? item.obji14[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101324] ? item.obji14[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101326] ? item.obji14[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji14[31101327] ? item.obji14[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101328] ? item.obji14[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101329] ? item.obji14[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji14[31101330] ? item.obji14[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101331] ? item.obji14[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101332] ? item.obji14[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji14[31101333] ? item.obji14[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101334] ? item.obji14[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101335] ? item.obji14[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji14[31101336] ? item.obji14[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101337] ? item.obji14[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101339] ? item.obji14[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101340] ? item.obji14[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101341] ? item.obji14[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji14[31101342] ? item.obji14[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101343] ? item.obji14[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101344] ? item.obji14[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji14[31101345] ? item.obji14[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101346] ? item.obji14[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101347] ? item.obji14[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji14[31101348] ? item.obji14[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101349] ? item.obji14[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101350] ? item.obji14[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji14[31101351] ? item.obji14[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101352] ? item.obji14[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji14[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101353] ? item.obji14[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji14[31101354] ? item.obji14[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101355] ? item.obji14[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101357] ? item.obji14[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101358] ? item.obji14[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji14[31101359] ? item.obji14[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji14[31101360] ? item.obji14[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101361] ? item.obji14[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101363] ? item.obji14[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji14[31101364] ? item.obji14[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101365] ? item.obji14[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101367] ? item.obji14[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji14[31101368] ? item.obji14[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101369] ? item.obji14[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101371] ? item.obji14[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji14[31101372] ? item.obji14[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji14[31101373] ? item.obji14[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji14[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji14[31101375] ? item.obji14[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d15']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji15[31101248] ? item.obji15[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji15[31101249] ? item.obji15[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji15[31101250] ? item.obji15[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji15[31101251] ? item.obji15[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji15[31101252] ? item.obji15[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji15[31101253] ? item.obji15[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji15[31101254] ? item.obji15[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji15[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji15[31101256] ? item.obji15[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji15[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji15[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji15[31101259] ? item.obji15[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji15[31101260] ? item.obji15[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji15[31101261] ? item.obji15[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji15[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji15[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji15[31101264] ? item.obji15[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji15[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji15[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji15[31101267] ? item.obji15[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji15[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji15[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji15[31101270] ? item.obji15[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji15[31101271] ? item.obji15[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji15[31101272] ? item.obji15[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji15[31101273] ? item.obji15[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji15[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji15[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji15ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji15[31101276] ? item.obji15[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji15[31101278] ? item.obji15[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji15[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji15[31101280] ? item.obji15[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji15[31101282] ? item.obji15[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji15[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji15[31101284] ? item.obji15[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji15[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji15[31101286] ? item.obji15[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji15[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji15[31101288] ? item.obji15[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji15[31101290] ? item.obji15[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji15[31101292] ? item.obji15[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji15[31101294] ? item.obji15[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji15[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji15[31101296] ? item.obji15[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep15" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp15" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji15[31101297] ? item.obji15[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji15[31101298] ? item.obji15[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji15[31101299] ? item.obji15[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji15[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji15[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji15[31101301] ? item.obji15[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji15[31101302] ? item.obji15[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji15[31101303] ? item.obji15[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji15[31101304] ? item.obji15[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji15[31101305] ? item.obji15[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji15[31101306] ? item.obji15[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji15[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji15[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji15[31101308] ? item.obji15[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji15[31101309] ? item.obji15[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji15[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji15[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji15[31101311] ? item.obji15[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji15[31101312] ? item.obji15[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji15[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji15[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji15[31101314] ? item.obji15[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101315] ? item.obji15[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101316] ? item.obji15[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji15[31101317] ? item.obji15[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101318] ? item.obji15[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101320] ? item.obji15[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101321] ? item.obji15[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji15[31101323] ? item.obji15[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101324] ? item.obji15[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101326] ? item.obji15[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji15[31101327] ? item.obji15[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101328] ? item.obji15[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101329] ? item.obji15[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji15[31101330] ? item.obji15[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101331] ? item.obji15[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101332] ? item.obji15[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji15[31101333] ? item.obji15[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101334] ? item.obji15[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101335] ? item.obji15[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji15[31101336] ? item.obji15[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101337] ? item.obji15[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101339] ? item.obji15[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101340] ? item.obji15[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101341] ? item.obji15[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji15[31101342] ? item.obji15[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101343] ? item.obji15[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101344] ? item.obji15[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji15[31101345] ? item.obji15[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101346] ? item.obji15[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101347] ? item.obji15[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji15[31101348] ? item.obji15[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101349] ? item.obji15[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101350] ? item.obji15[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji15[31101351] ? item.obji15[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101352] ? item.obji15[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji15[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101353] ? item.obji15[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji15[31101354] ? item.obji15[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101355] ? item.obji15[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101357] ? item.obji15[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101358] ? item.obji15[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji15[31101359] ? item.obji15[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji15[31101360] ? item.obji15[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101361] ? item.obji15[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101363] ? item.obji15[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji15[31101364] ? item.obji15[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101365] ? item.obji15[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101367] ? item.obji15[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji15[31101368] ? item.obji15[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101369] ? item.obji15[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101371] ? item.obji15[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji15[31101372] ? item.obji15[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji15[31101373] ? item.obji15[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji15[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji15[31101375] ? item.obji15[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d16']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji16[31101248] ? item.obji16[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji16[31101249] ? item.obji16[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji16[31101250] ? item.obji16[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji16[31101251] ? item.obji16[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji16[31101252] ? item.obji16[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji16[31101253] ? item.obji16[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji16[31101254] ? item.obji16[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji16[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji16[31101256] ? item.obji16[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji16[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji16[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji16[31101259] ? item.obji16[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji16[31101260] ? item.obji16[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji16[31101261] ? item.obji16[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji16[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji16[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji16[31101264] ? item.obji16[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji16[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji16[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji16[31101267] ? item.obji16[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji16[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji16[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji16[31101270] ? item.obji16[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji16[31101271] ? item.obji16[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji16[31101272] ? item.obji16[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji16[31101273] ? item.obji16[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji16[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji16[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji16ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji16[31101276] ? item.obji16[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji16[31101278] ? item.obji16[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji16[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji16[31101280] ? item.obji16[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji16[31101282] ? item.obji16[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji16[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji16[31101284] ? item.obji16[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji16[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji16[31101286] ? item.obji16[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji16[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji16[31101288] ? item.obji16[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji16[31101290] ? item.obji16[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji16[31101292] ? item.obji16[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji16[31101294] ? item.obji16[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji16[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji16[31101296] ? item.obji16[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep16" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp16" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji16[31101297] ? item.obji16[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji16[31101298] ? item.obji16[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji16[31101299] ? item.obji16[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji16[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji16[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji16[31101301] ? item.obji16[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji16[31101302] ? item.obji16[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji16[31101303] ? item.obji16[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji16[31101304] ? item.obji16[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji16[31101305] ? item.obji16[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji16[31101306] ? item.obji16[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji16[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji16[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji16[31101308] ? item.obji16[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji16[31101309] ? item.obji16[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji16[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji16[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji16[31101311] ? item.obji16[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji16[31101312] ? item.obji16[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji16[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji16[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji16[31101314] ? item.obji16[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101315] ? item.obji16[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101316] ? item.obji16[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji16[31101317] ? item.obji16[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101318] ? item.obji16[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101320] ? item.obji16[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101321] ? item.obji16[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji16[31101323] ? item.obji16[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101324] ? item.obji16[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101326] ? item.obji16[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji16[31101327] ? item.obji16[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101328] ? item.obji16[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101329] ? item.obji16[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji16[31101330] ? item.obji16[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101331] ? item.obji16[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101332] ? item.obji16[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji16[31101333] ? item.obji16[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101334] ? item.obji16[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101335] ? item.obji16[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji16[31101336] ? item.obji16[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101337] ? item.obji16[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101339] ? item.obji16[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101340] ? item.obji16[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101341] ? item.obji16[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji16[31101342] ? item.obji16[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101343] ? item.obji16[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101344] ? item.obji16[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji16[31101345] ? item.obji16[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101346] ? item.obji16[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101347] ? item.obji16[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji16[31101348] ? item.obji16[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101349] ? item.obji16[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101350] ? item.obji16[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji16[31101351] ? item.obji16[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101352] ? item.obji16[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji16[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101353] ? item.obji16[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji16[31101354] ? item.obji16[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101355] ? item.obji16[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101357] ? item.obji16[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101358] ? item.obji16[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji16[31101359] ? item.obji16[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji16[31101360] ? item.obji16[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101361] ? item.obji16[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101363] ? item.obji16[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji16[31101364] ? item.obji16[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101365] ? item.obji16[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101367] ? item.obji16[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji16[31101368] ? item.obji16[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101369] ? item.obji16[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101371] ? item.obji16[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji16[31101372] ? item.obji16[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji16[31101373] ? item.obji16[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji16[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji16[31101375] ? item.obji16[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d17']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji17[31101248] ? item.obji17[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji17[31101249] ? item.obji17[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji17[31101250] ? item.obji17[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji17[31101251] ? item.obji17[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji17[31101252] ? item.obji17[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji17[31101253] ? item.obji17[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji17[31101254] ? item.obji17[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji17[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji17[31101256] ? item.obji17[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji17[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji17[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji17[31101259] ? item.obji17[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji17[31101260] ? item.obji17[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji17[31101261] ? item.obji17[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji17[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji17[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji17[31101264] ? item.obji17[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji17[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji17[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji17[31101267] ? item.obji17[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji17[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji17[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji17[31101270] ? item.obji17[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji17[31101271] ? item.obji17[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji17[31101272] ? item.obji17[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji17[31101273] ? item.obji17[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji17[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji17[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji17ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji17[31101276] ? item.obji17[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji17[31101278] ? item.obji17[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji17[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji17[31101280] ? item.obji17[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji17[31101282] ? item.obji17[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji17[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji17[31101284] ? item.obji17[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji17[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji17[31101286] ? item.obji17[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji17[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji17[31101288] ? item.obji17[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji17[31101290] ? item.obji17[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji17[31101292] ? item.obji17[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji17[31101294] ? item.obji17[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji17[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji17[31101296] ? item.obji17[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep17" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp17" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji17[31101297] ? item.obji17[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji17[31101298] ? item.obji17[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji17[31101299] ? item.obji17[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji17[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji17[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji17[31101301] ? item.obji17[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji17[31101302] ? item.obji17[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji17[31101303] ? item.obji17[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji17[31101304] ? item.obji17[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji17[31101305] ? item.obji17[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji17[31101306] ? item.obji17[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji17[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji17[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji17[31101308] ? item.obji17[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji17[31101309] ? item.obji17[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji17[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji17[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji17[31101311] ? item.obji17[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji17[31101312] ? item.obji17[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji17[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji17[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji17[31101314] ? item.obji17[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101315] ? item.obji17[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101316] ? item.obji17[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji17[31101317] ? item.obji17[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101318] ? item.obji17[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101320] ? item.obji17[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101321] ? item.obji17[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji17[31101323] ? item.obji17[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101324] ? item.obji17[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101326] ? item.obji17[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji17[31101327] ? item.obji17[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101328] ? item.obji17[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101329] ? item.obji17[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji17[31101330] ? item.obji17[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101331] ? item.obji17[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101332] ? item.obji17[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji17[31101333] ? item.obji17[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101334] ? item.obji17[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101335] ? item.obji17[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji17[31101336] ? item.obji17[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101337] ? item.obji17[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101339] ? item.obji17[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101340] ? item.obji17[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101341] ? item.obji17[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji17[31101342] ? item.obji17[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101343] ? item.obji17[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101344] ? item.obji17[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji17[31101345] ? item.obji17[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101346] ? item.obji17[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101347] ? item.obji17[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji17[31101348] ? item.obji17[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101349] ? item.obji17[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101350] ? item.obji17[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji17[31101351] ? item.obji17[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101352] ? item.obji17[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji17[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101353] ? item.obji17[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji17[31101354] ? item.obji17[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101355] ? item.obji17[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101357] ? item.obji17[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101358] ? item.obji17[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji17[31101359] ? item.obji17[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji17[31101360] ? item.obji17[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101361] ? item.obji17[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101363] ? item.obji17[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji17[31101364] ? item.obji17[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101365] ? item.obji17[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101367] ? item.obji17[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji17[31101368] ? item.obji17[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101369] ? item.obji17[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101371] ? item.obji17[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji17[31101372] ? item.obji17[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji17[31101373] ? item.obji17[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji17[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji17[31101375] ? item.obji17[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d18']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji18[31101248] ? item.obji18[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji18[31101249] ? item.obji18[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji18[31101250] ? item.obji18[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji18[31101251] ? item.obji18[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji18[31101252] ? item.obji18[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji18[31101253] ? item.obji18[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji18[31101254] ? item.obji18[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji18[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji18[31101256] ? item.obji18[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji18[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji18[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji18[31101259] ? item.obji18[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji18[31101260] ? item.obji18[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji18[31101261] ? item.obji18[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji18[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji18[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji18[31101264] ? item.obji18[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji18[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji18[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji18[31101267] ? item.obji18[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji18[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji18[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji18[31101270] ? item.obji18[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji18[31101271] ? item.obji18[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji18[31101272] ? item.obji18[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji18[31101273] ? item.obji18[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji18[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji18[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji18ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji18[31101276] ? item.obji18[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji18[31101278] ? item.obji18[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji18[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji18[31101280] ? item.obji18[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji18[31101282] ? item.obji18[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji18[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji18[31101284] ? item.obji18[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji18[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji18[31101286] ? item.obji18[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji18[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji18[31101288] ? item.obji18[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji18[31101290] ? item.obji18[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji18[31101292] ? item.obji18[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji18[31101294] ? item.obji18[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji18[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji18[31101296] ? item.obji18[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep18" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp18" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji18[31101297] ? item.obji18[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji18[31101298] ? item.obji18[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji18[31101299] ? item.obji18[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji18[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji18[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji18[31101301] ? item.obji18[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji18[31101302] ? item.obji18[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji18[31101303] ? item.obji18[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji18[31101304] ? item.obji18[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji18[31101305] ? item.obji18[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji18[31101306] ? item.obji18[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji18[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji18[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji18[31101308] ? item.obji18[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji18[31101309] ? item.obji18[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji18[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji18[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji18[31101311] ? item.obji18[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji18[31101312] ? item.obji18[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji18[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji18[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji18[31101314] ? item.obji18[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101315] ? item.obji18[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101316] ? item.obji18[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji18[31101317] ? item.obji18[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101318] ? item.obji18[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101320] ? item.obji18[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101321] ? item.obji18[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji18[31101323] ? item.obji18[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101324] ? item.obji18[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101326] ? item.obji18[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji18[31101327] ? item.obji18[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101328] ? item.obji18[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101329] ? item.obji18[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji18[31101330] ? item.obji18[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101331] ? item.obji18[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101332] ? item.obji18[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji18[31101333] ? item.obji18[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101334] ? item.obji18[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101335] ? item.obji18[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji18[31101336] ? item.obji18[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101337] ? item.obji18[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101339] ? item.obji18[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101340] ? item.obji18[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101341] ? item.obji18[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji18[31101342] ? item.obji18[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101343] ? item.obji18[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101344] ? item.obji18[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji18[31101345] ? item.obji18[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101346] ? item.obji18[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101347] ? item.obji18[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji18[31101348] ? item.obji18[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101349] ? item.obji18[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101350] ? item.obji18[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji18[31101351] ? item.obji18[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101352] ? item.obji18[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji18[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101353] ? item.obji18[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji18[31101354] ? item.obji18[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101355] ? item.obji18[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101357] ? item.obji18[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101358] ? item.obji18[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji18[31101359] ? item.obji18[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji18[31101360] ? item.obji18[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101361] ? item.obji18[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101363] ? item.obji18[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji18[31101364] ? item.obji18[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101365] ? item.obji18[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101367] ? item.obji18[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji18[31101368] ? item.obji18[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101369] ? item.obji18[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101371] ? item.obji18[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji18[31101372] ? item.obji18[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji18[31101373] ? item.obji18[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji18[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji18[31101375] ? item.obji18[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d19']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji19[31101248] ? item.obji19[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji19[31101249] ? item.obji19[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji19[31101250] ? item.obji19[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji19[31101251] ? item.obji19[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji19[31101252] ? item.obji19[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji19[31101253] ? item.obji19[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji19[31101254] ? item.obji19[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji19[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji19[31101256] ? item.obji19[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji19[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji19[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji19[31101259] ? item.obji19[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji19[31101260] ? item.obji19[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji19[31101261] ? item.obji19[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji19[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji19[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji19[31101264] ? item.obji19[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji19[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji19[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji19[31101267] ? item.obji19[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji19[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji19[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji19[31101270] ? item.obji19[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji19[31101271] ? item.obji19[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji19[31101272] ? item.obji19[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji19[31101273] ? item.obji19[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji19[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji19[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji19ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji19[31101276] ? item.obji19[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji19[31101278] ? item.obji19[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji19[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji19[31101280] ? item.obji19[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji19[31101282] ? item.obji19[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji19[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji19[31101284] ? item.obji19[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji19[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji19[31101286] ? item.obji19[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji19[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji19[31101288] ? item.obji19[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji19[31101290] ? item.obji19[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji19[31101292] ? item.obji19[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji19[31101294] ? item.obji19[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji19[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji19[31101296] ? item.obji19[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep19" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp19" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji19[31101297] ? item.obji19[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji19[31101298] ? item.obji19[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji19[31101299] ? item.obji19[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji19[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji19[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji19[31101301] ? item.obji19[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji19[31101302] ? item.obji19[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji19[31101303] ? item.obji19[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji19[31101304] ? item.obji19[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji19[31101305] ? item.obji19[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji19[31101306] ? item.obji19[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji19[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji19[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji19[31101308] ? item.obji19[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji19[31101309] ? item.obji19[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji19[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji19[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji19[31101311] ? item.obji19[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji19[31101312] ? item.obji19[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji19[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji19[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji19[31101314] ? item.obji19[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101315] ? item.obji19[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101316] ? item.obji19[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji19[31101317] ? item.obji19[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101318] ? item.obji19[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101320] ? item.obji19[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101321] ? item.obji19[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji19[31101323] ? item.obji19[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101324] ? item.obji19[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101326] ? item.obji19[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji19[31101327] ? item.obji19[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101328] ? item.obji19[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101329] ? item.obji19[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji19[31101330] ? item.obji19[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101331] ? item.obji19[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101332] ? item.obji19[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji19[31101333] ? item.obji19[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101334] ? item.obji19[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101335] ? item.obji19[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji19[31101336] ? item.obji19[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101337] ? item.obji19[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101339] ? item.obji19[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101340] ? item.obji19[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101341] ? item.obji19[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji19[31101342] ? item.obji19[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101343] ? item.obji19[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101344] ? item.obji19[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji19[31101345] ? item.obji19[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101346] ? item.obji19[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101347] ? item.obji19[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji19[31101348] ? item.obji19[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101349] ? item.obji19[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101350] ? item.obji19[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji19[31101351] ? item.obji19[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101352] ? item.obji19[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji19[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101353] ? item.obji19[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji19[31101354] ? item.obji19[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101355] ? item.obji19[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101357] ? item.obji19[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101358] ? item.obji19[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji19[31101359] ? item.obji19[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji19[31101360] ? item.obji19[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101361] ? item.obji19[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101363] ? item.obji19[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji19[31101364] ? item.obji19[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101365] ? item.obji19[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101367] ? item.obji19[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji19[31101368] ? item.obji19[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101369] ? item.obji19[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101371] ? item.obji19[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji19[31101372] ? item.obji19[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji19[31101373] ? item.obji19[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji19[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji19[31101375] ? item.obji19[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
	@endif

	@if (!empty($res['d20']))
		<div>
			<header>
				<div class="logo">
					@if(stripos(\Request::url(), 'localhost') !== FALSE)
					<img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@else
					<img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
					@endif
				</div>
				<div class="kop">
				<div class="kop-text">
					<strong>RSUD H. ANDI SULTHAN DAENG RADJA</strong> <br>
					JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
					TELP : (0413) 81292
				</div>
				</div>
				<div class="info">
				<table>
					<tr>
					<td>No. RM</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->nocm  !!}</td>
					</tr>
					<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td>{!!  $res['d1'][0]->namapasien  !!}</td>
					<td>{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
					</tr>
					<tr>
					<td>Tanggal Lahir</td>
					<td>:</td>
					<td colspan="2">{!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}</td>
					</tr>
					<td>NIK</td>
					<td>:</td>
					<td colspan="2">{!! $res['d1'][0]->noidentitas  !!}</td>
				</table>
				</div>
				<div class="code">
				<div class="">RM</div>
				<div>126</div>
				</div>
			</header>
			<section>
				<div class="title bg-dark border-bottom border-top">FORMULIR PERMINTAAN DARAH</div>
				<div class="flex col-2">
				<div class="basis50 " style="border-right:1px solid #000;">
					<h5>PERMINTAAN DARAH UNTUK TRANSFUSI</h5>
					<div class="border-bottom">
						<table>
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@{{ item.obji20[31101248] ? item.obji20[31101248] : '....................................' }}</td>
							<td>No. Reg :</td>
							<td>@{{ item.obji20[31101249] ? item.obji20[31101249] : '................' }}</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@{{ item.obji20[31101250] ? item.obji20[31101250] : '....................................' }}</td>
							<td>Kelas :</td>
							<td>@{{ item.obji20[31101251] ? item.obji20[31101251] : '................' }}</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji20[31101252] ? item.obji20[31101252] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@{{ item.obji20[31101253] ? item.obji20[31101253] : '......................................' }} </td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji20[31101254] ? item.obji20[31101254] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@{{item.obji20[31101255] | toDate | date:'dd MMMM yyyy'}}</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@{{ item.obji20[31101256] ? item.obji20[31101256] : '..................................................................' }}</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji20[31101257] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@{{item.obji20[31101258] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
						</tr>
						</table>
					</div>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji20[31101259] ? item.obji20[31101259] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@{{ item.obji20[31101260] ? item.obji20[31101260] : '.........................................................' }}</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @{{ item.obji20[31101261] ? item.obji20[31101261] : '.......................................' }} gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@{{ item.obji20[31101262] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji20[31101263] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @{{ item.obji20[31101264] ? item.obji20[31101264] : '...................................................................................' }}</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td>@{{ item.obji20[31101265] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji20[31101266] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala:  @{{ item.obji20[31101267] ? item.obji20[31101267] : '.....................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @{{ item.obji20[31101268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
							<td>@{{ item.obji20[31101269] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @{{ item.obji20[31101270] ? item.obji20[31101270] : '.................................................................................' }}</td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @{{ item.obji20[31101271] ? item.obji20[31101271] : '.....................................................................................' }}</td>
						</tr>
						</table>
					</section>
					<section class="border-bottom p05">
						<table style="font-size: x-small;">
							<tr>
								<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
							</tr>
							<tr>
								<td>1. Jumlah kehamilan sebelumnya :</td>
								<td colspan="2">@{{ item.obji20[31101272] ? item.obji20[31101272] : '........................................' }}</td>
							</tr>
							<tr>
								<td>2. Pernah abortus :</td>
								<td colspan="2">@{{ item.obji20[31101273] ? item.obji20[31101273] : '........................................' }}</td>
							</tr>
							<tr>
								<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
								<td>*) @{{ item.obji20[31101274] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
								<td>@{{ item.obji20[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
							</tr>
							<tr height="20">
							</tr>
						</table>
						
					</section>
				</div>
				<div class="basis50 p05 border-bottom" style="obji20ect-fit: contain;">
					<p class="border-bottom p05">
					<u><strong>Perhatian :</strong></u>
					<br>
					*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
					Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
					Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
					Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah RS setempat.
				</p>
				<div class="p05">
						<strong><u>HARAP DIBERIKAN</u></strong>
						<table style="font-size: x-small; padding:.5rem;">
							<tr>
								<td colspan="3">DARAH LENGKAP *)</td>
								<td width="20px"></td>
								<td colspan="3">RED CELL CONCENTRATE *)</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101275] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Segar (< 18 jam)</td>
								<td>:</td>
								<td>@{{ item.obji20[31101276] ? item.obji20[31101276] : '................................' }} cc</td>
								<td></td>
								<td colspan="3">(PACKED CELLS)</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101277] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baru (< 6 hari)</td>
								<td>:</td>
								<td>@{{ item.obji20[31101278] ? item.obji20[31101278] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji20[31101279] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji20[31101280] ? item.obji20[31101280] : '................................' }} cc</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101281] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Biasa</td>
								<td>:</td>
								<td>@{{ item.obji20[31101282] ? item.obji20[31101282] : '................................' }} cc</td>
								<td></td>
								<td>@{{ item.obji20[31101283] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} cuci</td>
								<td>:</td>
								<td>@{{ item.obji20[31101284] ? item.obji20[31101284] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td width="75px">PLASMA *)</td>
								<td>@{{ item.obji20[31101285] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Plasma biasa</td>
								<td>: @{{ item.obji20[31101286] ? item.obji20[31101286] : '................................' }} cc</td>
							</tr>
							<tr>
								<td></td>
								<td>@{{ item.obji20[31101287] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Fresh frozen plasma (FFP)</td>
								<td>: @{{ item.obji20[31101288] ? item.obji20[31101288] : '................................' }} cc</td>
							</tr>
						</table>
						<br>
						<br>
						<table style="font-size: x-small;padding:.5rem;">
							<tr>
								<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
							</tr>
							<tr>
								<td colspan="4"></td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101289] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Thrombocyt concentrate (TC)</td>
								<td>:</td>
								<td>@{{ item.obji20[31101290] ? item.obji20[31101290] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101291] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Cryoprecipitate AHF</td>
								<td>:</td>
								<td>@{{ item.obji20[31101292] ? item.obji20[31101292] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101293] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Buffycoat-granulocyt concentrate</td>
								<td>:</td>
								<td>@{{ item.obji20[31101294] ? item.obji20[31101294] : '................................' }}</td>
								<td>kantong</td>
							</tr>
							<tr>
								<td>@{{ item.obji20[31101295] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
								<td>:</td>
								<td colspan="2">@{{ item.obji20[31101296] ? item.obji20[31101296] : '................................' }}</td>
							</tr>
						</table>
						<table style="font-size: x-small;padding:.5rem;">
							<tr class="text-center">
								<td>Nama dan tanda tangan petugas</td>
								<td width="40px"></td>
								<td>Nama dan tanda tangan Dokter</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>Yang mengambil contoh darah O.S</td>
								<td></td>
								<td>Yang meminta darah dan cap rumah sakit</td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td><div id="qrcodep20" style="text-align: center"></div></td>
								<td></td>
								<td><div id="qrcodepp20" style="text-align: center"></div></td>
							</tr>
							<tr class="text-center" style="border-bottom:1px solid #000">
								<td>@{{ item.obji20[31101297] ? item.obji20[31101297] : '................................' }}</td>
								<td></td>
								<td>@{{ item.obji20[31101298] ? item.obji20[31101298] : '................................' }}</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</section>
			<section>
				<div style="float:left;width:57%;" >
					<p class="p05 border-bottom">DIISI OLEH PETUGAS UTD ...........................................</p>
					<div class="flex col-2 ">
						<div class="border-right" style="width:90%">
							<table style="font-size: smaller;">
								<tr>
									<td>Contoh darah O.S</td>
									<td>:</td>
									<td>@{{ item.obji20[31101299] ? item.obji20[31101299] : '................................' }}</td>
								</tr>
								<tr>
									<td>Diterima tanggal</td>
									<td>:</td>
									<td>@{{item.obji20[31101300] | toDate | date:'dd MMMM yyyy'}}</td>
								</tr>
								<tr>
									<td>Jam</td>
									<td>:</td>
									<td>@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
								</tr>
								<tr>
									<td>ATD/PTTD Penerima</td>
									<td>:</td>
									<td>@{{ item.obji20[31101301] ? item.obji20[31101301] : '................................' }}</td>
								</tr>
							</table>
						</div>
						<div class="p05">
							<table class="bordered">
								<tr class="bordered">
									<td class="bordered">ABO</td>
									<td class="bordered">RHESUS</td>
									<td class="bordered">LAIN</td>
								</tr>
								<tr class="bordered">
									<td height="45" class="bordered">@{{ item.obji20[31101302] ? item.obji20[31101302] : '' }}</td>
									<td class="bordered">@{{ item.obji20[31101303] ? item.obji20[31101303] : '' }}</td>
									<td class="bordered">@{{ item.obji20[31101304] ? item.obji20[31101304] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div style="float:left;width:43%">
					<table class="bordered" style="font-size: x-small;">
						<tr class="bordered">
							<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
							<td colspan="3" class="bordered" width="115px">ATD/PTTD Pemeriksa</td>
						</tr>
						<tr class="bordered text-center" style="height:16px">
							<td class="bordered">Nama</td>
							<td class="bordered">Tanggal</td>
							<td class="bordered">Jam</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered" width="230px">@{{ item.obji20[31101305] ? item.obji20[31101305] : '' }}</td>
							<td class="bordered">@{{ item.obji20[31101306] ? item.obji20[31101306] : '' }}</td>
							<td class="bordered">@{{item.obji20[31101307] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji20[31101307] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered" style="height:16px">
							<td class="bordered">@{{ item.obji20[31101308] ? item.obji20[31101308] : '' }}</td>
							<td class="bordered">@{{ item.obji20[31101309] ? item.obji20[31101309] : '' }}</td>
							<td class="bordered">@{{item.obji20[31101310] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji20[31101310] | toDate | date:'HH:mm'}}</td>
						</tr>
						<tr class="bordered">
							<td class="bordered">@{{ item.obji20[31101311] ? item.obji20[31101311] : '' }}</td>
							<td class="bordered">@{{ item.obji20[31101312] ? item.obji20[31101312] : '' }}</td>
							<td class="bordered">@{{item.obji20[31101313] | toDate | date:'dd MMMM yyyy'}}</td>
							<td class="bordered">@{{item.obji20[31101313] | toDate | date:'HH:mm'}}</td>
						</tr>
					</table>
				</div>
			</section>
			<table class="bordered" style="font-size: 7pt;text-align: center;">
				<tr>
					<td rowspan="3" class="bordered rotate" >Nomor</td>
					<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
					<td class="bordered">ABO</td>
					<td class="bordered">RHESUS</td>
					<td class="bordered">LAIN2</td>
					<td class="bordered" rowspan="2"  colspan="3">ATD/PTTD yang mengeluarkan darah</td>
					<td class="bordered" rowspan="2" width="240px">Keluarga / Petugas yang mengambil darah</td>
				</tr>
				<tr>
					<td class="bordered">@{{ item.obji20[31101314] ? item.obji20[31101314] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101315] ? item.obji20[31101315] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101316] ? item.obji20[31101316] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">Jumlah yang dikeluarkan cc / kantong</td>
					<td class="bordered">Jenis darah</td>
					<td class="bordered">Tanggal Pengambilan</td>
					<td colspan="2" class="bordered">No. Kantong</td>
					<td class="bordered">Nama</td>
					<td class="bordered">Tanggal</td>
					<td class="bordered">Jam</td>
					<td class="bordered">Nama / Alamat / Tanda tangan penerima darah</td>
				</tr>
				<tr>
					<td class="bordered">1</td>
					<td class="bordered">@{{ item.obji20[31101317] ? item.obji20[31101317] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101318] ? item.obji20[31101318] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101319] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered"></td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101320] ? item.obji20[31101320] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101321] ? item.obji20[31101321] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">2</td>
					<td class="bordered">@{{ item.obji20[31101323] ? item.obji20[31101323] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101324] ? item.obji20[31101324] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101325] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101326] ? item.obji20[31101326] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">3</td>
					<td class="bordered">@{{ item.obji20[31101327] ? item.obji20[31101327] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101328] ? item.obji20[31101328] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111270] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101329] ? item.obji20[31101329] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">4</td>
					<td class="bordered">@{{ item.obji20[31101330] ? item.obji20[31101330] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101331] ? item.obji20[31101331] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111271] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101332] ? item.obji20[31101332] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">5</td>
					<td class="bordered">@{{ item.obji20[31101333] ? item.obji20[31101333] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101334] ? item.obji20[31101334] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111272] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101335] ? item.obji20[31101335] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">6</td>
					<td class="bordered">@{{ item.obji20[31101336] ? item.obji20[31101336] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101337] ? item.obji20[31101337] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111273] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101339] ? item.obji20[31101339] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101340] ? item.obji20[31101340] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101341] ? item.obji20[31101341] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">7</td>
					<td class="bordered">@{{ item.obji20[31101342] ? item.obji20[31101342] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101343] ? item.obji20[31101343] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111274] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101344] ? item.obji20[31101344] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">8</td>
					<td class="bordered">@{{ item.obji20[31101345] ? item.obji20[31101345] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101346] ? item.obji20[31101346] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111275] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101347] ? item.obji20[31101347] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">9</td>
					<td class="bordered">@{{ item.obji20[31101348] ? item.obji20[31101348] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101349] ? item.obji20[31101349] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111276] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101350] ? item.obji20[31101350] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">10</td>
					<td class="bordered">@{{ item.obji20[31101351] ? item.obji20[31101351] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101352] ? item.obji20[31101352] : '' }}</td>
					<td class="bordered">@{{item.obji20[32111277] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101353] ? item.obji20[31101353] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">11</td>
					<td class="bordered">@{{ item.obji20[31101354] ? item.obji20[31101354] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101355] ? item.obji20[31101355] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101356] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101357] ? item.obji20[31101357] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101358] ? item.obji20[31101358] : '' }}</td>
					<td rowspan="5" class="bordered" colspan="3">@{{ item.obji20[31101359] ? item.obji20[31101359] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">12</td>
					<td class="bordered">@{{ item.obji20[31101360] ? item.obji20[31101360] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101361] ? item.obji20[31101361] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101362] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101363] ? item.obji20[31101363] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">13</td>
					<td class="bordered">@{{ item.obji20[31101364] ? item.obji20[31101364] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101365] ? item.obji20[31101365] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101366] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101367] ? item.obji20[31101367] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">14</td>
					<td class="bordered">@{{ item.obji20[31101368] ? item.obji20[31101368] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101369] ? item.obji20[31101369] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101370] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101371] ? item.obji20[31101371] : '' }}</td>
				</tr>
				<tr>
					<td class="bordered">15</td>
					<td class="bordered">@{{ item.obji20[31101372] ? item.obji20[31101372] : '' }}</td>
					<td class="bordered">@{{ item.obji20[31101373] ? item.obji20[31101373] : '' }}</td>
					<td class="bordered">@{{item.obji20[31101374] | toDate | date:'dd MMMM yyyy'}}</td>
					<td colspan="2" class="bordered">@{{ item.obji20[31101375] ? item.obji20[31101375] : '' }}</td>
				</tr>
				<tr>
					<td colspan="10" style="text-align: left;">
						<ul>
							<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
							<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke ruangan</li>
						</ul>
					</td>
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

    angular.controller('cetakFormulirPermintaanDarah', function ($scope, $http, httpService) {
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


        var p1 = $scope.item.obj[31101297];
        var pp1 = $scope.item.obj[31101298];
        var p2 = $scope.item.obji2[31101297];
        var pp2 = $scope.item.obji2[31101298];
        var p3 = $scope.item.obji3[31101297];
        var pp3 = $scope.item.obji3[31101298];
        var p4 = $scope.item.obji4[31101297];
        var pp4 = $scope.item.obji4[31101298];
        var p5 = $scope.item.obji5[31101297];
        var pp5 = $scope.item.obji5[31101298];
        var p6 = $scope.item.obji6[31101297];
        var pp6 = $scope.item.obji6[31101298];
        var p7 = $scope.item.obji7[31101297];
        var pp7 = $scope.item.obji7[31101298];
        var p8 = $scope.item.obji8[31101297];
        var pp8 = $scope.item.obji8[31101298];
        var p9 = $scope.item.obji9[31101297];
        var pp9 = $scope.item.obji9[31101298];
        var p10 = $scope.item.obji10[31101297];
        var pp10 = $scope.item.obji10[31101298];
        var p11 = $scope.item.obji11[31101297];
        var pp11 = $scope.item.obji11[31101298];
        var p12 = $scope.item.obji12[31101297];
        var pp12 = $scope.item.obji12[31101298];
        var p13 = $scope.item.obji13[31101297];
        var pp13 = $scope.item.obji13[31101298];
        var p14 = $scope.item.obji14[31101297];
        var pp14 = $scope.item.obji14[31101298];
        var p15 = $scope.item.obji15[31101297];
        var pp15 = $scope.item.obji15[31101298];
        var p16 = $scope.item.obji16[31101297];
        var pp16 = $scope.item.obji16[31101298];
        var p17 = $scope.item.obji17[31101297];
        var pp17 = $scope.item.obji17[31101298];
        var p18 = $scope.item.obji18[31101297];
        var pp18 = $scope.item.obji18[31101298];
        var p19 = $scope.item.obji19[31101297];
        var pp19 = $scope.item.obji19[31101298];
        var p20 = $scope.item.obji20[31101297];
        var pp20 = $scope.item.obji20[31101298];
		
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
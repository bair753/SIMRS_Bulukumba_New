<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengkajian Harian Hemodialisis</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
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
<body ng-controller="cetakPengkajianHarianHemodialisis">
    <table width='100%'>
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @endif
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder">No. RM </td>
            <td colspan="13" class="noborder">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Nama Lengkap</td>
            <td colspan="11" class="noborder">
                : {!!  $res['d'][0]->namapasien  !!}
            </td>
            <td colspan="2" class="noborder">{!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">89</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PENGKAJIAN HARIAN HEMODIALISIS</th>
        </tr>
		<tr class="noborder" height="20">
			<td colspan="5" class="border-rl noborder"></td>
			<td colspan="30" class="noborder"></td>
			<td colspan="4" class="noborder"></td>
			<td colspan="10" class="noborder"></td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Tanggal / Jam</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@{{item.obj[428950] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">No Mesin</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@{{ item.obj[428959] ? item.obj[428959] : '' }}</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Nama Pasien</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!!  $res['d'][0]->namapasien  !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Hemodialisis ke-</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@{{ item.obj[428960] ? item.obj[428960] : '' }}</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Tanggal Lahir</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Tipe Dialiser</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="17">@{{ item.obj[428961] ? item.obj[428961] : '' }}</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Nomor RM</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">{!!  $res['d'][0]->nocm  !!}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Riwayat Alergi Obat</td>
			<td class="noborder">:</td>
			<td colspan="5" class="noborder">@{{ item.obj[428963] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
			<td class="noborder" colspan="5">@{{ item.obj[428964] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya : @{{ item.obj[428965] ? item.obj[428965] : '' }}</td>
		</tr>
		<tr>
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Alamat</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@{{ item.obj[428957] ? item.obj[428957] : '' }}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder"></td>
			<td class="noborder" colspan="17"></td>
		</tr>
		<tr class="btm">
			<td colspan="1" class="noborder"></td>
			<td colspan="5" class="noborder">Diagnosa Medis</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="15">@{{ item.obj[428958] ? item.obj[428958] : '' }}</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder"></td>
			<td class="noborder" colspan="17"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">
				<strong><U>PENGKAJIAN KEPERAWATAN</U></strong>
			</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">1.	KELUHAN UTAMA : @{{ item.obj[428966] ? item.obj[428966] : '' }}</td>
		</tr>
		<tr></tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">2.	PENILAIAN NYERI </td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">NYERI</td>
			<td class="noborder">:</td>
			<td colspan="4" class="noborder">@{{ item.obj[428969] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
			<td colspan="4" class="noborder">@{{ item.obj[428970] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">a.	Onset</td>
			<td class="noborder">:</td>
			<td colspan="4" class="noborder">@{{ item.obj[428972] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Akut</td>
			<td colspan="4" class="noborder">@{{ item.obj[428973] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kronik</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">b.	Pencetus</td>
			<td class="noborder">:</td>
			<td colspan="10" class="noborder">@{{ item.obj[428974] ? item.obj[428974] : '' }}</td>
			<td colspan="7" class="noborder">Gambaran Nyeri</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7">@{{ item.obj[428975] ? item.obj[428975] : '' }}</td>
			<td class="noborder" colspan="6">Lokasi Nyeri</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="9">@{{ item.obj[428976] ? item.obj[428976] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">c.	Durasi</td>
			<td class="noborder">:</td>
			<td colspan="10" class="noborder">@{{ item.obj[428977] ? item.obj[428977] : '' }}</td>
			<td colspan="7" class="noborder">Frekuensi</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7">@{{ item.obj[428978] ? item.obj[428978] : '' }}</td>
			
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="6">d.	Skala nyeri</td>
			<td class="noborder">:</td>
			<td colspan="30" class="noborder">@{{ item.obj[428979] ? item.obj[428979] : '' }} (Metode VAS/ NRS/ BPS/ FLACC/ NIPS)</td>
		</tr>
		<tr class="btm"></tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="31" class="noborder btp">3.	PEMERIKSAAN FISIK</td>
			<td colspan="17">4.	PEMERIKSAAN PENUNJANG</td>
		</tr>
		<tr>
			<td class="noborder btp"></td>
			<td colspan="16" class="noborder btp" ></td>
			<td colspan="15" class="noborder blf btp"></td>
			<td colspan="17" class="noborder blf"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder" >a.	Keadaan Umum</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder">@{{ item.obj[428977] ? item.obj[428977] : '' }}</td>
			<td colspan="15" class="noborder blf br"> Pemeriksaan fisik tambahan : @{{ item.obj[428991] ? item.obj[428991] : '' }}</td>
			<td colspan="17" class="noborder">@{{ item.obj[428992] ? item.obj[428992] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">b.	Tekanan Darah</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428982] ? item.obj[428982] : '___' }} mmHg</td>
			<td colspan="15" class="noborder br"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">c.	Frekuensi Nadi</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428983] ? item.obj[428983] : '___' }} x/mnt</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">d.	Frekuensi Napas</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428984] ? item.obj[428984] : '___' }} x/mnt</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">e.	Suhu</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428985] ? item.obj[428985] : '___' }} &#8451;</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">f.	Berat Badan Pre HD</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428986] ? item.obj[428986] : '___' }} kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">g.	Berat Badan Post HD</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428987] ? item.obj[428987] : '___' }} kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">h.	Berat Badan Kering</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428988] ? item.obj[428988] : '___' }} kg</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">i.	Tinggi Badan</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428989] ? item.obj[428989] : '___' }} cm</td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="8" class="noborder">i.	IMT</td>
			<td class="noborder">:</td>
			<td colspan="7" class="noborder br">@{{ item.obj[428990] ? item.obj[428990] : '___' }} kg/m<sup>2</sup></td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td colspan="8" class="noborder"></td>
			<td class="noborder"></td>
			<td colspan="7" class="noborder br"></td>
			<td class="noborder br" colspan="15"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">5.	GIZI</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="10">a.	@{{ item.obj[428994] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SGA, score total</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="10">@{{ item.obj[428995] ? item.obj[428995] : '' }}</td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="10">b.	Kesimpulan</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="7" class="noborder">@{{ item.obj[428997] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tanpa malnutrisi</td>
			<td colspan="10" class="noborder">@{{ item.obj[428998] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Malnutrisi Ringan</td>
			<td colspan="10" class="noborder">@{{ item.obj[428999] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Malnutrisi Sedang</td> 
			<td colspan="10" class="noborder">@{{ item.obj[429000] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Malnutrisi Berat</td> 
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder"><strong><u>DIAGNOSA KEPERAWATAN :</u></strong></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="16">@{{ item.obj[429002] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 1. Kelebihan volume cairan</td>
			<td class="noborder" colspan="16">@{{ item.obj[429005] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 4.	Penurunan curah jantung</td>
			<td class="noborder" colspan="16">@{{ item.obj[429008] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 7.		Risiko infeksi</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="16">@{{ item.obj[429003] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 2.	Gangguan pemenuhan oksigen</td>
			<td class="noborder" colspan="16">@{{ item.obj[429006] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 5.	Nutrisi kurang dari kebutuhan tubuh</td>
			<td class="noborder" colspan="16">@{{ item.obj[429009] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 8.		Gangguan rasa nyaman : nyeri</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder btm" colspan="16">@{{ item.obj[429004] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 3.	Gangguan keseimbangan cairan</td>
			<td class="noborder btm" colspan="16">@{{ item.obj[429007] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} 6.	Ketidakpatuhan terhadap diet</td>
			<td class="noborder" colspan="16"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong><u>INTERVENSI KEPERAWATAN (rekapitulasi pre-intra dan post-HD:</u></strong></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@{{ item.obj[429012] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Monitor berat badan, intake out put</td>
			<td colspan="24" class="noborder">@{{ item.obj[429018] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Atur posisi pasien agar ventilasi adekuat</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@{{ item.obj[429013] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Berikan terapi oksigen sesuai kebutuhan</td>
			<td colspan="24" class="noborder">@{{ item.obj[429019] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Melakukan observasi pasien (Monitor vital sign) dan mesin</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="24" class="noborder">@{{ item.obj[429014] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bila pasien mulai hipotensi (mual, muntah, keringat dingin, pusing,</td>
			<td colspan="24" class="noborder">@{{ item.obj[429020] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Hentikan HD sesuai indikasi</td>
		</tr>
		<tr>
			<td class="noborder" colspan="2"></td>
			<td class="noborder" colspan="23">kram, hipoglikemi berikan cairan sesuai SPO)</td>
			<td class="noborder" colspan="24">@{{ item.obj[429021] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Posisikan supinasi dengan elevasi kepala 30 dan elevasi kaki</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[429015] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kaji kemampuan pasien mendapatkan nutrisi yang dibutuhkan</td>
			<td class="noborder" colspan="24">@{{ item.obj[429023] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PENKES : diet, AV-Shunt, @{{ item.obj[429024] ? item.obj[429024] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[429016] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Monitor tanda dan gejala infeksi (lokal sismetik)</td>
			<td class="noborder" colspan="24">@{{ item.obj[429022] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ganti balutan luka sesuai dengan prosedur</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[429017] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Monitor kadar gula darah</td>
			<td class="noborder" colspan="24"> Monitor tanda dan gejalah hipoglikemik</td>
		</tr>
		<tr class="btm"></tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="39"><strong><u>INSTRUKSI MEDIK</u></strong></td>
			<td class="noborder" rowspan="10" colspan="9" style="padding:.5rem">
				<table style="width:100%">
					<tr>
						<td rowspan="9" class="noborder">Catatan Lain: @{{ item.obj[429052] ? item.obj[429052] : '' }}</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="text-center" colspan="5"><strong>RESEP HD :</strong></td>
			<td class="noborder"></td>
			<td colspan="5" class="noborder">@{{ item.obj[429026] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Inisiasi</td>
			<td colspan="5" class="noborder">@{{ item.obj[429027] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Akut</td>
			<td colspan="5" class="noborder">@{{ item.obj[429028] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rutin</td>
			<td class="noborder" colspan="5">@{{ item.obj[429029] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} SLED</td>
			<td class="noborder" colspan="10">@{{ item.obj[429030] ? item.obj[429030] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Time</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="10">@{{ item.obj[429031] ? item.obj[429031] : '' }} Jam</td>
			<td colspan="2" class="noborder"></td>
			<td class="noborder" colspan="10">Heparinisasi</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Bloode Flow</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429032] ? item.obj[429032] : '' }} ml/mnt</td>
			<td class="noborder" colspan="20">@{{ item.obj[429039] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dosis Sirkulasi : @{{ item.obj[429040] ? item.obj[429040] : '' }} unit</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Dialysate Flow</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429033] ? item.obj[429033] : '' }} ml/mnt</td>
			<td class="noborder" colspan="20">@{{ item.obj[429041] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dosis Awal : @{{ item.obj[429042] ? item.obj[429042] : '' }} unit</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Ultra Filtration Goal</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429034] ? item.obj[429034] : '' }} ml</td>
			<td class="noborder" colspan="20">@{{ item.obj[429043] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dosis Pemeliharaan :</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Ultra Filtration Rate</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429035] ? item.obj[429035] : '' }} ml/jam</td>
			<td class="noborder"></td>
			<td class="noborder" colspan="4">Kontinyu</td>
			<td class="noborder" colspan="5">@{{ item.obj[429044] ? item.obj[429044] : '___' }}</td>
			<td class="noborder" colspan="3">unit/jam</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Conductivity</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429036] ? item.obj[429036] : '___' }} </td>
			<td class="noborder"></td>
			<td class="noborder" colspan="4">Intermiten</td>
			<td class="noborder" colspan="5">@{{ item.obj[429044] ? item.obj[429044] : '___' }}</td>
			<td class="noborder" colspan="3">unit/jam</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Dialysate Temperature</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429037] ? item.obj[429037] : '' }} &#8451;</td>
			<td class="noborder" colspan="20">@{{ item.obj[429046] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} LMWH : @{{ item.obj[429047] ? item.obj[429047] : '___' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="8">Akses Vaskuler</td>
			<td class="noborder" colspan="">:</td>
			<td class="noborder" colspan="12">@{{ item.obj[429038] ? item.obj[429038] : '' }} </td>
			<td class="noborder" colspan="20">@{{ item.obj[429048] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tanpa Heparin, penyebab : @{{ item.obj[429049] ? item.obj[429049] : '___' }}</td>
		</tr>
		<tr class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="8"></td>
			<td class="noborder" colspan=""></td>
			<td class="noborder" colspan="12"></td>
			<td class="noborder" colspan="20">@{{ item.obj[429050] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Program bilas NaCl 0,9% : @{{ item.obj[429051] ? item.obj[429051] : '___' }} ml/jam</td>
		</tr>
		<tr style="height:5pt" class="btm"></tr>
		<tr class="text-center">
			<td rowspan="2" colspan="4" id="rotate" class="bordered">Observasi</td>
			<td rowspan="2" colspan="3" class="bordered">Jam</td>
			<td rowspan="2" colspan="4" class="bordered">Blood Flow (ml/mnt)</td>
			<td rowspan="2" colspan="4" class="bordered">Ultra Filtration Rate (ml)</td>
			<td rowspan="2" class="bordered" colspan="4">Tekanan Darah (mmHg)</td>
			<td rowspan="2" colspan="3" class="bordered">Nadi (x/mnt)</td>
			<td rowspan="2" colspan="3" class="bordered">Suhu (&#8451;)</td>
			<td rowspan="2" colspan="4" class="bordered">Respirasi (x/mnt)</td>
			<td rowspan="" colspan="6" class="bordered">Intake</td>
			<td rowspan="" colspan="3" class="bordered">Output</td>
			<td rowspan="2" colspan="6">Keterangan Lain</td>
			<td rowspan="2" colspan="5">Paraf & Nama Jelas</td>
		</tr>
		<tr class="text-center">
			<td colspan="3">NaCi 0,9%</td>
			<td colspan="3">Lain-lain</td>
			<td colspan="3">Ultra Filtration Goal</td>
		</tr>
		<tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">PRE-HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429053] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429054] ? item.obj[429054] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429055] ? item.obj[429055] : '' }}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429056] ? item.obj[429056] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429057] ? item.obj[429057] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429058] ? item.obj[429058] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429059] ? item.obj[429059] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429060] ? item.obj[429060] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429061] ? item.obj[429061] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429062] ? item.obj[429062] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429063] ? item.obj[429063] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429064] ? item.obj[429064] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429065] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429066] ? item.obj[429066] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429067] ? item.obj[429067] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429068] ? item.obj[429068] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429069] ? item.obj[429069] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429070] ? item.obj[429070] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429071] ? item.obj[429071] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429072] ? item.obj[429072] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429073] ? item.obj[429073] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429074] ? item.obj[429074] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429075] ? item.obj[429075] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429076] ? item.obj[429076] : '' }}</td>
		</tr>
		<tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429077] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429078] ? item.obj[429078] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429079] ? item.obj[429079] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429080] ? item.obj[429080] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429081] ? item.obj[429081] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429082] ? item.obj[429082] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429083] ? item.obj[429083] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429084] ? item.obj[429084] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429085] ? item.obj[429085] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429086] ? item.obj[429086] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429087] ? item.obj[429087] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429088] ? item.obj[429088] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429089] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429090] ? item.obj[429090] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429091] ? item.obj[429091] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429092] ? item.obj[429092] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429093] ? item.obj[429093] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429094] ? item.obj[429094] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429095] ? item.obj[429095] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429096] ? item.obj[429096] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429097] ? item.obj[429097] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429098] ? item.obj[429098] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429099] ? item.obj[429099] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429100] ? item.obj[429100] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429101] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429102] ? item.obj[429102] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429103] ? item.obj[429103] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429104] ? item.obj[429104] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429105] ? item.obj[429105] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429106] ? item.obj[429106] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429107] ? item.obj[429107] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429108] ? item.obj[429108] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429109] ? item.obj[429109] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429110] ? item.obj[429110] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429111] ? item.obj[429111] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429112] ? item.obj[429112] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429113] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429114] ? item.obj[429114] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429115] ? item.obj[429115] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429116] ? item.obj[429116] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429117] ? item.obj[429117] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429118] ? item.obj[429118] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429119] ? item.obj[429119] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429120] ? item.obj[429120] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429121] ? item.obj[429121] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429122] ? item.obj[429122] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429123] ? item.obj[429123] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429124] ? item.obj[429124] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429125] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429126] ? item.obj[429126] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429127] ? item.obj[429127] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429128] ? item.obj[429128] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429129] ? item.obj[429129] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429130] ? item.obj[429130] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429131] ? item.obj[429131] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429132] ? item.obj[429132] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429133] ? item.obj[429133] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429134] ? item.obj[429134] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429135] ? item.obj[429135] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429136] ? item.obj[429136] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429137] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429138] ? item.obj[429138] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429139] ? item.obj[429139] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429140] ? item.obj[429140] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429141] ? item.obj[429141] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429142] ? item.obj[429142] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429143] ? item.obj[429143] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429144] ? item.obj[429144] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429145] ? item.obj[429145] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429146] ? item.obj[429146] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429147] ? item.obj[429147] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429148] ? item.obj[429148] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429149] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429150] ? item.obj[429150] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429151] ? item.obj[429151] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429152] ? item.obj[429152] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429153] ? item.obj[429153] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429154] ? item.obj[429154] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429155] ? item.obj[429155] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429156] ? item.obj[429156] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429157] ? item.obj[429157] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429158] ? item.obj[429158] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429159] ? item.obj[429159] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429160] ? item.obj[429160] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429161] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429162] ? item.obj[429162] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429163] ? item.obj[429163] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429164] ? item.obj[429164] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429165] ? item.obj[429165] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429166] ? item.obj[429166] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429167] ? item.obj[429167] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429168] ? item.obj[429168] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429169] ? item.obj[429169] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429170] ? item.obj[429170] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429171] ? item.obj[429171] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429172] ? item.obj[429172] : '' }}</td>
		</tr>
        <tr class="text-center">
			<td rowspan="" colspan="4" id="" class="bordered">INTRA HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429173] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429174] ? item.obj[429174] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429175] ? item.obj[429175] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429176] ? item.obj[429176] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429177] ? item.obj[429177] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429178] ? item.obj[429178] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429179] ? item.obj[429179] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429180] ? item.obj[429180] : '' }}</td>
            <td rowspan="" colspan="3" class="bordered">@{{ item.obj[429181] ? item.obj[429181] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429182] ? item.obj[429182] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429183] ? item.obj[429183] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429184] ? item.obj[429184] : '' }}</td>
		</tr>
		<tr class="text-center">
			<td rowspan="3" colspan="4" id="" class="bordered">POST-HD</td>
			<td rowspan="" colspan="3" class="bordered">@{{item.obj[429185] | toDate | date:'HH:mm'}}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429186] ? item.obj[429186] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429187] ? item.obj[429187] : '' }}</td>
			<td rowspan="" class="bordered" colspan="4">@{{ item.obj[429188] ? item.obj[429188] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429189] ? item.obj[429189] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429190] ? item.obj[429190] : '' }}</td>
			<td rowspan="" colspan="4" class="bordered">@{{ item.obj[429191] ? item.obj[429191] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429192] ? item.obj[429192] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429193] ? item.obj[429193] : '' }}</td>
			<td rowspan="" colspan="3" class="bordered">@{{ item.obj[429194] ? item.obj[429194] : '' }}</td>
			<td rowspan="" colspan="6">@{{ item.obj[429195] ? item.obj[429195] : '' }}</td>
			<td rowspan="" colspan="5">@{{ item.obj[429196] ? item.obj[429196] : '' }}</td>
		</tr>
		<tr>
			<td colspan="25" class="text-right">Jumlah</td>
			<td colspan="3" style="text-align: center">@{{ item.obj[429198] ? item.obj[429198] : '' }}</td>
			<td colspan="3" style="text-align: center">@{{ item.obj[429199] ? item.obj[429199] : '' }}</td>
			<td colspan="3" style="text-align: center">@{{ item.obj[429200] ? item.obj[429200] : '' }}</td>
			<td rowspan="2" colspan="6"></td>
			<td rowspan="2" colspan="5"></td>
		</tr>
		<tr>
			<td colspan="25" class="text-right">Total Ultra Filtration</td>
			<td colspan="9">@{{ item.obj[429201] ? item.obj[429201] : '' }} ml</td>
		</tr>
		<tr valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">EVALUASI KEPERAWATAN : @{{ item.obj[429202] ? item.obj[429202] : '' }}</td>
		</tr>
		<tr style="height: 30pt;" valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Discharge Planning : @{{ item.obj[429203] ? item.obj[429203] : '' }}</td>
		</tr>
		<tr style="height: 30pt;" valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Catatan HD yang akan datang : @{{ item.obj[429204] ? item.obj[429204] : '' }}</td>
		</tr>
		<tr valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Bulukumba, @{{item.obj[429205] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
		</tr>
		<tr valign="top" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="24">Perawat yang Bertugas :	1.  @{{ item.obj[429206] ? item.obj[429206] : '' }} (Akses),</td>
			<td colspan="24" class="noborder">2.  @{{ item.obj[429207] ? item.obj[429207] : '' }} (Observasi)</td>
		</tr>
		<tr style="height: 20pt; text-align: center;">
			<td colspan="4" rowspan="2" id="rotate">Evaluasi <br> Medik</td>
			<td colspan="15">Obat ysng Dikonsumsi</td>
			<td colspan="15">Obat Tambahan</td>
			<td colspan="15">Nama dan Tanda Tangan Dokter</td>
		</tr>
		<tr style="text-align: center;">
			<td colspan="15">@{{ item.obj[429208] ? item.obj[429208] : '' }}</td>
			<td colspan="15">@{{ item.obj[429209] ? item.obj[429209] : '' }}</td>
			<td colspan="15"><div id="qrcoded1"></div> <br> @{{ item.obj[429210] ? item.obj[429210] : '' }}</td>
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

    angular.controller('cetakPengkajianHarianHemodialisis', function ($scope, $http, httpService) {
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
        
        var d1 = $scope.item.obj[429210];

        if (d1 != undefined) {
            jQuery('#qrcoded1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d1
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
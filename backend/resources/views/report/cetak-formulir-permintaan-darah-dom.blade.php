<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulir Permintaan Darah</title>

	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			/* font-family: DejaVu Sans, Verdana, Arial, sans-serif; */
			font-family: Arial, Helvetica, sans-serif;
		}

		body,
		html {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 6pt;
			margin: 10px 20px;
		}

		@page {
			size: A4;
			margin: 1rem 1rem 1rem 3rem;
			transform: scale(72%);
		}

		table {
			border: 1px solid #000;
			border-collapse: collapse;
			table-layout: fixed;
			width: 100%;

		}

		tr {
			page-break-inside: avoid;
			page-break-after: auto
		}

		td,
		th {
			border: 1px solid #000;
			border-collapse: collapse;
			padding: .3rem;
		}

		td input {
			vertical-align: middle;
		}

		.format {
			padding: 1rem;
		}

		.no-border-table {
			border-collapse: collapse;
		}

		.no-border-table,
		.no-border-table th,
		.no-border-table td {
			border: none;
			table-layout: fixed;
			width: 100%;
		}
	</style>
</head>
@if (!empty($res['d1']))
	<body>

		<table style="text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:center;">
						<tr style="border:none;text-align:center;">
							<td style="text-align:center;border:none;">
								<strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
								JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
								TELP : {!! $res['profile']->fixedphone !!}
							</td>
						</tr>
					</table>

				</td>

				<td style="width:25%;margin:0;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:left;">
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->namapasien !!} ({!!
								$res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d1'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d1'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">126</td>
			</tr>
		</table>
		<table>

			<tr>
				<td colspan="4" style="text-align:center;background: #000;color: #fff;">
					<h1>FORMULIR PERMINTAAN DARAH</h1>
				</td>
			</tr>

			<tr>
				<td width="50%" colspan="2">
					<h2>PERMINTAAN DARAH UNTUK TRANSFUSI</h2>
					<table class="no-border-table">
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101248) {!! $item->value !!} @endif @endforeach </td>
							<td>No. Reg :</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101249) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101250) {!! $item->value !!} @endif @endforeach</td>
							<td>Kelas :</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101251) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101252) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101253) {!! $item->value !!} @endif @endforeach</td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101254) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101255) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101256) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101257) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101258) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101259) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101260) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101261) {!! $item->value !!} @endif @endforeach gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101264) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td> @foreach($res['d1'] as $item) @if($item->emrdfk == 31101265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101267) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<hr>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @foreach($res['d1'] as $item) @if($item->emrdfk == 31101268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101269) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101270) {!! $item->value !!} @endif @endforeach </td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101271) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr>
							<td colspan="6">
								<table width="100%" style="border:none;border-top:1px;font-size:5pt">
									<tr>
										<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
									</tr>
									<tr>
										<td>1. Jumlah kehamilan sebelumnya :</td>
										<td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101272) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>2. Pernah abortus :</td>
										<td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101273) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
										<td>*) @foreach($res['d1'] as $item) @if($item->emrdfk == 31101274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
										<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
									</tr>
								</table>
							</td>
						</tr>


					</table>
				</td>

				<td colspan="2">


					<h2><u><strong>Perhatian :</strong></u></h2>
					<br>
					<p class="border-bottom p05">
						*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
						Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
						Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
						Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan
						identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah
						RS setempat.
					</p>
					<h2><strong><u>HARAP DIBERIKAN</u></strong></h2>
					<table class="no-border-table" style="font-size:6pt">
						<tr>
							<td colspan="3">DARAH LENGKAP *)</td>
							<td width="20px"></td>
							<td colspan="3">RED CELL CONCENTRATE *)</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Segar (< 18 jam)</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101276) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td colspan="3">(PACKED CELLS)</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baru (< 6 hari)</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101278) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101280) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101281) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101282) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101283) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach cuci</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101284) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td width="75px">PLASMA *)</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Plasma biasa</td>
							<td>: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101286) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td></td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fresh frozen
								plasma (FFP)</td>
							<td>: @foreach($res['d1'] as $item) @if($item->emrdfk == 31101288) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
						</tr>

						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Thrombocyt
								concentrate (TC)</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101290) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cryoprecipitate
								AHF</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101292) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buffycoat-granulocyt concentrate</td>
							<td>:</td>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101294) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d1'] as $item) @if($item->emrdfk == 31101295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101296) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr class="text-center">
							<td colspan="4">Nama dan tanda tangan petugas</td>
							<td width="40px"></td>
							<td colspan="4">Nama dan tanda tangan Dokter</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">Yang mengambil contoh darah O.S</td>
							<td></td>
							<td colspan="4">Yang meminta darah dan cap rumah sakit</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">
								@foreach($res['d1'] as $item) @if($item->emrdfk == 31101297) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
							<td></td>
							<td colspan="4">
								@foreach($res['d1'] as $item) @if($item->emrdfk == 31101298) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101297) {!! $item->value !!} @endif @endforeach </td>
							<td></td>
							<td colspan="4">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101298) {!! $item->value !!} @endif @endforeach </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table >
			
				<tr>
					<td colspan="5">DIISI OLEH PETUGAS UTD
						...........................................</td>
					<td colspan="3" rowspan="3">
						<table class="bordered" style="font-size:5pt;width:100%">
							<tr class="bordered">
								<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
								<td colspan="3" class="bordered" width="100px">ATD/PTTD <br> Pemeriksa</td>
							</tr>
							<tr class="bordered text-center" style="height:16px">
								<td class="bordered">Nama</td>
								<td class="bordered">Tanggal</td>
								<td class="bordered">Jam</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered" width="230px">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101305) {!! $item->value !!} @endif @endforeach
								</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101306) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101308) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101309) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered">
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101311) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101312) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="border:none;">
					<td colspan="3" rowspan="2" >
						<table class="no-border-table" style="border:none;font-size: font-size:5pt;">

							<tr>
								<td>Contoh darah O.S</td>
								
								<td>:@foreach($res['d1'] as $item) @if($item->emrdfk == 31101299) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td style="border:none;">Diterima tanggal</td>
								
								<td>:@foreach($res['d1'] as $item) @if($item->emrdfk == 31101300) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td>Jam</td>
								
								<td>:@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
							</tr>
							<tr>
								<td>ATD/PTTD Penerima</td>
								
								<td>:@foreach($res['d1'] as $item) @if($item->emrdfk == 31101301) {!! $item->value !!} @endif @endforeach </td>
							</tr>
						</table>
					</td>
					<td colspan="2" rowspan="2">
						<table class="bordered" width:'100%'>
							<tr class="bordered">
								<td class="bordered">ABO</td>
								<td class="bordered">RHESUS</td>
								<td class="bordered">LAIN</td>
							</tr>
							<tr class="bordered">
								<td height="45" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101302) {!! $item->value !!} @endif @endforeach </td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101303) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101304) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>

		<table class="bordered" style="font-size: 6pt;text-align: center;">
			<tr>
				<td rowspan="3" class="bordered rotate">Nomor</td>
				<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
				<td class="bordered">ABO</td>
				<td class="bordered">RHESUS</td>
				<td class="bordered">LAIN2</td>
				<td class="bordered" rowspan="2" colspan="3">ATD/PTTD yang mengeluarkan darah</td>
				<td class="bordered" rowspan="2">Keluarga / Petugas yang mengambil darah</td>
			</tr>
			<tr>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101314) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101315) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101316) {!! $item->value !!} @endif @endforeach</td>
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
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101317) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101318) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101319) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101320) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101321) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101322) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">2</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101323) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101324) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101325) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101326) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">3</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101327) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101328) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111270) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101329) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">4</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101330) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101331) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111271) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101332) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">5</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101333) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101334) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111272) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101335) {!! $item->value !!} @endif @endforeach </td>
			</tr>
			<tr>
				<td class="bordered">6</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101336) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101337) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111273) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101339) {!! $item->value !!} @endif @endforeach </td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101340) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101341) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">7</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101342) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101343) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111274) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101344) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">8</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101345) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101346) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111275) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101347) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">9</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101348) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101349) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111276) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101350) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">10</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101351) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101352) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 32111277) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101353) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">11</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101354) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101355) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101356) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101357) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101358) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101359) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">12</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101360) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101361) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101362) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101363) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">13</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101364) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101365) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101366) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101367) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">14</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101368) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101369) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101370) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101371) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">15</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101372) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101373) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101374) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d1'] as $item) @if($item->emrdfk == 31101375) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="10" style="text-align: left;">
					<ul>
						<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
						<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke
							ruangan</li>
					</ul>
				</td>
			</tr>
		</table>

	</body>
@endif

@if (!empty($res['d2']))
	<body>

		<table style="text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:center;">
						<tr style="border:none;text-align:center;">
							<td style="text-align:center;border:none;">
								<strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
								JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
								TELP : {!! $res['profile']->fixedphone !!}
							</td>
						</tr>
					</table>

				</td>

				<td style="width:25%;margin:0;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:left;">
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->namapasien !!} ({!!
								$res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d2'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d2'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">126</td>
			</tr>
		</table>
		<table>

			<tr>
				<td colspan="4" style="text-align:center;background: #000;color: #fff;">
					<h1>FORMULIR PERMINTAAN DARAH</h1>
				</td>
			</tr>

			<tr>
				<td width="50%" colspan="2">
					<h2>PERMINTAAN DARAH UNTUK TRANSFUSI</h2>
					<table class="no-border-table">
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101248) {!! $item->value !!} @endif @endforeach </td>
							<td>No. Reg :</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101249) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101250) {!! $item->value !!} @endif @endforeach</td>
							<td>Kelas :</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101251) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101252) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101253) {!! $item->value !!} @endif @endforeach</td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101254) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101255) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101256) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101257) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101258) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101259) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101260) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101261) {!! $item->value !!} @endif @endforeach gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101264) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td> @foreach($res['d2'] as $item) @if($item->emrdfk == 31101265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101267) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<hr>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @foreach($res['d2'] as $item) @if($item->emrdfk == 31101268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101269) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101270) {!! $item->value !!} @endif @endforeach </td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101271) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr>
							<td colspan="6">
								<table width="100%" style="border:none;border-top:1px;font-size:5pt">
									<tr>
										<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
									</tr>
									<tr>
										<td>1. Jumlah kehamilan sebelumnya :</td>
										<td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101272) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>2. Pernah abortus :</td>
										<td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101273) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
										<td>*) @foreach($res['d2'] as $item) @if($item->emrdfk == 31101274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
										<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
									</tr>
								</table>
							</td>
						</tr>


					</table>
				</td>

				<td colspan="2">


					<h2><u><strong>Perhatian :</strong></u></h2>
					<br>
					<p class="border-bottom p05">
						*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
						Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
						Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
						Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan
						identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah
						RS setempat.
					</p>
					<h2><strong><u>HARAP DIBERIKAN</u></strong></h2>
					<table class="no-border-table" style="font-size:6pt">
						<tr>
							<td colspan="3">DARAH LENGKAP *)</td>
							<td width="20px"></td>
							<td colspan="3">RED CELL CONCENTRATE *)</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Segar (< 18 jam)</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101276) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td colspan="3">(PACKED CELLS)</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baru (< 6 hari)</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101278) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101280) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101281) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101282) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101283) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach cuci</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101284) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td width="75px">PLASMA *)</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Plasma biasa</td>
							<td>: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101286) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td></td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fresh frozen
								plasma (FFP)</td>
							<td>: @foreach($res['d2'] as $item) @if($item->emrdfk == 31101288) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
						</tr>

						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Thrombocyt
								concentrate (TC)</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101290) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cryoprecipitate
								AHF</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101292) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buffycoat-granulocyt concentrate</td>
							<td>:</td>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101294) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d2'] as $item) @if($item->emrdfk == 31101295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101296) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr class="text-center">
							<td colspan="4">Nama dan tanda tangan petugas</td>
							<td width="40px"></td>
							<td colspan="4">Nama dan tanda tangan Dokter</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">Yang mengambil contoh darah O.S</td>
							<td></td>
							<td colspan="4">Yang meminta darah dan cap rumah sakit</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">
								@foreach($res['d2'] as $item) @if($item->emrdfk == 31101297) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
							<td></td>
							<td colspan="4">
								@foreach($res['d2'] as $item) @if($item->emrdfk == 31101298) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101297) {!! $item->value !!} @endif @endforeach </td>
							<td></td>
							<td colspan="4">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101298) {!! $item->value !!} @endif @endforeach </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table >
			
				<tr>
					<td colspan="5">DIISI OLEH PETUGAS UTD
						...........................................</td>
					<td colspan="3" rowspan="3">
						<table class="bordered" style="font-size:5pt;width:100%">
							<tr class="bordered">
								<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
								<td colspan="3" class="bordered" width="100px">ATD/PTTD <br> Pemeriksa</td>
							</tr>
							<tr class="bordered text-center" style="height:16px">
								<td class="bordered">Nama</td>
								<td class="bordered">Tanggal</td>
								<td class="bordered">Jam</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered" width="230px">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101305) {!! $item->value !!} @endif @endforeach
								</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101306) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101308) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101309) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered">
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101311) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101312) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="border:none;">
					<td colspan="3" rowspan="2" >
						<table class="no-border-table" style="border:none;font-size: font-size:5pt;">

							<tr>
								<td>Contoh darah O.S</td>
								
								<td>:@foreach($res['d2'] as $item) @if($item->emrdfk == 31101299) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td style="border:none;">Diterima tanggal</td>
								
								<td>:@foreach($res['d2'] as $item) @if($item->emrdfk == 31101300) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td>Jam</td>
								
								<td>:@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
							</tr>
							<tr>
								<td>ATD/PTTD Penerima</td>
								
								<td>:@foreach($res['d2'] as $item) @if($item->emrdfk == 31101301) {!! $item->value !!} @endif @endforeach </td>
							</tr>
						</table>
					</td>
					<td colspan="2" rowspan="2">
						<table class="bordered" width:'100%'>
							<tr class="bordered">
								<td class="bordered">ABO</td>
								<td class="bordered">RHESUS</td>
								<td class="bordered">LAIN</td>
							</tr>
							<tr class="bordered">
								<td height="45" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101302) {!! $item->value !!} @endif @endforeach </td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101303) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101304) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>

		<table class="bordered" style="font-size: 6pt;text-align: center;">
			<tr>
				<td rowspan="3" class="bordered rotate">Nomor</td>
				<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
				<td class="bordered">ABO</td>
				<td class="bordered">RHESUS</td>
				<td class="bordered">LAIN2</td>
				<td class="bordered" rowspan="2" colspan="3">ATD/PTTD yang mengeluarkan darah</td>
				<td class="bordered" rowspan="2">Keluarga / Petugas yang mengambil darah</td>
			</tr>
			<tr>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101314) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101315) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101316) {!! $item->value !!} @endif @endforeach</td>
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
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101317) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101318) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101319) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101320) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101321) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101322) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">2</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101323) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101324) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101325) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101326) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">3</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101327) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101328) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111270) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101329) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">4</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101330) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101331) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111271) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101332) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">5</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101333) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101334) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111272) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101335) {!! $item->value !!} @endif @endforeach </td>
			</tr>
			<tr>
				<td class="bordered">6</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101336) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101337) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111273) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101339) {!! $item->value !!} @endif @endforeach </td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101340) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101341) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">7</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101342) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101343) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111274) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101344) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">8</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101345) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101346) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111275) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101347) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">9</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101348) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101349) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111276) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101350) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">10</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101351) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101352) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 32111277) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101353) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">11</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101354) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101355) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101356) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101357) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101358) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101359) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">12</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101360) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101361) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101362) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101363) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">13</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101364) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101365) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101366) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101367) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">14</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101368) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101369) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101370) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101371) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">15</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101372) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101373) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101374) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d2'] as $item) @if($item->emrdfk == 31101375) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="10" style="text-align: left;">
					<ul>
						<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
						<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke
							ruangan</li>
					</ul>
				</td>
			</tr>
		</table>

	</body>
@endif

@if (!empty($res['d3']))
	<body>

		<table style="text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:center;">
						<tr style="border:none;text-align:center;">
							<td style="text-align:center;border:none;">
								<strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
								JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
								TELP : {!! $res['profile']->fixedphone !!}
							</td>
						</tr>
					</table>

				</td>

				<td style="width:25%;margin:0;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:left;">
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->namapasien !!} ({!!
								$res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d3'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d3'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">126</td>
			</tr>
		</table>
		<table>

			<tr>
				<td colspan="4" style="text-align:center;background: #000;color: #fff;">
					<h1>FORMULIR PERMINTAAN DARAH</h1>
				</td>
			</tr>

			<tr>
				<td width="50%" colspan="2">
					<h2>PERMINTAAN DARAH UNTUK TRANSFUSI</h2>
					<table class="no-border-table">
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101248) {!! $item->value !!} @endif @endforeach </td>
							<td>No. Reg :</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101249) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101250) {!! $item->value !!} @endif @endforeach</td>
							<td>Kelas :</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101251) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101252) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101253) {!! $item->value !!} @endif @endforeach</td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101254) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101255) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101256) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101257) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101258) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101259) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101260) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101261) {!! $item->value !!} @endif @endforeach gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101264) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td> @foreach($res['d3'] as $item) @if($item->emrdfk == 31101265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101267) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<hr>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @foreach($res['d3'] as $item) @if($item->emrdfk == 31101268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101269) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101270) {!! $item->value !!} @endif @endforeach </td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101271) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr>
							<td colspan="6">
								<table width="100%" style="border:none;border-top:1px;font-size:5pt">
									<tr>
										<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
									</tr>
									<tr>
										<td>1. Jumlah kehamilan sebelumnya :</td>
										<td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101272) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>2. Pernah abortus :</td>
										<td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101273) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
										<td>*) @foreach($res['d3'] as $item) @if($item->emrdfk == 31101274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
										<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
									</tr>
								</table>
							</td>
						</tr>


					</table>
				</td>

				<td colspan="2">


					<h2><u><strong>Perhatian :</strong></u></h2>
					<br>
					<p class="border-bottom p05">
						*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
						Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
						Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
						Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan
						identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah
						RS setempat.
					</p>
					<h2><strong><u>HARAP DIBERIKAN</u></strong></h2>
					<table class="no-border-table" style="font-size:6pt">
						<tr>
							<td colspan="3">DARAH LENGKAP *)</td>
							<td width="20px"></td>
							<td colspan="3">RED CELL CONCENTRATE *)</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Segar (< 18 jam)</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101276) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td colspan="3">(PACKED CELLS)</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baru (< 6 hari)</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101278) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101280) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101281) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101282) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101283) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach cuci</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101284) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td width="75px">PLASMA *)</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Plasma biasa</td>
							<td>: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101286) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td></td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fresh frozen
								plasma (FFP)</td>
							<td>: @foreach($res['d3'] as $item) @if($item->emrdfk == 31101288) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
						</tr>

						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Thrombocyt
								concentrate (TC)</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101290) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cryoprecipitate
								AHF</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101292) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buffycoat-granulocyt concentrate</td>
							<td>:</td>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101294) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d3'] as $item) @if($item->emrdfk == 31101295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101296) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr class="text-center">
							<td colspan="4">Nama dan tanda tangan petugas</td>
							<td width="40px"></td>
							<td colspan="4">Nama dan tanda tangan Dokter</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">Yang mengambil contoh darah O.S</td>
							<td></td>
							<td colspan="4">Yang meminta darah dan cap rumah sakit</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">
								@foreach($res['d3'] as $item) @if($item->emrdfk == 31101297) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
							<td></td>
							<td colspan="4">
								@foreach($res['d3'] as $item) @if($item->emrdfk == 31101298) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101297) {!! $item->value !!} @endif @endforeach </td>
							<td></td>
							<td colspan="4">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101298) {!! $item->value !!} @endif @endforeach </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table >
			
				<tr>
					<td colspan="5">DIISI OLEH PETUGAS UTD
						...........................................</td>
					<td colspan="3" rowspan="3">
						<table class="bordered" style="font-size:5pt;width:100%">
							<tr class="bordered">
								<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
								<td colspan="3" class="bordered" width="100px">ATD/PTTD <br> Pemeriksa</td>
							</tr>
							<tr class="bordered text-center" style="height:16px">
								<td class="bordered">Nama</td>
								<td class="bordered">Tanggal</td>
								<td class="bordered">Jam</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered" width="230px">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101305) {!! $item->value !!} @endif @endforeach
								</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101306) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101308) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101309) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered">
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101311) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101312) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="border:none;">
					<td colspan="3" rowspan="2" >
						<table class="no-border-table" style="border:none;font-size: font-size:5pt;">

							<tr>
								<td>Contoh darah O.S</td>
								
								<td>:@foreach($res['d3'] as $item) @if($item->emrdfk == 31101299) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td style="border:none;">Diterima tanggal</td>
								
								<td>:@foreach($res['d3'] as $item) @if($item->emrdfk == 31101300) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td>Jam</td>
								
								<td>:@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
							</tr>
							<tr>
								<td>ATD/PTTD Penerima</td>
								
								<td>:@foreach($res['d3'] as $item) @if($item->emrdfk == 31101301) {!! $item->value !!} @endif @endforeach </td>
							</tr>
						</table>
					</td>
					<td colspan="2" rowspan="2">
						<table class="bordered" width:'100%'>
							<tr class="bordered">
								<td class="bordered">ABO</td>
								<td class="bordered">RHESUS</td>
								<td class="bordered">LAIN</td>
							</tr>
							<tr class="bordered">
								<td height="45" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101302) {!! $item->value !!} @endif @endforeach </td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101303) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101304) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>

		<table class="bordered" style="font-size: 6pt;text-align: center;">
			<tr>
				<td rowspan="3" class="bordered rotate">Nomor</td>
				<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
				<td class="bordered">ABO</td>
				<td class="bordered">RHESUS</td>
				<td class="bordered">LAIN2</td>
				<td class="bordered" rowspan="2" colspan="3">ATD/PTTD yang mengeluarkan darah</td>
				<td class="bordered" rowspan="2">Keluarga / Petugas yang mengambil darah</td>
			</tr>
			<tr>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101314) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101315) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101316) {!! $item->value !!} @endif @endforeach</td>
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
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101317) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101318) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101319) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101320) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101321) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101322) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">2</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101323) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101324) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101325) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101326) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">3</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101327) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101328) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111270) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101329) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">4</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101330) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101331) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111271) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101332) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">5</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101333) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101334) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111272) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101335) {!! $item->value !!} @endif @endforeach </td>
			</tr>
			<tr>
				<td class="bordered">6</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101336) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101337) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111273) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101339) {!! $item->value !!} @endif @endforeach </td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101340) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101341) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">7</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101342) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101343) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111274) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101344) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">8</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101345) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101346) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111275) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101347) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">9</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101348) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101349) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111276) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101350) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">10</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101351) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101352) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 32111277) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101353) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">11</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101354) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101355) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101356) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101357) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101358) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101359) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">12</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101360) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101361) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101362) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101363) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">13</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101364) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101365) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101366) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101367) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">14</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101368) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101369) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101370) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101371) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">15</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101372) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101373) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101374) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d3'] as $item) @if($item->emrdfk == 31101375) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="10" style="text-align: left;">
					<ul>
						<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
						<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke
							ruangan</li>
					</ul>
				</td>
			</tr>
		</table>

	</body>
@endif

@if (!empty($res['d4']))
	<body>

		<table style="text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:center;">
						<tr style="border:none;text-align:center;">
							<td style="text-align:center;border:none;">
								<strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
								JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
								TELP : {!! $res['profile']->fixedphone !!}
							</td>
						</tr>
					</table>

				</td>

				<td style="width:25%;margin:0;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:left;">
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->namapasien !!} ({!!
								$res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d4'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d4'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">126</td>
			</tr>
		</table>
		<table>

			<tr>
				<td colspan="4" style="text-align:center;background: #000;color: #fff;">
					<h1>FORMULIR PERMINTAAN DARAH</h1>
				</td>
			</tr>

			<tr>
				<td width="50%" colspan="2">
					<h2>PERMINTAAN DARAH UNTUK TRANSFUSI</h2>
					<table class="no-border-table">
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101248) {!! $item->value !!} @endif @endforeach </td>
							<td>No. Reg :</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101249) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101250) {!! $item->value !!} @endif @endforeach</td>
							<td>Kelas :</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101251) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101252) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101253) {!! $item->value !!} @endif @endforeach</td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101254) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101255) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101256) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101257) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101258) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101259) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101260) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101261) {!! $item->value !!} @endif @endforeach gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101264) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td> @foreach($res['d4'] as $item) @if($item->emrdfk == 31101265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101267) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<hr>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @foreach($res['d4'] as $item) @if($item->emrdfk == 31101268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101269) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101270) {!! $item->value !!} @endif @endforeach </td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101271) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr>
							<td colspan="6">
								<table width="100%" style="border:none;border-top:1px;font-size:5pt">
									<tr>
										<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
									</tr>
									<tr>
										<td>1. Jumlah kehamilan sebelumnya :</td>
										<td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101272) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>2. Pernah abortus :</td>
										<td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101273) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
										<td>*) @foreach($res['d4'] as $item) @if($item->emrdfk == 31101274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
										<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
									</tr>
								</table>
							</td>
						</tr>


					</table>
				</td>

				<td colspan="2">


					<h2><u><strong>Perhatian :</strong></u></h2>
					<br>
					<p class="border-bottom p05">
						*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
						Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
						Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
						Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan
						identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah
						RS setempat.
					</p>
					<h2><strong><u>HARAP DIBERIKAN</u></strong></h2>
					<table class="no-border-table" style="font-size:6pt">
						<tr>
							<td colspan="3">DARAH LENGKAP *)</td>
							<td width="20px"></td>
							<td colspan="3">RED CELL CONCENTRATE *)</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Segar (< 18 jam)</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101276) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td colspan="3">(PACKED CELLS)</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baru (< 6 hari)</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101278) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101280) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101281) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101282) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101283) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach cuci</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101284) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td width="75px">PLASMA *)</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Plasma biasa</td>
							<td>: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101286) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td></td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fresh frozen
								plasma (FFP)</td>
							<td>: @foreach($res['d4'] as $item) @if($item->emrdfk == 31101288) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
						</tr>

						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Thrombocyt
								concentrate (TC)</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101290) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cryoprecipitate
								AHF</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101292) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buffycoat-granulocyt concentrate</td>
							<td>:</td>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101294) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d4'] as $item) @if($item->emrdfk == 31101295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101296) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr class="text-center">
							<td colspan="4">Nama dan tanda tangan petugas</td>
							<td width="40px"></td>
							<td colspan="4">Nama dan tanda tangan Dokter</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">Yang mengambil contoh darah O.S</td>
							<td></td>
							<td colspan="4">Yang meminta darah dan cap rumah sakit</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">
								@foreach($res['d4'] as $item) @if($item->emrdfk == 31101297) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
							<td></td>
							<td colspan="4">
								@foreach($res['d4'] as $item) @if($item->emrdfk == 31101298) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101297) {!! $item->value !!} @endif @endforeach </td>
							<td></td>
							<td colspan="4">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101298) {!! $item->value !!} @endif @endforeach </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table >
			
				<tr>
					<td colspan="5">DIISI OLEH PETUGAS UTD
						...........................................</td>
					<td colspan="3" rowspan="3">
						<table class="bordered" style="font-size:5pt;width:100%">
							<tr class="bordered">
								<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
								<td colspan="3" class="bordered" width="100px">ATD/PTTD <br> Pemeriksa</td>
							</tr>
							<tr class="bordered text-center" style="height:16px">
								<td class="bordered">Nama</td>
								<td class="bordered">Tanggal</td>
								<td class="bordered">Jam</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered" width="230px">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101305) {!! $item->value !!} @endif @endforeach
								</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101306) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101308) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101309) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered">
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101311) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101312) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="border:none;">
					<td colspan="3" rowspan="2" >
						<table class="no-border-table" style="border:none;font-size: font-size:5pt;">

							<tr>
								<td>Contoh darah O.S</td>
								
								<td>:@foreach($res['d4'] as $item) @if($item->emrdfk == 31101299) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td style="border:none;">Diterima tanggal</td>
								
								<td>:@foreach($res['d4'] as $item) @if($item->emrdfk == 31101300) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td>Jam</td>
								
								<td>:@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
							</tr>
							<tr>
								<td>ATD/PTTD Penerima</td>
								
								<td>:@foreach($res['d4'] as $item) @if($item->emrdfk == 31101301) {!! $item->value !!} @endif @endforeach </td>
							</tr>
						</table>
					</td>
					<td colspan="2" rowspan="2">
						<table class="bordered" width:'100%'>
							<tr class="bordered">
								<td class="bordered">ABO</td>
								<td class="bordered">RHESUS</td>
								<td class="bordered">LAIN</td>
							</tr>
							<tr class="bordered">
								<td height="45" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101302) {!! $item->value !!} @endif @endforeach </td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101303) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101304) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>

		<table class="bordered" style="font-size: 6pt;text-align: center;">
			<tr>
				<td rowspan="3" class="bordered rotate">Nomor</td>
				<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
				<td class="bordered">ABO</td>
				<td class="bordered">RHESUS</td>
				<td class="bordered">LAIN2</td>
				<td class="bordered" rowspan="2" colspan="3">ATD/PTTD yang mengeluarkan darah</td>
				<td class="bordered" rowspan="2">Keluarga / Petugas yang mengambil darah</td>
			</tr>
			<tr>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101314) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101315) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101316) {!! $item->value !!} @endif @endforeach</td>
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
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101317) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101318) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101319) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101320) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101321) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101322) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">2</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101323) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101324) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101325) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101326) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">3</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101327) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101328) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111270) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101329) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">4</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101330) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101331) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111271) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101332) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">5</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101333) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101334) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111272) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101335) {!! $item->value !!} @endif @endforeach </td>
			</tr>
			<tr>
				<td class="bordered">6</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101336) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101337) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111273) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101339) {!! $item->value !!} @endif @endforeach </td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101340) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101341) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">7</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101342) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101343) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111274) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101344) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">8</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101345) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101346) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111275) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101347) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">9</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101348) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101349) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111276) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101350) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">10</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101351) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101352) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 32111277) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101353) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">11</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101354) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101355) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101356) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101357) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101358) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101359) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">12</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101360) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101361) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101362) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101363) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">13</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101364) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101365) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101366) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101367) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">14</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101368) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101369) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101370) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101371) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">15</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101372) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101373) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101374) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d4'] as $item) @if($item->emrdfk == 31101375) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="10" style="text-align: left;">
					<ul>
						<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
						<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke
							ruangan</li>
					</ul>
				</td>
			</tr>
		</table>

	</body>
@endif

@if (!empty($res['d5']))
	<body>

		<table style="text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:center;">
						<tr style="border:none;text-align:center;">
							<td style="text-align:center;border:none;">
								<strong style="font-size: 11pt">{!! $res['profile']->namalengkap !!}</strong> <br>
								JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
								TELP : {!! $res['profile']->fixedphone !!}
							</td>
						</tr>
					</table>

				</td>

				<td style="width:25%;margin:0;" rowspan="2">
					<table style="border:none;table-layout:fixed;text-align:left;">
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Nama Lengkap</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->namapasien !!} ({!!
								$res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d5'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr>
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d5'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">126</td>
			</tr>
		</table>
		<table>

			<tr>
				<td colspan="4" style="text-align:center;background: #000;color: #fff;">
					<h1>FORMULIR PERMINTAAN DARAH</h1>
				</td>
			</tr>

			<tr>
				<td width="50%" colspan="2">
					<h2>PERMINTAAN DARAH UNTUK TRANSFUSI</h2>
					<table class="no-border-table">
						<tr>
							<td>Rumah Sakit</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101248) {!! $item->value !!} @endif @endforeach </td>
							<td>No. Reg :</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101249) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Bagian</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101250) {!! $item->value !!} @endif @endforeach</td>
							<td>Kelas :</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101251) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Dokter yang meminta</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101252) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Nama O.S </td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101253) {!! $item->value !!} @endif @endforeach</td>
							<td>LK</td>
							<td>PR</td>
						</tr>
						<tr>
							<td>Nama Suami</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101254) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Lahir/Umur</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101255) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alamat Rumah</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101256) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Permintaan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101257) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Tgl. Diperlukan</td>
							<td>:</td>
							<td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101258) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<tr>
							<td>Diagnosa Klinis</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101259) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Alasan Transfusi</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101260) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td colspan="4">Hb: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101261) {!! $item->value !!} @endif @endforeach gr</td>
						</tr>
						<tr>
							<td>Transfusi sebelumnya</td>
							<td>*)</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101262) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101263) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Kapan: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101264) {!! $item->value !!} @endif @endforeach</td>
						</tr>
						<tr>
							<td>Reaksi Transfusi</td>
							<td>*)</td>
							<td> @foreach($res['d5'] as $item) @if($item->emrdfk == 31101265) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101266) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="4">Gejala-gejala: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101267) {!! $item->value !!} @endif @endforeach</td>
						</tr>

						<hr>
						<tr>
							<td colspan="3">Apakah pernah diperksa serologi golongan darah</td>
						</tr>
						<tr>
							<td>(Coombs test) ?</td>
							<td>*) @foreach($res['d5'] as $item) @if($item->emrdfk == 31101268) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101269) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
						</tr>
						<tr>
							<td colspan="3">Dimana: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101270) {!! $item->value !!} @endif @endforeach </td>
						</tr>
						<tr>
							<td colspan="3">Hasil: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101271) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr>
							<td colspan="6">
								<table width="100%" style="border:none;border-top:1px;font-size:5pt">
									<tr>
										<td colspan="2"><strong>Khusus untuk pasien wanita :</strong></td>
									</tr>
									<tr>
										<td>1. Jumlah kehamilan sebelumnya :</td>
										<td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101272) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>2. Pernah abortus :</td>
										<td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101273) {!! $item->value !!} @endif @endforeach </td>
									</tr>
									<tr>
										<td>3. Adakah sebelumnya penyakit hemolitik pada bayi (HDN)?</td>
										<td>*) @foreach($res['d5'] as $item) @if($item->emrdfk == 31101274) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Ya</td>
										<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak</td>
									</tr>
								</table>
							</td>
						</tr>


					</table>
				</td>

				<td colspan="2">


					<h2><u><strong>Perhatian :</strong></u></h2>
					<br>
					<p class="border-bottom p05">
						*) Beri tanda pada kotak-kotak &#9634; &#9634; &#9634; yang dimaksud
						Setiap permintaan darah harap disertai contoh darah beku 5 cc minimal 2 cc
						Nama dan identitas O.S. pada formulir dan contoh darahnya harus sama
						Sebelum transfusi, cocokkan etiket pada kantong darah dengan labelnya dan disertakan dengan
						identitas O.S. yang ditransfusi. Bila ada ketidakcocokan segera kembalikan ke UTDC/ Bank Darah
						RS setempat.
					</p>
					<h2><strong><u>HARAP DIBERIKAN</u></strong></h2>
					<table class="no-border-table" style="font-size:6pt">
						<tr>
							<td colspan="3">DARAH LENGKAP *)</td>
							<td width="20px"></td>
							<td colspan="3">RED CELL CONCENTRATE *)</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101275) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Segar (< 18 jam)</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101276) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td colspan="3">(PACKED CELLS)</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101277) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Baru (< 6 hari)</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101278) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101279) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101280) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101281) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Biasa</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101282) {!! $item->value !!} @endif @endforeach cc</td>
							<td></td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101283) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach cuci</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101284) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td width="75px">PLASMA *)</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101285) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Plasma biasa</td>
							<td>: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101286) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>
						<tr>
							<td></td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101287) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Fresh frozen
								plasma (FFP)</td>
							<td>: @foreach($res['d5'] as $item) @if($item->emrdfk == 31101288) {!! $item->value !!} @endif @endforeach cc</td>
						</tr>

						<tr>
							<td colspan="4"><u>FAKTOR PEMBEKUAN *)</u></td>
						</tr>

						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101289) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Thrombocyt
								concentrate (TC)</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101290) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101291) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Cryoprecipitate
								AHF</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101292) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101293) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buffycoat-granulocyt concentrate</td>
							<td>:</td>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101294) {!! $item->value !!} @endif @endforeach </td>
							<td>kantong</td>
						</tr>
						<tr>
							<td>@foreach($res['d5'] as $item) @if($item->emrdfk == 31101295) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Lain-lain</td>
							<td>:</td>
							<td colspan="2">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101296) {!! $item->value !!} @endif @endforeach </td>
						</tr>

						<tr class="text-center">
							<td colspan="4">Nama dan tanda tangan petugas</td>
							<td width="40px"></td>
							<td colspan="4">Nama dan tanda tangan Dokter</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">Yang mengambil contoh darah O.S</td>
							<td></td>
							<td colspan="4">Yang meminta darah dan cap rumah sakit</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">
								@foreach($res['d5'] as $item) @if($item->emrdfk == 31101297) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
							<td></td>
							<td colspan="4">
								@foreach($res['d5'] as $item) @if($item->emrdfk == 31101298) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 50px; width:50px;"> @endif @endforeach
							</td>
						</tr>
						<tr class="text-center" style="border-bottom:1px solid #000">
							<td colspan="4">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101297) {!! $item->value !!} @endif @endforeach </td>
							<td></td>
							<td colspan="4">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101298) {!! $item->value !!} @endif @endforeach </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table >
			
				<tr>
					<td colspan="5">DIISI OLEH PETUGAS UTD
						...........................................</td>
					<td colspan="3" rowspan="3">
						<table class="bordered" style="font-size:5pt;width:100%">
							<tr class="bordered">
								<td rowspan="2" height="46px" class="bordered text-center">Hasil Cross *)</td>
								<td colspan="3" class="bordered" width="100px">ATD/PTTD <br> Pemeriksa</td>
							</tr>
							<tr class="bordered text-center" style="height:16px">
								<td class="bordered">Nama</td>
								<td class="bordered">Tanggal</td>
								<td class="bordered">Jam</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered" width="230px">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101305) {!! $item->value !!} @endif @endforeach
								</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101306) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101307) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered" style="height:16px">
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101308) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101309) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101310) {!! $item->value !!} @endif @endforeach</td>
							</tr>
							<tr class="bordered">
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101311) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101312) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101313) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr style="border:none;">
					<td colspan="3" rowspan="2" >
						<table class="no-border-table" style="border:none;font-size: font-size:5pt;">

							<tr>
								<td>Contoh darah O.S</td>
								
								<td>:@foreach($res['d5'] as $item) @if($item->emrdfk == 31101299) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td style="border:none;">Diterima tanggal</td>
								
								<td>:@foreach($res['d5'] as $item) @if($item->emrdfk == 31101300) {!! $item->value !!} @endif @endforeach </td>
							</tr>
							<tr>
								<td>Jam</td>
								
								<td>:@{{item.obji20[31101300] | toDate | date:'HH:mm'}} WITA</td>
							</tr>
							<tr>
								<td>ATD/PTTD Penerima</td>
								
								<td>:@foreach($res['d5'] as $item) @if($item->emrdfk == 31101301) {!! $item->value !!} @endif @endforeach </td>
							</tr>
						</table>
					</td>
					<td colspan="2" rowspan="2">
						<table class="bordered" width:'100%'>
							<tr class="bordered">
								<td class="bordered">ABO</td>
								<td class="bordered">RHESUS</td>
								<td class="bordered">LAIN</td>
							</tr>
							<tr class="bordered">
								<td height="45" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101302) {!! $item->value !!} @endif @endforeach </td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101303) {!! $item->value !!} @endif @endforeach</td>
								<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101304) {!! $item->value !!} @endif @endforeach</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>

		<table class="bordered" style="font-size: 6pt;text-align: center;">
			<tr>
				<td rowspan="3" class="bordered rotate">Nomor</td>
				<td rowspan="2" class="bordered" colspan="2">Telah diberikan darah dengan perincian :</td>
				<td class="bordered">ABO</td>
				<td class="bordered">RHESUS</td>
				<td class="bordered">LAIN2</td>
				<td class="bordered" rowspan="2" colspan="3">ATD/PTTD yang mengeluarkan darah</td>
				<td class="bordered" rowspan="2">Keluarga / Petugas yang mengambil darah</td>
			</tr>
			<tr>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101314) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101315) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101316) {!! $item->value !!} @endif @endforeach</td>
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
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101317) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101318) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101319) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101320) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101321) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101322) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">2</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101323) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101324) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101325) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101326) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">3</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101327) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101328) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111270) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101329) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">4</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101330) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101331) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111271) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101332) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">5</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101333) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101334) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111272) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101335) {!! $item->value !!} @endif @endforeach </td>
			</tr>
			<tr>
				<td class="bordered">6</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101336) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101337) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111273) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101339) {!! $item->value !!} @endif @endforeach </td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101340) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101341) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">7</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101342) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101343) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111274) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101344) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">8</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101345) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101346) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111275) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101347) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">9</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101348) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101349) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111276) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101350) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">10</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101351) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101352) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 32111277) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101353) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">11</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101354) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101355) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101356) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101357) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101358) {!! $item->value !!} @endif @endforeach</td>
				<td rowspan="5" class="bordered" colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101359) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">12</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101360) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101361) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101362) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101363) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">13</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101364) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101365) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101366) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101367) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">14</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101368) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101369) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101370) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101371) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td class="bordered">15</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101372) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101373) {!! $item->value !!} @endif @endforeach</td>
				<td class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101374) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="2" class="bordered">@foreach($res['d5'] as $item) @if($item->emrdfk == 31101375) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="10" style="text-align: left;">
					<ul>
						<li>Lembar 1 (putih) : untuk Unit Transfusi darah (UTD)</li>
						<li>Lembar 2 (merah) disertakan bersamaan dengan kantong-kantong darah yang akan ditransfusikan ke
							ruangan</li>
					</ul>
				</td>
			</tr>
		</table>

	</body>
@endif
</html>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lembar Kerja Kelainan Pernafasan Neonatus</title>

		<style>
			@page {
				size: auto;
				size: A4 portrait;
			}

			html,
			body {
				font-family:Arial, Helvetica, sans-serif;
				font-size: 9pt;

			}

			table {
				page-break-inside: auto;
				table-layout: fixed;
				border-collapse: collapse;

				width: 100%;
			}

			tr,
			td {
				padding: .3rem;
				page-break-inside: avoid;
				page-break-after: auto;
				border: 1px solid #000;
			}

			.noborder {
				padding: .3rem;
				page-break-inside: avoid;
				page-break-after: auto;
				border: none;
			}

			.bg-dark {
				background: #000;
				color: #fff;
				font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
				font-size: x-large;
				padding: .5rem;
				height: 20pt !important;
			}
		</style>
	</head>

	<body>
		<table width="100%" style="table-layout:fixed;text-align:center;">
			<tr>
				<td style="width:15%;margin:0 auto;" rowspan="2">
					<figure style="width:60px;margin:0 auto;">
						<center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
					</figure>
				</td>
				<td style="width:35%;margin:0 auto;" rowspan="2">
					<table width="100%" style="border:none;table-layout:fixed;text-align:center;">
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
					<table width="100%" style="border:none;table-layout:fixed;text-align:left;">
						<tr class="noborder">
							<td colspan="4" style="border:none;font-size:7pt;">No. RM</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->nocm !!} </td>

						</tr>
						<tr class="noborder">
							<td colspan="4" style="border:none;font-size:7pt;">Nama</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->namapasien !!} ({!!
								$res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' !!})</td>

						</tr>
						<tr class="noborder">
							<td colspan="4" style="border:none;font-size:7pt;">Tanggal Lahir</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! date('d-m-Y',strtotime(
								$res['d'][0]->tgllahir
								)) !!}</td>
						</tr>
						<tr class="noborder">
							<td colspan="4" style="border:none;font-size:7pt;">NIK</td>
							<td style="border:none;font-size:7pt;" colspan="9">: {!! $res['d'][0]->noidentitas !!}</td>

						</tr>
					</table>

				</td>
				<td style="width:10%;margin:0 auto;background:#000;color:#fff;text-align:center;font-size:36px">
					RM</td>

			</tr>
			<tr>
				<td style="text-align:center;font-size:36px">64</td>
			</tr>
		</table>

		<table>
			<tr class="bordered bg-dark">
				<th colspan="20" height="20pt">LEMBAR KERJA KELAINAN PERNAFASAN NEONATUS</th>
			</tr>


			<tr>
				<td colspan="20" class="noborder">Memeriksa semua neonatus untuk kesulitan pernapasan. Perhatikan
					apabila frekuensi napas > 60x/menit atau Saturasi 0<sub>2</sub> &lt; 80 %
				</td>
			</tr>
			<tr>
				<td colspan="5" class="noborder" style="border-top:none">
					Frekuensi
					Napas @foreach($res['d'] as $item) @if($item->emrdfk == 1000751) {!! $item->value !!} @endif @endforeach / menit
				</td>
				<td colspan="15" class="noborder">
					Saturasi 0<sub>2</sub> @foreach($res['d'] as $item) @if($item->emrdfk == 1000752) {!! $item->value !!} @endif @endforeach %
				</td>
			</tr>


			<tr>
				<td colspan="20">Penilaian Downe Score. Lingkari yang sesuai.</td>
			</tr>
			<tr>
				<td colspan="5">PEMERIKSAAN</td>
				<td colspan="5" class="text-center">NILAI 0</td>
				<td colspan="5" class="text-center">NILAI 1</td>
				<td colspan="5" class="text-center">NILAI 2</td>
			</tr>
			<tr>
				<td colspan="5">Frekuensinapas</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000833) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach < 60/menit</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000834) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 60 - 80/menit</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000835) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach > 80/menit</td>
			</tr>
			<tr>
				<td colspan="5">Retraksi</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000837) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak ada Retraksi</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000838) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RetraksiRingan</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000839) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach RetraksiBerat</td>
			</tr>
			<tr>
				<td colspan="5">Sianosis</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000841) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak ada Sianosis</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000842) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sianosishilang dengan
					pemberian 0 <sub>2</sub></td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000843) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sianosismenetap
					walaupun diberi 0<sub>2</sub></td>
			</tr>
			<tr>
				<td colspan="5">Suara Napas</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000845) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Suara Napas di Kedua
					Paru Baik</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000846) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach SuaraNapas di Kedua
					Paru Menurun</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000847) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidakada Suara Napas di
					Kedua Paru</td>
			</tr>
			<tr>
				<td colspan="5">Merintih</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000849) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak Merintih</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000850) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dapatdidengar dengan
					Stetoskop</td>
				<td colspan="5">@foreach($res['d'] as $item) @if($item->emrdfk == 1000851) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dapatdidengar tanpa
					Alat Bantu</td>
			</tr>
			<tr>
				<td colspan="5"><strong>NILAI TOTAL</strong></td>
				<td colspan="5" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000852) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="5" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000853) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="5" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000854) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="20">Beri tanda silang : @foreach($res['d'] as $item) @if($item->emrdfk == 1000756) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
					&lt; 3 Gawat Napas Ringan @foreach($res['d'] as $item) @if($item->emrdfk == 1000757) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4-5 Gawat
					Napas Sedang @foreach($res['d'] as $item) @if($item->emrdfk == 1000758) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach > 6 Gawat Napas Berat
				</td>
			</tr>
			<tr>
				<td colspan="20">
					Dibawah ini adalah penyebab paling umum dari kesulitan bernafas. Beri tanda &#10004; pada semua yang
					sesuai *
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4" class="text-center"><strong>RDS</strong></td>
				<td colspan="4" class="text-center"><strong>Transient Tachypnea</strong></td>
				<td colspan="4" class="text-center"><strong>Radang Paru-Paru</strong></td>
				<td colspan="6" class="text-center"><strong>Sindrom Kebocoran Napas</strong></td>
			</tr>
			<tr>
				<td colspan="2">Riwayat</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000855) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Prematur &lt; 35 mgg
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000856) {!! $item->value !!} @endif @endforeach mgg</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000857) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kehamilan &gt;37 mgg
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000858) {!! $item->value !!} @endif @endforeach mgg</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000859) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach &gt; Hari</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000860) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Aspirasi Meconium</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000861) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tidak dapat steroid
					antenatal</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000862) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sectio Caesaria</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000863) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Demam</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000864) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Resusitasi lama</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000865) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Distress lebih dari
					hari</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000866) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Distress ringan dan
					membaik</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000867) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Batuk</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000868) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Antibiotik dan
					O<sub>2</sub> tidak menolong</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4"></td>
				<td colspan="4"></td>
				<td colspan="4"></td>
				<td colspan="6"></td>
			</tr>
			<tr>
				<td colspan="2">Fisik</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000869) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BB &lt; g: @foreach($res['d'] as $item) @if($item->emrdfk == 1000870) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000871) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach BB &gt; g: @foreach($res['d'] as $item) @if($item->emrdfk == 1000872) {!! $item->value !!} @endif @endforeach</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000873) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach >Demam : @foreach($res['d'] as $item) @if($item->emrdfk == 1000874) {!! $item->value !!} @endif @endforeach <sup>0</sup>C</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000875) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi berat</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000876) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pernafasan memburuk
				</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000877) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Napas bising dan basah
				</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000878) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach >Ronchi saat inspirasi
				</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000879) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Suara napas di satu
					paru menurun</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000880) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Rontgen Pola
					reticulogranular</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000881) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Retraksi minimal</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000882) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Buruk</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000883) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Rontgen : Udara keluar
					paru-paru</td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4"></td>
				<td colspan="4"></td>
				<td colspan="4"></td>
				<td colspan="6"></td>
			</tr>
			<tr valign="top">
				<td colspan="2">Terapi</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000884) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CPAP</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000885) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pertimbangkan
					O<sub>2</sub> dengan nasal Cannula aliran rendah</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000886) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 0<sub>2</sub> Nasal
					cannula </td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000887) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Penunjang oksigen </td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000888) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pertimbangkan
					surfaktant</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000889) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Observasi</td>
				<td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000890) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Antibiotik</td>
				<td colspan="6">@foreach($res['d'] as $item) @if($item->emrdfk == 1000891) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Dekompresi kebocoran
				</td>
			</tr>
			<tr>
				<td colspan="20"><small>
						Diagnosalain termasuk penyakit jantung kongenital, asidosis, tekanan paru-paru tinggi</small>
				</td>
			</tr>
			<tr>
				<td colspan="20">Catatan/Diagnosa Lain : @foreach($res['d'] as $item) @if($item->emrdfk == 1000763) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="20"><strong>Metode Penunjang 0<sub>2</sub></strong></td>
			</tr>
			<tr class="text-center">
				<td colspan="3" style="text-align: left;border:none">@foreach($res['d'] as $item) @if($item->emrdfk == 1000765) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Nasal Canula</td>
				<td colspan="2" class="noborder">(lingkari)</td>
				<td colspan="3" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000765) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach &#xbd;
				</td>
				<td colspan="2" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000766) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000767) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000768) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000769) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
				<td colspan="7" style="text-align: left;" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000770) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Liter &nbsp;&nbsp;@foreach($res['d'] as $item) @if($item->emrdfk == 1000771) {!! $item->value !!} @endif @endforeach %
					O<sub>2</sub>
			<tr class="text-center">
				<td colspan="3" style="text-align: left;" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000772) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach CPAP</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000773) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000774) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
				<td colspan="3" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000775) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
				<td colspan="2" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000776) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PEEP
				</td>
				<td colspan="3" class="noborder" style="text-align: left;"> @foreach($res['d'] as $item) @if($item->emrdfk == 1000777) {!! $item->value !!} @endif @endforeach % O<sub>2</sub></td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000778) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000779) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000780) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 6</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000781) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 7</td>
				<td colspan="" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000782) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 8</td>
				<td colspan="2" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000783) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Liter
				</td>
			</tr>
			<tr class="text-center">
				<td colspan="3" class="noborder" style="text-align: left;">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000784) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Intubasi.
				</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000784) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tipe</td>
				<td colspan="6" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000785) {!! $item->value !!} @endif @endforeach Rate</td>
				<td class="noborder"></td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000786) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 30</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000787) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PEEP</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000788) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 5</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000789) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach PIP</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000790) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 25</td>
				<td class="noborder" colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 1000791) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
					Waktu Inspirasi 0.
				</td>
			</tr>
			<tr>
				<td colspan="20" class="noborder">Catatan termasuk perubahan di atas @foreach($res['d'] as $item) @if($item->emrdfk == 1000792) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="20"><b><u></u>Antibiotik</b></td>
			</tr>
			<tr>
				<td colspan="10" class="noborder">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000793) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infan usia &#x2264; 7 hari.
					Gentamicin<sup>1</sup> 5 mg/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 1000794) {!! $item->value !!} @endif @endforeach mg IV/IM tiap @foreach($res['d'] as $item) @if($item->emrdfk == 1000795) {!! $item->value !!} @endif @endforeach jam +
				</td>
				<td class="text-center" colspan="10" rowspan="2">
					SELANG WAKTU PEMBERIAN GENTAMICIN 15 mg/kg
				</td>
			</tr>
			<tr>
				<td colspan="10" class="noborder">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&#x2264; 2kg :
					Ampicillin<sup>2</sup> mg/kg tiap 12 jam &gt;= @foreach($res['d'] as $item) @if($item->emrdfk == 1000796) {!! $item->value !!} @endif @endforeach mg
					IV tiap jam 12</td>
			</tr>
			<tr>
				<td colspan="10" class="noborder">
					&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&#x2264; 2kg : Ampicillin<sup></sup> mg/kg tiap jam = @foreach($res['d'] as $item) @if($item->emrdfk == 1000797) {!! $item->value !!} @endif @endforeach mg IV tiap jam
				</td>
				<td colspan="4"><strong><u>Berat Badan</u></strong></td>
				<td colspan="3"><strong><u>&#x2264; 7 hari</u></strong></td>
				<td colspan="3"><strong><u>8-30 hari</u></strong></td>
			</tr>
			<tr style="border-top:1px solid #000">
				<td colspan="10" class="noborder">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000799) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Infan usia &gt; 7 hari.
					Gentamicin<sup>1</sup> 5 mg/kg = @foreach($res['d'] as $item) @if($item->emrdfk == 1000800) {!! $item->value !!} @endif @endforeach mg IV/IM tiap
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000801) {!! $item->value !!} @endif @endforeach jam +
				</td>
				<td colspan="4"><strong>&#x2264; 1200 grams</strong></td>
				<td colspan="3"><strong>Tiap 48 Jam</strong></td>
				<td colspan="3"><strong>Tiap 36 Jam</strong></td>
			</tr>
			<tr>
				<td colspan="10" class="noborder">
					&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&lt; 1.2kg : Ampicillin<sup>2</sup> 50 mg/kg tiap 12 jam =
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000802) {!! $item->value !!} @endif @endforeach mg IV tiap 12 jam
				</td>
				<td colspan="4"><strong>&#x2264; 1200 grams</strong></td>
				<td colspan="3"><strong>Tiap 36 Jam</strong></td>
				<td colspan="3"><strong>Tiap 24 Jam</strong></td>
			</tr>
			<tr>
				<td colspan="10" class="noborder">
					&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &gt; 1.2kg-2.0kg : Ampicillin<sup></sup> mg/kg tiap jam = @foreach($res['d'] as $item) @if($item->emrdfk == 1000803) {!! $item->value !!} @endif @endforeach mg IVtiap jam >
				</td>
				<td colspan="10" rowspan="2"><sup>1</sup>
					Neonatal Pharmacopela, Royal Women's Hospital, Melbourne, 2013<br><sup>2</sup> Gomella,etal,
					Neonatology, McGraw Hill : 2009, page 733
				</td>
			</tr>
			<tr>
				<td colspan="10" class="noborder"> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&lt; 2kg :
					Ampicillin<sup>2</sup> 50 mg/kg tiap 8 jam = @foreach($res['d'] as $item) @if($item->emrdfk == 1000804) {!! $item->value !!} @endif @endforeach
					mg IV tiap 6 jam</td>
			</tr>
			<tr>
				<td colspan="20">
					<strong><u>Dekompresi Kebocoran</u></strong>
				</td>
			</tr>
			<tr>
				<td colspan="20" class="noborder">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000807) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Tempat membersihkan dengan iodine.
					Tanda Sarang Sterile dipakai.
				</td>
			</tr>
			<tr>
				<td colspan="4" class="noborder">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000808) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Needle Decompression
				</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000809) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kiri</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000810) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Kanan</td>
				<td colspan="3" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000811) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Atas
					Tulang Rusuk</td>
				<td colspan="3" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000812) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
					2<sup>nd</sup>Garis Midclavicular</td>
				<td colspan="8" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000813) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
					4<sup>th</sup> Garis Ketiak
				</td>
			</tr>
			<tr>
				<td colspan="6" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000814) {!! $item->value !!} @endif @endforeach mL O<sub>2</sub>
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000815) {!! $item->value !!} @endif @endforeach mL darah didapat</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000817) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 1</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000818) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 2</td>
				<td class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000819) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 3</td>
				<td colspan="2" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000820) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach 4</td>
				<td colspan="9" class="noborder">@foreach($res['d'] as $item) @if($item->emrdfk == 1000821) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach
					Percobaan</td>
			</tr>
			<tr>
				<td colspan="20" class="noborder">Lain-lain : @foreach($res['d'] as $item) @if($item->emrdfk == 1000822) {!! $item->value !!} @endif @endforeach
				</td>
			</tr>
			<tr>
				<td colspan="9" class="noborder">Tenaga Medis : @foreach($res['d'] as $item) @if($item->emrdfk == 1000823) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="5" class="noborder">
					Tgl: @foreach($res['d'] as $item) @if($item->emrdfk == 1000824) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="3" class="noborder">
					Jam: @foreach($res['d'] as $item) @if($item->emrdfk == 1000824) {!! $item->value !!} @endif @endforeach @foreach($res['d'] as $item) @if($item->emrdfk == 1000825) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Pagi
				</td>
				<td class="noborder"></td>
				<td colspan="2" class="noborder">
					@foreach($res['d'] as $item) @if($item->emrdfk == 1000826) [<img src="{{ $centang}}" width="7px" height="7px" />] @endif @endforeach Sore
				</td>
			</tr>
			<tr style="border-top:1px solid #000">
				<td colspan="20" class="noborder">
					Nama Pasien : {!! $res['d'][0]->namapasien !!}
				</td>
			<tr>
				<td colspan="5" class="noborder">
					Tanggal Lahir : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir )) !!}
				</td>
				<td colspan="15" class="noborder">
					BB : @foreach($res['d'] as $item) @if($item->emrdfk == 1000830) {!! $item->value !!} @endif @endforeach kg
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center"><b>Tanggal dan Waktu</b></td>
				<td colspan="17" style="text-align: center"><b>Keterangan</b></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000892) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000893) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000894) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000895) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000896) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000897) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000898) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000899) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000900) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000901) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000902) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000903) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000904) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000905) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000906) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000907) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000908) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000909) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000910) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000911) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000912) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000913) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000914) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000915) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000916) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000917) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000918) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000919) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000920) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000921) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000922) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000923) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000924) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000925) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000926) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000927) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000928) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000929) {!! $item->value !!} @endif @endforeach</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000930) {!! $item->value !!} @endif @endforeach
				</td>
				<td colspan="17" style="text-align: center">@foreach($res['d'] as $item) @if($item->emrdfk == 1000931) {!! $item->value !!} @endif @endforeach</td>
			</tr>
		</table>
		</div>

	</body>

</html>
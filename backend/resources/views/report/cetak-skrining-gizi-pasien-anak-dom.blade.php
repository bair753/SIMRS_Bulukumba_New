<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skrining Gizi Pada Pasien Anak</title>

    <style>
        html,
        body {
            margin-top: 10px;
            margin-left: 20px;
            /* font-family: DejaVu Sans, Arial, Helvetica, sans-serif; */
            font-family:Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            font-size: 7pt;
        }
        @page{

            size:A4;
          
        }
       
		table {
            -fs-table-paginate: paginate;
            page-break-inside:auto ;
            border:1px solid #000;
            border-collapse:collapse;
            table-layout:fixed;
        }
      
       
        tr td{
            border:1px solid #000;
            border-collapse:collapse;
            page-break-inside:avoid; 
            page-break-after:auto 
			/* padding:.1rem; */
        }
        .mintd{
            width:48pt;
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
        /* .format{
            page-break-after: always;
        } */
    </style>
</head>
@if (!empty($res['d1']))
    <body>
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
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
                    <td colspan="2" class="noborder">{!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">34.1</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">SKRINING GIZI PADA PASIEN ANAK</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Alamat</td>
                    <td colspan="18" class="noborder p3">: @foreach($res['d1'] as $item) @if($item->emrdfk ==32116647) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Pekerjaan</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d1'] as $item) @if($item->emrdfk ==32116649) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Tanggal MRS</td>
                    <td colspan="18" class="noborder p3">:@foreach($res['d1'] as $item) @if($item->emrdfk == 32116648) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Diagnosis DPJP</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d1'] as $item) @if($item->emrdfk ==32116650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder"></td>
                    <td colspan="18" class="noborder"></td>
                    <td colspan="6" class="noborder blf"></td>
                    <td colspan="19" class="noborder"></td>
                </tr>
                
                
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">No</td>
                    <td colspan="41" class="p2">Tanggal Skrining</td>
                    <td colspan="3" class="text-center">Skor I</td>
                    <td colspan="3" class="text-center">Skor II</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">1</td>
                    <td colspan="41" class="p2">Apakah anak memiliki diagnosis yang dapat mempengaruhi status gizi</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak Ada</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116651) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Memungkinkan (gangguan kebiasaan makan, anoreksia, demam tinggi, diare, dyspepsia, nyeri menelan)</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116652) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Pasti (disfagia, penyakit kronis, kesadaran menurun, pembedahan saluran cerna, penyakit kritis)</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116653) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">2</td>
                    <td colspan="41" class="p2">Asuhan nutrisi dalam 48 jam</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Adekuat dan tidak ada perubahan pola makan</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116654) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Asupan makanan tidak adekuat : ≤ 50 % dari kebiasaan makan</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116655) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak ada asupan makanan dalam 48 jam</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116656) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">3</td>
                    <td colspan="41" class="p2">Penyakit/tindakna/pembedahan dan asupan makanan</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -2 SD sampai 2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : >90% BB/TB
                        </td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116657) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -3 SD sampai &lt; -2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : 71-90% BB/TB
                        
                        </td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116658) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : &lt; -3 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : ≤70% BB/TB
                        </td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116659) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;text-align: center;">
                    <td colspan="43" class="p2">TOTAL SKOR</td>
                    <td colspan="3" class="text-center"></td>
                    <td colspan="3" class="text-center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116661) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">Risiko Bermasalah Gizi</td>
                    <td colspan="29" class="p2">Tatalaksana Gizi</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 0-1 = Risiko Rendah</td>
                    <td colspan="29" class="p2">* Skrining ulang 5 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116662) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 2-3 = Risiko Sedang</td>
                    <td colspan="29" class="p2">* Skrining ulang 3 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116663) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor >= 4 = Risiko Tinggi</td>
                    <td colspan="29" class="p2">* Tim Terapi Gizi</td>
                    
                    <td colspan="3">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116664) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING I</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d1'] as $item) @if($item->emrdfk ==32116665) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING II</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d1'] as $item) @if($item->emrdfk ==32116666) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr >
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING III</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d1'] as $item) @if($item->emrdfk ==32116667) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="3" class="p3 noborder" rowspan="2" valign="top">NB : </td>
                    <td colspan="46" class="p3 noborder">Untuk Pasien Risiko Tinggi dan malnutrisi format skrining</td>
                </tr>
                <tr>
                    <td colspan="46" class="p3 noborder">ditandatangani oleh Dokter Spesialis Gizi Klinis</td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">DPJP Utama/drSpGK**</td>
                    <td colspan="25" class="noborder">Dietisien Ruangan</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder"><div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116668) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                    <td colspan="25" class="noborder"><div style="text-align: center">@foreach($res['d1'] as $item) @if($item->emrdfk ==32116669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">(@foreach($res['d1'] as $item) @if($item->emrdfk ==32116668) {!! $item->value !!} @endif @endforeach)</td>
                    <td colspan="25" class="noborder">(@foreach($res['d1'] as $item) @if($item->emrdfk ==32116669) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49">**Form skrining gizi ditandatangani oleh dr. SpGK jika hasil skrining >= 3 dan pasien dirujuk/konsul ke TTG rumah sakit</td>
                </tr>
            </table>
        </div>   
    </body>
@endif

@if (!empty($res['d2']))
    <body>
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d2'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d2'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!!  $res['d2'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d2'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">34.1</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d2'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">SKRINING GIZI PADA PASIEN ANAK</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Alamat</td>
                    <td colspan="18" class="noborder p3">: @foreach($res['d2'] as $item) @if($item->emrdfk ==32116647) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Pekerjaan</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d2'] as $item) @if($item->emrdfk ==32116649) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Tanggal MRS</td>
                    <td colspan="18" class="noborder p3">: @{{item.obj[32116648] | toDate | date:'dd-MM-yyyy HH:mm'}}</td>
                    <td colspan="6" class="noborder blf p3">Diagnosis DPJP</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d2'] as $item) @if($item->emrdfk ==32116650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder"></td>
                    <td colspan="18" class="noborder"></td>
                    <td colspan="6" class="noborder blf"></td>
                    <td colspan="19" class="noborder"></td>
                </tr>
                
                
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">No</td>
                    <td colspan="41" class="p2">Tanggal Skrining</td>
                    <td colspan="3" class="text-center">Skor I</td>
                    <td colspan="3" class="text-center">Skor II</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">1</td>
                    <td colspan="41" class="p2">Apakah anak memiliki diagnosis yang dapat mempengaruhi status gizi</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak Ada</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116651) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Memungkinkan (gangguan kebiasaan makan, anoreksia, demam tinggi, diare, dyspepsia, nyeri menelan)</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116652) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Pasti (disfagia, penyakit kronis, kesadaran menurun, pembedahan saluran cerna, penyakit kritis)</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116653) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">2</td>
                    <td colspan="41" class="p2">Asuhan nutrisi dalam 48 jam</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Adekuat dan tidak ada perubahan pola makan</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116654) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Asupan makanan tidak adekuat : ≤ 50 % dari kebiasaan makan</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116655) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak ada asupan makanan dalam 48 jam</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116656) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">3</td>
                    <td colspan="41" class="p2">Penyakit/tindakna/pembedahan dan asupan makanan</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -2 SD sampai 2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : >90% BB/TB
                        </td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116657) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -3 SD sampai &lt; -2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : 71-90% BB/TB
                        
                        </td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116658) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : &lt; -3 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : ≤70% BB/TB
                        </td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116659) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;text-align: center;">
                    <td colspan="43" class="p2">TOTAL SKOR</td>
                    <td colspan="3" class="text-center"></td>
                    <td colspan="3" class="text-center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116661) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">Risiko Bermasalah Gizi</td>
                    <td colspan="29" class="p2">Tatalaksana Gizi</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 0-1 = Risiko Rendah</td>
                    <td colspan="29" class="p2">* Skrining ulang 5 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116662) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 2-3 = Risiko Sedang</td>
                    <td colspan="29" class="p2">* Skrining ulang 3 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116663) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor >= 4 = Risiko Tinggi</td>
                    <td colspan="29" class="p2">* Tim Terapi Gizi</td>
                    
                    <td colspan="3">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116664) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING I</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d2'] as $item) @if($item->emrdfk ==32116665) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING II</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d2'] as $item) @if($item->emrdfk ==32116666) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr >
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING III</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d2'] as $item) @if($item->emrdfk ==32116667) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="3" class="p3 noborder" rowspan="2" valign="top">NB : </td>
                    <td colspan="46" class="p3 noborder">Untuk Pasien Risiko Tinggi dan malnutrisi format skrining</td>
                </tr>
                <tr>
                    <td colspan="46" class="p3 noborder">ditandatangani oleh Dokter Spesialis Gizi Klinis</td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">DPJP Utama/drSpGK**</td>
                    <td colspan="25" class="noborder">Dietisien Ruangan</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder"><div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116668) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                    <td colspan="25" class="noborder"><div style="text-align: center">@foreach($res['d2'] as $item) @if($item->emrdfk ==32116669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">(@foreach($res['d2'] as $item) @if($item->emrdfk ==32116668) {!! $item->value !!} @endif @endforeach)</td>
                    <td colspan="25" class="noborder">(@foreach($res['d2'] as $item) @if($item->emrdfk ==32116669) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49">**Form skrining gizi ditandatangani oleh dr. SpGK jika hasil skrining >=3 dan pasien dirujuk/konsul ke TTG rumah sakit</td>
                </tr>
            </table>
        </div>   
    </body>
@endif

@if (!empty($res['d3']))
    <body>
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d3'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d3'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!!  $res['d3'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d3'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">34.1</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d3'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">SKRINING GIZI PADA PASIEN ANAK</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Alamat</td>
                    <td colspan="18" class="noborder p3">: @foreach($res['d3'] as $item) @if($item->emrdfk ==32116647) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Pekerjaan</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d3'] as $item) @if($item->emrdfk ==32116649) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Tanggal MRS</td>
                    <td colspan="18" class="noborder p3">: @{{item.obj[32116648] | toDate | date:'dd-MM-yyyy HH:mm'}}</td>
                    <td colspan="6" class="noborder blf p3">Diagnosis DPJP</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d3'] as $item) @if($item->emrdfk ==32116650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder"></td>
                    <td colspan="18" class="noborder"></td>
                    <td colspan="6" class="noborder blf"></td>
                    <td colspan="19" class="noborder"></td>
                </tr>
                
                
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">No</td>
                    <td colspan="41" class="p2">Tanggal Skrining</td>
                    <td colspan="3" class="text-center">Skor I</td>
                    <td colspan="3" class="text-center">Skor II</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">1</td>
                    <td colspan="41" class="p2">Apakah anak memiliki diagnosis yang dapat mempengaruhi status gizi</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak Ada</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116651) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Memungkinkan (gangguan kebiasaan makan, anoreksia, demam tinggi, diare, dyspepsia, nyeri menelan)</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116652) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Pasti (disfagia, penyakit kronis, kesadaran menurun, pembedahan saluran cerna, penyakit kritis)</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116653) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">2</td>
                    <td colspan="41" class="p2">Asuhan nutrisi dalam 48 jam</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Adekuat dan tidak ada perubahan pola makan</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116654) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Asupan makanan tidak adekuat : ≤ 50 % dari kebiasaan makan</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116655) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak ada asupan makanan dalam 48 jam</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116656) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">3</td>
                    <td colspan="41" class="p2">Penyakit/tindakna/pembedahan dan asupan makanan</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -2 SD sampai 2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : >90% BB/TB
                        </td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116657) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -3 SD sampai &lt; -2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : 71-90% BB/TB
                        
                        </td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116658) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : &lt; -3 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : ≤70% BB/TB
                        </td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116659) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;text-align: center;">
                    <td colspan="43" class="p2">TOTAL SKOR</td>
                    <td colspan="3" class="text-center"></td>
                    <td colspan="3" class="text-center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116661) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">Risiko Bermasalah Gizi</td>
                    <td colspan="29" class="p2">Tatalaksana Gizi</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 0-1 = Risiko Rendah</td>
                    <td colspan="29" class="p2">* Skrining ulang 5 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116662) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 2-3 = Risiko Sedang</td>
                    <td colspan="29" class="p2">* Skrining ulang 3 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116663) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor >= 4 = Risiko Tinggi</td>
                    <td colspan="29" class="p2">* Tim Terapi Gizi</td>
                    
                    <td colspan="3">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116664) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING I</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d3'] as $item) @if($item->emrdfk ==32116665) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING II</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d3'] as $item) @if($item->emrdfk ==32116666) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr >
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING III</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d3'] as $item) @if($item->emrdfk ==32116667) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="3" class="p3 noborder" rowspan="2" valign="top">NB : </td>
                    <td colspan="46" class="p3 noborder">Untuk Pasien Risiko Tinggi dan malnutrisi format skrining</td>
                </tr>
                <tr>
                    <td colspan="46" class="p3 noborder">ditandatangani oleh Dokter Spesialis Gizi Klinis</td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">DPJP Utama/drSpGK**</td>
                    <td colspan="25" class="noborder">Dietisien Ruangan</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder"><div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116668) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                    <td colspan="25" class="noborder"><div style="text-align: center">@foreach($res['d3'] as $item) @if($item->emrdfk ==32116669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">(@foreach($res['d3'] as $item) @if($item->emrdfk ==32116668) {!! $item->value !!} @endif @endforeach)</td>
                    <td colspan="25" class="noborder">(@foreach($res['d3'] as $item) @if($item->emrdfk ==32116669) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49">**Form skrining gizi ditandatangani oleh dr. SpGK jika hasil skrining >=3 dan pasien dirujuk/konsul ke TTG rumah sakit</td>
                </tr>
            </table>
        </div>   
    </body>
@endif

@if (!empty($res['d4']))
    <body>
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d4'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d4'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!!  $res['d4'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d4'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">34.1</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d4'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">SKRINING GIZI PADA PASIEN ANAK</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Alamat</td>
                    <td colspan="18" class="noborder p3">: @foreach($res['d4'] as $item) @if($item->emrdfk ==32116647) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Pekerjaan</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d4'] as $item) @if($item->emrdfk ==32116649) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Tanggal MRS</td>
                    <td colspan="18" class="noborder p3">: @{{item.obj[32116648] | toDate | date:'dd-MM-yyyy HH:mm'}}</td>
                    <td colspan="6" class="noborder blf p3">Diagnosis DPJP</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d4'] as $item) @if($item->emrdfk ==32116650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder"></td>
                    <td colspan="18" class="noborder"></td>
                    <td colspan="6" class="noborder blf"></td>
                    <td colspan="19" class="noborder"></td>
                </tr>
                
                
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">No</td>
                    <td colspan="41" class="p2">Tanggal Skrining</td>
                    <td colspan="3" class="text-center">Skor I</td>
                    <td colspan="3" class="text-center">Skor II</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">1</td>
                    <td colspan="41" class="p2">Apakah anak memiliki diagnosis yang dapat mempengaruhi status gizi</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak Ada</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116651) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Memungkinkan (gangguan kebiasaan makan, anoreksia, demam tinggi, diare, dyspepsia, nyeri menelan)</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116652) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Pasti (disfagia, penyakit kronis, kesadaran menurun, pembedahan saluran cerna, penyakit kritis)</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116653) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">2</td>
                    <td colspan="41" class="p2">Asuhan nutrisi dalam 48 jam</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Adekuat dan tidak ada perubahan pola makan</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116654) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Asupan makanan tidak adekuat : ≤ 50 % dari kebiasaan makan</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116655) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak ada asupan makanan dalam 48 jam</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116656) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">3</td>
                    <td colspan="41" class="p2">Penyakit/tindakna/pembedahan dan asupan makanan</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -2 SD sampai 2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : >90% BB/TB
                        </td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116657) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -3 SD sampai &lt; -2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : 71-90% BB/TB
                        
                        </td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116658) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : &lt; -3 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : ≤70% BB/TB
                        </td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116659) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;text-align: center;">
                    <td colspan="43" class="p2">TOTAL SKOR</td>
                    <td colspan="3" class="text-center"></td>
                    <td colspan="3" class="text-center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116661) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">Risiko Bermasalah Gizi</td>
                    <td colspan="29" class="p2">Tatalaksana Gizi</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 0-1 = Risiko Rendah</td>
                    <td colspan="29" class="p2">* Skrining ulang 5 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116662) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 2-3 = Risiko Sedang</td>
                    <td colspan="29" class="p2">* Skrining ulang 3 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116663) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor >= 4 = Risiko Tinggi</td>
                    <td colspan="29" class="p2">* Tim Terapi Gizi</td>
                    
                    <td colspan="3">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116664) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING I</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d4'] as $item) @if($item->emrdfk ==32116665) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING II</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d4'] as $item) @if($item->emrdfk ==32116666) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr >
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING III</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d4'] as $item) @if($item->emrdfk ==32116667) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="3" class="p3 noborder" rowspan="2" valign="top">NB : </td>
                    <td colspan="46" class="p3 noborder">Untuk Pasien Risiko Tinggi dan malnutrisi format skrining</td>
                </tr>
                <tr>
                    <td colspan="46" class="p3 noborder">ditandatangani oleh Dokter Spesialis Gizi Klinis</td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">DPJP Utama/drSpGK**</td>
                    <td colspan="25" class="noborder">Dietisien Ruangan</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder"><div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116668) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                    <td colspan="25" class="noborder"><div style="text-align: center">@foreach($res['d4'] as $item) @if($item->emrdfk ==32116669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">(@foreach($res['d4'] as $item) @if($item->emrdfk ==32116668) {!! $item->value !!} @endif @endforeach)</td>
                    <td colspan="25" class="noborder">(@foreach($res['d4'] as $item) @if($item->emrdfk ==32116669) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49">**Form skrining gizi ditandatangani oleh dr. SpGK jika hasil skrining >=3 dan pasien dirujuk/konsul ke TTG rumah sakit</td>
                </tr>
            </table>
        </div>   
    </body>
@endif

@if (!empty($res['d5']))
    <body>
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder">No. RM </td>
                    <td colspan="13" class="noborder">
                        : {!! $res['d5'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Nama Lengkap</td>
                    <td colspan="11" class="noborder">
                        : {!!  $res['d5'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!!  $res['d5'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">Tanggal Lahir</td>
                    <td colspan="13" class="noborder">
                        : {!! date('d-m-Y',strtotime( $res['d5'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xx-large;text-align:center">34.1</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder">NIK</td>
                    <td colspan="11" class="noborder">
                        : {!! $res['d5'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">SKRINING GIZI PADA PASIEN ANAK</th>
                </tr>
                <tr class="bordered bg-dark-small">
                    <th colspan="49" height="20pt">(diisi oleh Dietisien)</th>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Alamat</td>
                    <td colspan="18" class="noborder p3">: @foreach($res['d5'] as $item) @if($item->emrdfk ==32116647) {!! $item->value !!} @endif @endforeach</td>
                    <td colspan="6" class="noborder blf p3">Pekerjaan</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d5'] as $item) @if($item->emrdfk ==32116649) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder p3">Tanggal MRS</td>
                    <td colspan="18" class="noborder p3">: @{{item.obj[32116648] | toDate | date:'dd-MM-yyyy HH:mm'}}</td>
                    <td colspan="6" class="noborder blf p3">Diagnosis DPJP</td>
                    <td colspan="19" class="noborder p3">: @foreach($res['d5'] as $item) @if($item->emrdfk ==32116650) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="6" class="noborder"></td>
                    <td colspan="18" class="noborder"></td>
                    <td colspan="6" class="noborder blf"></td>
                    <td colspan="19" class="noborder"></td>
                </tr>
                
                
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">No</td>
                    <td colspan="41" class="p2">Tanggal Skrining</td>
                    <td colspan="3" class="text-center">Skor I</td>
                    <td colspan="3" class="text-center">Skor II</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center">1</td>
                    <td colspan="41" class="p2">Apakah anak memiliki diagnosis yang dapat mempengaruhi status gizi</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak Ada</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116651) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Memungkinkan (gangguan kebiasaan makan, anoreksia, demam tinggi, diare, dyspepsia, nyeri menelan)</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116652) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Pasti (disfagia, penyakit kronis, kesadaran menurun, pembedahan saluran cerna, penyakit kritis)</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116653) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">2</td>
                    <td colspan="41" class="p2">Asuhan nutrisi dalam 48 jam</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Adekuat dan tidak ada perubahan pola makan</td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116654) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Asupan makanan tidak adekuat : ≤ 50 % dari kebiasaan makan</td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116655) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr class="btm">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Tidak ada asupan makanan dalam 48 jam</td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116656) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder">3</td>
                    <td colspan="41" class="p2">Penyakit/tindakna/pembedahan dan asupan makanan</td>
                    <td colspan="6" class="text-center"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -2 SD sampai 2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : >90% BB/TB
                        </td>
                    <td colspan="3" class="text-center">0</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116657) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : -3 SD sampai &lt; -2 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : 71-90% BB/TB
                        
                        </td>
                    <td colspan="3" class="text-center">2</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116658) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="41" class="p2">Anak &lt; 5 tahun : &lt; -3 SD berdasarkan BB/PB (TB) <br>
                        Anak > 5 tahun : ≤70% BB/TB
                        </td>
                    <td colspan="3" class="text-center">3</td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116659) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;text-align: center;">
                    <td colspan="43" class="p2">TOTAL SKOR</td>
                    <td colspan="3" class="text-center"></td>
                    <td colspan="3" class="text-center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116661) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">Risiko Bermasalah Gizi</td>
                    <td colspan="29" class="p2">Tatalaksana Gizi</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 0-1 = Risiko Rendah</td>
                    <td colspan="29" class="p2">* Skrining ulang 5 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116662) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor 2-3 = Risiko Sedang</td>
                    <td colspan="29" class="p2">* Skrining ulang 3 hari (Terapi gizi oleh DPJP + Dietisien)</td>
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116663) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr style="font-weight: bolder;">
                    <td colspan="2" class="text-center noborder"></td>
                    <td colspan="15" class="p2">* Skor >= 4 = Risiko Tinggi</td>
                    <td colspan="29" class="p2">* Tim Terapi Gizi</td>
                    
                    <td colspan="3">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116664) {!! $item->value !!} @endif @endforeach</td>
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING I</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d5'] as $item) @if($item->emrdfk ==32116665) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING II</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d5'] as $item) @if($item->emrdfk ==32116666) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr >
                    <td colspan="14" class="text-center p2" style="font-weight: bolder;">SKRINING III</td>
                    <td colspan="35" class="p2">Dietisien : @foreach($res['d5'] as $item) @if($item->emrdfk ==32116667) {!! $item->value !!} @endif @endforeach</td>
                            
                </tr>
                <tr>
                    <td colspan="3" class="p3 noborder" rowspan="2" valign="top">NB : </td>
                    <td colspan="46" class="p3 noborder">Untuk Pasien Risiko Tinggi dan malnutrisi format skrining</td>
                </tr>
                <tr>
                    <td colspan="46" class="p3 noborder">ditandatangani oleh Dokter Spesialis Gizi Klinis</td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr>
                    <td colspan="49" class="noborder"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">DPJP Utama/drSpGK**</td>
                    <td colspan="25" class="noborder">Dietisien Ruangan</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder"><div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116668) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                    <td colspan="25" class="noborder"><div style="text-align: center">@foreach($res['d5'] as $item) @if($item->emrdfk ==32116669) <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px;"> @endif @endforeach</td>
                </tr>
                <tr class="text-center">
                    <td colspan="24" class="noborder">(@foreach($res['d5'] as $item) @if($item->emrdfk ==32116668) {!! $item->value !!} @endif @endforeach)</td>
                    <td colspan="25" class="noborder">(@foreach($res['d5'] as $item) @if($item->emrdfk ==32116669) {!! $item->value !!} @endif @endforeach)</td>
                </tr>
                <tr>
                    <td colspan="49">**Form skrining gizi ditandatangani oleh dr. SpGK jika hasil skrining >=3 dan pasien dirujuk/konsul ke TTG rumah sakit</td>
                </tr>
            </table>
        </div>   
    </body>
@endif

</html>
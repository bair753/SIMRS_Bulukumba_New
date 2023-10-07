<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
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
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            padding:.1rem
        }
    </style>
</head>
<body>
    <?php 
        function rupiah($angka){
            
            $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }

        function penyebut($nilai) {
                $nilai = abs($nilai);
                $huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
                $temp = "";
                if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " BELAS";
                } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
                } else if ($nilai < 200) {
                    $temp = " SERATUS" . penyebut($nilai - 100);
                } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
                } else if ($nilai < 2000) {
                    $temp = " SERIBU" . penyebut($nilai - 1000);
                } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
                } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
                } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
                } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
                }     
                return $temp;
            }
        
            function terbilang($nilai) {
                if($nilai<0) {
                    $hasil = "minus ". trim(penyebut($nilai));
                } else {
                    $hasil = trim(penyebut($nilai));
                }     		
                return $hasil;
            }
        ?>
      <section>
        <table width="100%" id="content" style="border:none;table-layout:auto;">
            <tr style="border:none;">
                <td rowspan="4" style="border:none">
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif
                </td>
                <td rowspan="4" colspan="6" style="text-align:left;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br> 92517, Tlpn. 0413 81004, Fax. <br>Email. diskominfo@bulukumbakab.go.id, Website - </td>
                <td style="border:none;"></td>
                <td style="border:none;"></td>
            </tr>
            <tr style="border:none">
                <td style="border:none;"></td>
                <td style="border:none;"></td>
            </tr>
            <tr>
                <td valign="bottom" style="text-align: center;border:none;">Print By</td>
                <th valign="bottom"  style="text-align: center;border:none;">{{ $res['user'] }}</th>
            </tr>
            <tr>
                <td valign="top" style="text-align: center;border:none;">{{date('d/m/Y')}}</td>
                <td valign="top" style="text-align: center;border:none;">{{date('H:i:s')}}</td>
            </tr>
            <tr style="border:none">
                <td colspan="9" style="text-align:center;font-size:x-large;border-left:none;border-right:none;font-weight: bolder;">
                    RINCIAN BIAYA PELAYANAN
                </td>
            </tr>
            <tr style="border:none;text-align:left;">
                <th style="border:none">No. Registrasi</th>
                <td colspan="2"  style="border:none">: {{ $res['identitas']->noregistrasi }}</td>
                <th style="border:none">Unit</th>
                <td colspan="2" style="border:none">: {{ $res['identitas']->namaruangan }}</td>
                <th style="border:none">Tgl. Masuk</th>
                <td style="border:none">: {!! date('d/m/Y',strtotime( $res['identitas']->tglregistrasi  )) !!}</td>
                <td style="border:none">{!! date('H:i',strtotime( $res['identitas']->tglregistrasi  )) !!}</td>
            </tr>
            <tr style="border:none;text-align:left;">
                <th style="border:none">No. RM</th>
                <td colspan="2"  style="border:none">: {{ $res['identitas']->nocm }}</td>
                <th style="border:none">Kamar</th>
                <td colspan="2" style="border:none">: -</td>
                <th style="border:none">Tgl. Pulang</th>
                <td style="border:none">: {!! date('d/m/Y',strtotime( $res['identitas']->tglpulang  )) !!}</td>
                <td style="border:none">{!! date('H:i',strtotime( $res['identitas']->tglpulang  )) !!}</td>
            </tr>
            <tr style="border:none;text-align:left;">
                <th style="border:none">Nama Pasien</th>
                <td colspan="2" style="border:none">: {{ $res['identitas']->namapasien }} {!!  $res['identitas']->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                <th style="border:none">Kelas</th>
                <td colspan="2" style="border:none">: {{ $res['identitas']->namakelas }}</td>
                <th style="border:none">Penjamin</th>
                <td colspan="2" style="border:none">: {{ $res['identitas']->namarekanan }}</td>
            </tr>
            <tr style="border:none;text-align:left;">
                <td style="border:none;" colspan="9"></td>
            </tr>
            <tr style="border:none;text-align:left;">
                <th style="border:none">Tipe</th>
                <td colspan="2"  style="border:none">: {{ $res['identitas']->kelompokpasien }}</td>
                <th style="border:none">Dokter P. Jawab</th>
                <td style="border:none" colspan="3">: {{ $res['identitas']->namalengkap }}</td>
            </tr>
            <tr style="border:none;text-align:left;">
                <th style="border:none">No. SEP</th>
                <td style="border:none" colspan="2">: <strong>{{ $res['identitas']->nosep }}</strong></td>
            </tr>
            <tr>
                <td style="padding-top:10px;border:none;">
                        <tr>
                            <th class="th-class  text-center">
                                <span class="text-normal">No</span>
                            </th>
                            <th class="th-class  text-center">
                                <span class="text-normal">Tanggal</span>
                            </th>
                            <th class="th-class text-left">
                                <span class="text-normal">Deskripsi</span>
                            </th>
                            <th class="th-class text-left">
                                <span class="text-normal">Kelas</span>
                            </th>
                            <th class="th-class text-left">
                                <span class="text-normal">Dokter</span>
                            </th>
                            <th class="th-class  text-center">
                                <span class="text-normal">Qty</span>
                            </th>
                            <th class="th-class  text-center">
                                <span class="text-normal">Tarif</span>
                            </th>
                            <th class="th-class  text-center">
                                <span class="text-normal">Diskon</span>
                            </th>
                            <th class="th-class  text-right">
                                <span class="text-normal">Sub Total</span>
                            </th>
                        </tr>
                        @php
                            $nomor = 1;
                            $totaltagihan = 0;
                            $totaldiskon = 0;
                            $jumlahbill = 0;
                            $totaldiklaim = 0;
                        @endphp
                        @foreach ($res['billing'] as $ruangan)
                            <tr style="background: #d6d4d4;">
                                <td colspan="9">
                                    <span class="text-normal bold">
                                        <b>   {{ strtoupper($ruangan[0]->namaruangan) }}</b>
                                    </span>
                                </td>
    
                            </tr>
                            @foreach ($ruangan->groupBy('jenisproduk') as $item)
                                <tr  style="font-style:italic;background: #edc1c1;">
                                    <td colspan="9">
                                        <span class="text-normal">
                                            <b>     JENIS: {{ strtoupper($item[0]->jenisproduk) }}</b>
                                        </span>
                                    </td>
                                </tr>
                                @php
                                    $total = 0;
                                    $diskon = 0;
                                @endphp
                                @foreach ($item as $data)
                                    <tr>
                                        <td class="th-class text-center">
                                            <span class="text">{{ $nomor }}</span>
                                        </td>
                                        <td class="th-class text-center" style="padding-left: 2px; padding-right:2px">
                                            <span class="text">
                                                {{ date_format(date_create($data->tglpelayanan), 'd/m/Y') }}</span>
                                        </td>
                                        <td class="th-class text-left">
                                            <span class="text">&nbsp;{{ $data->namaproduk }}</span>
                                        </td>
                                        <td class="th-class text-center">
                                            <span class="text">{{ $data->namakelas }}</span>
                                        </td>
                                        @if ($data->penulisresep === null)
                                            <td class="th-class text-left">
                                                <span class="text">&nbsp;{{ $data->dokter }}</span>
                                            </td>
                                        @else
                                            <td class="th-class text-left">
                                                <span class="text">{{ $data->penulisresep }} </span>
                                            </td>
                                        @endif
                                        <td class="th-class text-center">
                                            <span class="text">{{ $data->jumlah }}</span>
                                        </td>
                                        <td class="th-class" style="text-align: right">
                                            <span class="text"> {{ number_format($data->hargasatuan, 2, '.', ',') }}</span>
                                        </td>
                                        <td class="th-class text-center">
                                            <span class="text">{{ number_format($data->diskon, 2, '.', ',') }}</span>
                                        </td>
                                        <td class="th-class" style="text-align: right">
                                            <span class="text"> {{ number_format($data->total, 2, '.', ',') }}</span>
                                        </td>
                                    </tr>
                                    @php
                                        $nomor = $nomor + 1;
                                        $total = $total + $data->total;
                                        $diskon = $diskon + $data->diskon;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td style="text-align: right" colspan="9">
                                        <span class="text">
                                            <b>Rp{{ number_format($total, 2, '.', ',') }}</b>
                                        </span>
                                    </td>
                                </tr>
                                @php
                                    $totaltagihan = $totaltagihan + $total;
                                    $totaldiskon = $totaldiskon + $diskon;
                                    $jumlahbill = $totaltagihan - $totaldiskon;
                                @endphp
                            @endforeach
                        @endforeach

                </td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">ADMINISTRASI</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">MATERAI</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">JUMLAH BIAYA</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['total'] ) ?></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;"><b>JUMLAH BIAYA TOTAL</b></td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['total'] ) ?></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;"></td>
                <td style="border:none;"></td>
                <td colspan="3" style="text-align:right;border:none;"></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">DEPOSIT - UANG MUKA</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">DISKON JASA MEDIS</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">DISKON UMUM</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['diskon'] ) ?></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;">SISA DEPOSIT</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['deposit'] ) ?></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;text-align:left;">JUMLAH TELAH DIBAYAR</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['dibayar'] ) ?></td>
            </tr>
            <tr>
                <th colspan="2"></th>
                <td style="border:none;">PERINCIAN</td>
                <td colspan="2" style="border:none;text-align:left;">DITANGGUNG PERUSAHAAN</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">Rp0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;text-align:left;">DITANGGUNG RUMAH SAKIT</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">Rp0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;text-align:left;">DITANGGUNG SENDIRI / OBAT</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><?php echo rupiah( $res['total'] ) ?></td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;text-align:left;">SURPLUS / MINUS KE RS</td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;">Rp0.00</td>
            </tr>
            <tr>
                <th colspan="3"></th>
                <td colspan="2" style="border:none;"><b>JUMLAH BIAYA TOTAL</b></td>
                <td style="border:none;">:</td>
                <td colspan="3" style="text-align:right;border:none;"><b><?php echo rupiah( $res['sisa'] ) ?></b></td>
            </tr>
            <tr height="50px">
                <th colspan="9" style="text-align:left;">TERBILANG:</th>
            </tr>
            <tr style="border:none;">
                <td colspan="9" style="border:none;"><em># <?php echo terbilang( $res['sisa'] ) ?> RUPIAH #</em></td>
            </tr>
            <tr height="120px" valign="top"; style="text-align:center;">
                <td colspan="3"style="border:none;border-right:1px solid #000">Bulukumba, {{date('d/m/Y')}} {{date('H:i:s')}} <br> Kasir</td>
                <td style="border:none;border-right:1px solid #000" colspan="3">Bendahara</td>
                <td colspan="3" style="border:none;">Catatan</td>
            </tr>
        </table>
    </section>
			
</body>
<script>
    $(document).ready(function () {
        window.print();
    });
</script>
</html>
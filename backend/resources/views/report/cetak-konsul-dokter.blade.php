<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ringkasan Pulang Rawat Inap</title>

    @if (stripos(\Request::url(), 'localhost') !== false)
        <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        @media print {
            td.merah {
                background-color: #d54242 !important;
                -webkit-print-color-adjust: exact;
            }

            td.kuning {
                background-color: #c5d542 !important;
                -webkit-print-color-adjust: exact;
            }

            td.hijau {
                background-color: #42d55b !important;
                -webkit-print-color-adjust: exact;
            }

            td.hitam {
                background-color: #000000 !important;
                -webkit-print-color-adjust: exact;
            }
        }

        @page {
            size: A4;
        }

        /*@media print {*/
        /*    body {margin:0}*/
        /*}*/
        .double-border {

            border: 4px solid #000;

        }

        .double-border:before {

            border: 4px solid #fff;

        }

        .box {
            border: 2px solid black;
            /*border-radius: 6px;*/
        }

        .garis6 td {
            padding: 3px;
        }

        .bold {
            font-weight: bold;
        }

        .f-s-15 {
            font-size: 12px;
        }

        .top-height {
            height: 50px;
            vertical-align: text-top;
            width: 15%;
        }

        .text-top {
            vertical-align: text-top;
        }

        table {
            width: 100%;
            height: 100%;
        }

        .kotak {
            width: 50px;
            height: 20px;
        }

        .merah {
            background-color: #d54242 !important;
        }

        .kuning {
            background-color: #c5d542 !important;
        }

        .hijau {
            background-color: #42d55b !important;
        }

        .hitam {
            background-color: #000000 !important;
        }

        .bmerah {
            border: thin solid #d54242;
        }

        .bkuning {
            border: thin solid #c5d542;
        }

        .bhijau {
            border: thin solid #42d55b;
        }

        .bhitam {
            border: thin solid #000000;
        }

        .border-lr {
            border-collapse: collapse;
        }

        .border-lr td {
            border: thin solid #000;
        }

        // adi nambahin
        .border-lr th {
            border: thin solid #000;
        }

        .border-doang {
            border-collapse: collapse;
            border: thin solid #000;
            border-top: none;
        }

        .border-doang td {
            padding: 5px;
        }

        .judulLabel {
            font-weight: bold;
        }

        .background-gray {
            background-color: black;
        }
    </style>
</head>

<body class="A4" style="font-family:Tahoma;height: auto">
    <section class="sheet padding-10mm" style="font-family: Tohama;height: auto;">
        <table width="100%" cellspacing="0" cellpadding="0" border="1">
            <tr>
                <td width="10%" style="padding: 15px">
                    @if (stripos(\Request::url(), 'localhost') !== false)
                        <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 90px;">
                    @else
                        <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 90px;">
                    @endif
                </td>
                <td style="text-align: center;padding: 15px;">
                    <span style="font-size: 14px"><b>{!! $res['profile']->namalengkap !!}</b></span>
                    </br>
                    </br>
                    <span style="font-size: 12px;">{!! $res['profile']->alamatlengkap !!}</span>
                </td>
                <td width="40%" style="padding: 10px">
                    <div style="text-align: left">
                        <table style="padding: 3px;">
                            <tr>
                                <td class="f-s-15 bold  text-top" style="width: 100px">No. RM</td>
                                <td class="f-s-15 bold  text-top">:</td>
                                <td class="f-s-15 bold text-top"><b>{{ $res['d']->norm }}</b></td>
                            </tr>
                            <tr>
                                <td class="f-s-15 bold  text-top">Nama</td>
                                <td class="f-s-15 bold  text-top">:</td>
                                <td class="f-s-15 bold  text-top"><b>{{ $res['d']->namalengkap }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-s-15 bold  text-top">Tgl Lahir</td>
                                <td class="f-s-15 bold  text-top">:</td>
                                <td class="f-s-15 bold  text-top">
                                    <b>{!! date('d-m-Y', strtotime($res['d']->tgllahir)) !!}</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="f-s-15 bold  text-top">NIK</td>
                                <td class="f-s-15 bold  text-top">:</td>
                                <td class="f-s-15 bold  text-top"><b>{{ $res['d']->noidentitas }}</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="padding: 0 !important">
                    <div style="padding: 20px;font-size: 18px;">
                        <b>RM</b>
                    </div>
                    <div style="padding: 20px;font-size: 18px;">
                        <b>&nbsp;32</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;font-size: 16px;padding: 5px" class="background-gray">
                    <b style="color:white">SURAT KONSUL DOKTER</b>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div>
                        <table>
                            <tr>
                                <td style="padding-left: 5px;padding-top:30px;">
                                    <span class="f-s-15">Dari Dokter </span><span> :
                                    </span><span>{{ $res[0]['daridokter'] }}</span>
                                </td>
                                <td style="padding-left: 5px;padding-top:30px;">
                                    <span class="f-s-15">Ahli </span><span> : </span><span>{{ isset($datadaridokter[0]->namaexternal) ? $datadaridokter[0]->namaexternal : 'Belum diset' }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td style="padding-left: 5px;padding-top:30px;">
                                    <span class="f-s-15">Untuk Dokter </span><span> :
                                    </span><span>{{ $res[0]['untukdokter'] }}</span>
                                </td>
                                <td style="padding-left: 5px;padding-top:30px;">
                                    <span class="f-s-15">Ahli </span><span> : </span><span>{{ isset($datauntukdokter[0]->namaexternal) ? $datauntukdokter[0]->namaexternal : 'Belum diset' }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div>
                        <table>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <span class="f-s-15">Tanggal </span><span> :
                                    </span><span><?php echo date("d-m-Y"); ?></span>
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <span class="f-s-15">Jam </span><span> : </span><span><?php echo date("H:i"); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-left: 5px;padding-bottom:30px;">
                                    <span class="f-s-15">{{ $res[0]['keteranganjawab'] }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <center><span class="f-s-15">Tanda tangan</center>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                   
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <center><span class="f-s-15">Bulukumba, <?php echo date("d-m-Y"); ?></center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;font-size: 16px;padding: 5px" class="background-gray">
                    <b style="color:white">JAWABAN KONSUL</b>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div>
                        <table>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <span class="f-s-15">Tanggal </span><span> :
                                    </span><span><?php echo date("d-m-Y"); ?></span>
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <span class="f-s-15">Jam</span><span> : </span><span><?php echo date("H:i"); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-left: 5px;padding-bottom:30px;padding-right: 5px;">
                                    <span class="f-s-15">{{ $res[0]['jawaban'] }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <center><span class="f-s-15">Tanda tangan</center>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                   
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 5px;padding-top:10px;">
                                    
                                </td>
                                <td style="padding-left: 5px;padding-top:10px;padding-bottom:10px;">
                                    <center><span class="f-s-15">Bulukumba, <?php echo date("d-m-Y"); ?></center>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
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

<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Pemberian dan Pemantauan Obat Pasien</title>
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
        body, html{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 6pt;
        }
        @page{
            size:A4;
            margin-top:1rem;
            margin-bottom:1rem; 
            margin-left:3rem;
            margin-right: 1rem;
            transform:scale(72%);
        }
        table{
            border:1px solid #000;
            border-collapse:collapse;
        }
        table tr td{
            border:1px solid #000;
            border-collapse:collapse;
            padding:.3rem;
        }
        td input{
            vertical-align: middle;
        }
        .format{
            padding:1rem;
        }
        @media only screen and (max-width:220mm) and (max-height:270mm){
            @page{
                size:A4;
                margin: 0;
                transform:scale(71%);
            }
            .format{
                width:210mm;
                height:297mm;
            }
            table{
                transform: scale(50%);
            }
            .divider{
                clear:both;
                padding:2rem;
            }
        }
    </style>
</head>
<body ng-controller="cetakCPPOP"> 
    <div class="format">
        <table>
            <tr>
                <td rowspan="4" colspan="2">
                    <figure style="width:80px;margin:0 auto;">
                        <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/04/12/266343779.png" alt="" style="width:100%;height:100%;object-fit:contain">
                    </figure>
                </td>
                <td rowspan="4" colspan="4" style="text-align:center;width:38%">
                    <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                    JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                    TELP : (0413) 81292
                </td>
                <td colspan="9" style="border:none;">No RM</td>
                <td style="border:none;" colspan="4">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="3" style="background:#000;color:#fff;width:100px;text-align:center;font-size:36px">RM</td>
            </tr>
            <tr>
                <td width="30" colspan="9" style="border:none;">Nama Lengkap</td>
                <td style="border:none;" colspan="3">: {!!  $res['d'][0]->namapasien  !!}</td>
                <td style="border:none;text-align: right;">{{ $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L' }}</td>
            </tr>
            <tr>
                <td width="30" colspan="9" style="border:none;">Tanggal Lahir</td>
                <td style="border:none;" colspan="4">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
            </tr>
            <tr>
                <td width="30" colspan="9" style="border:none;">NIK</td>
                <td style="border:none;" colspan="4">: {!! $res['d'][0]->noidentitas  !!}</td>
                <td style="text-align:center;font-size:36px">27</td>
            </tr>
            <tr>
                <td colspan="20" style="text-align:center;background: #000;color: #fff;"><h1>CATATAN PEMBERIAN DAN PEMANTAUAN OBAT PASIEN</h1></td>
            </tr>
            <tr>
                <td colspan="20" style="text-align:left"><h2>RUANG RAWAT AWAL :</h2></td>
            </tr>
            <tr style="text-align:center;">
                <td rowspan="3" width="25">No</td>
                <td rowspan="3" width="90">Nama Obat</td>
                <td rowspan="3" width="25">Dosis</td>
                <td rowspan="3" width="25">Rute</td>
                <td rowspan="3" width="5">Tgl Mulai</td>
                <td rowspan="3" width="5">Nama / TTD Dokter</td>
                <td colspan="12">Waktu dan Frekuensi</td>
                <td rowspan="3">Informasi Benar</td>
                <td rowspan="3">Review Farmasi</td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="4">Hari ke</td>
                <td colspan="4">Hari ke</td>
                <td colspan="4">Hari ke</td>
            </tr>
            <tr style="text-align:center;">
                <td>p</td>
                <td>s</td>
                <td>s</td>
                <td>m</td>
                <td>p</td>
                <td>s</td>
                <td>s</td>
                <td>m</td>
                <td>p</td>
                <td>s</td>
                <td>s</td>
                <td>m</td>
            </tr>
            <!-- bagian a -->
            <tr style="background:#000;color:#fff">
                <td colspan="20"><h3>A. RESEP NON PARENTERAL</h3></td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">1</td>
                <td>@{{ item.obj[424101] }}</td>
                <td>@{{ item.obj[424102] }}</td>
                <td>@{{ item.obj[424103] }}</td>
                <td>@{{ item.obj[424104] }}</td>
                <td>@{{ item.obj[424105] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424121] }}</td>
                <td>@{{ item.obj[424122] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">2</td>
                <td>@{{ item.obj[424123] }}</td>
                <td>@{{ item.obj[424124] }}</td>
                <td>@{{ item.obj[424125] }}</td>
                <td>@{{ item.obj[424126] }}</td>
                <td>@{{ item.obj[424127] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424143] }}</td>
                <td>@{{ item.obj[424144] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">3</td>
                <td>@{{ item.obj[424145] }}</td>
                <td>@{{ item.obj[424146] }}</td>
                <td>@{{ item.obj[424147] }}</td>
                <td>@{{ item.obj[424148] }}</td>
                <td>@{{ item.obj[424149] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424165] }}</td>
                <td>@{{ item.obj[424166] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">4</td>
                <td>@{{ item.obj[424167] }}</td>
                <td>@{{ item.obj[424168] }}</td>
                <td>@{{ item.obj[424169] }}</td>
                <td>@{{ item.obj[424170] }}</td>
                <td>@{{ item.obj[424171] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424187] }}</td>
                <td>@{{ item.obj[424188] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">5</td>
                <td>@{{ item.obj[424189] }}</td>
                <td>@{{ item.obj[424190] }}</td>
                <td>@{{ item.obj[424191] }}</td>
                <td>@{{ item.obj[424192] }}</td>
                <td>@{{ item.obj[424193] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424209] }}</td>
                <td>@{{ item.obj[424210] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">6</td>
                <td>@{{ item.obj[424211] }}</td>
                <td>@{{ item.obj[424212] }}</td>
                <td>@{{ item.obj[424213] }}</td>
                <td>@{{ item.obj[424214] }}</td>
                <td>@{{ item.obj[424215] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424231] }}</td>
                <td>@{{ item.obj[424232] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">7</td>
                <td>@{{ item.obj[424233] }}</td>
                <td>@{{ item.obj[424234] }}</td>
                <td>@{{ item.obj[424235] }}</td>
                <td>@{{ item.obj[424236] }}</td>
                <td>@{{ item.obj[424237] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424253] }}</td>
                <td>@{{ item.obj[424254] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">8</td>
                <td>@{{ item.obj[424255] }}</td>
                <td>@{{ item.obj[424256] }}</td>
                <td>@{{ item.obj[424257] }}</td>
                <td>@{{ item.obj[424258] }}</td>
                <td>@{{ item.obj[424259] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424275] }}</td>
                <td>@{{ item.obj[424276] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">9</td>
                <td>@{{ item.obj[424277] }}</td>
                <td>@{{ item.obj[424278] }}</td>
                <td>@{{ item.obj[424279] }}</td>
                <td>@{{ item.obj[424280] }}</td>
                <td>@{{ item.obj[424281] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424297] }}</td>
                <td>@{{ item.obj[424298] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">10</td>
                <td>@{{ item.obj[424299] }}</td>
                <td>@{{ item.obj[424300] }}</td>
                <td>@{{ item.obj[424301] }}</td>
                <td>@{{ item.obj[424302] }}</td>
                <td>@{{ item.obj[424303] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424319] }}</td>
                <td>@{{ item.obj[424320] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">11</td>
                <td>@{{ item.obj[424321] }}</td>
                <td>@{{ item.obj[424322] }}</td>
                <td>@{{ item.obj[424323] }}</td>
                <td>@{{ item.obj[424324] }}</td>
                <td>@{{ item.obj[424325] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424341] }}</td>
                <td>@{{ item.obj[424342] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">12</td>
                <td>@{{ item.obj[424343] }}</td>
                <td>@{{ item.obj[424344] }}</td>
                <td>@{{ item.obj[424345] }}</td>
                <td>@{{ item.obj[424346] }}</td>
                <td>@{{ item.obj[424347] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424363] }}</td>
                <td>@{{ item.obj[424364] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">13</td>
                <td>@{{ item.obj[424365] }}</td>
                <td>@{{ item.obj[424366] }}</td>
                <td>@{{ item.obj[424367] }}</td>
                <td>@{{ item.obj[424368] }}</td>
                <td>@{{ item.obj[424369] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424385] }}</td>
                <td>@{{ item.obj[424386] }}</td>
            </tr><tr style="height:18px">
                <td style="text-align:center">14</td>
                <td>@{{ item.obj[424387] }}</td>
                <td>@{{ item.obj[424388] }}</td>
                <td>@{{ item.obj[424389] }}</td>
                <td>@{{ item.obj[424390] }}</td>
                <td>@{{ item.obj[424391] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424407] }}</td>
                <td>@{{ item.obj[424408] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">15</td>
                <td>@{{ item.obj[424409] }}</td>
                <td>@{{ item.obj[424410] }}</td>
                <td>@{{ item.obj[424411] }}</td>
                <td>@{{ item.obj[424412] }}</td>
                <td>@{{ item.obj[424413] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424429] }}</td>
                <td>@{{ item.obj[424430] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">16</td>
                <td>@{{ item.obj[424431] }}</td>
                <td>@{{ item.obj[424432] }}</td>
                <td>@{{ item.obj[424433] }}</td>
                <td>@{{ item.obj[424434] }}</td>
                <td>@{{ item.obj[424435] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424451] }}</td>
                <td>@{{ item.obj[424452] }}</td>
            </tr>
            

            <!-- bagian b -->
            <tr style="background:#000;color:#fff">
                <td colspan="20"><h3>B. RESEP PARENTERAL</h3></td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">1</td>
                <td>@{{ item.obj[424453] }}</td>
                <td>@{{ item.obj[424454] }}</td>
                <td>@{{ item.obj[424455] }}</td>
                <td>@{{ item.obj[424456] }}</td>
                <td>@{{ item.obj[424457] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424473] }}</td>
                <td>@{{ item.obj[424474] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">2</td>
                <td>@{{ item.obj[424475] }}</td>
                <td>@{{ item.obj[424476] }}</td>
                <td>@{{ item.obj[424477] }}</td>
                <td>@{{ item.obj[424478] }}</td>
                <td>@{{ item.obj[424479] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424495] }}</td>
                <td>@{{ item.obj[424496] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">3</td>
                <td>@{{ item.obj[424497] }}</td>
                <td>@{{ item.obj[424498] }}</td>
                <td>@{{ item.obj[424499] }}</td>
                <td>@{{ item.obj[424500] }}</td>
                <td>@{{ item.obj[424501] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424517] }}</td>
                <td>@{{ item.obj[424518] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">4</td>
                <td>@{{ item.obj[424519] }}</td>
                <td>@{{ item.obj[424520] }}</td>
                <td>@{{ item.obj[424521] }}</td>
                <td>@{{ item.obj[424522] }}</td>
                <td>@{{ item.obj[424523] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424539] }}</td>
                <td>@{{ item.obj[424540] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">5</td>
                <td>@{{ item.obj[424541] }}</td>
                <td>@{{ item.obj[424542] }}</td>
                <td>@{{ item.obj[424543] }}</td>
                <td>@{{ item.obj[424544] }}</td>
                <td>@{{ item.obj[424545] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424561] }}</td>
                <td>@{{ item.obj[424562] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">6</td>
                <td>@{{ item.obj[424563] }}</td>
                <td>@{{ item.obj[424564] }}</td>
                <td>@{{ item.obj[424565] }}</td>
                <td>@{{ item.obj[424566] }}</td>
                <td>@{{ item.obj[424567] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424583] }}</td>
                <td>@{{ item.obj[424584] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">7</td>
                <td>@{{ item.obj[424585] }}</td>
                <td>@{{ item.obj[424586] }}</td>
                <td>@{{ item.obj[424587] }}</td>
                <td>@{{ item.obj[424588] }}</td>
                <td>@{{ item.obj[424589] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424605] }}</td>
                <td>@{{ item.obj[424606] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">8</td>
                <td>@{{ item.obj[424607] }}</td>
                <td>@{{ item.obj[424608] }}</td>
                <td>@{{ item.obj[424609] }}</td>
                <td>@{{ item.obj[424610] }}</td>
                <td>@{{ item.obj[424611] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424627] }}</td>
                <td>@{{ item.obj[424628] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">9</td>
                <td>@{{ item.obj[424629] }}</td>
                <td>@{{ item.obj[424630] }}</td>
                <td>@{{ item.obj[424631] }}</td>
                <td>@{{ item.obj[424632] }}</td>
                <td>@{{ item.obj[424633] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424649] }}</td>
                <td>@{{ item.obj[424650] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">10</td>
                <td>@{{ item.obj[424651] }}</td>
                <td>@{{ item.obj[424652] }}</td>
                <td>@{{ item.obj[424653] }}</td>
                <td>@{{ item.obj[424654] }}</td>
                <td>@{{ item.obj[424655] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424671] }}</td>
                <td>@{{ item.obj[424672] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">11</td>
                <td>@{{ item.obj[424673] }}</td>
                <td>@{{ item.obj[424674] }}</td>
                <td>@{{ item.obj[424675] }}</td>
                <td>@{{ item.obj[424676] }}</td>
                <td>@{{ item.obj[424677] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424693] }}</td>
                <td>@{{ item.obj[424694] }}</td>
            </tr>

            <!-- bagian c -->
            <tr style="background:#000;color:#fff">
                <td colspan="20"><h3>C. CAIRAN INTRAVENA</h3></td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">1</td>
                <td>@{{ item.obj[424695] }}</td>
                <td>@{{ item.obj[424696] }}</td>
                <td>@{{ item.obj[424697] }}</td>
                <td>@{{ item.obj[424698] }}</td>
                <td>@{{ item.obj[424699] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424715] }}</td>
                <td>@{{ item.obj[424716] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">2</td>
                <td>@{{ item.obj[424717] }}</td>
                <td>@{{ item.obj[424718] }}</td>
                <td>@{{ item.obj[424719] }}</td>
                <td>@{{ item.obj[424720] }}</td>
                <td>@{{ item.obj[424721] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424737] }}</td>
                <td>@{{ item.obj[424738] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">3</td>
                <td>@{{ item.obj[424739] }}</td>
                <td>@{{ item.obj[424740] }}</td>
                <td>@{{ item.obj[424741] }}</td>
                <td>@{{ item.obj[424742] }}</td>
                <td>@{{ item.obj[424743] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424759] }}</td>
                <td>@{{ item.obj[424760] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">4</td>
                <td>@{{ item.obj[424761] }}</td>
                <td>@{{ item.obj[424762] }}</td>
                <td>@{{ item.obj[424763] }}</td>
                <td>@{{ item.obj[424764] }}</td>
                <td>@{{ item.obj[424765] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424781] }}</td>
                <td>@{{ item.obj[424782] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">5</td>
                <td>@{{ item.obj[424783] }}</td>
                <td>@{{ item.obj[424784] }}</td>
                <td>@{{ item.obj[424785] }}</td>
                <td>@{{ item.obj[424786] }}</td>
                <td>@{{ item.obj[424787] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424803] }}</td>
                <td>@{{ item.obj[424804] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">6</td>
                <td>@{{ item.obj[424805] }}</td>
                <td>@{{ item.obj[424806] }}</td>
                <td>@{{ item.obj[424807] }}</td>
                <td>@{{ item.obj[424808] }}</td>
                <td>@{{ item.obj[424809] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424825] }}</td>
                <td>@{{ item.obj[424826] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">7</td>
                <td>@{{ item.obj[424827] }}</td>
                <td>@{{ item.obj[424828] }}</td>
                <td>@{{ item.obj[424829] }}</td>
                <td>@{{ item.obj[424830] }}</td>
                <td>@{{ item.obj[424831] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424847] }}</td>
                <td>@{{ item.obj[424848] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">8</td>
                <td>@{{ item.obj[424849] }}</td>
                <td>@{{ item.obj[424850] }}</td>
                <td>@{{ item.obj[424851] }}</td>
                <td>@{{ item.obj[424852] }}</td>
                <td>@{{ item.obj[424853] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424869] }}</td>
                <td>@{{ item.obj[424870] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">9</td>
                <td>@{{ item.obj[424871] }}</td>
                <td>@{{ item.obj[424872] }}</td>
                <td>@{{ item.obj[424873] }}</td>
                <td>@{{ item.obj[424874] }}</td>
                <td>@{{ item.obj[424875] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424891] }}</td>
                <td>@{{ item.obj[424892] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">10</td>
                <td>@{{ item.obj[424893] }}</td>
                <td>@{{ item.obj[424894] }}</td>
                <td>@{{ item.obj[424895] }}</td>
                <td>@{{ item.obj[424896] }}</td>
                <td>@{{ item.obj[424897] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424913] }}</td>
                <td>@{{ item.obj[424913] }}</td>
            </tr>
            <tr style="height:18px">
                <td style="text-align:center">11</td>
                <td>@{{ item.obj[424915] }}</td>
                <td>@{{ item.obj[424916] }}</td>
                <td>@{{ item.obj[424917] }}</td>
                <td>@{{ item.obj[424918] }}</td>
                <td>@{{ item.obj[424919] }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>@{{ item.obj[424935] }}</td>
                <td>@{{ item.obj[424936] }}</td>
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

    angular.controller('cetakCPPOP', function ($scope, $http, httpService) {
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
        console.log('424101' in $scope.item.obj);
    })

    angular.filter('toDate', function() {
    return function(items) {
        return new Date(items);
        };
    });
    // $(document).ready(function () {
    //     window.print();
    // });
</script>
</html>

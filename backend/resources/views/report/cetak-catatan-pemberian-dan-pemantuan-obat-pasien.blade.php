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
            padding:2rem;
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
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
                            @else
                                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
                            @endif
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
                <td colspan="20" style="text-align:left"><h2>RUANG RAWAT AWAL : @{{ item.obj[424100] ? item.obj[424100] : '' }}</h2></td>
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
                <td rowspan="2" style="text-align:center">1</td>
                <td rowspan="2">@{{ item.obj[424101] }}</td>
                <td rowspan="2">@{{ item.obj[424102] }}</td>
                <td rowspan="2">@{{ item.obj[424103] }}</td>
                <td rowspan="2">@{{ item.obj[424104] }}</td>
                <td rowspan="2">@{{ item.obj[424105] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424106] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424111] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424116] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424121] }}</td>
                <td rowspan="2">@{{ item.obj[424122] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424107] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424108] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424109] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424110] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424112] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424113] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424114] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424115] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424117] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424118] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424119] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424120] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">2</td>
                <td rowspan="2">@{{ item.obj[424123] }}</td>
                <td rowspan="2">@{{ item.obj[424124] }}</td>
                <td rowspan="2">@{{ item.obj[424125] }}</td>
                <td rowspan="2">@{{ item.obj[424126] }}</td>
                <td rowspan="2">@{{ item.obj[424127] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424128] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424133] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424138] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424143] }}</td>
                <td rowspan="2">@{{ item.obj[424144] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424129] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424130] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424131] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424132] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424134] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424135] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424136] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424137] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424139] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424140] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424141] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424142] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">3</td>
                <td rowspan="2">@{{ item.obj[424145] }}</td>
                <td rowspan="2">@{{ item.obj[424146] }}</td>
                <td rowspan="2">@{{ item.obj[424147] }}</td>
                <td rowspan="2">@{{ item.obj[424148] }}</td>
                <td rowspan="2">@{{ item.obj[424149] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424150] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424155] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424160] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424165] }}</td>
                <td rowspan="2">@{{ item.obj[424166] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424151] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424152] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424153] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424154] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424156] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424157] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424158] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424159] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424161] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424162] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424163] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424164] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">4</td>
                <td rowspan="2">@{{ item.obj[424167] }}</td>
                <td rowspan="2">@{{ item.obj[424168] }}</td>
                <td rowspan="2">@{{ item.obj[424169] }}</td>
                <td rowspan="2">@{{ item.obj[424170] }}</td>
                <td rowspan="2">@{{ item.obj[424171] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424172] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424177] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424182] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424187] }}</td>
                <td rowspan="2">@{{ item.obj[424188] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424173] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424174] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424175] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424176] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424178] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424179] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424180] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424181] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424183] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424184] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424185] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424186] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">5</td>
                <td rowspan="2">@{{ item.obj[424189] }}</td>
                <td rowspan="2">@{{ item.obj[424190] }}</td>
                <td rowspan="2">@{{ item.obj[424191] }}</td>
                <td rowspan="2">@{{ item.obj[424192] }}</td>
                <td rowspan="2">@{{ item.obj[424193] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424194] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424199] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424204] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424209] }}</td>
                <td rowspan="2">@{{ item.obj[424210] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424195] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424196] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424197] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424198] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424200] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424201] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424202] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424203] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424205] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424206] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424207] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424208] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">6</td>
                <td rowspan="2">@{{ item.obj[424211] }}</td>
                <td rowspan="2">@{{ item.obj[424212] }}</td>
                <td rowspan="2">@{{ item.obj[424213] }}</td>
                <td rowspan="2">@{{ item.obj[424214] }}</td>
                <td rowspan="2">@{{ item.obj[424215] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424216] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424221] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424226] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424231] }}</td>
                <td rowspan="2">@{{ item.obj[424232] }}</td>
            </tr>
            <tr><td>@{{ item.obj[424217] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424218] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424219] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424220] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424222] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424223] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424224] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424225] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424227] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424228] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424229] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424230] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">7</td>
                <td rowspan="2">@{{ item.obj[424233] }}</td>
                <td rowspan="2">@{{ item.obj[424234] }}</td>
                <td rowspan="2">@{{ item.obj[424235] }}</td>
                <td rowspan="2">@{{ item.obj[424236] }}</td>
                <td rowspan="2">@{{ item.obj[424237] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424238] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424244] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424248] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424253] }}</td>
                <td rowspan="2">@{{ item.obj[424254] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424239] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424240] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424241] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424242] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424244] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424245] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424246] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424247] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424249] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424250] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424251] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424252] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">8</td>
                <td rowspan="2">@{{ item.obj[424255] }}</td>
                <td rowspan="2">@{{ item.obj[424256] }}</td>
                <td rowspan="2">@{{ item.obj[424257] }}</td>
                <td rowspan="2">@{{ item.obj[424258] }}</td>
                <td rowspan="2">@{{ item.obj[424259] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424260] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424265] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424270] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424275] }}</td>
                <td rowspan="2">@{{ item.obj[424276] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424261] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424262] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424263] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424264] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424266] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424267] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424268] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424269] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424271] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424272] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424273] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424274] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">9</td>
                <td rowspan="2">@{{ item.obj[424277] }}</td>
                <td rowspan="2">@{{ item.obj[424278] }}</td>
                <td rowspan="2">@{{ item.obj[424279] }}</td>
                <td rowspan="2">@{{ item.obj[424280] }}</td>
                <td rowspan="2">@{{ item.obj[424281] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424282] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424287] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424292] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424297] }}</td>
                <td rowspan="2">@{{ item.obj[424298] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424283] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424284] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424285] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424286] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424288] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424289] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424290] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424291] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424293] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424294] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424295] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424296] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">10</td>
                <td rowspan="2">@{{ item.obj[424299] }}</td>
                <td rowspan="2">@{{ item.obj[424300] }}</td>
                <td rowspan="2">@{{ item.obj[424301] }}</td>
                <td rowspan="2">@{{ item.obj[424302] }}</td>
                <td rowspan="2">@{{ item.obj[424303] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424304] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424309] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424314] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424319] }}</td>
                <td rowspan="2">@{{ item.obj[424320] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424305] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424306] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424307] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424308] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424310] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424311] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424312] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424313] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424315] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424316] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424317] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424318] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">11</td>
                <td rowspan="2">@{{ item.obj[424321] }}</td>
                <td rowspan="2">@{{ item.obj[424322] }}</td>
                <td rowspan="2">@{{ item.obj[424323] }}</td>
                <td rowspan="2">@{{ item.obj[424324] }}</td>
                <td rowspan="2">@{{ item.obj[424325] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424326] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424331] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424336] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424341] }}</td>
                <td rowspan="2">@{{ item.obj[424342] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424327] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424328] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424329] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424330] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424332] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424333] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424334] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424335] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424337] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424338] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424339] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424340] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">12</td>
                <td rowspan="2">@{{ item.obj[424343] }}</td>
                <td rowspan="2">@{{ item.obj[424344] }}</td>
                <td rowspan="2">@{{ item.obj[424345] }}</td>
                <td rowspan="2">@{{ item.obj[424346] }}</td>
                <td rowspan="2">@{{ item.obj[424347] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424348] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424353] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424358] | toDate | date:'dd-MM-yyyy'}}</td>
                <td rowspan="2">@{{ item.obj[424363] }}</td>
                <td rowspan="2">@{{ item.obj[424364] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424349] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424350] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424351] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424352] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424354] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424355] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424356] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424357] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424359] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424360] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424361] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424362] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">13</td>
                <td rowspan="2">@{{ item.obj[424365] }}</td>
                <td rowspan="2">@{{ item.obj[424366] }}</td>
                <td rowspan="2">@{{ item.obj[424367] }}</td>
                <td rowspan="2">@{{ item.obj[424368] }}</td>
                <td rowspan="2">@{{ item.obj[424369] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424370] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424375] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424380] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424385] }}</td>
                <td rowspan="2">@{{ item.obj[424386] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424371] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424372] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424373] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424374] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424376] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424377] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424378] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424379] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424381] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424382] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424383] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424384] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">14</td>
                <td rowspan="2">@{{ item.obj[424387] }}</td>
                <td rowspan="2">@{{ item.obj[424388] }}</td>
                <td rowspan="2">@{{ item.obj[424389] }}</td>
                <td rowspan="2">@{{ item.obj[424390] }}</td>
                <td rowspan="2">@{{ item.obj[424391] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424392] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424397] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424402] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424407] }}</td>
                <td rowspan="2">@{{ item.obj[424408] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424393] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424394] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424395] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424396] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424398] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424399] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424400] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424401] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424403] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424404] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424405] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424406] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">15</td>
                <td rowspan="2">@{{ item.obj[424409] }}</td>
                <td rowspan="2">@{{ item.obj[424410] }}</td>
                <td rowspan="2">@{{ item.obj[424411] }}</td>
                <td rowspan="2">@{{ item.obj[424412] }}</td>
                <td rowspan="2">@{{ item.obj[424413] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424414] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424419] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424424] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424429] }}</td>
                <td rowspan="2">@{{ item.obj[424430] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424415] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424416] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424417] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424418] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424420] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424421] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424422] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424423] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424425] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424426] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424427] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424428] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">16</td>
                <td rowspan="2">@{{ item.obj[424431] }}</td>
                <td rowspan="2">@{{ item.obj[424432] }}</td>
                <td rowspan="2">@{{ item.obj[424433] }}</td>
                <td rowspan="2">@{{ item.obj[424434] }}</td>
                <td rowspan="2">@{{ item.obj[424435] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424436] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424441] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424446] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424451] }}</td>
                <td rowspan="2">@{{ item.obj[424452] }}</td>
            </tr>
            <tr><td>@{{ item.obj[424437] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424438] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424439] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424440] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424442] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424443] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424444] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424445] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424447] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424448] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424449] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424450] ? '&#10004;' : '' }}</td>
            </tr>

            <!-- bagian b -->
            <tr style="background:#000;color:#fff">
                <td colspan="20"><h3>B. RESEP PARENTERAL</h3></td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">1</td>
                <td rowspan="2">@{{ item.obj[424453] }}</td>
                <td rowspan="2">@{{ item.obj[424454] }}</td>
                <td rowspan="2">@{{ item.obj[424455] }}</td>
                <td rowspan="2">@{{ item.obj[424456] }}</td>
                <td rowspan="2">@{{ item.obj[424457] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424458] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424463] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424468] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424473] }}</td>
                <td rowspan="2">@{{ item.obj[424474] }}</td>
            </tr>
            <tr><td>@{{ item.obj[424459] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424460] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424461] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424462] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424464] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424465] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424466] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424467] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424469] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424470] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424471] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424472] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">2</td>
                <td rowspan="2">@{{ item.obj[424475] }}</td>
                <td rowspan="2">@{{ item.obj[424476] }}</td>
                <td rowspan="2">@{{ item.obj[424477] }}</td>
                <td rowspan="2">@{{ item.obj[424478] }}</td>
                <td rowspan="2">@{{ item.obj[424479] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424480] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424485] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424490] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424495] }}</td>
                <td rowspan="2">@{{ item.obj[424496] }}</td>
            </tr>
            <tr><td>@{{ item.obj[424481] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424482] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424483] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424484] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424486] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424487] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424488] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424489] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424491] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424492] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424493] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424494] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">3</td>
                <td rowspan="2">@{{ item.obj[424497] }}</td>
                <td rowspan="2">@{{ item.obj[424498] }}</td>
                <td rowspan="2">@{{ item.obj[424499] }}</td>
                <td rowspan="2">@{{ item.obj[424500] }}</td>
                <td rowspan="2">@{{ item.obj[424501] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424502] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424507] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424512] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424517] }}</td>
                <td rowspan="2">@{{ item.obj[424518] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424503] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424504] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424505] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424506] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424508] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424509] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424510] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424511] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424513] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424514] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424515] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424516] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">4</td>
                <td rowspan="2">@{{ item.obj[424519] }}</td>
                <td rowspan="2">@{{ item.obj[424520] }}</td>
                <td rowspan="2">@{{ item.obj[424521] }}</td>
                <td rowspan="2">@{{ item.obj[424522] }}</td>
                <td rowspan="2">@{{ item.obj[424523] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424524] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424529] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424534] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424539] }}</td>
                <td rowspan="2">@{{ item.obj[424540] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424525] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424526] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424527] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424528] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424530] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424531] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424532] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424533] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424535] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424536] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424537] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424538] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">5</td>
                <td rowspan="2">@{{ item.obj[424541] }}</td>
                <td rowspan="2">@{{ item.obj[424542] }}</td>
                <td rowspan="2">@{{ item.obj[424543] }}</td>
                <td rowspan="2">@{{ item.obj[424544] }}</td>
                <td rowspan="2">@{{ item.obj[424545] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424546] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424551] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424556] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424561] }}</td>
                <td rowspan="2">@{{ item.obj[424562] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424547] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424548] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424549] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424550] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424552] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424553] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424554] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424555] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424557] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424558] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424559] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424560] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">6</td>
                <td rowspan="2">@{{ item.obj[424563] }}</td>
                <td rowspan="2">@{{ item.obj[424564] }}</td>
                <td rowspan="2">@{{ item.obj[424565] }}</td>
                <td rowspan="2">@{{ item.obj[424566] }}</td>
                <td rowspan="2">@{{ item.obj[424567] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424568] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424573] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424578] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424583] }}</td>
                <td rowspan="2">@{{ item.obj[424584] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424569] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424570] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424571] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424572] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424574] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424575] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424576] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424577] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424579] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424580] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424581] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424582] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">7</td>
                <td rowspan="2">@{{ item.obj[424585] }}</td>
                <td rowspan="2">@{{ item.obj[424586] }}</td>
                <td rowspan="2">@{{ item.obj[424587] }}</td>
                <td rowspan="2">@{{ item.obj[424588] }}</td>
                <td rowspan="2">@{{ item.obj[424589] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424590] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424595] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424600] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424605] }}</td>
                <td rowspan="2">@{{ item.obj[424606] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424591] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424592] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424593] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424594] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424596] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424597] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424598] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424599] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424601] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424602] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424603] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424604] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">8</td>
                <td rowspan="2">@{{ item.obj[424607] }}</td>
                <td rowspan="2">@{{ item.obj[424608] }}</td>
                <td rowspan="2">@{{ item.obj[424609] }}</td>
                <td rowspan="2">@{{ item.obj[424610] }}</td>
                <td rowspan="2">@{{ item.obj[424611] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424612] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424617] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424622] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424627] }}</td>
                <td rowspan="2">@{{ item.obj[424628] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424613] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424614] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424615] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424616] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424618] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424619] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424620] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424621] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424623] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424624] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424625] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424626] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">9</td>
                <td rowspan="2">@{{ item.obj[424629] }}</td>
                <td rowspan="2">@{{ item.obj[424630] }}</td>
                <td rowspan="2">@{{ item.obj[424631] }}</td>
                <td rowspan="2">@{{ item.obj[424632] }}</td>
                <td rowspan="2">@{{ item.obj[424633] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424634] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424639] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424644] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424649] }}</td>
                <td rowspan="2">@{{ item.obj[424650] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424635] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424636] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424637] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424638] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424640] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424641] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424642] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424643] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424645] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424646] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424647] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424648] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">10</td>
                <td rowspan="2">@{{ item.obj[424651] }}</td>
                <td rowspan="2">@{{ item.obj[424652] }}</td>
                <td rowspan="2">@{{ item.obj[424653] }}</td>
                <td rowspan="2">@{{ item.obj[424654] }}</td>
                <td rowspan="2">@{{ item.obj[424655] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424656] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424661] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424666] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424671] }}</td>
                <td rowspan="2">@{{ item.obj[424672] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424657] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424658] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424659] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424660] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424662] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424663] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424664] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424665] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424667] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424668] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424669] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424670] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">11</td>
                <td rowspan="2">@{{ item.obj[424673] }}</td>
                <td rowspan="2">@{{ item.obj[424674] }}</td>
                <td rowspan="2">@{{ item.obj[424675] }}</td>
                <td rowspan="2">@{{ item.obj[424676] }}</td>
                <td rowspan="2">@{{ item.obj[424677] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424678] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424683] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424688] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424693] }}</td>
                <td rowspan="2">@{{ item.obj[424694] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424679] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424680] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424681] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424682] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424684] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424685] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424686] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424687] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424689] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424690] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424691] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424692] ? '&#10004;' : '' }}</td>
            </tr>

            <!-- bagian c -->
            <tr style="background:#000;color:#fff">
                <td colspan="20"><h3>C. CAIRAN INTRAVENA</h3></td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">1</td>
                <td rowspan="2">@{{ item.obj[424695] }}</td>
                <td rowspan="2">@{{ item.obj[424696] }}</td>
                <td rowspan="2">@{{ item.obj[424697] }}</td>
                <td rowspan="2">@{{ item.obj[424698] }}</td>
                <td rowspan="2">@{{ item.obj[424699] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424700] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424705] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424710] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424715] }}</td>
                <td rowspan="2">@{{ item.obj[424716] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424701] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424702] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424703] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424704] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424706] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424707] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424708] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424709] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424711] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424712] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424713] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424714] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">2</td>
                <td rowspan="2">@{{ item.obj[424717] }}</td>
                <td rowspan="2">@{{ item.obj[424718] }}</td>
                <td rowspan="2">@{{ item.obj[424719] }}</td>
                <td rowspan="2">@{{ item.obj[424720] }}</td>
                <td rowspan="2">@{{ item.obj[424721] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424722] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424727] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424732] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424737] }}</td>
                <td rowspan="2">@{{ item.obj[424738] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424723] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424724] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424725] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424726] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424728] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424729] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424730] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424731] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424733] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424734] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424735] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424736] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">3</td>
                <td rowspan="2">@{{ item.obj[424739] }}</td>
                <td rowspan="2">@{{ item.obj[424740] }}</td>
                <td rowspan="2">@{{ item.obj[424741] }}</td>
                <td rowspan="2">@{{ item.obj[424742] }}</td>
                <td rowspan="2">@{{ item.obj[424743] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424744] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424749] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424754] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424759] }}</td>
                <td rowspan="2">@{{ item.obj[424760] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424745] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424746] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424747] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424748] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424750] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424751] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424752] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424753] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424755] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424756] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424757] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424758] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">4</td>
                <td rowspan="2">@{{ item.obj[424761] }}</td>
                <td rowspan="2">@{{ item.obj[424762] }}</td>
                <td rowspan="2">@{{ item.obj[424763] }}</td>
                <td rowspan="2">@{{ item.obj[424764] }}</td>
                <td rowspan="2">@{{ item.obj[424765] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424766] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424771] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424776] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424781] }}</td>
                <td rowspan="2">@{{ item.obj[424782] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424767] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424768] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424769] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424770] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424772] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424773] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424774] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424775] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424777] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424778] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424779] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424780] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">5</td>
                <td rowspan="2">@{{ item.obj[424783] }}</td>
                <td rowspan="2">@{{ item.obj[424784] }}</td>
                <td rowspan="2">@{{ item.obj[424785] }}</td>
                <td rowspan="2">@{{ item.obj[424786] }}</td>
                <td rowspan="2">@{{ item.obj[424787] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424788] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424793] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424798] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424803] }}</td>
                <td rowspan="2">@{{ item.obj[424804] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424789] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424790] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424791] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424792] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424794] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424795] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424796] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424797] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424799] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424800] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424801] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424802] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">6</td>
                <td rowspan="2">@{{ item.obj[424805] }}</td>
                <td rowspan="2">@{{ item.obj[424806] }}</td>
                <td rowspan="2">@{{ item.obj[424807] }}</td>
                <td rowspan="2">@{{ item.obj[424808] }}</td>
                <td rowspan="2">@{{ item.obj[424809] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424810] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424815] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424820] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424825] }}</td>
                <td rowspan="2">@{{ item.obj[424826] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424811] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424812] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424813] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424814] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424816] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424817] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424818] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424819] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424821] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424822] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424823] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424824] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">7</td>
                <td rowspan="2">@{{ item.obj[424827] }}</td>
                <td rowspan="2">@{{ item.obj[424828] }}</td>
                <td rowspan="2">@{{ item.obj[424829] }}</td>
                <td rowspan="2">@{{ item.obj[424830] }}</td>
                <td rowspan="2">@{{ item.obj[424831] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424832] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424837] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424842] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424847] }}</td>
                <td rowspan="2">@{{ item.obj[424848] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424833] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424834] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424835] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424836] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424838] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424839] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424840] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424841] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424843] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424844] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424845] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424846] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">8</td>
                <td rowspan="2">@{{ item.obj[424849] }}</td>
                <td rowspan="2">@{{ item.obj[424850] }}</td>
                <td rowspan="2">@{{ item.obj[424851] }}</td>
                <td rowspan="2">@{{ item.obj[424852] }}</td>
                <td rowspan="2">@{{ item.obj[424853] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424854] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424859] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424864] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424869] }}</td>
                <td rowspan="2">@{{ item.obj[424870] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424855] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424856] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424857] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424858] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424860] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424861] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424862] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424863] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424865] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424866] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424867] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424868] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">9</td>
                <td rowspan="2">@{{ item.obj[424871] }}</td>
                <td rowspan="2">@{{ item.obj[424872] }}</td>
                <td rowspan="2">@{{ item.obj[424873] }}</td>
                <td rowspan="2">@{{ item.obj[424874] }}</td>
                <td rowspan="2">@{{ item.obj[424875] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424876] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424881] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424886] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424891] }}</td>
                <td rowspan="2">@{{ item.obj[424892] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424877] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424878] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424879] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424880] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424882] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424883] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424884] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424885] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424887] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424888] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424889] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424890] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">10</td>
                <td rowspan="2">@{{ item.obj[424893] }}</td>
                <td rowspan="2">@{{ item.obj[424894] }}</td>
                <td rowspan="2">@{{ item.obj[424895] }}</td>
                <td rowspan="2">@{{ item.obj[424896] }}</td>
                <td rowspan="2">@{{ item.obj[424897] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424898] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424903] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424908] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424913] }}</td>
                <td rowspan="2">@{{ item.obj[424914] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424899] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424900] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424901] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424902] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424904] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424905] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424906] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424907] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424909] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424910] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424911] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424912] ? '&#10004;' : '' }}</td>
            </tr>
            <tr style="height:18px">
                <td rowspan="2" style="text-align:center">11</td>
                <td rowspan="2">@{{ item.obj[424915] }}</td>
                <td rowspan="2">@{{ item.obj[424916] }}</td>
                <td rowspan="2">@{{ item.obj[424917] }}</td>
                <td rowspan="2">@{{ item.obj[424918] }}</td>
                <td rowspan="2">@{{ item.obj[424919] }}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424920] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424925] | toDate | date:'dd-MM-yyyy'}}</td>
                <td colspan="4" style="text-align:center">@{{item.obj[424930] | toDate | date:'dd-MM-yyyy'}}</td>
                
                <td rowspan="2">@{{ item.obj[424935] }}</td>
                <td rowspan="2">@{{ item.obj[424936] }}</td>
            </tr>
            <tr>
                <td>@{{ item.obj[424921] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424922] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424923] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424924] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424926] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424927] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424928] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424929] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424931] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424932] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424933] ? '&#10004;' : '' }}</td>
                <td>@{{ item.obj[424934] ? '&#10004;' : '' }}</td>
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
        console.log($scope.item.obj[424128]);
        console.log($scope.item.obj[424133]); 
        console.log($scope.item.obj[424138]);
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

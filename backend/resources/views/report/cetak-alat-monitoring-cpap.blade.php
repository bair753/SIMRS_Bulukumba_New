<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alat Monitoring CPAP</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
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
            height:200mm;
            width:297mm;
            margin-top:250mm;
            margin-bottom:250mm;
            margin-left:250mm;
            margin-right:250mm;
            margin:0 auto; 
        }
        @page{
            size: A4 Landscape;
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
        .format{
            page-break-after: always;
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
            font-size: 10pt;
            text-align: center;
        }
        table tr{
            height:20pt;
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
    </style>
</head>
<body ng-controller="cetakAlatMonitoringCPAP">
    @if (!empty($res['d1']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obj[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obj[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obj[32103938] ? item.obj[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103939] ? item.obj[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103940] ? item.obj[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103941] ? item.obj[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103942] ? item.obj[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103943] ? item.obj[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103944] ? item.obj[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103945] ? item.obj[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103946] ? item.obj[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obj[32103947] ? item.obj[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103948] ? item.obj[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103949] ? item.obj[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103950] ? item.obj[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103951] ? item.obj[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103952] ? item.obj[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103953] ? item.obj[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103954] ? item.obj[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103955] ? item.obj[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obj[32103956] ? item.obj[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103957] ? item.obj[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103958] ? item.obj[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103959] ? item.obj[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103960] ? item.obj[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103961] ? item.obj[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103962] ? item.obj[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103963] ? item.obj[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103964] ? item.obj[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obj[32103965] ? item.obj[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103966] ? item.obj[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103967] ? item.obj[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103968] ? item.obj[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103969] ? item.obj[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103970] ? item.obj[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103971] ? item.obj[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103972] ? item.obj[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103973] ? item.obj[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obj[32103974] ? item.obj[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103975] ? item.obj[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103976] ? item.obj[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103977] ? item.obj[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103978] ? item.obj[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103979] ? item.obj[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103980] ? item.obj[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103981] ? item.obj[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103982] ? item.obj[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obj[32103983] ? item.obj[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103984] ? item.obj[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103985] ? item.obj[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103986] ? item.obj[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103987] ? item.obj[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103988] ? item.obj[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103989] ? item.obj[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103990] ? item.obj[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32103991] ? item.obj[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obj[32103992] ? item.obj[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103993] ? item.obj[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103994] ? item.obj[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103995] ? item.obj[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103996] ? item.obj[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103997] ? item.obj[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103998] ? item.obj[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32103999] ? item.obj[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32104000] ? item.obj[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obj[32104001] ? item.obj[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obj[32104002] ? item.obj[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104003] ? item.obj[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104004] ? item.obj[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104005] ? item.obj[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104006] ? item.obj[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104007] ? item.obj[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104008] ? item.obj[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104009] ? item.obj[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32104010] ? item.obj[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obj[32104011] ? item.obj[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104012] ? item.obj[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104013] ? item.obj[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104014] ? item.obj[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104015] ? item.obj[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104016] ? item.obj[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104017] ? item.obj[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104018] ? item.obj[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32104019] ? item.obj[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obj[32104020] ? item.obj[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104021] ? item.obj[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104022] ? item.obj[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104023] ? item.obj[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104024] ? item.obj[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104025] ? item.obj[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104026] ? item.obj[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104027] ? item.obj[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32104028] ? item.obj[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obj[32104029] ? item.obj[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104030] ? item.obj[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104031] ? item.obj[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104032] ? item.obj[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104033] ? item.obj[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104034] ? item.obj[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104035] ? item.obj[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obj[32104036] ? item.obj[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obj[32104037] ? item.obj[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obj[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d2']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji2[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji2[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji2[32103938] ? item.obji2[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103939] ? item.obji2[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103940] ? item.obji2[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103941] ? item.obji2[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103942] ? item.obji2[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103943] ? item.obji2[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103944] ? item.obji2[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103945] ? item.obji2[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103946] ? item.obji2[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji2[32103947] ? item.obji2[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103948] ? item.obji2[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103949] ? item.obji2[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103950] ? item.obji2[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103951] ? item.obji2[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103952] ? item.obji2[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103953] ? item.obji2[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103954] ? item.obji2[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103955] ? item.obji2[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji2[32103956] ? item.obji2[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103957] ? item.obji2[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103958] ? item.obji2[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103959] ? item.obji2[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103960] ? item.obji2[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103961] ? item.obji2[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103962] ? item.obji2[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103963] ? item.obji2[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103964] ? item.obji2[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji2[32103965] ? item.obji2[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103966] ? item.obji2[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103967] ? item.obji2[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103968] ? item.obji2[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103969] ? item.obji2[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103970] ? item.obji2[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103971] ? item.obji2[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103972] ? item.obji2[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103973] ? item.obji2[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji2[32103974] ? item.obji2[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103975] ? item.obji2[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103976] ? item.obji2[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103977] ? item.obji2[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103978] ? item.obji2[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103979] ? item.obji2[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103980] ? item.obji2[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103981] ? item.obji2[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103982] ? item.obji2[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji2[32103983] ? item.obji2[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103984] ? item.obji2[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103985] ? item.obji2[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103986] ? item.obji2[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103987] ? item.obji2[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103988] ? item.obji2[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103989] ? item.obji2[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103990] ? item.obji2[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32103991] ? item.obji2[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji2[32103992] ? item.obji2[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103993] ? item.obji2[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103994] ? item.obji2[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103995] ? item.obji2[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103996] ? item.obji2[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103997] ? item.obji2[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103998] ? item.obji2[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32103999] ? item.obji2[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32104000] ? item.obji2[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji2[32104001] ? item.obji2[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji2[32104002] ? item.obji2[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104003] ? item.obji2[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104004] ? item.obji2[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104005] ? item.obji2[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104006] ? item.obji2[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104007] ? item.obji2[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104008] ? item.obji2[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104009] ? item.obji2[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32104010] ? item.obji2[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji2[32104011] ? item.obji2[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104012] ? item.obji2[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104013] ? item.obji2[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104014] ? item.obji2[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104015] ? item.obji2[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104016] ? item.obji2[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104017] ? item.obji2[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104018] ? item.obji2[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32104019] ? item.obji2[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji2[32104020] ? item.obji2[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104021] ? item.obji2[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104022] ? item.obji2[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104023] ? item.obji2[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104024] ? item.obji2[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104025] ? item.obji2[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104026] ? item.obji2[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104027] ? item.obji2[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32104028] ? item.obji2[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji2[32104029] ? item.obji2[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104030] ? item.obji2[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104031] ? item.obji2[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104032] ? item.obji2[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104033] ? item.obji2[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104034] ? item.obji2[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104035] ? item.obji2[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji2[32104036] ? item.obji2[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji2[32104037] ? item.obji2[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji2[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d3']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji3[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji3[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji3[32103938] ? item.obji3[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103939] ? item.obji3[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103940] ? item.obji3[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103941] ? item.obji3[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103942] ? item.obji3[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103943] ? item.obji3[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103944] ? item.obji3[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103945] ? item.obji3[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103946] ? item.obji3[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji3[32103947] ? item.obji3[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103948] ? item.obji3[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103949] ? item.obji3[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103950] ? item.obji3[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103951] ? item.obji3[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103952] ? item.obji3[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103953] ? item.obji3[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103954] ? item.obji3[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103955] ? item.obji3[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji3[32103956] ? item.obji3[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103957] ? item.obji3[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103958] ? item.obji3[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103959] ? item.obji3[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103960] ? item.obji3[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103961] ? item.obji3[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103962] ? item.obji3[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103963] ? item.obji3[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103964] ? item.obji3[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji3[32103965] ? item.obji3[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103966] ? item.obji3[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103967] ? item.obji3[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103968] ? item.obji3[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103969] ? item.obji3[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103970] ? item.obji3[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103971] ? item.obji3[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103972] ? item.obji3[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103973] ? item.obji3[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji3[32103974] ? item.obji3[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103975] ? item.obji3[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103976] ? item.obji3[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103977] ? item.obji3[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103978] ? item.obji3[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103979] ? item.obji3[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103980] ? item.obji3[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103981] ? item.obji3[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103982] ? item.obji3[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji3[32103983] ? item.obji3[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103984] ? item.obji3[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103985] ? item.obji3[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103986] ? item.obji3[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103987] ? item.obji3[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103988] ? item.obji3[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103989] ? item.obji3[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103990] ? item.obji3[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32103991] ? item.obji3[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji3[32103992] ? item.obji3[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103993] ? item.obji3[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103994] ? item.obji3[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103995] ? item.obji3[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103996] ? item.obji3[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103997] ? item.obji3[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103998] ? item.obji3[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32103999] ? item.obji3[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32104000] ? item.obji3[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji3[32104001] ? item.obji3[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji3[32104002] ? item.obji3[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104003] ? item.obji3[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104004] ? item.obji3[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104005] ? item.obji3[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104006] ? item.obji3[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104007] ? item.obji3[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104008] ? item.obji3[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104009] ? item.obji3[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32104010] ? item.obji3[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji3[32104011] ? item.obji3[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104012] ? item.obji3[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104013] ? item.obji3[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104014] ? item.obji3[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104015] ? item.obji3[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104016] ? item.obji3[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104017] ? item.obji3[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104018] ? item.obji3[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32104019] ? item.obji3[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji3[32104020] ? item.obji3[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104021] ? item.obji3[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104022] ? item.obji3[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104023] ? item.obji3[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104024] ? item.obji3[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104025] ? item.obji3[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104026] ? item.obji3[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104027] ? item.obji3[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32104028] ? item.obji3[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji3[32104029] ? item.obji3[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104030] ? item.obji3[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104031] ? item.obji3[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104032] ? item.obji3[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104033] ? item.obji3[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104034] ? item.obji3[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104035] ? item.obji3[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji3[32104036] ? item.obji3[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji3[32104037] ? item.obji3[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji3[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d4']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji4[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji4[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji4[32103938] ? item.obji4[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103939] ? item.obji4[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103940] ? item.obji4[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103941] ? item.obji4[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103942] ? item.obji4[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103943] ? item.obji4[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103944] ? item.obji4[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103945] ? item.obji4[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103946] ? item.obji4[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji4[32103947] ? item.obji4[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103948] ? item.obji4[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103949] ? item.obji4[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103950] ? item.obji4[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103951] ? item.obji4[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103952] ? item.obji4[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103953] ? item.obji4[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103954] ? item.obji4[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103955] ? item.obji4[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji4[32103956] ? item.obji4[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103957] ? item.obji4[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103958] ? item.obji4[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103959] ? item.obji4[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103960] ? item.obji4[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103961] ? item.obji4[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103962] ? item.obji4[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103963] ? item.obji4[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103964] ? item.obji4[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji4[32103965] ? item.obji4[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103966] ? item.obji4[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103967] ? item.obji4[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103968] ? item.obji4[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103969] ? item.obji4[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103970] ? item.obji4[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103971] ? item.obji4[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103972] ? item.obji4[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103973] ? item.obji4[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji4[32103974] ? item.obji4[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103975] ? item.obji4[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103976] ? item.obji4[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103977] ? item.obji4[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103978] ? item.obji4[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103979] ? item.obji4[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103980] ? item.obji4[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103981] ? item.obji4[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103982] ? item.obji4[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji4[32103983] ? item.obji4[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103984] ? item.obji4[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103985] ? item.obji4[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103986] ? item.obji4[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103987] ? item.obji4[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103988] ? item.obji4[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103989] ? item.obji4[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103990] ? item.obji4[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32103991] ? item.obji4[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji4[32103992] ? item.obji4[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103993] ? item.obji4[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103994] ? item.obji4[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103995] ? item.obji4[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103996] ? item.obji4[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103997] ? item.obji4[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103998] ? item.obji4[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32103999] ? item.obji4[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32104000] ? item.obji4[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji4[32104001] ? item.obji4[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji4[32104002] ? item.obji4[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104003] ? item.obji4[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104004] ? item.obji4[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104005] ? item.obji4[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104006] ? item.obji4[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104007] ? item.obji4[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104008] ? item.obji4[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104009] ? item.obji4[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32104010] ? item.obji4[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji4[32104011] ? item.obji4[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104012] ? item.obji4[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104013] ? item.obji4[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104014] ? item.obji4[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104015] ? item.obji4[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104016] ? item.obji4[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104017] ? item.obji4[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104018] ? item.obji4[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32104019] ? item.obji4[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji4[32104020] ? item.obji4[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104021] ? item.obji4[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104022] ? item.obji4[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104023] ? item.obji4[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104024] ? item.obji4[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104025] ? item.obji4[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104026] ? item.obji4[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104027] ? item.obji4[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32104028] ? item.obji4[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji4[32104029] ? item.obji4[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104030] ? item.obji4[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104031] ? item.obji4[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104032] ? item.obji4[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104033] ? item.obji4[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104034] ? item.obji4[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104035] ? item.obji4[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji4[32104036] ? item.obji4[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji4[32104037] ? item.obji4[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji4[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d5']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji5[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji5[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji5[32103938] ? item.obji5[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103939] ? item.obji5[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103940] ? item.obji5[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103941] ? item.obji5[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103942] ? item.obji5[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103943] ? item.obji5[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103944] ? item.obji5[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103945] ? item.obji5[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103946] ? item.obji5[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji5[32103947] ? item.obji5[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103948] ? item.obji5[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103949] ? item.obji5[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103950] ? item.obji5[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103951] ? item.obji5[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103952] ? item.obji5[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103953] ? item.obji5[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103954] ? item.obji5[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103955] ? item.obji5[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji5[32103956] ? item.obji5[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103957] ? item.obji5[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103958] ? item.obji5[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103959] ? item.obji5[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103960] ? item.obji5[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103961] ? item.obji5[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103962] ? item.obji5[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103963] ? item.obji5[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103964] ? item.obji5[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji5[32103965] ? item.obji5[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103966] ? item.obji5[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103967] ? item.obji5[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103968] ? item.obji5[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103969] ? item.obji5[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103970] ? item.obji5[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103971] ? item.obji5[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103972] ? item.obji5[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103973] ? item.obji5[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji5[32103974] ? item.obji5[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103975] ? item.obji5[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103976] ? item.obji5[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103977] ? item.obji5[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103978] ? item.obji5[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103979] ? item.obji5[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103980] ? item.obji5[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103981] ? item.obji5[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103982] ? item.obji5[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji5[32103983] ? item.obji5[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103984] ? item.obji5[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103985] ? item.obji5[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103986] ? item.obji5[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103987] ? item.obji5[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103988] ? item.obji5[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103989] ? item.obji5[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103990] ? item.obji5[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32103991] ? item.obji5[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji5[32103992] ? item.obji5[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103993] ? item.obji5[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103994] ? item.obji5[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103995] ? item.obji5[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103996] ? item.obji5[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103997] ? item.obji5[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103998] ? item.obji5[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32103999] ? item.obji5[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32104000] ? item.obji5[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji5[32104001] ? item.obji5[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji5[32104002] ? item.obji5[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104003] ? item.obji5[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104004] ? item.obji5[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104005] ? item.obji5[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104006] ? item.obji5[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104007] ? item.obji5[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104008] ? item.obji5[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104009] ? item.obji5[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32104010] ? item.obji5[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji5[32104011] ? item.obji5[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104012] ? item.obji5[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104013] ? item.obji5[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104014] ? item.obji5[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104015] ? item.obji5[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104016] ? item.obji5[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104017] ? item.obji5[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104018] ? item.obji5[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32104019] ? item.obji5[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji5[32104020] ? item.obji5[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104021] ? item.obji5[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104022] ? item.obji5[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104023] ? item.obji5[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104024] ? item.obji5[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104025] ? item.obji5[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104026] ? item.obji5[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104027] ? item.obji5[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32104028] ? item.obji5[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji5[32104029] ? item.obji5[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104030] ? item.obji5[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104031] ? item.obji5[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104032] ? item.obji5[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104033] ? item.obji5[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104034] ? item.obji5[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104035] ? item.obji5[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji5[32104036] ? item.obji5[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji5[32104037] ? item.obji5[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji5[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d6']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji6[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji6[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji6[32103938] ? item.obji6[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103939] ? item.obji6[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103940] ? item.obji6[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103941] ? item.obji6[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103942] ? item.obji6[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103943] ? item.obji6[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103944] ? item.obji6[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103945] ? item.obji6[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103946] ? item.obji6[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji6[32103947] ? item.obji6[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103948] ? item.obji6[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103949] ? item.obji6[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103950] ? item.obji6[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103951] ? item.obji6[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103952] ? item.obji6[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103953] ? item.obji6[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103954] ? item.obji6[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103955] ? item.obji6[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji6[32103956] ? item.obji6[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103957] ? item.obji6[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103958] ? item.obji6[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103959] ? item.obji6[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103960] ? item.obji6[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103961] ? item.obji6[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103962] ? item.obji6[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103963] ? item.obji6[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103964] ? item.obji6[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji6[32103965] ? item.obji6[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103966] ? item.obji6[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103967] ? item.obji6[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103968] ? item.obji6[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103969] ? item.obji6[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103970] ? item.obji6[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103971] ? item.obji6[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103972] ? item.obji6[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103973] ? item.obji6[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji6[32103974] ? item.obji6[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103975] ? item.obji6[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103976] ? item.obji6[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103977] ? item.obji6[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103978] ? item.obji6[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103979] ? item.obji6[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103980] ? item.obji6[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103981] ? item.obji6[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103982] ? item.obji6[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji6[32103983] ? item.obji6[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103984] ? item.obji6[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103985] ? item.obji6[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103986] ? item.obji6[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103987] ? item.obji6[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103988] ? item.obji6[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103989] ? item.obji6[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103990] ? item.obji6[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32103991] ? item.obji6[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji6[32103992] ? item.obji6[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103993] ? item.obji6[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103994] ? item.obji6[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103995] ? item.obji6[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103996] ? item.obji6[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103997] ? item.obji6[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103998] ? item.obji6[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32103999] ? item.obji6[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32104000] ? item.obji6[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji6[32104001] ? item.obji6[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji6[32104002] ? item.obji6[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104003] ? item.obji6[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104004] ? item.obji6[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104005] ? item.obji6[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104006] ? item.obji6[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104007] ? item.obji6[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104008] ? item.obji6[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104009] ? item.obji6[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32104010] ? item.obji6[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji6[32104011] ? item.obji6[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104012] ? item.obji6[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104013] ? item.obji6[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104014] ? item.obji6[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104015] ? item.obji6[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104016] ? item.obji6[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104017] ? item.obji6[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104018] ? item.obji6[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32104019] ? item.obji6[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji6[32104020] ? item.obji6[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104021] ? item.obji6[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104022] ? item.obji6[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104023] ? item.obji6[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104024] ? item.obji6[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104025] ? item.obji6[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104026] ? item.obji6[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104027] ? item.obji6[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32104028] ? item.obji6[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji6[32104029] ? item.obji6[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104030] ? item.obji6[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104031] ? item.obji6[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104032] ? item.obji6[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104033] ? item.obji6[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104034] ? item.obji6[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104035] ? item.obji6[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji6[32104036] ? item.obji6[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji6[32104037] ? item.obji6[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji6[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d7']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji7[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji7[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji7[32103938] ? item.obji7[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103939] ? item.obji7[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103940] ? item.obji7[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103941] ? item.obji7[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103942] ? item.obji7[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103943] ? item.obji7[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103944] ? item.obji7[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103945] ? item.obji7[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103946] ? item.obji7[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji7[32103947] ? item.obji7[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103948] ? item.obji7[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103949] ? item.obji7[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103950] ? item.obji7[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103951] ? item.obji7[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103952] ? item.obji7[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103953] ? item.obji7[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103954] ? item.obji7[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103955] ? item.obji7[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji7[32103956] ? item.obji7[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103957] ? item.obji7[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103958] ? item.obji7[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103959] ? item.obji7[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103960] ? item.obji7[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103961] ? item.obji7[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103962] ? item.obji7[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103963] ? item.obji7[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103964] ? item.obji7[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji7[32103965] ? item.obji7[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103966] ? item.obji7[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103967] ? item.obji7[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103968] ? item.obji7[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103969] ? item.obji7[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103970] ? item.obji7[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103971] ? item.obji7[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103972] ? item.obji7[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103973] ? item.obji7[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji7[32103974] ? item.obji7[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103975] ? item.obji7[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103976] ? item.obji7[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103977] ? item.obji7[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103978] ? item.obji7[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103979] ? item.obji7[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103980] ? item.obji7[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103981] ? item.obji7[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103982] ? item.obji7[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji7[32103983] ? item.obji7[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103984] ? item.obji7[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103985] ? item.obji7[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103986] ? item.obji7[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103987] ? item.obji7[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103988] ? item.obji7[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103989] ? item.obji7[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103990] ? item.obji7[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32103991] ? item.obji7[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji7[32103992] ? item.obji7[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103993] ? item.obji7[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103994] ? item.obji7[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103995] ? item.obji7[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103996] ? item.obji7[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103997] ? item.obji7[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103998] ? item.obji7[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32103999] ? item.obji7[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32104000] ? item.obji7[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji7[32104001] ? item.obji7[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji7[32104002] ? item.obji7[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104003] ? item.obji7[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104004] ? item.obji7[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104005] ? item.obji7[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104006] ? item.obji7[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104007] ? item.obji7[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104008] ? item.obji7[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104009] ? item.obji7[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32104010] ? item.obji7[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji7[32104011] ? item.obji7[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104012] ? item.obji7[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104013] ? item.obji7[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104014] ? item.obji7[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104015] ? item.obji7[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104016] ? item.obji7[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104017] ? item.obji7[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104018] ? item.obji7[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32104019] ? item.obji7[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji7[32104020] ? item.obji7[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104021] ? item.obji7[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104022] ? item.obji7[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104023] ? item.obji7[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104024] ? item.obji7[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104025] ? item.obji7[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104026] ? item.obji7[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104027] ? item.obji7[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32104028] ? item.obji7[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji7[32104029] ? item.obji7[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104030] ? item.obji7[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104031] ? item.obji7[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104032] ? item.obji7[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104033] ? item.obji7[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104034] ? item.obji7[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104035] ? item.obji7[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji7[32104036] ? item.obji7[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji7[32104037] ? item.obji7[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji7[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d8']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji8[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji8[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji8[32103938] ? item.obji8[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103939] ? item.obji8[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103940] ? item.obji8[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103941] ? item.obji8[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103942] ? item.obji8[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103943] ? item.obji8[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103944] ? item.obji8[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103945] ? item.obji8[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103946] ? item.obji8[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji8[32103947] ? item.obji8[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103948] ? item.obji8[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103949] ? item.obji8[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103950] ? item.obji8[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103951] ? item.obji8[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103952] ? item.obji8[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103953] ? item.obji8[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103954] ? item.obji8[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103955] ? item.obji8[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji8[32103956] ? item.obji8[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103957] ? item.obji8[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103958] ? item.obji8[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103959] ? item.obji8[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103960] ? item.obji8[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103961] ? item.obji8[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103962] ? item.obji8[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103963] ? item.obji8[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103964] ? item.obji8[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji8[32103965] ? item.obji8[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103966] ? item.obji8[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103967] ? item.obji8[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103968] ? item.obji8[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103969] ? item.obji8[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103970] ? item.obji8[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103971] ? item.obji8[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103972] ? item.obji8[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103973] ? item.obji8[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji8[32103974] ? item.obji8[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103975] ? item.obji8[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103976] ? item.obji8[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103977] ? item.obji8[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103978] ? item.obji8[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103979] ? item.obji8[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103980] ? item.obji8[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103981] ? item.obji8[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103982] ? item.obji8[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji8[32103983] ? item.obji8[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103984] ? item.obji8[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103985] ? item.obji8[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103986] ? item.obji8[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103987] ? item.obji8[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103988] ? item.obji8[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103989] ? item.obji8[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103990] ? item.obji8[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32103991] ? item.obji8[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji8[32103992] ? item.obji8[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103993] ? item.obji8[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103994] ? item.obji8[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103995] ? item.obji8[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103996] ? item.obji8[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103997] ? item.obji8[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103998] ? item.obji8[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32103999] ? item.obji8[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32104000] ? item.obji8[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji8[32104001] ? item.obji8[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji8[32104002] ? item.obji8[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104003] ? item.obji8[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104004] ? item.obji8[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104005] ? item.obji8[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104006] ? item.obji8[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104007] ? item.obji8[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104008] ? item.obji8[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104009] ? item.obji8[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32104010] ? item.obji8[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji8[32104011] ? item.obji8[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104012] ? item.obji8[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104013] ? item.obji8[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104014] ? item.obji8[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104015] ? item.obji8[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104016] ? item.obji8[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104017] ? item.obji8[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104018] ? item.obji8[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32104019] ? item.obji8[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji8[32104020] ? item.obji8[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104021] ? item.obji8[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104022] ? item.obji8[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104023] ? item.obji8[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104024] ? item.obji8[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104025] ? item.obji8[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104026] ? item.obji8[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104027] ? item.obji8[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32104028] ? item.obji8[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji8[32104029] ? item.obji8[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104030] ? item.obji8[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104031] ? item.obji8[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104032] ? item.obji8[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104033] ? item.obji8[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104034] ? item.obji8[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104035] ? item.obji8[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji8[32104036] ? item.obji8[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji8[32104037] ? item.obji8[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji8[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d9']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji9[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji9[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji9[32103938] ? item.obji9[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103939] ? item.obji9[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103940] ? item.obji9[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103941] ? item.obji9[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103942] ? item.obji9[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103943] ? item.obji9[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103944] ? item.obji9[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103945] ? item.obji9[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103946] ? item.obji9[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji9[32103947] ? item.obji9[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103948] ? item.obji9[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103949] ? item.obji9[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103950] ? item.obji9[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103951] ? item.obji9[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103952] ? item.obji9[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103953] ? item.obji9[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103954] ? item.obji9[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103955] ? item.obji9[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji9[32103956] ? item.obji9[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103957] ? item.obji9[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103958] ? item.obji9[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103959] ? item.obji9[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103960] ? item.obji9[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103961] ? item.obji9[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103962] ? item.obji9[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103963] ? item.obji9[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103964] ? item.obji9[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji9[32103965] ? item.obji9[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103966] ? item.obji9[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103967] ? item.obji9[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103968] ? item.obji9[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103969] ? item.obji9[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103970] ? item.obji9[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103971] ? item.obji9[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103972] ? item.obji9[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103973] ? item.obji9[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji9[32103974] ? item.obji9[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103975] ? item.obji9[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103976] ? item.obji9[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103977] ? item.obji9[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103978] ? item.obji9[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103979] ? item.obji9[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103980] ? item.obji9[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103981] ? item.obji9[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103982] ? item.obji9[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji9[32103983] ? item.obji9[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103984] ? item.obji9[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103985] ? item.obji9[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103986] ? item.obji9[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103987] ? item.obji9[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103988] ? item.obji9[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103989] ? item.obji9[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103990] ? item.obji9[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32103991] ? item.obji9[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji9[32103992] ? item.obji9[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103993] ? item.obji9[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103994] ? item.obji9[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103995] ? item.obji9[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103996] ? item.obji9[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103997] ? item.obji9[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103998] ? item.obji9[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32103999] ? item.obji9[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32104000] ? item.obji9[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji9[32104001] ? item.obji9[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji9[32104002] ? item.obji9[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104003] ? item.obji9[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104004] ? item.obji9[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104005] ? item.obji9[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104006] ? item.obji9[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104007] ? item.obji9[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104008] ? item.obji9[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104009] ? item.obji9[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32104010] ? item.obji9[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji9[32104011] ? item.obji9[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104012] ? item.obji9[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104013] ? item.obji9[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104014] ? item.obji9[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104015] ? item.obji9[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104016] ? item.obji9[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104017] ? item.obji9[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104018] ? item.obji9[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32104019] ? item.obji9[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji9[32104020] ? item.obji9[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104021] ? item.obji9[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104022] ? item.obji9[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104023] ? item.obji9[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104024] ? item.obji9[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104025] ? item.obji9[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104026] ? item.obji9[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104027] ? item.obji9[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32104028] ? item.obji9[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji9[32104029] ? item.obji9[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104030] ? item.obji9[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104031] ? item.obji9[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104032] ? item.obji9[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104033] ? item.obji9[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104034] ? item.obji9[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104035] ? item.obji9[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji9[32104036] ? item.obji9[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji9[32104037] ? item.obji9[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji9[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d10']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji10[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji10[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji10[32103938] ? item.obji10[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103939] ? item.obji10[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103940] ? item.obji10[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103941] ? item.obji10[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103942] ? item.obji10[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103943] ? item.obji10[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103944] ? item.obji10[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103945] ? item.obji10[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103946] ? item.obji10[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji10[32103947] ? item.obji10[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103948] ? item.obji10[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103949] ? item.obji10[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103950] ? item.obji10[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103951] ? item.obji10[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103952] ? item.obji10[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103953] ? item.obji10[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103954] ? item.obji10[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103955] ? item.obji10[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji10[32103956] ? item.obji10[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103957] ? item.obji10[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103958] ? item.obji10[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103959] ? item.obji10[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103960] ? item.obji10[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103961] ? item.obji10[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103962] ? item.obji10[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103963] ? item.obji10[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103964] ? item.obji10[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji10[32103965] ? item.obji10[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103966] ? item.obji10[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103967] ? item.obji10[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103968] ? item.obji10[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103969] ? item.obji10[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103970] ? item.obji10[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103971] ? item.obji10[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103972] ? item.obji10[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103973] ? item.obji10[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji10[32103974] ? item.obji10[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103975] ? item.obji10[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103976] ? item.obji10[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103977] ? item.obji10[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103978] ? item.obji10[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103979] ? item.obji10[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103980] ? item.obji10[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103981] ? item.obji10[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103982] ? item.obji10[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji10[32103983] ? item.obji10[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103984] ? item.obji10[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103985] ? item.obji10[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103986] ? item.obji10[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103987] ? item.obji10[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103988] ? item.obji10[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103989] ? item.obji10[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103990] ? item.obji10[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32103991] ? item.obji10[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji10[32103992] ? item.obji10[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103993] ? item.obji10[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103994] ? item.obji10[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103995] ? item.obji10[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103996] ? item.obji10[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103997] ? item.obji10[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103998] ? item.obji10[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32103999] ? item.obji10[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32104000] ? item.obji10[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji10[32104001] ? item.obji10[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji10[32104002] ? item.obji10[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104003] ? item.obji10[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104004] ? item.obji10[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104005] ? item.obji10[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104006] ? item.obji10[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104007] ? item.obji10[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104008] ? item.obji10[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104009] ? item.obji10[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32104010] ? item.obji10[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji10[32104011] ? item.obji10[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104012] ? item.obji10[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104013] ? item.obji10[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104014] ? item.obji10[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104015] ? item.obji10[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104016] ? item.obji10[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104017] ? item.obji10[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104018] ? item.obji10[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32104019] ? item.obji10[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji10[32104020] ? item.obji10[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104021] ? item.obji10[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104022] ? item.obji10[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104023] ? item.obji10[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104024] ? item.obji10[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104025] ? item.obji10[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104026] ? item.obji10[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104027] ? item.obji10[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32104028] ? item.obji10[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji10[32104029] ? item.obji10[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104030] ? item.obji10[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104031] ? item.obji10[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104032] ? item.obji10[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104033] ? item.obji10[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104034] ? item.obji10[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104035] ? item.obji10[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji10[32104036] ? item.obji10[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji10[32104037] ? item.obji10[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji10[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d11']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji11[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji11[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji11[32103938] ? item.obji11[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103939] ? item.obji11[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103940] ? item.obji11[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103941] ? item.obji11[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103942] ? item.obji11[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103943] ? item.obji11[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103944] ? item.obji11[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103945] ? item.obji11[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103946] ? item.obji11[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji11[32103947] ? item.obji11[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103948] ? item.obji11[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103949] ? item.obji11[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103950] ? item.obji11[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103951] ? item.obji11[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103952] ? item.obji11[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103953] ? item.obji11[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103954] ? item.obji11[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103955] ? item.obji11[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji11[32103956] ? item.obji11[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103957] ? item.obji11[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103958] ? item.obji11[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103959] ? item.obji11[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103960] ? item.obji11[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103961] ? item.obji11[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103962] ? item.obji11[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103963] ? item.obji11[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103964] ? item.obji11[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji11[32103965] ? item.obji11[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103966] ? item.obji11[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103967] ? item.obji11[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103968] ? item.obji11[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103969] ? item.obji11[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103970] ? item.obji11[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103971] ? item.obji11[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103972] ? item.obji11[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103973] ? item.obji11[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji11[32103974] ? item.obji11[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103975] ? item.obji11[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103976] ? item.obji11[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103977] ? item.obji11[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103978] ? item.obji11[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103979] ? item.obji11[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103980] ? item.obji11[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103981] ? item.obji11[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103982] ? item.obji11[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji11[32103983] ? item.obji11[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103984] ? item.obji11[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103985] ? item.obji11[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103986] ? item.obji11[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103987] ? item.obji11[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103988] ? item.obji11[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103989] ? item.obji11[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103990] ? item.obji11[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32103991] ? item.obji11[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji11[32103992] ? item.obji11[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103993] ? item.obji11[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103994] ? item.obji11[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103995] ? item.obji11[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103996] ? item.obji11[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103997] ? item.obji11[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103998] ? item.obji11[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32103999] ? item.obji11[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32104000] ? item.obji11[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji11[32104001] ? item.obji11[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji11[32104002] ? item.obji11[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104003] ? item.obji11[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104004] ? item.obji11[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104005] ? item.obji11[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104006] ? item.obji11[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104007] ? item.obji11[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104008] ? item.obji11[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104009] ? item.obji11[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32104010] ? item.obji11[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji11[32104011] ? item.obji11[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104012] ? item.obji11[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104013] ? item.obji11[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104014] ? item.obji11[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104015] ? item.obji11[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104016] ? item.obji11[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104017] ? item.obji11[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104018] ? item.obji11[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32104019] ? item.obji11[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji11[32104020] ? item.obji11[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104021] ? item.obji11[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104022] ? item.obji11[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104023] ? item.obji11[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104024] ? item.obji11[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104025] ? item.obji11[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104026] ? item.obji11[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104027] ? item.obji11[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32104028] ? item.obji11[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji11[32104029] ? item.obji11[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104030] ? item.obji11[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104031] ? item.obji11[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104032] ? item.obji11[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104033] ? item.obji11[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104034] ? item.obji11[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104035] ? item.obji11[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji11[32104036] ? item.obji11[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji11[32104037] ? item.obji11[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji11[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d12']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji12[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji12[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji12[32103938] ? item.obji12[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103939] ? item.obji12[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103940] ? item.obji12[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103941] ? item.obji12[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103942] ? item.obji12[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103943] ? item.obji12[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103944] ? item.obji12[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103945] ? item.obji12[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103946] ? item.obji12[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji12[32103947] ? item.obji12[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103948] ? item.obji12[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103949] ? item.obji12[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103950] ? item.obji12[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103951] ? item.obji12[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103952] ? item.obji12[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103953] ? item.obji12[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103954] ? item.obji12[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103955] ? item.obji12[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji12[32103956] ? item.obji12[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103957] ? item.obji12[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103958] ? item.obji12[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103959] ? item.obji12[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103960] ? item.obji12[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103961] ? item.obji12[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103962] ? item.obji12[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103963] ? item.obji12[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103964] ? item.obji12[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji12[32103965] ? item.obji12[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103966] ? item.obji12[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103967] ? item.obji12[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103968] ? item.obji12[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103969] ? item.obji12[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103970] ? item.obji12[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103971] ? item.obji12[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103972] ? item.obji12[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103973] ? item.obji12[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji12[32103974] ? item.obji12[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103975] ? item.obji12[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103976] ? item.obji12[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103977] ? item.obji12[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103978] ? item.obji12[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103979] ? item.obji12[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103980] ? item.obji12[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103981] ? item.obji12[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103982] ? item.obji12[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji12[32103983] ? item.obji12[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103984] ? item.obji12[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103985] ? item.obji12[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103986] ? item.obji12[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103987] ? item.obji12[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103988] ? item.obji12[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103989] ? item.obji12[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103990] ? item.obji12[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32103991] ? item.obji12[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji12[32103992] ? item.obji12[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103993] ? item.obji12[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103994] ? item.obji12[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103995] ? item.obji12[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103996] ? item.obji12[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103997] ? item.obji12[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103998] ? item.obji12[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32103999] ? item.obji12[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32104000] ? item.obji12[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji12[32104001] ? item.obji12[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji12[32104002] ? item.obji12[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104003] ? item.obji12[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104004] ? item.obji12[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104005] ? item.obji12[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104006] ? item.obji12[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104007] ? item.obji12[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104008] ? item.obji12[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104009] ? item.obji12[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32104010] ? item.obji12[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji12[32104011] ? item.obji12[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104012] ? item.obji12[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104013] ? item.obji12[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104014] ? item.obji12[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104015] ? item.obji12[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104016] ? item.obji12[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104017] ? item.obji12[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104018] ? item.obji12[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32104019] ? item.obji12[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji12[32104020] ? item.obji12[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104021] ? item.obji12[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104022] ? item.obji12[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104023] ? item.obji12[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104024] ? item.obji12[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104025] ? item.obji12[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104026] ? item.obji12[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104027] ? item.obji12[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32104028] ? item.obji12[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji12[32104029] ? item.obji12[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104030] ? item.obji12[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104031] ? item.obji12[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104032] ? item.obji12[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104033] ? item.obji12[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104034] ? item.obji12[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104035] ? item.obji12[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji12[32104036] ? item.obji12[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji12[32104037] ? item.obji12[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji12[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d13']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji13[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji13[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji13[32103938] ? item.obji13[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103939] ? item.obji13[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103940] ? item.obji13[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103941] ? item.obji13[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103942] ? item.obji13[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103943] ? item.obji13[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103944] ? item.obji13[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103945] ? item.obji13[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103946] ? item.obji13[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji13[32103947] ? item.obji13[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103948] ? item.obji13[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103949] ? item.obji13[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103950] ? item.obji13[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103951] ? item.obji13[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103952] ? item.obji13[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103953] ? item.obji13[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103954] ? item.obji13[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103955] ? item.obji13[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji13[32103956] ? item.obji13[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103957] ? item.obji13[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103958] ? item.obji13[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103959] ? item.obji13[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103960] ? item.obji13[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103961] ? item.obji13[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103962] ? item.obji13[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103963] ? item.obji13[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103964] ? item.obji13[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji13[32103965] ? item.obji13[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103966] ? item.obji13[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103967] ? item.obji13[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103968] ? item.obji13[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103969] ? item.obji13[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103970] ? item.obji13[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103971] ? item.obji13[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103972] ? item.obji13[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103973] ? item.obji13[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji13[32103974] ? item.obji13[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103975] ? item.obji13[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103976] ? item.obji13[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103977] ? item.obji13[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103978] ? item.obji13[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103979] ? item.obji13[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103980] ? item.obji13[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103981] ? item.obji13[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103982] ? item.obji13[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji13[32103983] ? item.obji13[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103984] ? item.obji13[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103985] ? item.obji13[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103986] ? item.obji13[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103987] ? item.obji13[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103988] ? item.obji13[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103989] ? item.obji13[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103990] ? item.obji13[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32103991] ? item.obji13[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji13[32103992] ? item.obji13[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103993] ? item.obji13[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103994] ? item.obji13[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103995] ? item.obji13[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103996] ? item.obji13[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103997] ? item.obji13[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103998] ? item.obji13[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32103999] ? item.obji13[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32104000] ? item.obji13[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji13[32104001] ? item.obji13[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji13[32104002] ? item.obji13[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104003] ? item.obji13[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104004] ? item.obji13[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104005] ? item.obji13[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104006] ? item.obji13[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104007] ? item.obji13[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104008] ? item.obji13[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104009] ? item.obji13[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32104010] ? item.obji13[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji13[32104011] ? item.obji13[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104012] ? item.obji13[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104013] ? item.obji13[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104014] ? item.obji13[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104015] ? item.obji13[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104016] ? item.obji13[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104017] ? item.obji13[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104018] ? item.obji13[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32104019] ? item.obji13[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji13[32104020] ? item.obji13[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104021] ? item.obji13[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104022] ? item.obji13[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104023] ? item.obji13[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104024] ? item.obji13[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104025] ? item.obji13[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104026] ? item.obji13[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104027] ? item.obji13[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32104028] ? item.obji13[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji13[32104029] ? item.obji13[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104030] ? item.obji13[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104031] ? item.obji13[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104032] ? item.obji13[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104033] ? item.obji13[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104034] ? item.obji13[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104035] ? item.obji13[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji13[32104036] ? item.obji13[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji13[32104037] ? item.obji13[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji13[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d14']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji14[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji14[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji14[32103938] ? item.obji14[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103939] ? item.obji14[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103940] ? item.obji14[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103941] ? item.obji14[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103942] ? item.obji14[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103943] ? item.obji14[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103944] ? item.obji14[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103945] ? item.obji14[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103946] ? item.obji14[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji14[32103947] ? item.obji14[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103948] ? item.obji14[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103949] ? item.obji14[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103950] ? item.obji14[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103951] ? item.obji14[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103952] ? item.obji14[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103953] ? item.obji14[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103954] ? item.obji14[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103955] ? item.obji14[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji14[32103956] ? item.obji14[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103957] ? item.obji14[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103958] ? item.obji14[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103959] ? item.obji14[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103960] ? item.obji14[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103961] ? item.obji14[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103962] ? item.obji14[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103963] ? item.obji14[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103964] ? item.obji14[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji14[32103965] ? item.obji14[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103966] ? item.obji14[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103967] ? item.obji14[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103968] ? item.obji14[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103969] ? item.obji14[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103970] ? item.obji14[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103971] ? item.obji14[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103972] ? item.obji14[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103973] ? item.obji14[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji14[32103974] ? item.obji14[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103975] ? item.obji14[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103976] ? item.obji14[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103977] ? item.obji14[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103978] ? item.obji14[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103979] ? item.obji14[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103980] ? item.obji14[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103981] ? item.obji14[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103982] ? item.obji14[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji14[32103983] ? item.obji14[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103984] ? item.obji14[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103985] ? item.obji14[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103986] ? item.obji14[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103987] ? item.obji14[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103988] ? item.obji14[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103989] ? item.obji14[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103990] ? item.obji14[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32103991] ? item.obji14[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji14[32103992] ? item.obji14[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103993] ? item.obji14[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103994] ? item.obji14[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103995] ? item.obji14[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103996] ? item.obji14[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103997] ? item.obji14[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103998] ? item.obji14[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32103999] ? item.obji14[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32104000] ? item.obji14[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji14[32104001] ? item.obji14[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji14[32104002] ? item.obji14[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104003] ? item.obji14[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104004] ? item.obji14[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104005] ? item.obji14[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104006] ? item.obji14[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104007] ? item.obji14[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104008] ? item.obji14[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104009] ? item.obji14[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32104010] ? item.obji14[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji14[32104011] ? item.obji14[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104012] ? item.obji14[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104013] ? item.obji14[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104014] ? item.obji14[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104015] ? item.obji14[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104016] ? item.obji14[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104017] ? item.obji14[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104018] ? item.obji14[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32104019] ? item.obji14[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji14[32104020] ? item.obji14[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104021] ? item.obji14[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104022] ? item.obji14[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104023] ? item.obji14[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104024] ? item.obji14[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104025] ? item.obji14[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104026] ? item.obji14[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104027] ? item.obji14[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32104028] ? item.obji14[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji14[32104029] ? item.obji14[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104030] ? item.obji14[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104031] ? item.obji14[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104032] ? item.obji14[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104033] ? item.obji14[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104034] ? item.obji14[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104035] ? item.obji14[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji14[32104036] ? item.obji14[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji14[32104037] ? item.obji14[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji14[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d15']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji15[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji15[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji15[32103938] ? item.obji15[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103939] ? item.obji15[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103940] ? item.obji15[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103941] ? item.obji15[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103942] ? item.obji15[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103943] ? item.obji15[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103944] ? item.obji15[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103945] ? item.obji15[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103946] ? item.obji15[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji15[32103947] ? item.obji15[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103948] ? item.obji15[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103949] ? item.obji15[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103950] ? item.obji15[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103951] ? item.obji15[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103952] ? item.obji15[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103953] ? item.obji15[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103954] ? item.obji15[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103955] ? item.obji15[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji15[32103956] ? item.obji15[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103957] ? item.obji15[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103958] ? item.obji15[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103959] ? item.obji15[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103960] ? item.obji15[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103961] ? item.obji15[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103962] ? item.obji15[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103963] ? item.obji15[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103964] ? item.obji15[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji15[32103965] ? item.obji15[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103966] ? item.obji15[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103967] ? item.obji15[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103968] ? item.obji15[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103969] ? item.obji15[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103970] ? item.obji15[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103971] ? item.obji15[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103972] ? item.obji15[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103973] ? item.obji15[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji15[32103974] ? item.obji15[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103975] ? item.obji15[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103976] ? item.obji15[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103977] ? item.obji15[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103978] ? item.obji15[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103979] ? item.obji15[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103980] ? item.obji15[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103981] ? item.obji15[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103982] ? item.obji15[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji15[32103983] ? item.obji15[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103984] ? item.obji15[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103985] ? item.obji15[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103986] ? item.obji15[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103987] ? item.obji15[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103988] ? item.obji15[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103989] ? item.obji15[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103990] ? item.obji15[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32103991] ? item.obji15[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji15[32103992] ? item.obji15[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103993] ? item.obji15[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103994] ? item.obji15[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103995] ? item.obji15[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103996] ? item.obji15[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103997] ? item.obji15[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103998] ? item.obji15[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32103999] ? item.obji15[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32104000] ? item.obji15[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji15[32104001] ? item.obji15[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji15[32104002] ? item.obji15[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104003] ? item.obji15[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104004] ? item.obji15[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104005] ? item.obji15[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104006] ? item.obji15[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104007] ? item.obji15[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104008] ? item.obji15[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104009] ? item.obji15[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32104010] ? item.obji15[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji15[32104011] ? item.obji15[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104012] ? item.obji15[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104013] ? item.obji15[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104014] ? item.obji15[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104015] ? item.obji15[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104016] ? item.obji15[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104017] ? item.obji15[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104018] ? item.obji15[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32104019] ? item.obji15[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji15[32104020] ? item.obji15[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104021] ? item.obji15[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104022] ? item.obji15[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104023] ? item.obji15[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104024] ? item.obji15[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104025] ? item.obji15[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104026] ? item.obji15[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104027] ? item.obji15[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32104028] ? item.obji15[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji15[32104029] ? item.obji15[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104030] ? item.obji15[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104031] ? item.obji15[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104032] ? item.obji15[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104033] ? item.obji15[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104034] ? item.obji15[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104035] ? item.obji15[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji15[32104036] ? item.obji15[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji15[32104037] ? item.obji15[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji15[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d16']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji16[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji16[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji16[32103938] ? item.obji16[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103939] ? item.obji16[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103940] ? item.obji16[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103941] ? item.obji16[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103942] ? item.obji16[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103943] ? item.obji16[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103944] ? item.obji16[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103945] ? item.obji16[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103946] ? item.obji16[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji16[32103947] ? item.obji16[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103948] ? item.obji16[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103949] ? item.obji16[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103950] ? item.obji16[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103951] ? item.obji16[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103952] ? item.obji16[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103953] ? item.obji16[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103954] ? item.obji16[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103955] ? item.obji16[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji16[32103956] ? item.obji16[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103957] ? item.obji16[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103958] ? item.obji16[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103959] ? item.obji16[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103960] ? item.obji16[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103961] ? item.obji16[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103962] ? item.obji16[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103963] ? item.obji16[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103964] ? item.obji16[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji16[32103965] ? item.obji16[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103966] ? item.obji16[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103967] ? item.obji16[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103968] ? item.obji16[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103969] ? item.obji16[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103970] ? item.obji16[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103971] ? item.obji16[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103972] ? item.obji16[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103973] ? item.obji16[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji16[32103974] ? item.obji16[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103975] ? item.obji16[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103976] ? item.obji16[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103977] ? item.obji16[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103978] ? item.obji16[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103979] ? item.obji16[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103980] ? item.obji16[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103981] ? item.obji16[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103982] ? item.obji16[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji16[32103983] ? item.obji16[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103984] ? item.obji16[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103985] ? item.obji16[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103986] ? item.obji16[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103987] ? item.obji16[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103988] ? item.obji16[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103989] ? item.obji16[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103990] ? item.obji16[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32103991] ? item.obji16[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji16[32103992] ? item.obji16[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103993] ? item.obji16[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103994] ? item.obji16[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103995] ? item.obji16[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103996] ? item.obji16[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103997] ? item.obji16[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103998] ? item.obji16[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32103999] ? item.obji16[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32104000] ? item.obji16[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji16[32104001] ? item.obji16[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji16[32104002] ? item.obji16[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104003] ? item.obji16[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104004] ? item.obji16[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104005] ? item.obji16[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104006] ? item.obji16[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104007] ? item.obji16[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104008] ? item.obji16[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104009] ? item.obji16[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32104010] ? item.obji16[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji16[32104011] ? item.obji16[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104012] ? item.obji16[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104013] ? item.obji16[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104014] ? item.obji16[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104015] ? item.obji16[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104016] ? item.obji16[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104017] ? item.obji16[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104018] ? item.obji16[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32104019] ? item.obji16[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji16[32104020] ? item.obji16[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104021] ? item.obji16[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104022] ? item.obji16[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104023] ? item.obji16[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104024] ? item.obji16[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104025] ? item.obji16[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104026] ? item.obji16[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104027] ? item.obji16[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32104028] ? item.obji16[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji16[32104029] ? item.obji16[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104030] ? item.obji16[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104031] ? item.obji16[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104032] ? item.obji16[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104033] ? item.obji16[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104034] ? item.obji16[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104035] ? item.obji16[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji16[32104036] ? item.obji16[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji16[32104037] ? item.obji16[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji16[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d17']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji17[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji17[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji17[32103938] ? item.obji17[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103939] ? item.obji17[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103940] ? item.obji17[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103941] ? item.obji17[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103942] ? item.obji17[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103943] ? item.obji17[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103944] ? item.obji17[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103945] ? item.obji17[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103946] ? item.obji17[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji17[32103947] ? item.obji17[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103948] ? item.obji17[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103949] ? item.obji17[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103950] ? item.obji17[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103951] ? item.obji17[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103952] ? item.obji17[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103953] ? item.obji17[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103954] ? item.obji17[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103955] ? item.obji17[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji17[32103956] ? item.obji17[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103957] ? item.obji17[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103958] ? item.obji17[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103959] ? item.obji17[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103960] ? item.obji17[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103961] ? item.obji17[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103962] ? item.obji17[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103963] ? item.obji17[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103964] ? item.obji17[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji17[32103965] ? item.obji17[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103966] ? item.obji17[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103967] ? item.obji17[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103968] ? item.obji17[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103969] ? item.obji17[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103970] ? item.obji17[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103971] ? item.obji17[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103972] ? item.obji17[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103973] ? item.obji17[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji17[32103974] ? item.obji17[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103975] ? item.obji17[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103976] ? item.obji17[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103977] ? item.obji17[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103978] ? item.obji17[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103979] ? item.obji17[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103980] ? item.obji17[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103981] ? item.obji17[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103982] ? item.obji17[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji17[32103983] ? item.obji17[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103984] ? item.obji17[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103985] ? item.obji17[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103986] ? item.obji17[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103987] ? item.obji17[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103988] ? item.obji17[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103989] ? item.obji17[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103990] ? item.obji17[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32103991] ? item.obji17[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji17[32103992] ? item.obji17[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103993] ? item.obji17[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103994] ? item.obji17[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103995] ? item.obji17[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103996] ? item.obji17[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103997] ? item.obji17[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103998] ? item.obji17[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32103999] ? item.obji17[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32104000] ? item.obji17[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji17[32104001] ? item.obji17[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji17[32104002] ? item.obji17[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104003] ? item.obji17[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104004] ? item.obji17[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104005] ? item.obji17[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104006] ? item.obji17[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104007] ? item.obji17[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104008] ? item.obji17[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104009] ? item.obji17[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32104010] ? item.obji17[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji17[32104011] ? item.obji17[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104012] ? item.obji17[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104013] ? item.obji17[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104014] ? item.obji17[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104015] ? item.obji17[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104016] ? item.obji17[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104017] ? item.obji17[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104018] ? item.obji17[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32104019] ? item.obji17[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji17[32104020] ? item.obji17[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104021] ? item.obji17[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104022] ? item.obji17[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104023] ? item.obji17[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104024] ? item.obji17[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104025] ? item.obji17[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104026] ? item.obji17[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104027] ? item.obji17[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32104028] ? item.obji17[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji17[32104029] ? item.obji17[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104030] ? item.obji17[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104031] ? item.obji17[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104032] ? item.obji17[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104033] ? item.obji17[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104034] ? item.obji17[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104035] ? item.obji17[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji17[32104036] ? item.obji17[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji17[32104037] ? item.obji17[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji17[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d18']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji18[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji18[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji18[32103938] ? item.obji18[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103939] ? item.obji18[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103940] ? item.obji18[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103941] ? item.obji18[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103942] ? item.obji18[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103943] ? item.obji18[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103944] ? item.obji18[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103945] ? item.obji18[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103946] ? item.obji18[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji18[32103947] ? item.obji18[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103948] ? item.obji18[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103949] ? item.obji18[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103950] ? item.obji18[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103951] ? item.obji18[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103952] ? item.obji18[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103953] ? item.obji18[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103954] ? item.obji18[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103955] ? item.obji18[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji18[32103956] ? item.obji18[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103957] ? item.obji18[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103958] ? item.obji18[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103959] ? item.obji18[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103960] ? item.obji18[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103961] ? item.obji18[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103962] ? item.obji18[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103963] ? item.obji18[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103964] ? item.obji18[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji18[32103965] ? item.obji18[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103966] ? item.obji18[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103967] ? item.obji18[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103968] ? item.obji18[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103969] ? item.obji18[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103970] ? item.obji18[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103971] ? item.obji18[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103972] ? item.obji18[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103973] ? item.obji18[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji18[32103974] ? item.obji18[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103975] ? item.obji18[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103976] ? item.obji18[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103977] ? item.obji18[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103978] ? item.obji18[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103979] ? item.obji18[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103980] ? item.obji18[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103981] ? item.obji18[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103982] ? item.obji18[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji18[32103983] ? item.obji18[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103984] ? item.obji18[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103985] ? item.obji18[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103986] ? item.obji18[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103987] ? item.obji18[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103988] ? item.obji18[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103989] ? item.obji18[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103990] ? item.obji18[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32103991] ? item.obji18[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji18[32103992] ? item.obji18[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103993] ? item.obji18[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103994] ? item.obji18[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103995] ? item.obji18[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103996] ? item.obji18[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103997] ? item.obji18[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103998] ? item.obji18[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32103999] ? item.obji18[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32104000] ? item.obji18[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji18[32104001] ? item.obji18[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji18[32104002] ? item.obji18[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104003] ? item.obji18[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104004] ? item.obji18[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104005] ? item.obji18[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104006] ? item.obji18[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104007] ? item.obji18[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104008] ? item.obji18[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104009] ? item.obji18[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32104010] ? item.obji18[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji18[32104011] ? item.obji18[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104012] ? item.obji18[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104013] ? item.obji18[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104014] ? item.obji18[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104015] ? item.obji18[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104016] ? item.obji18[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104017] ? item.obji18[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104018] ? item.obji18[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32104019] ? item.obji18[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji18[32104020] ? item.obji18[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104021] ? item.obji18[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104022] ? item.obji18[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104023] ? item.obji18[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104024] ? item.obji18[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104025] ? item.obji18[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104026] ? item.obji18[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104027] ? item.obji18[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32104028] ? item.obji18[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji18[32104029] ? item.obji18[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104030] ? item.obji18[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104031] ? item.obji18[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104032] ? item.obji18[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104033] ? item.obji18[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104034] ? item.obji18[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104035] ? item.obji18[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji18[32104036] ? item.obji18[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji18[32104037] ? item.obji18[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji18[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d19']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji19[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji19[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji19[32103938] ? item.obji19[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103939] ? item.obji19[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103940] ? item.obji19[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103941] ? item.obji19[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103942] ? item.obji19[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103943] ? item.obji19[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103944] ? item.obji19[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103945] ? item.obji19[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103946] ? item.obji19[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji19[32103947] ? item.obji19[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103948] ? item.obji19[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103949] ? item.obji19[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103950] ? item.obji19[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103951] ? item.obji19[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103952] ? item.obji19[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103953] ? item.obji19[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103954] ? item.obji19[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103955] ? item.obji19[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji19[32103956] ? item.obji19[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103957] ? item.obji19[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103958] ? item.obji19[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103959] ? item.obji19[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103960] ? item.obji19[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103961] ? item.obji19[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103962] ? item.obji19[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103963] ? item.obji19[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103964] ? item.obji19[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji19[32103965] ? item.obji19[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103966] ? item.obji19[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103967] ? item.obji19[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103968] ? item.obji19[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103969] ? item.obji19[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103970] ? item.obji19[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103971] ? item.obji19[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103972] ? item.obji19[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103973] ? item.obji19[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji19[32103974] ? item.obji19[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103975] ? item.obji19[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103976] ? item.obji19[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103977] ? item.obji19[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103978] ? item.obji19[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103979] ? item.obji19[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103980] ? item.obji19[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103981] ? item.obji19[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103982] ? item.obji19[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji19[32103983] ? item.obji19[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103984] ? item.obji19[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103985] ? item.obji19[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103986] ? item.obji19[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103987] ? item.obji19[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103988] ? item.obji19[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103989] ? item.obji19[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103990] ? item.obji19[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32103991] ? item.obji19[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji19[32103992] ? item.obji19[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103993] ? item.obji19[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103994] ? item.obji19[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103995] ? item.obji19[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103996] ? item.obji19[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103997] ? item.obji19[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103998] ? item.obji19[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32103999] ? item.obji19[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32104000] ? item.obji19[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji19[32104001] ? item.obji19[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji19[32104002] ? item.obji19[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104003] ? item.obji19[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104004] ? item.obji19[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104005] ? item.obji19[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104006] ? item.obji19[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104007] ? item.obji19[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104008] ? item.obji19[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104009] ? item.obji19[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32104010] ? item.obji19[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji19[32104011] ? item.obji19[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104012] ? item.obji19[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104013] ? item.obji19[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104014] ? item.obji19[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104015] ? item.obji19[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104016] ? item.obji19[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104017] ? item.obji19[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104018] ? item.obji19[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32104019] ? item.obji19[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji19[32104020] ? item.obji19[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104021] ? item.obji19[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104022] ? item.obji19[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104023] ? item.obji19[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104024] ? item.obji19[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104025] ? item.obji19[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104026] ? item.obji19[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104027] ? item.obji19[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32104028] ? item.obji19[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji19[32104029] ? item.obji19[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104030] ? item.obji19[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104031] ? item.obji19[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104032] ? item.obji19[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104033] ? item.obji19[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104034] ? item.obji19[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104035] ? item.obji19[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji19[32104036] ? item.obji19[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji19[32104037] ? item.obji19[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji19[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d20']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji20[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji20[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji20[32103938] ? item.obji20[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103939] ? item.obji20[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103940] ? item.obji20[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103941] ? item.obji20[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103942] ? item.obji20[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103943] ? item.obji20[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103944] ? item.obji20[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103945] ? item.obji20[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103946] ? item.obji20[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji20[32103947] ? item.obji20[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103948] ? item.obji20[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103949] ? item.obji20[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103950] ? item.obji20[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103951] ? item.obji20[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103952] ? item.obji20[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103953] ? item.obji20[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103954] ? item.obji20[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103955] ? item.obji20[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji20[32103956] ? item.obji20[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103957] ? item.obji20[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103958] ? item.obji20[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103959] ? item.obji20[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103960] ? item.obji20[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103961] ? item.obji20[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103962] ? item.obji20[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103963] ? item.obji20[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103964] ? item.obji20[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji20[32103965] ? item.obji20[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103966] ? item.obji20[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103967] ? item.obji20[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103968] ? item.obji20[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103969] ? item.obji20[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103970] ? item.obji20[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103971] ? item.obji20[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103972] ? item.obji20[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103973] ? item.obji20[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji20[32103974] ? item.obji20[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103975] ? item.obji20[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103976] ? item.obji20[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103977] ? item.obji20[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103978] ? item.obji20[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103979] ? item.obji20[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103980] ? item.obji20[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103981] ? item.obji20[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103982] ? item.obji20[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji20[32103983] ? item.obji20[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103984] ? item.obji20[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103985] ? item.obji20[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103986] ? item.obji20[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103987] ? item.obji20[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103988] ? item.obji20[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103989] ? item.obji20[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103990] ? item.obji20[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32103991] ? item.obji20[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji20[32103992] ? item.obji20[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103993] ? item.obji20[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103994] ? item.obji20[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103995] ? item.obji20[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103996] ? item.obji20[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103997] ? item.obji20[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103998] ? item.obji20[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32103999] ? item.obji20[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32104000] ? item.obji20[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji20[32104001] ? item.obji20[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji20[32104002] ? item.obji20[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104003] ? item.obji20[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104004] ? item.obji20[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104005] ? item.obji20[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104006] ? item.obji20[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104007] ? item.obji20[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104008] ? item.obji20[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104009] ? item.obji20[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32104010] ? item.obji20[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji20[32104011] ? item.obji20[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104012] ? item.obji20[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104013] ? item.obji20[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104014] ? item.obji20[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104015] ? item.obji20[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104016] ? item.obji20[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104017] ? item.obji20[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104018] ? item.obji20[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32104019] ? item.obji20[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji20[32104020] ? item.obji20[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104021] ? item.obji20[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104022] ? item.obji20[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104023] ? item.obji20[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104024] ? item.obji20[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104025] ? item.obji20[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104026] ? item.obji20[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104027] ? item.obji20[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32104028] ? item.obji20[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji20[32104029] ? item.obji20[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104030] ? item.obji20[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104031] ? item.obji20[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104032] ? item.obji20[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104033] ? item.obji20[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104034] ? item.obji20[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104035] ? item.obji20[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji20[32104036] ? item.obji20[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji20[32104037] ? item.obji20[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji20[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d21']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji21[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji21[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji21[32103938] ? item.obji21[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103939] ? item.obji21[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103940] ? item.obji21[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103941] ? item.obji21[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103942] ? item.obji21[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103943] ? item.obji21[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103944] ? item.obji21[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103945] ? item.obji21[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103946] ? item.obji21[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji21[32103947] ? item.obji21[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103948] ? item.obji21[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103949] ? item.obji21[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103950] ? item.obji21[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103951] ? item.obji21[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103952] ? item.obji21[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103953] ? item.obji21[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103954] ? item.obji21[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103955] ? item.obji21[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji21[32103956] ? item.obji21[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103957] ? item.obji21[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103958] ? item.obji21[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103959] ? item.obji21[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103960] ? item.obji21[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103961] ? item.obji21[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103962] ? item.obji21[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103963] ? item.obji21[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103964] ? item.obji21[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji21[32103965] ? item.obji21[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103966] ? item.obji21[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103967] ? item.obji21[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103968] ? item.obji21[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103969] ? item.obji21[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103970] ? item.obji21[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103971] ? item.obji21[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103972] ? item.obji21[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103973] ? item.obji21[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji21[32103974] ? item.obji21[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103975] ? item.obji21[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103976] ? item.obji21[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103977] ? item.obji21[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103978] ? item.obji21[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103979] ? item.obji21[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103980] ? item.obji21[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103981] ? item.obji21[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103982] ? item.obji21[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji21[32103983] ? item.obji21[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103984] ? item.obji21[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103985] ? item.obji21[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103986] ? item.obji21[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103987] ? item.obji21[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103988] ? item.obji21[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103989] ? item.obji21[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103990] ? item.obji21[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32103991] ? item.obji21[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji21[32103992] ? item.obji21[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103993] ? item.obji21[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103994] ? item.obji21[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103995] ? item.obji21[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103996] ? item.obji21[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103997] ? item.obji21[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103998] ? item.obji21[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32103999] ? item.obji21[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32104000] ? item.obji21[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji21[32104001] ? item.obji21[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji21[32104002] ? item.obji21[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104003] ? item.obji21[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104004] ? item.obji21[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104005] ? item.obji21[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104006] ? item.obji21[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104007] ? item.obji21[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104008] ? item.obji21[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104009] ? item.obji21[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32104010] ? item.obji21[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji21[32104011] ? item.obji21[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104012] ? item.obji21[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104013] ? item.obji21[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104014] ? item.obji21[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104015] ? item.obji21[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104016] ? item.obji21[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104017] ? item.obji21[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104018] ? item.obji21[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32104019] ? item.obji21[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji21[32104020] ? item.obji21[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104021] ? item.obji21[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104022] ? item.obji21[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104023] ? item.obji21[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104024] ? item.obji21[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104025] ? item.obji21[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104026] ? item.obji21[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104027] ? item.obji21[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32104028] ? item.obji21[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji21[32104029] ? item.obji21[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104030] ? item.obji21[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104031] ? item.obji21[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104032] ? item.obji21[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104033] ? item.obji21[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104034] ? item.obji21[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104035] ? item.obji21[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji21[32104036] ? item.obji21[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji21[32104037] ? item.obji21[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji21[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d22']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji22[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji22[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji22[32103938] ? item.obji22[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103939] ? item.obji22[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103940] ? item.obji22[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103941] ? item.obji22[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103942] ? item.obji22[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103943] ? item.obji22[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103944] ? item.obji22[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103945] ? item.obji22[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103946] ? item.obji22[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji22[32103947] ? item.obji22[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103948] ? item.obji22[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103949] ? item.obji22[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103950] ? item.obji22[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103951] ? item.obji22[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103952] ? item.obji22[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103953] ? item.obji22[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103954] ? item.obji22[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103955] ? item.obji22[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji22[32103956] ? item.obji22[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103957] ? item.obji22[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103958] ? item.obji22[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103959] ? item.obji22[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103960] ? item.obji22[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103961] ? item.obji22[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103962] ? item.obji22[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103963] ? item.obji22[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103964] ? item.obji22[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji22[32103965] ? item.obji22[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103966] ? item.obji22[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103967] ? item.obji22[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103968] ? item.obji22[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103969] ? item.obji22[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103970] ? item.obji22[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103971] ? item.obji22[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103972] ? item.obji22[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103973] ? item.obji22[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji22[32103974] ? item.obji22[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103975] ? item.obji22[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103976] ? item.obji22[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103977] ? item.obji22[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103978] ? item.obji22[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103979] ? item.obji22[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103980] ? item.obji22[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103981] ? item.obji22[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103982] ? item.obji22[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji22[32103983] ? item.obji22[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103984] ? item.obji22[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103985] ? item.obji22[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103986] ? item.obji22[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103987] ? item.obji22[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103988] ? item.obji22[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103989] ? item.obji22[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103990] ? item.obji22[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32103991] ? item.obji22[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji22[32103992] ? item.obji22[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103993] ? item.obji22[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103994] ? item.obji22[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103995] ? item.obji22[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103996] ? item.obji22[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103997] ? item.obji22[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103998] ? item.obji22[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32103999] ? item.obji22[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32104000] ? item.obji22[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji22[32104001] ? item.obji22[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji22[32104002] ? item.obji22[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104003] ? item.obji22[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104004] ? item.obji22[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104005] ? item.obji22[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104006] ? item.obji22[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104007] ? item.obji22[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104008] ? item.obji22[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104009] ? item.obji22[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32104010] ? item.obji22[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji22[32104011] ? item.obji22[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104012] ? item.obji22[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104013] ? item.obji22[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104014] ? item.obji22[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104015] ? item.obji22[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104016] ? item.obji22[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104017] ? item.obji22[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104018] ? item.obji22[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32104019] ? item.obji22[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji22[32104020] ? item.obji22[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104021] ? item.obji22[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104022] ? item.obji22[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104023] ? item.obji22[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104024] ? item.obji22[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104025] ? item.obji22[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104026] ? item.obji22[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104027] ? item.obji22[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32104028] ? item.obji22[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji22[32104029] ? item.obji22[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104030] ? item.obji22[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104031] ? item.obji22[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104032] ? item.obji22[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104033] ? item.obji22[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104034] ? item.obji22[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104035] ? item.obji22[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji22[32104036] ? item.obji22[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji22[32104037] ? item.obji22[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji22[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d23']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji23[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji23[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji23[32103938] ? item.obji23[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103939] ? item.obji23[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103940] ? item.obji23[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103941] ? item.obji23[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103942] ? item.obji23[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103943] ? item.obji23[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103944] ? item.obji23[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103945] ? item.obji23[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103946] ? item.obji23[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji23[32103947] ? item.obji23[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103948] ? item.obji23[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103949] ? item.obji23[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103950] ? item.obji23[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103951] ? item.obji23[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103952] ? item.obji23[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103953] ? item.obji23[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103954] ? item.obji23[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103955] ? item.obji23[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji23[32103956] ? item.obji23[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103957] ? item.obji23[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103958] ? item.obji23[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103959] ? item.obji23[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103960] ? item.obji23[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103961] ? item.obji23[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103962] ? item.obji23[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103963] ? item.obji23[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103964] ? item.obji23[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji23[32103965] ? item.obji23[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103966] ? item.obji23[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103967] ? item.obji23[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103968] ? item.obji23[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103969] ? item.obji23[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103970] ? item.obji23[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103971] ? item.obji23[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103972] ? item.obji23[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103973] ? item.obji23[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji23[32103974] ? item.obji23[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103975] ? item.obji23[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103976] ? item.obji23[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103977] ? item.obji23[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103978] ? item.obji23[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103979] ? item.obji23[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103980] ? item.obji23[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103981] ? item.obji23[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103982] ? item.obji23[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji23[32103983] ? item.obji23[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103984] ? item.obji23[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103985] ? item.obji23[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103986] ? item.obji23[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103987] ? item.obji23[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103988] ? item.obji23[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103989] ? item.obji23[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103990] ? item.obji23[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32103991] ? item.obji23[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji23[32103992] ? item.obji23[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103993] ? item.obji23[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103994] ? item.obji23[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103995] ? item.obji23[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103996] ? item.obji23[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103997] ? item.obji23[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103998] ? item.obji23[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32103999] ? item.obji23[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32104000] ? item.obji23[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji23[32104001] ? item.obji23[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji23[32104002] ? item.obji23[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104003] ? item.obji23[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104004] ? item.obji23[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104005] ? item.obji23[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104006] ? item.obji23[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104007] ? item.obji23[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104008] ? item.obji23[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104009] ? item.obji23[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32104010] ? item.obji23[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji23[32104011] ? item.obji23[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104012] ? item.obji23[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104013] ? item.obji23[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104014] ? item.obji23[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104015] ? item.obji23[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104016] ? item.obji23[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104017] ? item.obji23[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104018] ? item.obji23[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32104019] ? item.obji23[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji23[32104020] ? item.obji23[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104021] ? item.obji23[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104022] ? item.obji23[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104023] ? item.obji23[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104024] ? item.obji23[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104025] ? item.obji23[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104026] ? item.obji23[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104027] ? item.obji23[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32104028] ? item.obji23[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji23[32104029] ? item.obji23[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104030] ? item.obji23[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104031] ? item.obji23[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104032] ? item.obji23[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104033] ? item.obji23[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104034] ? item.obji23[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104035] ? item.obji23[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji23[32104036] ? item.obji23[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji23[32104037] ? item.obji23[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji23[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d24']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji24[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji24[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji24[32103938] ? item.obji24[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103939] ? item.obji24[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103940] ? item.obji24[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103941] ? item.obji24[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103942] ? item.obji24[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103943] ? item.obji24[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103944] ? item.obji24[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103945] ? item.obji24[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103946] ? item.obji24[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji24[32103947] ? item.obji24[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103948] ? item.obji24[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103949] ? item.obji24[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103950] ? item.obji24[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103951] ? item.obji24[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103952] ? item.obji24[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103953] ? item.obji24[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103954] ? item.obji24[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103955] ? item.obji24[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji24[32103956] ? item.obji24[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103957] ? item.obji24[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103958] ? item.obji24[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103959] ? item.obji24[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103960] ? item.obji24[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103961] ? item.obji24[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103962] ? item.obji24[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103963] ? item.obji24[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103964] ? item.obji24[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji24[32103965] ? item.obji24[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103966] ? item.obji24[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103967] ? item.obji24[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103968] ? item.obji24[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103969] ? item.obji24[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103970] ? item.obji24[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103971] ? item.obji24[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103972] ? item.obji24[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103973] ? item.obji24[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji24[32103974] ? item.obji24[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103975] ? item.obji24[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103976] ? item.obji24[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103977] ? item.obji24[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103978] ? item.obji24[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103979] ? item.obji24[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103980] ? item.obji24[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103981] ? item.obji24[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103982] ? item.obji24[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji24[32103983] ? item.obji24[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103984] ? item.obji24[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103985] ? item.obji24[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103986] ? item.obji24[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103987] ? item.obji24[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103988] ? item.obji24[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103989] ? item.obji24[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103990] ? item.obji24[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32103991] ? item.obji24[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji24[32103992] ? item.obji24[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103993] ? item.obji24[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103994] ? item.obji24[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103995] ? item.obji24[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103996] ? item.obji24[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103997] ? item.obji24[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103998] ? item.obji24[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32103999] ? item.obji24[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32104000] ? item.obji24[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji24[32104001] ? item.obji24[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji24[32104002] ? item.obji24[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104003] ? item.obji24[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104004] ? item.obji24[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104005] ? item.obji24[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104006] ? item.obji24[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104007] ? item.obji24[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104008] ? item.obji24[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104009] ? item.obji24[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32104010] ? item.obji24[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji24[32104011] ? item.obji24[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104012] ? item.obji24[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104013] ? item.obji24[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104014] ? item.obji24[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104015] ? item.obji24[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104016] ? item.obji24[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104017] ? item.obji24[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104018] ? item.obji24[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32104019] ? item.obji24[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji24[32104020] ? item.obji24[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104021] ? item.obji24[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104022] ? item.obji24[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104023] ? item.obji24[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104024] ? item.obji24[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104025] ? item.obji24[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104026] ? item.obji24[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104027] ? item.obji24[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32104028] ? item.obji24[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji24[32104029] ? item.obji24[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104030] ? item.obji24[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104031] ? item.obji24[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104032] ? item.obji24[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104033] ? item.obji24[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104034] ? item.obji24[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104035] ? item.obji24[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji24[32104036] ? item.obji24[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji24[32104037] ? item.obji24[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji24[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d25']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji25[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji25[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji25[32103938] ? item.obji25[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103939] ? item.obji25[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103940] ? item.obji25[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103941] ? item.obji25[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103942] ? item.obji25[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103943] ? item.obji25[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103944] ? item.obji25[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103945] ? item.obji25[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103946] ? item.obji25[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji25[32103947] ? item.obji25[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103948] ? item.obji25[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103949] ? item.obji25[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103950] ? item.obji25[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103951] ? item.obji25[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103952] ? item.obji25[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103953] ? item.obji25[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103954] ? item.obji25[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103955] ? item.obji25[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji25[32103956] ? item.obji25[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103957] ? item.obji25[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103958] ? item.obji25[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103959] ? item.obji25[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103960] ? item.obji25[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103961] ? item.obji25[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103962] ? item.obji25[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103963] ? item.obji25[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103964] ? item.obji25[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji25[32103965] ? item.obji25[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103966] ? item.obji25[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103967] ? item.obji25[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103968] ? item.obji25[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103969] ? item.obji25[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103970] ? item.obji25[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103971] ? item.obji25[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103972] ? item.obji25[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103973] ? item.obji25[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji25[32103974] ? item.obji25[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103975] ? item.obji25[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103976] ? item.obji25[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103977] ? item.obji25[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103978] ? item.obji25[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103979] ? item.obji25[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103980] ? item.obji25[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103981] ? item.obji25[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103982] ? item.obji25[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji25[32103983] ? item.obji25[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103984] ? item.obji25[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103985] ? item.obji25[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103986] ? item.obji25[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103987] ? item.obji25[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103988] ? item.obji25[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103989] ? item.obji25[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103990] ? item.obji25[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32103991] ? item.obji25[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji25[32103992] ? item.obji25[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103993] ? item.obji25[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103994] ? item.obji25[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103995] ? item.obji25[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103996] ? item.obji25[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103997] ? item.obji25[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103998] ? item.obji25[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32103999] ? item.obji25[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32104000] ? item.obji25[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji25[32104001] ? item.obji25[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji25[32104002] ? item.obji25[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104003] ? item.obji25[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104004] ? item.obji25[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104005] ? item.obji25[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104006] ? item.obji25[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104007] ? item.obji25[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104008] ? item.obji25[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104009] ? item.obji25[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32104010] ? item.obji25[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji25[32104011] ? item.obji25[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104012] ? item.obji25[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104013] ? item.obji25[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104014] ? item.obji25[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104015] ? item.obji25[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104016] ? item.obji25[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104017] ? item.obji25[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104018] ? item.obji25[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32104019] ? item.obji25[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji25[32104020] ? item.obji25[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104021] ? item.obji25[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104022] ? item.obji25[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104023] ? item.obji25[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104024] ? item.obji25[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104025] ? item.obji25[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104026] ? item.obji25[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104027] ? item.obji25[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32104028] ? item.obji25[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji25[32104029] ? item.obji25[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104030] ? item.obji25[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104031] ? item.obji25[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104032] ? item.obji25[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104033] ? item.obji25[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104034] ? item.obji25[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104035] ? item.obji25[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji25[32104036] ? item.obji25[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji25[32104037] ? item.obji25[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji25[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d26']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji26[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji26[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji26[32103938] ? item.obji26[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103939] ? item.obji26[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103940] ? item.obji26[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103941] ? item.obji26[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103942] ? item.obji26[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103943] ? item.obji26[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103944] ? item.obji26[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103945] ? item.obji26[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103946] ? item.obji26[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji26[32103947] ? item.obji26[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103948] ? item.obji26[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103949] ? item.obji26[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103950] ? item.obji26[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103951] ? item.obji26[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103952] ? item.obji26[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103953] ? item.obji26[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103954] ? item.obji26[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103955] ? item.obji26[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji26[32103956] ? item.obji26[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103957] ? item.obji26[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103958] ? item.obji26[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103959] ? item.obji26[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103960] ? item.obji26[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103961] ? item.obji26[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103962] ? item.obji26[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103963] ? item.obji26[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103964] ? item.obji26[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji26[32103965] ? item.obji26[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103966] ? item.obji26[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103967] ? item.obji26[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103968] ? item.obji26[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103969] ? item.obji26[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103970] ? item.obji26[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103971] ? item.obji26[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103972] ? item.obji26[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103973] ? item.obji26[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji26[32103974] ? item.obji26[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103975] ? item.obji26[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103976] ? item.obji26[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103977] ? item.obji26[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103978] ? item.obji26[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103979] ? item.obji26[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103980] ? item.obji26[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103981] ? item.obji26[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103982] ? item.obji26[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji26[32103983] ? item.obji26[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103984] ? item.obji26[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103985] ? item.obji26[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103986] ? item.obji26[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103987] ? item.obji26[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103988] ? item.obji26[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103989] ? item.obji26[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103990] ? item.obji26[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32103991] ? item.obji26[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji26[32103992] ? item.obji26[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103993] ? item.obji26[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103994] ? item.obji26[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103995] ? item.obji26[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103996] ? item.obji26[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103997] ? item.obji26[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103998] ? item.obji26[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32103999] ? item.obji26[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32104000] ? item.obji26[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji26[32104001] ? item.obji26[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji26[32104002] ? item.obji26[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104003] ? item.obji26[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104004] ? item.obji26[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104005] ? item.obji26[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104006] ? item.obji26[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104007] ? item.obji26[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104008] ? item.obji26[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104009] ? item.obji26[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32104010] ? item.obji26[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji26[32104011] ? item.obji26[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104012] ? item.obji26[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104013] ? item.obji26[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104014] ? item.obji26[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104015] ? item.obji26[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104016] ? item.obji26[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104017] ? item.obji26[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104018] ? item.obji26[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32104019] ? item.obji26[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji26[32104020] ? item.obji26[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104021] ? item.obji26[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104022] ? item.obji26[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104023] ? item.obji26[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104024] ? item.obji26[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104025] ? item.obji26[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104026] ? item.obji26[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104027] ? item.obji26[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32104028] ? item.obji26[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji26[32104029] ? item.obji26[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104030] ? item.obji26[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104031] ? item.obji26[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104032] ? item.obji26[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104033] ? item.obji26[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104034] ? item.obji26[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104035] ? item.obji26[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji26[32104036] ? item.obji26[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji26[32104037] ? item.obji26[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji26[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d27']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji27[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji27[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji27[32103938] ? item.obji27[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103939] ? item.obji27[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103940] ? item.obji27[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103941] ? item.obji27[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103942] ? item.obji27[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103943] ? item.obji27[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103944] ? item.obji27[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103945] ? item.obji27[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103946] ? item.obji27[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji27[32103947] ? item.obji27[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103948] ? item.obji27[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103949] ? item.obji27[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103950] ? item.obji27[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103951] ? item.obji27[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103952] ? item.obji27[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103953] ? item.obji27[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103954] ? item.obji27[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103955] ? item.obji27[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji27[32103956] ? item.obji27[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103957] ? item.obji27[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103958] ? item.obji27[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103959] ? item.obji27[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103960] ? item.obji27[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103961] ? item.obji27[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103962] ? item.obji27[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103963] ? item.obji27[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103964] ? item.obji27[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji27[32103965] ? item.obji27[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103966] ? item.obji27[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103967] ? item.obji27[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103968] ? item.obji27[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103969] ? item.obji27[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103970] ? item.obji27[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103971] ? item.obji27[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103972] ? item.obji27[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103973] ? item.obji27[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji27[32103974] ? item.obji27[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103975] ? item.obji27[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103976] ? item.obji27[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103977] ? item.obji27[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103978] ? item.obji27[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103979] ? item.obji27[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103980] ? item.obji27[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103981] ? item.obji27[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103982] ? item.obji27[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji27[32103983] ? item.obji27[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103984] ? item.obji27[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103985] ? item.obji27[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103986] ? item.obji27[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103987] ? item.obji27[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103988] ? item.obji27[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103989] ? item.obji27[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103990] ? item.obji27[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32103991] ? item.obji27[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji27[32103992] ? item.obji27[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103993] ? item.obji27[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103994] ? item.obji27[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103995] ? item.obji27[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103996] ? item.obji27[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103997] ? item.obji27[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103998] ? item.obji27[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32103999] ? item.obji27[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32104000] ? item.obji27[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji27[32104001] ? item.obji27[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji27[32104002] ? item.obji27[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104003] ? item.obji27[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104004] ? item.obji27[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104005] ? item.obji27[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104006] ? item.obji27[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104007] ? item.obji27[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104008] ? item.obji27[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104009] ? item.obji27[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32104010] ? item.obji27[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji27[32104011] ? item.obji27[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104012] ? item.obji27[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104013] ? item.obji27[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104014] ? item.obji27[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104015] ? item.obji27[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104016] ? item.obji27[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104017] ? item.obji27[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104018] ? item.obji27[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32104019] ? item.obji27[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji27[32104020] ? item.obji27[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104021] ? item.obji27[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104022] ? item.obji27[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104023] ? item.obji27[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104024] ? item.obji27[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104025] ? item.obji27[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104026] ? item.obji27[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104027] ? item.obji27[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32104028] ? item.obji27[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji27[32104029] ? item.obji27[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104030] ? item.obji27[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104031] ? item.obji27[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104032] ? item.obji27[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104033] ? item.obji27[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104034] ? item.obji27[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104035] ? item.obji27[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji27[32104036] ? item.obji27[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji27[32104037] ? item.obji27[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji27[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d28']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji28[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji28[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji28[32103938] ? item.obji28[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103939] ? item.obji28[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103940] ? item.obji28[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103941] ? item.obji28[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103942] ? item.obji28[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103943] ? item.obji28[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103944] ? item.obji28[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103945] ? item.obji28[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103946] ? item.obji28[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji28[32103947] ? item.obji28[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103948] ? item.obji28[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103949] ? item.obji28[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103950] ? item.obji28[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103951] ? item.obji28[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103952] ? item.obji28[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103953] ? item.obji28[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103954] ? item.obji28[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103955] ? item.obji28[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji28[32103956] ? item.obji28[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103957] ? item.obji28[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103958] ? item.obji28[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103959] ? item.obji28[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103960] ? item.obji28[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103961] ? item.obji28[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103962] ? item.obji28[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103963] ? item.obji28[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103964] ? item.obji28[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji28[32103965] ? item.obji28[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103966] ? item.obji28[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103967] ? item.obji28[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103968] ? item.obji28[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103969] ? item.obji28[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103970] ? item.obji28[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103971] ? item.obji28[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103972] ? item.obji28[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103973] ? item.obji28[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji28[32103974] ? item.obji28[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103975] ? item.obji28[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103976] ? item.obji28[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103977] ? item.obji28[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103978] ? item.obji28[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103979] ? item.obji28[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103980] ? item.obji28[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103981] ? item.obji28[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103982] ? item.obji28[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji28[32103983] ? item.obji28[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103984] ? item.obji28[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103985] ? item.obji28[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103986] ? item.obji28[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103987] ? item.obji28[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103988] ? item.obji28[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103989] ? item.obji28[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103990] ? item.obji28[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32103991] ? item.obji28[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji28[32103992] ? item.obji28[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103993] ? item.obji28[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103994] ? item.obji28[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103995] ? item.obji28[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103996] ? item.obji28[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103997] ? item.obji28[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103998] ? item.obji28[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32103999] ? item.obji28[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32104000] ? item.obji28[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji28[32104001] ? item.obji28[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji28[32104002] ? item.obji28[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104003] ? item.obji28[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104004] ? item.obji28[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104005] ? item.obji28[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104006] ? item.obji28[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104007] ? item.obji28[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104008] ? item.obji28[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104009] ? item.obji28[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32104010] ? item.obji28[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji28[32104011] ? item.obji28[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104012] ? item.obji28[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104013] ? item.obji28[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104014] ? item.obji28[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104015] ? item.obji28[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104016] ? item.obji28[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104017] ? item.obji28[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104018] ? item.obji28[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32104019] ? item.obji28[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji28[32104020] ? item.obji28[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104021] ? item.obji28[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104022] ? item.obji28[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104023] ? item.obji28[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104024] ? item.obji28[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104025] ? item.obji28[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104026] ? item.obji28[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104027] ? item.obji28[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32104028] ? item.obji28[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji28[32104029] ? item.obji28[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104030] ? item.obji28[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104031] ? item.obji28[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104032] ? item.obji28[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104033] ? item.obji28[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104034] ? item.obji28[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104035] ? item.obji28[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji28[32104036] ? item.obji28[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji28[32104037] ? item.obji28[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji28[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d29']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji29[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji29[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji29[32103938] ? item.obji29[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103939] ? item.obji29[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103940] ? item.obji29[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103941] ? item.obji29[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103942] ? item.obji29[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103943] ? item.obji29[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103944] ? item.obji29[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103945] ? item.obji29[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103946] ? item.obji29[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji29[32103947] ? item.obji29[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103948] ? item.obji29[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103949] ? item.obji29[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103950] ? item.obji29[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103951] ? item.obji29[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103952] ? item.obji29[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103953] ? item.obji29[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103954] ? item.obji29[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103955] ? item.obji29[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji29[32103956] ? item.obji29[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103957] ? item.obji29[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103958] ? item.obji29[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103959] ? item.obji29[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103960] ? item.obji29[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103961] ? item.obji29[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103962] ? item.obji29[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103963] ? item.obji29[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103964] ? item.obji29[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji29[32103965] ? item.obji29[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103966] ? item.obji29[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103967] ? item.obji29[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103968] ? item.obji29[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103969] ? item.obji29[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103970] ? item.obji29[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103971] ? item.obji29[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103972] ? item.obji29[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103973] ? item.obji29[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji29[32103974] ? item.obji29[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103975] ? item.obji29[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103976] ? item.obji29[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103977] ? item.obji29[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103978] ? item.obji29[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103979] ? item.obji29[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103980] ? item.obji29[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103981] ? item.obji29[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103982] ? item.obji29[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji29[32103983] ? item.obji29[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103984] ? item.obji29[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103985] ? item.obji29[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103986] ? item.obji29[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103987] ? item.obji29[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103988] ? item.obji29[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103989] ? item.obji29[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103990] ? item.obji29[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32103991] ? item.obji29[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji29[32103992] ? item.obji29[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103993] ? item.obji29[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103994] ? item.obji29[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103995] ? item.obji29[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103996] ? item.obji29[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103997] ? item.obji29[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103998] ? item.obji29[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32103999] ? item.obji29[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32104000] ? item.obji29[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji29[32104001] ? item.obji29[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji29[32104002] ? item.obji29[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104003] ? item.obji29[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104004] ? item.obji29[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104005] ? item.obji29[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104006] ? item.obji29[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104007] ? item.obji29[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104008] ? item.obji29[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104009] ? item.obji29[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32104010] ? item.obji29[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji29[32104011] ? item.obji29[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104012] ? item.obji29[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104013] ? item.obji29[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104014] ? item.obji29[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104015] ? item.obji29[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104016] ? item.obji29[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104017] ? item.obji29[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104018] ? item.obji29[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32104019] ? item.obji29[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji29[32104020] ? item.obji29[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104021] ? item.obji29[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104022] ? item.obji29[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104023] ? item.obji29[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104024] ? item.obji29[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104025] ? item.obji29[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104026] ? item.obji29[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104027] ? item.obji29[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32104028] ? item.obji29[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji29[32104029] ? item.obji29[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104030] ? item.obji29[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104031] ? item.obji29[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104032] ? item.obji29[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104033] ? item.obji29[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104034] ? item.obji29[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104035] ? item.obji29[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji29[32104036] ? item.obji29[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji29[32104037] ? item.obji29[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji29[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d30']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji30[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji30[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji30[32103938] ? item.obji30[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103939] ? item.obji30[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103940] ? item.obji30[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103941] ? item.obji30[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103942] ? item.obji30[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103943] ? item.obji30[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103944] ? item.obji30[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103945] ? item.obji30[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103946] ? item.obji30[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji30[32103947] ? item.obji30[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103948] ? item.obji30[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103949] ? item.obji30[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103950] ? item.obji30[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103951] ? item.obji30[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103952] ? item.obji30[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103953] ? item.obji30[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103954] ? item.obji30[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103955] ? item.obji30[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji30[32103956] ? item.obji30[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103957] ? item.obji30[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103958] ? item.obji30[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103959] ? item.obji30[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103960] ? item.obji30[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103961] ? item.obji30[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103962] ? item.obji30[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103963] ? item.obji30[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103964] ? item.obji30[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji30[32103965] ? item.obji30[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103966] ? item.obji30[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103967] ? item.obji30[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103968] ? item.obji30[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103969] ? item.obji30[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103970] ? item.obji30[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103971] ? item.obji30[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103972] ? item.obji30[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103973] ? item.obji30[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji30[32103974] ? item.obji30[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103975] ? item.obji30[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103976] ? item.obji30[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103977] ? item.obji30[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103978] ? item.obji30[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103979] ? item.obji30[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103980] ? item.obji30[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103981] ? item.obji30[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103982] ? item.obji30[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji30[32103983] ? item.obji30[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103984] ? item.obji30[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103985] ? item.obji30[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103986] ? item.obji30[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103987] ? item.obji30[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103988] ? item.obji30[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103989] ? item.obji30[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103990] ? item.obji30[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32103991] ? item.obji30[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji30[32103992] ? item.obji30[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103993] ? item.obji30[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103994] ? item.obji30[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103995] ? item.obji30[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103996] ? item.obji30[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103997] ? item.obji30[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103998] ? item.obji30[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32103999] ? item.obji30[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32104000] ? item.obji30[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji30[32104001] ? item.obji30[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji30[32104002] ? item.obji30[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104003] ? item.obji30[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104004] ? item.obji30[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104005] ? item.obji30[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104006] ? item.obji30[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104007] ? item.obji30[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104008] ? item.obji30[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104009] ? item.obji30[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32104010] ? item.obji30[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji30[32104011] ? item.obji30[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104012] ? item.obji30[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104013] ? item.obji30[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104014] ? item.obji30[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104015] ? item.obji30[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104016] ? item.obji30[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104017] ? item.obji30[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104018] ? item.obji30[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32104019] ? item.obji30[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji30[32104020] ? item.obji30[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104021] ? item.obji30[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104022] ? item.obji30[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104023] ? item.obji30[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104024] ? item.obji30[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104025] ? item.obji30[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104026] ? item.obji30[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104027] ? item.obji30[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32104028] ? item.obji30[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji30[32104029] ? item.obji30[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104030] ? item.obji30[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104031] ? item.obji30[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104032] ? item.obji30[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104033] ? item.obji30[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104034] ? item.obji30[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104035] ? item.obji30[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji30[32104036] ? item.obji30[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji30[32104037] ? item.obji30[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji30[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d31']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji31[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji31[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji31[32103938] ? item.obji31[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103939] ? item.obji31[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103940] ? item.obji31[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103941] ? item.obji31[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103942] ? item.obji31[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103943] ? item.obji31[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103944] ? item.obji31[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103945] ? item.obji31[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103946] ? item.obji31[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji31[32103947] ? item.obji31[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103948] ? item.obji31[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103949] ? item.obji31[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103950] ? item.obji31[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103951] ? item.obji31[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103952] ? item.obji31[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103953] ? item.obji31[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103954] ? item.obji31[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103955] ? item.obji31[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji31[32103956] ? item.obji31[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103957] ? item.obji31[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103958] ? item.obji31[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103959] ? item.obji31[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103960] ? item.obji31[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103961] ? item.obji31[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103962] ? item.obji31[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103963] ? item.obji31[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103964] ? item.obji31[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji31[32103965] ? item.obji31[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103966] ? item.obji31[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103967] ? item.obji31[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103968] ? item.obji31[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103969] ? item.obji31[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103970] ? item.obji31[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103971] ? item.obji31[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103972] ? item.obji31[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103973] ? item.obji31[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji31[32103974] ? item.obji31[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103975] ? item.obji31[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103976] ? item.obji31[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103977] ? item.obji31[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103978] ? item.obji31[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103979] ? item.obji31[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103980] ? item.obji31[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103981] ? item.obji31[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103982] ? item.obji31[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji31[32103983] ? item.obji31[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103984] ? item.obji31[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103985] ? item.obji31[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103986] ? item.obji31[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103987] ? item.obji31[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103988] ? item.obji31[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103989] ? item.obji31[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103990] ? item.obji31[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32103991] ? item.obji31[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji31[32103992] ? item.obji31[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103993] ? item.obji31[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103994] ? item.obji31[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103995] ? item.obji31[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103996] ? item.obji31[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103997] ? item.obji31[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103998] ? item.obji31[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32103999] ? item.obji31[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32104000] ? item.obji31[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji31[32104001] ? item.obji31[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji31[32104002] ? item.obji31[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104003] ? item.obji31[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104004] ? item.obji31[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104005] ? item.obji31[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104006] ? item.obji31[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104007] ? item.obji31[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104008] ? item.obji31[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104009] ? item.obji31[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32104010] ? item.obji31[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji31[32104011] ? item.obji31[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104012] ? item.obji31[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104013] ? item.obji31[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104014] ? item.obji31[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104015] ? item.obji31[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104016] ? item.obji31[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104017] ? item.obji31[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104018] ? item.obji31[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32104019] ? item.obji31[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji31[32104020] ? item.obji31[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104021] ? item.obji31[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104022] ? item.obji31[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104023] ? item.obji31[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104024] ? item.obji31[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104025] ? item.obji31[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104026] ? item.obji31[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104027] ? item.obji31[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32104028] ? item.obji31[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji31[32104029] ? item.obji31[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104030] ? item.obji31[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104031] ? item.obji31[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104032] ? item.obji31[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104033] ? item.obji31[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104034] ? item.obji31[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104035] ? item.obji31[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji31[32104036] ? item.obji31[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji31[32104037] ? item.obji31[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji31[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
                </tr>
            </table>
        </div>
    @endif

    @if (!empty($res['d32']))
        <div class="format">
            <table width='100%'>
                <tr height=20 class="noborder">
                    <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                        @if(stripos(\Request::url(), 'localhost') !== FALSE)
                            <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @else
                            <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                        @endif
                    </td>
                    <td colspan="17" rowspan="4" class="noborder-tb text-center" style="font-size:large">
                        <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
                    </td>
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;No. RM </td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->nocm  !!}
                    </td>
                    <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Nama Lengkap</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!! $res['d1'][0]->namapasien  !!}
                    </td>
                    <td colspan="2" class="noborder">{!! $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;Tanggal Lahir</td>
                    <td colspan="13" class="noborder" style="text-align: left">&nbsp;
                        : {!! date('d-m-Y',strtotime($res['d1'][0]->tgllahir  )) !!}
                    </td>
                    <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">67</td>
                </tr>
                <tr class="noborder">
                    <td colspan="6" class="noborder" style="text-align: left">&nbsp;NIK</td>
                    <td colspan="11" class="noborder" style="text-align: left">&nbsp;
                        : {!!$res['d1'][0]->noidentitas  !!}
                    </td>
                </tr>
                <tr class="bordered bg-dark">
                    <th colspan="49" height="20pt">ALAT MONITORING CPAP</th>
                </tr>
                <tr>
                    <td colspan="9" class="noborder">Tanggal : @{{item.obji32[32103929] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
                    <td colspan="40" class="noborder text-center">Lengkapi table dibawah setiap 4 jam. Isi dengan angka atau memberi tanda “X” bila sudah dilakukan</td>
                </tr>
                <tr>
                    <td colspan="13" class="text-right">Waktu&nbsp;</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103930] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103931] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103932] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103933] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103934] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103935] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103936] | toDate | date:'HH:mm'}}</td>
                    <td colspan="3" style="text-align: center">@{{item.obji32[32103937] | toDate | date:'HH:mm'}}</td>
                    <td colspan="12" style="text-align: center">Catatan</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Laju pernapasan</td>
                    <td colspan="3">@{{ item.obji32[32103938] ? item.obji32[32103938] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103939] ? item.obji32[32103939] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103940] ? item.obji32[32103940] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103941] ? item.obji32[32103941] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103942] ? item.obji32[32103942] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103943] ? item.obji32[32103943] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103944] ? item.obji32[32103944] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103945] ? item.obji32[32103945] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103946] ? item.obji32[32103946] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Saturasi O2. Bila dibawah target, naikan aliran 1L</td>
                    <td colspan="3">@{{ item.obji32[32103947] ? item.obji32[32103947] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103948] ? item.obji32[32103948] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103949] ? item.obji32[32103949] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103950] ? item.obji32[32103950] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103951] ? item.obji32[32103951] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103952] ? item.obji32[32103952] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103953] ? item.obji32[32103953] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103954] ? item.obji32[32103954] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103955] ? item.obji32[32103955] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Nasopharynx suctioned dengan ukuran 8 or 6 Fr</td>
                    <td colspan="3">@{{ item.obji32[32103956] ? item.obji32[32103956] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103957] ? item.obji32[32103957] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103958] ? item.obji32[32103958] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103959] ? item.obji32[32103959] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103960] ? item.obji32[32103960] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103961] ? item.obji32[32103961] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103962] ? item.obji32[32103962] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103963] ? item.obji32[32103963] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103964] ? item.obji32[32103964] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Prongs tidak menekan septum hidung</td>
                    <td colspan="3">@{{ item.obji32[32103965] ? item.obji32[32103965] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103966] ? item.obji32[32103966] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103967] ? item.obji32[32103967] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103968] ? item.obji32[32103968] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103969] ? item.obji32[32103969] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103970] ? item.obji32[32103970] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103971] ? item.obji32[32103971] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103972] ? item.obji32[32103972] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103973] ? item.obji32[32103973] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Jarak 2 mm antara pangkal prong dan hidung</td>
                    <td colspan="3">@{{ item.obji32[32103974] ? item.obji32[32103974] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103975] ? item.obji32[32103975] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103976] ? item.obji32[32103976] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103977] ? item.obji32[32103977] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103978] ? item.obji32[32103978] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103979] ? item.obji32[32103979] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103980] ? item.obji32[32103980] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103981] ? item.obji32[32103981] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103982] ? item.obji32[32103982] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kerusakan kulit sekitar lubang hidung</td>
                    <td colspan="3">@{{ item.obji32[32103983] ? item.obji32[32103983] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103984] ? item.obji32[32103984] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103985] ? item.obji32[32103985] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103986] ? item.obji32[32103986] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103987] ? item.obji32[32103987] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103988] ? item.obji32[32103988] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103989] ? item.obji32[32103989] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103990] ? item.obji32[32103990] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32103991] ? item.obji32[32103991] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Ubah-ubah posisi bayi supaya bayi terstimulasi</td>
                    <td colspan="3">@{{ item.obji32[32103992] ? item.obji32[32103992] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103993] ? item.obji32[32103993] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103994] ? item.obji32[32103994] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103995] ? item.obji32[32103995] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103996] ? item.obji32[32103996] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103997] ? item.obji32[32103997] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103998] ? item.obji32[32103998] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32103999] ? item.obji32[32103999] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32104000] ? item.obji32[32104000] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Level air dipertahankan pada @{{ item.obji32[32104001] ? item.obji32[32104001] : '_______' }} cm</td>
                    <td colspan="3">@{{ item.obji32[32104002] ? item.obji32[32104002] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104003] ? item.obji32[32104003] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104004] ? item.obji32[32104004] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104005] ? item.obji32[32104005] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104006] ? item.obji32[32104006] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104007] ? item.obji32[32104007] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104008] ? item.obji32[32104008] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104009] ? item.obji32[32104009] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32104010] ? item.obji32[32104010] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Selang dibersihkan dari pengembunan</td>
                    <td colspan="3">@{{ item.obji32[32104011] ? item.obji32[32104011] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104012] ? item.obji32[32104012] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104013] ? item.obji32[32104013] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104014] ? item.obji32[32104014] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104015] ? item.obji32[32104015] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104016] ? item.obji32[32104016] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104017] ? item.obji32[32104017] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104018] ? item.obji32[32104018] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32104019] ? item.obji32[32104019] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Gelembung air</td>
                    <td colspan="3">@{{ item.obji32[32104020] ? item.obji32[32104020] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104021] ? item.obji32[32104021] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104022] ? item.obji32[32104022] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104023] ? item.obji32[32104023] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104024] ? item.obji32[32104024] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104025] ? item.obji32[32104025] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104026] ? item.obji32[32104026] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104027] ? item.obji32[32104027] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32104028] ? item.obji32[32104028] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="13" style="text-align: left">&nbsp;Tidak ada kebocoran</td>
                    <td colspan="3">@{{ item.obji32[32104029] ? item.obji32[32104029] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104030] ? item.obji32[32104030] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104031] ? item.obji32[32104031] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104032] ? item.obji32[32104032] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104033] ? item.obji32[32104033] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104034] ? item.obji32[32104034] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104035] ? item.obji32[32104035] : '' }}</td>
                    <td colspan="3">@{{ item.obji32[32104036] ? item.obji32[32104036] : '' }}</td>
                    <td colspan="12">@{{ item.obji32[32104037] ? item.obji32[32104037] : '' }}</td>
                </tr>
                <tr>
                    <td colspan="49" style="text-align: left">&nbsp;&nbsp;@{{ item.obji32[32104038] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Nasal prongs diberikan setiap hari dengan 2% asam asetat atau chlorin</td>
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

    angular.controller('cetakAlatMonitoringCPAP', function ($scope, $http, httpService) {
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
			obji20: [],
			obji21: [],
			obji22: [],
			obji23: [],
			obji24: [],
			obji25: [],
			obji26: [],
			obji27: [],
			obji28: [],
			obji29: [],
			obji30: [],
			obji31: [],
			obji32: []

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
		var dataLoad21 = {!! json_encode($res['d21'] )!!};
		var dataLoad22 = {!! json_encode($res['d22'] )!!};
		var dataLoad23 = {!! json_encode($res['d23'] )!!};
		var dataLoad24 = {!! json_encode($res['d24'] )!!};
		var dataLoad25 = {!! json_encode($res['d25'] )!!};
		var dataLoad26 = {!! json_encode($res['d26'] )!!};
		var dataLoad27 = {!! json_encode($res['d27'] )!!};
		var dataLoad28 = {!! json_encode($res['d28'] )!!};
		var dataLoad29 = {!! json_encode($res['d29'] )!!};
		var dataLoad30 = {!! json_encode($res['d30'] )!!};
		var dataLoad31 = {!! json_encode($res['d31'] )!!};
		var dataLoad32 = {!! json_encode($res['d32'] )!!};

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

        if(dataLoad21.length > 0){
            for (var i = 0; i <= dataLoad21.length - 1; i++) {
                if(dataLoad21[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad21[i].type == "textbox") {
                    $('#id_'+dataLoad21[i].emrdfk).html( dataLoad21[i].value)
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                }
                if (dataLoad21[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad21[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji21[dataLoad21[i].emrdfk] = chekedd
                }
                if (dataLoad21[i].type == "radio") {
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value

                }

                if (dataLoad21[i].type == "datetime") {
                    $('#id_'+dataLoad21[i].emrdfk).html( dataLoad21[i].value)
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                }
                if (dataLoad21[i].type == "time") {
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                }
                if (dataLoad21[i].type == "date") {
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                }

                if (dataLoad21[i].type == "checkboxtextbox") {
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                    $scope.item.obji21[dataLoad21[i].emrdfk] = true
                }
                if (dataLoad21[i].type == "textarea") {
                    $('#id_'+dataLoad21[i].emrdfk).html( dataLoad21[i].value)
                    $scope.item.obji21[dataLoad21[i].emrdfk] = dataLoad21[i].value
                }
                if (dataLoad21[i].type == "combobox") {

                    var str = dataLoad21[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji21[dataLoad21[i].emrdfk] = res[1]
                        $('#id_'+dataLoad21[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad21[i].type == "combobox2") {
                    var str = dataLoad21[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji21[dataLoad21[i].emrdfk+""+1] = res[0]
                    $scope.item.obji21[dataLoad21[i].emrdfk] = res[1]
                    $('#id_'+dataLoad21[i].emrdfk).html ( res[1])

                }

                if (dataLoad21[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad21[i].value
                }

                if (dataLoad21[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad21[i].value
                }

                if (dataLoad21[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad21[i].value
                }
                if (dataLoad21[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad21[i].value
                }
                
                if (dataLoad21[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad21[i].value
                }

                $scope.tglemr = dataLoad21[i].tgl
                
            }
        }

        if(dataLoad22.length > 0){
            for (var i = 0; i <= dataLoad22.length - 1; i++) {
                if(dataLoad22[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad22[i].type == "textbox") {
                    $('#id_'+dataLoad22[i].emrdfk).html( dataLoad22[i].value)
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                }
                if (dataLoad22[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad22[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji22[dataLoad22[i].emrdfk] = chekedd
                }
                if (dataLoad22[i].type == "radio") {
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value

                }

                if (dataLoad22[i].type == "datetime") {
                    $('#id_'+dataLoad22[i].emrdfk).html( dataLoad22[i].value)
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                }
                if (dataLoad22[i].type == "time") {
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                }
                if (dataLoad22[i].type == "date") {
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                }

                if (dataLoad22[i].type == "checkboxtextbox") {
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                    $scope.item.obji22[dataLoad22[i].emrdfk] = true
                }
                if (dataLoad22[i].type == "textarea") {
                    $('#id_'+dataLoad22[i].emrdfk).html( dataLoad22[i].value)
                    $scope.item.obji22[dataLoad22[i].emrdfk] = dataLoad22[i].value
                }
                if (dataLoad22[i].type == "combobox") {

                    var str = dataLoad22[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji22[dataLoad22[i].emrdfk] = res[1]
                        $('#id_'+dataLoad22[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad22[i].type == "combobox2") {
                    var str = dataLoad22[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji22[dataLoad22[i].emrdfk+""+1] = res[0]
                    $scope.item.obji22[dataLoad22[i].emrdfk] = res[1]
                    $('#id_'+dataLoad22[i].emrdfk).html ( res[1])

                }

                if (dataLoad22[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad22[i].value
                }

                if (dataLoad22[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad22[i].value
                }

                if (dataLoad22[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad22[i].value
                }
                if (dataLoad22[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad22[i].value
                }
                
                if (dataLoad22[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad22[i].value
                }

                $scope.tglemr = dataLoad22[i].tgl
                
            }
        }

        if(dataLoad23.length > 0){
            for (var i = 0; i <= dataLoad23.length - 1; i++) {
                if(dataLoad23[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad23[i].type == "textbox") {
                    $('#id_'+dataLoad23[i].emrdfk).html( dataLoad23[i].value)
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                }
                if (dataLoad23[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad23[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji23[dataLoad23[i].emrdfk] = chekedd
                }
                if (dataLoad23[i].type == "radio") {
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value

                }

                if (dataLoad23[i].type == "datetime") {
                    $('#id_'+dataLoad23[i].emrdfk).html( dataLoad23[i].value)
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                }
                if (dataLoad23[i].type == "time") {
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                }
                if (dataLoad23[i].type == "date") {
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                }

                if (dataLoad23[i].type == "checkboxtextbox") {
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                    $scope.item.obji23[dataLoad23[i].emrdfk] = true
                }
                if (dataLoad23[i].type == "textarea") {
                    $('#id_'+dataLoad23[i].emrdfk).html( dataLoad23[i].value)
                    $scope.item.obji23[dataLoad23[i].emrdfk] = dataLoad23[i].value
                }
                if (dataLoad23[i].type == "combobox") {

                    var str = dataLoad23[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji23[dataLoad23[i].emrdfk] = res[1]
                        $('#id_'+dataLoad23[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad23[i].type == "combobox2") {
                    var str = dataLoad23[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji23[dataLoad23[i].emrdfk+""+1] = res[0]
                    $scope.item.obji23[dataLoad23[i].emrdfk] = res[1]
                    $('#id_'+dataLoad23[i].emrdfk).html ( res[1])

                }

                if (dataLoad23[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad23[i].value
                }

                if (dataLoad23[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad23[i].value
                }

                if (dataLoad23[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad23[i].value
                }
                if (dataLoad23[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad23[i].value
                }
                
                if (dataLoad23[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad23[i].value
                }

                $scope.tglemr = dataLoad23[i].tgl
                
            }
        }

        if(dataLoad24.length > 0){
            for (var i = 0; i <= dataLoad24.length - 1; i++) {
                if(dataLoad24[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad24[i].type == "textbox") {
                    $('#id_'+dataLoad24[i].emrdfk).html( dataLoad24[i].value)
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                }
                if (dataLoad24[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad24[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji24[dataLoad24[i].emrdfk] = chekedd
                }
                if (dataLoad24[i].type == "radio") {
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value

                }

                if (dataLoad24[i].type == "datetime") {
                    $('#id_'+dataLoad24[i].emrdfk).html( dataLoad24[i].value)
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                }
                if (dataLoad24[i].type == "time") {
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                }
                if (dataLoad24[i].type == "date") {
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                }

                if (dataLoad24[i].type == "checkboxtextbox") {
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                    $scope.item.obji24[dataLoad24[i].emrdfk] = true
                }
                if (dataLoad24[i].type == "textarea") {
                    $('#id_'+dataLoad24[i].emrdfk).html( dataLoad24[i].value)
                    $scope.item.obji24[dataLoad24[i].emrdfk] = dataLoad24[i].value
                }
                if (dataLoad24[i].type == "combobox") {

                    var str = dataLoad24[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji24[dataLoad24[i].emrdfk] = res[1]
                        $('#id_'+dataLoad24[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad24[i].type == "combobox2") {
                    var str = dataLoad24[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji24[dataLoad24[i].emrdfk+""+1] = res[0]
                    $scope.item.obji24[dataLoad24[i].emrdfk] = res[1]
                    $('#id_'+dataLoad24[i].emrdfk).html ( res[1])

                }

                if (dataLoad24[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad24[i].value
                }

                if (dataLoad24[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad24[i].value
                }

                if (dataLoad24[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad24[i].value
                }
                if (dataLoad24[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad24[i].value
                }
                
                if (dataLoad24[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad24[i].value
                }

                $scope.tglemr = dataLoad24[i].tgl
                
            }
        }

        if(dataLoad25.length > 0){
            for (var i = 0; i <= dataLoad25.length - 1; i++) {
                if(dataLoad25[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad25[i].type == "textbox") {
                    $('#id_'+dataLoad25[i].emrdfk).html( dataLoad25[i].value)
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                }
                if (dataLoad25[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad25[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji25[dataLoad25[i].emrdfk] = chekedd
                }
                if (dataLoad25[i].type == "radio") {
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value

                }

                if (dataLoad25[i].type == "datetime") {
                    $('#id_'+dataLoad25[i].emrdfk).html( dataLoad25[i].value)
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                }
                if (dataLoad25[i].type == "time") {
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                }
                if (dataLoad25[i].type == "date") {
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                }

                if (dataLoad25[i].type == "checkboxtextbox") {
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                    $scope.item.obji25[dataLoad25[i].emrdfk] = true
                }
                if (dataLoad25[i].type == "textarea") {
                    $('#id_'+dataLoad25[i].emrdfk).html( dataLoad25[i].value)
                    $scope.item.obji25[dataLoad25[i].emrdfk] = dataLoad25[i].value
                }
                if (dataLoad25[i].type == "combobox") {

                    var str = dataLoad25[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji25[dataLoad25[i].emrdfk] = res[1]
                        $('#id_'+dataLoad25[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad25[i].type == "combobox2") {
                    var str = dataLoad25[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji25[dataLoad25[i].emrdfk+""+1] = res[0]
                    $scope.item.obji25[dataLoad25[i].emrdfk] = res[1]
                    $('#id_'+dataLoad25[i].emrdfk).html ( res[1])

                }

                if (dataLoad25[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad25[i].value
                }

                if (dataLoad25[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad25[i].value
                }

                if (dataLoad25[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad25[i].value
                }
                if (dataLoad25[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad25[i].value
                }
                
                if (dataLoad25[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad25[i].value
                }

                $scope.tglemr = dataLoad25[i].tgl
                
            }
        }

        if(dataLoad26.length > 0){
            for (var i = 0; i <= dataLoad26.length - 1; i++) {
                if(dataLoad26[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad26[i].type == "textbox") {
                    $('#id_'+dataLoad26[i].emrdfk).html( dataLoad26[i].value)
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                }
                if (dataLoad26[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad26[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji26[dataLoad26[i].emrdfk] = chekedd
                }
                if (dataLoad26[i].type == "radio") {
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value

                }

                if (dataLoad26[i].type == "datetime") {
                    $('#id_'+dataLoad26[i].emrdfk).html( dataLoad26[i].value)
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                }
                if (dataLoad26[i].type == "time") {
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                }
                if (dataLoad26[i].type == "date") {
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                }

                if (dataLoad26[i].type == "checkboxtextbox") {
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                    $scope.item.obji26[dataLoad26[i].emrdfk] = true
                }
                if (dataLoad26[i].type == "textarea") {
                    $('#id_'+dataLoad26[i].emrdfk).html( dataLoad26[i].value)
                    $scope.item.obji26[dataLoad26[i].emrdfk] = dataLoad26[i].value
                }
                if (dataLoad26[i].type == "combobox") {

                    var str = dataLoad26[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji26[dataLoad26[i].emrdfk] = res[1]
                        $('#id_'+dataLoad26[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad26[i].type == "combobox2") {
                    var str = dataLoad26[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji26[dataLoad26[i].emrdfk+""+1] = res[0]
                    $scope.item.obji26[dataLoad26[i].emrdfk] = res[1]
                    $('#id_'+dataLoad26[i].emrdfk).html ( res[1])

                }

                if (dataLoad26[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad26[i].value
                }

                if (dataLoad26[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad26[i].value
                }

                if (dataLoad26[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad26[i].value
                }
                if (dataLoad26[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad26[i].value
                }
                
                if (dataLoad26[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad26[i].value
                }

                $scope.tglemr = dataLoad26[i].tgl
                
            }
        }

        if(dataLoad27.length > 0){
            for (var i = 0; i <= dataLoad27.length - 1; i++) {
                if(dataLoad27[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad27[i].type == "textbox") {
                    $('#id_'+dataLoad27[i].emrdfk).html( dataLoad27[i].value)
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                }
                if (dataLoad27[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad27[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji27[dataLoad27[i].emrdfk] = chekedd
                }
                if (dataLoad27[i].type == "radio") {
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value

                }

                if (dataLoad27[i].type == "datetime") {
                    $('#id_'+dataLoad27[i].emrdfk).html( dataLoad27[i].value)
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                }
                if (dataLoad27[i].type == "time") {
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                }
                if (dataLoad27[i].type == "date") {
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                }

                if (dataLoad27[i].type == "checkboxtextbox") {
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                    $scope.item.obji27[dataLoad27[i].emrdfk] = true
                }
                if (dataLoad27[i].type == "textarea") {
                    $('#id_'+dataLoad27[i].emrdfk).html( dataLoad27[i].value)
                    $scope.item.obji27[dataLoad27[i].emrdfk] = dataLoad27[i].value
                }
                if (dataLoad27[i].type == "combobox") {

                    var str = dataLoad27[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji27[dataLoad27[i].emrdfk] = res[1]
                        $('#id_'+dataLoad27[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad27[i].type == "combobox2") {
                    var str = dataLoad27[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji27[dataLoad27[i].emrdfk+""+1] = res[0]
                    $scope.item.obji27[dataLoad27[i].emrdfk] = res[1]
                    $('#id_'+dataLoad27[i].emrdfk).html ( res[1])

                }

                if (dataLoad27[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad27[i].value
                }

                if (dataLoad27[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad27[i].value
                }

                if (dataLoad27[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad27[i].value
                }
                if (dataLoad27[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad27[i].value
                }
                
                if (dataLoad27[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad27[i].value
                }

                $scope.tglemr = dataLoad27[i].tgl
                
            }
        }

        if(dataLoad28.length > 0){
            for (var i = 0; i <= dataLoad28.length - 1; i++) {
                if(dataLoad28[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad28[i].type == "textbox") {
                    $('#id_'+dataLoad28[i].emrdfk).html( dataLoad28[i].value)
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                }
                if (dataLoad28[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad28[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji28[dataLoad28[i].emrdfk] = chekedd
                }
                if (dataLoad28[i].type == "radio") {
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value

                }

                if (dataLoad28[i].type == "datetime") {
                    $('#id_'+dataLoad28[i].emrdfk).html( dataLoad28[i].value)
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                }
                if (dataLoad28[i].type == "time") {
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                }
                if (dataLoad28[i].type == "date") {
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                }

                if (dataLoad28[i].type == "checkboxtextbox") {
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                    $scope.item.obji28[dataLoad28[i].emrdfk] = true
                }
                if (dataLoad28[i].type == "textarea") {
                    $('#id_'+dataLoad28[i].emrdfk).html( dataLoad28[i].value)
                    $scope.item.obji28[dataLoad28[i].emrdfk] = dataLoad28[i].value
                }
                if (dataLoad28[i].type == "combobox") {

                    var str = dataLoad28[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji28[dataLoad28[i].emrdfk] = res[1]
                        $('#id_'+dataLoad28[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad28[i].type == "combobox2") {
                    var str = dataLoad28[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji28[dataLoad28[i].emrdfk+""+1] = res[0]
                    $scope.item.obji28[dataLoad28[i].emrdfk] = res[1]
                    $('#id_'+dataLoad28[i].emrdfk).html ( res[1])

                }

                if (dataLoad28[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad28[i].value
                }

                if (dataLoad28[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad28[i].value
                }

                if (dataLoad28[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad28[i].value
                }
                if (dataLoad28[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad28[i].value
                }
                
                if (dataLoad28[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad28[i].value
                }

                $scope.tglemr = dataLoad28[i].tgl
                
            }
        }

        if(dataLoad29.length > 0){
            for (var i = 0; i <= dataLoad29.length - 1; i++) {
                if(dataLoad29[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad29[i].type == "textbox") {
                    $('#id_'+dataLoad29[i].emrdfk).html( dataLoad29[i].value)
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                }
                if (dataLoad29[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad29[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji29[dataLoad29[i].emrdfk] = chekedd
                }
                if (dataLoad29[i].type == "radio") {
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value

                }

                if (dataLoad29[i].type == "datetime") {
                    $('#id_'+dataLoad29[i].emrdfk).html( dataLoad29[i].value)
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                }
                if (dataLoad29[i].type == "time") {
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                }
                if (dataLoad29[i].type == "date") {
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                }

                if (dataLoad29[i].type == "checkboxtextbox") {
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                    $scope.item.obji29[dataLoad29[i].emrdfk] = true
                }
                if (dataLoad29[i].type == "textarea") {
                    $('#id_'+dataLoad29[i].emrdfk).html( dataLoad29[i].value)
                    $scope.item.obji29[dataLoad29[i].emrdfk] = dataLoad29[i].value
                }
                if (dataLoad29[i].type == "combobox") {

                    var str = dataLoad29[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji29[dataLoad29[i].emrdfk] = res[1]
                        $('#id_'+dataLoad29[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad29[i].type == "combobox2") {
                    var str = dataLoad29[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji29[dataLoad29[i].emrdfk+""+1] = res[0]
                    $scope.item.obji29[dataLoad29[i].emrdfk] = res[1]
                    $('#id_'+dataLoad29[i].emrdfk).html ( res[1])

                }

                if (dataLoad29[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad29[i].value
                }

                if (dataLoad29[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad29[i].value
                }

                if (dataLoad29[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad29[i].value
                }
                if (dataLoad29[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad29[i].value
                }
                
                if (dataLoad29[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad29[i].value
                }

                $scope.tglemr = dataLoad29[i].tgl
                
            }
        }

        if(dataLoad30.length > 0){
            for (var i = 0; i <= dataLoad30.length - 1; i++) {
                if(dataLoad30[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad30[i].type == "textbox") {
                    $('#id_'+dataLoad30[i].emrdfk).html( dataLoad30[i].value)
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                }
                if (dataLoad30[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad30[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji30[dataLoad30[i].emrdfk] = chekedd
                }
                if (dataLoad30[i].type == "radio") {
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value

                }

                if (dataLoad30[i].type == "datetime") {
                    $('#id_'+dataLoad30[i].emrdfk).html( dataLoad30[i].value)
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                }
                if (dataLoad30[i].type == "time") {
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                }
                if (dataLoad30[i].type == "date") {
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                }

                if (dataLoad30[i].type == "checkboxtextbox") {
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                    $scope.item.obji30[dataLoad30[i].emrdfk] = true
                }
                if (dataLoad30[i].type == "textarea") {
                    $('#id_'+dataLoad30[i].emrdfk).html( dataLoad30[i].value)
                    $scope.item.obji30[dataLoad30[i].emrdfk] = dataLoad30[i].value
                }
                if (dataLoad30[i].type == "combobox") {

                    var str = dataLoad30[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji30[dataLoad30[i].emrdfk] = res[1]
                        $('#id_'+dataLoad30[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad30[i].type == "combobox2") {
                    var str = dataLoad30[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji30[dataLoad30[i].emrdfk+""+1] = res[0]
                    $scope.item.obji30[dataLoad30[i].emrdfk] = res[1]
                    $('#id_'+dataLoad30[i].emrdfk).html ( res[1])

                }

                if (dataLoad30[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad30[i].value
                }

                if (dataLoad30[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad30[i].value
                }

                if (dataLoad30[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad30[i].value
                }
                if (dataLoad30[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad30[i].value
                }
                
                if (dataLoad30[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad30[i].value
                }

                $scope.tglemr = dataLoad30[i].tgl
                
            }
        }

        if(dataLoad31.length > 0){
            for (var i = 0; i <= dataLoad31.length - 1; i++) {
                if(dataLoad31[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad31[i].type == "textbox") {
                    $('#id_'+dataLoad31[i].emrdfk).html( dataLoad31[i].value)
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                }
                if (dataLoad31[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad31[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji31[dataLoad31[i].emrdfk] = chekedd
                }
                if (dataLoad31[i].type == "radio") {
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value

                }

                if (dataLoad31[i].type == "datetime") {
                    $('#id_'+dataLoad31[i].emrdfk).html( dataLoad31[i].value)
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                }
                if (dataLoad31[i].type == "time") {
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                }
                if (dataLoad31[i].type == "date") {
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                }

                if (dataLoad31[i].type == "checkboxtextbox") {
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                    $scope.item.obji31[dataLoad31[i].emrdfk] = true
                }
                if (dataLoad31[i].type == "textarea") {
                    $('#id_'+dataLoad31[i].emrdfk).html( dataLoad31[i].value)
                    $scope.item.obji31[dataLoad31[i].emrdfk] = dataLoad31[i].value
                }
                if (dataLoad31[i].type == "combobox") {

                    var str = dataLoad31[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji31[dataLoad31[i].emrdfk] = res[1]
                        $('#id_'+dataLoad31[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad31[i].type == "combobox2") {
                    var str = dataLoad31[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji31[dataLoad31[i].emrdfk+""+1] = res[0]
                    $scope.item.obji31[dataLoad31[i].emrdfk] = res[1]
                    $('#id_'+dataLoad31[i].emrdfk).html ( res[1])

                }

                if (dataLoad31[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad31[i].value
                }

                if (dataLoad31[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad31[i].value
                }

                if (dataLoad31[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad31[i].value
                }
                if (dataLoad31[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad31[i].value
                }
                
                if (dataLoad31[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad31[i].value
                }

                $scope.tglemr = dataLoad31[i].tgl
                
            }
        }

        if(dataLoad32.length > 0){
            for (var i = 0; i <= dataLoad32.length - 1; i++) {
                if(dataLoad32[i].emrdfk == 3110029){
                    continue;
                }
                if (dataLoad32[i].type == "textbox") {
                    $('#id_'+dataLoad32[i].emrdfk).html( dataLoad32[i].value)
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                }
                if (dataLoad32[i].type == "checkbox") {
                    var chekedd = false
                    if (dataLoad32[i].value == '1') {
                        var chekedd = true
                    }
                    $scope.item.obji32[dataLoad32[i].emrdfk] = chekedd
                }
                if (dataLoad32[i].type == "radio") {
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value

                }

                if (dataLoad32[i].type == "datetime") {
                    $('#id_'+dataLoad32[i].emrdfk).html( dataLoad32[i].value)
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                }
                if (dataLoad32[i].type == "time") {
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                }
                if (dataLoad32[i].type == "date") {
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                }

                if (dataLoad32[i].type == "checkboxtextbox") {
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                    $scope.item.obji32[dataLoad32[i].emrdfk] = true
                }
                if (dataLoad32[i].type == "textarea") {
                    $('#id_'+dataLoad32[i].emrdfk).html( dataLoad32[i].value)
                    $scope.item.obji32[dataLoad32[i].emrdfk] = dataLoad32[i].value
                }
                if (dataLoad32[i].type == "combobox") {

                    var str = dataLoad32[i].value
                    if(str != null)
                    {
                        var res = str.split("~");
                        
                        $scope.item.obji32[dataLoad32[i].emrdfk] = res[1]
                        $('#id_'+dataLoad32[i].emrdfk).html ( res[1])
                    }
                }
                if (dataLoad32[i].type == "combobox2") {
                    var str = dataLoad32[i].value
                    var res = str.split("~");
                    
                    $scope.item.obji32[dataLoad32[i].emrdfk+""+1] = res[0]
                    $scope.item.obji32[dataLoad32[i].emrdfk] = res[1]
                    $('#id_'+dataLoad32[i].emrdfk).html ( res[1])

                }

                if (dataLoad32[i].emrdfk == '423816' ) {
                    $scope.hariTgl = dataLoad32[i].value
                }

                if (dataLoad32[i].emrdfk == '2000001974' ) {
                    $scope.jamPeriksa = dataLoad32[i].value
                }

                if (dataLoad32[i].emrdfk == '2000002354' ) {
                    $scope.tgl1 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002357' ) {
                    $scope.tgl2 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002360' ) {
                    $scope.tgl3 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002363' ) {
                    $scope.tgl4 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002366' ) {
                    $scope.tgl5 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002369' ) {
                    $scope.tgl6 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002372' ) {
                    $scope.tgl7 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002375' ) {
                    $scope.tgl8 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002378' ) {
                    $scope.tgl9 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002381' ) {
                    $scope.tgl10 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002384' ) {
                    $scope.tgl11 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002387' ) {
                    $scope.tgl12 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002390' ) {
                    $scope.tgl13 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002393' ) {
                    $scope.tgl14 = dataLoad32[i].value
                }
                if (dataLoad32[i].emrdfk == '2000002396' ) {
                    $scope.tgl15 = dataLoad32[i].value
                }
                
                if (dataLoad32[i].emrdfk == '2000002408' ) {
                    $scope.pukul2 = dataLoad32[i].value
                }

                $scope.tglemr = dataLoad32[i].tgl
                
            }
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
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesmen Awal Medis Rawat Inap</title>

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
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body,
        html {
            font-size: 6pt;
        }

        @page {
            size: A4;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 3rem;
            margin-right: 1rem;
            transform: scale(72%);
        }

        table {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        table tr td {
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

        @media only screen and (max-width:220mm) and (max-height:270mm) {
            @page {
                size: A4;
                margin: 0;
                transform: scale(71%);
            }

            .format {
                width: 210mm;
                height: 297mm;
            }

            table {
                transform: scale(50%);
            }
        }
    </style>
</head>

<body ng-controller="cetakAsesmenMedisAwalRanap">
    <div class="format">

        <table>
            <tr>
                <td rowspan="4" colspan="4" style="text-align:center;width:45%">
                    <div
                        style="display:flex;justify-content:space-between;align-content:center;align-items:center;padding:.5rem;">
                        <figure style="width:60px;margin:0 auto;">
                            @if(stripos(\Request::url(), 'localhost') !== FALSE)
                                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
                            @else
                                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
                            @endif
                                
                        </figure>
                        <div class="detail">
                            <strong style="font-size: 7pt">{!! $res['profile']->namalengkap !!}</strong> <br>
                            JL. SERIKAYA NO. 17 BULUKUMBA 92512 <br>
                            TELP : (0413) 81292
                        </div>
                    </div>
                </td>
                <td width="80" style="border:none;">NO. RM</td>
                <td style="border:none;" colspan="4">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="3" style="background:#000;color:#fff;width:none20px;text-align:center;font-size:36px">RM
                </td>
            </tr>

            <tr>
                <td width="80" style="border:none;">NAMA LENGKAP</td>
                <td style="border:none;" colspan="4">: {!!  $res['d'][0]->namapasien  !!}</td>
            </tr>
            <tr>
                <td width="80" style="border:none;">TANGGAL LAHIR</td>
                <td style="border:none;" colspan="4">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
            </tr>
            <tr>
                <td width="80" style="border:none;">NIK</td>
                <td style="border:none;" colspan="4">: {!! $res['d'][0]->noidentitas  !!}</td>
                <td style="text-align:center;font-size:36px">11</td>
            </tr>
            <tr>
                <td colspan="10" style="text-align:center">
                    <h1>ASESMEN AWAL MEDIS RAWAT INAP</h1>
                    <small>(dilengkapi dalam 24 jam pertama pasien masuk ruang rawat inap)</small>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="text-align:center">
                    Dilakukan pada pasien baru, kasus baru, pada kasus akut diulang setelah bulan @{{ item.obj[422200] }} untuk kasus yang
                    sama, untuk kasus kronik diulang setelah bulan @{{ item.obj[422201] }}
                </td>
            </tr>
            <tr>
                <td style="border:none" colspan='3'>Tanggal Masuk Rawat Inap : @{{item.obj[422202] | toDate | date:'dd-MM-yyyy'}}</td>
                <td style="border:none" colspan='3'>Pukul : @{{ item.obj[422202] | toDate | date:'HH:mm' }}</td>
            </tr>
            <tr>
                <td width='25px' colspan='2' valign="top">Keluhan Saat ini</td>
                <td colspan="8">@{{ item.obj['keluhan_saat_ini'] }}</td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td rowspan="4" colspan='2' valign="top">Status Fisik</td>
                <td colspan='2' style="border:none;">TD : @{{ item.obj[422204] ? item.obj[422204] : '.....' }} mmHg</td>
                <td colspan='2' style="border:none">Nadi : @{{ item.obj[422205] ? item.obj[422205] : '.....' }} x/mnt</td>
                <td colspan='2' style="border:none">Suhu : @{{ item.obj[422206] ? item.obj[422206] : '.....' }} &#176;C</td>
                <td colspan='2' style="border:none">Nafas : @{{ item.obj[422207] ? item.obj[422207] : '.....' }} x/mnt</td>
            </tr>
            <tr>
                <td rowspan='2' valign="top" style="border:none">Keadaan Umum</td>
                <td style="border:none">@{{ item.obj[422208] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Baik</td>
                <td style="border:none">@{{ item.obj[422209] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Ringan</td>
                <td style="border:none;border-right:1px solid #000"></td>
                <td rowspan='2' style="border:none" valign="top">Kesadaran: </td>
                <td style="border:none">@{{ item.obj[422212] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} CM</td>
                <td style="border:none">@{{ item.obj[422213] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Apatis</td>
                <td style="border:none">@{{ item.obj[422214] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Somnolen</td>
            </tr>
            <tr>
                <td style="border:none">@{{ item.obj[422210] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Sedang</td>
                <td style="border:none">@{{ item.obj[422211] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sakit Berat</td>
                <td style="border:none;border-right:1px solid #000"></td>
                <td style="border:none">@{{ item.obj[422215] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sopor</td>
                <td style="border:none">@{{ item.obj[422216] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Koma</td>
            </tr>
            <tr>
                <td colspan='9' height="120" valign="top">General: @{{ item.obj['general'] }}
                    <figure style='text-align:right'>
                        <img src="https://i.ibb.co/3pJ21YB/anatomy-tubuh.jpg" alt="anatomy-tubuh" border="0"
                            width="100">
                    </figure>
                </td>
            </tr>
            <tr>
                <td rowspan='4' valign="top" colspan='2'>Bio-Psiko-Sosio-Spiritual</td>
                <td style='border:none' colspan="2">Masalah Psikologi</td>
                <td style='border:none'>: @{{ item.obj[422220] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style='border:none' colspan="3">: @{{ item.obj[422221] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan @{{ item.obj[422222] ? item.obj[422222] : '.......................' }}
                </td>
            </tr>
            <tr>
                <td style='border:none' colspan="2">Masalah Sosial</td>
                <td style='border:none'>: @{{ item.obj[422224] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style='border:none' colspan="3">: @{{ item.obj[422225] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan @{{ item.obj[422226] ? item.obj[422226] : '.......................' }}
                </td>
            </tr>
            <tr>
                <td style='border:none' colspan="2">Masalah Cultural/bahasa</td>
                <td style='border:none'>: @{{ item.obj[422228] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style='border:none' colspan="3">: @{{ item.obj[422229] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan @{{ item.obj[422230] ? item.obj[422230] : '.......................' }}
                </td>
            </tr>
            <tr>
                <td style='border:none' colspan="2">Masalah Spiritual</td>
                <td style='border:none'>: @{{ item.obj[422232] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style='border:none' colspan="3">: @{{ item.obj[422233] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan @{{ item.obj[422234] ? item.obj[422234] : '.......................' }}
                </td>
            </tr>
            <tr>
                <td colspan='2'>Ekonomi</td>
                <td colspan='8'>
                    <div style="display:flex;gap:0.3rem">
                        @{{ item.obj[422235] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} PNS
                        @{{ item.obj[422236] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} TNI/Polri
                        @{{ item.obj[422237] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Pegawai Swasta
                        @{{ item.obj[422238] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Wiraswasta
                        @{{ item.obj[422239] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Petani/Nelayan
                        @{{ item.obj[422240] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain @{{ item.obj[422241] ? item.obj[422241] : '...............' }}
                    </div>
                </td>
            </tr>
            <tr>
                <td rowspan="2" colspan='2'>Riwayat Kesehatan Pasien</td>
                <td colspan='8'>Riwayat Penyakit Sebelumnya: @{{ item.obj['riwayat_penyakit_sebelumnya'] }}</td>
            </tr>
            <tr>
                <td colspan=8>Riwayat Penyakit Sekarang: @{{ item.obj['riwayat_penyakit_sekarang'] }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Riwayat Alergi</td>
                <td style="border:none;">@{{ item.obj[422245] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;" colspan="3">@{{ item.obj[422246] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya,
                    Sebutkan : @{{ item.obj[422247] ? item.obj[422247] : '.......' }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Riwayat Penggunaan Obat</td>
                <td style="border:none;">@{{ item.obj[422248] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;" colspan="3">@{{ item.obj[422249] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya,
                    Sebutkan : @{{ item.obj[422250] ? item.obj[422250] : '.......' }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Asesmen Nyeri</td>
                <td style="border:none;">@{{ item.obj[422251] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak Nyeri</td>
                <td style="border:none;" colspan="3">@{{ item.obj[422252] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }}
                    Nyeri, Menggunakan metode : @{{ item.obj[422253] ? item.obj[422253] : '.......' }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Resiko Jatuh</td>
                <td style="border:none;">@{{ item.obj[422255] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;" colspan="3">@{{ item.obj[422256] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya,
                    Menggunakan metode : @{{ item.obj[422256] ? item.obj[422256] : '.......' }}</td>
            </tr>
            <tr style='border:1px solid #000;height:0px'>
                <td colspan='2'  valign="top">Pengkajian Fungsional</td>
                <td colspan='8'>@{{ item.obj['pengkajian_fungsional'] }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Resiko Nurtional</td>
                <td style="border:none;">@{{ item.obj[422258] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;">@{{ item.obj[422259] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan : @{{ item.obj[422260] ? item.obj[422260] : '.......' }}
                </td>
            </tr>
            <tr style='border:1px solid #000;'>
                <td colspan='2' valign="top">Diagnosis</td>
                <td colspan='8'>@{{ item.obj['diagnosis'] }}</td>
            </tr>
            <tr style='border:1px solid #000;'>
                <td colspan='2' valign="top">Diagnosis Banding</td>
                <td colspan='8'>@{{ item.obj['diagnosis_banding'] }}</td>
            </tr>
            <tr>
                <td rowspan="2" colspan='2' valign="top">Rencana Asuhan</td>
                <td colspan='8' valign="top">Anjuran Pemeriksaan Penunjang: @{{ item.obj['anjuran_pemeriksaan_penunjang'] }}</td>
            </tr>
            <tr>
                <td colspan=8 valign="top">Terapi Tindakan: @{{ item.obj['terapi_tindakan'] }}</td>
            </tr>
            <tr style='border:1px solid #000;'>
                <td colspan='2' valign="top">Konsul</td>
                <td colspan='8'>@{{ item.obj['konsul'] }}</td>
            </tr>
            <tr style='border:1px solid #000'>
                <td colspan=2>Kebutuhan Edukasi</td>
                <td style="border:none;">@{{ item.obj[422267] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td style="border:none;">@{{ item.obj[422268] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya, Sebutkan : @{{ item.obj[422269] ? item.obj[422269] : '.......' }}
                </td>
            </tr>
            <tr style='border:1px solid #000;'>
                <td colspan='2' valign="top">Perencanaan Pulang</td>
                <td colspan='8'>@{{ item.obj['perencanaan_pulang'] }}</td>
            </tr>
            <tr style="height:100px">
                <td colspan=5 valign="top">
                    Bulukumba, @{{item.obj[422271] | toDate | date:'dd MMMM yyyy'}} Pukul : @{{item.obj[422271] | toDate | date:'HH:mm'}}.WITA <br>Dokter Penanggung Jawab Pelayanan : @{{ item.obj[422272] }}
                </td>
                <td colspan=5 valign="top">Tanda Tangan<div id="qrcodeDPJP" style="text-align: center"></div></td>
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

    angular.controller('cetakAsesmenMedisAwalRanap', function ($scope, $http, httpService) {
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
        var keluhan_saat_ini = $scope.item.obj[422203].replace(/(?:\r\n|\r|\n)/g, ', ');
        var general = $scope.item.obj[422217].replace(/(?:\r\n|\r|\n)/g, ', ');
        var riwayat_penyakit_sebelumnya = $scope.item.obj[422242].replace(/(?:\r\n|\r|\n)/g, ', ');
        var riwayat_penyakit_sekarang = $scope.item.obj[422244].replace(/(?:\r\n|\r|\n)/g, ', ');
        var pengkajian_fungsional = $scope.item.obj[422257].replace(/(?:\r\n|\r|\n)/g, ', ');
        var diagnosis = $scope.item.obj[422261].replace(/(?:\r\n|\r|\n)/g, ', ');
        var diagnosis_banding = $scope.item.obj[422262].replace(/(?:\r\n|\r|\n)/g, ', ');
        var anjuran_pemeriksaan_penunjang = $scope.item.obj[422263].replace(/(?:\r\n|\r|\n)/g, ', ');
        var terapi_tindakan = $scope.item.obj[422265].replace(/(?:\r\n|\r|\n)/g, ', ');
        var konsulll = $scope.item.obj[422266].replace(/(?:\r\n|\r|\n)/g, ', ');
        var perencanaan_pulang = $scope.item.obj[422270].replace(/(?:\r\n|\r|\n)/g, ', ');

        $scope.item.obj['keluhan_saat_ini'] = keluhan_saat_ini;
        $scope.item.obj['general'] = general;
        $scope.item.obj['riwayat_penyakit_sebelumnya'] = riwayat_penyakit_sebelumnya;
        $scope.item.obj['riwayat_penyakit_sekarang'] = riwayat_penyakit_sekarang;
        $scope.item.obj['pengkajian_fungsional'] = pengkajian_fungsional;
        $scope.item.obj['diagnosis'] = diagnosis;
        $scope.item.obj['diagnosis_banding'] = diagnosis_banding;
        $scope.item.obj['anjuran_pemeriksaan_penunjang'] = anjuran_pemeriksaan_penunjang;
        $scope.item.obj['terapi_tindakan'] = terapi_tindakan;
        $scope.item.obj['konsul'] = konsulll;
        $scope.item.obj['perencanaan_pulang'] = perencanaan_pulang;

        var dpjp = $scope.item.obj[422272];
        jQuery('#qrcodeDPJP').qrcode({
            width	: 100,
			height	: 100,
            text	: "Tanda Tangan Digital Oleh " + dpjp
        });	
    })

    angular.filter('toDate', function() {
    return function(items) {
        return new Date(items);
        };
    });
    $(document).ready(function () {
        window.print();
    });
</script>
</html>

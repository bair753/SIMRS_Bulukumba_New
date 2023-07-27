<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Operasi</title>
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
            padding:.3rem
        }
    </style>
</head>
<body ng-controller="cetakLaporanOperasi">
      <section>
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif</td>
                <td rowspan="4" colspan="3" style="text-align:center;font-size:larger;border:none"><strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
                <td style="border:none;border-left:1px solid #000">No. RM </td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->nocm  !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;" class="bg-dark">RM</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Nama Lengkap</td>
                <td colspan="3" style="border:none">: {!!  $res['d'][0]->namapasien  !!} {!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
                <td colspan="3" style="border:none">: {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
                <td rowspan="2" style="font-size:xx-large;text-align: center;">53</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    LAPORAN OPERASI
                </td>
            </tr>
            <tr >
                <td rowspan="3" colspan="3" valign="top">Nama DPJP : @{{ item.obj[31100530] ? item.obj[31100530] : '' }}</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Asisten</td>
                <td colspan="3" style="border:none;border-right:1px solid #000">Nama Perawat</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;border-right:1px solid #000">I. @{{ item.obj[31100532] ? item.obj[31100532] : '' }}</td>
                <td colspan="3" style="border:none">Scrub : @{{ item.obj[31100535] ? item.obj[31100535] : '' }}</td>
            </tr>
            <tr style="border-bottom:1px solid #000">
                <td colspan="3" style="border:none;border-right:1px solid #000">II. @{{ item.obj[31100534] ? item.obj[31100534] : '' }}</td>
                <td colspan="3" style="border:none">Sirkuler : @{{ item.obj[31100536] ? item.obj[31100536] : '' }}</td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2" >Nama Dokter Anestesi : @{{ item.obj[31100537] ? item.obj[31100537] : '' }}</td>
                <td colspan="5" style="border:none;">Jenis Anestesi</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td colspan="2" style="border:none;">@{{ item.obj[31100538] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} General Anestesi</td>
                <td colspan="2" style="border:none;">@{{ item.obj[31100539] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Regional Anestesi</td>
                <td style="border:none;">@{{ item.obj[31100540] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lokal Anestesi</td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="4">Diagnose Pre-Operatif : @{{ item.obj[31100541] ? item.obj[31100541] : '' }}</td>
                <td colspan="5">Komplikasi Selama Operasi : @{{ item.obj[31100542] ? item.obj[31100542] : '' }}</td>
            </tr>
            <tr>
                <td rowspan="4" colspan="4">Diagnose Pasca Operatif : @{{ item.obj[31100541] ? item.obj[31100541] : '' }}</td>
                <td colspan="2" style="border:none">Intake</td>
                <td colspan="3" style="border:none">Output</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@{{ item.obj[31100544] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kristaloid </td>
                <td style="border:none">: @{{ item.obj[32103414] ? item.obj[32103414] : '__' }} cc</td>
                <td style="border:none">@{{ item.obj[31100545] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah</td>
                <td style="border:none">: @{{ item.obj[32103415] ? item.obj[32103415] : '__' }} cc</td>
            </tr>
            <tr style="border:none">
                <td style="border:none">@{{ item.obj[31100546] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Expander </td>
                <td style="border:none">: @{{ item.obj[32103416] ? item.obj[32103416] : '__' }} cc</td>
                <td style="border:none">@{{ item.obj[31100547] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Urine</td>
                <td style="border:none">: @{{ item.obj[32103417] ? item.obj[32103417] : '__' }} cc</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td style="border:none">@{{ item.obj[31100548] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Darah </td>
                <td style="border:none">: @{{ item.obj[32103418] ? item.obj[32103418] : '__' }} cc</td>
                <td style="border:none">@{{ item.obj[31100549] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Lain-lain</td>
                <td style="border:none">: @{{ item.obj[32103419] ? item.obj[32103419] : '__' }} cc</td>
            </tr>
            <tr valign="top">
                <td colspan="4" rowspan="5" style="border:none;border-right:1px solid #000">Prosedur Tindakan yang dilakukan : @{{ item.obj[31100550] ? item.obj[31100550] : '' }}</td>
                <td colspan="2" style="border:none;border-right: 1px solid #000;">Dikirim untuk pemeriksaan P.A</td>
                <td colspan="3" style="border:none">Jenis Luka Operasi</td>
            </tr>
            <tr valign="top">
                <td rowspan="4" style="border:none">@{{ item.obj[31100557] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Ya</td>
                <td rowspan="4" style="border:none;border-right:1px solid #000">@{{ item.obj[31100558] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tidak</td>
                <td colspan="3" style="border:none">@{{ item.obj[31100559] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kotor</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@{{ item.obj[31100560] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@{{ item.obj[31100561] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Potensial Kontaminasi</td>
            </tr>
            <tr style="border:none">
                <td colspan="3" style="border:none">@{{ item.obj[31100562] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Bersih</td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">@{{ item.obj[31100551] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Khusus</td>
                <td style="border:none;">@{{ item.obj[31100552] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Besar</td>
                <td style="border:none;" colspan="2">@{{ item.obj[31100553] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Sedang</td>
                <td style="border:none;border-top:1px solid #000;border-left:1px solid #000;" colspan="5">No. Alat yang dipasang (implan) : @{{ item.obj[31100563] ? item.obj[31100563] : '' }}</td>
            </tr>
            <tr style="border:none;border-bottom:1px solid #000">
                <td style="border:none;">@{{ item.obj[31100554] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kecil</td>
                <td style="border:none;">@{{ item.obj[31100555] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Elektif</td>
                <td style="border:none;border-right: 1px solid #000;" colspan="2">@{{ item.obj[31100556] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Emergency</td>
            </tr>
            <tr height="50px" valign="top">
                <td colspan="2">Tanggal Operasi : @{{item.obj[31100564] | toDate | date:'dd MMMM yyyy'}}</td>
                <td colspan="2">Jam Operasi Dimulai : @{{item.obj[31100565] | toDate | date:'HH:mm'}}</td>
                <td colspan="2">Jam Operasi Selesai : @{{item.obj[31100566] | toDate | date:'HH:mm'}}</td>
                <td colspan="3">Lama Operasi Berlangsung : @{{ item.obj[31100567] ? item.obj[31100567] : '' }}</td>
            </tr>
            <tr height="70px" valign="top">
                <td colspan="9" style="border:none">Laporan Tindakan/ Operasi : (jika perlu dapat dilanjutkan di halaman sebelah) : @{{ item.obj[31100568] ? item.obj[31100568] : '' }}</td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none"><div id="qrcodeDokter" style="text-align: center"></div></td>
            </tr>
            <tr style="text-align:center;border:none;">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@{{ item.obj[31100569] ? item.obj[31100569] : '________________________________________' }})</td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">TANDA TANGAN DAN NAMA DOKTER</td>
            </tr>
            {{-- <tr height="850px">
                <td colspan="9"></td>
            </tr> --}}
            <tr height="30px" style="border-top:1px solid #000">
                <td colspan="2" style="border:none">Intruksi Pasca Bedah</td>
                <td colspan="7" style="border:none">:  @{{ item.obj[31100570] ? item.obj[31100570] : '________________________________________' }}</td>

            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">1. Konrol Nadi / Tensi / Nafas / Suhu :</td>
                <td colspan="7" style="border:none">:  @{{ item.obj[31100571] ? item.obj[31100571] : '________________________________________' }}</td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">2. Puasa</td>
                <td colspan="7" style="border:none">:  @{{ item.obj[31100572] ? item.obj[31100572] : '________________________________________' }}</td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">3. Infus</td>
                <td colspan="7" style="border:none">: @{{ item.obj[31100573] ? item.obj[31100573] : '________________________________________' }} </td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">4. Antibiotika</td>
                <td colspan="7" style="border:none">:  @{{ item.obj[31100574] ? item.obj[31100574] : '________________________________________' }}</td>
            </tr>
            <tr height="30px">
                <td colspan="2" style="border:none">5. Lain-lain</td>
                <td colspan="7" style="border:none">:  @{{ item.obj[31100575] ? item.obj[31100575] : '________________________________________' }}</td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">DPJP : </td>
            </tr>
            <tr style="text-align:center;" valign="top">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none"><div id="qrcodeDPJP" style="text-align: center"></div></td>
            </tr>
            <tr style="text-align:center">
                <td colspan="6" style="border:none"></td>
                <td colspan="3" style="border:none">(@{{ item.obj[31100576] ? item.obj[31100576] : '________________________________________' }})</td>
            </tr>
        </table>
    </section>
			
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

    angular.controller('cetakLaporanOperasi', function ($scope, $http, httpService) {
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

        // var diagnose_pasca_operatif = $scope.item.obj[31100543].replace(/(?:\r\n|\r|\n)/g, ', ');
        // var prosedur_tindakan_yang_dilakukan = $scope.item.obj[31100550].replace(/(?:\r\n|\r|\n)/g, ', ');
        // var alat_yang_dipasang = $scope.item.obj[31100563].replace(/(?:\r\n|\r|\n)/g, ', ');
        // var tindakan_operasi = $scope.item.obj[31100568].replace(/(?:\r\n|\r|\n)/g, ', ');

        // $scope.item.obj['diagnose_pasca_operatif'] = diagnose_pasca_operatif;
        // $scope.item.obj['prosedur_tindakan_yang_dilakukan'] = prosedur_tindakan_yang_dilakukan;
        // $scope.item.obj['alat_yang_dipasang'] = alat_yang_dipasang;
        // $scope.item.obj['tindakan_operasi'] = tindakan_operasi;

        var dokter = $scope.item.obj[31100569];
        var dpjp = $scope.item.obj[31100576];
        jQuery('#qrcodeDokter').qrcode({
            width	: 80,
			height	: 80,
            text	: "Tanda Tangan Digital Oleh " + dokter
        });	

        jQuery('#qrcodeDPJP').qrcode({
            width	: 80,
			height	: 80,
            text	: "Tanda Tangan Digital Oleh " + dpjp
        });	
    })
    angular.filter('toDate', function() {
        return function(items) {
            if(items != null){
                 return new Date(items);
            }
        };
    });
    // $(document).ready(function () {
    //     window.print();
    // });
</script>
</html>
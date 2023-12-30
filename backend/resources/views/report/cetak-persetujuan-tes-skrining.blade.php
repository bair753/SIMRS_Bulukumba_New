<!DOCTYPE html>
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pernyataan Persetujuan Terhadap Tes Skrining</title>
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
        {{-- <link rel="stylesheet" href="{{ asset('service/css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('service/css/report/tabel.css') }}"> --}}
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
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;

        }

        img {

            margin-bottom: 15px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            margin: 15px;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;


        }

        h3 {
            text-align: center;
            text-transform: uppercase;

            margin: -15px;
        }

        p {
            text-align: justify;
            margin-bottom: 15px;
            font-size: 12pt;
        }

        .address {
            text-align: center;
            margin-top: 20px;
            margin-bottom: -5px;
            font-size: 9pt;
        }

        .date {
            margin-top: 40px;
        }

        .sender {
            margin-top: 40px;
        }

        .subject {
            margin-top: 20px;
            text-align: center;
        }

        .signature {
            margin-top: 60px;
        }

        .footer {
            margin-top: 60px;
            text-align: center;
            font-style: italic;
        }

        /* Styling for tables */
        table {
            width: 100%;
            border-collapse: collapse;

            border: none;
        }

        th,
        td {
            border: none;

        }

        /* Styling for page breaks when printing */
        @media print {
            body {
                page-break-before: always;
            }
        }
    </style>
</head>

<body ng-controller="cetakPersetujuanSkrining">
    <div class="header">
        <center><img src="{{ $image }}" alt="" style="height: 70px; width:60px;"></center>
        <h3>PEMERINTAH KABUPATEN BULUKUMBA</h3>
        <h2>DINAS KESEHATAN</h2>
        <h3>UPT RSUD H. ANDI SULTHAN DAENG RADJA</h3>
        <p class="address">Jalan Serikaya No. 17 Bulukumba 92512 Telpon (0413) 81290, 81292 FAX.
            85030 <br> Website: https://rsud.bulukumbakab.go.id, Email: sultanhandgradja@yahoo.com</p>
        <hr style="border:2px solid #000">
    </div>
    <div class="header">
        <h3>PERNYATAAN</h3>
        <h4>PERSETUJUAN TERHADAP TES SKRINING HIPOTOROID KONGENITAL</h4>
    </div>
    <p>Saya yang bertandatangan dibawah ini:
    </p>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr>
            <td></td>
            <td colspan="2">Nama Ibu</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116749) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Nama Ayah</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116750) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Orang Tua / Wali</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116751) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Nama Bayi</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116752) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Jenis Kelamin</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116753) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Tanggal Lahir</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116754) {!! $item->value !!} @endif @endforeach </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">No. Rekam Medis</td>
            <td colspan="5">: @foreach($res['d'] as $item) @if($item->emrdfk == 32116755) {!! $item->value !!} @endif @endforeach </td>
        </tr>
    </table>
    <p style="text-align: center"><b>MENYATAKAN</b> <br> Menyetujui di lakukan Uji Saring Hipotiroid Kongenital terhadap bayi kami</p>
    <table>
        <tr style="text-align: center;">
            <td colspan="4"></td>
            <td></td>
            <td colspan="4">Bulukumba, @foreach($res['d'] as $item) @if($item->emrdfk == 32116756) {!! $item->value !!} @endif @endforeach</td>
        </tr>
        <tr>
            <td colspan="4" style="border:none;text-align: center;">Mengetahui</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4">Petugas RSUD</td>
            <td></td>
            <td colspan="4">Orang Tua/Wali</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcodePetugas1" style="text-align: center"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcodePetugas2" style="text-align: center"></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 32116757) {!! $item->value !!} @endif @endforeach</td>
            <td></td>
            <td colspan="4">@foreach($res['d'] as $item) @if($item->emrdfk == 32116758) {!! $item->value !!} @endif @endforeach</td>
        </tr>

    </table>
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
  
    angular.controller('cetakPersetujuanSkrining', function ($scope, $http, httpService) {
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
        // var keluhan_saat_ini = $scope.item.obj[422203].replace(/(?:\r\n|\r|\n)/g, ', ');
  
        // $scope.item.obj['keluhan_saat_ini'] = keluhan_saat_ini;
  
        var petugas1 = $scope.item.obj[32116757];
        var petugas2 = $scope.item.obj[32116758];
        
        if(petugas1 != undefined){
            jQuery('#qrcodePetugas1').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + petugas1
            });	
        }
        if(petugas2 != undefined){
            jQuery('#qrcodePetugas2').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + petugas2
            });	
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
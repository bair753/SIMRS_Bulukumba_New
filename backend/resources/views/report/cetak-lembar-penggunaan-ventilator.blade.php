
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Penggunaan Ventilator</title>
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
            margin-top:3rem;
            margin-bottom:1rem;
            margin-right:1rem;
            transform:scale(72%);
        }
        body{
            font-family:Arial, Helvetica, sans-serif;
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
            /* font-size: x-small; */
        }
        tr td{
            border:none solid #000;
            border-collapse: collapse;
        }
        #content > tr td{
            width:20px;
        }
        .info table > tr td{
            width:20px;
        }
        td{
            padding:.3rem;
            font-size:10pt;
        }
    </style>
</head>
<body ng-controller="cetakLembarPenggunaanVentilator">
    <table width="100%" border="1">
        <tr>
            <td colspan="3" style="border: none"><strong>{!! $res['profile']->namalengkap !!}</strong></td>
            {{-- <td colspan="3" rowspan="2"><strong>{!! $res['profile']->namalengkap !!}</strong><br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td> --}}
            <td style="border:none;border-left:1px solid #000">Nomor RM <br> Nama Lengkap</td>
            <td colspan="4" style="border:none">: {!! $res['d1'][0]->nocm  !!} <br> : {!!  $res['d1'][0]->namapasien  !!} {!!  $res['d1'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr>
            <td colspan="3" style="border-top: none">{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292</td>
            <td style="border:none;border-left:1px solid #000">Tanggal Lahir</td>
            <td colspan="4" style="border:none">: {!! date('d-m-Y',strtotime( $res['d1'][0]->tgllahir  )) !!} <br></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;font-size:16pt"><strong>LEMBAR PENGGUNAAN VENTILATOR</strong></td>
        </tr>
    </table>
    <table width="100%" style="table-layout:fixed;border:none">
        <tr style="height:20px;"></tr>
    </table>

    <table width="100%" border="1">
        <tr style="text-align: center">
            <td><b>NO</b></td>
            <td><b>TGL/JAM PEMASANGAN</b></td>
            <td><b>TGL/JAM SETELAH PEMASANGAN</b></td>
            <td><b>JUMLAH JAM PEMASANGAN</b></td>
            <td><b>NAMA TINDAKAN</b></td>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td>@{{item.obj[32110722] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110723] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110724] ? item.obj[32110724] : '' }}</td>
            <td>@{{ item.obj[32110725] ? item.obj[32110725] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>@{{item.obj[32110726] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110727] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110728] ? item.obj[32110728] : '' }}</td>
            <td>@{{ item.obj[32110729] ? item.obj[32110729] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>@{{item.obj[32110730] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110731] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110732] ? item.obj[32110732] : '' }}</td>
            <td>@{{ item.obj[32110733] ? item.obj[32110733] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>@{{item.obj[32110734] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110735] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110736] ? item.obj[32110736] : '' }}</td>
            <td>@{{ item.obj[32110737] ? item.obj[32110737] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">5</td>
            <td>@{{item.obj[32110738] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110739] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110740] ? item.obj[32110740] : '' }}</td>
            <td>@{{ item.obj[32110741] ? item.obj[32110741] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">6</td>
            <td>@{{item.obj[32110742] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110743] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110744] ? item.obj[32110744] : '' }}</td>
            <td>@{{ item.obj[32110745] ? item.obj[32110745] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">7</td>
            <td>@{{item.obj[32110746] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110747] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110748] ? item.obj[32110748] : '' }}</td>
            <td>@{{ item.obj[32110749] ? item.obj[32110749] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">8</td>
            <td>@{{item.obj[32110750] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110751] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110752] ? item.obj[32110752] : '' }}</td>
            <td>@{{ item.obj[32110753] ? item.obj[32110753] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">9</td>
            <td>@{{item.obj[32110754] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110755] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110756] ? item.obj[32110756] : '' }}</td>
            <td>@{{ item.obj[32110757] ? item.obj[32110757] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">10</td>
            <td>@{{item.obj[32110758] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110759] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110760] ? item.obj[32110760] : '' }}</td>
            <td>@{{ item.obj[32110761] ? item.obj[32110761] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">11</td>
            <td>@{{item.obj[32110762] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110763] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110764] ? item.obj[32110764] : '' }}</td>
            <td>@{{ item.obj[32110765] ? item.obj[32110765] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">12</td>
            <td>@{{item.obj[32110766] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110767] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110768] ? item.obj[32110768] : '' }}</td>
            <td>@{{ item.obj[32110769] ? item.obj[32110769] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">13</td>
            <td>@{{item.obj[32110770] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110771] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110772] ? item.obj[32110772] : '' }}</td>
            <td>@{{ item.obj[32110773] ? item.obj[32110773] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">14</td>
            <td>@{{item.obj[32110774] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110775] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110776] ? item.obj[32110776] : '' }}</td>
            <td>@{{ item.obj[32110777] ? item.obj[32110777] : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: center">15</td>
            <td>@{{item.obj[32110778] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{item.obj[32110779] | toDate | date:'dd MMMM yyyy'}}</td>
            <td>@{{ item.obj[32110780] ? item.obj[32110780] : '' }}</td>
            <td>@{{ item.obj[32110781] ? item.obj[32110781] : '' }}</td>
        </tr>
    </table>

    <table width="100%" style="table-layout:fixed;border:none">
        <tr style="height:20px;"></tr>

        <tr style="text-align: center;">
            <td colspan="4" style="border:none">DPJP</td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none">RM 36 LT</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcodePetugas1" style="text-align: center"></td>
            <td style="border:none"></td>
            <td colspan="4" valign="bottom" style="border:none"><div id="qrcodePetugas2" style="text-align: center"></td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none">@{{ item.obj[32110782] ? item.obj[32110782] : '___________________' }}</td>
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
  
    angular.controller('cetakLembarPenggunaanVentilator', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: []
        }
        var dataLoad = {!! json_encode($res['d1'] )!!};
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
  
        var petugas1 = $scope.item.obj[32110782];
        
        if(petugas1 != undefined){
            jQuery('#qrcodePetugas1').qrcode({
                width	: 100,
                height	: 100,
                text	: "Tanda Tangan Digital Oleh " + petugas1
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
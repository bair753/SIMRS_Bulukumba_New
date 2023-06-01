<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kelahiran</title>
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
        <script src="{{ asset('js/angular/moment.js') }}"></script>
        <script src="{{ asset('js/angular/moment-with-locales.js') }}"></script>
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
        <script src="{{ asset('js/angular/moment.js') }}"></script>
        <script src="{{ asset('js/angular/moment-with-locales.js') }}"></script>
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
            margin-left:5rem;
            margin-top:1rem;
            margin-bottom:3rem;
            margin-right:3rem;
            transform:scale(72%);
        }
        h1, h2, p{
            line-height:12px
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
            width:70px;
            height:auto;
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
            /* font-size: 12pt; */
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
<body ng-controller="cetakSuketKelahiran">
      <section>
        <table width="100%" id="content" style="table-layout:fixed;border:none">
            <tr style="border:none;text-align:center">
                <td colspan="10" style="border:none;">
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;">
                @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;">
                @endif
            </td>
            </tr>
            <tr style="border:none;">
                <td colspan="10" style="text-align:center;border:none;">
                    <h2>PEMERINTAH KABUPATEN BULUKUMBA</h2>
                </td>
            </tr>
            <tr style="border:none;">
                <td style="text-align:center;border:none;" colspan="10" >
                    <h2>DINAS KESEHATAN</h2>
                </td>
            </tr>
            <tr style="border:none;">
                <td style="text-align:center;border:none;font-size:large" colspan="10" >
                    <h1>UPT RSUD H.ANDI SULTHAN DAENG RADJA</h1>
                </td>
            </tr>
            <tr style="border:none;">
                <td style="text-align:center;border:none;" height="10px"  colspan="10" >
                    <p>
                        Jalan Senkaya No. 17 Bulukumba 92512 Telepon (0413) 81290, 81292 FAX. 85030
                    </p>
                </td>
            </tr>
            <tr style="border:none;border-bottom:2px solid #000;">
                <td style="text-align:center;border:none;" height="10px"  colspan="10" >
                    <p>
                        Website: https•//rsud bulukumbakab qo iď, E-mail :sulthandgradja@yahoo.com
                    </p>
                </td>
            </tr>
            <tr style="border:none" height="35px"></tr>
            <tr>
                <th colspan="10" style="text-align:center;font-size: large;">
                    <u>SURAT KETERANGAN KELAHIRAN</u>
                </th>
            </tr>
            <tr>
                <th colspan="10" style="text-align:center;">
                    NOMOR : 440	/ @{{ item.obj[32108986] ? item.obj[32108986] : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' }} / RSUD - BLK / 2023
                </th>
            </tr>
            <tr style="border:none;" height="50px">
            </tr>
            <tr>
                <td colspan="10" style="border:none;">
                    Yang bertanda tangan di bawah ini, Dokter / Bidan Rumah Sakit Umum Daerah Kab. Bulukumba menerangkan bahwa:
                </td>
            </tr>
            <tr height="50px"></tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">NAMA</td>
                <td colspan="6" style="border:none;">: @{{ item.obj[32108987] ? item.obj[32108987] : '..................................................' }}</td>
                <td  style="border:none;">(Ny)</td>
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">UMUR</td>
                <td style="border:none;">: @{{ item.obj[32108988] ? item.obj[32108988] : '..................................................' }}</td>
                <td colspan="6" style="border:none;"></td>
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">PEKERJAAN</td>
                <td colspan="7" style="border:none;">: @{{ item.obj[32108989] ? item.obj[32108989] : '..................................................' }} </td>
                {{-- <td colspan="6" style="border:none;">cek</td> --}}
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">ALAMAT</td>
                <td style="border:none;">: @{{ item.obj[32108990] ? item.obj[32108990] : '..................................................' }}</td>
                <td colspan="6" style="border:none;"></td>
            </tr>
            <tr style="border:none;" height="50px"></tr>
            <tr>
                <td style="border:none"><em>Istri dari</em></td>
            </tr>
            <tr style="border:none;" height="20px"></tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">NAMA</td>
                <td colspan="6" style="border:none;">: @{{ item.obj[32108991] ? item.obj[32108991] : '..................................................' }}</td>
                <td style="border:none;">(Tn)</td>
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">UMUR</td>
                <td style="border:none;">: @{{ item.obj[32108992] ? item.obj[32108992] : '..................................................' }}</td>
                <td colspan="6" style="border:none;"></td>
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">PEKERJAAN</td>
                <td style="border:none;">: @{{ item.obj[32108993] ? item.obj[32108993] : '..................................................' }}</td>
                <td colspan="6" style="border:none;"></td>
            </tr>
            <tr style="border:none;">
                <td colspan="3" style="border:none;">ALAMAT</td>
                <td style="border:none;">: @{{ item.obj[32108994] ? item.obj[32108994] : '..................................................' }}</td>
                <td colspan="6" style="border:none;"></td>
            </tr>
            <tr style="border:none;" height="50px"></tr>
            <tr style="border:none;">
                <td colspan="10" style="border:none;">
                    Adalah benar telah melahirkan Anak "@{{ item.obj[32108995] ? item.obj[32108995] : '........................' }}" di Rumah Sakit Umum Daerah H. Andi Sulthan Daeng Radja Bulukumba yang bernama "@{{ item.obj[32108996] ? item.obj[32108996] : '........................' }}" "Jenis Kelamin "@{{ item.obj[32108997] ? item.obj[32108997] : '........................' }}" 
                    Pada Hari "@{{item.obj[32108998] | DateIndo | date:'EEEE' }}" Tanggal "@{{item.obj[32108998] | toDate | date:'dd-MM-yyyy'}}" Jam " @{{item.obj[32108998] | toDate | date:'HH:mm'}}" WITA.
                </td>
            </tr>
            <tr style="border:none" height="50px">
                <td colspan="10" style="border:none">
                    Demikian Surat Keterangan ini dibuat untuk digunakan sebagaimana mestinya.
                </td>
            </tr>
            <tr style="border:none">
                <td colspan="7" style="border:none"></td>
                <td colspan="3" style="border:none">Bulukumba, @{{item.obj[32108999] | toDate | date:'dd-MM-yyyy HH:mm'}}</td>
            </tr>
            <tr style="border:none">
                <td colspan="7" style="border:none"></td>
                <td colspan="3" style="border:none">Mengetahui, </td>
            </tr>
            <tr style="border:none">
                <td colspan="7" style="border:none"></td>
                <td colspan="3" style="border:none">Dokter / Bidan :</td>
            </tr>
            <tr style="border:none;">
                <td colspan="7" style="border:none"></td>
                <td colspan="3" style="border:none"><div id="qrcodePetugas1" style="text-align: left"></td>
            </tr>
            <tr style="border:none">
                <td colspan="7" style="border:none"></td>
                <td colspan="3" style="border:none">(@{{ item.obj[32109000] ? item.obj[32109000] : '........................' }})</td>
            </tr>
        </table>
    </section>
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
      
        angular.controller('cetakSuketKelahiran', function ($scope, $http, httpService) {
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
      
            var petugas1 = $scope.item.obj[32109000];
            if (petugas1 != undefined) {
                jQuery('#qrcodePetugas1').qrcode({
                    width	: 100,
                    height	: 100,
                    text	: "Tanda Tangan Digital Oleh " + petugas1
                });	
            }
            
        })
        // var moment = require('moment');
        angular.filter('toDate', function() {
            return function(items) {
                if(items != null){
                    return new Date(items);
                    
                }
            };
        });

        angular.filter('DateIndo', function() {
            return function(items) {
                if (items != null) {
                const date = new Date(items);
                const hari = moment(date).locale('id').format('dddd');
                return hari;
                }
            };
        });
        $(document).ready(function () {
            window.print();
        });
      </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Echocardiografi</title>
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
            font-size:xx-large;
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
<body ng-controller="cetakCardiografi">
      <section>
        <table width="100%" id="content" style="table-layout:fixed">
            <tr style="border:none;border-top:1px solid #000">
                <td rowspan="4" style="border:none;border-right:1px solid #000">
                    @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                    @endif
                </td>
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
                <td rowspan="2" style="font-size:xx-large;text-align: center;">163</td>
            </tr>
            <tr>
                <td style="border:none;border-left:1px solid #000">NIK</td>
                <td colspan="3" style="border:none">: {!! $res['d'][0]->noidentitas  !!}</td>
            </tr>
            <tr>
                <td colspan="9" class="bg-dark" style="font-size:x-large">
                    HASIL ECHOCARDIOGRAFI
                </td>
            </tr>
            <tr style="border:none">
                <td style="border-top:1px;" colspan="9"><b>Tanggal diperiksa : @{{item.obj[32110651] | toDate | date:'dd MMMM yyyy HH:mm'}}</b></td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">Discription - Dimentional & Real Time Echocardiogram</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">Discription of Wall Motion, Masses, Valves, Pericardioum</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="9">All Chambers</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">LA/LV</td> 
                <td style="border:none;" colspan="7">: N/ Dilatasi /  Mengecil</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">RA/RV</td> 
                <td style="border:none;" colspan="7">: N/ Dilatasi /  Mengecil</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Others</td> 
                <td style="border:none;" colspan="7">: Trombus / Pusaran / Pusaran Darah / Tumor / ………………</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">LVH</td> 
                <td style="border:none;" colspan="7">: Konsentrik / Eksentrik / Tidak Ada</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">RWMA</td> 
                <td style="border:none;" colspan="7">: Hipo / A / Normo Kinetik di Ant. Basal / Lateral / Inferior / Middle / ……….</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9">Valves</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">AO</td> 
                <td style="border:none;" colspan="7">: N / AS / Al - Mild / Moderate / Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">P</td> 
                <td style="border:none;" colspan="7">: N / PS / PI - Mild / Moderate / Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">T</td> 
                <td style="border:none;" colspan="7">: N / TS / TI - Mild / Moderate / Severe</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">M</td> 
                <td style="border:none;" colspan="7">: N / MS / Ml - Mild / Moderate / Severe - Distance - WS</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">EF (Estimated)</td> 
                <td style="border:none;" colspan="7">: ………%, E/A < 1 / > , TAPSE : < 16 / > 16</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Others</td> 
                <td style="border:none;" colspan="7">: Venticle Gap / Atrial’ GAP : …………………..</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2">Results</td> 
                <td style="border:none;" colspan="7">: HFpEF ec, HHD , CAD, Others ( Mention ) : ……………………</td> 
            </tr>
            <tr style="border:none">
                <td style="border:none;" colspan="2"></td> 
                <td style="border:none;" colspan="7">: HFpEF ec, HHD , CAD, Others ( Mention ) : ……………………</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"> Tanggal dilakukan Echoyang sebelumnya ( bila ada ) : </td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"> Impression ( Compare To Previous ) : Stabil / Better/ Not Good : </td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="9"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">Bulukumba,</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">Dokter Yang Memeriksa</td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3"></td> 
            </tr>

            <tr style="border:none">
                <td style="border:none;" colspan="6"></td> 
                <td style="border:none;" colspan="3">(................................)</td> 
            </tr>

        </table>
    </section>
<!-- 
	
	: 
	: 

	



-->

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

    angular.controller('cetakCardiografi', function ($scope, $http, httpService) {
        $scope.item = {
            obj: [],
            obj2: [],
            objImg: [],
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
        console.log($scope.item.objImg[31101098]);
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
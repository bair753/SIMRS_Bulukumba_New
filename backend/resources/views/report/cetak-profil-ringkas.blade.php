<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ringkas Medis Rawat Jalan</title>
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
            width:210mm;
            height:297mm;
            margin-top:250mm;
            margin-bottom:250mm;
            margin-left:250mm;
            margin-right:250mm;
            margin:0 auto; 
        }
        @page{
            size: A4;
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
            font-size: small;
        }
        table tr{
            height:16pt
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
		p{
			padding:.5rem;
		}
		ul li{
			list-style:none;
		}
		ul li:before{
			content:'-'
		}

		.gambar{
			position:absolute;
			top:25%;
			left:45%;
		}
		img.img-diagram{
			width:97%;
			height:97%;
			object-fit: cover;
		}
    </style>
</head>
<body ng-controller="cetakProfilRingkas">
    <table width='100%'>
        <tr height=20 class="noborder">
            <td colspan="8" rowspan="4" class="p3 noborder-tb text-center">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @else
                <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 60px;display:block; margin:auto;">
                @endif
            </td>
            <td colspan="17" rowspan="4" class="noborder-tb text-center" >
                <strong>{!! $res['profile']->namalengkap !!}</strong> <br>{!! $res['profile']->alamatlengkap !!}<br>TELP : (0413) 81292
            </td>
            <td colspan="6" class="noborder">No. RM </td>
            <td colspan="13" class="noborder">
                : {!! $res['d'][0]->nocm  !!}
            </td>
            <td colspan="5" rowspan="2" class="border-lr bg-dark" style="font-size: xxx-large;text-align:center">RM</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Nama Lengkap</td>
            <td colspan="11" class="noborder">
                : {!!  $res['d'][0]->namapasien  !!}
            </td>
            <td colspan="2" class="noborder">({!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'P' : 'L'  !!})</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">05</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PROFIL RINGKAS MEDIS RAWAT JALAN</th>
        </tr>
		<tr>
			<td colspan="16">1. DPJP : @{{ item.obj[421400] ? item.obj[421400] : '' }}</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
		<tr>
			<td colspan="16" rowspan="4">Tanggal : @{{item.obj[421401] | toDate | date:'dd MMMM yyyy'}} <br> Jam : @{{item.obj[421401] | toDate | date:'HH:mm'}}</td>
			<td colspan="16">1. @{{ item.obj[421402] ? item.obj[421402] : '' }}</td>
			<td colspan="17">1. @{{ item.obj[421406] ? item.obj[421406] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">2. @{{ item.obj[421403] ? item.obj[421403] : '' }}</td>
			<td colspan="17">2. @{{ item.obj[421407] ? item.obj[421407] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. @{{ item.obj[421404] ? item.obj[421404] : '' }}</td>
			<td colspan="17">3. @{{ item.obj[421408] ? item.obj[421408] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. @{{ item.obj[421405] ? item.obj[421405] : '' }}</td>
			<td colspan="17">4. @{{ item.obj[421409] ? item.obj[421409] : '' }}</td>
		</tr>
		<tr>
			<td colspan="16">2. DPJP : @{{ item.obj[421410] ? item.obj[421410] : '' }}</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @{{item.obj[421411] | toDate | date:'dd MMMM yyyy'}} <br> Jam : @{{item.obj[421411] | toDate | date:'HH:mm'}}</td>
			<td colspan="16">1. @{{ item.obj[421412] ? item.obj[421412] : '' }}</td>
			<td colspan="17">1. @{{ item.obj[421416] ? item.obj[421416] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">2. @{{ item.obj[421413] ? item.obj[421413] : '' }}</td>
			<td colspan="17">2. @{{ item.obj[421417] ? item.obj[421417] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. @{{ item.obj[421414] ? item.obj[421414] : '' }}</td>
			<td colspan="17">3. @{{ item.obj[421418] ? item.obj[421418] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. @{{ item.obj[421415] ? item.obj[421415] : '' }}</td>
			<td colspan="17">4. @{{ item.obj[421419] ? item.obj[421419] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. DPJP : @{{ item.obj[421420] ? item.obj[421420] : '' }}</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @{{item.obj[421421] | toDate | date:'dd MMMM yyyy'}} <br> Jam : @{{item.obj[421421] | toDate | date:'HH:mm'}}</td>
			<td colspan="16">1. @{{ item.obj[421422] ? item.obj[421422] : '' }}</td>
			<td colspan="17">1. @{{ item.obj[421426] ? item.obj[421426] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">2. @{{ item.obj[421423] ? item.obj[421423] : '' }}</td>
			<td colspan="17">2. @{{ item.obj[421427] ? item.obj[421427] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. @{{ item.obj[421424] ? item.obj[421424] : '' }}</td>
			<td colspan="17">3. @{{ item.obj[421428] ? item.obj[421428] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. @{{ item.obj[421425] ? item.obj[421425] : '' }}</td>
			<td colspan="17">4. @{{ item.obj[421429] ? item.obj[421429] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. DPJP : @{{ item.obj[421430] ? item.obj[421430] : '' }}</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @{{item.obj[421431] | toDate | date:'dd MMMM yyyy'}} <br> Jam : @{{item.obj[421431] | toDate | date:'HH:mm'}}</td>
			<td colspan="16">1. @{{ item.obj[421432] ? item.obj[421432] : '' }}</td>
			<td colspan="17">1. @{{ item.obj[421436] ? item.obj[421436] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">2. @{{ item.obj[421433] ? item.obj[421433] : '' }}</td>
			<td colspan="17">2. @{{ item.obj[421437] ? item.obj[421437] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. @{{ item.obj[421434] ? item.obj[421434] : '' }}</td>
			<td colspan="17">3. @{{ item.obj[421438] ? item.obj[421438] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. @{{ item.obj[421435] ? item.obj[421435] : '' }}</td>
			<td colspan="17">4. @{{ item.obj[421439] ? item.obj[421439] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">5. DPJP : @{{ item.obj[421440] ? item.obj[421440] : '' }}</td>
			<td colspan="16" style="text-align: center">DIAGNOSIS</td>
			<td colspan="17" style="text-align: center">TERAPI</td>
		</tr>
        <tr>
			<td colspan="16" rowspan="4">Tanggal : @{{item.obj[421441] | toDate | date:'dd MMMM yyyy'}} <br> Jam : @{{item.obj[421441] | toDate | date:'HH:mm'}}</td>
			<td colspan="16">1. @{{ item.obj[421442] ? item.obj[421442] : '' }}</td>
			<td colspan="17">1. @{{ item.obj[421446] ? item.obj[421446] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">2. @{{ item.obj[421443] ? item.obj[421443] : '' }}</td>
			<td colspan="17">2. @{{ item.obj[421447] ? item.obj[421447] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">3. @{{ item.obj[421444] ? item.obj[421444] : '' }}</td>
			<td colspan="17">3. @{{ item.obj[421448] ? item.obj[421448] : '' }}</td>
		</tr>
        <tr>
			<td colspan="16">4. @{{ item.obj[421445] ? item.obj[421445] : '' }}</td>
			<td colspan="17">4. @{{ item.obj[421449] ? item.obj[421449] : '' }}</td>
		</tr>
    </table>
    <br>
    <table width='100%'>
        <tr class="bordered bg-dark">
			<td colspan="1">NO</td>
			<td colspan="21" style="text-align: center">TANGGAL</td>
			<td colspan="27" style="text-align: center">CATATAN</td>
		</tr>
        <tr>
			<td colspan="2">1</td>
			<td colspan="20" style="text-align: center">@{{item.obj[421450] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="27" style="text-align: center">@{{ item.obj[421451] ? item.obj[421451] : '' }}</td>
		</tr>
        <tr>
			<td colspan="2">2</td>
			<td colspan="20" style="text-align: center">@{{item.obj[421452] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="27" style="text-align: center">@{{ item.obj[421453] ? item.obj[421453] : '' }}</td>
		</tr>
        <tr>
			<td colspan="2">3</td>
			<td colspan="20" style="text-align: center">@{{item.obj[421454] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="27" style="text-align: center">@{{ item.obj[421455] ? item.obj[421455] : '' }}</td>
		</tr>
        <tr>
			<td colspan="2">4</td>
			<td colspan="20" style="text-align: center">@{{item.obj[421456] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="27" style="text-align: center">@{{ item.obj[421457] ? item.obj[421457] : '' }}</td>
		</tr>
        <tr>
			<td colspan="2">5</td>
			<td colspan="20" style="text-align: center">@{{item.obj[421458] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
			<td colspan="27" style="text-align: center">@{{ item.obj[421459] ? item.obj[421459] : '' }}</td>
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

    angular.controller('cetakProfilRingkas', function ($scope, $http, httpService) {
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
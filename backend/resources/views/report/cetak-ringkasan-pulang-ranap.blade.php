<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ringkasan Pulang</title>

  @if(stripos(\Request::url(), 'localhost') !== FALSE)
        {{-- <link rel="stylesheet" href="{{ asset('css/report/paper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/report/tabel.css') }}"> --}}
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.qr-code.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/jquery.qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/qrcode/src/qrcode.js') }}"></script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
        <link href="{{ asset('service/css/style.css') }}" rel="stylesheet">
        <!-- angular -->
        <script src="{{ asset('service/js/angular/angular.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('service/js/angular/angular-route.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-animate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('service/js/angular/angular-aria.min.js') }}"></script>
        <script src="{{ asset('service/js/angular/angular-material.js') }}" type="text/javascript"></script>
    @endif
    <style>
        @media print {
            td.merah {
                background-color: #d54242 !important;
                -webkit-print-color-adjust: exact; 
            }
            td.kuning {
                background-color: #c5d542 !important;
                -webkit-print-color-adjust: exact; 
            }
            td.hijau {
                background-color: #42d55b !important;
                -webkit-print-color-adjust: exact; 
            }
            td.hitam {
                background-color: #000000 !important;
                -webkit-print-color-adjust: exact; 
            }
        }
        @page {
            size: A4;
        }

        /*@media print {*/
        /*    body {margin:0}*/
        /*}*/
        .double-border {

            border: 4px solid #000;

        }

        .double-border:before {

            border: 4px solid #fff;

        }

        .box {
            border: 2px solid black;
            /*border-radius: 6px;*/
        }

        .garis6 td {
            padding: 3px;
        }

        .bold {
            font-weight: bold;
        }

        .f-s-15 {
            font-size: 12px;
        }

        .top-height {
            height: 50px;
            vertical-align: text-top;
            width: 15%;
        }

        .text-top {
            vertical-align: text-top;
        }
        table {
            width: 100%;
            height: 100%;
        }
        .kotak {
            width: 50px;
            height: 20px;
        }
        .merah {
            background-color: #d54242 !important;
        }
        .kuning {
            background-color: #c5d542 !important;
        }
        .hijau {
            background-color: #42d55b !important;
        }
        .hitam {
            background-color: #000000 !important;
        }
        .bmerah {
            border:thin solid #d54242;
        }
        
        .bkuning {
            border:thin solid #c5d542;
        }
        
        .bhijau {
            border:thin solid #42d55b;
        }
        
        .bhitam {
            border:thin solid #000000;
        }
        .border-lr {
             border-collapse: collapse;
        }
        .border-lr td {
            border: thin solid #000;
        }

        // adi nambahin 
        .border-lr th {
            border: thin solid #000;
        }

        .border-doang {
            border-collapse: collapse;
            border: thin solid #000;
            border-top:none;
        }
        .border-doang td {
            padding:5px;
        }
        .judulLabel {
            font-weight: bold;
        }
        .background-gray {
          background-color: #aaa7a7;
        }
    </style>
</head>
<body class="A4" style="font-family:Tahoma;height: auto" ng-controller="cetakRingkasanPulangCtrl">
  <section class="sheet padding-10mm" style="font-family: Tohama;height: auto;">
    <table width="100%" cellspacing="0" cellpadding="0" border="1">
        <tr>
            <td width="10%" style="padding: 15px">
                @if(stripos(\Request::url(), 'localhost') !== FALSE)
                    <img src="{{ asset('img/logo_only.png') }}" alt="" style="width: 90px;">
                @else
                    <img src="{{ asset('service/img/logo_only.png') }}" alt="" style="width: 90px;">
                @endif
            </td>
            <td style="text-align: center;padding: 15px;">
                  <span style="font-size: 14px"><b>{!! $res['profile']->namalengkap !!}</b></span>
                  </br>
                  </br>
                  <span style="font-size: 12px;">{!! $res['profile']->alamatlengkap !!}</span>
            </td>
            <td width="40%" style="padding: 10px">
                <div style="text-align: left">
                    <table style="padding: 3px;">
                        <tr>
                            <td class="f-s-15 bold  text-top" style="width: 100px">No. RM</td>
                            <td class="f-s-15 bold  text-top">:</td>
                            <td class="f-s-15 bold text-top"><b>{!! $res['d'][0]->nocm  !!}</b></td>
                        </tr>
                        <tr>
                            <td class="f-s-15 bold  text-top">Nama</td>
                            <td class="f-s-15 bold  text-top">:</td>
                            <td class="f-s-15 bold  text-top"><b>{!!  $res['d'][0]->namapasien  !!}</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="f-s-15 bold  text-top">Tgl Lahir</td>
                            <td class="f-s-15 bold  text-top">:</td>
                            <td class="f-s-15 bold  text-top">
                                <b>{!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</b></td>
                        </tr>
                        <tr>
                            <td class="f-s-15 bold  text-top">NIK</td>
                            <td class="f-s-15 bold  text-top">:</td>
                            <td class="f-s-15 bold  text-top"><b>{!! $res['d'][0]->noidentitas  !!}</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="padding: 0 !important">
              <div style="padding: 20px;font-size: 18px;">
                <b>RM</b>
              </div>
              <div style="padding: 20px;font-size: 18px;">
                <b>122</b>
              </div>
            </td>
        </tr>
        <tr>
          <td colspan="4" style="text-align: center;font-size: 16px;padding: 5px" class="background-gray">
            <b>RINGKASAN PULANG</b>
          </td>
        </tr>
        <tr>
          <td colspan="4">
            <div>
              <table>
                <tr>
                  <td style="border-right: 1px solid #000;padding-left: 5px">
                    <span class="f-s-15">Ruang/bagian </span><span> : </span><span> @{{ item.obj[423800] }}</span>
                  </td>
                  <td style="border-right: 1px solid #000;padding-left: 5px">
                    <span class="f-s-15">Tanggal Masuk </span><span> : </span><span> @{{ item.obj[423801] }}</span>
                  </td>
                  <td style="padding-left: 5px">
                    <span class="f-s-15">Tanggal Keluar </span><span> : </span><span> @{{ item.obj[423802] }}</span>
                  </td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
    </table>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Riwayat Kesehatan</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423803] }}</span>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Indikasi Dirawat</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423804] }}</span>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Diagnosis</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423805] }}</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;min-height: 50px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 10</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @{{ item.obj[423806] ? '- ' + item.obj[423806] : '' }}
        </span>
      </div>
    </div>
    <div class="border-doang" style="min-height: 90px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Komorbiditas Lain</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423807] }}</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;min-height: 90px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 10</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @{{ item.obj[31101417] ? '- ' + item.obj[31101417] : '' }} <br>
          &nbsp;@{{ item.obj[31101418] ? '- ' + item.obj[31101418] : '' }} <br>
          &nbsp;@{{ item.obj[31101419] ? '- ' + item.obj[31101419] : '' }} <br>
          &nbsp;@{{ item.obj[31101420] ? '- ' + item.obj[31101420] : '' }} <br>
          &nbsp;@{{ item.obj[31101421] ? '- ' + item.obj[31101421] : '' }}
        </span>
      </div>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Pemeriksaan Fisik</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423809] }}</span>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Pemeriksaan Diagnostik</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423810] }}</span>
    </div>
    <div class="border-doang" style="min-height: 90px">
      <div style="width: 70%;float: left;">
        <span class="f-s-15 background-gray"><b>Tindakan yang Telah Dikerjakan</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423811] }}</span>
      </div>
      <div style="width: 30%; float: right;border-left: 1px solid #000;box-sizing: border-box;min-height: 90px;">
        <div style="text-align: center;" class="background-gray">
          <b>ICD 9-CM</b>
        </div>
        <span style="padding: 3px;box-sizing: border-box;">
          @{{ item.obj[423812] }} <br>
          &nbsp;@{{ item.obj[32116614] ? '- ' + item.obj[32116614] : '' }} <br>
          &nbsp;@{{ item.obj[32116615] ? '- ' + item.obj[32116615] : '' }} <br>
          &nbsp;@{{ item.obj[32116616] ? '- ' + item.obj[32116616] : '' }} <br>
          &nbsp;@{{ item.obj[32116617] ? '- ' + item.obj[32116617] : '' }}
        </span>
      </div>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Obat yang Diberikan</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423813] }}</span>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Kondisi Pasien</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423814] }}</span>
    </div>
    <div class="border-doang" style="min-height: 50px">
      <span class="f-s-15 background-gray"><b>Tindak Lanjut</b> </span><span class="background-gray"> <b>:</b> </span><span> @{{ item.obj[423815] }}</span>
    </div>
    <div class="border-doang" style="overflow: auto">
      <br>
      <br>
      <div style="float: right;width: 40%;text-align: end;padding-right: 5px">
        <span>Bulukumba, </span> <span> @{{ hariTgl.split(' ')[0] }}, </span> <span>Jam : </span> <span> @{{ hariTgl.split(' ')[1] }} </span> <span> WITA</span>
      </div>
      <br>
      <br>
      <div style="width: 33%;float: left;padding: 15px;box-sizing: border-box;">
        <div style="text-align: center">
          <span>Pasien</span>
        </div>
        <br>
        <div id="qrcodePasien" style="text-align: center"></div>
        <br>
        <div style="text-align: center">
          <span>( @{{ item.obj[423817] }} )</span>
        </div>
      </div>
      <div style="width: 33%;float: left;padding: 15px;box-sizing: border-box;">
        <div style="text-align: center">
          <span>Keluarga Pasien</span>
        </div>
        <br>
        <div id="qrcodeKeluargaPasien" style="text-align: center"></div>
        <br>
        <div style="text-align: center">
          <span>( @{{ item.obj[423818] }} )</span>
        </div>
      </div>
      <div style="width: 33%;float: left;padding: 15px;box-sizing: border-box;">
        <div style="text-align: center">
          <span>DPJP</span>
        </div>
        <br>
        <div id="qrcodeDPJP" style="text-align: center"></div>
        <br>
        <div style="text-align: center">
          <span>( @{{ item.obj[423819] }} )</span>
        </div>
      </div>
    </div>
    <div class="border-doang" style="padding: 10px;box-sizing: border-box;overflow: auto;">
      <div style="float: left;width: 50%">
        <div class="f-s-15"><i>Lembar 1 : Berkas Rekam Medis</i></div>
        <div class="f-s-15"><i>Lembar 3 : Pasien</i></div>
      </div>
      <div style="float: right;width: 50%">
        <div class="f-s-15"><i>Lembar 2 : FASKES yang Memberikan Tindak Lanjut Asuhan</i></div>
        <div class="f-s-15"><i>Lembar 4 : Penjamin/Asuransi</i></div>
      </div>
    </div>
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

    angular.controller('cetakRingkasanPulangCtrl', function ($scope, $http, httpService) {
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
        console.log($scope.obj);

        var pasien = $scope.item.obj[423818];
        var keluargapasien = $scope.item.obj[423817];
        var dpjp = $scope.item.obj[423819];

        if(pasien != undefined){
          jQuery('#qrcodeKeluargaPasien').qrcode({
            width	: 70,
			      height	: 70,
            text	: "Tanda Tangan Digital Oleh " + pasien
        });	
        }
        if(keluargapasien != undefined){
          jQuery('#qrcodePasien').qrcode({
            width	: 70,
			      height	: 70,
            text	: "Tanda Tangan Digital Oleh " + keluargapasien
        });
        }
        if(dpjp != undefined){
          jQuery('#qrcodeDPJP').qrcode({
            width	: 70,
			      height	: 70,
            text	: "Tanda Tangan Digital Oleh " + dpjp
        });		
        }
        
        
    })
    $(document).ready(function () {
        window.print();
    });
</script>

</html>
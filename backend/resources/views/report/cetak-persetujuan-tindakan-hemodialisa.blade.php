<!DOCTYPE html>
<html lang="en" ng-app="angularApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Tindakan Hemodialisa</title>
    @if (stripos(\Request::url(), 'localhost') !== false)
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
<body ng-controller="cetakPersetujianTindakanHemodialisa">
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
            <td colspan="2" class="noborder">{!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? '(P)' : '(L)'  !!}</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">Tanggal Lahir</td>
            <td colspan="13" class="noborder">
                : {!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}
            </td>
            <td colspan="5" class="border-lr" rowspan="2" style="font-size: xxx-large;text-align:center">88</td>
        </tr>
        <tr class="noborder">
            <td colspan="6" class="noborder">NIK</td>
            <td colspan="11" class="noborder">
                : {!! $res['d'][0]->noidentitas  !!}
            </td>
        </tr>
        <tr class="bordered bg-dark">
            <th colspan="49" height="20pt">PERSETUJUAN TINDAKAN HEMODIALISA</th>
        </tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Saya yang bertandatangan dibawah ini :</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Nama</td>
			<td class="" colspan="32">{!!  $res['d'][0]->namapasien  !!}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Tanggal Lahir/ Jenis Kelamin</td>
			<td class="" colspan="16">{!! date('d-m-Y',strtotime( $res['d'][0]->tgllahir  )) !!}</td>
			<td class="noborder btp btm" colspan="16">{!!  $res['d'][0]->jeniskelamin == 'PEREMPUAN' ? 'Perempuan' : 'Laki-laki'  !!}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Alamat</td>
			<td class="" colspan="32">@{{ item.obj[428353] ? item.obj[428353] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Bukti Diri/KTP/SIM/Passport No,</td>
			<td class="" colspan="32">@{{ item.obj[428354] ? item.obj[428354] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder btm"></td>
			<td class="noborder btp" colspan="48">Telah mendapatkan penjelasan dokter tentang :</td>
		</tr>
		<tr style="height: 10pt;" class="btp">
			<td class="noborder" colspan="49"></td>
		</tr>
		<tr valign="top" style="padding:.5rem;">
			<td class="noborder"></td>
			<td class="noborder" colspan="16" rowspan="2">@{{ item.obj[428355] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kondisi dan diagnosis pasien :</td>
			<td class="noborder" colspan="32">@{{ item.obj[428356] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gagal ginjal tahap akhir</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="32">@{{ item.obj[428357] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Gangguan ginjal akut</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="16">@{{ item.obj[428358] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Rencana tindakan kedokteran :</td>
			<td class="noborder" colspan="32">Terapi pengganti fungsi ginjal</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428359] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dokter penanggung jawab tindakan/ pengobatan : @{{ item.obj[428360] ? item.obj[428360] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428361] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tujuan/ manfaat tindakan kedokteran yang dilakukan</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="23"> Untuk membuang zat-zat yang berbahaya dalam tubuh</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428362] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kekurangan tindakan kedokteran yang dilakukan</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="23">Dilakukan berulang dan tindakan menggunakan mesin</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428363] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Alternatif tindakan lain/ perluasan daerah operasi dan risikonya</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="23"></td>
		</tr>
		<tr>
			<td class="noborder" colspan="2"></td>
			<td class="noborder" colspan="23">@{{ item.obj[428364] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} CAPD (Continuous Ambulatory Peritoneal Dialysis)</td>
			<td class="noborder" colspan="24"></td>
		</tr>
		<tr>
			<td class="noborder" colspan="2"></td>
			<td class="noborder" colspan="23">@{{ item.obj[428365] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Transplantasi ginjal</td>
			<td class="noborder" colspan="24"></td>
		</tr>
		<tr>
			<td class="noborder" colspan="2"></td>
			<td class="noborder" colspan="23">@{{ item.obj[428366] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Dialisis peritoneal akut</td>
			<td class="noborder" colspan="24"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428367] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kemungkinan keberhasilan (%)</td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="23">@{{ item.obj[428368] ? item.obj[428368] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="48">@{{ item.obj[428369] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kemungkinan masalah terkait proses pemulihan (Resiko/ Komplikasi) : Hipotensi, kram otot, mual dan muntah, sakit kepala, nyeri dada, nyeri punggung, gatal, demam menggigil, perdarahan, reaksi alergi, syok, hipertensi krisis, gangguan irama jantung, kejang, emboli udara, penularan infeksi.</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428370] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Kemungkinan hasil akibat tidak dirawat/ diberi tindakan kedokteran </td>
			<td class="noborder">: </td>
			<td class="noborder" colspan="22">Perburukan kondisi pasien</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428371] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Prognosis terhadap tindakan yang mungkin dilakukan </td>
			<td class="noborder">:</td>
			<td class="noborder" colspan="22">@{{ item.obj[428372] ? item.obj[428372] : '' }}</td>
		</tr>
		<tr class="btm"></tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder"><strong>Di samping itu dokter juga telah menjelaskan kepada saya bahwa :</strong></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">@{{ item.obj[428373] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Tindakan pemberian obat-obatan dan transfuse darah kemungkinan diperlukan dan semua tindakan ini mengandung risiko</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">@{{ item.obj[428374] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Operasi atau tindakan tambahan kemungkinan diperlukan jika dokter menemukan sesuatu yang tak terduga</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td colspan="48" class="noborder">@{{ item.obj[428375] ? '[&#10004;]' : '[&nbsp;&nbsp;&nbsp;]' }} Operasi/ tindakan ini kemungkinan tidak memberikan hasil yang sesuai harapan walaupun sudah dilakukan sesuai standar prosedur yang berlaku</td>
		</tr>
		<tr style="text-align: justify;">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Saya sudah mendapatkan kesempatan untuk bertanya dan saya sudah mengerti dan puas dengan penjelasan yang diberikan sehubungan dengan pertanyaan-pertanyaan saya, disamping itu jika terjadi kecelakaan seperti tertusuknya jarum atau alat tajam pada petugas medis selama berlangsungnya operasi, saya memberikan izin untuk mengambil darah pasien untuk tes HIV dan penyakit lainnya yang penularannya melalui darah.</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24"></td>
			<td class="noborder" colspan="24">Bulukumba, @{{item.obj[32116610] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
		</tr>
		<tr valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="24">Dokter yang Memberi Penjelasan,</td>
			<td class="noborder" colspan="24">Pasien/Keluarga yang Menerima Penjelasan</td>
		</tr>
        <tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24"><div id="qrcodec1"></td>
			<td class="noborder" colspan="24"><div id="qrcodeq1"></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428376] ? item.obj[428376] : '' }}</td>
			<td class="noborder" colspan="24">@{{ item.obj[428377] ? item.obj[428377] : '' }}</td>
		</tr>
		<tr style="text-align: justify;height:80pt" class="btm">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Dengan ini saya menyatakan dengan sesungguhnya bahwa saya SETUJU untuk dilakukan operasi atau tindakan medis yang sudah dijelaskan seperti diatas.</td>
		</tr>
		<tr style="text-align: justify;" valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong>Terhadap @{{ item.obj[428378] ? item.obj[428378] : '' }}, dengan :</strong></td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Nama</td>
			<td class="" colspan="32">@{{ item.obj[428379] ? item.obj[428379] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Tanggal Lahir/ Jenis Kelamin</td>
			<td class="" colspan="16">@{{item.obj[428380] | toDate | date:'dd MMMM yyyy'}}</td>
			<td class="noborder btp btm" colspan="16">@{{ item.obj[428381] ? item.obj[428381] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Alamat</td>
			<td class="" colspan="32">@{{ item.obj[428382] ? item.obj[428382] : '' }}</td>
		</tr>
		<tr>
			<td class="noborder btp btm"></td>
			<td class="noborder btp br" colspan="16">Bukti Diri/KTP/SIM/Passport No,</td>
			<td class="" colspan="32">@{{ item.obj[428383] ? item.obj[428383] : '' }}</td>
		</tr>
		<tr style="text-align: justify;" class="">
			<td class="noborder"></td>
			<td class="noborder btp" colspan="48">Demikian pernyataan ini saya buat dengan penuh kesadaran dan tanpa paksaan.</td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24"></td>
			<td class="noborder" colspan="24" style="text-align:center">Bulukumba, @{{item.obj[428384] | toDate | date:'dd MMMM yyyy HH:mm'}}</td>
		</tr>
		<tr valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="24"><strong>Dokter (DPJP/ Supervisor)</strong></td>
			<td class="noborder" colspan="24" style="text-align:center;"><strong>Yang Membuat Pernyataan</strong></td>
		</tr>
        <tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24"><div id="qrcodep1"></div></td>
			<td class="noborder" colspan="24" style="text-align:center;"><div id="qrcoded1"></div></td>
		</tr>
		<tr>
			<td class="noborder"></td>
			<td class="noborder" colspan="24">@{{ item.obj[428385] ? item.obj[428385] : '' }}</td>
			<td class="noborder" colspan="24" style="text-align:center;">@{{ item.obj[428386] ? item.obj[428386] : '' }}</td>
		</tr>
		<tr class="text-center" valign="top">
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong>Saksi (Petugas/ Keluarga Pasien)</strong></td>
		</tr>
        <tr class="text-center">
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong><div id="qrcodes1"></strong></td>
		</tr>
		<tr class="text-center">
			<td class="noborder"></td>
			<td class="noborder" colspan="48"><strong>@{{ item.obj[428387] ? item.obj[428387] : '' }}</strong></td>
		</tr>
		<tr class="">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Isi dengan tanda silang (X) atau rumput (&check;) jika telah dijelaskan</td>
		</tr>
		<tr style="text-align:justify">
			<td class="noborder"></td>
			<td class="noborder" colspan="48">Bila pasien berusia di bawah 21 tahun atau tidak dapat memberikan persetujuan karena alasan lain (*) tidak dapat menandatangani surat di atas, pihak Rumah Sakit mengambil kebijaksanaan dengan memperbolehkan tandatangan dari orang tua, pasangan, anggota keluarga terdekat atau wali dari pasien.</td>
		</tr>
    </table>
</body><script type="text/javascript">
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

    angular.controller('cetakPersetujianTindakanHemodialisa', function ($scope, $http, httpService) {
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
        
        var p1 = $scope.item.obj[428385];
        var d1 = $scope.item.obj[428386];
        var s1 = $scope.item.obj[428387];
        var c1 = $scope.item.obj[428376];
        var q1 = $scope.item.obj[428377];

        if (p1 != undefined) {
            jQuery('#qrcodep1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + p1
            });	
        }
        
        if (d1 != undefined) {
            jQuery('#qrcoded1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + d1
        });
        }

        if (s1 != undefined) {
            jQuery('#qrcodes1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + s1
        });
        }

        if (c1 != undefined) {
            jQuery('#qrcodec1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + c1
        });
        }

        if (q1 != undefined) {
            jQuery('#qrcodeq1').qrcode({
            width	: 70,
			height	: 70,
            text	: "Tanda Tangan Digital Oleh " + q1
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
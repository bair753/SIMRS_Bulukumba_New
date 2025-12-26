
<!DOCTYPE html >
<html lang="en" ng-app="angularApp">

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kontrol</title>
</head>

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
    body{
        /* font-family:Arial, Helvetica, sans-serif; */
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
        padding:.3rem
    }
</style>

<body ng-controller="cetakSuratKeteranganKontrol"  cellspacing="0">
    
    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; text-align: center; border:none">
        <tr>
            <td width="10%" style="text-align: center; border:none;padding: 10px">
                <div class="grid_2">          
                    <img src="{{ $image }}" alt="" style="height: 70px; width:60px; text-align: center;">
                </div>
            </div>
            <td width="75%">
                <table style="padding: 0px;text-align: center;border:none" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="border:none; text-align: center"><h2>RUMAH SAKIT UMUM DAERAH</h2></td>
                    </tr>
                    <tr>
                        <td style="border:none; text-align: center"><h2>H. ANDI SULTHAN DAENG RADJA</h2></td>
                    </tr>
                    <tr>
                        <td style="border:none; text-align: center"><span style="font-size: 14px;text-align=center">{!! $res['profile']->alamatlengkap !!}</span></td>
                    </tr>
                </table>
            </td>
            <td width="15%" style="text-align: center; border:none;padding: 10px">
                <div class="grid_2">          
                    <img src="{{ $imageHusada }}" alt="" style="height: 70px; width:60px; text-align: center;">
                </div>
            </div>
        </tr>
        <tr style="text-align:center">
            <td colspan="3"  style="border:none;"><hr style="border:2px solid #000"></td>
        </tr>

    </table>
    <table  width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; border:none; font-size:13px;">
        <tr style="text-align: center;font-size:16pt">
            <td colspan="16"><b><u>SURAT KETERANGAN KONTROL</u></b></td>
        </tr>
        <tr><td style="height:20px;" colspan="16"></td></tr>
        <tr>
            <td colspan="2" width="30%">NO. KARTU</td>
            <td colspan="2" width="2%">:</td>
            <td colspan="2" width="30%">{!! $res['d'][0]->nobpjs  !!}</td>
            <td colspan="2" width="20%">NO. RM</td>
            <td colspan="2" width="2%">:</td>
            <td colspan="2" width="30%">{!! $res['d'][0]->nocm  !!}</td>
        </tr>
        <tr>
            <td colspan="2">DIAGNOSA</td>
            <td colspan="2">:</td>
            <td colspan="2">
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116171)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td colspan="2">NAMA PASIEN</td>
            <td colspan="2">:</td>
            <td colspan="2">{!! $res['d'][0]->namapasien  !!}</td>
        </tr>
        <tr>
            <td colspan="2">TERAPI</td>
            <td colspan="2">:</td>
            <td colspan="2">
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116173)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td colspan="2">NO. HP PASIEN</td>
            <td colspan="2">:</td>
            <td colspan="2">
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116174)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">TANGGAL SURAT RUJUKAN</td>
            <td colspan="2">:</td>
            <td colspan="2">
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116175)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            {{-- <td colspan="2">@{{item.obj[32116175] | toDate | date:'dd MMMM yyyy'}}</td> --}}
        </tr>
        <tr><td style="height:20px;" colspan="14"></td></tr>
        <tr>
            <td colspan="12">Belum dapat dikembalikan ke Fasilitas Penunjuk dengan alasan * :</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">
                1.
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116176)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">
                2.
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116177)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">
                3.
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116178)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">
                4.
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116179)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr><td style="height:20px;" colspan="14"></td></tr>
        <tr>
            <td colspan="12">Rencana tindak lanjut yang akan dilakukan pada kunjungan selanjutnya * :</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">1. 
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116180)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">2. 
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116181)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">3. 
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116182)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">4. 
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116183)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">Surat keterangan ini digunakan untuk 1 (satu) kali kunjungan dengan diagnosa diatas, </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="12">
                pada tanggal :
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116184)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
            </td>
            {{-- <td colspan="12">pada tanggal : @{{item.obj[32116184] | toDate | date:'dd MMMM yyyy'}}</td> --}}
            <td></td>
            <td></td>
        </tr>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0"  style="padding:  10px 10px 10px 40px; border:none; font-size:13px;">
        <tr><td style="height:20px;" colspan="14"></td></tr>
        <tr style="text-align: center;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="14" style="border:none">Bulukumba,
                <span>
                    @foreach($res['d'] as $item)
                    @if($item->emrdfk == 32116185)
                        <span style="font-size:9pt; color:#000000;">{!! $item->value !!}</span>
                    @endif
                    @endforeach    
                </span>
                {{-- @{{item.obj[32116185] | toDate | date:'dd MMMM yyyy HH:mm'}} --}}
            </td>
        </tr>
        
        <tr style="text-align: center;">
            <td colspan="4" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="14" style="border:none">Dokter DPJP</td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="14" valign="bottom" style="border:none">
                    @foreach($res['d'] as $item)
                        @if($item->emrdfk == 32116186)
                        <img src="data:image/png;base64, {!! $item->qrcode !!} " style="height: 70px; width:70px">
                        @endif
                    @endforeach    
            </td>
                
        </tr>
        <tr style="text-align: center;">
            <td colspan="4" valign="bottom" style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="14" valign="bottom" style="border:none">
                <span>
                    @foreach($res['d'] as $item)
                        @if($item->emrdfk == 32116186)
                            <span style="font-size:9pt; color:#000000;">{{ substr($item->value, strpos($item->value, '~') + 1) }}</span>
                        @endif
                    @endforeach    
                </span>
                {{-- @{{ item.obj[32116186] ? item.obj[32116186] : '___________________' }} --}}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border:none">Catatan :</td>
            <td style="border:none"></td>
            <td colspan="4" style="border:none"></td>
        </tr>
        <tr>
            <td colspan="16" style="border:none">1. <b>WAJIB</b> diisi dan dilengkap sebagai dasar penjaminan klaim BPJS Kesehatan</td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
        <tr>
            <td colspan="16" style="border:none">2. Lembar kedua <b>WAJIB</b> diserahkan ke tempat pendaftaran pasien rawat jalan untuk didaftarkan pada kunjungan berikutnya</td>
            <td style="border:none"></td>
            <td style="border:none"></td>
        </tr>
    </table>

    
   
</body>
</html>
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
  
    angular.controller('cetakSuratKeteranganKontrol', function ($scope, $http, httpService) {
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
  
        var petugas2 = $scope.item.obj[32116186];
        
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